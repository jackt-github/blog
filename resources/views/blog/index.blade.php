@extends('layouts.layouts')

@section('title','首页')

@section('content')
    <div class="col-md-9" >
        <div class="row" id="content">
            @include('common.content')
        </div>
    </div>
@stop

@section('sidebar')
    <div class="col-md-3">
        @include('common.sidebar')
    </div>
@stop











