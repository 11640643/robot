(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6c410f1c"],{"0e56":function(s,t,e){},"4f79":function(s,t,e){"use strict";e.r(t);var i=function(){var s=this,t=s.$createElement,e=s._self._c||t;return e("div",{staticClass:"message"},[e("nav-bar",{attrs:{title:s.$t("message.title")}}),e("div",{staticStyle:{height:"1.1rem"}}),e("div",{staticClass:"center_wrap"},[e("van-pull-refresh",{on:{refresh:s.onRefresh},model:{value:s.isRefresh,callback:function(t){s.isRefresh=t},expression:"isRefresh"}},[e("van-list",{class:{Empty:!s.messageList.length},attrs:{finished:s.isFinished,"finished-text":s.messageList.length?s.$t("vanPull[0]"):s.$t("vanPull[1]")},on:{load:s.onLoad},model:{value:s.isLoad,callback:function(t){s.isLoad=t},expression:"isLoad"}},s._l(s.messageList,(function(t,i){return e("div",{key:i,staticClass:"itemlist",on:{click:function(e){return s.gomessagedet(t.id)}}},[e("div",{staticClass:"item_left"},[s._v(s._s(t.title))]),e("div",{staticClass:"item_right"},[e("van-icon",{attrs:{name:"arrow"}})],1)])})),0)],1)],1)],1)},a=[],n={name:"message",data(){return{isLoad:!1,isFinished:!1,isRefresh:!1,pageNo:1,page_size:10,messageList:[]}},created(){this.getListData("init")},mounted(){},methods:{gomessagedet(s){this.$router.push({path:"/messagedet/"+s})},onLoad(){this.getListData("load")},getListData(s){this.isLoad=!0,this.isRefresh=!1,"load"==s?this.pageNo+=1:(this.pageNo=1,this.isFinished=!1),this.$Model.msgList({page_no:this.pageNo,page_size:this.page_size},t=>{this.$nextTick(()=>{this.isLoad=!1}),1==t.code?("load"==s?1==this.pageNo?this.messageList=t.data:this.messageList=this.messageList.concat(t.data):this.messageList=t.data,this.pageNo==t.data_total_page<=0||t.data_total_page?this.isFinished=!0:this.isFinished=!1):(this.messageList=[],this.isFinished=!0)})},onRefresh(){this.getListData("init")}}},o=n,h=(e("6021"),e("2877")),d=Object(h["a"])(o,i,a,!1,null,"23f7e8d6",null);t["default"]=d.exports},6021:function(s,t,e){"use strict";var i=e("0e56"),a=e.n(i);a.a}}]);