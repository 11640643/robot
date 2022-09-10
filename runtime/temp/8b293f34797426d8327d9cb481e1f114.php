<?php /*a:1:{s:79:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\report\counts.html";i:1654065344;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>全局报表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/resource/css/mylay.css">
    <link rel="stylesheet" href="/resource/css/page.css">
</head>
<body>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">总计</li>
                    <?php foreach($grades as $value): ?>
                    <li><?php echo htmlentities($value['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-col-sm6 layui-col-md1">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    全部VIP
                                    <span class="layui-badge layui-bg-blue layuiadmin-badge">人</span>
                                </div>
                                <div class="layui-card-body layuiadmin-card-list">
                                    <p class="layuiadmin-big-font"><?php echo isset($total) ? htmlentities($total) : 0; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach($grades as $key=>$value): ?>
                    <div class="layui-tab-item">
                        <div class="layui-col-sm6 layui-col-md1">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    今日新增
                                    <span class="layui-badge layui-bg-blue layuiadmin-badge">人</span>
                                </div>
                                <div class="layui-card-body layuiadmin-card-list">
                                    <p class="layuiadmin-big-font"><?php echo htmlentities($value['todayAdd']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-sm6 layui-col-md1" style="margin-left: 20px;">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    总数
                                    <span class="layui-badge layui-bg-blue layuiadmin-badge">人</span>
                                </div>
                                <div class="layui-card-body layuiadmin-card-list">
                                    <p class="layuiadmin-big-font"><?php echo htmlentities($value['total']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <table class="layui-table" lay-even lay-size="sm">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>充值</th>
                                    <th>手动加分</th>
                                    <th>提现</th>
                                    <th>注册奖励</th>
                                    <th>推广奖励</th>
                                    <th>下级返点</th>
                                    <th>购买会员</th>
                                    <th>提现驳回</th>
                                    <th>租赁矿机</th>
                                    <th>退还租金</th>
                                    <th>矿机收益</th>
                                    <th>手动减分</th>
                                    <th>模拟测试</th>
                                    <th>其它1</th>
                                    <th>其它2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>今日统计</td>
                                    <td><?php echo !empty($today[1]) ? htmlentities($today[1]) : 0; ?></td>
                                    <td><?php echo !empty($today[13]) ? htmlentities($today[13]) : 0; ?></td>
                                    <td><?php echo !empty($today[2]) ? htmlentities($today[2]) : 0; ?></td>
                                    <td><?php echo !empty($today[3]) ? htmlentities($today[3]) : 0; ?></td>
                                    <td><?php echo !empty($today[4]) ? htmlentities($today[4]) : 0; ?></td>
                                    <td><?php echo !empty($today[5]) ? htmlentities($today[5]) : 0; ?></td>
                                    <td><?php echo !empty($today[6]) ? htmlentities($today[6]) : 0; ?></td>
                                    <td><?php echo !empty($today[7]) ? htmlentities($today[7]) : 0; ?></td>
                                    <td><?php echo !empty($today[8]) ? htmlentities($today[8]) : 0; ?></td>
                                    <td><?php echo !empty($today[9]) ? htmlentities($today[9]) : 0; ?></td>
                                    <td><?php echo !empty($today[10]) ? htmlentities($today[10]) : 0; ?></td>
                                    <td><?php echo !empty($today[14]) ? htmlentities($today[14]) : 0; ?></td>
                                    <td><?php echo !empty($today[15]) ? htmlentities($today[15]) : 0; ?></td>
                                    <td><?php echo !empty($today[16]) ? htmlentities($today[16]) : 0; ?></td>
                                    <td><?php echo !empty($today[17]) ? htmlentities($today[17]) : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>昨日统计</td>
                                    <td><?php echo !empty($yesterday[1]) ? htmlentities($yesterday[1]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[13]) ? htmlentities($yesterday[13]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[2]) ? htmlentities($yesterday[2]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[3]) ? htmlentities($yesterday[3]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[4]) ? htmlentities($yesterday[4]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[5]) ? htmlentities($yesterday[5]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[6]) ? htmlentities($yesterday[6]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[7]) ? htmlentities($yesterday[7]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[8]) ? htmlentities($yesterday[8]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[9]) ? htmlentities($yesterday[9]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[10]) ? htmlentities($yesterday[10]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[14]) ? htmlentities($yesterday[14]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[15]) ? htmlentities($yesterday[15]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[16]) ? htmlentities($yesterday[16]) : 0; ?></td>
                                    <td><?php echo !empty($yesterday[17]) ? htmlentities($yesterday[17]) : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>本周统计</td>
                                    <td><?php echo !empty($week[1]) ? htmlentities($week[1]) : 0; ?></td>
                                    <td><?php echo !empty($week[13]) ? htmlentities($week[13]) : 0; ?></td>
                                    <td><?php echo !empty($week[2]) ? htmlentities($week[2]) : 0; ?></td>
                                    <td><?php echo !empty($week[3]) ? htmlentities($week[3]) : 0; ?></td>
                                    <td><?php echo !empty($week[4]) ? htmlentities($week[4]) : 0; ?></td>
                                    <td><?php echo !empty($week[5]) ? htmlentities($week[5]) : 0; ?></td>
                                    <td><?php echo !empty($week[6]) ? htmlentities($week[6]) : 0; ?></td>
                                    <td><?php echo !empty($week[7]) ? htmlentities($week[7]) : 0; ?></td>
                                    <td><?php echo !empty($week[8]) ? htmlentities($week[8]) : 0; ?></td>
                                    <td><?php echo !empty($week[9]) ? htmlentities($week[9]) : 0; ?></td>
                                    <td><?php echo !empty($week[10]) ? htmlentities($week[10]) : 0; ?></td>
                                    <td><?php echo !empty($week[14]) ? htmlentities($week[14]) : 0; ?></td>
                                    <td><?php echo !empty($week[15]) ? htmlentities($week[15]) : 0; ?></td>
                                    <td><?php echo !empty($week[16]) ? htmlentities($week[16]) : 0; ?></td>
                                    <td><?php echo !empty($week[17]) ? htmlentities($week[17]) : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>本月统计</td>
                                    <td><?php echo !empty($month[1]) ? htmlentities($month[1]) : 0; ?></td>
                                    <td><?php echo !empty($month[13]) ? htmlentities($month[13]) : 0; ?></td>
                                    <td><?php echo !empty($month[2]) ? htmlentities($month[2]) : 0; ?></td>
                                    <td><?php echo !empty($month[3]) ? htmlentities($month[3]) : 0; ?></td>
                                    <td><?php echo !empty($month[4]) ? htmlentities($month[4]) : 0; ?></td>
                                    <td><?php echo !empty($month[5]) ? htmlentities($month[5]) : 0; ?></td>
                                    <td><?php echo !empty($month[6]) ? htmlentities($month[6]) : 0; ?></td>
                                    <td><?php echo !empty($month[7]) ? htmlentities($month[7]) : 0; ?></td>
                                    <td><?php echo !empty($month[8]) ? htmlentities($month[8]) : 0; ?></td>
                                    <td><?php echo !empty($month[9]) ? htmlentities($month[9]) : 0; ?></td>
                                    <td><?php echo !empty($month[10]) ? htmlentities($month[10]) : 0; ?></td>
                                    <td><?php echo !empty($month[14]) ? htmlentities($month[14]) : 0; ?></td>
                                    <td><?php echo !empty($month[15]) ? htmlentities($month[15]) : 0; ?></td>
                                    <td><?php echo !empty($month[16]) ? htmlentities($month[16]) : 0; ?></td>
                                    <td><?php echo !empty($month[17]) ? htmlentities($month[17]) : 0; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="layui-card">
                    <div class="layui-card-body">
                        <table class="layui-table" lay-even lay-size="sm">
                            <thead>
                                <tr>
                                    <th>今日注册</th>
                                    <th>昨日注册</th>
                                    <th>本周注册</th>
                                    <th>本月注册</th>
                                    <th>总用户数</th>
                                    <th>被禁用户数</th>
                                    <th>用户总余额</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo !empty($today['register']) ? htmlentities($today['register']) : 0; ?></td>
                                    <td><?php echo !empty($yesterday['register']) ? htmlentities($yesterday['register']) : 0; ?></td>
                                    <td><?php echo !empty($week['register']) ? htmlentities($week['register']) : 0; ?></td>
                                    <td><?php echo !empty($month['register']) ? htmlentities($month['register']) : 0; ?></td>
                                    <td><?php echo !empty($total_user) ? htmlentities($total_user) : 0; ?></td>
                                    <td><?php echo !empty($forbidden_user) ? htmlentities($forbidden_user) : 0; ?></td>
                                    <td><?php echo !empty($total_balance) ? htmlentities($total_balance) : 0; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/report.js"></script>
</body>
</html>