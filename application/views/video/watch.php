<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>正在播放：<?php echo $video['video_name'];?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>include/video/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>include/video/assets/css/video-default.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>include/video/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>include/video/assets/js/jquery.video-ui.js"></script>
  </head>
  <style>
      .my-video{width: 909px;height: 511px;}
      .my-video-div{margin-top: 80px;margin-left: 200px;}
  </style>
  <body>
    <div class="videoUiWrapper thumbnail my-video-div">
      <video class="my-video" id="demo1">
        <!--<source src="pathtovideo/video.ogv" type="video/ogg">-->
        <source src="<?php echo base_url()?>include/video/video/<?php echo $video['video_url'];?>" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  <script type="text/javascript">
      $('#demo1').videoUI();
  </script>
  </body>
</html>