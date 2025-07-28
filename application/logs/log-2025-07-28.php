<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-07-28 11:26:59 --> Query error: Table 'webdoanh_demobanhang.shops' doesn't exist - Invalid query: SELECT `shops`.*, `shops_rows`.`product_price` as `price`, `shops_cat`.`alias` as `cat_alias`, `shops_cat`.`name` as `cat_name`, `users`.`full_name` as `full_name`
FROM `shops`
LEFT JOIN `shops_cat` ON `shops_cat`.`id` = `shops`.`listcatid`
LEFT JOIN `users` ON `users`.`userid` = `shops`.`user_id`
WHERE `shops`.`is_featured` = 1
ORDER BY `shops`.`id` DESC
 LIMIT 6
ERROR - 2025-07-28 11:26:59 --> Severity: Error --> Call to a member function result_array() on boolean C:\TTDN_Xtech789\sample_BACK_END\Backend_PHP_5_BanHang\Xtech789_kholanh\application\modules\shops\models\M_shops.php 94
ERROR - 2025-07-28 11:27:12 --> Query error: Table 'webdoanh_demobanhang.shops' doesn't exist - Invalid query: SELECT `shops`.*, `shops_rows`.`product_price` as `price`, `shops_cat`.`alias` as `cat_alias`, `shops_cat`.`name` as `cat_name`, `users`.`full_name` as `full_name`
FROM `shops`
LEFT JOIN `shops_cat` ON `shops_cat`.`id` = `shops`.`listcatid`
LEFT JOIN `users` ON `users`.`userid` = `shops`.`user_id`
WHERE `shops`.`is_featured` = 1
ORDER BY `shops`.`id` DESC
 LIMIT 6
ERROR - 2025-07-28 11:27:12 --> Severity: Error --> Call to a member function result_array() on boolean C:\TTDN_Xtech789\sample_BACK_END\Backend_PHP_5_BanHang\Xtech789_kholanh\application\modules\shops\models\M_shops.php 94
