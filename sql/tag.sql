CREATE TABLE `tag` (
  `id` int(10) NOT NULL auto_increment COMMENT '文章ID',
  `name` VARCHAR (50) NOT NULL COMMENT '标签名',
  `frequency` int(11) NOT NULL DEFAULT '' COMMENT '引用次数',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;