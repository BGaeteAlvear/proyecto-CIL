CREATE TABLE wantcl_mantenedor.node_types
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description text,
    active tinyint(1) DEFAULT '1' NOT NULL,
    created_at timestamp,
    updated_at timestamp
);
INSERT INTO wantcl_mantenedor.node_types (name, description, active, created_at, updated_at) VALUES ('Abordados en los OA', null, 1, '2018-02-21 13:22:52', '2018-02-21 13:22:52');
INSERT INTO wantcl_mantenedor.node_types (name, description, active, created_at, updated_at) VALUES ('General', null, 1, '2018-02-21 13:22:59', '2018-02-21 13:22:59');