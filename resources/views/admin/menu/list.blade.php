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
                    <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                        <table id="permission" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                            <thead>
                            <tr role="row">
                                <th class="center sorting_disabled" style="width: 56px;">
                                    <label>
                                        <input type="checkbox" class="ace">
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.name')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.language')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.icon')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.slug')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.url')}}
                                </th>
                                <th class="sorting"  style="width: 112px;">
                                    {{trans('labels.menu.description')}}
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.menu.sort')}}
                                </th>
                                <th class="hidden-480 sorting" style="width: 121px;">
                                    {{trans('labels.role.status')}}
                                </th>
                                <th class="sorting" style="width: 179px;">
                                    {{trans('labels.user.created_at')}}
                                </th>
                                <th class="hidden-480 sorting" style="width: 156px;">
                                    {{trans('labels.user.updated_at')}}
                                </th>
                                <th class="sorting_disabled"  style="width: 155px;">
                                    {{trans('labels.user.action')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection

@section('js')
    <script  src="{{asset('backend/admin/menu/dataTables.js')}}" type="text/javascript"></script>
@endsection