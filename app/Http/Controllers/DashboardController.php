<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;


class DashboardController extends Controller
{
    public function Dashboard()
    {
        $sql = DB::raw("SELECT SUM(quantity) as quantity,products.name,products.id
 FROM orders
  JOIN order_details ON  orders.id = order_details.order_id
   JOIN products on products.id = order_details.product_id
   where orders.status = 4
   GROUP BY product_id,products.id,products.name 
 LIMIT 10 Offset 0");
        $result = DB::select($sql);
        for ($i = 1; $i < sizeof($result); $i++) {
            $key = $result[$i];
            $j = $i - 1;
            while ($j >= 0 && $result[$j]->quantity < $key->quantity) {
                $result[$j + 1] = $result[$j];
                $j = $j - 1;
            }
            $result[$j + 1] = $key;
        }
        $data = '';
        $totalquantity = 0;
        foreach ($result as $val) {

            $totalquantity = $val->quantity + $totalquantity;
        }
        foreach ($result as $val) {
            $number = round($val->quantity * 100 / $totalquantity);

            $data .= "{label:'" . $val->name . "', value:" . $number . "},";

        }
        $chartData = $data;
        $sqlcounto = DB::raw("SELECT COUNT(id) AS count FROM orders");
        $sqlcountp = DB::raw("SELECT COUNT(id) AS count FROM products");
        $count = DB::select($sqlcounto);
        $countproduct = DB::select($sqlcountp);
        $usercount = DB::table('users')
            ->where('deleted_at','=',NULL)
            ->count();
        $countcontent = "";

        $countproductnumber = "";
        foreach ($count as $val) {
            $countcontent .= $val->count;

        }
        foreach ($countproduct as $val) {
            $countproductnumber .= $val->count;

        }
        return view("admin.dashboard.dashboard", ["chartData" => $chartData,
            "result" => $result,
            "count" => $countcontent,
            "products" => $countproductnumber,
            "totalquantity" => $totalquantity,
            "usercount"=>$usercount]);

    }

    public function DbJson(Request $request)
    {
        $order = Order::query()->startDate($request)->endDate($request)->get();
        $dataObjs = [];

        for ($i = 0; $i < sizeof($order); $i++) {
            $dataObj = new stdClass();

            $dataObj->year = $order[$i]->created_at->format("Y");
            $dataObj->price = $order[$i]->total_price;
            $dataObjs[$i] = $dataObj;

        }
        $years = [];
        $years[0] = $dataObjs[0]->year;
        $e = 0;
        for ($i = 1; $i < sizeof($dataObjs); $i++) {
            if ($years[$e] != $dataObjs[$i]->year) {
                array_push($years, $dataObjs[$i]->year);
                $e++;
            }

        }
        $orederYearar = [];
        for ($i = 0; $i < sizeof($years); $i++) {

            $orederYear = new stdClass();
            $orederYear->year = $years[$i];
            $orederYear->price = 0;
            for ($j = 0; $j < sizeof($dataObjs); $j++) {
                if ($years[$i] == $dataObjs[$j]->year) {
                    $orederYear->price += $dataObjs[$j]->price;
                }

            }
            $orederYear->money = $orederYear->price - ($orederYear->price * 10 / 100);
            $orederYearar[$i] = $orederYear;
        }
        return $orederYearar;
    }

    public function DbJsonMonth(Request $request)
    {
        $order = Order::query()->startDate($request)->endDate($request)->get();
        $dataObjs = [];
        for ($i = 0; $i < sizeof($order); $i++) {
            if ((integer)$order[$i]->status == 4) {
                $dataObj = new stdClass();
                $dataObj->tw = $order[$i]->created_at;
                $dataObj->year = $order[$i]->created_at->format("Y");
                $dataObj->price = $order[$i]->total_price;
                $dataObj->money = $order[$i]->total_price - ($order[$i]->total_price * 10 / 100);
              array_push($dataObjs,$dataObj);
            }
        }
        return $dataObjs;
    }
}
