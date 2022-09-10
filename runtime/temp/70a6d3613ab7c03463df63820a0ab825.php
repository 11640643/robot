<?php /*a:1:{s:76:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\users\edit.html";i:1653579252;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑用户</title>
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
                            <table class="layui-table" lay-even lay-skin="nob">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">上级</label>
                                                <div class="layui-input-block">
                                                    <textarea placeholder="" class="layui-textarea" disabled="true"><?php echo htmlentities($userInfo['userSup']); ?></textarea>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">上级ID</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="" value="<?php echo htmlentities($userInfo['sid']); ?>" autocomplete="off" placeholder="" class="layui-input" readonly>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">只供查看，不能修改</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">会员等级</label>
                                                <div class="layui-input-inline">
                                                    <select name="vip_level" lay-verify="required" lay-search="">
                                                        <?php foreach($userInfo['userVip'] as $key=>$value): ?>
                                                        <option value="<?php echo htmlentities($value['grade']); ?>"<?php if($userInfo['vip_level'] == $value['grade']): ?> selected<?php endif; ?>><?php echo htmlentities($value['name']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">当前状态(不能修改，跟vip会员有关联,需要改名会员)</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">实名</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="realname" value="<?php echo htmlentities($userInfo['realname']); ?>" autocomplete="off" placeholder="" class="layui-input">
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">登录操作时验证的密码，不修改留空</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">TRC地址</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="address" value="<?php echo htmlentities($userInfo['address']); ?>" autocomplete="off" placeholder="" class="layui-input">
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">取款等操作时验证的密码，不修改留空</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">登录密码</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="password" value="" autocomplete="off" placeholder="" class="layui-input">
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">登录操作时验证的密码，不修改留空</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">取款密码</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="fund_password" value="" autocomplete="off" placeholder="" class="layui-input">
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">取款等操作时验证的密码，不修改留空</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">当前状态</label>
                                                <div class="layui-input-inline">
                                                    <select name="state" lay-verify="required" lay-search="">
                                                        <?php foreach($userState as $key=>$value): if($key): ?>
                                                        <option value="<?php echo htmlentities($key); ?>"<?php if($userInfo['state'] == $key): ?> selected<?php endif; ?>><?php echo htmlentities($value); ?></option>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">当前状态</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">注册时间</label>
                                                <div class="layui-input-inline">
                                                    <input type="text" name="" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($userInfo['reg_time'])? strtotime($userInfo['reg_time']) : $userInfo['reg_time'])); ?>" autocomplete="off" placeholder="" class="layui-input" readonly>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">只供查看，不能修改</div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <input type="hidden" name="id" value="<?php echo htmlentities($userInfo['id']); ?>" autocomplete="off" class="layui-input">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="useredit">立即提交</button>
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