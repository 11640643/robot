(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-c951ffc0"],{3129:function(t,s,e){"use strict";e.r(s);var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"record"},[e("nav-bar",{attrs:{title:t.$t("investRecord.title")}}),e("div",{staticStyle:{height:"1.1rem"}}),e("div",{staticClass:"center_wrap"},[e("van-pull-refresh",{on:{refresh:t.onRefresh},model:{value:t.isRefresh,callback:function(s){t.isRefresh=s},expression:"isRefresh"}},[e("van-list",{class:{Empty:!t.list.length},attrs:{finished:t.isFinished,"finished-text":t.list.length?t.$t("vanPull[0]"):t.$t("vanPull[1]")},on:{load:t.onLoad},model:{value:t.isLoad,callback:function(s){t.isLoad=s},expression:"isLoad"}},t._l(t.list,(function(s,i){return e("div",{key:i,staticClass:"itemlist"},[e("div",{staticClass:"item_left"},[e("div",{staticClass:"text1"},[t._v(t._s(t.$t("investRecord.default[0]"))+"："+t._s(t.InitData.currency)+t._s(s.money))]),e("div",{staticClass:"text2"},[t._v(t._s(t.$t("investRecord.default[1]"))+"："+t._s(t.statusStr(s.status)))]),e("div",{staticClass:"text3"},[t._v(t._s(t.$t("investRecord.default[2]"))+"："),e("span",{staticClass:"red"},[t._v(t._s(t.InitData.currency)+t._s(s.lilv*s.money))])])]),e("div",{staticClass:"item_right"},[e("div",{staticClass:"day"},[t._v(t._s(s.daynum)+t._s(t.$t("investRecord.default[5]")))]),e("div",{staticClass:"start_time"},[t._v(t._s(t.$t("investRecord.default[3]"))+"："+t._s(s.start_time))]),e("div",{staticClass:"end_time"},[t._v(t._s(t.$t("investRecord.default[4]"))+"："+t._s(s.end_time))])])])})),0)],1)],1)],1)},a=[],n={name:"record",data(){return{isLoad:!1,isFinished:!1,isRefresh:!1,pageNo:1,page_size:10,list:[]}},created(){this.getListData("init")},mounted(){},methods:{statusStr(t){switch(t){case"1":return this.$t("investRecord.default[6]");case"2":return this.$t("investRecord.default[7]");default:break}},onLoad(){this.getListData("load")},getListData(t){this.isLoad=!0,this.isRefresh=!1,"load"==t?this.pageNo+=1:(this.pageNo=1,this.isFinished=!1),this.$Model.getUserYuebaoList({page_no:this.pageNo,page_size:this.page_size,state:0},s=>{this.$nextTick(()=>{this.isLoad=!1}),1==s.code?("load"==t?1==this.pageNo?this.list=s.info:this.list=this.list.concat(s.info):this.list=s.info,this.pageNo==s.data_total_page<=0||s.data_total_page?this.isFinished=!0:this.isFinished=!1):(this.list=[],this.isFinished=!0)})},onRefresh(){this.getListData("init")}}},d=n,l=(e("ee0d"),e("cba8")),o=Object(l["a"])(d,i,a,!1,null,"cb24105e",null);s["default"]=o.exports},d5cb:function(t,s,e){},ee0d:function(t,s,e){"use strict";e("d5cb")}}]);