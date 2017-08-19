JD项目
====
## data-php文件存放
* ### index.js
 1. 用户登录 jd_login.php
 2. 跳页功能 productlist.php
```php
$offset=($pageno-1)*8;
$sql ="SELECT * FROM jd_product";
$sql .=" LIMIT $offset,8"; //从什么开始,页数
```
	
 3. 初始化页数 totalpage.php
 4. 将商品添加至购物车 addcart.php <br>
 查询是否有指定记录，如果存在更新数量 如果不存在添加
 * ### cart.js
 5. 查询购物车中信息 cart.php
 ```php
 $sql = " SELECT c.cid,p.pname,p.pic";
 $sql .= " ,p.price,c.count";
 $sql .= " FROM jd_cart c,jd_product p";
 $sql .= " WHERE c.pid=p.pid AND uid=$uid";
 ```
 6. 删除购物车中一条记录 del_cart.php
 7. 更新购物车中一条记录 update_cart.php