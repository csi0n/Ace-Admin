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
                {!! Form::open(array('route'=>['admin.role.update',$role['id']],'method'=>'patch','class'=>'form-horizontal','role'=>'form')) !!}
                    <div class="form-group">
                        {!! Form::label('name',trans('labels.role.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name',$role['name'],['class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>trans('labels.role.name')]) !!}
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        {!! Form::label('slug',trans('labels.role.slug'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('slug',$role['slug'],['class'=>'col-xs-10 col-sm-5','id'=>'form-field-2','placeholder'=>trans('labels.role.slug')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description',trans('labels.role.description'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('description',$role['description'],['class'=>'col-xs-10 col-sm-5','id'=>'description','placeholder'=>trans('labels.role.description')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('level',trans('labels.role.level'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('level',$role['level'],['class'=>'col-xs-10 col-sm-5','id'=>'model','placeholder'=>trans('labels.role.level')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('form-field-3',trans('labels.role.status'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9" id="form-field-2">
                            <div id="form-field-3">
                                <label>
                                    <input @if($role['status']==0) checked @endif name="status" value="0" type="radio" class="ace">
                                    <span class="lbl">正常</span>
                                </label>
                                <label>
                                    <input @if($role['status']==1) checked @endif name="status" value="1" type="radio" class="ace">
                                    <span class="lbl">禁用</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">

                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-md-1 text-center">{{trans('labels.role.module')}}</th>
                                        <th class="col-md-10 text-center">{{trans('labels.role.permission')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($permissions)
                                        @foreach($permissions as $permission)
                                            @foreach($permission as $k=>$v)
                                                <tr>
                                                    <td class="text-center"> {{$k}} </td>
                                                    <td>
                                                @if(isDoubleArray($v))
                                                    @foreach($v as $val)
                                                                <div class="col-md-4">
                                                                    <div class="md-checkbox">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input name="permission[]" value="{{$val['id']}}" type="checkbox" class="ace" @if(in_array($val['id'],$role['permissions'])) checked @endif>
                                                                                <span class="lbl">{{$val['name']}}</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    @endforeach
                                                @else
                                                            <div class="col-md-4">
                                                                <div class="md-checkbox">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input name="permission[]" value="{{$v['id']}}" type="checkbox" class="ace" @if(in_array($v['id'],$role['permissions'])) checked @endif>
                                                                            <span class="lbl">{{$v['name']}}</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>

                        </div>
                    </div>
            </div>
                    <div class="">
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