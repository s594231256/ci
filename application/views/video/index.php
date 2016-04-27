<div>
<form role="form" action="<?php echo site_url('video/index')?>" method="post" class="login-form">
  <div class="col-md-2">
    <label for="video_name">名称</label>
    <input type="text" class="form-control" id="video_name" name="video_name" value="<?php if(!empty($param['video_name']))echo $param['video_name'];?>">
  </div>
  <div class="form-group col-md-5" style="margin-top: 22px;">
    <button type="submit" class="btn btn-success">搜索</button>
    <button type="button" id="reset" class="btn btn-success">重置</button>
    <?php if($user_type == 1){?>
    <a style="margin-left: 22px;" class="btn btn-success" href="<?php echo site_url('books/create')?>">新增</a>
    <?php }?>
  </div>
</form>
</div>

<div>
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>视频名称</td>
    <td>简介</td>
    <td>状态</td>
    <td>操作</td>
  </tr>
  <?php 
  if(!empty($video))
  {
    foreach($video as $v){?>
  <tr class="active">
    <td><?php echo $v['id'];?></td>
    <td><?php echo $v['video_name'];?></td>
    <td><?php echo $v['video_content'];?></td>
    <td><?php echo $status[$v['video_status']];?></td>
    <td>
    <?php if($v['video_status'] == 1){ ?>
      <a  class="btn btn-primary btn-xs btn-sm" href="<?php echo site_url('video/watch')?>" >观看</a>&nbsp;
      <?php
        if($user_type == 1)
        {
            echo "<a data-id='".$v['id']."' class='btn btn-danger btn-xs btn-sm book_off' href='javascript:void(0);'>下架</a>&nbsp;";
        }
      }else{
        if($user_type == 1)
        {
            echo "<a data-id='".$v['id']."' class='btn btn-default btn-xs btn-sm book_on' href='javascript:void(0);'>上架</a>&nbsp;";
        }
    }}?>
    </td>
  </tr>
  <?php }?>
</table>
</div>
</body>
</html>
<script>
$(function(){
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