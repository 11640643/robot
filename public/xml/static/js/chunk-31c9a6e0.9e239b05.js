(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-31c9a6e0"],{"3cb6":function(t,s,a){t.exports=a.p+"static/img/shalou.28c24883.gif"},"7b31":function(t,s,a){"use strict";(function(t){s["a"]={name:"myTask",components:{},data(){return{show:!1,listData:"",isLoad:!1,isFinished:!1,isRefresh:!1,pageNo:1,tabsState:1,tabsIndex:0,taskTabs:[{state:1,text:this.$t("task.tabs[0]")},{state:3,text:this.$t("task.tabs[1]")},{state:2,text:this.$t("task.tabs[2]")}],fileList:[],dataVal:0,dataMax:100,time:null,text:""}},computed:{},watch:{},created(){this.listData=this.taskTabs.flatMap(t=>[""]),this.getListData("init")},mounted(){},activated(){},destroyed(){},methods:{onClickCell(s){t(event.target).hasClass("van-uploader__input")||this.$router.push("/user/taskInfo/"+s)},onLoad(){this.getListData("load")},changeTabs(t){this.tabsState=this.taskTabs[t].state,this.getListData("init")},getListData(t){this.isLoad=!0,this.isRefresh=!1,"load"==t?this.pageNo+=1:(this.pageNo=1,this.isFinished=!1),this.$Model.GetTaskRecord({status:this.tabsState,page_no:this.pageNo,is_u:2},s=>{this.isLoad=!1,1==s.code?(this.listData[this.tabsIndex]="load"==t?this.listData[this.tabsIndex].concat(s.info):s.info,this.pageNo==s.data_total_page?this.isFinished=!0:this.isFinished=!1):(this.listData[this.tabsIndex]="",this.isFinished=!0)})},onRefresh(){this.getListData("init")},submitTaskBefo(t,s,a){this.show=!0,this.time=setInterval(()=>{this.modifValues(t,s,a)},30)},modifValues(t,s,a){this.dataVal>=100&&(clearInterval(this.time),this.dataVal=100,this.submitTaskAfert(t,s,a));let i=1*this.dataVal+.5,e=Math.floor(i)+"%";this.dataVal=i,this.text=e,this.$refs.progressBar.style.width=e},submitTaskAfert(t,s,a){this.$Model.SubmitTask({order_id:t,status:a},t=>{1==t.code?(this.show=!1,this.getListData("init")):(this.show=!1,this.$Dialog.Toast(t.code_dec))})}}}}).call(this,a("c65b"))},"7ec8":function(t,s,a){"use strict";a.r(s);var i=function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"myTask"},[i("nav-bar",{attrs:{title:t.$t("task.default[0]")}}),i("div",{staticClass:"financial_list"},[i("van-tabs",{attrs:{ellipsis:!1,border:!1,color:"#4087f1",background:"rgba(0,0,0,0)","title-active-color":"#4087f1","title-inactive-color":"#666666","line-width":"60"},on:{change:t.changeTabs},model:{value:t.tabsIndex,callback:function(s){t.tabsIndex=s},expression:"tabsIndex"}},t._l(t.taskTabs,(function(s){return i("van-tab",{key:s.state,attrs:{title:s.text}},[i("van-pull-refresh",{on:{refresh:t.onRefresh},model:{value:t.isRefresh,callback:function(s){t.isRefresh=s},expression:"isRefresh"}},[i("van-list",{class:{Empty:!t.listData[t.tabsIndex].length},attrs:{finished:t.isFinished,"finished-text":t.listData[t.tabsIndex].length?t.$t("vanPull[0]"):t.$t("vanPull[1]")},on:{load:t.onLoad},model:{value:t.isLoad,callback:function(s){t.isLoad=s},expression:"isLoad"}},t._l(t.listData[t.tabsIndex],(function(s,a){return i("van-cell",{key:s.order_id,staticClass:"TaskItem",attrs:{"title-class":"record",border:!1}},[i("div",{staticClass:"items_list"},[i("div",{staticClass:"items"},[i("div",{staticClass:"imgWrap"},[i("img",{attrs:{src:s.cover_img}})]),i("div",{staticClass:"content"},[i("p",[t._v(t._s(s.title))]),i("div",{staticClass:"moneyNub"},[t._v(t._s(t.$t("task.default[6]"))+":"),i("span",{staticClass:"money"},[t._v(t._s(t.InitData.currency)+t._s(Number(s.reward_price)))])]),i("i",{staticClass:"website"},[t._v(t._s(s.group_info))])]),i("div",{staticClass:"status"},[t._v(t._s(s.vip_dec))])]),0==t.tabsIndex?i("div",{staticClass:"buttonWrap"},[i("span",{staticClass:"Submit",on:{click:function(i){return i.stopPropagation(),t.submitTaskBefo(s.order_id,a,s.status)}}},[t._v(t._s(t.$t("task.default[7]")))])]):t._e()])])})),1)],1)],1)})),1)],1),i("van-popup",{attrs:{round:"","get-container":"myTask",overlay:!1},model:{value:t.show,callback:function(s){t.show=s},expression:"show"}},[i("div",{staticClass:"wrapCon"},[i("div",{staticClass:"downloader"},[i("div",{staticClass:"downloading-progress"},[i("div",{ref:"progressBar",staticClass:"downloading-progress-bar",attrs:{"data-value":t.dataVal,"data-max":t.dataMax}})]),i("div",{staticClass:"percentage"},[t._v(t._s(t.text))])]),i("div",{staticClass:"shalou"},[i("img",{attrs:{src:a("3cb6"),alt:""}})])])]),i("Footer")],1)},e=[],n=a("7b31"),o=n["a"],l=(a("a738"),a("cba8")),r=Object(l["a"])(o,i,e,!1,null,"3e6e54ea",null);s["default"]=r.exports},9496:function(t,s,a){},a738:function(t,s,a){"use strict";a("9496")}}]);