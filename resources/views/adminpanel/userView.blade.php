@extends('adminpanel.master')
@section('title', 'Perfume Clube')
    <?php
            use App\Queue;
            use App\User;
            use App\Order;

    ?>
@section('content')
    <div class="content-wrapper" style="margin-bottom: -20px;">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>All Users Avialble in Admin Panel</h3></div>
            <div class="panel-body">
        <!--User View-->
        <div class='table-responsive'>
            <table class="table table-bordered table-hover">
                <thead>
                <tr class ="table_heading">
                    <th>Row</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Check Orders</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <?php
                 $user = User::where('id',$order->user_id)
                            ->first();
                 ?>
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->mobile_number}}</td>
                        <td>{{$user->email}}</td>
                        <td style="width: 12%;">
                            <a href="/user_que/{{$user->id}}">
                                <button class="table_btton">Check Orders</button>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm delete" data-delete="{{$user->id}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div align="center"> {{ $orders->links() }}</div>
        </div>
       </div>
       </div>
       </div>
        </div>
        </div>
    </div>
    <script>
        $(document).on('click' , '.delete' , function(){
            var id = $(this).data('delete');
            var params = id;
            bootbox.confirm({
                size: "small",
                message: "Are you sure?",
                callback: function(result){
                    if(result){
                        var url = "/user_delete/"+ id;

                        var successCallback = function (data) {
                            data = jQuery.parseJSON(data);
                            if (data.status == 'success')
                            {
                                window.location.reload();
                            } else
                            {
                            }
                        };
                        ajx(url, 'get', params, successCallback, 'html');

                    }
                }
            });
        })
    </script>
@endsection
