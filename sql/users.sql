CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '�û�ID',
  `password_hash` varchar(255) NOT NULL COMMENT '����hash',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '��������token',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '����',
  `mobile` char(13) NOT NULL  DEFAULT '' COMMENT '�ֻ�',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '�û�״̬',
  `created_at` int(11) NOT NULL COMMENT '����ʱ��',
  `updated_at` int(11) NOT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�û���';