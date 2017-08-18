CREATE DATABASE sohu CHARSET=UTF8;
USE sohu;
CREATE TABLE user(
  uid   INT PRIMARY KEY AUTO_INCREMENT,
  uname VARCHAR(20),
  upwd  VARCHAR(32)
);
INSERT INTO user VALUES(null,'tom','123');
INSERT INTO user VALUES(null,'jerry','123');
INSERT INTO user VALUES(null,'james','123');

