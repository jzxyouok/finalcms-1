CREATE TABLE `category` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '��ID',
  `arr_parent_id` varchar(255) NOT NULL COMMENT '���и�id',
  `has_child` tinyint(1) NOT NULL DEFAULT '0' COMMENT '�Ƿ��������Ŀ��1����',
  `name` varchar(30) NOT NULL COMMENT '��������',
  `listorder` mediumint(5) NOT NULL DEFAULT '0' COMMENT '����',
	`type` tinyint(1) NOT NULL COMMENT '��Ŀ���ͣ�1=�����б���Ŀ 2=Ƶ������ 3=�ⲿ����',
	`urlpath` varchar(255) NOT NULL COMMENT 'URL·���������ⲿ����',
	`template_index` varchar(255) NOT NULL COMMENT 'Ƶ������ҳģ��',
	`template_list` varchar(255) NOT NULL COMMENT '�б�ҳģ��',
	`template_article` varchar(255) NOT NULL COMMENT '����ҳģ��',
	`modelid` smallint(5) NOT NULL COMMENT '��Ŀģ�ͣ���model��',
	`image` varchar(100) NOT NULL DEFAULT '' COMMENT '��ĿͼƬ',
	`meta_description` char(255) NOT NULL DEFAULT '' COMMENT '��Ŀdescription',
  `meta_keywords` varchar(125) NOT NULL DEFAULT '' COMMENT '��Ŀkeywords',
  `meta_title` varchar(125) NOT NULL DEFAULT '' COMMENT '��Ŀtitle',
	`setting` text NOT NULL COMMENT '��������',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`id`),
  KEY `arr_parent_id` (`arr_parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�����';