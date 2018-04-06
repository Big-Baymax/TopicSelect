<!DOCTYPE html><html><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="renderer" content="webkit">    <meta http-equiv="Cache-Control" content="no-siteapp" />    <title>在线学生选题系统 - @yield('title')</title>    <meta name="keywords" content="_KEY_">    <meta name="description" content="_DES_">    <link rel="shortcut icon" href="_IMG_/favicon.ico">    <link href="/css/bootstrap.min.css" rel="stylesheet">    <link href="/css/font-awesome.min.css" rel="stylesheet">    <link href="/css/animate.min.css" rel="stylesheet">    <link href="/css/style.min.css" rel="stylesheet">    <link href="/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">    <link href="/css/admin-style.css" rel="stylesheet">    <link href="/js/plugins/multiple-select/multiple-select.css" rel="stylesheet">    <script src="/js/jquery-3.1.1.min.js"></script>    <script src="/js/bootstrap.min.js"></script>    <script src="/js/content.min.js"></script>    <script src="/js/plugins/layer/layer.js"></script>    <script src="/js/plugins/validate/jquery.validate.min.js"></script>    <script src="/js/plugins/validate/messages_zh.min.js"></script>    <script src="/js/plugins/bootstrap-table/bootstrap-table.js"></script>    <script src="/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>    <script src="/js/plugins/bootstrap-table/bootstrap-table-mobile.js"></script>    <script src="/js/plugins/bootstrap-table/tableExport.js"></script>    <script src="/js/plugins/bootstrap-table/bootstrap-table-export.js"></script>    <script src="/js/admin-js.js"></script>    <!--[if lt IE 9]>    <meta http-equiv="refresh" content="0;ie.html" />    <![endif]-->    @yield('css')</head><body class="gray-bg"><div class="wrapper wrapper-content animated fadeInRight">    <!-- Panel Other -->    <div class="ibox float-e-margins">        <div class="ibox-title">            <h5>                @yield('table_title')            </h5>            <div class="ibox-tools">            </div>        </div>        <div class="ibox-content">            <div class="row row-lg">                <div class="col-sm-12">                    @yield('table')                </div>            </div>        </div>    </div></div></body>@yield('model')@yield('linkjs')<script>    //验证插件初始化    $.validator.setDefaults({        highlight: function (e) {            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")        },        success: function (e) {            e.closest(".form-group").removeClass("has-error").addClass("has-success")        },        errorElement: "span",        errorPlacement: function (e, r) {            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())        },        errorClass: "help-block m-b-none",        validClass: "help-block m-b-none",    })</script>@yield('js')</html>