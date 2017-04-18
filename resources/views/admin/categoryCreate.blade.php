@extends('layouts.adminLayouts')

@section('title','新建分类')

@section('sidebar')
    @include('adminCommon.adminSidebar')
@stop

@section('content')
    @include('adminCommon.categoryCreateForm')
@stop