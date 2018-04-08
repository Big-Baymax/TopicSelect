@extends('admin/layouts.base')@section('title', '用户登录')@section('linkcss')    <link href="/css/login.min.css" rel="stylesheet">@endsection@section('css')    <style>        .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {            margin-top: 0px;            height: 16px;            width: 16px;        }    </style>@endsection@section('body')    <body class="login">    <div class="signinpanel">        <div class="row">            <div class="col-sm-7">                <div class="signin-info">                    <div class="logopanel m-b">                        <h1>毕业设计选题管理系统</h1>                    </div>                    <div class="m-b"></div>                    <h3>欢迎各位老师使用 <strong>Newing在线选题系统</strong></h3>                    <ul class="m-b">                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 高效率</li>                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 安全高</li>                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 反应快</li>                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 操做方便</li>                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 更新快</li>                    </ul>                    <strong>还没有账号？                        <a href="#">立即注册&raquo;</a>                    </strong>                </div>            </div>            <div class="col-sm-5">                <form id="login" onsubmit="return false;">                    <h4 class="no-margins">用户登录：</h4>                    <p class="m-t-md">请记得选择下面的用户身份</p>                    <div class="form-group">                        <input type="text" class="form-control uname" name="login_name" placeholder="用户名"                               required="required" maxlength="15"/>                    </div>                    <div class="form-group">                        <input type="password" class="form-control pword m-b" name="password" placeholder="密码"                               required="required" maxlength="15"/>                    </div>                    <div class="form-group">                        <label class="radio-inline">                            <input type="radio" name="identity" id="teacher" value="2" class="radio" required="required"> 教师                        </label>                        <label class="radio-inline">                            <input type="radio" name="identity" id="admin" value="1" class="radio"> 管理员                        </label>                    </div>                    <a href="">忘记密码了？</a>                    <button class="btn btn-primary btn-block" id="sumbit">登录</button>                </form>            </div>        </div>        <div class="signup-footer">            <div class="pull-left">                &copy; 2018 All Rights Reserved. 宁德师范学院计算机系            </div>        </div>    </div>    </body>@section('js')    <script>        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')            }        });        $("#sumbit").click(function () {            if ($('#login').validate().form()) {                //console.log($('#login').serialize());                $.ajax({                    url: '/admin/login',                    type: 'POST',                    data:$('#login').serialize(),                    success: function (result) {                        if (result.code) {                            //status为1成功                            layer.msg('' + result.msg, {                                icon: 1,                                time: 3000,                                end: function () {                                    //跳转到主页                                    parent.location.href = result.data.redirect_url;                                }                            });                        } else {                            layer.msg('' + result.msg, {icon: 2});                        }                    }                })            }        });    </script>@endsection@endsection