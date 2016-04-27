<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>include/video/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>include/video/assets/css/video-default.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>include/video/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>include/video/assets/js/jquery.video-ui.js"></script>
  </head>
  <body>
    <div class="videoUiWrapper thumbnail">
      <video width="370" height="214" id="demo1">
        <!--<source src="pathtovideo/video.ogv" type="video/ogg">-->
        <source src="<?php echo base_url()?>include/video/video/testvideo.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  <script type="text/javascript">
      $('#demo1').videoUI();
  </script>
  </body>
</html>