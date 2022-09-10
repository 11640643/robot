<?php /*a:1:{s:69:"/www/wwwroot/robot.jrytc.cn/application/manage/view/base/setting.html";i:1662718709;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>基本设置</title>
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
                <div class="layui-card-body">
                    <form class="layui-form" action="">
                        <div class="layui-tab layui-tab-card">
                            <ul class="layui-tab-title">
                                <li class="layui-this">基本设置</li>
                            </ul>
                            <div class="layui-tab-content">
                                <!-- 基本设置 -->
                                <div class="layui-tab-item layui-show">
                                    <table class="layui-table" lay-even lay-skin="nob" lay-size="sm" >
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">后台网站标题</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="manage_title" value="<?php echo htmlentities($data['manage_title']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">网站前台标题</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="title" value="<?php echo htmlentities($data['title']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">登录页面图标</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="pic_s" value="<?php echo htmlentities($data['pic_s']); ?>" id="uploadBtn" lay-filter="uploadBtn" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">登录页面标题</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="login_title" value="<?php echo htmlentities($data['login_title']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">Telegram</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="telegram" value="<?php echo htmlentities($data['telegram']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                 <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">客服链接</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="service" value="<?php echo htmlentities($data['service']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告（中文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_w" placeholder="请输入公告内容" class="layui-textarea"><?php echo htmlentities($data['info_w']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告（英文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_en" placeholder="请输入公告内容" class="layui-textarea"><?php echo htmlentities($data['info_en']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">注册地址</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="regurl" value="<?php echo htmlentities($data['regurl']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">默认语言</label>
                                                        <div class="layui-input-inline">
                                                            <!--<input type="text" name="default_lang" value="<?php echo htmlentities($data['default_lang']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">-->
                                                            
                                                            <select name="default_lang" lay-verify="required" lay-search="">
                                                                <option value="<?php echo htmlentities($data['default_lang']); ?>"><?php echo htmlentities($data['default_lang']); ?></option>
                                                                <option value="cn">中文</option>
                                                                <option value="en">英文</option>
                                                            </select>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                        <div class="layui-form-item" style="margin-top: 40px;text-align: center;">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="settingedit">立即提交</button>
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
<script src="/resource/js/manage/base.js"></script>
<script type="text/javascript" src="/resource/plugs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/resource/plugs/ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" src="/resource/plugs/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例

var recharge_help = UE.getEditor('recharge_help');
// JavaScript Document
layui.use(['layer', 'element', 'form', 'upload', 'table'], function(){
    var $    = layui.$
    ,element = layui.element
    ,layer   = layui.layer
    ,form    = layui.form
    ,upload  = layui.upload
    ,table   = layui.table;
    
    
    
    $('#uploadBtn').on('click',function(){
        
        layer.open({
            type: 2,
            area: ['50%', '50%'],
            title: '上传图片',
            content: '/manage/base/picsAdd'
        });
    }) ;
    
    
    $('#uploadBtn1').on('click',function(){
        
        layer.open({
            type: 2,
            area: ['50%', '50%'],
            title: '上传提示弹窗图片',
            content: '/manage/base/picsAdd_ts'
        });
    }) ;
    
    $('#uploadBtn2').on('click',function(){
        
        layer.open({
            type: 2,
            area: ['50%', '50%'],
            title: '上传体验金弹窗图片',
            content: '/manage/base/picsAdd_tyj'
        });
    }) ;
});
</script>
</body>
</html>
