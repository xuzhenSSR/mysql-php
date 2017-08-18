<?php
 //功能:查询所有留言并且按表格输出
 //1:创建连接并且设置编码
 require("init.php");
 //2:创建SQL语句并且发送SQL
 $sql = "SELECT * FROM msg";
 $result = mysqli_query($conn,$sql);
 //3:抓取多行记录
 $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<table width="90%" border="1">
  <thead>
    <tr>
	  <td>编号</td>
	  <td>发表人</td>
	  <td>时间</td>
	  <td>操作</td>
	</tr>
  </thead>
  <tbody id="tb1">
   <?php
     foreach($rows as $k=>$v){
	   echo "<tr>";
	   echo "<td>$v[mid]</td>";
	   echo "<td>$v[uname]</td>";
	   echo "<td>$v[pubtime]</td>";
	   echo "<td>";
	   echo "<a href='$v[mid]' class='btn-del'>删除</a>";
	   echo "</td>";
	   echo "</tr>";
	 } 
   ?>
  </tbody>
</table>
<script>
   //1:获取父元素绑定点击事件
   var tb1 = document.getElementById("tb1");
   tb1.onclick = function(e){
    //2:获取当前目标对象
    var target = e.target;
    //3:阻止默认行为
    e.preventDefault();
    if(target.className=="btn-del"){
     //console.log(target);
     //4:获取留言编号
	 var mid = target.getAttribute("href");
     //5:设置确认框
	 var rs = window.confirm("您是否要删除该记录");
	 if(rs===true){
      //6:自动跳转完成删除操作
	  location.href = "msg_del.php?mid="+mid;
	 }
	}
   }
</script>

