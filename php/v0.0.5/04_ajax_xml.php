<?php
  //1:修改响应数据格式xml 文档片段
  header("Content-Type:application/xml;charset=utf-8");
  $html = "";
  $html .= '<?xml version="1.0" encoding="utf-8"?>';
  $html .="<books>";
  $html .="<book>js大全</book>";
  $html .="<book>js指南</book>";
  $html .="<book>js专家指南</book>";
  $html .="</books>";
  echo $html;
?>