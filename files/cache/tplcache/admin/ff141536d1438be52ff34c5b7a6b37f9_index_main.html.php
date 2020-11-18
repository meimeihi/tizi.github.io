<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="static/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="static/js/highcharts/themes/txtcms.js"></script>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">系统信息</a></li>
</ul>
<div id="admin_right_b">
<table border="0" cellpadding="8" cellspacing="0" width="100%">
<tr>
	<td width="45%" valign="top" style="padding:0">
		<table border="0" cellpadding="8" cellspacing="1" id="config0" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" colspan="4" style='text-align:left'>系统信息</td>
			</tr>
			<tr class="firstalt">
				<td width="120">程序版本：</td><td><b><?php echo $this->_var['cms_name']; ?> <?php echo $this->_var['cms_version']; ?></b>&nbsp;[<a href="http://www.xbwseo.com/" target="_blank">打开官网</a>]</td>
				<td>域名库统计：</td><td><b><?php echo $this->_var['domains_count']; ?></b></td>
			</tr>
			<tr class="firstalt">
				<td>蜘蛛防火墙：</td><td><?php if(config ( 'web_robot_ban' )): ?>开启<?php else: ?>关闭<?php endif; ?></td>
				<td>磁盘剩余空间：</td><td><b><?php echo $this->_var['disk_free']; ?> GB</b></td>
			</tr>
			<tr class="firstalt">
				<td>蜘蛛强引劫持：</td><td><?php if(config ( 'robot_redirect_open' )): ?>开启<?php else: ?>关闭<?php endif; ?></td>	
				<td>今日蜘蛛统计：</td> <td><font color="red"><?php echo $this->_var['robot_count']; ?></font></td>
			</tr>
			<tr class="firstalt">
				<td>静态缓存：</td><td><?php if(config ( 'web_caching' )): ?>开启<?php else: ?>关闭<?php endif; ?></td>	
				<td>调试模式：</td> <td><?php if(APP_DEBUG || config ( 'web_debug' ) == 1): ?><font color="red">已开启</font><?php else: ?>关闭<?php endif; ?></td>
			</tr>
			<tr class="firstalt">
				<td>目录权限检查：</td>
				<td colspan="3" align="left"><?php echo $this->_var['tips']; ?>&nbsp;&nbsp;</td>
			</tr>
		</table>
	</td>
	<td width="25%" valign="top" style="padding:0 0 0 10px">
		<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" colspan="2" style='text-align:left'>登陆信息</td>
			</tr>
			<tr class="firstalt"><td>管理员：</td><td><b><?php echo $this->_var['adminid']; ?></b></td></tr>
			<tr class="firstalt"><td>上次登录时间：</td><td><b><?php echo $this->_var['logtime']; ?></b></td></tr>
			<tr class="firstalt"><td>上次/本次登录IP：</td> <td><b><?php echo $this->_var['logip']; ?>/<?php echo $this->_var['REMOTE_ADDR']; ?></b></td></tr>
			<tr class="firstalt"><td>授权用户：</td> <td><font color="red"><?php echo $this->_var['vipqq']; ?></font></td></tr>
			<tr class="firstalt"><td>授权到期时间：</td> <td><font color="red"><?php echo $this->_var['licence_expdate']; ?></font></td></tr>
		</table>
	</td>
	<td width="30%" valign="top" style="padding:0 0 0 10px">
		<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" style='text-align:left'>官网资讯</td>
			</tr>
			<tr class="firstalt">
				<td style="padding:0"><iframe scrolling="auto" width="100%" height="169" src="http://www.xbwseo.com/admin-news.html" frameborder="0"></iframe></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<div id="chart_line_day" style="min-width: 310px; height: 300px; margin: 10px auto;"></div>
<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
    <tr>
      <td class="title_bg" colspan="2" style='text-align:left'>服务器信息</td>
    </tr>
	<tr class="firstalt">
      <td height="20"  width='200' align="right">当前域名 (IP地址：端口)</td>
      <td align="left"><b><?php echo $this->_var['SERVER_NAME']; ?></b> (<?php echo $this->_var['SERVER_ADDR']; ?>:<?php echo $this->_var['SERVER_PORT']; ?>)</td>
    </tr>
	<tr class="firstalt">
		<td height="20"align="right">程序目录绝对路径</td> 
		<td><?php echo dirname($this->_var['SCRIPT_FILENAME']); ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">服务器解译引擎</td> 
		<td><?php echo $this->_var['SERVER_SOFTWARE']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">服务器操作系统( 服务器时间 )</td> 
		<td><?php echo $this->_var['php_os']; ?>(<?php echo date('Y-m-d H:i:s'); ?>)</td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">PHP 运行方式( 版本 )</td> 
		<td><?php echo PHP_SAPI;?>(<?php echo PHP_VERSION;?>)</td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">php zlib扩展</td> 
		<td><?php echo $this->_var['php_libz']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">iconv编码转换</td> 
		<td><?php echo $this->_var['iconv']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">mbstring扩展</td> 
		<td><?php echo $this->_var['mbstring']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">display_errors</td> 
		<td><?php echo $this->_var['display_errors']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">magic_quotes_gpc</td> 
		<td><?php echo $this->_var['magic_quotes_gpc']; ?></td>
	</tr>
  </table>
</div>

<script type="text/javascript">
$(function () {
	if(getcookie('updatetips')!='0'){
		update_check();
	}
	$('#chart_line_day').highcharts({
		chart: {
            type: 'line',
			borderColor:'#ddd',
        },
        credits:{
            enabled:false
        },
        title: {
            text: '今日蜘蛛爬行走势图'
        },
		subtitle: {
            text: '今日爬行数量：<?php echo $this->_var['robot_count']; ?>'
        },
        xAxis: {
            categories: ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23']
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
			{
				name: '蜘蛛爬行次数（次/小时） ，访问量大的时候，小时数会统计不全',
				data: [<?php echo $this->_var['hour']; ?>]
			}
		]
    });
});
function get_lscode(){
	
}
function licence_update(){
	alert("最新版,无需级.");
	return;
	top.art.dialog({
		content: '<div id="licence-box"><p>《<font color="green">小霸王万能蜘蛛池</font>》为商业程序，需购买授权才能使用</p><p>请输入授权码：(<a href="http://www.xbwseo.com" target="_blank"><font color="red">点击在线购买</font></a>)</p>'
			+ '<p><textarea name="code" class="inputs" id="licence-code"></textarea></p><p id="licence-msg"></p></div>',
		fixed: true,
		title: '请输入授权码',
		lock: true,
		id: 'licencebox',
		okVal: '提交授权',
		init: function(){
			if(top.$('#dialog_foot').length<1){
				top.$('<span style="float: left;line-height: 25px;" id="dialog_foot">客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=996948519&amp;site=qq&amp;menu=yes" target="_blank"><font color="red">996948519</font></a> 官网：<a href="http://www.xbwseo.com" target="_blank"><font color="red">xbwseo.com</font></a></span>').prependTo(".aui_dialog .aui_footer .aui_buttons");	
			}
		},
		ok: function () {
			var input = top.$('#licence-code');
			var okthis=this;
			$.ajax({
				url:'?admin-index-licence',
				type:'post',
				data: 'code='+$.trim(input.val()),
				success:function(data){
					if(data.status==1){
						alert('授权成功！');
						top.location.reload();
					}else{
						okthis.shake && okthis.shake();
						input.select();
						input.focus();
						$('#licence-msg').html(data.info).show().fadeOut(3000);
					}
				}
			});
			return false;
		},
		cancel: true
	});
}
</script>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>