(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-registration-resetPassword"],{1649:function(e,t,i){"use strict";(function(e){var a=i("4ea4");i("4d63"),i("ac1f"),i("25f0"),i("5319"),Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i("96cf");var s=a(i("1da1")),n={data:function(){return{array:["1","34","60","62","63","65","66","673","81","82","84","850","852","853","855","856","86","886","880","90","91","92","93","94","95","960","961","962","963","964","965","966","968","972","973","974","975","976","977","98","7","30","31","32","33","350","351","352","353","354","355","356","357","358","359","336","349","338","39","223","396","40","41","4175","43","44","45","46","47","48","20","210","213","216","218","220","221","222","223","224","225","226","227","228","229","230","231","232","233","234","235","236","237","238","239","240","241","242","243","244","245","247","248","249","250","251","252","253","254","255","256","257","258","260","261","262","263","264","265","266","267","268","269","27","290","297","298","1808","1809","1907","299","500","501","502","503","504","505","506","507","509","51","52","53","54","55","56","57","58","591","592","593","594","595","596","597","598","61","64","671","6722","6723","6724","674","676","677","678","679","682","683","684","685","686","688"],index:0,phone:"",password:"",twopassword:"",yaoqing:"",yaoqingLink:!1,yzm:"",sms:"",src:"",code_rand:"",setState:!0,setCode:0}},computed:{i18n:function(){return this.$t("message")}},onReady:function(){uni.setNavigationBarTitle({title:this.$t("message").tabbar.reset})},onLoad:function(t){e("log",t,33333," at pages/registration/resetPassword.vue:136")},onShow:function(){this.getParam(location.href,"idcode")?(this.yaoqing=this.getParam(location.href,"idcode"),this.yaoqingLink=!0):(this.yaoqingLink=!1,this.yaoqing=""),this.codes(),null!=getApp().globalData.qrcode&&(this.yaoqing=getApp().globalData.qrcode)},methods:{bindPickerChange:function(t){e("log","picker发送选择改变，携带值为",t.target.value," at pages/registration/resetPassword.vue:153"),this.index=t.target.value},getParam:function(e,t){var i=new RegExp("(^|\\?|&)"+t+"=([^&]*)(\\s|&|$)","i");return i.test(e)?unescape(RegExp.$2.replace(/\+/g," ")):""},codes:function(){for(var t=[],i=0;i<4;i++){var a=Math.random();a*=10,a=Math.ceil(a),t.push(a)}e("log",t.join("")," at pages/registration/resetPassword.vue:170"),this.code_rand=t.join("");var s=this;uni.request({url:uni.$url+"/api/users/code",data:{code_rand:t.join("")},responseType:"arraybuffer",success:function(t){e("log",t,555555555," at pages/registration/resetPassword.vue:183");var i=new Blob([t.data],{type:"image/png"});s.blobToDataURL(i,(function(t){e("log",t," at pages/registration/resetPassword.vue:188"),s.src=t}))}})},blobToDataURL:function(e,t){var i=new FileReader;i.onload=function(e){t(e.target.result)},i.readAsDataURL(e)},zhuce:function(){var t=this;return(0,s.default)(regeneratorRuntime.mark((function i(){var a,s;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:if(""!=t.phone&&""!=t.password&&""!=t.twopassword&&""!=t.yzm&&""!=t.yaoqing){i.next=4;break}uni.showToast({title:t.$t("message").drawing.drawingTitle1,icon:"none"}),i.next=16;break;case 4:if(t.password==t.twopassword){i.next=8;break}uni.showToast({title:t.$t("message").drawing.drawingTitle3,icon:"none"}),i.next=16;break;case 8:return t.setState=!1,a={username:t.phone,dest:t.array[t.index],password:t.password,re_password:t.twopassword,smscode:t.sms,code:t.yzm,code_rand:t.code_rand,idcode:t.yaoqing},setTimeout((function(){t.setState=!0,t.codes()}),3500),i.next=13,t.$api.resetPassword(a);case 13:s=i.sent,e("log",s,"zheshifanhui"," at pages/registration/resetPassword.vue:232"),1==s.code?(uni.showToast({title:s.code_dec,icon:"success"}),setTimeout((function(){uni.navigateTo({url:"../login/login"})}),1500)):uni.showToast({title:s.code_dec,icon:"none"});case 16:case"end":return i.stop()}}),i)})))()},sendCode:function(){var e=this;return(0,s.default)(regeneratorRuntime.mark((function t(){var i,a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(""!=e.phone&&""!=e.yzm){t.next=4;break}uni.showToast({title:e.$t("message").drawing.drawingTitle1,icon:"none"}),t.next=9;break;case 4:return i={mobile:e.phone,dest:e.array[e.index],code:e.yzm,code_rand:e.code_rand},t.next=7,e.$api.sendCodePW(i);case 7:a=t.sent,a?(e.setCode=60,setInterval((function(){e.setCode-=1}),1e3)):uni.showToast({title:a.result,icon:"none"});case 9:case"end":return t.stop()}}),t)})))()}}};t.default=n}).call(this,i("0de9")["log"])},"63b1":function(e,t,i){"use strict";i.r(t);var a=i("fcbd"),s=i("7cd6");for(var n in s)"default"!==n&&function(e){i.d(t,e,(function(){return s[e]}))}(n);i("c757");var o,r=i("f0c5"),c=Object(r["a"])(s["default"],a["b"],a["c"],!1,null,"175940ec",null,!1,a["a"],o);t["default"]=c.exports},"68fa":function(e,t,i){var a=i("6ee1");"string"===typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);var s=i("4f06").default;s("bf57b7aa",a,!0,{sourceMap:!1,shadowMode:!1})},"6ee1":function(e,t,i){var a=i("24fb");t=a(!1),t.push([e.i,"uni-page-body[data-v-175940ec]{background:#2f3132}.inTitle[data-v-175940ec]{padding-left:%?30?%;color:#fff;font-size:%?30?%;line-height:%?60?%;margin-top:%?26?%}.input1[data-v-175940ec]{height:%?94?%;border-radius:%?10?%;display:flex;align-items:center;border:%?2?% solid #5d0e00;background:#5d0e00;padding-left:%?20?%;padding-right:%?10?%}.textphone[data-v-175940ec]{font-size:14px;font-family:PingFang SC;font-weight:800;color:#fee9e7;margin-left:%?20?%}.input_width[data-v-175940ec]{height:100%;width:95%;margin-left:%?26?%;font-size:%?26?%;font-family:PingFang SC;font-weight:800;color:#fee9e7}.input_width2[data-v-175940ec]{height:100%;width:95%;margin-left:%?20?%;font-size:%?26?%;font-family:PingFang SC;font-weight:800;color:#fee9e7}.input_width3[data-v-175940ec]{height:100%;width:70%;margin-left:%?20?%;font-size:%?26?%;font-family:PingFang SC;font-weight:800;color:#fee9e7}.send_code[data-v-175940ec]{height:100%;background:linear-gradient(90deg,#7f1401,#ac1a00);color:#fee9e7;display:flex;align-items:center;justify-content:center;padding:0 %?15?%}[data-v-175940ec] .uni-input-input:-webkit-autofill{-webkit-transition:background-color 5000s ease-in-out 0s;transition:background-color 5000s ease-in-out 0s}[data-v-175940ec] .uni-input-input{-webkit-text-fill-color:#fee9e7}.zhuce[data-v-175940ec]{display:flex;justify-content:center;align-items:center;width:%?600?%;height:%?100?%;background:linear-gradient(90deg,#7f1401,#ac1a00);border-radius:%?50?%;font-size:%?28?%;font-family:PingFang SC;font-weight:700;color:#fff}.not[data-v-175940ec]{display:flex;justify-content:center;align-items:center;width:%?600?%;height:%?100?%;background:linear-gradient(90deg,#666,#999);border-radius:%?50?%;font-size:%?28?%;font-family:PingFang SC;font-weight:700;color:#fff}body.?%PAGE?%[data-v-175940ec]{background:#2f3132}",""]),e.exports=t},"7cd6":function(e,t,i){"use strict";i.r(t);var a=i("1649"),s=i.n(a);for(var n in a)"default"!==n&&function(e){i.d(t,e,(function(){return a[e]}))}(n);t["default"]=s.a},c757:function(e,t,i){"use strict";var a=i("68fa"),s=i.n(a);s.a},fcbd:function(e,t,i){"use strict";var a;i.d(t,"b",(function(){return s})),i.d(t,"c",(function(){return n})),i.d(t,"a",(function(){return a}));var s=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",[i("v-uni-view",{staticStyle:{padding:"0 15rpx",position:"fixed",left:"50%",transform:"translateX(-50%)","z-index":"20",width:"100%",height:"100vh","box-sizing":"border-box","padding-bottom":"150rpx","overflow-y":"scroll"}},[i("v-uni-view",{staticStyle:{"margin-top":"10rpx"}},[i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title1))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"36rpx",height:"48rpx","margin-left":"4rpx"},attrs:{src:"/static/image/iphone.png",mode:"widthFix"}}),i("v-uni-view",{staticClass:"textphone",staticStyle:{display:"flex"}},[e._v("+"),i("v-uni-view",{staticClass:"uni-list"},[i("v-uni-view",{staticClass:"uni-list-cell"},[i("v-uni-view",{staticClass:"uni-list-cell-db"},[i("v-uni-picker",{attrs:{value:e.index,range:e.array},on:{change:function(t){arguments[0]=t=e.$handleEvent(t),e.bindPickerChange.apply(void 0,arguments)}}},[i("v-uni-view",{staticClass:"uni-input"},[e._v(e._s(e.array[e.index]))])],1)],1)],1)],1)],1),i("v-uni-input",{staticClass:"input_width",attrs:{type:"text",placeholder:this.$t("message").resetPassword.regisplaceholder1,"placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.phone,callback:function(t){e.phone=t},expression:"phone"}})],1),i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title2))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"38rpx",height:"42rpx"},attrs:{src:"/static/image/block.png",mode:""}}),i("v-uni-input",{staticClass:"input_width",attrs:{type:"text",placeholder:this.$t("message").resetPassword.regisplaceholder2,password:"true","placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.password,callback:function(t){e.password=t},expression:"password"}})],1),i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title3))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"42rpx",height:"42rpx"},attrs:{src:"/static/image/blockmi.png",mode:""}}),i("v-uni-input",{staticClass:"input_width",attrs:{type:"text",placeholder:this.$t("message").resetPassword.regisplaceholder3,password:"true","placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.twopassword,callback:function(t){e.twopassword=t},expression:"twopassword"}})],1),i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title4))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"42rpx",height:"42rpx"},attrs:{src:"/static/image/yqm.png",mode:"widthFix"}}),!0===e.yaoqingLink?i("v-uni-input",{staticClass:"input_width",attrs:{type:"number",placeholder:this.$t("message").resetPassword.regisplaceholder4,disabled:!0,"placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.yaoqing,callback:function(t){e.yaoqing=t},expression:"yaoqing"}}):e._e(),!1===e.yaoqingLink?i("v-uni-input",{staticClass:"input_width",attrs:{type:"number",placeholder:this.$t("message").resetPassword.regisplaceholder4,"placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.yaoqing,callback:function(t){e.yaoqing=t},expression:"yaoqing"}}):e._e()],1),i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title5))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"44rpx",height:"36rpx"},attrs:{src:"/static/image/yzm.png",mode:"widthFix"}}),i("v-uni-input",{staticClass:"input_width2",attrs:{type:"text",placeholder:this.$t("message").resetPassword.regisplaceholder5,"placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.yzm,callback:function(t){e.yzm=t},expression:"yzm"}}),i("v-uni-image",{staticStyle:{width:"280rpx",height:"50rpx"},attrs:{src:e.src,mode:"widthFix"},on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.codes.apply(void 0,arguments)}}})],1),i("v-uni-view",{staticClass:"inTitle"},[e._v(e._s(this.$t("message").resetPassword.title6))]),i("v-uni-view",{staticClass:"input1"},[i("v-uni-image",{staticStyle:{width:"44rpx",height:"36rpx"},attrs:{src:"/static/image/yzm.png",mode:"widthFix"}}),i("v-uni-input",{staticClass:"input_width3",attrs:{type:"text",placeholder:this.$t("message").resetPassword.regisplaceholder6,"placeholder-style":"font-family: PingFang SC;font-size: 13px;\n\t\tfont-weight: 800;color: #FEE9E7;"},model:{value:e.sms,callback:function(t){e.sms=t},expression:"sms"}}),e.setCode<=0?i("v-uni-view",{staticClass:"send_code",on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.sendCode.apply(void 0,arguments)}}},[e._v(e._s(this.$t("message").resetPassword.code))]):e._e(),e.setCode>0?i("v-uni-view",{staticClass:"send_code"},[e._v(e._s(e.setCode)+"s")]):e._e()],1)],1),i("v-uni-view",{staticStyle:{"margin-top":"50rpx",display:"flex","justify-content":"center"}}),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"50rpx"}},[!0===e.setState?i("v-uni-view",{staticClass:"zhuce",on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.zhuce.apply(void 0,arguments)}}},[e._v(e._s(this.$t("message").resetPassword.Zhuce))]):e._e(),!1===e.setState?i("v-uni-view",{staticClass:"not"},[e._v(e._s(this.$t("message").resetPassword.Zhuce))]):e._e()],1)],1),i("v-uni-view",{staticStyle:{position:"fixed",bottom:"0",left:"0",display:"flex"}},[i("v-uni-image",{staticStyle:{width:"750rpx",height:"266rpx",display:"flex"},attrs:{src:"/static/image/tu.png",mode:""}})],1)],1)},n=[]}}]);