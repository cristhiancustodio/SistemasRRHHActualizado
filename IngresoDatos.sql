use sistemasrrhh;  
insert into  carrera(CARnombre) values 
 ('Marketing'),
 ("Contabilidad"),
 ('Ingenieria de Software'),
 ("Economia"),
 ('Ingenieria de Sistemas'),
 ("Ciencias de la Comunicación"),
 ("Publicidad"),
 ('Recursos Humanos'),
 ('Asesor comercial'),
 ('Ingenieria Industrial'),
 ('Psicologia'),
 ("Gestion de Recursos Humanos"),
 ('Administracion');

 
insert into distrito(DISTnombre) values
("-"),
('San Miguel'),("Ancón"),
('Cercado de Lima'),
('Breña'), ('La Molina'),('San Martin de Porres'),('San Isidro'),('Miraflores'),('Los Olivos'),('Barranco'),
('Chorrillos'),('Callao'),('San Borja'),('San Juan de Miraflores'),('San Juan de Lurigancho'),("San Luis"),('Villa Maria del Triunfo'),("Monterrico"),("Carabayllo"),("Magdalena del Mar"),
('Villa el Salvador'),('Independencia'),('Comas'),('Jesus Maria'),('Lince'),('La Victoria'),('Pueblo Libre'),('Santa Anita'),
("Ate Vitarte"),("Puente piedra"),("Santiago de Surco"),("Pachacamac");



insert into experiencia(EXPcant) values ('Sin experiencia'),('3 meses'),('6 meses'),('1 año'),('2 años'),('+4 años');



insert into reserva(RESdesc) values('Disponibilidad inmediata'),('7 dias'),('15 dias'),("Otro");




insert into puesto(PSTnombre) values ("Otro"),("Practicante contabilidad"),("Practicante Marketing"),("Auxiliar Contable"),("Contador Junior"),("Asistente Contable"),("Practicante programacion"),("Programador.Net"),
("Area Soporte Tecnico"),("Area Cobranza"),("Area Finanzas"),
("Contador Junior"),("Vendedor de Campo"),("Coordinador de Ventas"),("Recursos Humanos"),("Reclutamiento de Personal");

	
/**************  PROCEDIMIENTOS ALMACENADOS  *************************************/

create procedure sp_insertPostulante(
in _nombre varchar(45),
in _cel int,
in _edad int,
in _idCar int,
in _idDist int,
in _fech date,
in _expEcn varchar(45),
in _idRes int,
in _idExp int,
-- in _coment varchar(225),
-- in _estado varchar(45),
in _idPst int
)
	insert into dato values (null,_nombre,_cel,_edad,_idCar,_idDist,_fech,_expEcn,_idRes,_idExp,null,null,_idPst);



create procedure sp_buscarIdPostulante(in _cel int)
select dato.DATid from dato where dato.DATcel=_cel;

create procedure sp_verSeleccionados()
select dato.DATid,dato.DATnombre,carrera.CARnombre, dato.DATedad,puesto.PSTnombre, dato.DATcel, distrito.DISTnombre, dato.DATfech,dato.DATestado, archivo.ARCid from archivo

inner join dato on dato.DATid = archivo.DATid 
inner join carrera on dato.CARid = carrera.CARid 
inner join puesto on dato.PSTid= puesto.PSTid
inner join distrito on dato.DISTid=distrito.DISTid where dato.DATestado = "Seleccionado" order by dato.DATfech desc;







-- Procedimiento creado ultimo
-- estos son los cambios que se hicieron para actualizar 

create procedure sp_updatePostulante(
in _coment varchar(225),
in _estado varchar(45),
in _edad int,
in _fecha date,
in _puesto int,
in _distrito int,
in _id int)
	update dato set dato.DATcoment = _coment, 
	dato.DATestado = _estado, 
	dato.DATedad = _edad,
    dato.DATfech=_fecha,
    dato.PSTid = _puesto,
    dato.DISTid=_distrito
    where dato.DATid = _id;




-- para ver toda la informacion con estado y archivo pdf

create procedure sp_verPostulanteEstado()
select dato.DATid,dato.DATnombre, carrera.CARnombre,dato.DATedad, puesto.PSTnombre, dato.DATcel, distrito.DISTnombre, dato.DATfech,dato.DATestado, archivo.ARCid from archivo
inner join dato on dato.DATid = archivo.DATid 
inner join puesto on dato.PSTid= puesto.PSTid
inner join carrera on dato.CARid= carrera.CARid
inner join distrito on dato.DISTid=distrito.DISTid where dato.DATestado = "A Entrevista" order by dato.DATfech desc;



create procedure sp_PostulanteRegistrado(in _cel int)
select * from dato where dato.DATcel= _cel;


create procedure sp_verPostulantes()
	select dato.DATid ,dato.DATnombre, dato.DATcel, dato.DATedad, carrera.CARnombre, puesto.PSTnombre, distrito.DISTnombre, dato.DATfech, dato.DATexpt, reserva.RESdesc,experiencia.EXPcant, dato.DATcoment, dato.DATestado 
	from dato
	inner join carrera on dato.CARid= carrera.CARid
    inner join puesto on dato.PSTid= puesto.PSTid
	inner join distrito on dato.DISTid=distrito.DISTid
	inner join reserva on dato.RESid= reserva.RESid
	inner join experiencia on dato.EXPid = experiencia.EXPid order by dato.DATid desc;
