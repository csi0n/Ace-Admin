@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.permission.systemManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.permission.permissionManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">{{trans('labels.permission.name')}}</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="{{trans('labels.permission.name')}}" name="name" class="col-xs-10 col-sm-5">
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">{{trans('labels.permission.slug')}}</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-2" placeholder="{{trans('labels.permission.slug')}}" name="slug" class="col-xs-10 col-sm-5">
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button">
                                <i class="icon-ok bigger-110"></i>
                                {{trans('labels.submit')}}
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                {{trans('labels.reset')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
        </div>
    </div><!-- /.page-content -->
@endsection
@section('js')
    {{--<script  src="{{asset('backend/admin/permission/dataTables.js')}}" type="text/javascript"></script>--}}
@endsection