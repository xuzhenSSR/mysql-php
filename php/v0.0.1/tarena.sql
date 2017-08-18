CREATE DATABASE tarena CHARSET=UTF8;
USE tarena;
CREATE TABLE msg(
 mid	INT PRIMARY KEY AUTO_INCREMENT,
 uname	VARCHAR(20),
 phone	VARCHAR(25),
 pubtime DATETIME,
 content VARCHAR(300)
);
INSERT INTO msg VALUES(null,'','',now(),'');

#PRIMARY KEY AUTO_INCREMENT 主键自增长
#主键:mid列不能为空不能重复
#自增长: mid列 1 2 3 4 null
#(0086)13999999999