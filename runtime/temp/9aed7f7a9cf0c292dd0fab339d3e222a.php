<?php /*a:1:{s:87:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\users\recharge_record.html";i:1656555418;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>充值记录</title>
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
                <div class="layui-card" style="padding: 10px;">
                    <form class="layui-form search">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">账号</label>
                                <div class="layui-input-inline">
                                    <input class="layui-input" name="username" autocomplete="off">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">状态</label>
                                <div class="layui-input-inline">
                                    <select name="state" lay-search="">
                                        <option value="">全部</option>
                                        <option value="3">审核中</option>
                                        <option value="2">驳回</option>
                                        <option value="1">成功</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="datetime_range" class="layui-input" readonly>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">组长</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="manage_user" class="layui-input" >
                                </div>
                            </div>
                            <div class="layui-block" style="text-align: center;">
                                <button type="button" class="layui-btn" data-type="search">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="layui-col-md12">
                <div class="layui-card">
                    <table class="layui-hide" id="recharge_record" lay-filter="recharge_record"></table>
                </div>
            </div>
        </div>
    </div>
    <?php if(session('manage_type') < 3): ?>
    <!-- 表单元素 -->
    <script type="text/html" id="action">
        <div class="layui-btn-group">
            {{# if (d.state == 3) { }}
            <button type="button" id="rechargeDispose" class="layui-btn layui-btn-normal layui-btn-xs" data-id="{{d.id}}" lay-event="rechargeDispose">审核</button>
            {{# } }}
        </div>
    </script>
    <?php endif; ?>
    <!-- 音频 -->
    <audio id="myaudio" src="/resource/media/recharge_record.mp3" hidden="true">

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/bank.js"></script>
<script>
    layui.use(['table'], function(){
        var $ = layui.$
        ,table = layui.table;

        //方法级渲染
        table.render({
            elem: '#recharge_record'
            ,title: '充值记录'
            ,url: '/manage/Users/recharge_record'
            ,method: 'post'
            ,cols: [[
                {checkbox: true, fixed: true, totalRowText: '合计'}
                ,{field: 'username', title: '用户名', sort: true, fixed: 'left'}
                ,{field: 'manage_user', title: '组长', sort: true} 
                ,{field: 'money', title: '充值金额', sort: true, totalRow: true}
                ,{field: 'hash', title: '哈希地址', sort: true}
                ,{field: 'add_time', title: '充值时间', sort: true}
                ,{field: 'stateStr', title: '状态', sort: true}
                ,{field: 'dispose_time', title: '处理时间', sort: true}
                ,{field: 'remarks', title: '客服说明', sort: true}
                ,{title: '操作', width: '20%', toolbar: '#action'}
            ]]
            ,cellMinWidth: 100
            ,toolbar: '#toolbarDemo'
            ,defaultToolbar: ['filter', 'print', 'exports']
            ,totalRow: true
            ,page: {
                layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
            }
            ,skin: 'row' //行边框风格
            ,even: true //开启隔行背景
        });

        //监听排序事件
        table.on('sort(recharge_record)', function(obj){ //注：sort 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            //尽管我们的 table 自带排序功能，但并没有请求服务端。
            //有些时候，你可能需要根据当前排序的字段，重新向服务端发送请求，从而实现服务端排序，如：
            table.reload('recharge_record', {
                initSort: obj //记录初始排序，如果不设的话，将无法标记表头的排序状态。
                ,where: { //请求参数（注意：这里面的参数可任意定义，并非下面固定的格式）
                    sortField: obj.field //排序字段
                    ,sortType: obj.type //排序方式
                }
            });
        });

        active = {
            search: function(){
                //执行重载
                table.reload('recharge_record', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        username: $("input[name='username']").val()
                        ,state: $("select[name='state'] option:selected").val()
                        ,datetime_range: $("input[name='datetime_range']").val(),
                        user_type:$('select[name=user_type] option:selected').val(),
                        manage_user:$('input[name=manage_user]').val()
                    }
                    ,done: function(res, curr, count){
                        for (var i = 0; i < res.data.length; i++) {
                            if (res.data[i].statusStr == '处理中' || res.data[i].statusStr == '审核中' || res.data[i].statusStr == 'Reviewing') {
                                $("#myaudio")[0].play();
                                return false;
                            }
                        }
                    }
                }, 'data');
            }
        };

        $('.search .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
<script src="/resource/js/manage/media.js"></script>
</body>
</html>
