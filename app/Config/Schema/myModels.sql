drop database if exists simulados;
create database test_simulados CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use test_simulados;

create table disciplines (
    id int unsigned not null auto_increment primary key,
    name varchar(75) not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    ordem int
);

create table categories (
    id int unsigned not null auto_increment primary key,
    name varchar(50) not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

create table disciplines_categories (
    id int unsigned not null auto_increment primary key,
    discipline_id int unsigned not null,
    category_id int unsigned not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    foreign key(discipline_id) references disciplines(id),
    foreign key(category_id) references categories(id)
);

create table questions (
    id int unsigned not null auto_increment primary key,
    question_text text not null,
    correct_comment text,
    wrong_comment text,
    imagem_location varchar(50),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    discipline_id int unsigned not null,
    foreign key(discipline_id) references disciplines(id)
);

create table alternatives (
    id int unsigned not null auto_increment primary key,
    alt_text text not null,
    question_id int unsigned not null,
    is_correct boolean default false,
    foreign key(question_id) references questions(id)
);

-- create table questions_alternatives(
--     id int unsigned not null auto_increment primary key,
--     question_id int unsigned not null,
--     alternative_id int unsigned not null,
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL,
--     foreign key(question_id) references questions(id),
--     foreign key(alternative_id) references alternatives(id)
-- );

create table exercises(
    id int unsigned not null auto_increment primary key,
    discipline_id int unsigned not null,
    quantity int not null,
    first_question_id int unsigned not null,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    foreign key(discipline_id) references disciplines(id),
    foreign key(first_question_id) references questions(id)
);

create table exams(
    id int unsigned not null auto_increment primary key,
    category_id int unsigned not null,
    time_minutes int signed
);

create table demos(
    id int unsigned not null auto_increment primary key,
    category_id int unsigned not null,
    foreign key(category_id) references categories(id)
);

create table demos_questions(
    id int unsigned not null auto_increment primary key,
    demo_id int unsigned not null,
    question_id int unsigned not null,
    foreign key(demo_id) references demos(id),
    foreign key(question_id) references questions(id)

);

create table exams_disciplines(
    id int unsigned not null auto_increment primary key,
    discipline_id int unsigned not null,
    exam_id int unsigned not null,
    amount int,
    foreign key(discipline_id) references disciplines(id),
    foreign key(exam_id) references exams(id)
);

CREATE TABLE users (        
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) UNIQUE NOT NULL,
    exemplar varchar(15) UNIQUE NOT NULL,
    fone varchar(15) NOT NULL,
    password varchar(250) NOT NULL,
    role VARCHAR(20),
    nome varchar(55) NOT NULL,
    logged int default 0,
    logged_time int,
    expiracao bigint(20) DEFAULT NULL,
    category_id int unsigned not null,
    foreign key(category_id) references categories(id)
);                 


create table filetypes (
    id int unsigned auto_increment primary key,
    name varchar(30) not null
);

create table materials (
    id int unsigned auto_increment primary key,
    category_id int unsigned not null,
    filetype_id int unsigned not null,
    name varchar(250) not null,
    filename varchar(100) not null,
    description text,
    foreign key(category_id) references categories(id),
    foreign key(filetype_id) references filetypes(id)
);

-- create table modules (
--     id int unsigned not null auto_increment primary key
-- );

insert into disciplines (name, created, ordem) values ('Combate a Incêndio', NOW(), 5);
insert into disciplines (name, created, ordem) values ('Sobrevivência ao mar', NOW(), 6);
insert into disciplines (name, created, ordem) values ('Legislação Náutica', NOW(), 1);
insert into disciplines (name, created, ordem) values ('Manobra de Embarcação', NOW(), 2);
insert into disciplines (name, created, ordem) values ('Navegação e Balizamento', NOW(), 3);
insert into disciplines (name, created, ordem) values ('Primeiros Socorros', NOW(), 4);

insert into categories (name, created) values ('Motonauta', NOW());