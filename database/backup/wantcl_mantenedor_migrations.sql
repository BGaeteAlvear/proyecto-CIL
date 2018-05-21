CREATE TABLE wantcl_mantenedor.migrations
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    migration varchar(255) NOT NULL,
    batch int(11) NOT NULL
);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2013_02_05_193836_create_roles_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_05_194245_create_nodes_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_05_194352_create_node_categories_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_05_194432_create_study_areas_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_05_194449_create_node_types_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_05_194449_create_vertices_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_13_130223_create_concretisms_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_13_130429_create_node_subcategories_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_13_130745_create_learning_objetives_table', 1);
INSERT INTO wantcl_mantenedor.migrations (migration, batch) VALUES ('2018_02_13_131100_create_general_objetives_table', 1);