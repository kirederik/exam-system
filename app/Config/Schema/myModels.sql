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
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    discipline_id foreign key references disciplines(id),
    category_id foreign key references categories(id)

);

create table questions (
    id int unsigned not null auto_increment primary key,
    question_text text not null,
    correct_comment text,
    wrong_comment text,
    show_correct boolean default true,
    show_wrong boolean default true,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    discipline_id int not null,
    discipline_id foreign key references disciplines(id),
);

create table alternatives (
    id int unsigned not null auto_increment primary key,
    alt_text text not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
);

create table questions_alternatives(
    id int unsigned not null auto_increment primary key,
    question_id int not null,
    alternative_id int not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    question_id foreign key references questions(id)
    alternative_id foreign key references alternatives(id)
);

create table exercises(
    id int unsigned not null auto_increment primary key,
    discipline_id int not null,
    quantity int not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    discipline_id foreign key references disciplines(id)
);

create table exams(
    id int unsigned not null auto_increment primary key,
    category_id int not null
);

create table exams_disciplines(
    id int unsigned not null auto_increment primary key,
    discipline_id int not null,
    exam_id int not null,
    discipline_id foreign key references disciplines(id),
    exam_id foreign key references exams(id)
);

insert into disciplines (name, created) values ('Combate a Incêndio', NOW());