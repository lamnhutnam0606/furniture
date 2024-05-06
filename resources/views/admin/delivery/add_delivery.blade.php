@extends('dashboard')
@section('content')
<div class="row">
    
    <div class="col-lg-12">
            <section class="panel"> 
                <?php
                use Illuminate\Support\Facades\Session;
                $messages = Session::get('messages');
                if($messages){
                    echo '<script language="javascript">';
                    echo 'setTimeout(function() { alert("' . $messages . '"); }, 1);';
                    echo '</script>';
                  Session::put('messages',null);
                }
                ?>
                <header class="panel-heading">
                    Add FeeShip
                </header>
                <div class="col-sm-3" style="float: right; margin-top: 10px;width: 250px;">
                        <form action="{{URL::to('/')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input  type="text" size="40" name="search_order_details" class="input-sm form-control" >
                            <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" name="search_order_details" type="submit">Search</button>
                            </span>
                        </div>
                        </form>
                    </div>
                <div class="panel-body">
                    <div class="position-center">
                        <form >
                           @csrf
                        <div class="form-group">
                            <label for="exampleInputFile">Choose the city</label>
                            <select class="form-control input-sm m-bot15 choose city" name="name_city" id="name_city">
                                <option disabled selected value="">Choose the city</option>
                                @foreach($city as $key => $ci)
                                    <option value="{{$ci->city_id}}">{{$ci->city_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Choose the District</label>
                            <select class="form-control input-sm m-bot15 district choose" name="name_district" id="name_district">
                                <option value="">--choose district--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Choose the Wards</label>
                            <select class="form-control input-sm m-bot15  wards" name="name_wards" id="name_wards">
                                <option value="">--choose wards--</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">FeeShip</label>
                            <input type="text" class="form-control feeship" name="name_fee" id="name_fee" >
                        </div>
                        <button type="button" class="btn btn-info add_delivery" name="add_delivery">Add FeeShip</button>
                        </form>
                    </div>
                    
                   <h2 style="text-align: center; font-size: larger;">
                    Details info Feeship
                   </h2>
                   
                    <div class="table-responsive">
                    <div class="box-scroll">
                    <table class="table table-bordered">  
                       <thead>
                        <tr>  
                            <th>City</th>  
                            <th>District</th>  
                            <th>Wards</th>  
                            <th>Feeship</th>  
                        </tr> 
                       </thead> 
                        <tbody >
                            
                            @foreach($feeship as $key => $fee)
                            <tr >  
                                <td>{{$fee->city->city_name}}</td>  
                                <td>{{$fee->district->district_name}}</td>  
                                <td>{{$fee->wards->wards_name}}</td>  
                                <form action="{{URL::to('update-fee-delivery/'.$fee->fee_id)}}" method="post">
                                {{csrf_field()}}
                                <td><input type="number" style="width: 50px; " value="{{$fee->fee_feeship}}" name="number_fee" id="number_fee">
                                    <input style=" background-color: rgb(200, 234, 234); border: none;" type="submit" name="update_fee" value="update">
                                </td> 
                                </form>
                            </tr>  
                            @endforeach
                           
                        </tbody>
                        </table>  
                        </div>
                    </div>
                    
                   
                  

                </div>
               
            </section>

    </div>
    
</div>
@endsection