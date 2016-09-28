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
                @include('common.errors')
                <!-- PAGE CONTENT BEGINS -->
                {!! Form::open(array('route'=>['admin.permission.update',$permission->id],'method'=>'patch','class'=>'form-horizontal','role'=>'form')) !!}
                    <div class="form-group">
                        {!! Form::label('name',trans('labels.permission.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name',$permission['name'],['class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>trans('labels.permission.name')]) !!}
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        {!! Form::label('slug',trans('labels.permission.slug'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('slug',$permission['slug'],['class'=>'col-xs-10 col-sm-5','id'=>'form-field-2','placeholder'=>trans('labels.permission.slug')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('form-field-3',trans('labels.permission.status'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9" id="form-field-2">
                            <div id="form-field-3">
                                <label>
                                    <input @if($permission['status']==0) checked @endif name="status" value="0" type="radio" class="ace">
                                    <span class="lbl">正常</span>
                                </label>
                                <label>
                                    <input @if($permission['status']==1) checked @endif name="status" value="1" type="radio" class="ace">
                                    <span class="lbl">禁用</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description',trans('labels.permission.description'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('description',$permission['description'],['class'=>'col-xs-10 col-sm-5','id'=>'description','placeholder'=>trans('labels.permission.description')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model',trans('labels.permission.model'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('model',$permission['model'],['class'=>'col-xs-10 col-sm-5','id'=>'model','placeholder'=>trans('labels.permission.model')]) !!}
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                {{trans('labels.save')}}
                            </button>
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                {{trans('labels.reset')}}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
                {{--</form>--}}
            </div><!-- /.col -->
        </div>
    </div><!-- /.page-content -->
@endsection