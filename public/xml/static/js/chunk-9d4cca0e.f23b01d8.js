(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9d4cca0e"],{"06f4":function(t,e,a){},"358e":function(t,e,a){"use strict";var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"report_content"},[a("div",{staticClass:"search_wrap"},[a("div",[a("span",{on:{click:t.changeStart}},[t._v(t._s(t.startDate))]),a("span",{on:{click:t.changeEnd}},[t._v(t._s(t.endDate))])]),a("div",{staticClass:"search",on:{click:t.search}},[t._v(t._s(t.$t("teamReport.search")))])]),a("table",{attrs:{width:"100%",cellspacing:"0"}},[a("thead",[a("tr",t._l(t.thList,(function(e,s){return a("th",{key:s},[t._v(t._s(e.title))])})),0)]),a("tbody",[4==t.leng?t._l(t.tableList,(function(e,s){return a("tr",{key:s},[a("td",[t._v(t._s(e.teamProfit))]),a("td",[t._v(t._s(e.teamWithdrawal))]),a("td",[t._v(t._s(e.teamNumber))]),a("td",[t._v(t._s(e.newReg))])])})):t._e(),5==t.leng?t._l(t.tableList,(function(e,s){return a("tr",{key:s},[a("td",[t._v(t._s(e.username))]),a("td",[t._v(t._s(e.recharge))]),a("td",[t._v(t._s(e.withdrawal))]),a("td",[t._v(t._s(e.rebate))]),a("td",[t._v(t._s(e.commission))])])})):t._e(),"report"==t.leng?t._l(t.tableList,(function(e,s){return a("tr",{key:s},[a("td",[t._v(t._s(e.num))]),a("td",[t._v(t._s(e.commission))]),a("td",[t._v(t._s(e.rebate))]),a("td",[t._v(t._s(e.buymembers))]),a("td",[t._v(t._s(e.date))])])})):t._e()],2)])]),a("van-popup",{attrs:{position:"bottom","close-on-popstate":""},model:{value:t.showDate,callback:function(e){t.showDate=e},expression:"showDate"}},[a("van-datetime-picker",{attrs:{type:"date",title:t.$t("teamReport.pickerTitle"),"min-date":t.minDate,"confirm-button-text":t.$t("teamReport.confirm"),"cancel-button-text":t.$t("teamReport.cancel")},on:{confirm:t.confirmDate,cancel:function(e){t.showDate=!1}},model:{value:t.currentDate,callback:function(e){t.currentDate=e},expression:"currentDate"}})],1)],1)},r=[],i={props:{thList:{type:Array,default:()=>[]},tableList:{type:Array,default:()=>[]},leng:{type:String,default:"4"}},data(){return{currentDate:new Date(this.$Util.DateFormat("YY-MM-DD",new Date)),startDate:this.$Util.DateFormat("YY-MM-DD",new Date),endDate:this.$Util.DateFormat("YY-MM-DD",new Date),showDate:!1,minDate:new Date(1900,1,1),pickType:1}},methods:{changeStart(){this.showDate=!0,this.pickType=1},changeEnd(){this.showDate=!0,this.pickType=2},confirmDate(t){1==this.pickType&&(this.startDate=this.$Util.DateFormat("YY-MM-DD",t)),2==this.pickType&&(this.endDate=this.$Util.DateFormat("YY-MM-DD",t)),this.showDate=!1},search(){this.$emit("search",this.startDate,this.endDate)}}},o=i,n=(a("d3a0"),a("cba8")),c=Object(n["a"])(o,s,r,!1,null,"628b6bb3",null);e["a"]=c.exports},d3a0:function(t,e,a){"use strict";a("06f4")},d7d4:function(t,e,a){},e036:function(t,e,a){"use strict";a("d7d4")},e75c:function(t,e,a){"use strict";a.r(e);var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"report_wrap"},[a("nav-bar",{attrs:{title:t.$t("reportDetail.title")}}),a("div",{staticClass:"report_list"},[a("div",[a("p",[t._v(t._s(t.$t("reportDetail.content[0]"))+": "+t._s(t.reportInfo.totalCommission))]),a("span",[t._v(t._s(t.$t("reportDetail.content[1]"))+"："+t._s(t.postData.startdate))])]),a("div",[a("span",[t._v(t._s(t.$t("reportDetail.content[2]"))+"："+t._s(t.reportInfo.taskNum))]),a("span",[t._v(t._s(t.$t("reportDetail.content[3]"))+": "+t._s(t.reportInfo.teamTaskNum))])]),a("div",[a("span",[t._v(t._s(t.$t("reportDetail.content[4]"))+"："+t._s(t.reportInfo.commission))]),a("span",[t._v(t._s(t.$t("reportDetail.content[5]"))+"："+t._s(t.reportInfo.teamCommission))])])]),a("div",{staticClass:"report_btn"},[t._v(t._s(t.$t("reportDetail.subTitle")))]),a("report-table",{attrs:{thList:t.thList,tableList:t.teamDataList,leng:t.leng},on:{search:t.search}})],1)},r=[],i=a("358e"),o={name:"reportDetail",components:{ReportTable:i["a"]},data(){return{flag:0,thList:[{title:this.$t("reportDetail.report[0]")},{title:this.$t("reportDetail.report[1]")},{title:this.$t("reportDetail.report[2]")},{title:this.$t("reportDetail.report[3]")},{title:this.$t("reportDetail.report[4]")}],leng:"report",postData:{startdate:this.$Util.DateFormat("YY-MM-DD",new Date),enddate:this.$Util.DateFormat("YY-MM-DD",new Date)},teamDataList:[],reportInfo:{}}},created(){this.getUserReport()},methods:{getUserReport(){this.$Model.UserReport(this.postData,t=>{if("1"==t.code){this.reportInfo=t,this.teamDataList=t.details;let e=reportInfo.commission+reportInfo.teamCommission;this.$set(this.reportInfo,"totalCommission",e)}})},search(t,e){this.postData.startdate=t,this.postData.enddate=e,this.getUserReport("team")}}},n=o,c=(a("e036"),a("cba8")),l=Object(c["a"])(n,s,r,!1,null,"8cc78f18",null);e["default"]=l.exports}}]);