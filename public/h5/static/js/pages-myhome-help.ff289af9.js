(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-myhome-help"],{3687:function(t,n,e){var a=e("24fb");n=a(!1),n.push([t.i,"uni-page-body[data-v-1dc3276c]{background:#ebebeb}.u1[data-v-1dc3276c]{text-align:center;width:%?165?%;height:%?50?%;overflow:hidden;font-size:%?22?%;font-family:PingFang SC;color:#874ec2;white-space:nowrap;border-bottom:%?4?% solid #874ec2}.u2[data-v-1dc3276c]{text-align:center;width:%?165?%;height:%?50?%;overflow:hidden;font-size:%?22?%;font-family:PingFang SC;color:#666;white-space:nowrap}.biaoti[data-v-1dc3276c]{display:flex;justify-content:space-between;width:100%;box-sizing:border-box;padding:0 %?20?%}.xiahuaxian[data-v-1dc3276c]{width:100%;height:%?4?%;background:#c9c9c9;display:flex;justify-content:space-between}\n\n/* .xhx1 {\n\twidth: 25%;\n\theight: 4rpx;\n\tbackground: #874EC2;\n}\n\n.xhx2 {\n\twidth: 25%;\n\theight: 4rpx;\n\tbackground: #874EC2;\n\tmargin-left: 40rpx;\n}\n\n.xhx3 {\n\twidth: 25%;\n\theight: 4rpx;\n\tbackground: #874EC2;\n\tmargin-left: 120rpx;\n}\n\n.xhx4 {\n\twidth: 25%;\n\theight: 4rpx;\n\tbackground: #874EC2;\n} */body.?%PAGE?%[data-v-1dc3276c]{background:#ebebeb}",""]),t.exports=n},5718:function(t,n,e){"use strict";var a=e("99ed"),i=e.n(a);i.a},"68a1":function(t,n,e){"use strict";e.r(n);var a=e("74f7e"),i=e("94e9");for(var o in i)"default"!==o&&function(t){e.d(n,t,(function(){return i[t]}))}(o);e("5718");var s,c=e("f0c5"),r=Object(c["a"])(i["default"],a["b"],a["c"],!1,null,"1dc3276c",null,!1,a["a"],s);n["default"]=r.exports},"74f7e":function(t,n,e){"use strict";e.d(n,"b",(function(){return i})),e.d(n,"c",(function(){return o})),e.d(n,"a",(function(){return a}));var a={uParse:e("6b9e").default},i=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("v-uni-view",{staticStyle:{padding:"30rpx  0 10rpx"}},[e("v-uni-view",{staticClass:"biaoti"},t._l(t.list,(function(n,a){return e("v-uni-view",{key:a,on:{click:function(n){arguments[0]=n=t.$handleEvent(n),t.dian(a)}}},[e("v-uni-view",{class:t.flag==a?"u1":"u2"},[t._v(t._s(n.kins))])],1)})),1),e("v-uni-view",{staticClass:"xiahuaxian"},[e("v-uni-view",{class:0==t.flag?"xhx1":""}),e("v-uni-view",{class:1==t.flag?"xhx2":""}),e("v-uni-view",{class:2==t.flag?"xhx3":""}),e("v-uni-view",{class:3==t.flag?"xhx4":""})],1),e("v-uni-view",[e("u-parse",{staticStyle:{margin:"0 auto"},attrs:{content:t.content}})],1)],1)},o=[]},"94e9":function(t,n,e){"use strict";e.r(n);var a=e("ea3a"),i=e.n(a);for(var o in a)"default"!==o&&function(t){e.d(n,t,(function(){return a[t]}))}(o);n["default"]=i.a},"99ed":function(t,n,e){var a=e("3687");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var i=e("4f06").default;i("0aad12f0",a,!0,{sourceMap:!1,shadowMode:!1})},ea3a:function(t,n,e){"use strict";var a=e("4ea4");Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0,e("96cf");var i=a(e("1da1")),o=a(e("e2ba")),s={components:{uParse:o.default},data:function(){return{flag:0,content:"",list:[{kins:this.$t("message").myhome.help1},{kins:this.$t("message").myhome.help2},{kins:this.$t("message").myhome.help3},{kins:this.$t("message").myhome.help4}]}},computed:{i18n:function(){return this.$t("message")}},onLoad:function(t){console.log(t),t.folg?this.flag=t.folg:this.flag=0,this.getList()},methods:{getList:function(){var t=this;return(0,i.default)(regeneratorRuntime.mark((function n(){var e;return regeneratorRuntime.wrap((function(n){while(1)switch(n.prev=n.next){case 0:return n.next=2,t.$api.helps();case 2:e=n.sent,t.content=e.data[t.flag]["content"];case 4:case"end":return n.stop()}}),n)})))()},dian:function(t){this.flag=t,console.log(this.flag),this.getList()}}};n.default=s}}]);