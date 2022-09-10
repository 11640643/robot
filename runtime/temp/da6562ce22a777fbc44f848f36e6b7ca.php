<?php /*a:1:{s:82:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\base\admins_edit.html";i:1654066140;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加管理员</title>
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
                                <label class="layui-form-label">成员账号</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="username" value="<?php echo htmlentities($data['username']); ?>" autocomplete="off" placeholder="请输入成员账号" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：admin123</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">账号类型</label>
                                <div class="layui-input-inline">
                                    <select name="manage_type" lay-verify="required" lay-filter="manage_type" id="manage_type">
                                        <?php if(session('manage_type') == 1): ?>
                                        <option value="1">管理员</option>
                                        <option value="2">组长</option>
                                        <?php endif; ?>
                                        <option value="3">组员</option>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux"></div>
                            </div>
                            <?php if(session('manage_type') == 1): ?>
                            <div class="layui-form-item" id="group_select" style="display:none;">
                                <label class="layui-form-label">选择组长</label>
                                <div class="layui-input-inline">
                                    <select name="sid" lay-verify="required">
                                        <option value="0">--</option>
                                        <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['username']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux"></div>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="sid" value="<?php echo session('manage_userid'); ?>" />
                            <?php endif; ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label">密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="password" autocomplete="off" placeholder="请输入管理员密码" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：admin123</div>
                            </div>
                            <!-- <div class="layui-form-item">
                                <label class="layui-form-label">确认密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="password_r" autocomplete="off" placeholder="请再次输入密码" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：admin123</div>
                            </div> -->
                            <div class="layui-form-item">
                                <label class="layui-form-label">安全码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="safe_code" autocomplete="off" placeholder="请输入安全码" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如：admin123</div>
                            </div>
                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>" autocomplete="off" class="layui-input">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="admins_edit_do">立即提交</button>
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
<script src="/resource/js/manage/admins.js"></script>
<script>
    // JavaScript Document
layui.use(['layer', 'element', 'form', 'upload', 'table'], function(){
    var $    = layui.$
    ,element = layui.element
    ,layer   = layui.layer
    ,form    = layui.form
    
    $("#manage_type").val("<?php echo htmlentities($data['manage_type']); ?>");
    layui.form.render('select');
    
    form.on('select(manage_type)',function(data){
        if(data.value == 3){
            $("#group_select").show();
        }
    });
});
</script>
</body>
</html>