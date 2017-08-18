#1:设计表
#a:查看网页上数据记录/分类
#8万
#15万
#30万
#suv
#1:创建库 huimaiche
CREATE DATABASE huimaiche CHARSET=UTF8;
#2:进入库 14:50--15:00
USE huimaiche;
#3:创建表并且添加8辆汽车信息/四个类别
#汽车信息表:
#a:汽车编号          汽车编号
#b:长安cs75          汽车名称
#c:1.jpg             汽车图片
#d:75000  价格       汽车价格
#e:正在买车人数      购买人数
#f:tid               汽车类别编号
CREATE TABLE car(
  cid				INT PRIMARY KEY AUTO_INCREMENT,
	cname			VARCHAR(50),
	cpic			VARCHAR(300),
	cprice		DOUBLE(10,2),
	buycount	BIGINT,
	tid				INT
);
INSERT INTO car VALUES(null,'qq1','1.jpg',21000,10,1);
INSERT INTO car VALUES(null,'qq2','2.jpg',22000,10,1);
INSERT INTO car VALUES(null,'qq3','3.jpg',23000,10,1);
INSERT INTO car VALUES(null,'qq4','4.jpg',24000,10,1);
INSERT INTO car VALUES(null,'qq5','5.jpg',25000,10,1);
INSERT INTO car VALUES(null,'qq6','6.jpg',26000,10,1);
INSERT INTO car VALUES(null,'qq7','7.jpg',27000,10,1);
INSERT INTO car VALUES(null,'qq8','8.jpg',28000,10,1);


#汽车类别表:
#a:汽车类别编号      tid
#b:汽车类别名        lt8 lt15 lt30 suv
CREATE TABLE cartype(
  tid INT PRIMARY KEY AUTO_INCREMENT,
	tname  VARCHAR(20)
);
INSERT INTO cartype VALUES(NULL,'lt8');
INSERT INTO cartype VALUES(NULL,'lt15');
INSERT INTO cartype VALUES(NULL,'lt30');
INSERT INTO cartype VALUES(NULL,'suv');
