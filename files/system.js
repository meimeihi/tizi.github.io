$(function() {
	$("a").bind("focus", function() {
		if (this.blur) {
			this.blur()
		}
	});
	$('a.pageload,.left_link a').click(function() {
		page_loading()
	});
	$('#admin_sub_title a').click(function() {
		var a = $(this).attr('href').toLowerCase();
		top.$('#left ul.dis a').each(function(i) {
			if ($(this).attr('href').toLowerCase() == a) {
				if (top.$('.left_link_over').attr('class', 'left_link')) {
					$(this).parent().attr('class', 'left_link_over')
				}
			}
		})
	})
});
page_loading_close();
var cookiepre = 'xbwseo_',
	cookiedomain = '',
	cookiepath = '/';
var licencetip = false;
editoption = {
	resizeType: 1,
	allowPreviewEmoticons: false,
	allowImageUpload: true,
	imageSizeLimit: UPLOAD_MAX_FILESIZE,
	uploadJson: '?g=plus&m=editor&a=upload&PHPSID=' + PHPSESSID,
	fileManagerJson: "?g=plus&m=editor&a=fileManager",
	allowFileManager: true,
	langType: "zh_CN",
	items: ['source', 'preview', '|', 'undo', 'redo', '|', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', '|', 'image', 'multiimage', 'baidumap', '|', 'link', 'unlink', 'insertfile', 'fullscreen', 'page']
};

function lockinput(a, s) {
	if (s == 1) {
		$(a).attr('readonly', 'readonly').removeClass('lockinput').addClass('lockinput')
	} else {
		$(a).removeAttr("readonly").removeClass('lockinput')
	}
}
function showimg(a, b, c) {
	if (c) {
		var q = '?';
		if (a.indexOf("?") > -1) q = '&';
		a += q + '_t=' + Math.random()
	}
	top.art.dialog({
		id: 'showimg',
		lock: 1,
		opacity: 0.1,
		title: b ? b : '查看图片',
		content: '<img src="' + a + '" onload="top.art.dialog.list[\'showimg\']._reset();" id="showimg" />'
	})
}
function classCutover(a, b, c) {
	c = isUndefined(c) ? 10 : c;
	for (i = 1; i <= c; i++) {
		$(a + '_' + i).hide()
	}
	$(a + '_' + b).show()
}
var showDialogST = null;

function showDialog(a, b, c, d, e, f, g, h, i, j, k) {
	clearTimeout(showDialogST);
	e = isUndefined(e) ? (b == 'info' ? false : true) : e;
	g = isUndefined(g) ? '' : g;
	b = in_array(b, ['confirm', 'notice', 'info', 'success']) ? b : 'error';
	var l = 'art_dialog';
	var m = $('.' + l);
	var n = 1;
	if (isUndefined(a)) return art.dialog({
		id: l
	});
	oktxtdefault = '确定';
	j = isUndefined(j) ? null : j;
	closefunc = function() {
		if (typeof d == 'function') d();
		else eval(d)
	};
	if (j) {
		g = '<span id="closetime">' + j + '</span> 秒后窗口关闭<script>lastNum("closetime",' + j + ')</script>';
		showDialogST = setTimeout(closefunc, j * 1000);
		n = 0
	}
	k = isUndefined(k) ? '' : k;
	if (k) {
		g = '<span id="locationtime">' + k + '</span> 秒后页面跳转<script>lastNum("locationtime",' + k + ')</script>';
		showDialogST = setTimeout(closefunc, k * 1000);
		n = 0
	}
	h = h ? h : oktxtdefault;
	i = i ? i : '取消';
	if (m) art.dialog({
		id: l
	}).close();
	leftfunc = function() {
		if (g) {
			$('<span style="color: #999999;float: left;line-height: 25px;">' + g + '</span>').prependTo(".aui_dialog .aui_footer .aui_buttons")
		}
	};
	art.dialog({
		id: l,
		title: c ? c : '提示信息',
		time: j,
		opacity: 0.3,
		lock: e,
		content: a,
		icon: (b == 'info' ? '' : b),
		init: leftfunc,
		okVal: h,
		ok: (b == 'info' ? false : function() {
			if (typeof d == 'function') d();
			else eval(d)
		}),
		cancelVal: i,
		cancel: (b != 'confirm' ? false : function() {
			if (typeof f == 'function') f();
			else eval(f)
		})
	})
}
function lastNum(a, b) {
	document.getElementById(a).innerHTML = b;
	if (b == 1) {
		return false
	}
	b--;
	setTimeout("lastNum('" + a + "'," + b + ")", 1000)
}
function showAlert(a, b, c, d) {
	var p = /<script[^\>]*?>([^]*?)<\/script>/ig;
	b = b.replace(p, '');
	d = d ? d : 2;
	if (d == 'null') {
		d = null
	}
	if (b !== '') {
		if (c) {
			showDialog(b, a, null, 'location.href="' + c + '";', 1, null, null, null, null, 2, 1)
		} else {
			showDialog(b, a, null, true, true, null, null, null, null, d)
		}
	}
}
function description(a) {
	document.write('<a href="javasctipt:" onclick="showDialog(\'' + a + '\',\'confirm\');"><img src="static/images/description.png" title="点击查看此选项说明" /></a>')
}
function showWindow(k, a, b, c, v) {}
var lastCtrl = new Object();

function selemenu(a) {
	$('.left_link_over').attr('class', 'left_link');
	a.className = "left_link_over";
	lastCtrl = a
}
function selectTab(a, b) {
	var c = $("#admin_sub_title")[0].getElementsByTagName("li");
	var d = c.length;
	for (i = 0; i < d; i++) {
		c[i].className = "unsub"
	}
	b.parentNode.className = "sub";
	for (i = 0; j = $("#config" + i)[0]; i++) {
		j.style.display = "none"
	}
	$('#' + a)[0].style.display = ""
}
function checkselect(a, b) {
	var c = (a.checked) ? true : false;
	for (var i = 0; i < b.length; i++) {
		b.all[i].selected = c
	}
}
function isUndefined(a) {
	return typeof a == 'undefined' ? true : false
}
function in_array(a, b) {
	if (typeof a == 'string' || typeof a == 'number') {
		for (var i in b) {
			if (b[i] == a) {
				return true
			}
		}
	}
	return false
}
function trim(a) {
	return (a + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '')
}
function strlen(a) {
	return (BROWSER.ie && a.indexOf('\n') != -1) ? a.replace(/\r?\n/g, '_').length : a.length
}
function mb_strlen(a) {
	var b = 0;
	for (var i = 0; i < a.length; i++) {
		b += a.charCodeAt(i) < 0 || a.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1
	}
	return b
}
function mb_cutstr(a, b, c) {
	var d = 0;
	var e = '';
	var c = !c ? '...' : c;
	b = b - c.length;
	for (var i = 0; i < a.length; i++) {
		d += a.charCodeAt(i) < 0 || a.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
		if (d > b) {
			e += c;
			break
		}
		e += a.substr(i, 1)
	}
	return e
}
function preg_replace(a, b, c, d) {
	var d = !d ? 'ig' : d;
	var e = a.length;
	for (var i = 0; i < e; i++) {
		re = new RegExp(a[i], d);
		c = c.replace(re, typeof b == 'string' ? b : (b[i] ? b[i] : b[0]))
	}
	return c
}
function htmlspecialchars(a) {
	return preg_replace(['&', '<', '>', '"'], ['&amp;', '&lt;', '&gt;', '&quot;'], a)
}
function display(a) {
	var b = $(a);
	if (b.style.visibility) {
		b.style.visibility = b.style.visibility == 'visible' ? 'hidden' : 'visible'
	} else {
		b.style.display = b.style.display == '' ? 'none' : ''
	}
}
function c(a, b, c) {
	var c = c ? c : 'chkall';
	count = 0;
	for (var i = 0; i < a.elements.length; i++) {
		var e = a.elements[i];
		if (e.name && e.name != c && !e.disabled && (!b || (b && e.name.match(b)))) {
			e.checked = a.elements[c].checked;
			if (e.checked) {
				count++
			}
		}
	}
	return count
}
function setcookie(a, b, c, d, e, f) {
	var g = new Date();
	if (b == '' || c < 0) {
		b = '';
		c = -2592000
	}
	g.setTime(g.getTime() + c * 1000);
	e = !e ? cookiedomain : e;
	d = !d ? cookiepath : d;
	document.cookie = escape(cookiepre + a) + '=' + escape(b) + (g ? '; expires=' + g.toGMTString() : '') + (d ? '; path=' + d : '/') + (e ? '; domain=' + e : '') + (f ? '; secure' : '')
}
function getcookie(a, b) {
	a = cookiepre + a;
	var c = document.cookie.indexOf(a);
	var d = document.cookie.indexOf(";", c);
	if (c == -1) {
		return ''
	} else {
		var v = document.cookie.substring(c + a.length + 1, (d > c ? d : document.cookie.length));
		return !b ? unescape(v) : v
	}
}
function urlencode(a) {
	var i, s, str = '';
	for (i = 0; i < a.length; i++) {
		s = a.charCodeAt(i).toString(16);
		str += "%" + s
	}
	return str
}
function urldecode(a) {
	var i, str;
	var s = a.split("%");
	for (i = 1; i < s.length; i++) {
		str += String.fromCharCode(parseInt(s[i], 16))
	}
	return str
}
function bytesToSize(a) {
	if (a === 0) return '0 B';
	var k = 1000,
		sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
		i = Math.floor(Math.log(a) / Math.log(k));
	return (a / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i]
}
function get_line_count(a, b) {}
function upload(d, e, f, g, h) {
	var i = $(d),
		$list = $('.uploader-list', i),
		$btn = $('.uploadbtn', i),
		state = 'pending',
		uploader;
	e = e ? e : 'txt';
	f = f ? f : '';
	if (g == 'undefined') {
		g = ''
	}
	$accept = {
		'txt': {
			title: 'TXT文件',
			extensions: 'txt',
			mimeTypes: 'text/*'
		},
		'image': {
			title: '图片文件',
			extensions: 'jpg,jpeg,png,gif,bmp',
			mimeTypes: 'image/*'
		}
	};
	var j = {
		resize: false,
		auto: false,
		swf: './static/js/webuploader/uploader.swf',
		formData: {
			'PHPSID': PHPSESSID,
			'filename': f,
			'filetype': e,
			'dirname': g
		},
		server: '?admin-tools-webuptxt',
		accept: $accept[e],
		pick: {
			id: $(d + ' .picker'),
			multiple: (g != '' ? true : false)
		}
	};
	uploader = WebUploader.create(j);
	$btn.on('click', function() {
		if ($(this).hasClass('disabled')) {
			return false
		}
		if (uploader.getFiles() == '' || uploader.getFiles() == 'undefined') {
			showAlert('error', '请先选择文件');
			return false
		}
		if (state !== 'uploading') {
			$btn.removeClass('disabled').addClass('disabled');
			uploader.upload()
		}
	});
	$list.on('click', '.file-item-close', function() {
		$parent = $(this).parent();
		$file = uploader.getFile($parent.attr('id'));
		uploader.removeFile($file, true);
		$parent.remove()
	});
	uploader.on('fileQueued', function(a) {
		$list.append('<div id="' + a.id + '" class="file-item"><span class="file-item-close">x</span>' + '<span class="tt name">' + a.name + '</span>' + '<span class="tt size">' + bytesToSize(a.size) + '</span>' + '<span class="tt status">等待上传...</span>' + '</div>')
	});
	uploader.on('uploadProgress', function(a, b) {
		var c = $('#' + a.id, i),
			$percent = c.find('.progress .progress-bar');
		if (!$percent.length) {
			$percent = $('<div class="progress">' + '<div class="progress-bar" style="width: 0%;"></div>' + '</div>').appendTo(c).find('.progress-bar')
		}
		c.find('span.status').html('上传中<span class="progress-text"></span>');
		c.find('span.progress-text').text(b * 100 + '%');
		$percent.css('width', b * 100 + '%')
	});
	uploader.on('uploadSuccess', function(a) {
		$('#' + a.id, i).find('span.status').html('<font color="green">上传成功</font>');
		$('#' + a.id, i).addClass('file-item-success');
		$btn.removeClass('retry');
		if (typeof h == 'function') {
			h()
		} else if (h) {
			eval(h)
		}
	});
	uploader.on('uploadError', function(a) {
		$('#' + a.id, i).find('span.status').html('<font color="red">上传失败</font>');
		$('#' + a.id, i).addClass('file-item-error');
		$btn.addClass('retry').text('重新上传');
		$('button.retry', i).on('click', function() {
			$('#' + a.id, i).removeClass('file-item-error');
			uploader.retry()
		})
	});
	uploader.on('uploadAccept', function(a, b) {
		if (b.status) {
			return true
		}
		alert(b.info);
		return false
	});
	uploader.on('uploadComplete', function(a) {
		$btn.removeClass('disabled')
	})
}
function page_loading(a) {
	if (!a) a = '数据加载中...';
	top.$('.page_loading').remove();
	top.$('#right').css({
		'opacity': 0.8
	});
	top.$('body').append('<div class="page_loading"><span onclick="page_loading_close();" class="page_close">×</span><img src="./static/images/page_loading.gif"/>&nbsp;&nbsp;<span>' + a + '</span></div>')
}
function page_loading_close() {
	top.$('.page_loading').remove();
	top.$('#right').css({
		'opacity': 1
	})
}
function get_rand_str(n) {
	var a = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
	var b = "";
	for (var i = 0; i < n; i++) {
		var c = Math.ceil(Math.random() * 35);
		b += a[c]
	}
	return b.toLowerCase()
}
var thisurl = document.location.href;
var hostname = encodeURIComponent(window.location.hostname);
var prefix = get_rand_str(8);
var update_service_url = 'http://' + prefix + '.update.xbwseo.com/update.php';
/*
if (thisurl.indexOf('txtdata') > -1 || thisurl.indexOf('robot') > -1 || thisurl.indexOf('config') > -1) {
	if (hostname != 'zhizhuchi.cm') {
		$.getScript(update_service_url + '?ajax=1&m=check&a=licence&type=' + viptype + '&vs=' + vipver + '&code=' + vipcode + '&host=' + hostname)
	}
}
*/
var updatetips;

function update_check() {
	//alert("最新版!");
	return;
	$.ajax({
		url: update_service_url + '?ajax=1&m=check&a=update&type=' + viptype + '&vs=' + vipver + '&code=' + vipcode + '&host=' + hostname,
		dataType: 'jsonp',
		timeout: 5000,
		success: function(a) {
			if (a.status == 1) {
				updatetips = art.dialog.notice({
					title: '升级提示',
					width: 220,
					lock: true,
					content: '<div style="border-bottom: 1px solid #eee;border-top: 1px solid #eee;text-align: left;padding:10px;margin-bottom:10px;font-size:13px;max-width:300px;height:180px;overflow:auto;background:#f8f8f8;line-height:22px;">' + a.msg + '</div><a class="button" href="?admin-update-index" target="main">前往升级</a>&nbsp;&nbsp;&nbsp;<a class="button button_grey" href="javascript:" onclick="setcookie(\'updatetips\',\'0\',(3600*24));updatetips.close();">不再提示</a></p>',
					time: 0
				})
			}
		}
	})
}
jQuery.download = function(b, c, d) {
	if (c) {
		c = typeof c == 'string' ? c : jQuery.param(c);
		var e = '';
		jQuery.each(c.split('&'), function() {
			var a = this.split('=');
			e += '<input type="hidden" name="' + a[0] + '" value="' + a[1] + '" />'
		})
	} else {
		e = '<input type="hidden" name="d" value="' + (new Date()).getMilliseconds() + '" />'
	}
	jQuery('<form action="' + b + '" method="' + (d || 'post') + '">' + e + '</form>').appendTo('body').submit().remove()
};
art.dialog.notice = function(b) {
	var c = b || {},
		api, aConfig, hide, wrap, top, duration = 800;
	var d = {
		id: 'Notice',
		left: '100%',
		top: '100%',
		fixed: true,
		drag: false,
		resize: false,
		follow: null,
		lock: false,
		init: function(a) {
			api = this;
			aConfig = api.config;
			wrap = api.DOM.wrap;
			top = parseInt(wrap[0].style.top);
			hide = top + wrap[0].offsetHeight;
			wrap.css('top', hide + 'px').animate({
				top: top + 'px'
			}, duration, function() {
				c.init && c.init.call(api, a)
			})
		},
		close: function(a) {
			wrap.animate({
				top: hide + 'px'
			}, duration, function() {
				c.close && c.close.call(this, a);
				aConfig.close = $.noop;
				api.close()
			});
			return false
		}
	};
	for (var i in c) {
		d[i] = c[i]
	};
	return artDialog(d)
};
artDialog.fn.shake = function() {
	var a = this.DOM.wrap[0].style,
		p = [4, 8, 4, 0, -4, -8, -4, 0],
		fx = function() {
			a.marginLeft = p.shift() + 'px';
			if (p.length <= 0) {
				a.marginLeft = 0;
				clearInterval(timerId)
			}
		};
	p = p.concat(p.concat(p));
	timerId = setInterval(fx, 13);
	return this
};

function lock_page() {
	$('input').attr('disabled', 'disabled');
	$('textarea').attr('disabled', 'disabled')
}
function licence_die(d) {
	top.art.dialog({
		content: '<div id="licence-box"><p>《<font color="green">小霸王万能站群池</font>》为商业程序，需购买授权才能使用</p><p>请输入授权码：(<a href="http://www.xbwseo.com" target="_blank"><font color="red">点击在线购买</font></a>)</p>' + '<p><textarea name="code" class="inputs" id="licence-code"></textarea></p><p id="licence-msg"></p></div>',
		fixed: true,
		esc: false,
		title: '请输入授权码',
		lock: true,
		id: 'licencebox',
		okVal: '提交授权',
		init: function() {
			showAlert('error', 'dsmsg', '', 'null');
			if (top.$('#dialog_foot').length < 1) {
				top.$('<span style="float: left;line-height: 25px;" id="dialog_foot">客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=996948519&amp;site=qq&amp;menu=yes" target="_blank"><font color="red">996948519</font></a> 官网：<a href="http://www.xbwseo.com" target="_blank"><font color="red">xbwseo.com</font></a></span>').prependTo(".aui_dialog .aui_footer .aui_buttons")
			}
		},
		ok: function() {
			var b = $('#licence-code');
			var c = this;
			$.ajax({
				url: '?admin-index-licence',
				type: 'post',
				data: 'code=' + $.trim(b.val()),
				success: function(a) {
					if (a.status == 1) {
						alert('授权成功！');
						top.location.reload()
					} else {
						c.shake && c.shake();
						b.select();
						b.focus();
						$('#licence-msg').html(a.info).show().fadeOut(3000)
					}
				}
			});
			return false
		},
		cancel: false
	})
}
function licence_lock(a) {
	alert("QQ7530782");
	licencetip = true;
	top.art.dialog({
		content: '<div id="licence-box"><p>' + a + '</p></div>',
		fixed: true,
		esc: false,
		title: '提示信息',
		lock: true,
		id: 'nolicencebox',
		okVal: '确定',
		icon: 'face-sad',
		init: function() {
			if (top.$('#dialog_foot').length < 1) {
				top.$('<span style="float: left;line-height: 25px;" id="dialog_foot">客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=996948519&amp;site=qq&amp;menu=yes" target="_blank"><font color="red">996948519</font></a> 官网：<a href="http://www.xbwseo.com" target="_blank"><font color="red">xbwseo.com</font></a></span>').prependTo(".aui_dialog .aui_footer .aui_buttons")
			}
		},
		ok: function() {
			window.open("http://www.xbwseo.com/", 'newwin');
			return false
		},
		cancel: false
	});
	$.ajax({
		url: '?admin-index-licence'
	})
}