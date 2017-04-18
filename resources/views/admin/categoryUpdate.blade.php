@extends('layouts.adminLayouts')

@section('title','修改分类')

@section('sidebar')
    @include('adminCommon.adminSidebar')
@stop

@section('content')
    @include('adminCommon.categoryUpdateForm')
@stop