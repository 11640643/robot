<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\index\index.html";i:1660961197;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo htmlentities($title); ?></title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/resource/layuiadmin/style/admin.css" media="all">
</head>
<body class="layui-layout-body">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
        <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <!-- <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search.html?keywords=">
                </li> -->
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right" style="margin-right: 40px;">
                <?php if(session('manage_type') == 3): ?>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;">
                        邀请码：<cite><?php echo htmlentities($adminuser['idcode']); ?></cite>
                    </a>
                </li>
                <?php endif; ?>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="note">
                        <i class="layui-icon layui-icon-note"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;">
                        <cite><?php echo htmlentities($admin_username); ?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <!-- <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                        <dd><a lay-href="set/user/password.html">修改密码</a></dd>
                        <hr> -->
                        <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

    <!-- 侧边菜单 -->
    <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
            <div class="layui-logo">
                <span><?php echo htmlentities($title); ?></span>
            </div>
            <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
                <?php foreach($adminRole as $key=>$value): if(($value['role_name'] != '其他' && session('manage_type') == 3) or session('manage_type') < 3): ?>
                <li data-name="" class="layui-nav-item"><!-- layui-nav-itemed -->
                    <a href="javascript:;" lay-tips="/manage/<?php echo htmlentities($value['role_name']); ?>" lay-direction="2">
                        <i class="layui-icon
                        <?php switch($value['role_id']): case "1": ?>layui-icon-set<?php break; case "2": ?>layui-icon-user<?php break; case "3": ?>layui-icon-rmb<?php break; case "4": ?>layui-icon-list<?php break; case "5": ?>layui-icon-chart-screen<?php break; case "7": ?>layui-icon-read<?php break; case "255": ?>layui-icon-group<?php break; case "331": ?>layui-icon-senior<?php break; ?>
                        <?php endswitch; ?>"></i>
                        <cite><?php echo htmlentities($value['role_name']); ?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <?php foreach($value['role2'] as $key2=>$value2): if((!in_array($value2['role_name'], ['基本设置','管理员管理','权限管理','后台登录日志','后台操作日志']) && session('manage_type') == 3) or session('manage_type') < 3): ?>
                        <dd data-name=""><!-- layui-this -->
                            <a lay-href="/manage/<?php echo htmlentities($value2['role_url']); ?>"><?php echo htmlentities($value2['role_name']); ?></a>
                        </dd>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </dl>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- 页面标签 -->
    <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
            <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;"></a>
                    <dl class="layui-nav-child layui-anim-fadein">
                        <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                        <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                        <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
            <ul class="layui-tab-title" id="LAY_app_tabsheader">
                <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
            </ul>
        </div>
    </div>


    <!-- 主体内容 -->
    <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show" style="background-color: #e3e3e3;padding-left: 20px;padding-right: 20px;padding-top: 20px;">

<!-- 开始  -->
<style>    
	.store-total-container {
        font-size: 14px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .store-total-container .store-total-icon {
        top: 45%;
        right: 8%;
        font-size: 65px;
        position: absolute;
        color: rgba(255, 255, 255, 0.4);
    }

    .store-total-container .store-total-item {
        color: #fff;
        line-height: 4em;
        padding: 15px 25px;
        position: relative;
    }

    .store-total-container .store-total-item > div:nth-child(2) {
        font-size: 46px;
        line-height: 46px;
    }

</style>
<div class="think-box-shadow store-total-container notselect">

	<div class="layui-row layui-col-space15">
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)">
				<div>今天新增用户</div>
				<div><?php echo htmlentities($usertoday); ?></div>
				<div>昨日新增用户:<?php echo htmlentities($userzt); ?><br>总用户:<?php echo htmlentities($userzong); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-user"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)">
				<div>今天新增VIP</div>
				<div><?php echo htmlentities($viptoday); ?></div>
				<div>昨日新增VIP:<?php echo htmlentities($vipzt); ?><br>总VIP:<?php echo htmlentities($vipzong); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-auz"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#5fb878,#009688)">
				<div>今天充值(人)</div>
				<div><?php echo htmlentities($cztoday); ?></div>
				<div>昨天充值:<?php echo htmlentities($czzt); ?><br>总充值:<?php echo htmlentities($czzong); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-read"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)">
				<div>今天提现(人)</div>
				<div><?php echo htmlentities($txtoday); ?></div>
				<div>昨天提现:<?php echo htmlentities($txzt); ?><br>总提现:<?php echo htmlentities($txzong); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-rmb"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)">
				<div>今天充值</div>
				<div><?php echo htmlentities($cztodaye); ?></div>
				<div>昨天充值:<?php echo htmlentities($czzte); ?><br>总充值:<?php echo htmlentities($czzonge); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-user"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)">
				<div>今天提现总额</div>
				<div><?php echo htmlentities($txtodaye); ?></div>
				<div>昨天提现总额:<?php echo htmlentities($txzte); ?><br>总提现:<?php echo htmlentities($txzonge); ?></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-auz"></i>
		</div>
		<div class="layui-col-sm4 layui-col-md2" style="width:20%;">
			<div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)">
				<div>会员余额</div>
				<div style="font-size:16px;"><?php echo htmlentities($userzonge); ?></div>
				<div></div>
			</div>
			<i class="store-total-icon layui-icon layui-icon-read"></i>
		</div>
	</div>
</div>
</div>

<!-- 结束  -->

        </div>
    </div>

    <!-- 辅助元素，一般用于移动设备下遮罩 -->
    <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/resource/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>
</body>
</html>