CREATE TABLE `allposts` (
  `id` bigint(20) NOT NULL COMMENT '文章ID',
  `cateid` int(11) NOT NULL COMMENT '文章分类ID',
  `topid` int(11) NOT NULL COMMENT '文章顶级分类ID',
  `table_id` int(11) NOT NULL COMMENT '内容表分表ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;