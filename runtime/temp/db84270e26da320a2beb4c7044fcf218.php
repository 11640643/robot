<?php /*a:1:{s:87:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\report\team_statistic.html";i:1654065354;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>团队报表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/resource/css/mylay.css">
    <link rel="stylesheet" href="/resource/css/page.css">
</head>
<body>
    <div style="padding: 20px; background-color: #F2F2F2;">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card" style="padding: 10px;">
                    <form class="layui-form" action="/manage/report/team_statistic" method="get">
                        <div class="layui-form-item">
                            <!-- <div class="layui-inline">
                                <label class="layui-form-label">搜索账号</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="username" placeholder="账号" class="layui-input" value="<?php echo isset($where['username']) ? htmlentities($where['username']) : ''; ?>">
                                </div>
                            </div> -->
                            <div class="layui-inline">
                                <label class="layui-form-label">时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="date_range" value="<?php echo isset($where['date_range']) ? htmlentities($where['date_range']) : ''; ?>" class="layui-input" readonly>
                                </div>
                            </div>
                        </div>
                        <p style="text-align: center;"><button type="submit" class="layui-btn">搜索</button></p>
                    </form>
                </div>
            </div>
            <div class="layui-col-md12">
                <div class="layui-card">
                    <table class="layui-table" lay-even lay-size="sm">
                        <thead>
                            <tr>
                                <th>会员账号</th>
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
                            <?php if($user_team): foreach($user_team as $key=>$value): ?>
                            <tr>
                                <td><?php echo isset($value['username']) ? htmlentities($value['username']) : 0; ?></td>
                                <td><?php echo isset($value['list1']) ? htmlentities($value['list1']) : 0; ?></td>
                                <td><?php echo isset($value['list13']) ? htmlentities($value['list13']) : 0; ?></td>
                                <td><?php echo isset($value['list2']) ? htmlentities($value['list2']) : 0; ?></td>
                                <td><?php echo isset($value['list3']) ? htmlentities($value['list3']) : 0; ?></td>
                                <td><?php echo isset($value['list4']) ? htmlentities($value['list4']) : 0; ?></td>
                                <td><?php echo isset($value['list5']) ? htmlentities($value['list5']) : 0; ?></td>
                                <td><?php echo isset($value['list6']) ? htmlentities($value['list6']) : 0; ?></td>
                                <td><?php echo isset($value['list7']) ? htmlentities($value['list7']) : 0; ?></td>
                                <td><?php echo isset($value['list8']) ? htmlentities($value['list8']) : 0; ?></td>
                                <td><?php echo isset($value['list9']) ? htmlentities($value['list9']) : 0; ?></td>
                                <td><?php echo isset($value['list10']) ? htmlentities($value['list10']) : 0; ?></td>
                                <td><?php echo isset($value['list14']) ? htmlentities($value['list14']) : 0; ?></td>
                                <td><?php echo isset($value['list15']) ? htmlentities($value['list15']) : 0; ?></td>
                                <td><?php echo isset($value['list16']) ? htmlentities($value['list16']) : 0; ?></td>
                                <td><?php echo isset($value['list17']) ? htmlentities($value['list17']) : 0; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>总人数：<?php echo htmlentities($team['num']); ?></td>
                                <td>总充值：<?php echo htmlentities($team['sum1']); ?></td>
                                <td>总手动加分：<?php echo htmlentities($team['sum13']); ?></td>
                                <td>总提现：<?php echo htmlentities($team['sum2']); ?></td>
                                <td>总注册奖励：<?php echo htmlentities($team['sum3']); ?></td>
                                <td>总推广奖励：<?php echo htmlentities($team['sum4']); ?></td>
                                <td>总下级返点：<?php echo htmlentities($team['sum5']); ?></td>
                                <td>总购买会员：<?php echo htmlentities($team['sum6']); ?></td>
                                <td>总租赁矿机：<?php echo htmlentities($team['sum7']); ?></td>
                                <td>总提现驳回：<?php echo htmlentities($team['sum8']); ?></td>
                                <td>总退还租金：<?php echo htmlentities($team['sum9']); ?></td>
                                <td>总矿机收益：<?php echo htmlentities($team['sum10']); ?></td>
                                <td>总手动减分：<?php echo htmlentities($team['sum14']); ?></td>
                                <td>总模拟测试：<?php echo htmlentities($team['sum15']); ?></td>
                                <td>总其它1：<?php echo htmlentities($team['sum16']); ?></td>
                                <td>总其它2：<?php echo htmlentities($team['sum17']); ?></td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="15" style="text-align: center;">暂无数据</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/report.js"></script>
</body>
</html>