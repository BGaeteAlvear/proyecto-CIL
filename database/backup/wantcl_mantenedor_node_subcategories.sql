CREATE TABLE wantcl_mantenedor.node_subcategories
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    active tinyint(1) DEFAULT '1' NOT NULL,
    category_id int(10) unsigned,
    created_at timestamp,
    updated_at timestamp,
    CONSTRAINT node_subcategories_category_id_foreign FOREIGN KEY (category_id) REFERENCES node_categories (id) ON DELETE SET NULL
);
CREATE INDEX node_subcategories_category_id_foreign ON wantcl_mantenedor.node_subcategories (category_id);
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Reino', 1, 2, '2018-02-21 13:30:31', '2018-02-21 13:30:31');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Filo', 1, 2, '2018-02-21 13:30:46', '2018-02-21 13:30:46');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Clase', 1, 2, '2018-02-21 13:30:47', '2018-02-21 13:30:47');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Orden', 1, 2, '2018-02-21 13:32:26', '2018-02-21 13:32:26');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Familia', 1, 2, '2018-02-21 13:32:38', '2018-02-21 13:32:38');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Género', 1, 2, '2018-02-21 13:33:16', '2018-02-21 13:33:16');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Especie', 1, 2, '2018-02-21 13:33:25', '2018-02-21 13:33:25');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Magnitud', 1, 5, '2018-02-21 13:34:06', '2018-02-21 13:34:06');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Unidad de Medida', 1, 5, '2018-02-21 13:34:33', '2018-02-21 13:34:33');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Clasificación Materia', 1, 5, '2018-02-21 13:34:49', '2018-02-21 13:34:49');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Materia Macro', 1, 5, '2018-02-21 13:35:00', '2018-02-21 13:35:00');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Materia Micro', 1, 5, '2018-02-21 13:35:21', '2018-02-21 13:35:21');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Estructuras', 1, 6, '2018-02-21 13:35:39', '2018-02-21 13:35:39');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Adaptaciones', 1, 6, '2018-02-21 13:35:53', '2018-02-21 13:35:53');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Fecha de Nacimiento', 1, 3, '2018-02-21 13:36:22', '2018-02-21 13:36:22');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Fecha de Defunción', 1, 3, '2018-02-21 13:36:37', '2018-02-21 13:36:37');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Sexo', 1, 3, '2018-02-21 13:36:47', '2018-02-21 13:36:47');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Profesión / Oficio', 1, 3, '2018-02-21 13:37:03', '2018-02-21 13:37:03');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Lugar Vive', 1, 3, '2018-02-21 13:37:28', '2018-02-21 13:37:28');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Nacio en', 1, 3, '2018-02-21 13:37:39', '2018-02-21 13:37:39');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Categoría Concepto', 1, 4, '2018-02-21 13:37:52', '2018-02-21 13:37:52');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Material Instrumento de Laboratorio', 1, 7, '2018-02-21 13:38:34', '2018-02-21 13:38:34');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Herramienta', 1, 7, '2018-02-21 13:38:43', '2018-02-21 13:38:43');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Objeto', 1, 7, '2018-02-21 13:39:02', '2018-02-21 13:39:02');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Lugar', 1, 9, '2018-02-21 13:39:12', '2018-02-21 13:39:12');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Fecha', 1, 9, '2018-02-21 13:39:27', '2018-02-21 13:39:27');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Tipo Fenómeno', 1, 1, '2018-02-21 13:39:43', '2018-02-21 13:39:43');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Tipo Medición', 1, 1, '2018-02-21 13:39:56', '2018-02-21 13:39:56');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Clasificación Fenómeno', 1, 1, '2018-02-21 13:40:15', '2018-02-21 13:40:15');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Tiempo Fenómeno', 1, 1, '2018-02-21 13:40:33', '2018-02-21 13:40:33');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Duración Fenómeno', 1, 1, '2018-02-21 13:40:48', '2018-02-21 13:40:48');
INSERT INTO wantcl_mantenedor.node_subcategories (name, active, category_id, created_at, updated_at) VALUES ('Donde Ocurre', 1, 1, '2018-02-21 13:41:01', '2018-02-21 13:41:01');