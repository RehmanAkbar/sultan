@extends('adminpanel.master')
@section('title', 'Invoice')
@section('custom_css')
    <style>
        .center {
            /*margin: auto;*/
            width: 100%;
            /*border: 3px solid green;*/
            padding: 10px;
            /*background-color: #b0e0e6;*/
        }
    </style>
@endsection
@section('content')



    <div class="content-wrapper" >
        <?php
        /* $bran=\App\Brand::where('id',$queue->brand_id)->first();
         $prod=\App\Product::where('id',$queue->product_id)->first();*/
        $user=\App\User::where('id',$queue->first()->user_id)->first();
        $add=\App\Order::where('user_id',$user->id)->first();
        $rand=rand();
        ?>

        <div class="container-fluid">
            <div id="email_message" class="alert alert-success" role="alert" style="display: none;margin-top:4px;margin-bottom: 2px;">

            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="panel  panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <h3>Customer Invoice</h3>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-4" style="margin-top: 10px">
                                        <div class="btn-group pull-right" >
                                            <button id="{{$queue->first()->id}}" class="btn btn-success send_email"style="margin-right: 2px;">Send Invoice Email</button>
                                            <a  href="/pdf/{{$queue->first()->id}}"><button class="btn btn-success" >Print Invoice</button></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="panel-body">

                            <div class="center">
                                <h4 >Invoice#: {{$rand}}</h4>
                                <h4 >To: {{$user->name}}</h4>
                                <h4 >Address: {{$add->address . ', '  }}  {{$add->city . ', '}}{{$add->state . ', '}}{{$add->country . ', '}}</h4>
                                <h4>Mobile Number: {{$add->mobile_number}}</h4>
                            </div>


                            <div class='table-responsive'>
                                <table class="table table-bordered ">


                                    <tr class ="table_heading" >
                                        <th >Brand</th>
                                        <th >Product</th>
                                        <th >Gender </th>
                                        <th >Quantity</th>
                                        <th >Date</th>
                                        {{--<th style="padding: 5px;">price</th>--}}

                                    </tr>

                                    @foreach($queue as $q)
                                        <tr>
                                            <?php
                                            $bran=\App\Brand::where('id',$q->brand_id)->first();
                                            $prod=\App\Product::where('id',$q->product_id)->first();
                                            ?>
                                            <td >{{$bran->brand_name}}</td>
                                            <td >{{$prod->product_name}}</td>
                                            @if($prod->men == "yes" && $prod->women == "yes" )
                                                 <td >Men ,Women</td>
                                             @elseif($prod->men == "yes")
                                                 <td >Men</td>
                                             @elseif($prod->women == "yes")
                                                  <td >Women</td>
                                             @else
                                                    <td ></td>
                                             @endif
                                            <td >1</td>
                                            <td><?php echo  date("Y-m-d"); ?></td>
                                            {{--<td style="padding: 5px;padding-left: 10px;">395Rs.</td>--}}
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan=""><h4>Total:</h4></td>
                                        <td><h4>395 Rs.</h4></td>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel  panel-primary">
                        <div class="panel-heading"><h3>Company Invoice</h3></div>

                            <div class="panel-body">
                                <div class="center">
                                    <h4>Invoice#: {{$rand}}</h4>
                                    <h4 >To: {{$user->name}}</h4>
                                    <h4 >Address: {{$add->address . ', '  }}  {{$add->city . ', '}}{{$add->state . ', '}}{{$add->country . ', '}}</h4>
                                    <h4>Mobile Number: {{$add->mobile_number}}</h4>
                                </div>

                                <div class='table-responsive'>
                                    <table class="table table-bordered">

                                    <tr class ="table_heading" >
                                        <th >Brand </th>
                                        <th >Product </th>
                                        <th >Gender </th>
                                        <th >Quantity</th>
                                        <th >Date</th>
                                        {{--<th style="padding: 5px;">price</th>--}}

                                    </tr>

                                    @foreach($queue as $q)
                                        <tr>
                                            <?php
                                            $bran=\App\Brand::where('id',$q->brand_id)->first();
                                            $prod=\App\Product::where('id',$q->product_id)->first();
                                            ?>
                                            <td >{{$bran->brand_name}}</td>
                                            <td >{{$prod->product_name}}</td>
                                                @if($prod->men == "yes" && $prod->women == "yes" )
                                                    <td >Men ,Women</td>
                                                @elseif($prod->men == "yes")
                                                    <td >Men</td>
                                                @elseif($prod->women == "yes")
                                                    <td >Women</td>
                                                @else
                                                    <td ></td>
                                                @endif
                                            <td >1</td>
                                            <td><?php echo  date("Y-m-d"); ?></td>
                                            {{--<td style="padding: 5px;padding-left: 10px;">395Rs.</td>--}}
                                        </tr>
                                    @endforeach
                                        <tfoot >
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan=""><h4>Total:</h4></td>
                                            <td><h4>395 Rs.</h4></td>
                                        </tr>
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(".send_email").click(function () {
        $(".send_email").text("sending email....");
        $(".send_email").attr("disabled",true);
        var id = $(this).attr("id");
        var url ='/invoice_email/' + id;
        var successCallback = function (res) {
            res = jQuery.parseJSON(res);

            if (res.status == "success")
            {
                var msg_box = $("#email_message");
                msg_box.css('display', 'block');
                msg_box.append(
                        '<strong>Invoice Email</strong> has been send successfully!.'
                );

                setTimeout(function() {$('#email_message').hide(1000);}, 6000);
                $(".send_email").text("Send Invoice Email");
                $(".send_email").attr("disabled",false);
            }
        };

        ajx(url, 'get', id, successCallback, 'html');
    })
</script>

@endsection
