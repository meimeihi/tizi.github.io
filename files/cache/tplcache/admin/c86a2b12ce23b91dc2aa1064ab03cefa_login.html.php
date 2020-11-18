<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body>
<style type="text/css">
body {
	background:#0E4D81;
}
</style>
<form method="post">
		<div id="login">
				<dl>
					<dd>账号：<input class="text" type="text" name="username" id="username" /></dd>
					<dd>密码：<input class="text" type="password" name="password" id="password" /></dd>
					<dd style="margin-left:45px"><button type="submit" id="dologin" class="button">登录</button><a href="javascript:repass();">重置后台密码</a></dd>
				</dl>
		</div>
</form>

<script type="text/javascript">
$(function() {
	$("#dologin").click(function(){
		showDialog();
		var autologin=$("input[type='checkbox']").is(':checked') ? $("input[type='checkbox']").attr('value') : '';
		$.ajax({
			type:"post",
			url:"<?php echo url('admin/login/check'); ?>",
			data:"username="+$("#username").val()+"&password="+$("#password").val()+"&autologin="+autologin,
			dataType:'json',
			timeout:20000,
			global:false,
			success:function(data){
				if(data.status==1){
					showAlert('success','恭喜你，登录成功',data.url);
				}else{
					showAlert('error',data.info);
				}
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				showAlert('info',XMLHttpRequest.responseText);
			}
		});
		return false;
	});
});
function repass(){
	top.art.dialog({
		content: '<div id="licence-box"><p>删除./temp/repass.lock文件后，点击确定重置！</p></div>',
		fixed: true,
		title: '提示信息',
		lock: true,
		id: 'repassbox',
		okVal: '确定重置',
		icon: 'notice',
		ok: function () {
			$.ajax({
				type:"get",
				url:"<?php echo url('admin/repass/repass'); ?>",
				success:function(data){
					if(data==1){
						showAlert('success','恭喜你，重置成功！账号密码都是:admin','','null');
					}else{
						showAlert('error','重置失败~','','null');
					}
				}
			});
			return false;
		}
	});
}

</script>
</body>
</html>