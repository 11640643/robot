<?php /*a:1:{s:77:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\report\data.html";i:1654065326;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>每日报表</title>
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
                    <form class="layui-form" action="/manage/report/data" method="get">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">搜索账号</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="username" placeholder="账号" class="layui-input" value="<?php echo isset($where['username']) ? htmlentities($where['username']) : ''; ?>">
                                </div>
                            </div>
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
                            <?php if($data): foreach($data as $key=>$value): ?>
                            <tr>
                                <td><?php echo htmlentities($value['date']); ?></td>
                                <td><?php echo !empty($value[1]) ? htmlentities($value[1]) : 0; ?></td>
                                <td><?php echo !empty($value[13]) ? htmlentities($value[13]) : 0; ?></td>
                                <td><?php echo !empty($value[2]) ? htmlentities($value[2]) : 0; ?></td>
                                <td><?php echo !empty($value[3]) ? htmlentities($value[3]) : 0; ?></td>
                                <td><?php echo !empty($value[4]) ? htmlentities($value[4]) : 0; ?></td>
                                <td><?php echo !empty($value[5]) ? htmlentities($value[5]) : 0; ?></td>
                                <td><?php echo !empty($value[6]) ? htmlentities($value[6]) : 0; ?></td>
                                <td><?php echo !empty($value[7]) ? htmlentities($value[7]) : 0; ?></td>
                                <td><?php echo !empty($value[8]) ? htmlentities($value[8]) : 0; ?></td>
                                <td><?php echo !empty($value[9]) ? htmlentities($value[9]) : 0; ?></td>
                                <td><?php echo !empty($value[10]) ? htmlentities($value[10]) : 0; ?></td>
                                <td><?php echo !empty($value[14]) ? htmlentities($value[14]) : 0; ?></td>
                                <td><?php echo !empty($value[15]) ? htmlentities($value[15]) : 0; ?></td>
                                <td><?php echo !empty($value[16]) ? htmlentities($value[16]) : 0; ?></td>
                                <td><?php echo !empty($value[17]) ? htmlentities($value[17]) : 0; ?></td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">暂无数据</td>
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