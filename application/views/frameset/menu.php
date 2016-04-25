<link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/css/bootstrap.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<!--<link rel="stylesheet" href="/include/bootstrap/css/bootstrap-theme.min.css">-->
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?php echo base_url()?>include/jquery-2.0.3.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php echo base_url()?>include/bootstrap/js/bootstrap.min.js"></script>
<style>
    body{padding-top: 50px;padding-left: 50px;}
    #menu-nav a{margin-top: 10px;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <ul id="menu-nav" class="nav nav-tabs nav-stacked"  style="font-size: 20px;">
                <li>
                    <a target="mainFrame"href="<?php echo site_url("books/index") ?>"><i class="glyphicon glyphicon-globe"></i>图书管理</a>
                </li>
                <li>
                    <a target="mainFrame"href="<?php echo site_url("video/index") ?>"><i class="glyphicon glyphicon-adjust"></i>视频图书</a>
                </li>
                <?php if($this->session->userdata('user_type') == 1){?>
                <li>
                    <a target="mainFrame"href="<?php echo site_url("category/index") ?>"><i class="glyphicon glyphicon-credit-card"></i>分类管理</a>      
                </li>
                <li>
                    <a target="mainFrame"href="<?php echo site_url("user/index") ?>"><i class="glyphicon glyphicon-user"></i>用户管理</a>
                </li>
                <?php }?>
                <li>
                    <a target="mainFrame"href="<?php echo site_url("book_borrow/index") ?>"><i class="glyphicon glyphicon-calendar"></i>历史记录</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
$('li').click(function(){
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
})
</script>