<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
    padding: 0px;
    margin: 0 auto;
}
    .wrapper{
    margin-top: 0px;
    height: 1120px;
    width: 800px;
}
header{
    height: 100px;
    width: 100%;
    margin-top: 0px;
}
.logo-info{
    width: 100%;
    height: 150px;
    margin-top: 0px;
}
.lg{
    height: 100%;
    width: 50%;
    float: left;
}
.if{
    height: 100%;
    width: 50%;
    float: right;
}
.if1{
    height: 100%;
    width: 50%;
    float: left;
}
.if2{
    height: 100%;
    width: 50%;
    float: right;
}
.info-2{
    width: 100%;
    height: 150px;
    
}
.info-2-1{
    width: 100%;
    height: 150px;
    margin-top: 0px;
    float: right;
}
.info-2-2{
    width: 100%;
    height: 150px;
    margin-top: 0px;
    float: left;
}


.sanpham{
    width: 100%;
    height: 500px;
    margin-top: 0px;
}
.sanpham-ship{
    width: 100%;
    height: 70px;
    margin-top: 0px;
}
.sanpham-pro{
    width: 100%;
    height: 100%;
    margin-top: 0px;
}
.total{
    width: 100%;
    height: 150px;
    margin-top: 0px;
}
.total-1{
    width: 60%;
    height: 100%;
    margin-top: 0px;
    float: left;
}
.total-2{
    width: 40%;
    height: 100%;
    margin-top: 0px;
    float: right;
}
.total-2-1{
    width: 50%;
    height: 100%;
    margin-top: 0px;
    float: right;
}
.total-2-2{
    width: 50%;
    height: 100%;
    margin-top: 0px;
    float: left;
}
.info-company{
    width: 100%;
    height: 70px;
    margin-top: 0px;
}
li{
    list-style: none;
}
th{
    border: 1px solid;
    border-color: grey;
    padding-right: 30px;
    text-align: left;
    
}
.table-bordered{
    width: 100%;
}
td{
    float: right;
    position: absolute;
}

</style>
<body>
   <div class="wrapper">
        <header>
            <h1 style="color: grey; float: left; padding-left: 60px; padding-top: 40px;"><span style="color: rgb(216, 110, 18);">MrJunky</span>-Furniture</h1>
            <h1 style=" float: right;padding-right: 150px;padding-top: 40px;"><span style="color:grey;">Invoice</span></h1>
        </header>
        <!--  -->
        <div class="logo-info">
            <div class="lg">
                <img style="height: 100%; width: 150px; padding-left: 100px;" src="{{asset('/resources/images/logoshop.jpg')}}" alt="">
            </div>
           
            <div class="if">
                <div class="if1">
                    <ul style="padding-left: 80px; padding-top: 20px;">
                        <li>Date:</li>
                        <li>Invoice:</li>
                        <li>CustomerID:</li>
                        <li>Purchase Order:</li>
                        <li>Payment Due by:</li>
                    </ul>
                </div>
                @foreach ($order as $key => $ord )
                <div class="if2">
                    <div style="padding-left: 10px; padding-top: 20px;">
                    <p>{{$ord->created_at}}</p>
                    <p>{{$ord->order_code}}</p>
                    <p>{{$ord->customer_id}}</p>
                    <p>.</p>
                    <p>{{$ord->customer->customer_name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
        <!--  -->
        <div class="info-2">
        <h4 style="padding-left:20px;">Ship To (If Different):</h4>
           
                <ul style="list-style: none; padding-left:20px;">
                @foreach ($order as $key => $or )
                    <li>Name: {{$or->shipping->shipping_name}}</li>
                    <li>Company Name: Mrjunky</li>
                    <li>Street Address: {{$or->shipping->shipping_address}}</li>
                    <li>CT, ST ZIP Code</li>
                    <li>Phone: {{$or->shipping->shipping_phone}}</li>
                    @endforeach
                </ul>
          
        </div>
        <!--  -->
        <div class="sanpham">
            <div class="sanpham-ship" >
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th style="padding-left: 10px;">Salesperson</th>
                            <th>Shipping email</th>
                            <th>Shipping Terms</th>
                            <th>Payment Temrs</th>
                            <th>Due Date</th>
                            <th>Delivery Date</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            @foreach ($order as $key => $or )
                                <td style="padding-left: 10px;">[Mrjunky]</td>
                                <td>{{$or->shipping->shipping_mail}}</td>
                                <td>3-5 days</td>
                                <td>1 day</td>
                                <td>2024-01-15</td>
                                <td>2024-01-15</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--  -->
            <div class="sanpham-pro">
                <!-- <table class="table-bordered" >
                    <thead>
                        <tr>
                            <th>Item #</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($orderd as $key => $ord )
                                <td >PDID{{$ord->product->product_id}}</td>
                                <td>Product 2</td>
                                <td >2</td>
                                <td style="text-align: right;padding-right:10px;">7.00</td>
                                <td style="text-align: right; padding-right:10px;">14.00</td>
                                <br>
                            @endforeach
                        </tr>
                    </tbody>
                </table> -->
        <div class="table-responsive">
        <table class="table-bordered">
          <thead>
            <tr>
              <th style="padding-left:  10px;">STT</th>
              <th style="padding-left: 10px;">ItemID</th>
              <th>Description</th>
              <th>Qty</th>
              <th>Unit Price</th>
              <th>Line Total</th>
              
            </tr>
          </thead>
          <tbody >
            @php
                $i = 0;
                $line_total = 0;
            @endphp
          @foreach ($orderd as $key => $ord )
          @php
                $line_total = $ord->product_sales_quantity*$ord->product->product_price;
                $i++;
            @endphp
            <tr >
              <td style="padding-left: 20px;">#{{$i}}</td>
              <td style="padding-left: 10px; margin-top: 0px; padding-top:10px;">PDID{{$ord->product->product_id}}</td>
              <td>{{$ord->product->product_content}}</td>
              <td style="padding-left: 10px;">{{$ord->product_sales_quantity}}</td>
              <td >${{number_format($ord->product->product_price,2,'.',',')}}</td>
              <td>${{number_format($line_total,2,'.',',')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
            </div>
        </div>
        <div class="total">
            <div class="total-1">
                <h6 style="margin-top: 20px; margin-left:20px;">Specical Notes and Instrucstions</h6>
                @foreach ($order as $key => $or )
                    <textarea style="margin-top: 2px; margin-left: 20px; margin-right: 20px; padding:30px;" name="" id="">{{$or->shipping->shipping_note}}</textarea>
                @endforeach
            </div>
            <div class="total-2">
                <div class="total-2-1">
                    <ul style="padding-left: 10px; padding-top:30px;">
                    @foreach ($order as $key => $or )
                        <li>${{number_format($or->order_total,2,'.',',')}}</li>
                        <li>0.00</li>
                        <li>$</li>
                        <li>$10.00</li>
                        <li>%</li>
                        <li><b>$123.80</b></li>
                        @endforeach
                    </ul>
                </div>
                <div class="total-2-2">
                    <ul style="padding-left: 10px; padding-top:30px;">
                        <li>Subtotal</li>
                        <li>Sales tax Rate</li>
                        <li>Shipping fee</li>
                        <li>S&H</li>
                        <li>Discount</li>
                        <li><b>Total</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="info-company" style="text-align: center;">
            <h5>479 Cong Hoa Street, Tan Binh District, Ho Chi Minh city</h5>
            <h3 >Thank you for your business</h3>
            <h5 >Tel:95 01 88 821 Fax: 0-000-000-0000 E-mail: furniture@weblaravel.com Web: www.mrjunkyfurniture.com</h5>
        </div>
   </div>
    
</body>
</html>