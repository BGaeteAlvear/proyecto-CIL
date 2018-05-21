CREATE TABLE wantcl_mantenedor.password_resets
(
    email varchar(255) NOT NULL,
    token varchar(255) NOT NULL,
    created_at timestamp
);
CREATE INDEX password_resets_email_index ON wantcl_mantenedor.password_resets (email);