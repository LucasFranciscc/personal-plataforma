create table types_of_postural_analyzes (
    id int primary key auto_increment,
    type varchar(50) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)

insert into types_of_postural_analyzes (type) 
values 
('Cabeça'),
('Coluna'),
('Ombros'),
('Escapulas'),
('Quadril e Pelve'),
('Joelhos'),
('Tíbias'),
('Pés');

create table posture_analysis_reports_new (
    id int primary key auto_increment,
    postural_analysis_id int not null,
    types_of_postural_analyzes_id int not null,
    option varchar(100) not null,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
	updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)