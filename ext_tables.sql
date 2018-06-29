CREATE TABLE tx_simpleevents_domain_model_event (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  createdon int(11) unsigned DEFAULT '0' NOT NULL,
  createdby int(11) unsigned DEFAULT '0' NOT NULL,
  updatedon int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  description text,
  eventstart int(11) DEFAULT '0' NOT NULL,
  eventend int(11) DEFAULT '0' NOT NULL,
  categories int(11) DEFAULT '0' NOT NULL,
  location tinytext,
  audience tinytext,
  url tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid)
);
