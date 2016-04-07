<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <!-- 新 Bootstrap 核心 CSS 文件 -->

        <link rel="stylesheet" href="<?php echo base_url()?>include/bootstrap/css/bootstrap.min.css">
        <!-- 可选的Bootstrap主题文件（一般不用引入） -->
        <!--<link rel="stylesheet" href="/include/bootstrap/css/bootstrap-theme.min.css">-->
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="<?php echo base_url()?>include/jquery-2.0.3.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="<?php echo base_url()?>include/bootstrap/js/bootstrap.min.js"></script>
    </head>
<body>
        <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
        <!-- Modal -->
        <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>
            <div class="modal-body">
                <p>弹出层…</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </body>
</html>