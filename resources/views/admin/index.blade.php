@extends('layouts.adminLayouts')

@section('title','主页')

@section('style')

@endsection

@section('header')
    @include('common.adminHeader')
@endsection

@section('sidebar')
    @include('adminCommon.adminSidebar')
@endsection

@section('content')
    @include('adminCommon.adminIndex')
    @section('footer')
        @include('common.footer')
    @endsection
@endsection

@section('script')
@endsection