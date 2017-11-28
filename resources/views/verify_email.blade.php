<style>
    #msg {

        width: 50%;

        text-align: center;
        margin: auto;
    }
</style>
@extends('layouts.layout')
@section('contant')
<div style="padding-top: 10%; padding-bottom: 23%">
    <div class="alert alert-success" id="msg">
        <strong>{{$massege}}!</strong> .
    </div>
</div>
@endsection