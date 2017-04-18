@extends('layouts.adminLayouts')

@section('title','计划管理')

@section('style')

@stop

@section('sidebar')
    @include('adminCommon.adminSidebar')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11" style="padding:25px;">
                @include('common.message')
                <div class="manageBar">
                    <a href="articlePlanCreate"><span class="glyphicon glyphicon-plus"></span>&nbsp;新增计划</a>
                </div>
                <div class="table-responsive">
                    @if(!empty($plans) && count($plans)>0)
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <caption>
                                <h3>计划列表</h3>
                            </caption>
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>内容</th>
                                <th>创建时间</th>
                                <th>最后修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $plans as $plan )
                                <tr>
                                    <td>{{ $plan->id }}</td>
                                    <td>{{ $plan->markdown_content }}</td>
                                    <td>{{ $plan->created_at }}</td>
                                    <td>{{ $plan->updated_at }}</td>
                                    <td>
                                        <a href="articlePlanUpdate/{{ $plan->id }}">修改</a>
                                        <a href="{{ url('articlePlanDelete',['id' => $plan->id]) }}"
                                           onclick="if(confirm('你确定要删除这个计划吗？') == false) return false;">删除</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    @else
                        <h3 style="text-align: center">没有数据</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop















