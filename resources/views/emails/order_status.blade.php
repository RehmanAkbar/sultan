
your order status is : {{$status}} of
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
<h3><a href="http://perfumeclub.pk/">Perfumeclub.pk</a></h3>