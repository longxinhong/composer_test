<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|ThinkOX管理后台</title>
    <link href="/thinkox_a5/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/thinkox_a5/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/thinkox_a5/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/thinkox_a5/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/thinkox_a5/Public/Admin/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/thinkox_a5/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/thinkox_a5/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/thinkox_a5/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/thinkox_a5/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
    <style>
        body{padding: 0}
    </style>

    <script type="text/javascript">
        var ThinkPHP = window.Think = {
            "ROOT": "/thinkox_a5", //当前网站地址
            "APP": "/thinkox_a5/index.php?s=", //当前项目地址
            "PUBLIC": "/thinkox_a5/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
            'URL_MODEL': "<?php echo C('URL_MODEL');?>",
            'WEIBO_ID': "<?php echo C('SHARE_WEIBO_ID');?>"
        }
    </script>
</head>
<body>
<!-- 头部 -->
<div class="header">
    <!-- Logo -->
    <a href="<?php echo U('Home/Index/index');?>" title="回到前台" target="_blank"><span class="logo"></span></a>
    <!-- /Logo -->

    <!-- 主导航 -->
    <ul class="main-nav">

        <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- /主导航 -->

    <!-- 用户栏 -->
    <div class="user-bar">
        <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
        <ul class="nav-list user-menu hidden">
            <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em>
            </li>
            <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
            <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
            <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
        </ul>
    </div>
</div>
<!-- /头部 -->

<!-- 边栏 -->
<div class="sidebar">
    <!-- 子导航 -->
    
    <!-- /子导航 -->
</div>
<!-- /边栏 -->

<!-- 内容区 -->
<div id="main-content">
    <div id="top-alert" class="fixed alert alert-error" style="display: none;">
        <button class="close fixed" style="margin-top: 4px;">&times;</button>
        <div class="alert-content">这是内容</div>
    </div>
    <div id="main" class="main">
        
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                    <span>您的位置:</span>
                    <?php $i = '1'; ?>
                    <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                            <?php else: ?>
                            <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                        <?php $i = $i+1; endforeach; endif; ?>
                </div><?php endif; ?>
            <!-- nav -->
        

        
    <!-- 主体 -->
    <div id="indexMain" class="index-main">
       <!-- 插件块 -->
       <div class="container-span"><?php echo hook('AdminIndex');?></div>
    </div>

    </div>
    <div class="cont-ft">
        <div class="copyright">
            <div class="fl">感谢使用<a href="http://tox.ourstu.com/" target="_blank">ThinkOX</a>社交框架 <a target="_blank" href="http://www.ourstu.com">嘉兴想天信息科技有限公司</a>&nbsp;&nbsp;&nbsp;|</div>
            <div class="fr">ThinkOX V1</div>
            <div class="fl">&nbsp;&nbsp;&nbsp;本程序基于<a href="http://www.onethink.cn/" target="_blank">OneThink</a>开发<a href="http://www.topthink.net/" target="_blank">上海顶想信息科技公司</a></div>
            <div class="fr"></div>
        </div>
    </div>
</div>
<!-- /内容区 -->
<script type="text/javascript">
    (function () {
        var ThinkPHP = window.Think = {
            "ROOT": "/thinkox_a5", //当前网站地址
            "APP": "/thinkox_a5/index.php?s=", //当前项目地址
            "PUBLIC": "/thinkox_a5/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
</script>
<script type="text/javascript" src="/thinkox_a5/Public/static/think.js"></script>
<script type="text/javascript" src="/thinkox_a5/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    +function () {
        var $window = $(window), $subnav = $("#subnav"), url;
        $window.resize(function () {
            $("#main").css("min-height", $window.height() - 130);
        }).resize();

        /* 左边菜单高亮 */
        url = window.location.pathname + window.location.search;
        url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
        $subnav.find("a[href='" + url + "']").parent().addClass("current");

        /* 左边菜单显示收起 */
        $("#subnav").on("click", "h3", function () {
            var $this = $(this);
            $this.find(".icon").toggleClass("icon-fold");
            $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                    prev("h3").find("i").addClass("icon-fold").end().end().hide();
        });

        $("#subnav h3 a").click(function (e) {
            e.stopPropagation()
        });

        /* 头部管理员菜单 */
        $(".user-bar").mouseenter(function () {
            var userMenu = $(this).children(".user-menu ");
            userMenu.removeClass("hidden");
            clearTimeout(userMenu.data("timeout"));
        }).mouseleave(function () {
                    var userMenu = $(this).children(".user-menu");
                    userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                    userMenu.data("timeout", setTimeout(function () {
                        userMenu.addClass("hidden")
                    }, 100));
                });

        /* 表单获取焦点变色 */
        $("form").on("focus", "input",function () {
            $(this).addClass('focus');
        }).on("blur", "input", function () {
                    $(this).removeClass('focus');
                });
        $("form").on("focus", "textarea",function () {
            $(this).closest('label').addClass('focus');
        }).on("blur", "textarea", function () {
                    $(this).closest('label').removeClass('focus');
                });

        // 导航栏超出窗口高度后的模拟滚动条
        var sHeight = $(".sidebar").height();
        var subHeight = $(".subnav").height();
        var diff = subHeight - sHeight; //250
        var sub = $(".subnav");
        if (diff > 0) {
            $(window).mousewheel(function (event, delta) {
                if (delta > 0) {
                    if (parseInt(sub.css('marginTop')) > -10) {
                        sub.css('marginTop', '0px');
                    } else {
                        sub.css('marginTop', '+=' + 10);
                    }
                } else {
                    if (parseInt(sub.css('marginTop')) < '-' + (diff - 10)) {
                        sub.css('marginTop', '-' + (diff - 10));
                    } else {
                        sub.css('marginTop', '-=' + 10);
                    }
                }
            });
        }
    }();
</script>

<script type="text/javascript">
    /* 插件块关闭操作 */
    $(".title-opt .wm-slide").each(function(){
        $(this).click(function(){
            $(this).closest(".columns-mod").find(".bd").toggle();
            $(this).find("i").toggleClass("mod-up");
        });
    })
    $(function(){
        // $('#main').attr({'id': 'indexMain','class': 'index-main'});
        $('.copyright').html('<div class="copyright"> ©2014 <a href="http://tox.ourstu.com/" target="_blank">ThinkOX社交框架</a> <a target="_blank" href="http://www.ourstu.com">嘉兴想天信息科技有限公司</a> | 基于<a href="http://www.onethink.cn" target="_blank">OneThink内容框架</a> <a href="http://www.topthink.net/" target="_blank">上海顶想信息科技公司</a></div>');
        $('.sidebar').remove();
    })
</script>

</body>
</html>