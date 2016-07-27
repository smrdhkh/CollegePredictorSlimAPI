CREATE TABLE IF NOT EXISTS `tb_order` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `client_id` varchar(100) DEFAULT NULL,
  `sts` varchar(1000) NOT NULL,
  `cost`  varchar(1000) NOT NULL,
  `orderlist` varchar(10000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `ordertime` varchar(100) NOT NULL,
  `guest_email` varchar(100) DEFAULT NULL
);
