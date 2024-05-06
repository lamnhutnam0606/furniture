<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_details;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function manager_order(){
        $order = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_order_details.*')->get();
        $manager = view('admin.order.manager_order')->with('order',$order);
        return view('dashboard')->with('admin.order.manager_order',$manager);
    }
    public function details_order($order_id){
        $order_details = DB::table('tbl_order')
        // ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_payment.*')
        ->where('tbl_order.order_id',$order_id)
        ->get();

        

        $or_del = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','tbl_order_details.*')
        ->get();
        
        $details = view('admin.order.details_order')->with('details',$order_details)->with('detai',$or_del);
        return view('dashboard')->with('admin.order.details_order',$details);
        // $order = Order::find($order_id)::with('customer','payment','shipping')->get();
        // $order_details = Order_details::find($order_id)::with('order')->get();
        // $order_details_1 = Order::with('customer','payment','shipping')
        // $order_details_2 = Order_details::with('order')->get();

        // return view('admin.order.details_order')->with('order',$order)->with('order_details',$order_details);
        
    }

    public function search_order_details(Request $request){
        // $search_order = $request->search_order_details;
        // $order = Order::with('customer')
        // ->whereHas('customer', function ($query) use ($search_order) {
        // $query->where('customer_phone', 'like', '%' . $search_order . '%');
        // })
        // ->get();

        // return view('admin.order.manager_order')->with('order', $order);
    }
    // print order file pdf
    public function print_order($checkout_code){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        return $checkout_code;
    }
}
