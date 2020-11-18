<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a>模型管理</a></li>
	<li class="unsub"><a href="?admin-arctype-edit-pid-0">添加模型</a></li>
	<li class="unsub"><a href="javascript:" onclick="nodeImport(0);"><i class="typcn typcn-download" style="font-size:15px;"></i> 导入模型</a></li>
</ul>
<script type="text/javascript">
function nodeImport(id){
	art.dialog.open('?admin-arctype-import-id-'+id,{lock:true,opacity:0.1,title:'导入模型',id:'nodeTestifrm',width:'700px',height:'400px'});
}
</script>
<div id="admin_right_b">

  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
   <form action="<?php echo url('admin/arctype/uporder'); ?>" method="post"> 
	<tr>
	  <td width="50" align='center' class="title_bg">id</td>
      <td width="150" class="title_bg">模型名称</td>
	  <td width="120" align='center' class="title_bg">文件夹</td>
	  <td width="150" align='center' class="title_bg">URL模板</td>
	  <td width="60" align='center' class="title_bg">域名数量</td>
	  <td width="60" align='center' class="title_bg">模板数量</td>
	  <td width="60" align='center' class="title_bg">采集规则</td>
      <td width="180" align='center' class="title_bg">管理</td>
	  <td class="title_bg">&nbsp;</td>
    </tr>
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center" height="25"><?php echo $this->_var['vo']['id']; ?></td>
	  <td>&nbsp;&nbsp;<a href="?admin-arctype-edit-id-<?php echo $this->_var['vo']['id']; ?>" title="点击修改"><?php echo $this->_var['vo']['name']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['dirname']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['urlrules']; ?></td>
	  <td align="center"><b style="color:green"><?php echo $this->_var['vo']['domain_num']; ?></b></td>
	  <td align="center"><b style="color:blue"><?php echo $this->_var['vo']['theme_num']; ?></b></td>
	  <td align="center"><b style="color:red"><?php echo $this->_var['vo']['collect_num']; ?></b></td>
	  <td align="center"><a href="?admin-arctype-edit-id-<?php echo $this->_var['vo']['id']; ?>" class="button button_small" title="修改规则">修改</a> <a href="javascript:" onclick="nodeImport('<?php echo $this->_var['vo']['id']; ?>');" class="button button_small button_inverse" title="导入模型">导入</a> <a href="javascript:" onclick="typeExport('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');" class="button button_small button_grey" title="导出模型">导出</a> <a href="?admin-arctype-del-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定删除？\n-----------------\n删除后不可恢复!");' class="button button_small button_remove">删除</a></td>
	  <td align="center">&nbsp;</td>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
	</form>
  </table>
<div class="divtips" style="font-size:12px;margin-top:10px;">
<p>提示：网站模型，用于区分网站内容（每个模型一个内容库）、风格模板、采集、URL规则模板等</p>
</div>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
function typeExport(id,title){
	art.dialog.open('?admin-arctype-export-id-'+id,{lock:true,opacity:0.1,title:'规则导出 ['+title+', ID:'+id+']',id:'nodeTestifrm',width:'700px',height:'400px'});
}
</script>
</body>
</html>