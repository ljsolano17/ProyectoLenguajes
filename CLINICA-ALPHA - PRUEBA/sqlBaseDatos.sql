CREATE TABLE `diashabiles` (                                               
               `id` int(11) NOT NULL,                                                   
               `dia` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,  
               PRIMARY KEY (`id`)                                                       
             );

CREATE TABLE `profesores` (           
              `id` int(11) NOT NULL,              
              `Nombre` varchar(100) NOT NULL,     
              PRIMARY KEY (`id`)                  
            );

CREATE TABLE `tutoria` (                                                                      
           `alumno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,             
           `idProfesor` int(11) DEFAULT NULL,                                                          
           `idDia` int(11) DEFAULT NULL,                                                               
           `hora` int(11) DEFAULT NULL,                                                                
           `asunto` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,             
           `id` int(11) NOT NULL AUTO_INCREMENT,                                                       
           PRIMARY KEY (`id`),                                                                         
           KEY `FK_tutoria_dia` (`idDia`),                                                             
           KEY `FK_tutoria_profesor` (`idProfesor`),                                                   
           CONSTRAINT `FK_tutoria_dia` FOREIGN KEY (`idDia`) REFERENCES `diashabiles` (`id`),          
           CONSTRAINT `FK_tutoria_profesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`)  
         );

Insert into DiasHabiles (id, Dia) values (1, 'Lunes');
Insert into DiasHabiles (id, Dia) values (2, 'Martes');
Insert into DiasHabiles (id, Dia) values (3, 'Miercoles');
Insert into DiasHabiles (id, Dia) values (4, 'Jueves');
Insert into DiasHabiles (id, Dia) values (5, 'Viernes');

Insert into Profesores (id, Nombre) values (1, 'Eduardo González Paniagua');
Insert into Profesores (id, Nombre) values (2, 'Wilberth Mendoza Calderon');
Insert into Profesores (id, Nombre) values (3, 'Abigal Montero Solano');
Insert into Profesores (id, Nombre) values (4, 'Armenia Monge Bermudez');
Insert into Profesores (id, Nombre) values (5, 'Carlos Esquivel Solorzano');