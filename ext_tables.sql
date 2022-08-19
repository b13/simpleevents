CREATE TABLE tx_simpleevents_domain_model_event (
  title tinytext,
  description text,
  eventstart int(11) DEFAULT '0' NOT NULL,
  eventend int(11) DEFAULT '0' NOT NULL,
  categories int(11) DEFAULT '0' NOT NULL,
  location tinytext,
  audience tinytext,
  url tinytext
);
