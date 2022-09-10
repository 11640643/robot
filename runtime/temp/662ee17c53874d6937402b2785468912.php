<?php /*a:1:{s:79:"D:\phpstudy_pro\WWW\miningMachineOne\application\manage\view\base\pics_add.html";i:1642998294;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>上传图片</title>
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
                                <label class="layui-form-label">缩略图</label>
                                <div class="layui-upload-drag cover_img">
                                    <i class="layui-icon layui-icon-upload"></i>
                                    <p>点击上传，或将文件拖拽到此处</p>
                                    <div class="layui-hide">
                                        <hr>
                                        <img src="" alt="上传成功后渲染" style="max-width: 150px">
                                        <p></p>
                                    </div>
                                </div>
                                <input type="hidden" name="cover_img" value="" class="layui-input">
                            </div>
                            <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit id="pic_upload" lay-filter="pic_upload">立即提交</button>
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
<script src="/resource/js/manage/base.js"></script>
<script>
    // JavaScript Document
layui.use(['layer', 'element', 'form', 'upload', 'table'], function(){
    var $    = layui.$
    ,element = layui.element
    ,layer   = layui.layer
    ,form    = layui.form
    ,upload  = layui.upload
    ,table   = layui.table;
    
    $("#pic_upload").on('click', function(){
        var pic_s = window.top.document.getElementById("uploadBtn");
        var path = $("input[name='cover_img']").val();
        // pic_s.value = path;
        $("#uploadBtn", window.parent.document).val(path);
        parent.layer.closeAll();
    });
});
</script>
</body>
</html>