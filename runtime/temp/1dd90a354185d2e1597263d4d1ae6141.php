<?php /*a:1:{s:69:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/base/role_list.html";i:1642754574;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>权限管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/resource/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>
    <div style="padding: 20px; background-color: #F2F2F2;">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-btn-group" style="padding: 10px;">
                        <button type="button" class="layui-btn layui-btn-sm role_add">
                            <i class="layui-icon">&#xe654;</i>
                        </button>
                    </div>
                    <table class="layui-table" lay-even lay-size="sm">
                        <thead>
                            <tr>
                                <th>权限名</th>
                                <th>权限</th>
                                <th>权限ID</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($list): foreach($list as $key=>$value): ?>
                            <tr>
                                <td><?php echo htmlentities($value['role_name']); ?></td>
                                <td><?php echo htmlentities($value['role_url']); ?></td>
                                <td><?php echo htmlentities($value['id']); ?></td>
                                <td>
                                    <div class="layui-btn-group">
                                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" onClick="add_child(<?php echo htmlentities($value['id']); ?>)">
                                            <i class="layui-icon">&#xe654;</i>
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-xs" onClick="edit_child(<?php echo htmlentities($value['id']); ?>)">
                                            <i class="layui-icon">&#xe642;</i>
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-danger layui-btn-xs" onClick="delete_child(<?php echo htmlentities($value['id']); ?>)">
                                            <i class="layui-icon">&#xe640;</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php foreach($value['role2'] as $key2=>$value2): ?>
                            <tr>
                                <td style="padding-left: 40px;">
                                    <?php if(($key2==count($value['role2'])-1)): ?>
                                    └─
                                    <?php else: ?>
                                    ├─
                                    <?php endif; ?><?php echo htmlentities($value2['role_name']); ?>
                                </td>
                                <td><?php echo htmlentities($value2['role_url']); ?></td>
                                <td><?php echo htmlentities($value2['id']); ?></td>
                                <td>
                                    <div class="layui-btn-group">
                                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs" onClick="add_child(<?php echo htmlentities($value2['id']); ?>)">
                                            <i class="layui-icon">&#xe654;</i>
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-xs" onClick="edit_child(<?php echo htmlentities($value2['id']); ?>)">
                                            <i class="layui-icon">&#xe642;</i>
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-danger layui-btn-xs" onClick="delete_child(<?php echo htmlentities($value2['id']); ?>)">
                                            <i class="layui-icon">&#xe640;</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php foreach($value2['role3'] as $key3=>$value3): ?>
                            <tr>
                                <td style="padding-left: 80px;">
                                    <?php if(($key3==count($value2['role3'])-1)): ?>
                                    └─
                                    <?php else: ?>
                                    ├─
                                    <?php endif; ?>
                                    <?php echo htmlentities($value3['role_name']); ?>
                                </td>
                                <td><?php echo htmlentities($value3['role_url']); ?></td>
                                <td><?php echo htmlentities($value3['id']); ?></td>
                                <td>
                                    <div class="layui-btn-group">
                                        <button type="button" class="layui-btn layui-btn-xs" onClick="edit_child(<?php echo htmlentities($value3['id']); ?>)">
                                            <i class="layui-icon">&#xe642;</i>
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-danger layui-btn-xs" onClick="delete_child(<?php echo htmlentities($value3['id']); ?>)">
                                            <i class="layui-icon">&#xe640;</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php endforeach; else: ?>
                            <tr>
                                <td colspan="4">暂无数据</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="/resource/layuiadmin/layui/layui.js"></script>
<script src="/resource/js/manage/init_date.js"></script>
<script src="/resource/js/manage/role.js"></script>
</body>
</html>