<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\CommonMark\Renderer\Block\ThematicBreakRenderer;

class DeliveryController extends Controller
{
    public function show_delivery(){
        $city = City::orderBy('city_id','asc')->get();
        $fee = Feeship::with('city','district','wards')->orderBy('fee_id','desc')->get();
        return view('admin.delivery.add_delivery')->with('city',$city)->with('feeship',$fee);
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == 'name_city'){
                $select_district = District::where('city_id',$data['id'])->orderBy('district_id','asc')->get();
                    $output.='<option>--choose district--</option>';
                    foreach($select_district as $key => $dis){
                        $output.='<option value="'.$dis->district_id.'">'.$dis->district_name.'</option>';
                    }
            }else{
                $select_wards = Wards::where('district_id',$data['id'])->orderBy('wards_id','asc')->get();
                    $output.='<option>--choose wards--</option>';
                    foreach($select_wards as $key => $war){
                        $output.='<option value="'.$war->wards_id.'">'.$war->wards_name.'</option>';
                    }
                }
        }
        echo $output;
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee = new Feeship();
        $fee->fee_cityId = $data['city'];
        $fee->fee_districtId = $data['district'];
        $fee->fee_wardsId = $data['wards'];
        $fee->fee_feeship = $data['feeship'];
        $fee->save();
    }
    public function select_feeship(){
        $feeship = Feeship::orderBy('fee_id','desc')->get();
        $output = '';
        $output.=
        '<div class="table-responsive">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>City</th>
                        <th>District</th>
                        <th>Wards</th>
                        <th>Feeship</th>
                    </tr>
                </thread>
            <tbody>';
        foreach($feeship as $key => $fee){
        $output.=
           '<tr>
                <td>'.$fee->city->city_name.'</td>
                <td>'.$fee->district->district_name.'</td>
                <td>'.$fee->wards->wards_name.'</td>
                <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,2,',','.').'</td>
            </tr>';
        }
        $output.=
            '</tbody>
            </table>
        </div>';

        echo $output;
                
    }
    public function update_fee_delivery($fee_id,Request $request){
        //ajax
            // $data = $request->all();
            // $fee =  Feeship::find($data['feeship_id']);
            // $fee_val = rtrim($data['fee_value'],'.');
            // $fee->fee_feeship = $fee_val;
            // $fee->save();

        $data = $request->all();
        $fee = Feeship::find($fee_id);
        if($fee){
            $fee->fee_feeship = $data['number_fee'];
            $fee->save();
        }
        Session::put('messages','Update delivery fee successfully!');
        return Redirect::to('/manager-delivery');
    }   
}
