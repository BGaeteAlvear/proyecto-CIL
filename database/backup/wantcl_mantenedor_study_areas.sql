CREATE TABLE wantcl_mantenedor.study_areas
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description text,
    active tinyint(1) DEFAULT '1' NOT NULL,
    created_at timestamp,
    updated_at timestamp
);
INSERT INTO wantcl_mantenedor.study_areas (name, description, active, created_at, updated_at) VALUES ('Biología', null, 1, '2018-02-21 13:25:24', '2018-02-21 13:25:24');
INSERT INTO wantcl_mantenedor.study_areas (name, description, active, created_at, updated_at) VALUES ('Química', null, 1, '2018-02-21 13:25:32', '2018-02-21 13:25:32');
INSERT INTO wantcl_mantenedor.study_areas (name, description, active, created_at, updated_at) VALUES ('Física', null, 1, '2018-02-21 13:25:38', '2018-02-21 13:25:38');
INSERT INTO wantcl_mantenedor.study_areas (name, description, active, created_at, updated_at) VALUES ('Global', null, 1, '2018-02-21 13:25:46', '2018-02-21 13:25:46');