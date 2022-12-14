<?php /*a:1:{s:71:"/www/wwwroot/robot.jrytc.cn/application/manage/view/base/role_edit.html";i:1642754574;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加权限</title>
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
                        <form class="layui-form layui-form-pane" action="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">权限名</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="role_name" value="<?php echo htmlentities($data['role_name']); ?>" autocomplete="off" placeholder="请输入权限名" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：添加权限</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">权限</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="role_url" value="<?php echo htmlentities($data['role_url']); ?>" autocomplete="off" placeholder="请输入权限" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">控制器/方法即可，如：Rule/index</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="sort" value="<?php echo htmlentities($data['sort']); ?>" autocomplete="off" placeholder="请输入排序" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：添加权限</div>
                            </div>
                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>" autocomplete="off" class="layui-input">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="role_edit_do">立即提交</button>
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
<script src="/resource/js/manage/role.js"></script>
</body>
</html>