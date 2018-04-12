@extends('admin.layouts.table')@section('title', '课题类别管理')@section('table_title','课题类别管理')@section('table')    <!-- Example Card View -->    <div class="example-wrap">        <div id="exampleToolbar">            <form id="filter">                <div class="btn-group hidden-xs">                    <button type="button" class="btn btn-outline btn-default" id="add" data-toggle="tooltip"                            data-animation="false" data-original-title="添加">                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>                    </button>                    <button type="button" class="btn btn-outline btn-default" id="del" data-toggle="tooltip"                            data-animation="false" data-original-title="删除">                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>                    </button>                    <button type="button" class="btn btn-outline btn-default" id="edit" data-toggle="tooltip"                            data-animation="false" data-original-title="修改">                        <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>                    </button>                </div>            </form>        </div>        <div class="example">            <div class="btn-group hidden-xs" id="exampleToolbar" role="group">            </div>            <table id="table" data-toggle="table" data-card-view="true" data-mobile-responsive="true"                   data-click-to-select="true" data-unique-id="id" data-show-export="true">                <thead>                <tr>                    <th data-field="state" data-checkbox="true"></th>                    <th data-field="id" data-sortable="true">分类ID</th>                    <th data-field="name" data-sortable="true">类名</th>                    <th data-field="weight" data-sortable="true">权重（排序）</th>                    <th data-field="created_at" data-sortable="true">添加时间</th>                    <th data-field="updated_at" data-sortable="true">修改时间</th>                </tr>                </thead>            </table>        </div>    </div>    <!-- End Example Card View -->@endsection@section('model')    <div class="modal fade add-model" tabindex="-1" role="dialog">        <div class="modal-dialog" role="document">            <div class="modal-content">                <div class="modal-header">                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>                    </button>                    <h4 class="modal-title">添加</h4>                </div>                <div class="modal-body">                    <form method="post" id="add-form">                        <div class="form-group">                            <label>类名</label>                            <input type="text" id="name" name="name" placeholder="请输入类名" class="form-control"                                   required="required" maxlength="10">                        </div>                        <div class="form-group">                            <label>权重</label>                            <input type="text" id="weight" name="weight" placeholder="请输入权重" class="form-control"                                   required="required" maxlength="5">                        </div>                    </form>                </div>                <div class="modal-footer">                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>                    <button id="add-confirm" type="button" class="btn btn-primary">确定</button>                </div>            </div>        </div>    </div>    <div class="modal fade edit-model" tabindex="-1" role="dialog">        <div class="modal-dialog" role="document">            <div class="modal-content">                <div class="modal-header">                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>                    </button>                    <h4 class="modal-title" id="title">修改</h4>                </div>                <div class="modal-body">                    <form method="post" id="edit-form">                        <div class="form-group">                            <label>类名</label>                            <input type="text" id="B-name" name="name" placeholder="请输入类名" class="form-control"                                   required="required" maxlength="10">                        </div>                        {{method_field('put')}}                        <div class="form-group">                            <label>权重</label>                            <input type="text" id="B-weight" name="weight" placeholder="请输入权重" class="form-control"                                   required="required" maxlength="5">                        </div>                    </form>                </div>                <div class="modal-footer">                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>                    <button id="edit-confirm" type="button" class="btn btn-primary">确定</button>                </div>            </div>        </div>    </div>@endsection@section('linkjs')@endsection@section('js')    <script>        $.validator.setDefaults({            highlight: function (e) {                $(e).closest(".form-group").removeClass("has-success").addClass("has-error")            },            success: function (e) {                e.closest(".form-group").removeClass("has-error").addClass("has-success")            },            errorElement: "span",            errorPlacement: function (e, r) {                e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())            },            errorClass: "help-block m-b-none",            validClass: "help-block m-b-none",        })        $('#table').bootstrapTable({            pagination: true,            url: '/admin/topicCategories',            showRefresh: true,            showToggle: true,            showColumns: true,            method: 'get',            sortName: 'created_at',            height: 600,            pageSize: 10,            pageNumber: 1,//开始的时候是第几页            pageList: [5, 10, 15, 25, 'ALL'],            queryParamsType: '',            dataField: 'data',//指定            sidePagination: "server",            toolbar: "#exampleToolbar",            iconSize: "outline",            sortOrder: "desc",            icons: {                refresh: "glyphicon-repeat",                toggle: "glyphicon-list-alt",                columns: "glyphicon-list",            }        });        function statusFormatter(value, row, index) {            if (value == 1) {                return '<a class="label label-primary defriend" href="#" data_id="' + row.id + '">已启用</a>'            } else {                return '<a class="label label-danger defriend" href="#"  data_id="' + row.id + '">已禁用</a>'            }        }        $(document).ready(function () {            // Tooltip            $('[data-toggle="tooltip"]').tooltip({                trigger: 'hover'            });            //基本操做 参数说明（表格对象 ， 添加接口 ，删除接口 ，编辑接口 ，重置接口 ，禁用接口）            user_operate($('#table'), '/admin/topicCategories', '/admin/topicCategories/delete', '/admin/topicCategories/', '', '/admin/topicCategories/ops');        });    </script>@endsection