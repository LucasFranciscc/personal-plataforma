create table access_levels (
	id int primary key auto_increment,
    level varchar(50) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

insert into access_levels (level) values
("Administrador"),
("Aluno");

create table users (
	id int primary key auto_increment,
    name varchar(50) not null,
    birth char(10) not null,
    phone char(11) not null,
    photo varchar(255) default "images/2021/03/avatar.jpg",
    sex varchar(20) not null,
    cpf char(11) not null,
    email varchar(100),
    password varchar(100),
    access_level_id int not null,
    foreign key (access_level_id)
    references access_levels (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE users ADD FULLTEXT(name, email, phone);

insert into users (name, birth, phone, email, password, access_level_id) value
("Lucas Francisco", "13/11/1997", "61981287117", "lucasfrancisco1318@gmail.com", "$2y$10$bRWYXhOP0OW220UsIQ5Ft.m5JfxKcoIPtdMO.ZZq94SyBMwAEqxp2", 1);

create table muscle_groups (
	id int primary key auto_increment,
    muscle_group varchar(50) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE muscle_groups ADD FULLTEXT(muscle_group);

create table exercises (
	id int primary key auto_increment,
    title varchar(50) not null,
    description text not null,
    video_code varchar(100),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE exercises ADD FULLTEXT(title, video_code);

	create table muscle_groups_exercise (
		id int primary key auto_increment,
		exercises_id int not null,
		muscle_group_id int not null,
		foreign key (exercises_id)
		references exercises (id),
		foreign key (muscle_group_id)
		references muscle_groups (id),
		created_at timestamp NOT NULL DEFAULT current_timestamp(),
		updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
	);

create table physical_form (
	id int primary key auto_increment,
	next_fill char(10),
    status varchar(10) not null default 'not sent' comment 'not sent, sent',
    user_id int not null,
    foreign key (user_id)
    references users (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table physical_form_questions (
	id int primary key auto_increment,
    question text not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

insert into physical_form_questions (id, question) value
(1, 'Um médico já disse que você tinha alguns dos problemas que se seguem?'),
(2, 'Você tem algum dos sintomas abaixo?'),
(3, 'Liste os medicamentos que você está tomando (nome e motivo).'),
(4, 'Algum parente próximo (pai, mãe, irmão ou irmã) teve ataque cardíaco ou outro problema relacionado com o coração antes dos 50 anos?'),
(5, 'Algum médico disse que você tinha alguma restrição à prática de exercício físico (inclusive cirurgia)?'),
(6, 'Você possui algum exame médico que posso adicionar no planejamento do seu treino?'),
(7, 'Você está grávida?'),
(8, 'Você já teve alguma lesão muscular ocea ou artilcular?'),
(9, 'Você pratica alguma atividade física? Se sim qual?'),
(10, 'Você tem acompanhamento nutricional (com profissional).'),
(11, 'Onde você vai realizar seu treino?'),
(12, 'Quantas vezes na semana você pretende treinar?'),
(13, 'Liste dois objetivos que você procura com o treinamento.'),
(14, 'Quanto tempo você pretende passar em sua sessão de treino.'),
(15, 'O que você pretende com o trabalho de consultoria online.'),
(16, 'Anexar sua última avaliação física.'),
(17, 'Possui plano nutricional? Anexar aqui sua dieta atual.');

create table physical_form_options (
	id int primary key auto_increment,
	form_option varchar(100) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

insert into physical_form_options (id, form_option) value
(1, "Doença cardíaca reumática"),
(2, "Derrame cerebral"),
(3, "Doença cardíaca congênita"),
(4, "Batimentos cardíacos irregulares"),
(5, "Diabetes"),
(6, "Problemas nas válvulas cardiacas"),
(7, "Hipertensão"),
(8, "Murmúrios cardíacos"),
(9, "Câncer"),
(10, "Outros"),
(11, "Por favor, explique"),
(12, "Dor nas costas"),
(13, "Dor nas articilações, tendões ou músculo"),
(14, "Doença pulmonar (asma, enfisema, outra)"),
(15, "Por favor, explique"),
(16, "Liste os medicamentos que você está tomando (nome e motivo)"),
(17, "Sim"),
(18, "Não"),
(19, "Sim"),
(20, "Não"),
(21, "Por favor, explique"),
(22, "Sim"),
(23, "Não"),
(24, "Anexo"),
(25, "Sim"),
(26, "Não"),
(27, "Sim"),
(28, "Não"),
(29, "Por favor, explique"),
(30, "Sim"),
(31, "Não"),
(32, "Por favor, explique"),
(33, "Sim"),
(34, "Não"),
(35, "Academia"),
(36, "Clube/Estúdio/Condomínio"),
(37, "Praça"),
(38, "Casa"),
(39, "Quantas vezes na semana você pretende treinar"),
(40, "Melhorar a postura"),
(41, "Emagrecer"),
(42, "Definir"),
(43, "Hipertrofia"),
(44, "Saúde e qualidade de vida"),
(45, "Performance"),
(46, "Outros"),
(47, "45 minutos"),
(48, "1 hora"),
(49, "mais de 1 hora"),
(50, "Por favor, explique"),
(51, "Anexo"),
(),
(),
(),
(),
(),
(),
(),
(),
();

create table answered_form (
	id int primary key auto_increment,
    physical_form_id int not null,
    answer_1 text,
    answer_2 text,
    answer_3 text,
    answer_4 text,
    answer_5 text,
    answer_6 text,
    answer_7 text,
    answer_8 text,
    answer_9 text,
    answer_10 text,
    answer_11 text,
    answer_12 text,
    answer_13 text,
    answer_14 text,
    answer_15 text,
    answer_16 text,
    answer_17 text,
    answer_18 text,
    answer_19 text,
    answer_20 text,
    answer_21 text,
    answer_22 text,
    answer_23 text,
    answer_24 text,
    answer_25 text,
    answer_26 text,
    answer_27 text,
    answer_28 text,
    answer_29 text,
    answer_30 text,
    answer_31 text,
    answer_32 text,
    answer_33 text,
    answer_34 text,
    answer_35 text,
    answer_36 text,
    answer_37 text,
    answer_38 text,
    answer_39 text,
    answer_40 text,
    answer_41 text,
    answer_42 text,
    answer_43 text,
    answer_44 text,
    answer_45 text,
    answer_46 text,
    answer_47 text,
    answer_48 text,
    answer_49 text,
    answer_50 text,
    answer_51 text,
    answer_52 text,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table messages (
	id int primary key auto_increment,
    incoming_msg_id int,
    outgoing_msg_id int,
    msg text,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table uploads_students (
	id int primary key auto_increment,
    user_id int not null,
    name varchar(100) not null,
    upload varchar(255) not null,
    type varchar(20) not null,
    foreign key (user_id)
    references users (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE uploads_students ADD FULLTEXT(name);

create table warnings(
	id int primary key auto_increment,
    warning text not null,
    user_id int not null,
    foreign key (user_id)
    references users (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE warnings ADD FULLTEXT(warning);

create table partnerships (
	id int primary key auto_increment,
    name varchar(100) not null,
    image text not null,
    phone varchar(15) not null,
    address varchar(150),
    description text,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

ALTER TABLE partnerships ADD FULLTEXT(name, address);

create table training_sheet (
	id int primary key auto_increment,
    record_name varchar(100) not null,
    user_id int not null,
    status varchar(20) not null default 'active' comment 'active, inactive',
    foreign key (user_id)
    references users (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table training(
	id int primary key auto_increment,
    name_training varchar(100) not null,
    day_of_the_week varchar(20) not null,
    training_sheet_id int not null,
    user_id int not null,
    status varchar(20) not null default 'active' comment 'active, inactive',
    foreign key (training_sheet_id)
    references training_sheet (id),
    foreign key (user_id)
    references users (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table muscle_group_training(
	id int primary key auto_increment,
    training_id int not null,
    muscle_group_id int not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table training_exercises (
	id int primary key auto_increment,
    training_id int not null,
    exercise_id int not null,
    series int,
    minimal_repetition int,
    maximum_repetition int,
    rest int,
    position int,
    foreign key (training_id)
    references training (id),
    foreign key (exercise_id)
    references exercises (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table blog_categories(
	id int primary key auto_increment,
    category varchar(30) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE blogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author INT NOT NULL,
    category_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    uri varchar(255) not null,
    subtitle VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    cover VARCHAR(255) NOT NULL,
    views INT,
    FOREIGN KEY (author)
	REFERENCES users (id),
    FOREIGN KEY (category_id)
    REFERENCES blog_categories (id),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

ALTER TABLE blogs ADD FULLTEXT(title);

create table completed_exercises (
	id INT PRIMARY KEY AUTO_INCREMENT,
    training_exercises_id int not null,
    user_id int not null,
    date_of_the_conclusion char(10) not null,
    foreign key (training_exercises_id)
    references training_exercises (id),
    foreign key (user_id)
    references users (id),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table birthday_message (
	id INT PRIMARY KEY AUTO_INCREMENT,
    msg text not null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table birthday_message_queue (
	id INT PRIMARY KEY AUTO_INCREMENT,
    subject varchar(255),
    body text,
    from_email varchar(100),
    from_name varchar(100),
    recipient_email varchar(100),
    recipient_name varchar(100),
    status varchar(30),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table anamnese (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int not null,
    question1 text not null,
    question2 text not null,
    question3 text not null,
    question4 text not null,
    question5 text not null,
    question6 text not null,
    question7 text not null,
    question8 text not null,
    creation_date date not null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table par_q (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int not null,
    question1 char(3) not null,
    question2 char(3) not null,
    question3 char(3) not null,
    question4 char(3) not null,
    question5 char(3) not null,
    question6 char(3) not null,
    question7 char(3) not null,
    question8 char(3) not null,
    question9 char(3) not null,
    question10 char(3) not null,
    term varchar(15) not null,
    creation_date date not null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table postural_evaluation (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int not null,
    photo1 varchar(100),
    photo2 varchar(100),
    photo3 varchar(100),
    photo4 varchar(100),
    photo5 varchar(100),
    photo6 varchar(100),
    photo7 varchar(100),
    photo8 varchar(100),
    photo9 varchar(100),
    creation_date date not null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table form_filling (
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int not null,
    anamnese_id int,
    par_q_id int,
    postural_evaluation_id int,
    status varchar(20) not null default "não preenchido",
    validity date not null,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP ()
);

create table postural_analysis (
	id int primary key auto_increment,
    user_id int not null,
    date_posture_analysis char(7) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table postural_analysis_images (
	id int primary key auto_increment,
    postural_analysis_id int not null,
    image varchar(100) not null,
    foreign key (postural_analysis_id)
    references postural_analysis (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table posture_analysis_reports (
	id int primary key auto_increment,
    postural_analysis_id int not null,
    cabeca varchar(50) not null,
    coluna varchar(50) not null,
    ombros varchar(50) not null,
    escapulas varchar(50) not null,
    quadril_pelve varchar(50) not null,
    joelhos varchar(50) not null,
    tibias varchar(50) not null,
    pes varchar(50) not null,
    foreign key (postural_analysis_id)
    references postural_analysis (id),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

create table intensification_methods (
	id int primary key auto_increment,
    intensification_method varchar(100) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);





