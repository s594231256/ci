<div>
<form role="form" action="<?php echo site_url('books/index')?>" method="post" class="login-form">
  <div class="col-md-2">
    <label for="book_name">书名</label>
    <input type="text" class="form-control" id="book_name" name="book_name">
  </div>
  <div class="col-md-2">
    <label for="category">分类</label>
    <input type="text" class="form-control" id="category" name="category">
  </div>
  <div class="form-group col-md-5" style="margin-top: 22px;">
    <button type="submit" class="btn btn-success">搜索</button>
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
    <td><?php echo $v['category'];?></td>
    <td><?php echo $v['content'];?></td>
    <td><?php echo $v['status'];?></td>
    <td>操作1 操作2</td>
  </tr>
  <?php }?>
</table>
</div>
</html>