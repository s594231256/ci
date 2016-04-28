<link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap-fileinput/css/fileinput.min.css">
<script src="<?php echo base_url()?>include/bootstrap-fileinput/js/fileinput.min.js"></script>
<section class="content-header"><h2>添加视频</h2></section>
<form role="form" action="<?php echo site_url('video/create')?>" method="post" class="login-form" enctype="multipart/form-data">
<section class="content">
  <div class="panel">
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">名称</span>
    <input type="text" class="form-control" name="video_name" id="video_name" value="<?php if(!empty($video_info['video_name']))echo $video_info['video_name'];?>" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">简介</span>
    <input type="text" class="form-control" name="video_content" id="video_content" value="<?php if(!empty($video_info['video_content']))echo $video_info['video_content'];?>" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <label class="control-label">选择上传文件</label>
    <input id="input-1" name="file" type="file" class="file">
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
        var video_name = $.trim($('#video_name').val());
        if(video_name == '')
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
            var video_content = $.trim($('#video_content').val());
            if(video_content == '')
            {
                alert('请填写学号');
                return false;
            }
        }
        $('.login-form').submit();
    })
})
</script>