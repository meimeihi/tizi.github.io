<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a>网站管理</a></li>
	<li class="unsub"><a href="javascript:" onclick="edit(0);">添加网站</a></li>
</ul>

<div id="admin_right_b">
	
  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
   <form method="post"> 
	<tr>
	  <td width="30" align='center' class="title_bg">id</td>
	  <td width="100" align='center' class="title_bg">分组名称</td>
	  <td width="100" align='center' class="title_bg">所属模型</td>
      <td width="150" class="title_bg">域名</td>
	  <td width="60" align='center' class="title_bg">文件夹</td>
	  <td width="60" align='center' class="title_bg">网站模式</td>
	  <td width="60" align='center' class="title_bg">域名数量</td>
	  <td width="50" align='center' class="title_bg">关键词</td>
	  <td width="50" align='center' class="title_bg">外链</td>
	  <td width="60" align='center' class="title_bg">域名前缀</td>
	  <td width="120" align='center' class="title_bg">修改时间</td>
      <td width="150" align='center' class="title_bg">管理</td>
	  <td class="title_bg">&nbsp;</td>
    </tr>
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center" height="25"><?php echo $this->_var['vo']['id']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['name']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['typename']; ?></td>
	  <td>&nbsp;&nbsp;<a href="javascript:" onclick="edit(<?php echo $this->_var['vo']['id']; ?>);" title="点击修改"><?php echo $this->_var['vo']['domain']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['dirname']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['domain_mod'] == 2): ?>单域名<?php else: ?>泛域名<?php endif; ?></td>
	  <td align="center"><b class="red"><?php echo $this->_var['vo']['domain_num']; ?></b></td>
	  <td align="center"><?php echo $this->_var['vo']['haskeywords']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['haslink']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['prefix_type']): ?>自定义<?php else: ?><font class="c9">自动生成</font><?php endif; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['addtime']; ?></td>
	  <td align="center"><a href="javascript:" onclick="edit(<?php echo $this->_var['vo']['id']; ?>);" class="button button_small">修改</a> <a href="?admin-domain-del-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定删除?删除后不可恢复!");' class="button button_small button_remove">删除</a>  <a href="?admin-domain-del_cidfile-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定清除?清除后域名绑定的模型将重新分配!\n**********多模型下有效**********");' class="button button_small button_inverse">清除模型分配</a></td>
	  <td align="center">&nbsp;</td>
	 </tr>
	<?php endforeach; else: ?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
		<td align="center" colspan='10' height="25">请先添加网站分组！</td>
	</tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	</form>
  </table>
<div class="divtips" style="font-size:12px;margin-top:10px;">
	<p>提示：</p>
	<p>网站分组管理，可以个性化每个网站的风格、内容、站点模式、关键词、外链等</p>
	<p>关键词和外链是基于网站分组进行管理</p>
	<p style="color:blue">注：已经设置过的域名更换模型的，需要清除该域名的模板绑定缓存才生效</p>
</div>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
function edit(id){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-domain-edit-id-'+id,{
		lock:true,opacity:0.3,title:title+'网站',id:'openifrm',width:'600px',height:'480px'});
}
</script>
</body>
</html>