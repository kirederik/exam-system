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
    category_id int unsigned not null
);

create table exams_disciplines(
    id int unsigned not null auto_increment primary key,
    discipline_id int unsigned not null,
    exam_id int unsigned not null,
    amount int,
    foreign key(discipline_id) references disciplines(id),
    foreign key(exam_id) references exams(id)
);

insert into disciplines (name, created) values ('Combate a Incêndio', NOW());
insert into categories (name, created) values ('Motonauta', NOW());