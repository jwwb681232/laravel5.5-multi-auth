@extends('layouts.admin.iframe')

@section('page-css-plugins')
    <link href="{{ asset('resources/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('resources/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
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
                            <button id="btn_add" type="button" class="btn btn-success" onclick="addVideoShow();">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                            </button>
                            <button id="btn_delete" type="button" class="btn btn-default" onclick="batchUploadShow();">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>批量上传
                            </button>
                            <button id="btn_edit" type="button" class="btn btn-default" onclick="editMemberInfoShow();">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>选择修改
                            </button>
                            <button id="btn_delete" type="button" class="btn btn-default" onclick="delMemberVideo();">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>选择删除
                            </button>
                        </div>
                        <table id="data-table" class="table table-hover"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js-plugins')
    <script src="{{ asset('resources/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('resources/plugins/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('resources/plugins/table-export/tableExport.min.js') }}"></script>
    <script src="{{ asset('resources/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('resources/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('page-js')
    @include('admin.roles.javascript')
    <script>
        $(document).ready(function() {
            Roles.index();
        });
    </script>
@endsection