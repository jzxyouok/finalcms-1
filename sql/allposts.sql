CREATE TABLE `allposts` (
  `id` bigint(20) NOT NULL COMMENT '文章ID',
  `cateid` int(11) NOT NULL COMMENT '文章分类ID',
  `second_cate_id` int(11) NOT NULL COMMENT '文章二级分类ID',
  `table_id` int(11) NOT NULL COMMENT '内容表分表ID',
  `cate_arr_id` varchar (255) NOT NULL COMMENT '文章所属分类ID,下划线_连接',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;