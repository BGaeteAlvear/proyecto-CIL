CREATE TABLE wantcl_mantenedor.concretisms
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description text,
    active tinyint(1) DEFAULT '1' NOT NULL,
    created_at timestamp,
    updated_at timestamp
);
INSERT INTO wantcl_mantenedor.concretisms (name, description, active, created_at, updated_at) VALUES ('Concreto', null, 1, '2018-02-21 13:27:49', '2018-02-21 13:27:49');
INSERT INTO wantcl_mantenedor.concretisms (name, description, active, created_at, updated_at) VALUES ('Abstracto', null, 1, '2018-02-21 13:27:56', '2018-02-21 13:27:56');