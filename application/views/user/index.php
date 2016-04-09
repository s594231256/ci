<div>
<form role="form" action="<?php echo site_url('user/index')?>" method="post" class="login-form">
  <div class="col-md-2">
    <label for="user_name">用户名</label>
    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php if(!empty($param['user_name']))echo $param['user_name'];?>">
  </div>
  <div class="col-md-2">
    <label for="student_code">学号</label>
    <input type="text" class="form-control" id="student_code" name="student_code" value="<?php if(!empty($param['student_code']))echo $param['student_code'];?>">
  </div>
  <div class="form-group col-md-5" style="margin-top: 22px;">
    <button type="submit" class="btn btn-success">搜索</button>
    <button type="button" id="reset" class="btn btn-success">重置</button>
    <a style="margin-left: 22px;" href="<?php echo site_url('user/create')?>" class="btn btn-success">新增用户</a>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>用户名</td>
    <td>学号</td>
    <td>用户类型</td>
    <td>操作</td>
  </tr>
  <?php 
  if(!empty($user))
  {
    foreach($user as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['username'];?></td>
    <td><?php echo empty($v['student_code']) ? '' : $v['student_code'];?></td>
    <td><?php echo $v['user_type'] == 1 ? '管理员' : '学生';?></td>
    <td>
        <?php if($v['user_type'] == 2 && $v['show_history'] == 1){?>
        <a style="margin-left: 22px;" href="<?php echo site_url('user/borrow_history?user_id='.$v['id'])?>" class="btn btn-primary btn-xs btn-sm">借书记录</a>
        <?php }?>
        <a style="margin-left: 22px;" href="<?php echo site_url('user/edit?user_id='.$v['id'])?>" class="btn btn-info btn-xs btn-sm">修改</a>
    </td>
  </tr>
  <?php }}?>
</table>
</div>
</body>
</html>
<script>
$(function(){
    //搜索重置按钮
    $('#reset').click(function(){
        window.location.href = "<?php site_url('user/index');?>";
    })
})

</script>