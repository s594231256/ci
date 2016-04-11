<section class="content-header"><h2>添加用户</h2></section>
<form role="form" action="<?php echo site_url('user/create')?>" method="post" class="login-form">
<section class="content">
  <div class="panel">
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">用户名</span>
    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php if(!empty($user_info['username']))echo $user_info['username'];?>" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">学号</span>
    <input type="text" class="form-control" name="student_code" id="student_code" value="<?php if(!empty($user_info['student_code']))echo $user_info['student_code'];?>" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">密码</span>
    <input type="text" class="form-control" name="password" id="password" value="" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">邮箱</span>
    <input type="text" class="form-control" name="mail" value="<?php if(!empty($user_info['email']))echo $user_info['email'];?>" aria-describedby="basic-addon1">
  </div>
  <div class="dropdown col-md-14 my-margin-top">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span id="show_user_type">
          <?php 
          if(empty($user_info['user_type']))
          {
              echo '选择用户类型';
          }else if($user_info['user_type'] == 1)
          {
              echo '管理员';
          }else if($user_info['user_type'] == 2)
          {
              echo '学生';
          }
          ?></span>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a id="1" href='javascript:void(0);'>管理员</a></li>
         <li><a id="2" href='javascript:void(0);'>学生</a></li>
    </ul>
  <input type="hidden" name="user_type" id="user_type" value="<?php if(!empty($user_info['user_type']))echo $user_info['user_type'];?>"/>
  <input type="hidden" name="act" id="act" value="<?php echo $act;?>"/>
  <input type="hidden" name="user_id" id="user_id" value="<?php echo empty($user_id) ? '' : $user_id;?>"/>
  </div>
  </div>
</section>
  <div class="panel my-margin-top">
    <input id="all-ok" type="button" class="input-group col-md-1 btn btn-success" value="保存">
  </div>
</form>
</body>
</html>
<script>
$(function(){
    $('.dropdown-menu a').click(function(){
        var id = $(this).attr('id');
        var name = $(this).html();
        $('#show_user_type').html(name);
        $('#user_type').val(id);
    })
    $('#all-ok').click(function(){
        var user_name = $.trim($('#user_name').val());
        if(user_name == '')
        {
            alert('请填写用户名');
            return false;
        }
        var user_type = $('#user_type').val();
        if(user_type == '')
        {
            alert('请选择用户类型');
            return false;
        }else if(user_type == 2){
            var student_code = $.trim($('#student_code').val());
            if(student_code == '')
            {
                alert('请填写学号');
                return false;
            }
        }
        $('.login-form').submit();
    })
})
</script>