<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator’s control panel</title>

</head>

<frameset rows="130,*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo site_url("frameset/top") ?>" name="topFrame" scrolling="no">
  <frameset rows="*" cols="230,*" name="ecc" framespacing="0" frameborder="no" border="0">
      <frame src="<?php echo site_url("frameset/menu") ?>" name="menuFrame" border="0" scrolling="no" height="100%">
    <frame src="<?php echo site_url("frameset/main") ?>" name="mainFrame" scrolling="auto">
  </frameset>
</frameset>
</html>