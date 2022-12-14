<?php /*a:1:{s:80:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/other/after_operation_log.html";i:1642754578;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后端操作日志</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
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
                                <label class="layui-form-label">IP</label>
                                <div class="layui-input-inline">
                                    <input class="layui-input" name="ip" autocomplete="off">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">内容</label>
                                <div class="layui-input-inline">
                                    <input class="layui-input" name="log" autocomplete="off">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">后台类型</label>
                                <div class="layui-input-inline">
                                    <select name="isadmin" lay-search="">
                                        <option value="">全部</option>
                                        <option value="1">运营后台</option>
                                        <option value="3">商户后台</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="datetime_range" class="layui-input" readonly>
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
                    <table class="layui-hide" id="after_operation_log" lay-filter="after_operation_log"></table>
                </div>
            </div>
        </div>
    </div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/base.js"></script>
<script>
    layui.use(['table'], function(){
        var $ = layui.$
        ,table = layui.table;

        //方法级渲染
        table.render({
            elem: '#after_operation_log'
            ,title: '后台操作日志'
            ,url: '/manage/other/after_operation_log'
            ,method: 'post'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'username', title: '用户', sort: true}
                ,{field:'ip', title: 'IP', sort: true}
                ,{field:'isadmin', title: '类型', sort: true}
                ,{field:'time', title: '时间', sort: true}
                ,{field:'log', title: '内容'}
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
        table.on('sort(after_operation_log)', function(obj){ //注：sort 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            //尽管我们的 table 自带排序功能，但并没有请求服务端。
            //有些时候，你可能需要根据当前排序的字段，重新向服务端发送请求，从而实现服务端排序，如：
            table.reload('after_operation_log', {
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
                table.reload('after_operation_log', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        username: $("input[name='username']").val()
                        ,ip: $("input[name='ip']").val()
                        ,log: $("input[name='log']").val()
                        ,isadmin: $("select[name='isadmin'] option:selected").val()
                        ,datetime_range: $("input[name='datetime_range']").val()
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
</body>
</html>