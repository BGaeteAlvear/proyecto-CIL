CREATE TABLE wantcl_mantenedor.users
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname varchar(255),
    lastname varchar(255),
    second_lastname varchar(255),
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    active tinyint(1) DEFAULT '1' NOT NULL,
    avatar varchar(255) DEFAULT 'public/avatars/user-default.png',
    remember_token varchar(100),
    role_id int(10) unsigned NOT NULL,
    created_at timestamp,
    updated_at timestamp,
    CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles (id)
);
CREATE UNIQUE INDEX users_email_unique ON wantcl_mantenedor.users (email);
CREATE INDEX users_role_id_foreign ON wantcl_mantenedor.users (role_id);
INSERT INTO wantcl_mantenedor.users (firstname, lastname, second_lastname, email, password, active, avatar, remember_token, role_id, created_at, updated_at) VALUES ('Constructor 1', 'Constructor', 'Constructor', 'c1@want.cl', '$2y$10$0c8xupZlg0D.1.fNvrbNcerlTQ9Vv2exAWs1r1141fjXfZkmvQVTC', 1, 'public/avatars/user-default.png', null, 3, '2018-02-21 14:12:12', '2018-02-21 14:12:21');
INSERT INTO wantcl_mantenedor.users (firstname, lastname, second_lastname, email, password, active, avatar, remember_token, role_id, created_at, updated_at) VALUES ('Constructor 2', 'Constructor', 'Constructor', 'c2@want.cl', '$2y$10$xW73u9qW/2mXXoWURouacu8AnHR24/aoBGnxfTZVOf4u6WptWzsai', 1, 'public/avatars/user-default.png', null, 3, '2018-02-21 14:12:47', '2018-02-21 14:14:15');
INSERT INTO wantcl_mantenedor.users (firstname, lastname, second_lastname, email, password, active, avatar, remember_token, role_id, created_at, updated_at) VALUES ('Constructor 3', null, null, 'c3@want.cl', '$2y$10$57FZ4tPVa2/L/xKYtvSoLebCi3vSXyeqEyJ/1cvIfeW3wgEiKML8S', 1, 'public/avatars/user-default.png', null, 3, '2018-02-21 14:13:10', '2018-02-21 14:13:10');
INSERT INTO wantcl_mantenedor.users (firstname, lastname, second_lastname, email, password, active, avatar, remember_token, role_id, created_at, updated_at) VALUES ('Administrador 1', 'Admin', 'Admin', 'a1@want.cl', '$2y$10$MZTKPC2cLgL.0.Spe26D5O8fu2JDwWeX1.U1Zw2BSYlCMwCppvJKy', 1, 'public/avatars/user-default.png', null, 1, '2018-02-21 14:13:39', '2018-02-21 14:13:39');
INSERT INTO wantcl_mantenedor.users (firstname, lastname, second_lastname, email, password, active, avatar, remember_token, role_id, created_at, updated_at) VALUES ('Validador 1', null, null, 'v1@want.cl', '$2y$10$6.vQu.ZGtG5Ezaf/HxJuOO0p/K8oULf9rRUA1CWjvc9X69o/dTVS2', 1, 'public/avatars/user-default.png', null, 2, '2018-02-21 14:13:56', '2018-02-21 14:13:56');