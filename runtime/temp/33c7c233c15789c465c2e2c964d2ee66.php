<?php /*a:1:{s:67:"/www/wwwroot/mmo.jrytc.cn/application/manage/view/base/setting.html";i:1661689692;}*/ ?>
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
                                                        <label class="layui-form-label">提示弹窗图</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="prompt_popup_picture" value="<?php echo htmlentities($data['prompt_popup_picture']); ?>" id="uploadBtn1" lay-filter="uploadBtn1" required  lay-verify="required"   placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">体验金弹窗图</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="experience_money_pictures" value="<?php echo htmlentities($data['experience_money_pictures']); ?>" id="uploadBtn2" lay-filter="uploadBtn2"  required  lay-verify="required"  placeholder="" autocomplete="off" class="layui-input">
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
                                                        <label class="layui-form-label">TRC钱包地址</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="trcaddress" value="<?php echo htmlentities($data['trcaddress']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            
                                            
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现开始时间</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="w_start" value="<?php echo htmlentities($data['w_start']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现结束时间</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="w_end" value="<?php echo htmlentities($data['w_end']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">一级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate1" value="<?php echo htmlentities($data['rebate1']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">二级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate2" value="<?php echo htmlentities($data['rebate2']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">三级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate3" value="<?php echo htmlentities($data['rebate3']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">四级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate4" value="<?php echo htmlentities($data['rebate4']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">五级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate5" value="<?php echo htmlentities($data['rebate5']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td><div class="layui-form-item">
                                                        <label class="layui-form-label">体验金</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="reg_award" value="<?php echo htmlentities($data['reg_award']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现手续费</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="fee" value="<?php echo htmlentities($data['fee']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">币种</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="currency" value="<?php echo htmlentities($data['currency']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">客服链接</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="service" value="<?php echo htmlentities($data['service']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现公告（中文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_w" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['info_w']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">最低提现</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="min_withdrawals" value="<?php echo htmlentities($data['min_withdrawals']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">注册地址</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="regurl" value="<?php echo htmlentities($data['regurl']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">3天</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="day3" value="<?php echo htmlentities($data['day3']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">15天</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="day15" value="<?php echo htmlentities($data['day15']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">60天</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="day60" value="<?php echo htmlentities($data['day60']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">90天</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="day90" value="<?php echo htmlentities($data['day90']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">120天</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="day120" value="<?php echo htmlentities($data['day120']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">领袖奖励VIP1</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="vip1" value="<?php echo htmlentities($data['vip1']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">领袖奖励VIP2</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="vip2" value="<?php echo htmlentities($data['vip2']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">领袖奖励VIP3</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="vip3" value="<?php echo htmlentities($data['vip3']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">领袖奖励VIP4</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="vip4" value="<?php echo htmlentities($data['vip4']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">领袖奖励VIP5</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="vip5" value="<?php echo htmlentities($data['vip5']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
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
