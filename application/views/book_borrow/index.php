<div style="margin-top: 20px;">
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>书名</td>
    <td>用户</td>
    <td>操作员</td>
    <td>状态</td>
    <td>借书时间</td>
    <td>约定归还时间</td>
    <td>归还时间</td>
  </tr>
  <?php 
  if(!empty($book_borrow_info))
  {
      foreach($book_borrow_info as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['book_name'];?></td>
    <td><?php echo $v['user_name'];?></td>
    <td><?php echo $v['admin'];?></td>
    <td><?php echo $v['status'];?></td>
    <td><?php echo $v['create_time'];?></td>
    <td><?php echo $v['expect_back_time'];?></td>
    <td><?php echo $v['back_time'];?></td>
  </tr>
  <?php }}?>
</table>
</div>
</body>
</html>
