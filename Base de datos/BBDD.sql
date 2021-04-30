create table plan(
  pla_id integer not null,
  pla_nombre varchar(100) not null,
  pla_costo numeric not null,
  primary key(pla_id)
);

insert into plan values 
  ('1','Normal', 60000);
insert into plan values 
  ('2','Completo', 90000);
insert into plan values 
  ('3','Completo+Personal Trainer', 160000);

create table persona(
  	per_tipo_doc varchar(30) not null, 
    per_id varchar(20) not null, 
    per_nombres varchar(100) not null, 
    per_apellidos varchar(100) not null,
    per_edad numeric(2) not null,
    per_email varchar(30) not null,
    per_altura float not null, 
    per_peso float not null, 
    per_imc float null, 
    per_plan_id integer not null,
    primary key(per_id) ,
  	FOREIGN KEY (per_plan_id) REFERENCES plan(pla_id)
);


