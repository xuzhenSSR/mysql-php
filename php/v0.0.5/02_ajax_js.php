<?php
  //js
  //功能:读取客户端浏览器首选语言
  //如果英文 hello
  //如果中文 你好
  //其它     hello
  //1:修改响应数据格式js
  header("Content-Type:application/javascript;charset=utf-8");
  //2:读取所有请求消息头  11:01--11:06
  $lists = getallheaders();
  //var_dump($lists);
  //3:获取首选语言
  $lang = $lists["Accept-Language"];
  //4:截取字符串  $str = substr($lang,0,2);
  $str = substr($lang,0,2);//en zh
  //5:判断 英文 中文  休息一会
  if($str==="en"){
    echo "alert('hello')";
  }else if($str =='zh'){
    echo "alert('你好')";
  }else{
    echo "alert('hello')";
  }
  //6:输出

  //错误集锦
  //Uncaught SyntaxError: Unexpected token <
  //显示html错误
  //php错误
  //解决方法:在地址栏调用php
?>