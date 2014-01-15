drop database if exists test_simulados;
create database test_simulados CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use test_simulados;

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
    expiracao bigint(20) DEFAULT NULL
);                 



insert into disciplines (name, created) values ('Combate a Incêndio', NOW());
insert into disciplines (name, created) values ('Sobrevivência ao mar', NOW());
insert into disciplines (name, created) values ('Legislação Náutica', NOW());
insert into disciplines (name, created) values ('Manobra de Embarcação', NOW());
insert into disciplines (name, created) values ('Navegação e Balizamento', NOW());
insert into disciplines (name, created) values ('Primeiros Socorros', NOW());
insert into categories (name, created) values ('Motonauta', NOW());