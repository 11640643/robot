(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-money-record"],{"1e5a":function(t,e,i){"use strict";var a=i("95c0"),n=i.n(a);n.a},"730a":function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,".card[data-v-cf4f4bb6]{background:#fff;border-radius:%?16?%;padding:%?20?%;margin-top:%?30?%;display:flex;justify-content:space-between}.title[data-v-cf4f4bb6]{font-size:%?24?%;font-family:PingFang SC;font-weight:700;color:#999}.shufont[data-v-cf4f4bb6]{font-size:%?18?%;font-family:PingFang SC;font-weight:700;color:#222;margin-top:%?26?%}",""]),t.exports=e},"90da":function(t,e,i){"use strict";i.r(e);var a=i("d465"),n=i.n(a);for(var s in a)"default"!==s&&function(t){i.d(e,t,(function(){return a[t]}))}(s);e["default"]=n.a},"95c0":function(t,e,i){var a=i("730a");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("37caa21b",a,!0,{sourceMap:!1,shadowMode:!1})},d465:function(t,e,i){"use strict";(function(t){var a=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("96cf");var n=a(i("1da1")),s={data:function(){return{none:this.$t("message").record.recordNOdata,time:this.$t("message").record.recordTime,number:this.$t("message").record.recordnumber,tikuan:this.$t("message").record.recordstate,yes:this.$t("message").record.recordstateYes,NO:this.$t("message").record.recordstateNO,page:1,list:[]}},onReady:function(){uni.setNavigationBarTitle({title:this.$t("message").tabbar.tixian})},computed:{i18n:function(){return this.$t("message")}},onPullDownRefresh:function(){t("log","下拉"," at pages/money/record.vue:58"),this.page=1,this.list=[],this.withdrawalrecords()},onReachBottom:function(){t("log","触底加载",this.list.length," at pages/money/record.vue:64"),this.list.length>=20&&(this.page=this.page+1,this.withdrawalrecords())},onLoad:function(){this.withdrawalrecords()},methods:{withdrawalrecords:function(){var e=this;return(0,n.default)(regeneratorRuntime.mark((function i(){var a,n;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:return a={page_size:e.page},i.next=3,e.$api.withdrawalrecord(a);case 3:n=i.sent,t("log",n," at pages/money/record.vue:80"),e.list=n.data;case 6:case"end":return i.stop()}}),i)})))()}}};e.default=s}).call(this,i("0de9")["log"])},eb8b:function(t,e,i){"use strict";var a;i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return s})),i.d(e,"a",(function(){return a}));var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticStyle:{background:"#EBEBEB","min-height":"100vh",padding:"30rpx"}},[0==t.list.length?i("v-uni-view",{staticClass:"box",staticStyle:{"padding-top":"140rpx"}},[i("v-uni-view",{staticStyle:{display:"flex","justify-content":"center","align-items":"center","flex-direction":"column"}},[i("v-uni-image",{staticStyle:{width:"104rpx",height:"116rpx"},attrs:{src:"/static/image/wuzhuangtai.png"}}),i("v-uni-view",{staticStyle:{"font-size":"30rpx","text-align":"center",color:"rgb(197, 197, 197)","margin-top":"30rpx"}},[t._v(t._s(t.none))])],1)],1):t._l(t.list,(function(e,a){return i("v-uni-view",{staticClass:"card"},[i("v-uni-view",[i("v-uni-view",{staticClass:"title"},[t._v(t._s(t.time))]),null==e.set_time?i("v-uni-view",{staticClass:"shufont"},[t._v(t._s(e.add_time))]):i("v-uni-view",{staticClass:"shufont"},[t._v(t._s(e.set_time))])],1),i("v-uni-view",[i("v-uni-view",{staticClass:"title"},[t._v(t._s(t.number)+" (USDT)")]),i("v-uni-view",{staticClass:"shufont"},[t._v(t._s(e.price))])],1),i("v-uni-view",[i("v-uni-view",{staticClass:"title"},[t._v(t._s(t.tikuan))]),i("v-uni-view",{staticClass:"shufont",staticStyle:{color:"#F7203E"}},[t._v(t._s(e.state))])],1)],1)}))],2)},s=[]},f215:function(t,e,i){"use strict";i.r(e);var a=i("eb8b"),n=i("90da");for(var s in n)"default"!==s&&function(t){i.d(e,t,(function(){return n[t]}))}(s);i("1e5a");var r,o=i("f0c5"),c=Object(o["a"])(n["default"],a["b"],a["c"],!1,null,"cf4f4bb6",null,!1,a["a"],r);e["default"]=c.exports}}]);