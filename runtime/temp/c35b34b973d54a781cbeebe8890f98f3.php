<?php /*a:1:{s:71:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/users/user_goods.html";i:1659375054;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户矿机列表</title>
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
                                <label class="layui-form-label">搜索账号</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="username" placeholder="账号" class="layui-input" value="<?php echo isset($where['username']) ? htmlentities($where['username']) : ''; ?>">
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
                    <table class="layui-hide" id="goods" lay-filter="goods"></table>
                </div>
            </div>
        </div>
    </div>
    

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script>
    layui.use(['layer', 'element', 'form', 'upload', 'table'], function(){
        var $    = layui.$
        ,element = layui.element
        ,layer   = layui.layer
        ,form    = layui.form
        ,upload  = layui.upload
        ,table   = layui.table;

        //方法级渲染
        table.render({
            elem: '#goods'
            ,title: '任务列表'
            ,url: '/manage/Users/user_goods'
            ,method: 'post'
            ,cols: [[
                {checkbox: true, fixed: true, }
                ,{field: 'id', title: '编号', sort: true, fixed: 'left'}
				,{field: 'name', title: '英文名称', sort: true, fixed: 'left'}
				,{field: 'username', title: '用户账户', sort: true, fixed: 'left'}
                ,{field: 'income', title: '每小时收入', sort: true }
                ,{field: 'not_extracted', title: '已获得收益', sort: true }
                ,{field: 'run_times', title: '运行时间', sort: true}
                ,{field: 'add_time', title: '租赁日期', sort: true}
                ,{field: 'state_txt', title: '状态', sort: true}
                ,{title: '管理操作', width: '200', toolbar: '#action'}
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
        table.on('sort(goods)', function(obj){ //注：sort 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
            //尽管我们的 table 自带排序功能，但并没有请求服务端。
            //有些时候，你可能需要根据当前排序的字段，重新向服务端发送请求，从而实现服务端排序，如：
            table.reload('goods', {
                initSort: obj //记录初始排序，如果不设的话，将无法标记表头的排序状态。
                ,where: { //请求参数（注意：这里面的参数可任意定义，并非下面固定的格式）
                    sortField: obj.field //排序字段
                    ,sortType: obj.type //排序方式
                }
            });
        });
        
        // 头部左侧工具栏事件
        table.on('tool(goods)', function(obj){
            if(obj.event == 'stop'){
                layer.confirm('确定要停止该矿机吗', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        url:"/manage/users/stoplease",
                        type:"POST",
                        data: {
                            id: obj.data.id
                        },
                        dataType:"json",
                        timeout:15000,
                        success:function(data){
                            if(data == "1"){
                                layer.closeAll();
                                layui.table.reload('goods');
                            } else {
                                layer.alert(data);
                                return false;
                            }
                        }
                    });
                });
            }
        });
        
        active = {
            search: function(){
                //执行重载
                table.reload('goods', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        username: $("input[name='username']").val()
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