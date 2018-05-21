CREATE TABLE wantcl_mantenedor.node_categories
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description text,
    active tinyint(1) DEFAULT '1' NOT NULL,
    created_at timestamp,
    updated_at timestamp
);
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Fenómeno Natural', null, 1, '2018-02-21 13:23:18', '2018-02-21 13:23:18');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Ser Vivo', null, 1, '2018-02-21 13:23:24', '2018-02-21 13:23:24');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Persona', null, 1, '2018-02-21 13:23:34', '2018-02-21 13:23:42');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Conceptos', null, 1, '2018-02-21 13:23:50', '2018-02-21 13:23:50');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Materia', null, 1, '2018-02-21 13:23:56', '2018-02-21 13:23:56');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Cuerpo Seres Vivos', null, 1, '2018-02-21 13:24:04', '2018-02-21 13:24:04');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Objeto o Instrumento', null, 1, '2018-02-21 13:24:31', '2018-02-21 13:24:31');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Salud y Enfermedades', null, 1, '2018-02-21 13:24:40', '2018-02-21 13:24:40');
INSERT INTO wantcl_mantenedor.node_categories (name, description, active, created_at, updated_at) VALUES ('Eventos', null, 1, '2018-02-21 13:24:46', '2018-02-21 13:24:46');