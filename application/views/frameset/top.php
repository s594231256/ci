<link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/css/bootstrap.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<!--<link rel="stylesheet" href="/include/bootstrap/css/bootstrap-theme.min.css">-->
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?php echo base_url()?>include/jquery-2.0.3.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php echo base_url()?>include/bootstrap/js/bootstrap.min.js"></script>
<style>
    .headder{background: rgba(39, 39, 39, 0.87);}   
</style>
<div class="headder" style="height:130px;">
<div class="navbar navbar-duomi navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0);" id="logo" style="color:white;"><h1>图书管理系统</h1></a>
        </div>
        <div class="navbar-header">
            <img style="width:100px;height:100px;margin-top: 17px;margin-left: 100px;" src="<?php echo base_url()?>include/images/girl.png" alt="">
        </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#">Link</a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="dropdown-toggle_set" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-bottom:50px;color:white;background: rgba(39, 39, 39, 0.87);"><h2>设置<span class="caret"></span></h2> </a>
          <ul class="dropdown-menu" style="margin-top:-50px;">
            <li><a href="#">退出登录</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">修改密码</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div>
</div>
</div>
