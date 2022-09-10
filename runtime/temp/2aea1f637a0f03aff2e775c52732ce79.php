<?php /*a:1:{s:73:"D:\phpstudy_pro\WWW\m.uizsl.com\application\manage\view\base\setting.html";i:1654615828;}*/ ?>
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
                                                        <label class="layui-form-label">巴西支付汇率</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="bxhl" value="<?php echo htmlentities($data['bxhl']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">墨西哥支付汇率</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="mxghl" value="<?php echo htmlentities($data['mxghl']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
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
                                                        <label class="layui-form-label">上级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate1" value="<?php echo htmlentities($data['rebate1']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">次上级返点</label>
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
                                                        <label class="layui-form-label">次次上级返点</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="rebate3" value="<?php echo htmlentities($data['rebate3']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux">%</div>
                                                    </div>
                                                </td>
                                                <td><div class="layui-form-item">
                                                        <label class="layui-form-label">注册奖励</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="reg_award" value="<?php echo htmlentities($data['reg_award']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">充值公告（英文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_r" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['info_r']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现公告（英文）</label>
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
                                                        <label class="layui-form-label">充值公告（西班牙文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_r_ag" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['info_r_ag']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">提现公告（西班牙文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_w_ag" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['info_w_ag']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">分享提示（英文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="sharetxt" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['sharetxt']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">分享提示（西班牙文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="sharetxt_ag" placeholder="请输入提现提示" class="layui-textarea"><?php echo htmlentities($data['sharetxt_ag']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">WhastApp链接</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="whastapp" value="<?php echo htmlentities($data['whastapp']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">Telegram链接</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="telegram" value="<?php echo htmlentities($data['telegram']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">团队成员每页显示数量</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="teamnum" value="<?php echo htmlentities($data['teamnum']); ?>" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
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
                                                        <label class="layui-form-label">平台活动</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="activity_img" value="<?php echo htmlentities($data['activity_img']); ?>" id="uploadImg" lay-filter="uploadImg" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td> 
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">充值流程图</label>
                                                        <div class="layui-input-inline">
                                                            <input type="text" name="recharge_process" value="<?php echo htmlentities($data['recharge_process']); ?>" id="uploadProcess" lay-filter="uploadProcess" required  lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
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
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告弹窗（英文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_tc_en" placeholder="请输入公告弹窗" class="layui-textarea"><?php echo htmlentities($data['info_tc_en']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告弹窗（西班牙文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_tc_ag" placeholder="请输入公告弹窗" class="layui-textarea"><?php echo htmlentities($data['info_tc_ag']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告弹窗2（英文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_tc2_en" placeholder="请输入公告弹窗2" class="layui-textarea"><?php echo htmlentities($data['info_tc2_en']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">公告弹窗2（西班牙文）</label>
                                                        <div class="layui-input-inline">
                                                            <textarea name="info_tc2_ag" placeholder="请输入公告弹窗2" class="layui-textarea"><?php echo htmlentities($data['info_tc2_ag']); ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">如何挖矿（英文）</label>
                                                        <div class="layui-input-inline" style="width:600px;">
                                                            <!-- <textarea name="help" placeholder="请输入" class="layui-textarea"><?php echo htmlentities($data['help']); ?></textarea> -->
                                                            <textarea name="help" id="help" style="width:100%;height:500px;"><?php echo $data['help']; ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">如何挖矿（西班牙文）</label>
                                                        <div class="layui-input-inline" style="width:600px;">
                                                            <!-- <textarea name="help_ag" placeholder="请输入" class="layui-textarea"><?php echo htmlentities($data['help_ag']); ?></textarea> -->
                                                            <textarea name="help_ag" id="help_ag" style="width:100%;height:500px;"><?php echo $data['help_ag']; ?></textarea>
                                                        </div>
                                                        <div class="layui-form-mid layui-word-aux"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="layui-form-item">
                                                        <label class="layui-form-label">充值帮助</label>
                                                        <div class="layui-input-inline" style="width:600px;">
                                                            <textarea name="recharge_help" id="recharge_help" style="width:100%;height:500px;"><?php echo $data['recharge_help']; ?></textarea>
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
    $('#uploadImg').on('click',function(){
        
        layer.open({
            type: 2,
            area: ['50%', '50%'],
            title: '上传图片',
            content: '/manage/base/picsAdd?type=2'
        });
    }) ;
    $('#uploadProcess').on('click',function(){
        
        layer.open({
            type: 2,
            area: ['50%', '50%'],
            title: '上传图片',
            content: '/manage/base/picsAdd?type=3'
        });
    }) ;
});
</script>
</body>
</html>
