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
    <a style="margin-left: 22px;" class="btn btn-success" href="<?php echo site_url('books/create')?>">新增图书</a>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>书名</td>
    <td>分类</td>
    <td>简介</td>
    <td>状态</td>
    <td>操作</td>
  </tr>
  <?php foreach($books as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['book_name'];?></td>
    <td><?php echo $id_name[$v['category']];?></td>
    <td><?php echo $v['content'];?></td>
    <td><?php echo $status[$v['status']];?></td>
    <td>
      <a href="#myModal" role="button" class="btn btn-primary btn-xs btn-sm" data-toggle="modal">asdfsadf</a>
      <?php
      if($v['status'] == 1){
          echo "<a class='btn btn-primary btn-xs btn-sm' href='".site_url('books/book_borrow')."'>借书</a>&nbsp;";
          echo "<a class='btn btn-danger btn-xs btn-sm' href='".site_url('books/book_off')."'>下架</a>&nbsp;";
      }else if ($v['status'] == 2) {
          echo "<a class='btn btn-success btn-xs btn-sm' href='".site_url('books/book_back')."'>还书</a>&nbsp;";
      }else{
          echo "<a class='btn btn-default btn-xs btn-sm' href='".site_url('books/book_on')."'>上架</a>&nbsp;";
      }?>
    </td>
  </tr>
  <?php }?>
</table>
</div>
    <!-- Modal -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: white;width:500px;height:400px;margin:250px auto auto auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">填写借书信息</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-sm-3" for="book_name">图书名称</label>
                <div class="col-sm-9" id="book_name">书1</div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="book_name">学号</label>
                <div class="col-sm-9"><input type="text" id="book_name" class="form-control" name="book_name"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="book_name">归还日期</label>
                <div class="col-sm-9"><input type="text" id="book_name" class="form-control" name="book_name"></div>
                <div class="col-sm-offset-3 col-sm-9"></div>
                <div class="col-sm-offset-3 col-sm-9"><div class="help-block"></div></div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
            <button class="btn btn-primary">保存</button>
        </div>
    </div>
</body>
</html>
<script>
$(function(){
    $('#reset').click(function(){
        window.location.href = "<?php site_url('books/index');?>";
    })
})
</script>