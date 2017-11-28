@extends('layouts.layout')
@section('custom_css')
<link href="{{URL::asset('css/detail-perfum.css') }}" rel="stylesheet">
<link href="{{URL::asset('css/chekout.css') }}" rel="stylesheet">
<style>
    /*        table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }*/
    .panel-table .panel-body{
        padding:0;
    }

    .panel-table .panel-body .table-bordered{
        border-style: none;
        margin:0;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
        text-align:center;
        width: 100px;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
    .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
        border-right: 0px;
    }

    .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
    .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
        border-left: 0px;
    }

    .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
        border-bottom: 0px;
    }

    .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
        border-top: 0px;
    }

    .panel-table .panel-footer .pagination{
        margin:0; 
    }

    /*
    used to vertically center elements, may need modification if you're not using default sizes.
    */
    .panel-table .panel-footer .col{
        line-height: 34px;
        height: 34px;
    }

    .panel-table .panel-heading .col h3{
        line-height: 30px;
        height: 30px;
    }

    .panel-table .panel-body .table-bordered > tbody > tr > td{
        line-height: 34px;
    }


</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

@endsection
@section('contant')
<?php

Use App\Product;
use App\Brand;

$user = Auth::User();
?>
@include('include.sub_header')

<div class="container">
    <div class="row" style="margin-top: 10%;">

        <p></p>
        <h1 style="padding-bottom: 4%;margin-left: 9%">Subscription Plan</h1>
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">My Subscriptions</h3>
                        </div>
<!--                        <div class="col col-xs-6 text-right">
                            <button type="button" onclick="window.location.href = '/per_detail';" class="btn btn-sm btn-primary btn-create">Add New Item in Queue</button>
                        </div>-->
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Plan Package Name</th>
                                <th>Plan Package Price</th>
                                <th>Started at</th>
                                <th>Valid Till</th>
                                <th>Status</th>
                                
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="@if($loop->index % 2 == 0)success @endif">
                                <td>{{ $loop->index+1 }}</td>
                                <td>Starter</td>
                                <td>399 Rs</td>
                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at) )->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($order->valid_till) )->diffForHumans() }}</td>
                                <td>In Process</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <span class="pull-right">{{ $orders->links() }}</span>
                    </div>
                </div>
            </div>

        </div></div></div>



@endsection
@section('custom_js')
@endsection