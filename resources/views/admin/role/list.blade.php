@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.role.systemManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.role.roleManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">{{trans('labels.role.list')}}</h3>
                <div class="table-responsive">
                    <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                        <table id="role" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                            <thead>
                            <tr role="row">
                                <th class="center sorting_disabled" style="width: 56px;">
                                    <label>
                                        <input type="checkbox" class="ace">
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th class="sorting" style="width: 162px;">
                                    {{trans('labels.role.name')}}
                                </th>
                                <th class="sorting"  style="width: 112px;">
                                    {{trans('labels.role.description')}}
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
    <script  src="{{asset('backend/admin/role/dataTables.js')}}" type="text/javascript"></script>
@endsection