CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filetype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docaccess` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sparentids` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samids` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spartids` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scollectifids` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `parametre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `column_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dispaly` tinyint(1) NOT NULL,
  `allow_update` tinyint(1) NOT NULL,
  `allow_insert` tinyint(1) NOT NULL,
  `allow_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `listparams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `para_colection` longtext COLLATE utf8_unicode_ci,
  `usertype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `listes_parametres` (
  `listparams_id` int(11) NOT NULL,
  `parametre_id` int(11) NOT NULL,
  PRIMARY KEY (`listparams_id`,`parametre_id`),
  KEY `IDX_7D77C3706331BC0F` (`listparams_id`),
  KEY `IDX_7D77C3706358FF62` (`parametre_id`),
  CONSTRAINT `FK_7D77C3706331BC0F` FOREIGN KEY (`listparams_id`) REFERENCES `listparams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7D77C3706358FF62` FOREIGN KEY (`parametre_id`) REFERENCES `parametre` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `parametre` ( `usertype`, `column_title`, `description`, `dispaly`, `allow_update`, `allow_insert`, `allow_delete`) VALUES
	('parent', 'pr_infogenerales', 'parent : Informations générales', 1, 1, 0, 0),
	('parent', 'pr_respo1', 'parent : Responsable 1', 1, 1, 0, 0),
	('parent', 'pr_respo2', 'parent : Responsable 2', 1, 1, 0, 0),
	('parent', 'pr_enfants', 'parent : Enfants', 1, 1, 0, 0),
	('parent', 'pr_enfant_am', 'parent : liaisons enfants - assmats', 1, 1, 0, 1),
	('parent', 'pr_agenda', 'parent : Agenda des temps collectifs', 1, 0, 1, 0),
	('parent', 'pr_agenda_enfants', 'parent : Agenda des temps collectifs des enfants', 0, 0, 0, 0),
	('parent', 'pr_agenda_insc', 'parent : Agenda Liste des inscriptions', 1, 0, 0, 0),
	('parent', 'pr_downlond_doc', 'parent : Téléchargement des documents', 1, 0, 0, 0),
	( 'assmat', 'am_infogenerales', '', 1, 1, 0, 0),
	( 'assmat', 'am_agrements', '', 1, 1, 0, 1),
	( 'assmat', 'am_mesenfant_am', '', 1, 1, 0, 0),
	( 'assmat', 'am_enfant_am', '', 1, 1, 0, 1),
	( 'assmat', 'am_agenda', '', 1, 0, 1, 0),
	( 'assmat', 'am_agenda_enfants', '', 0, 0, 1, 0),
	( 'assmat', 'am_agenda_insc', '', 1, 0, 0, 0),
	( 'assmat', 'am_downlond_doc', '', 1, 0, 0, 0),
	( 'parent', 'pr_infogenerales', '', 1, 0, 0, 0),
	( 'parent', 'pr_respo1', '', 1, 0, 0, 0),
	( 'parent', 'pr_respo2', '', 1, 0, 0, 0),
	( 'parent', 'pr_enfants', '', 1, 0, 0, 0),
	( 'parent', 'pr_enfant_am', '', 1, 0, 0, 0),
	( 'parent', 'pr_agenda', '', 1, 0, 0, 0),
	( 'parent', 'pr_agenda_enfants', '', 0, 0, 0, 0),
	( 'parent', 'pr_agenda_insc', '', 1, 0, 0, 0),
	( 'parent', 'pr_downlond_doc', '', 1, 0, 0, 0),
	( 'assmat', 'am_infogenerales', '', 1, 0, 0, 0),
	( 'assmat', 'am_agrements', '', 1, 0, 0, 0),
	( 'assmat', 'am_mesenfant_am', '', 1, 0, 0, 0),
	( 'assmat', 'am_enfant_am', '', 1, 0, 0, 0),
	( 'assmat', 'am_agenda', '', 1, 0, 0, 0),
	( 'assmat', 'am_agenda_enfants', '', 0, 0, 0, 0),
	( 'assmat', 'am_agenda_insc', '', 1, 0, 0, 0),
	( 'assmat', 'am_downlond_doc', '', 1, 0, 0, 0);
CREATE TABLE IF NOT EXISTS `ppf_cofig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commant` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3920FSDQSDQDQSD` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ppf_cofig` ( `title`, `value`, `commant`) VALUES
	( 'para_list_id_parents', '1', 'list des parametrage predefiner des parents '),
	( 'para_list_id_assmats', '2', 'list des parametrage predefiner des assmats'),
	( 'ppf_default_email', 'gramweb-ppf@liger-cd.com', 'email (from) par defaut'),
	( 'index-url', NULL, NULL);

CREATE TABLE IF NOT EXISTS `update_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_gw_id` int(11) DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `champ_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `statu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commante` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `user_ra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `user_gw_id` int(11) DEFAULT NULL,
  `p_a_pt_id` int(11) DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userkey` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listparams_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7E32EC80C05FB297` (`confirmation_token`),
  KEY `FK_7E32EC806331BC0F` (`listparams_id`),
  CONSTRAINT `FK_7E32EC806331BC0F` FOREIGN KEY (`listparams_id`) REFERENCES `listparams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `users_parametres` (
  `user_ra_id` int(11) NOT NULL,
  `parametre_id` int(11) NOT NULL,
  PRIMARY KEY (`user_ra_id`,`parametre_id`),
  KEY `IDX_CD12D609BD6833AE` (`user_ra_id`),
  KEY `IDX_CD12D6096358FF62` (`parametre_id`),
  CONSTRAINT `FK_CD12D6096358FF62` FOREIGN KEY (`parametre_id`) REFERENCES `parametre` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_CD12D609BD6833AE` FOREIGN KEY (`user_ra_id`) REFERENCES `user_ra` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_ra` ( `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `user_gw_id`, `p_a_pt_id`, `usertype`, `userkey`, `listparams_id`) VALUES
	( 'admin', 'admin', 'test.rabah@liger-cd.com', 'test.rabah@liger-cd.com', 1, NULL, '$2y$13$7VnhOr1LL/bIj8at0FlM.OLYJUjbYJONTyb/3iTrxULzf7o0JURem', '2017-11-09 15:43:27', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 1, 0, 'admin', 'liger69*', NULL)
	
