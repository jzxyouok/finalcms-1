CREATE TABLE `models` (
  `id` smallint(5) NOT NULL auto_increment,
  `name` char(30) NOT NULL COMMENT '模型名称',
  `description` char(100) NOT NULL COMMENT '模型描述',
  `tablename` char(30) NOT NULL COMMENT '表名',
  `template_index` char(30) NOT NULL COMMENT '封面模板',
  `template_list` char(30) NOT NULL COMMENT '列表页模板',
  `template_article` char(30) NOT NULL COMMENT '文章页模板',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `models`
--

INSERT INTO `models` VALUES (1, '文章模型', '', 'articles', 'index_article', 'list_article', 'article_article', 0);
INSERT INTO `models` VALUES (2, '图片模型', '', 'pictures', 'index_picture', 'list_picture', 'article_picture', 0);
