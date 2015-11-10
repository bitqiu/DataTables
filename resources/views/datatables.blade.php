<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>防火墙IP地址规划表</title>
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/plugins/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.dataTables.scss">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container-fluid container-fixed-lg bg-white">
    <br>
    <div class="panel panel-transparent">
        <h1 style="text-align: center">IP地址规划</h1>
        <div class="panel-heading">
            <div class="panel-title"></div>
            <div class="export-options-container pull-right row">
                <div class="col-xs-5  pull-left">
                    <input type="text" id="search-table" class="form-control" placeholder="搜索">
                </div>
                <div class="col-xs-4 pull-left">
                    <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>添加</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                <tr>
                    <th>设备名称</th>
                    <th>IPMI地址范围</th>
                    <th>IPMI地址分配</th>
                    <th>管理地址范围</th>
                    <th>管理地址分配</th>
                    <th>园区网地址范围</th>
                    <th>园区网地址分配</th>
                    <th>设备用途</th>
                    <th>设备型号</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->ipmi_area }}</td>
                        <td>{{ $v->ipmi_addr }}</td>
                        <td>{{ $v->manage_area }}</td>
                        <td>{{ $v->manage_addr }}</td>
                        <td>{{ $v->park_area }}</td>
                        <td>{{ $v->park_addr }}</td>
                        <td>{{ $v->use }}</td>
                        <td>{{ $v->model }}</td>
                        <td><button class='btn btn-danger' data-id="{{ $v->id }}" onclick="del()">删除</button></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                    <h4 class="p-b-5"><span class="semi-bold">添加</span> 地址</h4>
                </div>
                <div class="modal-body">
                    <!--<p class="small-text">IP地址规划</p>-->
                    <form role="form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <!--<label>设备名称</label>-->
                                    <input id="name" type="text" class="form-control" placeholder="设备名称">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>IPMI地址范围</label>-->
                                    <input id="ipmi_area" type="text" class="form-control" placeholder="IPMI地址范围">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>IPMI地址分配</label>-->
                                    <input id="ipmi_addr" type="text" class="form-control" placeholder="IPMI地址分配">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>管理地址范围</label>-->
                                    <input id="manage_area" type="text" class="form-control" placeholder="管理地址范围">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>管理地址分配</label>-->
                                    <input id="manage_addr" type="text" class="form-control" placeholder="管理地址分配">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>园区网地址范围</label>-->
                                    <input id="park_area" type="text" class="form-control" placeholder="园区网地址范围">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>园区网地址分配</label>-->
                                    <input id="park_addr" type="text" class="form-control" placeholder="园区网地址分配">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>设备用途</label>-->
                                    <input id="use" type="text" class="form-control" placeholder="设备用途">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <!--<label>设备型号</label>-->
                                    <input id="model" type="text" class="form-control" placeholder="设备型号">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="add-data" type="button" class="btn btn-primary  btn-cons">添加</button>
                    <button type="button" class="btn btn-cons" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>

        </div>

    </div>

</div>

</div>

<script src="/assets/plugins/jquery/jquery.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="/assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="/assets/plugins/datatables/extensions/Bootstrap/jquery-datatable-bootstrap.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>