@extends('layouts.adminLayouts')

@section('title','分类管理')

@section('sidebar')
    @include('adminCommon.adminSidebar')
@stop

@section('content')
    @include('adminCommon.categoryListForm')
@stop