@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                系统管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    用户管理
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">

                <!-- PAGE CONTENT BEGINS -->

                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">用户列表</h3>

                    <div class="table-responsive">
                        <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                           <table id="user" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                                <thead>
                                <tr role="row">
                                    <th class="center sorting_disabled" style="width: 56px;">
                                        <label>
                                            <input type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th class="sorting" style="width: 162px;">
                                        用户名
                                    </th>
                                    <th class="sorting"  style="width: 112px;">
                                        邮箱
                                    </th>
                                    <th class="hidden-480 sorting" style="width: 121px;">
                                        状态
                                    </th>
                                    <th class="sorting" style="width: 179px;">
                                        创建时间
                                    </th>
                                    <th class="hidden-480 sorting" style="width: 156px;">
                                        修改时间
                                    </th>
                                    <th class="sorting_disabled"  style="width: 155px;">
                                        操作
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
    <script  src="{{asset('backend/admin/user/dataTables.js')}}" type="text/javascript"></script>
@endsection