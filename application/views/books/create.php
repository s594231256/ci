<section class="content-header"><h2>添加图书</h2></section>
<form role="form" action="<?php echo site_url('books/create')?>" method="post" class="login-form">
<section class="content">
  <div class="panel">
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">图书名称</span>
    <input type="text" class="form-control" id="book_name" name="book_name" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">图书简介</span>
    <input type="text" class="form-control" id="content" name="content" aria-describedby="basic-addon1">
  </div>
  <div class="input-group col-md-4 my-margin-top">
    <span class="input-group-addon" id="basic-addon1">图书位置</span>
    <input type="text" class="form-control" id="location" name="location" aria-describedby="basic-addon1">
  </div>
  <div class="dropdown col-md-14 my-margin-top">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span id="show_category">请选择图书分类</span>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <?php
      if(!empty($category))
      {
          foreach ($category as $v){
            echo "<li><a id='{$v['id']}' href='javascript:void(0);'>{$v['category_name']}</a></li>";
        }
      }?>
    </ul>
  <input type="hidden" name="book_category" id="book_category" value=""/>
  </div>
  </div>
</section>
  <div class="panel my-margin-top">
    <input id="all-ok" type="button" class="input-group col-md-1 btn btn-success" value="创建">
  </div>
</form>
</body>
</html>
<script>
$(function(){
    $('.dropdown-menu a').click(function(){
        var id = $(this).attr('id');
        var name = $(this).html();
        $('#show_category').html(name);
        $('#book_category').val(id);
    })
    $('#all-ok').click(function(){
        var book_name = $.trim($('#book_name').val());
        if(book_name == '')
        {
            alert('请填写图书名称');
            return false;
        }
        
        var content = $.trim($('#content').val());
        if(content == '')
        {
            alert('请填写图书简介');
            return false;
        }
        
        var location = $.trim($('#location').val());
        if(location == '')
        {
            alert('请填写图书位置');
            return false;
        }
        
        var book_category = $.trim($('#book_category').val());
        if(book_category == '')
        {
            alert('请选择图书分类');
            return false;
        }
        $('.login-form').submit();
    })
})
</script>