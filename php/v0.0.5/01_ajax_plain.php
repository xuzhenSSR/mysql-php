<?php
  //服务器端发送纯文本数据
  //1:修改响应头格式为纯文本 header()
  header("Content-Type:text/plain;charset=utf-8");
  //2:发送
  echo "hello ajax";
?>