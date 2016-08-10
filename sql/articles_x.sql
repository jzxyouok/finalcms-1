CREATE TABLE `articles_x` (
  `id` bigint(20) NOT NULL COMMENT '文章ID',
  `cateid` int(11) NOT NULL COMMENT '文章分类ID',
  `topid` int(11) NOT NULL COMMENT '文章顶级分类ID',
  `cate_arr_id` varchar (255) NOT NULL COMMENT '文章所属分类ID,下划线_连接',
  `table_id` int(11) NOT NULL COMMENT '内容表分表ID',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;