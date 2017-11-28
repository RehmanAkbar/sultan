<div class="content-wrapper" >
    <?php
    /* $bran=\App\Brand::where('id',$queue->brand_id)->first();
     $prod=\App\Product::where('id',$queue->product_id)->first();*/
    $user=\App\User::where('id',$queue->first()->user_id)->first();
    $add=\App\Order::where('user_id',$user->id)->first();
    $rand=rand();
    ?>

    <div class="container-fluid">
        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="panel  panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin-top: 0; "><a href="http://perfumeclub.pk/">Perfumeclub.pk</a></h3>
                                <div class="col-md-6">
                                    <h3>Customer Invoice</h3>
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
                                    <th >Brand </th>
                                    <th >Product</th>
                                    <th >Gender</th>
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
    </div>
</div>

