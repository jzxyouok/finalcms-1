CREATE TABLE `articles_b_x` (
  `id` bigint(20) NOT NULL COMMENT '文章ID',
  `title` varchar(150) NOT NULL COMMENT '文章标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '文章关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '文章描述',
	`content` MEDIUMTEXT COMMENT '文章内容',
	`cover_img` MEDIUMTEXT COMMENT '文章封面',
	`photo_list` MEDIUMTEXT COMMENT '文章图集',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;