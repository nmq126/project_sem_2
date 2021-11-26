<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class OrderController extends Controller
{
    public function show()
    {

        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        return view('client.checkout', [
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function getDetail($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return view('client.errors.404', [
                'msg' => 'Đơn hàng không tồn tại!!'
            ]);
        }
        return view('client.order', [
            'order' => $order
        ]);
    }

    public function process(Request $request)
    {
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }

        if (!Session::has('shoppingCart') || sizeof($shoppingCart) == 0) {
            return view('client.errors.404', [
                'msg' => 'Không có sản phẩm nào trong giỏ hàng!!'
            ]);
        }
        $shipName = $request->get('shipName');
        $shipAddress = $request->get('shipAddress');
        $shipPhone = $request->get('shipPhone');
        $shipNote = $request->get('shipNote');

        //tạo thông tin order
        $order = new Order();
        $order->ship_name = $shipName;
        $order->ship_address = $shipAddress;
        $order->ship_phone = $shipPhone;
        $order->ship_note = $shipNote;
        $order->checkout = false;

        //tạo thông tin order detail
        $hasError = false;
        $array_order_detail = [];
        foreach ($shoppingCart as $cartItem) {
            $product = Product::find($cartItem->id);
            if ($product == null || $product->status == 0) {
                $hasError = true;
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $product->id;
            $orderDetail->order_id = $product->id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->unit_price = $product->price * (100 - $product->discount) / 100;
            $order->total_price += $orderDetail->unit_price;
            array_push($array_order_detail, $orderDetail);
        }
        if ($hasError) {
            return view('client.errors.404', [
                'msg' => 'Sản phẩm không tồn tại hoặc không khả dụng!!'
            ]);
        }
        //save order, order detail vao database
        try {
            DB::beginTransaction();
            $order->save();
            $order_id = $order->id;
//            $order_details = [];
            foreach ($array_order_detail as $orderDetail) {
                $orderDetail->order_id = $order_id;
                $orderDetail->save();
            }
//            OrderDetail::insert($order_details);
            DB::commit();
            Session::forget('shoppingCart');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        return redirect('/order/' . $order_id);
    }

    public function createPayment(Request $request)
    {
//        $clientId = 'AZqirfWqV2F1C9rz5DUUXC63jDUXggrZ_7tBdjkxK_6kzJUC25UcwU0j3E5OYCEkIJNDCf9oOQWQ1I1r';
//        $clientSecret = 'EIQ6hCG0IbFg9DJD4Z1YH530f30BNFCW4T79RN-Z311mKRSfw7ZhhEWaU5nMOfJf5kP0Nj0h0KHpyVfS';



        $orderId = $request->get('orderID');
        $order = Order::find($orderId);
        if ($order == null) {
            return 'Đơn hàng không tồn tại!!';
        }
        $clientId = 'ATIs_QL16BU7nylXRhyhh4ANQXyoUz-yZGzIBx9bZp4sAIOvxSK2dNdUPFDyRv7BJM55u5fAODzqqZK-';
        $clientSecret = 'ELVcEXLe4dYeMHan7LcH7Eb0jP5hEH6_NGRx_kzPoeHJZtq3CmNhe9v6eaRtblRngI2QKmyxA9DZJBVQ';
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $clientId,
                $clientSecret
            )
        );
        // ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

// ### Itemized information
// (Optional) Lets you specify item wise
// information
        $array_items = [];
        foreach ($order->orderDetails as $orderDetail) {
            $item = new Item();
            $item->setName($orderDetail->product->name)
                ->setCurrency('USD')
                ->setQuantity($orderDetail->quantity)
                ->setSku($orderDetail->product->id) // Similar to `item_number` in Classic API
                ->setPrice(Helper::convertVndToUsd($orderDetail->unit_price));
            array_push($array_items, $item);
        }
        $itemList = new ItemList();
        $itemList->setItems($array_items);


        ### Additional payment details

    $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(Helper::convertVndToUsd($order->total_price));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(Helper::convertVndToUsd($order->total_price))
            ->setDetails($details);


 ### Transaction

    $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Checkout order #$order->id")
            ->setInvoiceNumber($order->id);

// ### Redirect urls
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
        $baseUrl = $request->root();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/payment-success")
            ->setCancelUrl("$baseUrl/payment-fail");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


// ### Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state and the
// url to which the buyer must be redirected to
// for payment approval
        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            exit(1);
        }

// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getApprovalLink()
// method
        $approvalUrl = $payment->getApprovalLink();


        return $payment;
    }

    public function executePayment(Request $request)
    {
        $orderId = $request->get('orderID');
        $order = Order::find($orderId);
        if ($order == null) {
            return 'Đơn hàng không tồn tại!!';
        }
        // Get the payment Object by passing paymentId
        // payment id was previously stored in session in
        // CreatePaymentUsingPayPal.php
        $clientId = 'ATIs_QL16BU7nylXRhyhh4ANQXyoUz-yZGzIBx9bZp4sAIOvxSK2dNdUPFDyRv7BJM55u5fAODzqqZK-';
        $clientSecret = 'ELVcEXLe4dYeMHan7LcH7Eb0jP5hEH6_NGRx_kzPoeHJZtq3CmNhe9v6eaRtblRngI2QKmyxA9DZJBVQ';
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $clientId,
                $clientSecret
            )
        );
        $paymentId = $request->get('paymentID');
        $payerId = $request->get('payerID');
        $payment = Payment::get($paymentId, $apiContext);

        // ### Payment Execute
        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);


        try {
            // Execute the payment
            // (See bootstrap.php for more on `ApiContext`)
            $result = $payment->execute($execution, $apiContext);


            try {
                $payment = Payment::get($paymentId, $apiContext);
                $order->checkout = true;
                $order->updated_at = Carbon::now();
                $order->save();
            } catch (Exception $ex) {

                exit(1);
            }
        } catch (Exception $ex) {

            exit(1);
        }


        return $payment;
    }
}
