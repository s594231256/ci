<div>
<form role="form" action="<?php echo site_url('category/index')?>" method="post" class="login-form">
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
    <a style="margin-left: 22px;" href="#myModal" role="button" class="btn btn-success category_create" data-toggle="modal">新增分类</a>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>分类名称</td>
    <td>操作</td>
  </tr>
  <?php foreach($category as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['category_name'];?></td>
    <td><a href="#myModal_edit" role="button" class="btn btn-primary btn-xs btn-sm category_edit" data-toggle="modal" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['category_name'];?>">修改</a>&nbsp;</td>
  </tr>
  <?php }?>
</table>
</div>
<!-- Modal 新增分类 -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: white;width:500px;height:250px;margin:250px auto auto auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">填写分类信息</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-sm-3" for="category_name">分类名称</label>
                <div class="col-sm-9"><input type="text" id="category_name" class="form-control" name="category_name"></div>
            </div>
        </div>
      <div style="margin-top: 15px;" class="modal-footer">
            <button class="btn btn-primary" id="save_btn">保存</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        </div>
    </div>

<!-- Modal 修改分类 -->
    <div id="myModal_edit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: white;width:500px;height:250px;margin:250px auto auto auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel_edit">修改分类信息</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-sm-3" for="category_name_edit">分类名称</label>
                <div class="col-sm-9"><input type="text" id="category_name_edit" class="form-control" name="category_name_edit"></div>
            </div>
        </div>
        <div style="margin-top: 15px;" class="modal-footer">
            <button class="btn btn-primary" id="save_btn_edit">保存</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        </div>
        <input type="hidden" value="" id="category_id" name="category_id"/>
    </div>
</body>
</html>
<script>
$(function(){
    //搜索重置按钮
    $('#reset').click(function(){
        window.location.href = "<?php site_url('category/index');?>";
    })
    //新增弹出层保存按钮
    $('#save_btn').click(function(){
        var category_name = $.trim($('#category_name').val());
        if(category_name == '')
        {
            alert('请填写分类名称');
            return;
        }
        $.ajax({
            type: "GET",
            url:  "<?php echo site_url('category/create');?>",
            data: {category_name:category_name},
            dataType:"json",
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

    //修改信息显示
    $('.category_edit').click(function(){
        var category_id = $(this).attr('data-id');
        var category_name = $(this).attr('data-name');
        $('#category_id').val(category_id);
        $('#category_name_edit').val(category_name);
    })

    //修改弹出层保存按钮
    $('#save_btn_edit').click(function(){
        var category_name = $.trim($('#category_name_edit').val());
        var category_id = $.trim($('#category_id').val());
        if(category_name == '')
        {
            alert('请填写分类名称');
            return;
        }
        $.ajax({
            type: "GET",
            url:  "<?php echo site_url('category/edit');?>",
            data: {category_id:category_id,category_name:category_name},
            dataType:"json",
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