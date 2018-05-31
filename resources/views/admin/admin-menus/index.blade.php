@extends('layouts.admin.iframe')

@section('page-css-plugins')
    <link href="{{ asset('resources/plugins/treeTable/vsStyle/jquery.treeTable.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Page Options</a></li>
            <li class="active">Blank Page</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Blank Page
            <small>header small text goes here...</small>
        </h1>
        <!-- end page-header -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Panel Title here</h4>
                    </div>
                    <div class="panel-body">
                        <div id="toolbar" class="btn-group">
                            <a type="button" href="{{ url('admin/admin-menus/create') }}" class="btn btn-success">
                                <i class="fa fa-plus"> </i> 新增
                            </a>
                        </div>
                        <br><br>
                        <table class="table table-bordered table-hover" id="menu">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Menu Title</th>
                                <th>Link</th>
                                <th>Permission name</th>
                                <th>Icon</th>
                                <th>Sort</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr id="{{ $menu->id }}" pId="{{ $menu->parent_id }}">
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td><a href="{{ url($menu->href) }}">{{ $menu->href }}</a></td>
                                    <td>@if(isset($menu->permission->name)) {{ $menu->permission->name }}@endif</td>
                                    <td><i class="{{ $menu->icon }}"></i></td>
                                    <td>{{ $menu->sort }}</td>
                                    <td>{{ $menu->created_at }}</td>
                                    <td>{{ $menu->updated_at }}</td>
                                    <td>{!! $menu['button'] !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js-plugins')
    <script src="{{ asset('resources/plugins/treeTable/jquery.treeTable.js') }}"></script>
    <script src="{{ asset('resources/plugins/gritter/js/jquery.gritter.js') }}"></script>
@endsection

@section('page-js')
    @include('admin.admin-menus.javascript')
    <script>
        $(document).ready(function() {
            AdminMenus.index()
        });
    </script>
@endsection