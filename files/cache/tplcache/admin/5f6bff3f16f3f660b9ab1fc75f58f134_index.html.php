<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body>
<script>if(self!=top){ top.location=self.location;}</script>
	<div id="head">
		<div class="left"><a href="<?php echo url('admin/index/index'); ?>"><img src="static/images/logo.png" title="<?php echo $this->_var['cms_name']; ?>管理系统<?php echo $this->_var['cms_version']; ?>"/></a></div>
		<div class="left head_txt"></div>
		<div class="right head_menu">
		  <ul id="head_menu">
			  <li> 您好：<?php echo $this->_var['adminname']; ?>　[ <a href="<?php echo url('admin/master/index'); ?>" target="main">修改密码</a> <span><a href="<?php echo url('admin/login/out'); ?>">退出</a></span> ]</li>
			  <li><a href="./" target="_blank">预览网站</a></li>
			  <li><a href="<?php echo url('admin/config/index'); ?>" target="main">系统设置</a></li>
			  <li><a href="<?php echo url('admin/cache/clear'); ?>" target="main">更新缓存</a></li>
			  <li><a href="http://www.xbwseo.com" target="_blank">小霸王seo官网</a></li>
		  </ul>
		</div>
	</div>

	 <div id="content">
	 <div id="left">
          <div class="left_title left_title_over"><i class="typcn typcn-cog-outline"></i> 核心设置</div>
		  <ul class="dis" style="display: block;">
		    <li class="left_link_over" onClick="selemenu(this)"><a href="<?php echo url('admin/index/main'); ?>" target="main">后台首页</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/config/index'); ?>" target="main">系统设置</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/master/index'); ?>" target="main">修改密码</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/aclogs/index'); ?>" target="main">操作日志</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/update/index'); ?>" target="main">在线升级</a></li>
		  </ul>
		  <div class="left_title"><i class="typcn typcn-user"></i> 站群管理 <sup style="color:#ff9900">new</sup></div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/domain/index'); ?>" target="main">网站管理</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/arctype/index'); ?>" target="main">模型管理</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/arctype/tplrules'); ?>" target="main">TKDB调用模板</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/domain/config'); ?>" target="main">站点优化设置</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/domain/tkd'); ?>" target="main">自定义域名TKD</a></li>
		  </ul>
		  <div class="left_title"><i class="typcn typcn-document-text"></i> 内容库</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/title'); ?>" target="main">标题库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/webname'); ?>" target="main">网站名称库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/typename'); ?>" target="main">栏目库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/content'); ?>" target="main">文章句子库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/body'); ?>" target="main">整篇文章库 <sup style="color:#ff9900">new</sup></a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/pic'); ?>" target="main">图片链接库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/video'); ?>" target="main">视频链接库</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata/diy'); ?>" target="main">自定义库</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-link"></i> 外链管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata2/link'); ?>" target="main">外链管理</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/links/config'); ?>" target="main">外链设置</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-key"></i> 关键词管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/txtdata2/keywords'); ?>" target="main">关键词管理</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/keywords/config'); ?>" target="main">关键词设置</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-arrow-sync"></i> 采集管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/collect/index'); ?>" target="main">采集规则管理</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/collect/config'); ?>" target="main">采集设置</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-vendor-microsoft"></i> 模板管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/theme/index'); ?>" target="main">模板风格设置</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-vendor-android"></i> 蜘蛛管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/robot/index'); ?>" target="main">蜘蛛访问日志</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/robot/redirect'); ?>" target="main">蜘蛛强引记录</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/robot/config'); ?>" target="main">蜘蛛设置</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/robot/ban'); ?>" target="main">蜘蛛防火墙</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-stopwatch"></i> 缓存管理</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/cache/index'); ?>" target="main">缓存设置</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/cache/clear'); ?>" target="main">清除缓存</a></li>
		  </ul>

		  <div class="left_title"><i class="typcn typcn-arrow-shuffle"></i> 其他工具</div>
		  <ul class="dis">
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/passip/index'); ?>" target="main">IP放行设置</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/banip/index'); ?>" target="main">IP黑名单</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/tools/scanpic'); ?>" target="main">扫描本地图片</a></li>
			<li class="left_link" onClick="selemenu(this)"><a href="<?php echo url('admin/tools/linkget'); ?>" target="main">链接提取工具</a></li>
		  </ul>

	   </div>

	<div id="right" style="_float: left;_margin-left:0px;">
		<iframe id="main" scrolling="auto" width="100%" height="auto" name="main" src="<?php echo url('admin/index/main'); ?>" frameborder="0"></iframe>
	</div>

	</div>
</div>
<script type="text/javascript">
$(function(){
	$(".left_title").click(function(){
		$(this).next("ul").slideToggle(100).siblings(".dis:visible").slideUp(200);
		$(this).toggleClass("left_title_over");
		$(this).siblings(".left_title_over").removeClass("left_title_over");
	});
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-$('#head').height()-2;
	$('#main').height(heights);
}
window.onresize();
function keep_login_status(){
	$.ajax({
		url:'<?php echo url("admin/index/keep_login"); ?>',
		success:function(data){
			return true;
		}
	});
	setTimeout('keep_login_status()',1000*60*2);
}
keep_login_status();
</script>
</body>
</html>