(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-myhome-myhome"],{"4f91":function(t,e,i){"use strict";(function(t){var a=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("96cf");var n=a(i("1da1")),s={data:function(){return{level:1,show:!1,english:!1,open:!1,money:{},list:[{img:"/static/image/touguan.png",classname:this.$t("message").myhome.VIPlevel},{img:"/static/image/smallkefu.png",classname:this.$t("message").myhome.ContactCustomerService},{img:"/static/image/bangzhu.png",classname:this.$t("message").myhome.APPhelp},{img:"/static/image/inter.png",classname:this.$t("message").myhome.Homelanguage}],statusBarHeight:0,phone:"",telegram:""}},onLoad:function(){this.statusBarHeight=uni.upx2px(uni.getSystemInfoSync().statusBarHeight)+20,t("log",this.statusBarHeight,"padding-top"," at pages/myhome/myhome.vue:154")},onShow:function(){this.getuserinfos()},computed:{i18n:function(){return this.$t("message")}},methods:{getuserinfos:function(){var e=this;return(0,n.default)(regeneratorRuntime.mark((function i(){var a;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:return i.next=2,e.$api.getuserinfo();case 2:a=i.sent,t("log",a," at pages/myhome/myhome.vue:167"),e.money=a.info,e.level=a.info.vip_level;case 6:case"end":return i.stop()}}),i)})))()},chooseLang:function(e){t("log","语言",e," at pages/myhome/myhome.vue:172"),this.$i18n.locale=e,this.english=!1,this.list=[{img:"/static/image/touguan.png",classname:this.$t("message").myhome.VIPlevel},{img:"/static/image/smallkefu.png",classname:this.$t("message").myhome.ContactCustomerService},{img:"/static/image/bangzhu.png",classname:this.$t("message").myhome.APPhelp},{img:"/static/image/inter.png",classname:this.$t("message").myhome.Homelanguage}],uni.setStorageSync("locale",e),uni.$emit("lang")},chooseeng:function(){this.english=!1;var t="en-US";this.$i18n.locale=t},chooseesp:function(){t("log","西班牙"," at pages/myhome/myhome.vue:202"),this.english=!1;var e="es";this.$i18n.locale=e,this.list=[{img:"/static/image/touguan.png",classname:this.$t("message").myhome.VIPlevel},{img:"/static/image/smallkefu.png",classname:this.$t("message").myhome.ContactCustomerService},{img:"/static/image/bangzhu.png",classname:this.$t("message").myhome.APPhelp},{img:"/static/image/inter.png",classname:this.$t("message").myhome.Homelanguage}],uni.setStorageSync("locale",e),uni.$emit("lang")},gologin:function(){var e=this;return(0,n.default)(regeneratorRuntime.mark((function i(){var a;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:return i.next=2,e.$api.logout();case 2:return a=i.sent,t("log",a," at pages/myhome/myhome.vue:228"),uni.showToast({title:a.code_dec,icon:"none",duration:1500,mask:!0}),setTimeout((function(){e.open=!1,uni.reLaunch({url:"../login/login"}),uni.clearStorage()}),1500),i.abrupt("return");case 7:case"end":return i.stop()}}),i)})))()},call:function(){window.location.href=this.phone},telegram2:function(){window.location.href=this.telegram},jump:function(e){var i=this;1==e?(i.show=!0,uni.request({url:uni.$url+"/api/Index/systemconfig",success:function(e){t("log",e," at pages/myhome/myhome.vue:261"),i.phone=e.data.whastapp,i.telegram=e.data.telegram,t("log",i.phone,i.telegram,66666666," at pages/myhome/myhome.vue:264")}})):0==e?uni.navigateTo({url:"./grade"}):2==e?uni.navigateTo({url:"./help"}):this.english=!0}}};e.default=s}).call(this,i("0de9")["log"])},5665:function(t,e,i){t.exports=i.p+"static/img/qb.c100483c.png"},"6b78":function(t,e,i){var a=i("7da0");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("4bd98f56",a,!0,{sourceMap:!1,shadowMode:!1})},"7da0":function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,"uni-page-body[data-v-131c3b99]{background:#ebebeb}.headbox[data-v-131c3b99]{width:100%;\n\t/* height: 380rpx; */\n\t/* background: linear-gradient(200deg, #4E26B6 0%, #6A1DB2 100%); */background:url(/static/beijt@2x.png);background-size:100%;padding:%?62?% %?30?% %?10?% %?30?%;box-sizing:border-box;position:relative}.boxone[data-v-131c3b99]{width:%?280?%;height:%?36?%;background:#471f91;border-radius:0 0 %?40?% 0;display:flex;\n\t/* margin-top: 90rpx; */align-items:center;position:absolute;top:%?106?%;left:0}.leveimg[data-v-131c3b99]{width:%?64?%;height:%?54?%;margin:%?-22?% %?12?% 0 %?24?%}.picimg[data-v-131c3b99]{width:%?194?%;height:%?294?%\n\t/* margin: 44rpx 30rpx 0 0; */}.headtext1[data-v-131c3b99]{font-size:%?24?%;font-family:PingFang SC;font-weight:700;color:#fff}.headtext2[data-v-131c3b99]{font-size:%?28?%;font-family:PingFang SC;font-weight:700;color:#fff;\n\t/* margin: 40rpx 0 0rpx 26rpx; */margin:%?110?% 0 %?10?% 0}.headtext3[data-v-131c3b99]{font-size:%?34?%;font-family:PingFang SC;font-weight:800;color:#fff;margin-top:%?24?%}.tiyan[data-v-131c3b99]{width:40%;height:%?60?%;\n\t/* background: linear-gradient(0deg, #874EC2 0%, #874EC2 99%);\n\t */background-color:#9c3623;border-radius:%?16?% 0 0 %?16?%;font-size:%?28?%;font-family:PingFang SC;font-weight:800;color:#fff;display:flex;justify-content:center;align-items:center}.weidingyi[data-v-131c3b99]{width:60%;height:%?60?%;\n\t/* background: linear-gradient(0deg, #AE79E6 0%, #AD78E6 100%);\n\tba */background-color:#ff4f2f;border-radius:%?0?% %?16?% %?16?% %?0?%;font-size:%?28?%;font-family:PingFang SC;font-weight:800;color:#fff;display:flex;justify-content:center;align-items:center}.Yesterday[data-v-131c3b99]{width:50%;height:%?90?%;background:#fff;text-align:center;padding-top:%?9?%;border-right:%?2?% solid #bebebe;border-radius:%?10?% 0 0 %?10?%}.Today[data-v-131c3b99]{width:50%;height:%?90?%;background:#fff;text-align:center;padding-top:%?9?%;border-radius:%?0?% %?10?% %?10?% %?0?%}.sytext[data-v-131c3b99]{font-size:%?26?%;font-family:PingFang SC;font-weight:800;color:#666}.dytext[data-v-131c3b99]{font-size:%?24?%;font-family:PingFang SC;font-weight:800;margin-top:%?9?%}.Basic[data-v-131c3b99]{margin:%?32?% 0 %?28?% %?10?%;font-size:%?36?%;font-family:PingFang SC;font-weight:800;color:#666}.forbox[data-v-131c3b99]{padding:0 %?26?% 0 %?20?%;box-sizing:border-box;margin-top:%?18?%;display:flex;align-items:center;justify-content:space-between;width:%?720?%;height:%?90?%;background:#fff;border-radius:%?10?%}.classname[data-v-131c3b99]{font-size:%?28?%;font-family:PingFang SC;font-weight:800;color:#222;margin-left:%?20?%}.Exit[data-v-131c3b99]{margin-top:%?160?%;display:flex;justify-content:center;align-items:center;width:%?600?%;height:%?80?%;background:linear-gradient(-90deg,#6b47f8,#8e4aef);border-radius:%?40?%;font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#fff}\n\n/* 客服弹出框样式此处开始 */.popup[data-v-131c3b99]{height:100vh;\n\t/* width: 750rpx; */width:100%;position:fixed;top:0;z-index:99999;background-color:rgba(9,9,9,.5);display:flex;justify-content:center;padding-top:%?600?%}.popup_box[data-v-131c3b99]{width:%?660?%;height:%?500?%;position:fixed;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);background:#fff;border-radius:%?16?%}.kefu[data-v-131c3b99]{width:%?196?%;height:%?196?%;margin-right:%?175?%;margin-top:%?-120?%}.xx[data-v-131c3b99]{width:%?30?%;height:%?30?%;margin-right:%?30?%}.text2[data-v-131c3b99]{font-size:%?32?%;font-family:PingFang SC;font-weight:700;color:#222;letter-spacing:%?4?%}.box1[data-v-131c3b99]{width:%?204?%;height:%?164?%;border:%?4?% solid #22ac38;border-radius:%?10?%;display:flex;justify-content:center;align-items:center}.box2[data-v-131c3b99]{width:%?204?%;height:%?164?%;border:%?4?% solid #32abdf;border-radius:%?10?%;display:flex;justify-content:center;align-items:center}.text3[data-v-131c3b99]{font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#222}\n\n/* 语言切换弹框样式此处开始 */.Eject[data-v-131c3b99]{height:100vh;width:%?750?%;position:fixed;top:0;z-index:9999;background-color:rgba(9,9,9,.5)}.eject_fu[data-v-131c3b99]{position:fixed;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);\n\t/* top: 600rpx;\n\tleft: 100rpx; */z-index:99999}.bluekuang[data-v-131c3b99]{width:%?700?%;height:%?70?%;background-color:#5a4be4;border-radius:%?15?% %?15?% 0 0;display:flex;justify-content:flex-end;padding:%?10?% %?30?% 0 0;box-sizing:border-box}.zhukuang[data-v-131c3b99]{margin-top:%?-10?%;width:%?700?%;height:%?310?%;background:#fff;border-radius:%?15?%;padding-top:%?50?%}.xuanze[data-v-131c3b99]{margin-top:%?20?%;width:%?166?%;height:%?70?%;background:linear-gradient(-90deg,#6e4af8,#8e4def);border-radius:%?36?%;display:flex;justify-content:center;align-items:center;font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#fff}\n\n/* 此处结束 */.Exittext1[data-v-131c3b99]{font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#666;margin-top:%?34?%}.Exitquxiao[data-v-131c3b99]{width:%?200?%;height:%?80?%;background:linear-gradient(90deg,#d7d9db,#c0c1c3);border-radius:%?40?%;font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#fff;display:flex;justify-content:center;align-items:center}.Exitqueren[data-v-131c3b99]{width:%?200?%;height:%?80?%;background:linear-gradient(-90deg,#6e4af8,#8e4def);border-radius:%?40?%;font-size:%?32?%;font-family:PingFang SC;font-weight:800;color:#fff;display:flex;justify-content:center;align-items:center}body.?%PAGE?%[data-v-131c3b99]{background:#ebebeb}",""]),t.exports=e},"8ce7":function(t,e,i){"use strict";i.r(e);var a=i("98af"),n=i("cce5");for(var s in n)"default"!==s&&function(t){i.d(e,t,(function(){return n[t]}))}(s);i("f982");var o,c=i("f0c5"),r=Object(c["a"])(n["default"],a["b"],a["c"],!1,null,"131c3b99",null,!1,a["a"],o);e["default"]=r.exports},"98af":function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return s})),i.d(e,"a",(function(){return a}));var a={uPopup:i("0027").default},n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",{staticStyle:{"padding-bottom":"60rpx"}},[a("v-uni-view",{staticClass:"headbox",staticStyle:{position:"relative"},style:{paddingTop:t.statusBarHeight+"px"}},[a("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between"}},[a("v-uni-view",[a("v-uni-view",{staticClass:"boxone"},[1==t.level?a("v-uni-image",{staticClass:"leveimg",attrs:{src:"/static/image/vip_1.png"}}):t._e(),2==t.level?a("v-uni-image",{staticClass:"leveimg",attrs:{src:"/static/image/vip_2.png"}}):t._e(),3==t.level?a("v-uni-image",{staticClass:"leveimg",attrs:{src:"/static/image/vip_3.png"}}):t._e(),4==t.level?a("v-uni-image",{staticClass:"leveimg",attrs:{src:"/static/image/vip_4.png"}}):t._e(),a("v-uni-view",{staticClass:"headtext1"},[t._v("ID: "+t._s(t.money.userid))])],1),a("v-uni-view",{staticClass:"headtext2"},[t._v(t._s(this.$t("message").myhome.HomeTotalassets))]),a("v-uni-view",{staticClass:"headtext3"},[t._v(t._s(t.money.balance)+"USDT")])],1),a("v-uni-view")],1),a("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"0rpx"}},[a("v-uni-view",{staticClass:"tiyan"},[t._v(t._s(this.$t("message").myhome.HomeExperienceGold))]),a("v-uni-view",{staticClass:"weidingyi"},[t._v(t._s(t.money.reg_receive)+"USDT")])],1)],1),a("v-uni-view",{staticStyle:{padding:"14rpx 16rpx 0",width:"100%","box-sizing":"border-box"}},[a("v-uni-view",{staticStyle:{display:"flex",width:"100%"}},[a("v-uni-view",{staticClass:"Yesterday"},[a("v-uni-view",{staticClass:"sytext"},[t._v(t._s(this.$t("message").myhome.yesterday))]),a("v-uni-view",{staticClass:"dytext",staticStyle:{color:"#64E788"}},[t._v(t._s(t.money.today_profit)+"USDT")])],1),a("v-uni-view",{staticClass:"Today"},[a("v-uni-view",{staticClass:"sytext"},[t._v(t._s(this.$t("message").myhome.today))]),a("v-uni-view",{staticClass:"dytext",staticStyle:{color:"#CD626A"}},[t._v(t._s(t.money.today_total_profit)+"USDT")])],1)],1),a("v-uni-view",{staticClass:"Basic"},[t._v(t._s(this.$t("message").myhome.BasicInformation))]),t._l(t.list,(function(e,i){return a("v-uni-view",{staticClass:"forbox",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.jump(i)}}},[a("v-uni-view",{staticStyle:{display:"flex","align-items":"center"}},[a("v-uni-image",{staticStyle:{width:"38rpx",height:"38rpx"},attrs:{src:e.img,mode:""}}),a("v-uni-view",{staticClass:"classname"},[t._v(t._s(e.classname))])],1),a("v-uni-view",[a("v-uni-image",{staticStyle:{width:"26rpx",height:"26rpx"},attrs:{src:"/static/image/tb.png",mode:""}})],1)],1)})),a("v-uni-view",{staticStyle:{display:"flex","justify-content":"center"}},[a("v-uni-view",{staticClass:"Exit",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.open=!0}}},[t._v(t._s(this.$t("message").myhome.HomeExit))])],1)],2),1==t.show?a("v-uni-view",{staticClass:"popup"},[a("v-uni-view",{staticClass:"popup_box"},[a("v-uni-view",{staticStyle:{display:"flex","justify-content":"flex-end","padding-top":"20rpx"}},[a("v-uni-image",{staticClass:"kefu",attrs:{src:"/static/image/kefutou.png"}}),a("v-uni-image",{staticClass:"xx",attrs:{src:"/static/image/closecha.png"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.show=!1}}})],1),a("v-uni-view",{staticStyle:{"margin-top":"30rpx",display:"flex","justify-content":"center"}},[a("v-uni-view",{staticClass:"text2"},[t._v(t._s(this.$t("message").myhome.kefupopuptext1))])],1),a("v-uni-view",{staticStyle:{padding:"0 54rpx",display:"flex","justify-content":"space-between","margin-top":"40rpx"}},[a("v-uni-view",{staticClass:"box1",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.call.apply(void 0,arguments)}}},[a("v-uni-image",{staticStyle:{width:"142rpx",height:"132rpx"},attrs:{src:"/static/image/whastapp.png"}})],1),a("v-uni-view",{staticClass:"box2",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.telegram2.apply(void 0,arguments)}}},[a("v-uni-image",{staticStyle:{width:"128rpx",height:"130rpx"},attrs:{src:"/static/image/telegram.png"}})],1)],1),a("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"40rpx"}},[a("v-uni-view",{staticClass:"text3"},[t._v(t._s(this.$t("message").myhome.kefupopuptext2)+": 09:00-22:00")])],1)],1)],1):t._e(),a("v-uni-view",[1==t.english?a("v-uni-view",{staticClass:"Eject",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.english=!1}}}):t._e(),1==t.english?a("v-uni-view",{staticClass:"eject_fu"},[a("v-uni-view",{staticClass:"bluekuang"}),a("v-uni-view",{staticClass:"zhukuang"},[a("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between",padding:"0 50rpx"}},[a("v-uni-image",{staticStyle:{width:"128rpx",height:"152rpx"},attrs:{src:"/static/image/english.png",mode:""}}),a("v-uni-image",{staticStyle:{width:"128rpx",height:"152rpx"},attrs:{src:"/static/image/q_chinese.png",mode:""}}),a("v-uni-image",{staticStyle:{width:"128rpx",height:"152rpx"},attrs:{src:"/static/image/xibanya.png",mode:""}})],1),a("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between",padding:"0 30rpx"}},[a("v-uni-view",{staticClass:"xuanze",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.chooseLang("en-US")}}},[t._v("Choose")]),a("v-uni-view",{staticClass:"xuanze",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.chooseLang("zh-CN")}}},[t._v("选择")]),a("v-uni-view",{staticClass:"xuanze",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.chooseLang("es")}}},[t._v("Escoger")])],1)],1)],1):t._e()],1),a("u-popup",{attrs:{show:t.open,mode:"center","border-radius":"16"}},[a("v-uni-view",{staticStyle:{width:"650rpx",height:"380rpx"}},[a("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","padding-top":"40rpx"}},[a("v-uni-image",{staticStyle:{width:"110rpx",height:"118rpx"},attrs:{src:i("5665")}})],1),a("v-uni-view",{staticStyle:{display:"flex","justify-content":"center"}},[a("v-uni-view",{staticClass:"Exittext1"},[t._v(t._s(this.$t("message").myhome.tuichu))])],1),a("v-uni-view",{staticStyle:{padding:"0 88rpx",display:"flex","justify-content":"space-between","margin-top":"48rpx"}},[a("v-uni-view",{staticClass:"Exitquxiao",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.open=!1}}},[t._v(t._s(this.$t("message").myhome.quxiao))]),a("v-uni-view",{staticClass:"Exitqueren",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.gologin.apply(void 0,arguments)}}},[t._v(t._s(this.$t("message").myhome.queding))])],1)],1)],1)],1)},s=[]},cce5:function(t,e,i){"use strict";i.r(e);var a=i("4f91"),n=i.n(a);for(var s in a)"default"!==s&&function(t){i.d(e,t,(function(){return a[t]}))}(s);e["default"]=n.a},f982:function(t,e,i){"use strict";var a=i("6b78"),n=i.n(a);n.a}}]);