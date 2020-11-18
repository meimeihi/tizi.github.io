$(function () {
    if ($('.movie-screenshot').length>0) {
        $(".movie-screenshot a:has(img)").slimbox({
            overlayOpacity: 0.75,
            overlayFadeDuration: 200,
            imageFadeDuration: 200,
            captionAnimationDuration: 200,
            loop:false,
            counterText:"Image {x} of {y}"
        });
    };
    $(".swith").bind('click',
        function(){
            if ( $("#hidden-introduce").is(":hidden") ) {
                $('#hidden-introduce').show();
                $(this).html('<i class="glyphicon glyphicon-chevron-up"></i>收起部分');
            }else{
                $('#hidden-introduce').hide();
                $(this).html('<i class="glyphicon glyphicon-chevron-down"></i>展开全部');  
            };
        }
    );
    $(".casts-swith").bind('click',
        function(){
            if ( $("#casts span").is(":hidden") ) {
                $('#casts span').show();
                $(this).html('<i class="glyphicon glyphicon-chevron-up"></i>收起部分');
            }else{
                $('#casts span').hide();
                $(this).html('<i class="glyphicon glyphicon-chevron-down"></i>展开全部');
            };
        }
    );
    
    $("[data-toggle=\"popover\"]").popover({
        trigger:'manual',
        placement : 'bottom',
        html: 'true',
        content : '<div style="width:220px;">正在载入。。。</div>',
        animation: false
    }).on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $.ajax({
            type:"GET",
            url:'/user/userInfoBox/'+$(this).data('user-id'),
            success:function(data){
                $(_this).next().find("div.popover-content").html(data);
            }
        });
        $(this).siblings(".popover").on("mouseleave", function () {
            setTimeout(function () {
                if (!$(".popover:hover").length) {
                    $(_this).popover("hide")
                }
            }, 100);
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide")
            }
        }, 100);
    });

    if (typeof(mid)!='undefined') {$.get('/videos/addtimes/'+mid)};
});
var tocid = 0;
function replySub(mid) {
  if ($("#replycontent").val()=='') {
    alert('评论不能为空');
    return false;
  };
  $.post(
    '/videos/reply',
    {'comcontent':$("#replycontent").val(),'cid':tocid,'mid':mid},
    function(data,status){
      if (data.code==1) {
        alert(data.msg);
        var pager_obj = $('#pager').bootstrapPaginator("getPages");
        curPage = pager_obj.current;
        totalCount = pager_obj.totalCount;
        if (tocid==0) {
          if (totalCount && totalCount%10 == 0) curPage = curPage+1;
          options = {totalPages: curPage,currentPage: curPage,totalCount:totalCount+1};
          $('#pager').bootstrapPaginator(options);
        };
        reloadComments(mid,curPage);
      }else{
          alert(data.msg);
      };
    },
    'JSON'
  );
}

function zan(cid){
    fetchurl('/comment/up/'+cid);
}
function cai(cid){
    fetchurl('/comment/down/'+cid);
}

function checkName(){
  $.get("/account/check_name?name="+$("#name").val(),function(data){
    alert(data.msg);
  },'JSON');
}
function reloadComments(mid,page){
    $.get('/videos/subComments/'+mid+'/'+page,function(data,status){
            $('.comment').html(data);
        }
    );
}
function replyto(cid,name){
    tocid = cid;
    $('#reply-to-box').html('@'+name+'  - <a href="javascript:cancel_reply_to()">取消</a>');
    location.hash="reply-box";
}
function cancel_reply_to(){
    tocid = 0;
    $('#reply-to-box').html('回复：楼主');
}
function shareLink(){
    $.ajax({
        type: 'POST',
        url: "/videos/sharelink",
        data: $('#shareForm').serialize(),
        dataType:'json',
        success: function(data){
            $('#shareModal').modal('hide');
            alert(data.msg);
        }
    });
}
function SetCookie(name,value){
    var Days = 30;
    var exp  = new Date();
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" +exp.toGMTString()+";path=/;";
}
function GetCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null) return unescape(arr[2]); return null;
}

// TODO所有关注相关的合并
function follow_tv(dom,mid){
    // 喜欢的电影
    $(dom).addClass('disabled');
    $.ajax({
        type: 'POST',
        url: "/videos/followTv",
        data: {'mid': mid},
        dataType: 'json',
        success: function(data){
            if (data.code == 1) {
                $(dom).removeClass('disabled');
                if ($(dom).hasClass('btn-success')) {
                    $(dom).removeClass('btn-success');
                    $(dom).addClass('btn-default');
                }else{
                    $(dom).addClass('btn-success');
                };
            }else{
                alert(data.msg);
            };
        }
    });
}

// 加关注
function follow(dom,id){
    $(dom).addClass('disabled');
    url = '/user/follow';
    $.ajax({
        type: 'POST',
        url: url,
        dataType:'json',
        data: {'uid': id},
        success: function(data){
            if (data.code==1) {
                if ( $('#follow').is(":visible") ) {
                    $('#follow').hide();
                    $('#unfollow').show();
                }else{
                    $('#follow').show();
                    $('#unfollow').hide();
                };
                $(dom).removeClass('disabled');
            }else{
                alert(data.msg);
            };
        }
    });
}

// 喜欢的电影
function like(dom,mid) {
    $(dom).addClass('disabled');
    $.ajax({
        type: 'POST',
        url: "/videos/like",
        data: {'mid': mid},
        dataType: 'json',
        success: function(data){
            if (data.code == 1) {
                $(dom).removeClass('disabled');
                if ($(dom).hasClass('btn-danger')) {
                    $(dom).removeClass('btn-danger');
                }else{
                    $(dom).addClass('btn-danger');
                };
            }else{
                alert(data.msg);
            };
        }
    });
}

// 想看的电影
function plan(dom,mid) {
    $(dom).addClass('disabled');
    $.ajax({
        type: 'POST',
        url: "/videos/plan",
        data: {'mid': mid},
        dataType: 'json',
        success: function(data){
            if (data.code == 1) {
                $("#watched_btn").removeClass('btn-success');
                $("#plan_btn").toggleClass('btn-success');
                $(dom).removeClass('disabled');
            }else{
                alert(data.msg);
            };
        }
    });
}

// 看过的电影
function watched(dom,mid) {
    $(dom).addClass('disabled');
    $.ajax({
        type: 'POST',
        url: "/videos/watched",
        data: {'mid': mid},
        dataType: 'json',
        success: function(data){
            if (data.code == 1) {
                $("#plan_btn").removeClass('btn-success');
                $("#watched_btn").toggleClass('btn-success');
                $(dom).removeClass('disabled');
            }else{
                alert(data.msg);
            };
        }
    });
}

function verify_email(){
    $.ajax({
        type: 'GET',
        url: "/account/verify/email",
        dataType:'JSON',
        success: function(data){
            alert(data.msg);
        }
    });
}

function delViewLog(dom,mid) {
    if (confirm('确认隐藏？')) {
        $.ajax({
            type: 'GET',
            url: "/videos/delViewLog/"+mid,
            dataType:'JSON',
            success: function(data){
                if (data.code==0) {
                    alert(data.msg);
                }else{
                    dom.remove();
                }
            }
        });
    }
}

function fetchurl(url){
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'JSON',
        success: function(data){
            alert(data.msg);
        }
    });
}