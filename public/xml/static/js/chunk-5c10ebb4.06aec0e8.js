(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5c10ebb4"],{"5cda":function(t,i,s){"use strict";var e=s("c08c"),a=s.n(e);a.a},c08c:function(t,i,s){},fdf8:function(t,i,s){"use strict";s.r(i);var e=function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("div",{staticClass:"activityDetail"},[s("nav-bar",{attrs:{title:t.$t("message.detailTitle")}}),s("div",{staticStyle:{height:"1.1rem"}}),s("div",{staticClass:"center_wrap"},[s("div",{staticClass:"top_title"},[t._v(t._s(t.msgInfo.title))]),s("div",{staticClass:"explain",domProps:{innerHTML:t._s(t.msgInfo.content)}})])],1)},a=[],n={name:"msgDetail",data(){return{id:"",msgInfo:{title:"",content:""}}},created(){this.id=this.$route.params.id},mounted(){this.getmsginfo()},methods:{getmsginfo(){this.$Model.msginfo({msgid:this.id},t=>{1==t.code&&(this.msgInfo=t.data)})}}},c=n,d=(s("5cda"),s("2877")),o=Object(d["a"])(c,e,a,!1,null,"66543ad8",null);i["default"]=o.exports}}]);