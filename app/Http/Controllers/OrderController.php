<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function show(){

        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
        return view('client.checkout', [
            'shoppingCart' => $shoppingCart
        ]);    }

    public function process(Request $request){
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }

        if (!Session::has('shoppingCart') || sizeof($shoppingCart) == 0){
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
        foreach ($shoppingCart as $cartItem){
            $product = Product::find($cartItem->id);
            if ($product == null || $product->status == 0){
                $hasError = true;
                break;
            }
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $product->id;
            $orderDetail->order_id = $product->id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->unit_price = $product->price * (100 - $product->discount)/100;
            $order->total_price += $orderDetail->unit_price;
            array_push($array_order_detail, $orderDetail);
        }
        if ($hasError){
            return view('client.errors.404', [
                'msg' => 'Sản phẩm không tồn tại hoặc không khả dụng!!'
            ]);
        }
        //save order, order detail vao database
        try {
            DB::beginTransaction();
            $order->save();
            $order_details = [];
            foreach ($array_order_detail as $orderDetail){
                $orderDetail->order_id = $order->id;
                $orderDetail->save();
            }
//            OrderDetail::insert($order_details);
            DB::commit();
            Session::forget('shoppingCart');
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
        return "Đặt hàng thành công page";
    }

    public function createPayment(Request $request){
        // ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

// ### Itemized information
// (Optional) Lets you specify item wise
// information
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

// ### Redirect urls
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
        $baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
            ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


// For Sample Purposes Only.
        $request = clone $payment;

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
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }

// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getApprovalLink()
// method
        $approvalUrl = $payment->getApprovalLink();

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        return $payment;
    }

    public function executePayment(Request $request){

    }
}
