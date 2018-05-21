CREATE TABLE wantcl_mantenedor.roles
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description text,
    created_at timestamp,
    updated_at timestamp
);
INSERT INTO wantcl_mantenedor.roles (name, description, created_at, updated_at) VALUES ('Administrador', null, '2018-02-21 14:10:45', '2018-02-21 14:10:45');
INSERT INTO wantcl_mantenedor.roles (name, description, created_at, updated_at) VALUES ('Validador', null, '2018-02-21 14:11:06', '2018-02-21 14:11:06');
INSERT INTO wantcl_mantenedor.roles (name, description, created_at, updated_at) VALUES ('Constructor', null, '2018-02-21 14:11:23', '2018-02-21 14:11:23');