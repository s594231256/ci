<div>
<form role="form" action="<?php echo site_url('user/index')?>" method="post" class="login-form">
  <div class="col-md-2">
    <label for="user_name">用户名 : </label>
    <span class="input-control" style="font-size: 25px;"><?php echo $user_info['username'];?></span>
  </div>
  <div class="col-md-2">
    <label for="student_code">学号 : </label>
    <span class="input-control" style="font-size: 25px;"><?php echo $user_info['student_code'];?></span>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>图书名称</td>
    <td>状态</td>
    <td>约定归还时间</td>
    <td>归还时间</td>
    <td>操作人</td>
    <td>操作</td>
  </tr>
  <?php 
  if(!empty($borrow_history))
  {
    foreach($borrow_history as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['book_name'];?></td>
    <td><?php echo $v['status'];?></td>
    <td><?php echo $v['expect_back_time'];?></td>
    <td><?php echo $v['back_time'];?></td>
    <td><?php echo $v['admin'];?></td>
    <td>
        <?php if($v['borrow_status'] != 2){?>
        <a href="#myModal_back" role="button" class="btn btn-primary btn-xs btn-sm book_back" data-toggle="modal" data-id="<?php echo $v['book_id'];?>" data-name="<?php echo $v['book_name'];?>">还书</a>&nbsp;
        <?php }?>
    </td>
  </tr>
  <?php }}?>
</table>
</div>

    <!-- Modal 还书 -->
    <div id="myModal_back" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_back" aria-hidden="true" style="background: white;width:500px;height:400px;margin:250px auto auto auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel_back">确认还书信息</h3>
        </div>
      <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-sm-3" for="book_name_box_back">图书名称</label>
                <div class="col-sm-9" id="book_name_box_back"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="student_code_back">学号</label>
                <div class="col-sm-9" id="student_code_back"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="borrow_time">借书日期</label>
                <div class="col-sm-9" id="borrow_time"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="expect_back_time">约定归还日期</label>
                <div class="col-sm-9" id="expect_back_time"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
        </div>
      <div class="modal-footer" style="float:right;">
            <button class="btn btn-primary" id="save_btn_back">保存</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        </div>
        <input type="hidden" value="" id="book_id_back" name="book_id"/>
    </div>
    
</body>
</html>
<script>
$(function(){
    //搜索重置按钮
    $('#reset').click(function(){
        window.location.href = "<?php site_url('user/index');?>";
    })
    
    //还书信息显示
    $('.book_back').click(function(){
        var book_id = $(this).attr('data-id');
        var book_name = $(this).attr('data-name');
        $('#book_id_back').val(book_id);
        $('#book_name_box_back').html(book_name);
        $.ajax({
            type: "GET",
            url:  "<?php echo site_url('books/book_back_info');?>",
            data: {book_id:book_id},
            dataType:"json",
            cache:false,
            success: function (msg) {
                $('#student_code_back').html(msg.student_code);
                $('#borrow_time').html(msg.borrow_time);
                $('#expect_back_time').html(msg.expect_back_time);
            }
        });
    })

    //还书弹出层保存按钮
    $('#save_btn_back').click(function(){
        var book_id = $.trim($('#book_id_back').val());
        $.ajax({
            type: "GET",
            url:  "<?php echo site_url('books/book_back');?>",
            data: {book_id:book_id},
            dataType:"json",
            cache:false,
            success: function (msg) {
                if(msg.code){
                	alert('操作成功！');
                	window.location.reload();
                }else{
                    alert('操作失败！');
                }
            }
        });
    })
})

</script>