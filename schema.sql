DROP TABLE IF EXISTS duplicado;
DROP TABLE IF EXISTS correcao;

DROP TABLE IF EXISTS proposta_de_correcao;

DROP TABLE IF EXISTS incidencia;

DROP TABLE IF EXISTS utilizador_qualificado;
DROP TABLE IF EXISTS utilizador_regular;
DROP TABLE IF EXISTS utilizador;


DROP TABLE IF EXISTS anomalia_traducao;
DROP TABLE IF EXISTS anomalia;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS local_publico;


create table local_publico (
	latitude integer,
	longitude integer,
	nome varchar(100),
	primary key (latitude, longitude),
	check(-90 <= latitude and latitude <= 90),
	check(-180 <= longitude and longitude <= 180)
);

create table item (
	id integer,
	descricao varchar(1024),
	localizacao varchar(31),
	latitude integer,
	longitude integer,
	primary key (id),
	foreign key (latitude, longitude)
		references local_publico(latitude, longitude)
);

create table anomalia (
	id integer,
	zona box,
	imagem bytea,
	lingua varchar(40),
	descricao varchar(1024),
	tem_anomalia_redacao boolean,
	primary key (id)
);

create table anomalia_traducao (
	id integer,
	zona2 box,
	lingua2 varchar(40),
	primary key (id),
	foreign key (id)
		references anomalia
);

create table duplicado (
	item1 integer,
	item2 integer,
	primary key(item1, item2),
	foreign key (item1)
		references item,
	foreign key (item2)
		references item
);

create table utilizador (
	email varchar(50),
	password varchar(30),
	primary key (email)
);

create table utilizador_qualificado (
	email varchar(50),
	primary key (email),
	foreign key (email)
		references utilizador
);

create table utilizador_regular(
	email varchar(50),
	primary key (email),
	foreign key (email)
		references utilizador
);

create table incidencia (
	anomalia_id integer,
	item_id integer,
	email varchar(50),
	primary key (anomalia_id),
	foreign key (anomalia_id)
		references anomalia,
	foreign key (item_id)
		references item,
	foreign key (email)
		references utilizador
);

create table proposta_de_correcao(
	email varchar(50),
	nro integer,
	data_hora timestamp,
	texto varchar(1024),
	primary key (email, nro),
	foreign key (email)
		references utilizador_qualificado
);

create table correcao (
	email varchar(50),
	nro integer,
	anomalia_id integer,
	primary key (email, nro, anomalia_id),
	foreign key (email, nro)
		references proposta_de_correcao(email, nro),
	foreign key (anomalia_id)
		references incidencia
);
