<?php /*a:1:{s:69:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/bet/trade_edit.html";i:1654761796;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑分类</title>
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
                                <label class="layui-form-label">用户名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" readonly="readonly" value="<?php echo htmlentities($data['username']); ?>" autocomplete="off" placeholder="用户名" class="layui-input" disabled="disabled">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">交易金额</label>
                                <div class="layui-input-block">
                                    <input type="text" name="trade_amount" readonly="readonly" value="<?php echo htmlentities($data['trade_amount']); ?>" autocomplete="off" placeholder="交易金额" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">交易类型</label>
                                <div class="layui-input-block">
                                    <select name="trade_type" id="trade_type">
                                        <option value="1" <?php if($data['trade_type'] == 1): ?>selected<?php endif; ?>>充值</option>
                                        <option value="2" <?php if($data['trade_type'] == 2): ?>selected<?php endif; ?>>提现</option>
                                        <option value="3" <?php if($data['trade_type'] == 3): ?>selected<?php endif; ?>>注册奖励</option>
                                        <option value="4" <?php if($data['trade_type'] == 4): ?>selected<?php endif; ?>>推广奖励</option>
                                        <option value="5" <?php if($data['trade_type'] == 5): ?>selected<?php endif; ?>>下级返点</option>
                                        <option value="6" <?php if($data['trade_type'] == 6): ?>selected<?php endif; ?>>购买会员</option>
                                        <option value="7" <?php if($data['trade_type'] == 7): ?>selected<?php endif; ?>>提现驳回</option>
                                        <option value="8" <?php if($data['trade_type'] == 8): ?>selected<?php endif; ?>>租赁矿机</option>
                                        <option value="9" <?php if($data['trade_type'] == 9): ?>selected<?php endif; ?>>退还租金</option>
                                        <option value="10" <?php if($data['trade_type'] == 10): ?>selected<?php endif; ?>>矿机收益</option>
                                        <option value="13" <?php if($data['trade_type'] == 13): ?>selected<?php endif; ?>>手动补分</option>
                                        <option value="14" <?php if($data['trade_type'] == 14): ?>selected<?php endif; ?>>手动减分</option>
                                        <option value="15" <?php if($data['trade_type'] == 15): ?>selected<?php endif; ?>>模拟测试</option>
                                        <option value="16" <?php if($data['trade_type'] == 16): ?>selected<?php endif; ?>>其它1</option>
                                        <option value="17" <?php if($data['trade_type'] == 17): ?>selected<?php endif; ?>>其它2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">交易状态</label>
                                <div class="layui-input-block">
                                    <select name="state" id="state">
                                        <option value="1" <?php if($data['state'] == 1): ?>selected<?php endif; ?>>成功</option>
                                        <option value="2" <?php if($data['state'] == 2): ?>selected<?php endif; ?>>失败</option>
                                        <option value="3" <?php if($data['state'] == 3): ?>selected<?php endif; ?>>审核中</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">备注</label>
                                <div class="layui-input-block">
                                    <textarea class="layui-textarea" name="remarks" id="remarks" style="height: 60px;"><?php echo htmlentities($data['remarks']); ?></textarea>
                                </div>
                            </div>

                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <input type="hidden" name="id" id="id" value="<?php echo htmlentities($data['id']); ?>" autocomplete="off" class="layui-input">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="trade_edit">立即提交</button>
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
<script src="/resource/js/manage/bet.js"></script>
<script type="text/javascript">
layui.use(['layer', 'element', 'form', 'upload', 'table', 'laydate'], function(){
    var $    = layui.$
    ,element = layui.element
    ,layer   = layui.layer
    ,form    = layui.form
    ,upload  = layui.upload
    ,table   = layui.table
    ,laydate = layui.laydate;
    
    // 编辑分类
    form.on('submit(trade_edit)', function(data){
        $.ajax({
            url: "/manage/bet/trade_edit",
            data: {id: $("#id").val(), trade_type: $("#trade_type").val(), state: $('#state').val(), remarks: $('#remarks').val()},
            type: "POST",
            dataType: "json",
            timeout: 15000,
            beforeSend: function(){
                layer.load(1);
            },
            success: function(msg){
                var alertStr = (msg == 1) ? '操作成功' : msg;
                layer.msg(alertStr, {time: 2000}, function(){
                    if(msg==1){
                        parent.layer.closeAll();
						parent.layui.table.reload('financial');
                    }
                });
            },
            complete: function(){
                layer.closeAll("loading");
            }
        });
        return false;
    });
});
</script>
</body>
</html>