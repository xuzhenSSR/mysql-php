
//功能点五:查询购物车中信息
//1:发送 ajax请求并且获取返回数据
//14:50--15:00
$.ajax({
  url:"data/cart.php",
  data:{uid:1},
  success:function(data){
    var html = "";
    $.each(data,function(idx,obj){
       html += `
<tr>
<td>
<input type="checkbox"/>
<input type="hidden" value="1" />
<div><img src="${obj.pic}" alt=""/></div>
</td>
<td><a href="">${obj.pname}</a></td>
<td>${obj.price}</td>
<td>
<button class="${obj.cid}">-</button>
<input type="text" value="${obj.count}"/>
<button class="${obj.cid}">+</button>
</td>
<td><span>${obj.price*obj.count}</span></td>
<td>
         <a href="${obj.cid}" 
         class="btn-del">删除</a></td>
</tr>           
       `;
    });  //15:30--15:40
    $("#cart tbody").html(html);
  }
});



//功能点六:删除购物车中一条记录
//1:获取所有删除按钮
//2:绑定点击事件
$("#cart tbody").on("click","a.btn-del",
function(e){
//3:阻止事件默认行为 16:30--16:40
e.preventDefault();
//4:获取当前购物车编号 cid
var cid = $(this).attr("href");
//4.1:获取当前行
var tr = $(this).parents("tr");
var rs = window.confirm("是否删除");
if(!rs){
  return;
}
//5:发送ajax
$.ajax({
   url:"data/del_cart.php",
   data:{cid:cid},
   success:function(data){
      if(data.code>0){
          tr.remove();
      }
   }
});
//6:删除当前行
});


//功能点七:更新购物车中一条记录 +
//1:获取所有+按钮
//2:绑定点击事件
$("#cart tbody").on("click",
  "button:contains('+')",function(e){
 //3:获取当前购物项编号cid
 var cid = $(this).attr("class");
 //4:发送ajax
 var that = this;

 $.ajax({
   url:"data/update_cart.php",
   data:{cid:cid},
   success:function(data){
      //console.log(data);
      //5:更新 
      var input = $(that).prev();
      var v = parseInt(input.val())+1;
      input.val(v);

      // 小计
      // 获取单价
      var priceI = $(that).parent().prev().text();
      // 小计
      var td = $(that).parent().next();

      var rs = v*priceI;
      td.html(`<span>${rs}</span>`);
   },
   error:function(){
     alert("网络故障");
   }
 });

});









//二个通常功能
//1:删除之前一定'询问'
//2:查询之前一定排序 pname
