@extends('layouts.admin')
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
                <h3 class="header smaller lighter blue">{{trans('labels.menu.list')}}</h3>
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    @if($menus)
                                        @foreach($menus as $v)
                                            @if($v['child'])
                                                <li class="dd-item" data-id="{{$v['id']}}" data-pid="{{$v['pid']}}">
                                                    <div class="dd-handle">
                                                        <div class="pull-right action-buttons">
                                                            {{$v->GetActionButton()}}
                                                        </div>
                                                    </div>
                                                    <ol class="dd-list">
                                                        @foreach($v['child'] as $val)
                                                            <li class="dd-item item-orange" data-id="{{$val['id']}}" data-pid="{{$val['pid
                                                            ']}}">
                                                                <div class="dd-handle"> Item 6</div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif


                                    <li class="dd-item" data-id="2">
                                        <button data-action="collapse" type="button">Collapse</button>
                                        <button data-action="expand" type="button" style="display: none;">Expand
                                        </button>
                                        <div class="dd-handle">Item 2</div>

                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">
                                                    Item 3
                                                    <a data-rel="tooltip" data-placement="left" title="" href="#"
                                                       class="badge badge-primary radius-5 tooltip-info pull-right white no-hover-underline"
                                                       data-original-title="Change Event Date">
                                                        <i class="bigger-120 icon-calendar"></i>
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="dd-item" data-id="4">
                                                <div class="dd-handle">
                                                    <span class="orange">Item 4</span>
                                                    <span class="lighter grey">
																	&nbsp; with some description
																</span>
                                                </div>
                                            </li>

                                            <li class="dd-item" data-id="5">
                                                <button data-action="collapse" type="button">Collapse</button>
                                                <button data-action="expand" type="button" style="display: none;">
                                                    Expand
                                                </button>
                                                <div class="dd-handle">
                                                    Item 5
                                                    <div class="pull-right action-buttons">
                                                        <a class="blue" href="#">
                                                            <i class="icon-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red" href="#">
                                                            <i class="icon-trash bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <ol class="dd-list">
                                                    <li class="dd-item item-orange" data-id="6">
                                                        <div class="dd-handle"> Item 6</div>
                                                    </li>

                                                    <li class="dd-item item-red" data-id="7">
                                                        <div class="dd-handle">Item 7</div>
                                                    </li>

                                                    <li class="dd-item item-blue2" data-id="8">
                                                        <div class="dd-handle">Item 8</div>
                                                    </li>
                                                </ol>
                                            </li>

                                            <li class="dd-item" data-id="9">
                                                <div class="dd-handle btn-yellow no-hover">Item 9</div>
                                            </li>

                                            <li class="dd-item" data-id="10">
                                                <div class="dd-handle">Item 10</div>
                                            </li>
                                        </ol>
                                    </li>

                                    <li class="dd-item" data-id="11">
                                        <div class="dd-handle">
                                            Item 11
                                            <span class="sticker">
															<span class="label label-success arrowed-in">
																<i class="icon-ok bigger-110"></i>
															</span>
														</span>
                                        </div>
                                    </li>

                                    <li class="dd-item" data-id="12">
                                        <div class="dd-handle">Item 12</div>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div class="vspace-sm-16"></div>

                        <div class="col-sm-6">

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
                <script type="text/javascript">
                    jQuery(function ($) {
                        $('.dd').nestable();
                        $('.dd-handle a').on('mousedown', function (e) {
                            e.stopPropagation();
                        });
                        $('[data-rel="tooltip"]').tooltip();

                    });
                </script>

@endsection