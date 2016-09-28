@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugin/css/jquery.gritter.css')}}"/>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.menu.systemManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.menu.menuManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div class="col-xs-12">
                @include('flash::message')
                <h3 class="header smaller lighter blue">{{trans('labels.menu.list')}}</h3>
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dd" id="nestable_list">
                                <ol class="dd-list">
                                    @if($menus)
                                        @foreach($menus as $v)
                                            @if($v['child'])
                                                <li class="dd-item" data-id="{{$v['id']}}" data-pid="{{$v['pid']}}">
                                                    <div class="dd-handle">
                                                        {{$v['name']}}
                                                        <div class="pull-right action-buttons">
                                                            @permission(config('admin.permissions.menu.create.name'))
                                                            <a class="blue" data-id="{{$v['id'  ]}}"
                                                               data-pid="{{$v['pid']}}" href="javascript:;">
                                                                <i class="icon-exclamation-sign bigger-130"></i>
                                                            </a>
                                                            @endpermission
                                                            @permission(config('admin.permissions.menu.edit.name'))
                                                            <a class="green editMenu" data-id="{{$v['id']}}"
                                                               data-pid="{{$v['pid']}}"
                                                               href="javascript:;" onclick="return false">
                                                                <i class="icon-pencil bigger-130"></i>
                                                            </a>
                                                            @endpermission
                                                            @permission(config('admin.permissions.menu.delete.name'))
                                                            <a href="javascript:;" onclick="return false"
                                                               class="red destoryMenu">
                                                                <i class="icon-trash bigger-130"></i>
                                                                {!! Form::open(array('route'=>['admin.menu.destroy',$v['id']],'method'=>'delete','name'=>'delete_item')) !!}{!! Form::close() !!}
                                                            </a>
                                                            @endpermission
                                                        </div>
                                                    </div>
                                                    <ol class="dd-list">
                                                        @foreach($v['child'] as $val)
                                                            <li class="dd-item item-orange" data-id="{{$val['id']}}"
                                                                data-pid="{{$val['pid']}}">
                                                                <div class="dd-handle">
                                                                    {{$val['name']}}
                                                                    <div class="pull-right action-buttons">
                                                                        @permission(config('admin.permissions.menu.edit.name'))
                                                                        <a class="green editMenu" onclick="return false"
                                                                           data-id="{{$val['id']}}"
                                                                           data-pid="{{$v['id']}}"
                                                                           href="javascript:;">
                                                                            <i class="icon-pencil bigger-130"></i>
                                                                        </a>
                                                                        @endpermission
                                                                        @permission(config('admin.permissions.menu.delete.name'))
                                                                        <a href="javascript:;" onclick="return false"
                                                                           class="red destoryMenu">
                                                                            <i class="icon-trash bigger-130"></i>
                                                                            {!! Form::open(array('route'=>['admin.menu.destroy',$val['id']],'method'=>'delete','name'=>'delete_item')) !!}{!! Form::close() !!}
                                                                        </a>
                                                                        @endpermission
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </li>
                                            @else
                                                <li class="dd-item" data-id="{{$v['id']}}" data-pid="{{$v['pid']}}">
                                                    <div class="dd-handle">
                                                        {{$v['name']}}
                                                        <div class="pull-right action-buttons">
                                                            @permission(config('admin.permissions.menu.create.name'))
                                                            <a class="blue" data-id="{{$v['id'  ]}}"
                                                               data-pid="{{$v['pid']}}" href="javascript:;">
                                                                <i class="icon-exclamation-sign bigger-130"></i>
                                                            </a>
                                                            @endpermission
                                                            @permission(config('admin.permissions.menu.edit.name'))
                                                            <a class="green editMenu" data-id="{{$v['id']}}"
                                                               data-pid="{{$v['pid']}}"
                                                               href="javascript:;" onclick="return false">
                                                                <i class="icon-pencil bigger-130"></i>
                                                            </a>
                                                            @endpermission
                                                            @permission(config('admin.permissions.menu.delete.name'))
                                                            <a href="javascript:;" onclick="return false"
                                                               class="red destoryMenu">
                                                                <i class="icon-trash bigger-130"></i>
                                                                {!! Form::open(array('route'=>['admin.menu.destroy',$v['id']],'method'=>'delete','name'=>'delete_item')) !!}{!! Form::close() !!}
                                                            </a>
                                                            @endpermission
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>

                        <div class="vspace-sm-5"></div>

                        <div class="col-sm-6">
                            {!! Form::open(array('route'=>'admin.menu.store','method'=>'post','class'=>'form-horizontal','role'=>'form','id'=>'menuForm')) !!}
                            <div class="form-group">
                                {!! Form::label('name',trans('labels.menu.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('name',old('name'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.name')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('language',trans('labels.menu.language'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('language',old('language'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.language')]) !!}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                {!! Form::label('icon',trans('labels.menu.icon'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('icon',old('icon'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.icon')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    {!! Form::label('pid',trans('labels.menu.pid'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                    <div class="col-sm-9">
                                        <select class="col-xs-10 col-sm-5" id="pid" name="pid">
                                            @if(!empty($menus))
                                                <option value="0">{{trans('labels.menu.topMenu')}}</option>
                                                @foreach($menus as $menu)
                                                    <option value="{{$menu['id']}}">{{$menu['name']}}</option>
                                                    @if(!empty($menu['child']))
                                                        @foreach($menu['child'] as $v)
                                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                {!! Form::label('slug',trans('labels.permission.slug'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('slug',old('slug'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.permission.slug')]) !!}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                {!! Form::label('url',trans('labels.menu.url'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('url',old('url'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.url')]) !!}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                {!! Form::label('description',trans('labels.menu.description'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('description',old('description'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.description')]) !!}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                {!! Form::label('sort',trans('labels.menu.sort'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9">
                                    {!! Form::number('sort',old('sort'),['class'=>'col-xs-10 col-sm-5','placeholder'=>trans('labels.menu.sort')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('form-field-3',trans('labels.menu.status'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                                <div class="col-sm-9" id="form-field-2">
                                    <div id="form-field-3">
                                        <label>
                                            <input checked name="status" value="0" type="radio" class="ace">
                                            <span class="lbl">正常</span>
                                        </label>
                                        <label>
                                            <input name="status" value="1" type="radio" class="ace">
                                            <span class="lbl">禁用</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">
                                        <i class="icon-ok bigger-110"></i>
                                        {{trans('labels.submit')}}
                                    </button>
                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        {{trans('labels.reset')}}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
            @endsection
            @section('js')
                <script src="{{asset('backend/plugin/js/jquery.nestable.min.js')}}"></script>
                <script src="{{asset('backend/plugin/js/jquery.gritter.min.js')}}"></script>
                <script type="text/javascript">
                    jQuery(function ($) {
                        $('#nestable_list').nestable({
                            "maxDepth": 2,
                        }).on('dragEnd', function (event, item, source, destination) {
                            var currentItemId = $(item).attr('data-id');
                            var currentItemPid = $(item).attr('data-pid');
                            var itemParentId = $(item).parent().parent().attr('data-id');
                            itemParentId = itemParentId == undefined ? 0 : itemParentId;
                            if (currentItemPid == itemParentId) {
                                return false;
                            }
                            $.ajax({
                                url: '/admin/menu/sort',
                                data: {
                                    currentItemId: currentItemId,
                                    itemParentId: itemParentId,
                                    _token: '{{csrf_token()}}',
                                },
                                type: 'post',
                                dataType: 'json',
                                success: function (result) {
                                    $.gritter.add({
                                        title: '{{trans('alerts.notice')}}',
                                        text: result.msg,
                                        class_name: 'gritter-info gritter-center'
                                    });
                                }
                            });
                        });
                        $('.dd-handle a').on('mousedown', function (e) {
                            e.stopPropagation();
                        });
                        $('[data-rel="tooltip"]').tooltip();
                        $(document).on('click', '.destoryMenu', function () {
                            $(this).find('form[name="delete_item"]').submit();
                        });
                        $(document).on('click', '.editMenu', function () {
                            var data_id = $(this).attr('data-id');
                            $.ajax({
                                url: '/admin/menu/' + data_id + '/edit',
                                type: 'get',
                                success: function (result) {
                                    menuFun.initAttribute(result);
                                }
                            });
                        })
                    });
                    var menuFun = function () {
                        var menusAttribute = function (result) {
                            $('input[name="name"]').val(result.name);
                            $('input[name="language"]').val(result.language);
                            $('input[name="icon"]').val(result.icon);
                            $('select[name="pid"]').val(result.pid);
                            $('input[name="slug"]').val(result.slug);
                            $('input[name="url"]').val(result.url);
                            $('input[name="description"]').val(result.description);
                            $('input[name="sort"]').val(result.sort);
                            $('#menuForm').attr('action',result.update);
                            $('#menuForm').append('<input type="hidden" name="_method" value="PATCH">');
                        };
                        return {
                            initAttribute: menusAttribute
                        }
                    }();
                </script>
@endsection