CREATE TABLE wantcl_mantenedor.vertices
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    definition text,
    active tinyint(1) DEFAULT '1' NOT NULL,
    created_at timestamp,
    updated_at timestamp
);