<?php /*a:1:{s:75:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/users/user_level_add.html";i:1661297413;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加等级</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/resource/css/mylay.css">
</head>
<body>
    <div style="padding: 20px; background-color: #F2F2F2;">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form class="layui-form" action="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">名称</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="name" autocomplete="off" placeholder="请输入等级名称" class="layui-input">
                                </div>
                            </div>
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">西班牙名称</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <input type="text" name="ag_name" autocomplete="off" placeholder="请输入西班牙等级名称" class="layui-input">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="layui-form-item">
                                <label class="layui-form-label">等级</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="grade" autocomplete="off" placeholder="请输入等级" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">升级所需</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="amount" autocomplete="off" placeholder="升级所需" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：5000，单位：<?php echo htmlentities($unit); ?></div>
                            </div>
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">可租用矿机数量</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <input type="text" name="nums" autocomplete="off" placeholder="请输入等级名称" class="layui-input">-->
                            <!--    </div>-->
                            <!--    <div class="layui-form-mid layui-word-aux"></div>-->
                            <!--</div>-->
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">每日提现次数</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <input type="text" name="withdrawal" autocomplete="off" placeholder="请输入等级名称" class="layui-input">-->
                            <!--    </div>-->
                            <!--    <div class="layui-form-mid layui-word-aux">次</div>-->
                            <!--</div>-->
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">每日提现限额</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <input type="text" name="quota" autocomplete="off" class="layui-input">-->
                            <!--    </div>-->
                            <!--    <div class="layui-form-mid layui-word-aux">单位：<?php echo htmlentities($unit); ?></div>-->
                            <!--</div>-->
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">英文备注说明</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <textarea name="remark" class="layui-textarea" autocomplete="off"></textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="layui-form-item">-->
                            <!--    <label class="layui-form-label">西班牙备注说明</label>-->
                            <!--    <div class="layui-input-inline">-->
                            <!--        <textarea name="remark_ag" class="layui-textarea" autocomplete="off"></textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="user-level-add">立即提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/user.js"></script>
</body>
</html>