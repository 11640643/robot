(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-machine-machine"],{"0276":function(t,e,i){"use strict";i.r(e);var n=i("f6ae"),a=i("23bc");for(var s in a)"default"!==s&&function(t){i.d(e,t,(function(){return a[t]}))}(s);i("f2e7");var o,c=i("f0c5"),r=Object(c["a"])(a["default"],n["b"],n["c"],!1,null,"6f235bcf",null,!1,n["a"],o);e["default"]=r.exports},1430:function(t,e,i){"use strict";var n;i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return s})),i.d(e,"a",(function(){return n}));var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",[i("v-uni-view",{staticClass:"maoScroll-main",style:"height:"+t.lineHeight*t.showLine+"rpx;"},[i("v-uni-view",{style:"margin-top:-"+t.marginTop+"rpx;"},t._l(t.showdata,(function(e,n){return i("v-uni-view",{key:"maoScroll"+n,style:"height:"+t.lineHeight+"rpx;"},[t._t("default",null,{line:e})],2)})),1)],1)],1)},s=[]},"18b4":function(t,e,i){"use strict";i.r(e);var n=i("332e"),a=i.n(n);for(var s in n)"default"!==s&&function(t){i.d(e,t,(function(){return n[t]}))}(s);e["default"]=a.a},"23bc":function(t,e,i){"use strict";i.r(e);var n=i("7ee4"),a=i.n(n);for(var s in n)"default"!==s&&function(t){i.d(e,t,(function(){return n[t]}))}(s);e["default"]=a.a},"332e":function(t,e,i){"use strict";i("a9e3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={name:"maoScroll",data:function(){return{showdata:[],marginTop:0,showLine:0}},props:{data:{type:Array,default:[]},showNum:{type:Number,default:3},lineHeight:{type:Number,default:60},animationScroll:{type:Number,default:500},animation:{type:Number,default:2e3}},methods:{init:function(){console.log("init"),this.showLine=this.showNum<this.data.length?this.showNum:this.data.length,console.log(this.showNum<this.data.length?this.showNum:this.data.length);for(var t=0;t<this.data.length;t++)this.showdata.push(this.data[t]);for(var e=0;e<this.showLine;e++)this.showdata.push(this.data[e]);setInterval(this.animationFunc,this.animation)},animationFunc:function(){this.marginTop>=this.data.length*this.lineHeight&&(this.marginTop=0);var t=this.animationScroll/this.lineHeight,e=0,i=this,n=setInterval((function(){i.marginTop=i.marginTop+1,e++,e>=i.lineHeight&&clearInterval(n)}),t)}},mounted:function(){this.init()}};e.default=n},5838:function(t,e,i){"use strict";var n=i("b237"),a=i.n(n);a.a},"7ee4":function(t,e,i){"use strict";var n=i("4ea4");i("4160"),i("159b"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=n(i("ade3"));i("96cf");var s,o=n(i("1da1")),c=n(i("e2ba")),r=n(i("b6d4")),l=(s={components:{uParse:c.default,maoScroll:r.default},data:function(){return{listPeson_time:"",listPeson_evedMoney:"",statusBarHeight:0,page:1,adressList:[],Demands:this.$t("message").machine.machineDemands,hours:this.$t("message").machine.machinePerhour,RentalPrice:this.$t("message").machine.RentalPrice,machineRent:this.$t("message").machine.machineRent,Turnon:this.$t("message").machine.Turnon,Gainanincome:this.$t("message").machine.Gainanincome,Runningtime:this.$t("message").machine.Runningtime,Unextractedmoney:this.$t("message").machine.Unextractedmoney,machineClose:this.$t("message").machine.machineClose,machineCollect:this.$t("message").machine.machineCollect,list:[],ListmeKuang:[],show:!1,type:1,guiList:"",closeshow:!1,exshow:!1,perience:{},cun:{}}},onLoad:function(){this.myminers()},onShow:function(){this.Demands=this.$t("message").machine.machineDemands,this.hours=this.$t("message").machine.machinePerhour,this.RentalPrice=this.$t("message").machine.RentalPrice,this.machineRent=this.$t("message").machine.machineRent,this.Turnon=this.$t("message").machine.Turnon,this.Gainanincome=this.$t("message").machine.Gainanincome,this.Runningtime=this.$t("message").machine.Runningtime,this.Unextractedmoney=this.$t("message").machine.Unextractedmoney,this.machineClose=this.$t("message").machine.machineClose,this.machineCollect=this.$t("message").machine.machineCollect,this.getuserinfos(),this.upList(),this.randomString()},onPullDownRefresh:function(){console.log("下拉"),this.lodings=!0,this.ListmeKuang=[],this.page=1,this.myminers()},onReachBottom:function(){console.log("触底加载",this.ListmeKuang.length),this.ListmeKuang.length>=20&&(this.page=this.page+1,this.myminers())}},(0,a.default)(s,"onLoad",(function(){this.statusBarHeight=uni.upx2px(uni.getSystemInfoSync().statusBarHeight)+20,console.log(this.statusBarHeight,"padding-top")})),(0,a.default)(s,"computed",{i18n:function(){return this.$t("message")}}),(0,a.default)(s,"methods",{randomString:function(t){t=t||42;for(var e=0;e<9;e++){for(var i="ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678",n=i.length,a="",s=0;s<t;s++)a+=i.charAt(Math.floor(Math.random()*n));this.adressList.push(a),console.log(a,this.adressList,"随机字符")}return a},tan:function(){var t=this;this.show=!0,uni.request({url:"https://www.asdasdbsn.xyz/api/index/systemconfig",success:function(e){console.log(e),t.guiList=e.data.help,console.log(this.guiList,5555)}})},getuserinfos:function(){var t=this;return(0,o.default)(regeneratorRuntime.mark((function e(){var i;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,t.$api.getuserinfo();case 2:i=e.sent,console.log(i),t.listPeson_time=i.info.everyday_income,t.listPeson_evedMoney=i.info.everyday_profit;case 6:case"end":return e.stop()}}),e)})))()},upList:function(){var t=this;return(0,o.default)(regeneratorRuntime.mark((function e(){var i;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,t.$api.goodlist();case 2:i=e.sent,console.log(i,"获取值"),i.data.forEach((function(e){t.list.push(e)}));case 5:case"end":return e.stop()}}),e)})))()},myminers:function(){var t=this;return(0,o.default)(regeneratorRuntime.mark((function e(){var i,n;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return i={page_size:10,page_no:t.page},e.next=3,t.$api.myminer(i);case 3:n=e.sent,t.ListmeKuang=n.data,console.log(n,"4555555");case 6:case"end":return e.stop()}}),e)})))()},togoxiang:function(){console.log("预计每日收入详情"),uni.navigateTo({url:"./assets?type=1"})},open:function(){},close:function(){this.show=!1},close2:function(){this.closeshow=!1},close3:function(){this.exshow=!1},choo:function(t){console.log(t),this.type=t,this.ListmeKuang=[],this.list=[],1==t?(console.log("买矿机"),this.upList()):(console.log("我的矿工"),this.myminers())},lease:function(t){console.log(t,"租赁"),this.perience=this.list[t],console.log(this.perience),this.exshow=!0},collect:function(t){var e=this;return(0,o.default)(regeneratorRuntime.mark((function i(){var n,a;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:return console.log(t,e.ListmeKuang[t],"领取"),n={id:e.ListmeKuang[t].id},i.next=4,e.$api.receive_profit(n);case 4:a=i.sent,console.log(a,555555),1==a.code?uni.showToast({title:a.code_dec,icon:"success"}):uni.showToast({title:a.code_dec,icon:"none"});case 7:case"end":return i.stop()}}),i)})))()},closehu:function(t){console.log(t,this.ListmeKuang[t],"关闭"),this.cun=this.ListmeKuang[t],this.closeshow=!0},confirm:function(){var t=this;return(0,o.default)(regeneratorRuntime.mark((function e(){var i,n,a;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return i=t,console.log("确认"),n={id:i.cun.id},e.next=5,i.$api.stoplease(n);case 5:a=e.sent,console.log(a,555555),1==a.code?(uni.showToast({title:a.code_dec,icon:"success"}),i.myminers()):(uni.showToast({title:a.code_dec,icon:"none"}),i.myminers()),i.myminers(),i.closeshow=!1;case 10:case"end":return e.stop()}}),e)})))()},confirm2:function(){var t=this;return(0,o.default)(regeneratorRuntime.mark((function e(){var i,n;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return console.log("下单确认"),i={good_id:t.perience.id},e.next=4,t.$api.lease(i);case 4:n=e.sent,1==n.code?uni.showToast({title:n.code_dec,icon:"success"}):uni.showToast({title:n.code_dec,icon:"none"}),t.exshow=!1;case 7:case"end":return e.stop()}}),e)})))()}}),s);e.default=l},b237:function(t,e,i){var n=i("d0f9");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("242c1360",n,!0,{sourceMap:!1,shadowMode:!1})},b27b:function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,".hearer[data-v-6f235bcf]{box-sizing:border-box;width:100%;\n\t/* height: 330rpx; */background:linear-gradient(200deg,#4e26b6,#6a1db2);padding:%?62?% %?30?% %?10?% %?30?%;position:relative}.moneyfont[data-v-6f235bcf]{font-size:%?34?%;font-family:PingFang SC;font-weight:800;color:#fff}.tiffont[data-v-6f235bcf]{font-size:%?28?%;font-family:PingFang SC;font-weight:700;color:#fff;margin:%?90?% 0 %?10?% 0}.linebock[data-v-6f235bcf]{width:100%;height:%?60?%;background:#ad78e6;border-radius:%?16?%;font-size:%?28?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;align-items:center;margin-top:%?10?%}.line[data-v-6f235bcf]{line-height:%?40?%}.CStext1[data-v-6f235bcf]{flex:2;background:#874ec2;height:100%;border-radius:%?16?% 0 0 %?16?%;display:flex;justify-content:center;align-items:center;font-size:%?24?%;text-align:center}.xiangbutt[data-v-6f235bcf]{width:%?110?%;height:%?50?%;background:#fff;border-radius:%?10?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#222;display:flex;justify-content:center;align-items:center}.busson[data-v-6f235bcf]{width:%?340?%;height:%?60?%;background:linear-gradient(-90deg,#f3a014,#f68b2b);border-radius:%?30?%;font-size:%?32?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.active[data-v-6f235bcf]{width:%?360?%;height:%?60?%;background:linear-gradient(-90deg,#6b47f8,#8d4af0);border-radius:%?30?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.cc[data-v-6f235bcf]{width:%?370?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.dingff[data-v-6f235bcf]{min-width:%?134?%;height:%?40?%;\n\t/* background: #FFCD63; */\n\t/* border-radius: 10rpx 0 60rpx 0; */font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#222;display:flex;justify-content:center;align-items:center}.card[data-v-6f235bcf]{width:%?320?%;background:#fff;border-radius:%?10?%;padding:%?10?%;margin-top:%?30?%}.dengpai[data-v-6f235bcf]{width:%?320?%;height:%?76?%;background:#f2f2f2;border-radius:%?10?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#f0803b;display:flex;justify-content:center;align-items:center;margin:%?50?% 0 %?40?% 0}.dengpai2[data-v-6f235bcf]{width:%?320?%;height:%?76?%;background:#f2f2f2;border-radius:%?10?%;font-size:%?24?%;font-family:PingFang SC;font-weight:500;color:#666;display:flex}.qianfont[data-v-6f235bcf]{font-size:%?22?%;font-family:PingFang SC;font-weight:700;color:#666;width:%?160?%}.houfont[data-v-6f235bcf]{font-size:%?22?%;font-family:PingFang SC;font-weight:700;color:#222;display:flex;align-items:center}.zulinbutt[data-v-6f235bcf]{width:%?150?%;height:%?50?%;background:linear-gradient(-90deg,#6d4af8,#8f4def);border-radius:%?26?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.gundong[data-v-6f235bcf]{display:flex;flex-direction:column;-webkit-animation:myMove-data-v-6f235bcf 2.5s linear infinite;animation:myMove-data-v-6f235bcf 2.5s linear infinite;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards\n\t/* 将动画重置为第一帧，这样就能够实现无缝的播放了 */}\n\n/*文字无缝滚动*/@-webkit-keyframes myMove-data-v-6f235bcf{0%{-webkit-transform:translateY(0);transform:translateY(0)}100%{-webkit-transform:translateY(-20px);transform:translateY(-20px)}}@keyframes myMove-data-v-6f235bcf{0%{-webkit-transform:translateY(0);transform:translateY(0)}100%{-webkit-transform:translateY(-20px);transform:translateY(-20px)}}.chanzi[data-v-6f235bcf]{width:%?112?%;height:%?46?%;background:#b1b1b1;border-radius:%?22?%;font-size:%?22?%;font-family:PingFang SC;font-weight:800;color:#666;display:flex;justify-content:center;align-items:center}.closebutt[data-v-6f235bcf]{width:%?150?%;height:%?50?%;background:linear-gradient(-90deg,#d7d9db,#c0c1c3);border-radius:%?26?%;font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.titlede[data-v-6f235bcf]{font-size:%?32?%;font-family:PingFang SC;font-weight:700;color:#222;display:flex;justify-content:center}.titlede2[data-v-6f235bcf]{font-size:%?26?%;font-family:PingFang SC;font-weight:700;color:#666}.kaka[data-v-6f235bcf]{background:#f5f5f5;padding:%?30?% %?20?%;margin-top:%?20?%;font-size:%?22?%;font-family:PingFang SC;font-weight:700;color:#222}.knowbutt[data-v-6f235bcf]{width:%?216?%;height:%?72?%;background:linear-gradient(-90deg,#6d47f7,#8d4af0);border-radius:%?36?%;font-size:%?32?%;font-family:PingFang SC;font-weight:700;color:#fff;display:flex;justify-content:center;align-items:center}.tifent[data-v-6f235bcf]{font-size:%?24?%;font-family:PingFang SC;font-weight:700;color:#666}",""]),t.exports=e},b6d4:function(t,e,i){"use strict";i.r(e);var n=i("1430"),a=i("18b4");for(var s in a)"default"!==s&&function(t){i.d(e,t,(function(){return a[t]}))}(s);i("5838");var o,c=i("f0c5"),r=Object(c["a"])(a["default"],n["b"],n["c"],!1,null,"840f4554",null,!1,n["a"],o);e["default"]=r.exports},b924:function(t,e,i){var n=i("b27b");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("5ee724d4",n,!0,{sourceMap:!1,shadowMode:!1})},d0f9:function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,".maoScroll-main[data-v-840f4554]{width:100%;overflow:hidden}",""]),t.exports=e},f2e7:function(t,e,i){"use strict";var n=i("b924"),a=i.n(n);a.a},f6ae:function(t,e,i){"use strict";i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return s})),i.d(e,"a",(function(){return n}));var n={uPopup:i("3d7b").default,uParse:i("6b9e").default},a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticStyle:{background:"#EBEBEB","min-height":"100vh","padding-bottom":"60rpx"}},[i("v-uni-view",{staticClass:"hearer",style:{paddingTop:t.statusBarHeight+"px"}},[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between"}},[i("v-uni-view",[i("v-uni-view",{staticClass:"tiffont"},[t._v(t._s(this.$t("message").machine.machinePerhour))]),i("v-uni-view",{staticClass:"moneyfont"},[t._v(t._s(t.listPeson_time)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1),i("v-uni-image",{staticStyle:{width:"220rpx",height:"220rpx"},attrs:{src:"/static/image/phone.png",mode:""}})],1),i("v-uni-view",{staticClass:"linebock"},[i("v-uni-view",{staticClass:"CStext1"},[t._v(t._s(this.$t("message").machine.Estimateddailyrevenue))]),i("v-uni-view",{staticStyle:{flex:"3",display:"flex","justify-content":"space-between","align-items":"center"}},[i("v-uni-view",{staticStyle:{"margin-left":"30rpx"}},[t._v(t._s(t.listPeson_evedMoney)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])]),i("v-uni-view",{staticClass:"xiangbutt",staticStyle:{"margin-right":"4rpx"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.togoxiang.apply(void 0,arguments)}}},[t._v(t._s(this.$t("message").machine.machineDetails))])],1)],1)],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"12rpx"}},[i("v-uni-view",{staticClass:"busson",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.tan.apply(void 0,arguments)}}},[t._v(t._s(this.$t("message").machine.HowtoMine))])],1),i("v-uni-view",{staticStyle:{padding:"0 10rpx","margin-top":"40rpx"}},[i("v-uni-view",{staticStyle:{width:"100%",height:"60rpx",background:"#B1B1B1","border-radius":"30rpx",display:"flex","justify-content":"space-between"}},[i("v-uni-view",{class:1==t.type?"active":"cc",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.choo(1)}}},[t._v(t._s(this.$t("message").machine.Buyminingmachine))]),i("v-uni-view",{class:2==t.type?"active":"cc",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.choo(2)}}},[t._v(t._s(this.$t("message").machine.MyMiner))])],1)],1),1==t.type&&0!=t.list.length?i("v-uni-view",{staticStyle:{padding:"0 20rpx","margin-top":"30rpx"}},[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","flex-wrap":"wrap"}},t._l(t.list,(function(e,n){return i("v-uni-view",{staticClass:"card",staticStyle:{position:"relative"}},[i("v-uni-view",{staticClass:"dingff",staticStyle:{position:"absolute",top:"0",left:"0","min-width":"134rpx",height:"40rpx"}},[i("v-uni-image",{staticStyle:{height:"40rpx"},attrs:{src:"/static/image/qie.png",mode:"heightFix"}}),i("v-uni-view",{staticClass:"dingff",staticStyle:{position:"absolute",top:"0",left:"0"}},[t._v(t._s(e.name))])],1),i("v-uni-view",{staticClass:"dengpai"},[t._v(t._s(t.Demands)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("VIP"+t._s(e.vip_level))])]),i("v-uni-view",[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between"}},[i("v-uni-view",{staticClass:"qianfont"},[t._v(t._s(t.hours))]),i("v-uni-view",{staticClass:"houfont"},[t._v(t._s(e.income)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"qianfont"},[t._v(t._s(t.RentalPrice))]),i("v-uni-view",{staticClass:"houfont"},[t._v(t._s(e.price)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1)],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"40rpx","margin-bottom":"6rpx"}},[i("v-uni-view",{staticClass:"zulinbutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.lease(n)}}},[t._v(t._s(t.machineRent))])],1)],1)})),1)],1):t._e(),2==t.type?i("v-uni-view",{staticStyle:{padding:"0 20rpx","margin-top":"30rpx",background:"#B1B1B1",height:"40rpx","font-size":"24rpx","font-family":"PingFang SC","font-weight":"500",color:"#666666",overflow:"hidden"}},[i("v-uni-view",{staticStyle:{display:"flex"}},[i("v-uni-view",{staticStyle:{"min-width":"100rpx","line-height":"43rpx"}},[t._v(t._s(this.$t("message").machine.machineAddress)+":")]),i("maoScroll",{attrs:{data:t.adressList,showNum:1,lineHeight:45,animationScroll:800,animation:1500},scopedSlots:t._u([{key:"default",fn:function(e){var n=e.line;return[i("v-uni-view",{staticClass:"line"},[t._v(t._s(n))])]}}],null,!1,3404051943)})],1)],1):t._e(),1==t.type&&0==t.list.length?i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","align-items":"center","flex-direction":"column","margin-top":"50rpx"}},[i("v-uni-image",{staticStyle:{width:"104rpx",height:"116rpx"},attrs:{src:"/static/image/wuzhuangtai.png",mode:""}}),i("v-uni-view",{staticStyle:{"margin-top":"40rpx",color:"#C5C5C5","font-size":"32rpx"}},[t._v(t._s(this.$t("message").machine.machineNone))])],1):t._e(),2==t.type&&0==t.ListmeKuang.length?i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","align-items":"center","flex-direction":"column","margin-top":"50rpx"}},[i("v-uni-image",{staticStyle:{width:"104rpx",height:"116rpx"},attrs:{src:"/static/image/wuzhuangtai.png",mode:""}}),i("v-uni-view",{staticStyle:{"margin-top":"40rpx",color:"#C5C5C5","font-size":"32rpx"}},[t._v(t._s(this.$t("message").machine.machineNone))])],1):t._e(),2==t.type&&0!=t.ListmeKuang.length?i("v-uni-view",{staticStyle:{padding:"0 20rpx","margin-top":"30rpx"}},[t.ListmeKuang.length>0?i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","flex-wrap":"wrap"}},t._l(t.ListmeKuang,(function(e,n){return i("v-uni-view",{staticClass:"card",staticStyle:{position:"relative"}},[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"flex-end"}},[i("v-uni-view",{staticClass:"dingff",staticStyle:{position:"absolute",top:"0",left:"0","min-width":"134rpx",height:"40rpx"}},[i("v-uni-image",{staticStyle:{height:"40rpx"},attrs:{src:"/static/image/qie.png",mode:"heightFix"}}),i("v-uni-view",{staticClass:"dingff",staticStyle:{position:"absolute",top:"0",left:"0"}},[t._v(t._s(e.name))])],1),1==e.state?i("v-uni-view",{staticStyle:{display:"flex","align-items":"center"}},[i("v-uni-view",{staticStyle:{width:"14rpx",height:"14rpx",background:"#36B115","border-radius":"50%","margin-right":"8rpx"}}),i("v-uni-view",{staticStyle:{"font-size":"26rpx","font-family":"PingFang SC","font-weight":"bold",color:"#36B115"}},[t._v(t._s(t.Turnon))])],1):t._e()],1),i("v-uni-view",[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"qianfont"},[t._v(t._s(t.hours))]),i("v-uni-view",{staticClass:"houfont"},[t._v(t._s(e.income)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"qianfont"},[t._v(t._s(t.Gainanincome))]),i("v-uni-view",{staticClass:"houfont"},[t._v(t._s(e.receive_profit)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"qianfont"},[t._v(t._s(t.Runningtime))]),i("v-uni-view",{staticClass:"houfont"},[t._v(t._s(e.run_times))])],1)],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"14rpx"}},[i("v-uni-view",{staticClass:"dengpai2",staticStyle:{"justify-content":"center","align-items":"center"}},[t._v(t._s(t.Unextractedmoney)),i("v-uni-view",{staticStyle:{"margin-left":"10rpx",color:"#F0803B"}},[t._v(t._s(e.not_extracted)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1)],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"40rpx","margin-bottom":"6rpx"}},[i("v-uni-view",{staticClass:"closebutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.closehu(n)}}},[t._v(t._s(t.machineClose))]),i("v-uni-view",{staticClass:"zulinbutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.collect(n)}}},[t._v(t._s(t.machineCollect))])],1)],1)})),1):t._e()],1):t._e(),i("u-popup",{attrs:{show:t.show,round:10,mode:"center"},on:{close:function(e){arguments[0]=e=t.$handleEvent(e),t.close.apply(void 0,arguments)},open:function(e){arguments[0]=e=t.$handleEvent(e),t.open.apply(void 0,arguments)}}},[i("v-uni-view",{staticStyle:{padding:"30rpx",width:"550rpx",height:"990rpx"}},[i("v-uni-view",{staticClass:"titlede"},[t._v(t._s(this.$t("message").machine.HowtoMine))]),i("v-uni-scroll-view",{staticStyle:{height:"850rpx"},attrs:{"scroll-y":"true"}},[i("u-parse",{attrs:{content:t.guiList}})],1),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"knowbutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.show=!1}}},[t._v(t._s(this.$t("message").machine.machineGotit))])],1)],1)],1),i("u-popup",{attrs:{show:t.closeshow,round:10,mode:"center"},on:{close:function(e){arguments[0]=e=t.$handleEvent(e),t.close2.apply(void 0,arguments)}}},[i("v-uni-view",{staticStyle:{padding:"30rpx",width:"590rpx",height:"310rpx"}},[i("v-uni-view",{staticClass:"titlede2"},[t._v(t._s(this.$t("message").machine.ClosepopupText))]),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"40rpx"}},[i("v-uni-view",{staticClass:"knowbutt",staticStyle:{background:"linear-gradient(-90deg, #D6D8DA 0%, #C0C2C3 100%)"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.closeshow=!1}}},[t._v(t._s(this.$t("message").machine.ClosepopupCancel))]),i("v-uni-view",{staticClass:"knowbutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.confirm.apply(void 0,arguments)}}},[t._v(t._s(this.$t("message").machine.ClosepopupConfirm))])],1)],1)],1),i("u-popup",{attrs:{show:t.exshow,round:10,mode:"center"},on:{close:function(e){arguments[0]=e=t.$handleEvent(e),t.close3.apply(void 0,arguments)}}},[i("v-uni-view",{staticStyle:{padding:"30rpx",width:"550rpx",height:"476rpx"}},[i("v-uni-view",{staticStyle:{"font-size":"32rpx","font-family":"PingFang SC","font-weight":"bold",color:"#222222",display:"flex","justify-content":"center"}},[t._v(t._s(t.perience.name))]),i("v-uni-view",{staticStyle:{"font-size":"28rpx","font-family":"PingFang SC","font-weight":"bold",color:"#3C85E9","margin-top":"22rpx",display:"flex","justify-content":"center"}},[t._v(t._s(this.$t("message").machine.machineDemands)+" VIP"+t._s(t.perience.vip_level))]),i("v-uni-view",{staticStyle:{padding:"30rpx 20rpx",background:"#F5F5F5","margin-top":"26rpx"}},[i("v-uni-view",{staticClass:"tifent"},[t._v(t._s(this.$t("message").machine.machinePerhour)+":"),i("span",{staticStyle:{color:"#222","margin-left":"20rpx"}},[t._v(t._s(t.perience.income)+"/"+t._s(this.$t("message").machine.HOUR))])]),i("v-uni-view",{staticClass:"tifent",staticStyle:{display:"flex","margin-top":"30rpx"}},[t._v(t._s(this.$t("message").machine.RentalPrice)+":"),i("v-uni-view",{staticStyle:{color:"#36B115","margin-left":"26rpx"}},[t._v(t._s(t.perience.price)),i("span",{staticStyle:{"margin-left":"10rpx"}},[t._v("USDT")])])],1)],1),i("v-uni-view",{staticStyle:{"font-size":"22rpx","font-family":"PingFang SC","font-weight":"bold",color:"#666666","margin-top":"24rpx"}},[t._v(t._s(this.$t("message").machine.tiyanPopupText))]),i("v-uni-view",{staticStyle:{display:"flex","justify-content":"space-between","margin-top":"30rpx"}},[i("v-uni-view",{staticClass:"knowbutt",staticStyle:{background:"linear-gradient(-90deg, #D6D8DA 0%, #C0C2C3 100%)"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.exshow=!1}}},[t._v(t._s(this.$t("message").machine.ClosepopupCancel))]),i("v-uni-view",{staticClass:"knowbutt",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.confirm2.apply(void 0,arguments)}}},[t._v(t._s(this.$t("message").machine.ClosepopupConfirm))])],1)],1)],1)],1)},s=[]}}]);