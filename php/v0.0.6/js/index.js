//功能点一:用户登录
//alert(1);
//16:30--16:40
var loginName = "";
var loginUid = "";
//1:获取登录按钮绑定点击事件
$("#bt-login").click(function(){
 //2:获取用户名和密码
 var u=$("[name='uname']").val();
 var p=$("[name='upwd']").val();
 //alert(u+":"+p);
 //3:发送ajax请求
 $.ajax({
   type:"POST",
   url:"data/jd_login.php",
   data:{uname:u,upwd:p},
   success:function(data){
     if(data.code>0){
      //登录成功
      $(".modal").hide();
      //将用户名和用户编号保存全局变量
      loginName = u;
      loginUid = data.uid;
     }else{
      $("p.alert").html(data.msg) 
     }
   },
   error:function(){
     alert("网络连接错误，请检查");
   }
 });
 //4:返回返回数据并且判断
 //5:隐藏/显示错误
});


//将发送AJAX请求,接收返回数据
//接字符串
//pageno第几页
function page(pageno){
  //1:发送ajax请示获取当前页面中商品列表
  $.ajax({
    type:"GET",
    url:"data/productlist.php",
    data:{pageno:pageno},
    success:function(data){
      //拼字符串
      var html = "";
      $.each(data,function(idx,obj){
        html += `
<li>
<a href=""><img src="${obj.pic}" alt=""/></a>
<p>￥${obj.price}</p>
<h1><a href="">${obj.pname}</a></h1>
<div>
<a href="" class="contrast"><i></i>对比</a>
<a href="" class="p-operate"><i></i>关注</a>
<a href="${obj.pid}" class="addcart"><i></i>加入购物车</a>
</div>
</li>
        `;
      });
      $("#plist ul").html(html);

    },
    error:function(data){}
  });




  //2:再次发送一个ajax请示获取总记录数
  //data/totalpage.php 发送总页数
  //'{"page":36}'
  $.ajax({
    url:"data/totalpage.php",
    success:function(data){
      var recound = data.page;
      var p = Math.ceil(recound/8);
      //拼字符串 1 2 3 4
      var html="";
      for(var i=1;i<=p;i++){
        html += `
        <li><a href="#">${i}</a></li>  
        `;
      }
      $("ol.pager").html(html);
    },
    error:function(){}
  });

}
page(1);
//功能点三:为页码添加点击事件
//后续需要重新修改
$("ol.pager").on("click","a",function(e){
  e.preventDefault();
  page($(this).html());
});



//功能点四:
//将商品添加至购物车
//1:获取“添加至购物车按钮”  动态添加元素必须事件代理
//2:绑定点击事件
$("#plist").on("click","a.addcart",function(e){
 e.preventDefault();
 //3:获取uid pid
 var u = loginUid;
 var p = $(this).attr("href");
 //4:发送ajax
 $.ajax({
   url:"data/addcart.php",
   data:{uid:u,pid:p},
   success:function(data){
     alert(data.msg);
   },
   error:function(){
     alert("网络故障，请检查");
   }
 });
 //5:并且接收返回数据 

});









//错误集锦:
//1:网络出错
//  99% json 拼写错误
//  1%  404  url:"data/jd_login.php"


//2: index.js
//alert(0)
//function page(pageno){}
//page(2)
//缓存造成结果
//禁用缓存
//[*] Disable cache







