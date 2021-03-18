CREATE DATABASE IF NOT EXISTS maniank;
USE maniank;

CREATE TABLE users(
id              int(255) auto_increment not null,
name            varchar(50) NOT NULL,
surname         varchar(100),
role            varchar(20),
email           varchar(255) NOT NULL,
password        varchar(255) NOT NULL,
description     text,
created_at      datetime DEFAULT NULL,
updated_at      datetime DEFAULT NULL,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE categories(
id              int(255) auto_increment not null,
name            varchar(100),
created_at      datetime DEFAULT NULL,
updated_at      datetime DEFAULT NULL,
CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE books(
id              int(255) auto_increment not null,
user_id         int(255) not null,
category_id     int(255) not null,
name            varchar(255) not null,
content         text not null,
created_at      datetime DEFAULT NULL,
updated_at      datetime DEFAULT NULL,
CONSTRAINT pk_books PRIMARY KEY(id),
CONSTRAINT fk_book_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_book_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;

CREATE TABLE borrows(
id              int(255) auto_increment not null,
user_id         int(255) not null,
book_id         int(255) not null,
CONSTRAINT pk_borrows PRIMARY KEY(id),
CONSTRAINT fk_borrow_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_borrow_book FOREIGN KEY(book_id) REFERENCES books(id)
)ENGINE=InnoDb;