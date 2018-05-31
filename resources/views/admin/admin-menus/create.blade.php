@extends('layouts.admin.iframe')

@section('page-css-plugins')
    <link href="{{ asset('resources/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
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
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" data-parsley-validate action="{{ url('admin/admin-menus') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Menu Name <span style="color: red;font-weight: 600">*</span> :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <input class="form-control"
                                               @if($errors->has('name'))data-toggle="tooltip" data-placement="top" data-original-title="{{ $errors->first('name') }}" @endif
                                               type="text"
                                               data-type="text"
                                               name="name"
                                               id="name"
                                               placeholder="Enter Menu Name"
                                               data-parsley-required="true"
                                               data-parsley-minlength="3"
                                               data-parsley-maxlength="200"
                                               value="{{ old('name') }}"
                                        />
                                        @if($errors->has('name'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('href')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Menu Link <span style="color: red;font-weight: 600">*</span> :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <input class="form-control"
                                               @if($errors->has('href'))data-toggle="tooltip" data-placement="top" data-original-title="{{ $errors->first('href') }}" @endif
                                               type="text"
                                               data-type="text"
                                               name="href"
                                               id="href"
                                               placeholder="Enter Menu Link"
                                               data-parsley-required="true"
                                               data-parsley-minlength="3"
                                               data-parsley-maxlength="200"
                                               value="{{ old('href') }}"
                                        />
                                        @if($errors->has('name'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('icon')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Menu Icon :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-frown-o"></i></span>
                                            <input class="form-control"
                                                   @if($errors->has('icon'))data-toggle="tooltip" data-placement="top" data-original-title="{{ $errors->first('icon') }}" @endif
                                                   type="text"
                                                   data-type="text"
                                                   name="icon"
                                                   id="icon"
                                                   placeholder="Enter Menu Icon"
                                                   data-parsley-minlength="3"
                                                   data-parsley-maxlength="200"
                                                   value="{{ old('icon') }}"
                                            />
                                        </div>
                                        @if($errors->has('icon'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('parent_id')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Parent Menu <span style="color: red;font-weight: 600">*</span> :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <select class="form-control" id="parent_id_select">
                                            <option value="0">Top Menu</option>
                                            @foreach($topMenus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('parent_id'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('sort')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Menu Sort <span style="color: red;font-weight: 600">*</span> :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <input class="form-control"
                                               @if($errors->has('sort'))data-toggle="tooltip" data-placement="top" data-original-title="{{ $errors->first('sort') }}" @endif
                                               type="number"
                                               data-type="text"
                                               name="sort"
                                               id="sort"
                                               placeholder="Enter Menu Sort"
                                               data-parsley-required="true"
                                               data-parsley-min="0"
                                               data-parsley-max="65535"
                                               value="{{ old('sort') }}"
                                        />
                                        @if($errors->has('sort'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('permission_id')) has-error has-feedback @endif">
                                    <label class="control-label col-md-3 col-sm-3">Permission <span style="color: red;font-weight: 600">*</span> :</label>
                                    <div class="col-md-7 col-sm-7">
                                        <select class="form-control" id="permission_id_select">
                                            @foreach($topPermissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('permission_id'))
                                            <span class="ion-close form-control-feedback"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3"></label>
                                    <div class="col-md-7 col-sm-7">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js-plugins')
    <script src="{{ asset('resources/plugins/parsley/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('resources/plugins/select2/dist/js/select2.min.js') }}"></script>
@endsection

@section('page-js')
    @include('admin.admin-menus.javascript')
    <script>
        $(document).ready(function() {
            AdminMenus.create()
        });
    </script>

@endsection