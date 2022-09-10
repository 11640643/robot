<?php /*a:1:{s:81:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\users\user_list.html";i:1652282784;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员列表</title>
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
                            <div class="layui-inline">
                                <label class="layui-form-label">账号</label>
                                <div class="layui-input-inline">
                                    <input class="layui-input" name="username" autocomplete="off">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">余额</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="balance1" placeholder="￥" class="layui-input">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="balance2" placeholder="￥" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                    <label class="layui-form-label">账号状态</label>
                                    <div class="layui-input-inline">
                                        <select name="state" lay-search="">
                                            <option value="1">正常</option>
                                            <option value="2">禁止登录</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">注册时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="datetime_range" class="layui-input" readonly>
                                </div>
                            </div>
                            <div class="layui-inline" style="text-align: center;">
                                <button type="button" class="layui-btn" data-type="search">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="layui-col-md12">
                <div class="layui-card">
                    <table class="layui-hide" id="userList" lay-filter="userList"></table>
                </div>
            </div>
        </div>
    </div>
    <?php if(session('manage_type') < 3): ?>
    <!-- 表单元素 -->
    <script type="text/html" id="lockAccount">
        <input type="checkbox" name="lockAccount" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="userAction" data-suburi="lockAccount" {{ d.state == 2 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="danger">
        <input type="checkbox" name="danger" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="userAction" data-suburi="risk" {{ d.danger == 1 ? 'checked' : '' }}>
    </script>
    <?php endif; ?>
    <script type="text/html" id="action">
    	<div class="layui-btn-group">
    	    <?php if(session('manage_type') < 3): ?>
    		<button type="button" class="layui-btn layui-btn-normal layui-btn-xs" lay-event="capital">资金</button>
    		<button type="button" class="layui-btn layui-btn-xs" lay-event="edit">
    			<i class="layui-icon">&#xe642;</i>
    		</button>
    		<?php endif; ?>
            <button type="button" class="layui-btn layui-btn-xs" onclick="location.href='/manage/Report/team_statistic?username={{ d.username }}'">
                查看团队
            </button>
	    </div>
    </script>


<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/user.js"></script>
<script>
    layui.use(['table'], function(){
        var $ = layui.$
        ,table = layui.table;

        //方法级渲染
        table.render({
            elem: '#userList'
            ,title: '用户列表'
            ,url: '/manage/users/userList'
            ,method: 'post'
            ,cols: [[
                {checkbox: true, fixed: true, totalRowText: '合计'}
                ,{field: 'username', title: '账号', sort: true, fixed: 'left'}
                ,{field: 'vname', title: '等级'}
                ,{field: 'balance', title: '余额', sort: true, totalRow: true}
                ,{field: 'state', title: '账号状态', sort: true, templet: function(d){
                    return d.stateStr;
                }}
                ,{field: 'reg_ip', title: '注册IP', sort: true}
                ,{field: 'reg_time', title: '注册日期', sort: true}
                ,{title: '账号锁定', templet: '#lockAccount', unresize: true}
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
        table.on('sort(userList)', function(obj){ //注：sort 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            //尽管我们的 table 自带排序功能，但并没有请求服务端。
            //有些时候，你可能需要根据当前排序的字段，重新向服务端发送请求，从而实现服务端排序，如：
            table.reload('userList', {
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
                table.reload('userList', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        username: $("input[name='username']").val()
                        ,uid: $("input[name='uid']").val()
                        ,balance1: $("input[name='balance1']").val()
                        ,balance2: $("input[name='balance2']").val()
                        ,state: $("select[name='state'] option:selected").val()
                        ,is_automatic: $("select[name='is_automatic'] option:selected").val()
						,idcode:$("input[name='idcode']").val(),
						user_type:$('select[name=user_type] option:selected').val()

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
