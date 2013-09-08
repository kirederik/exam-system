drop database if exists simulados;
create database simulados;

use simulados;

create table disciplines (
    id int unsigned not null auto_increment primary key,
    name varchar(75) not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

create table categories (
    id int unsigned not null auto_increment primary key,
    name varchar(50) not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

create table disciplines_categories (
    id int unsigned not null auto_increment primary key,
    discipline_id int not null,
    category_id int not null,
    discipline_id foreign key references disciplines(id),
    category_id foreign key references categories(id)
);

insert into disciplines (name, created) values ('Combate a Incêndio', NOW());