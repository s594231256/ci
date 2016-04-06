<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/assets/css/style.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url()?>include/bootstrap/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>include/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>include/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>include/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>include/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">

        <!-- Javascript -->
        <script src="<?php echo base_url()?>include/bootstrap/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url()?>include/bootstrap/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>include/bootstrap/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url()?>include/bootstrap/assets/js/scripts.js"></script>

    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>图书管理系统</h1>
                            <div class="description">
                            	<p>
	                            	欢迎使用xx图书管理系统
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>登录系统</h3>
                            		<p>请输入用户名和密码:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo site_url('login/check_login')?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">Username</label>
			                        	<input type="text" autocomplete="off" name="username" value="" placeholder="用户名..." class="username form-control" id="username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">Password</label>
			                        	<input type="password" autocomplete="off" name="password" placeholder="密码..." class="password form-control" id="password">
			                        </div>
			                        <button type="submit" class="btn">登录</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>合作伙伴</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
$(function(){
    $.backstretch("<?php echo base_url()?>include/bootstrap/assets/img/backgrounds/1.jpg");
})
</script>