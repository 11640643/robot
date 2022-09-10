<?php /*a:1:{s:68:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/base/lang_add.html";i:1661247957;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加语言</title>
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
                                <label class="layui-form-label">语言名称</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="langname" autocomplete="off" placeholder="请输入语言名称" class="layui-input">
                                </div>
                            </div>
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
<script src="/resource/js/manage/lang.js"></script>
</body>
</html>