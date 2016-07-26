CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `password_hash` varchar(255) NOT NULL COMMENT '密码hash',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '密码重置token',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(13) NOT NULL  DEFAULT '' COMMENT '手机',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '用户状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';