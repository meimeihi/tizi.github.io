<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>友情提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo $this->_var['waitSecond']; ?>;URL=<?php echo $this->_var['jumpUrl']; ?>'>
<script type="text/javascript" src="static/js/jquery.js"></script>
<script type="text/javascript" src="static/js/system.js"></script>
</head>
<body>
<table border="0" align="center" cellpadding="5" cellspacing="1" style="font-size:14px;color:#333333;margin-top:100px;background:#468bd7;border: 5px solid #eee;">
<tr style="color:#FFFFFF">
    <th><?php echo $this->_var['msgTitle']; ?></th>
</tr>
<tr><td height="100" style="font-size:12px; background:#FFFFFF">
    <div style="font-size:14px;font-weight:bold;margin:10px;"><?php echo $this->_var['message']; ?><?php echo $this->_var['error']; ?></div>
    <div style="margin:10px;">系统将在&nbsp;<span id="wait" style="color:blue;font-weight:bold"><?php echo $this->_var['waitSecond']; ?></span>&nbsp;秒后自动跳转,如果不想等待,直接 <a href="<?php echo $this->_var['jumpUrl']; ?>" style="color:#069;" id="href">点击这里</a></div>
</td></tr>
</table>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>