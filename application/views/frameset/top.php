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
            <a class="navbar-brand" target="mainFrame" href="<?php echo site_url("login/index?top_logo=1") ?>" id="logo" style="color:white;"><h1>图书管理系统</h1></a>
        </div>
        <div class="navbar-header">
            <img style="width:100px;height:100px;margin-top: 17px;margin-left: 100px;" src="<?php echo base_url()?>include/images/girl.png" alt="">
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav nav-pills navbar-right" style="margin-top:10px;">
                <li role="presentation" style="color:whitesmoke;margin-top:10px;"><h3><?php echo $this->session->userdata('username');?></h3></li>
                <li role="presentation"><a href="javascript:void(0);" class="top_con" id="login_out" style="color:whitesmoke;"><h3>退出登录</h3></a></li>
                <!--<li role="presentation"><a href="#" style="color:whitesmoke;"><h3>修改密码</h3></a></li>-->
            </ul>
        </div>
    </div>
</div>
</div>
<script>
$(function(){
    $('.top_con').mouseover(function(){
        $(this).css('background','#696969');
    })
    $('.top_con').mouseout(function(){
        $(this).css('background','');
    })
    $('#login_out').click(function(){
        if(confirm('确定退出登录吗？')){
            window.location.href='<?php echo site_url("login/login_out") ?>';
        }
    })
})
</script>