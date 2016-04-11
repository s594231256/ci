<link href="<?php echo base_url()?>include/timepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div>
<form role="form" action="<?php echo site_url('books/index')?>" method="post" class="login-form">
  <div class="col-md-2">
    <label for="book_name">书名</label>
    <input type="text" class="form-control" id="book_name" name="book_name" value="<?php if(!empty($param['book_name']))echo $param['book_name'];?>">
  </div>
  <div class="col-md-2">
    <label for="category">分类</label>
    <select class="form-control" name="category">
      <option value="0">选择分类</option>
      <?php
      if(!empty($category))
      {
          foreach ($category as $v){
              $str = '';
              if(!empty($param['category']) && $param['category'] == $v['id'])
              {
                  $str = 'selected = "selected"';
              }
            echo "<option {$str} value='{$v['id']}'>{$v['category_name']}</option>";
        }
      }?>
    </select>
  </div>
  <div class="form-group col-md-5" style="margin-top: 22px;">
    <button type="submit" class="btn btn-success">搜索</button>
    <button type="button" id="reset" class="btn btn-success">重置</button>
    <?php if($user_type == 1){?>
    <a style="margin-left: 22px;" class="btn btn-success" href="<?php echo site_url('books/create')?>">新增图书</a>
    <?php }?>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>书名</td>
    <td>分类</td>
    <td>位置</td>
    <td>简介</td>
    <td>状态</td>
    <td>操作</td>
  </tr>
  <?php 
  if(!empty($books))
  {
    foreach($books as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['book_name'];?></td>
    <td><?php echo $id_name[$v['category']];?></td>
    <td><?php echo $v['location'];?></td>
    <td><?php echo $v['content'];?></td>
    <td><?php echo $status[$v['status']];?></td>
    <td>
    <?php if($user_type == 1){?>
      <?php if($v['status'] == 1){ ?>

      <a href="#myModal" role="button" class="btn btn-primary btn-xs btn-sm book_borrow" data-toggle="modal" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['book_name'];?>">借书</a>&nbsp;

      <?php
          echo "<a data-id='".$v['id']."' class='btn btn-danger btn-xs btn-sm book_off' href='javascript:void(0);'>下架</a>&nbsp;";
      }else if ($v['status'] == 2) { ?>

      <a href="#myModal_back" role="button" class="btn btn-primary btn-xs btn-sm book_back" data-toggle="modal" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['book_name'];?>">还书</a>&nbsp;

          <?php
//          echo "<a class='btn btn-success btn-xs btn-sm' href='".site_url('books/book_back')."'>还书</a>&nbsp;";
      }else{
          echo "<a data-id='".$v['id']."' class='btn btn-default btn-xs btn-sm book_on' href='javascript:void(0);'>上架</a>&nbsp;";
    }}?>
    </td>
  </tr>
  <?php }}?>
</table>
</div>
    <!-- Modal 借书 -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: white;width:500px;height:400px;margin:250px auto auto auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">填写借书信息</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-sm-3" for="book_name_box">图书名称</label>
                <div class="col-sm-9" id="book_name_box"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="student_code">学号</label>
                <div class="col-sm-9"><input type="text" id="student_code" class="form-control" name="student_code"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="back_time">归还日期</label>
                <div class="input-group date col-md-9" style="padding-left: 15px;padding-right: 15px;" data-date="" data-date-format="" data-link-field="back_time">
                    <input id="back_time" name="back_time" class="form-control" size="16" type="text" value="" readonly>
                </div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="save_btn">保存</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        </div>
        <input type="hidden" value="" id="book_id" name="book_id"/>
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
<script type="text/javascript" src="<?php echo base_url()?>include/timepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>include/timepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script>
$(function(){
    //搜索重置按钮
    $('#reset').click(function(){
        window.location.href = "<?php site_url('books/index');?>";
    })

    //调用时间控件
    $("#back_time,#back_time_span").datetimepicker({
        format: 'yyyy-mm-dd',
         weekStart: 1,
         autoclose: true,
         startView: 2,
         minView: 2,
         forceParse: false,
         language: 'zh-CN'
    });

    //借书信息显示
    $('.book_borrow').click(function(){
        var book_id = $(this).attr('data-id');
        var book_name = $(this).attr('data-name');
        $('#book_id').val(book_id);
        $('#book_name_box').html(book_name);
    })

    //借书弹出层保存按钮
    $('#save_btn').click(function(){
        var book_id = $.trim($('#book_id').val());
        var student_code = $.trim($('#student_code').val());
        var back_time = $.trim($('#back_time').val());
        if(book_id == '')
        {
            alert('获取图书信息失败');
            return;
        }
        if(student_code == '')
        {
            alert('请填写学号');
            return;
        }
        if(back_time == '')
        {
            alert('请选择还书时间');
            return;
        }
        $.ajax({
            type: "GET",
            url:  "<?php echo site_url('books/book_borrow');?>",
            data: {book_id:book_id,student_code:student_code,back_time:back_time},
            dataType:"json",
            cache:false,
            success: function (msg) {
                if(msg.code){
                	alert('操作成功！');
                	window.location.reload();
                }else{
                    alert('操作失败！['+msg.msg+']');
                }
            }
        });
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

    //图书下架
    $('.book_off').click(function(){
        if(confirm('确认下架该图书？'))
        {
            var book_id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url:  "<?php echo site_url('books/book_on_off');?>",
                data: {book_id:book_id,book_status:3},
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
        }
    })

    //图书下架
    $('.book_on').click(function(){
        if(confirm('确认上架该图书？'))
        {
            var book_id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url:  "<?php echo site_url('books/book_on_off');?>",
                data: {book_id:book_id,book_status:1},
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
        }
    })
})

</script>