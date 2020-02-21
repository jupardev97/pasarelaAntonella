Use pasa_anto;


INSERT INTO `pas_car` (`ide_car`, `tip_car`, `hor_tra`, `pag_hor`) VALUES
('ADM01', 'administrador', NULL, NULL),
('VEN01', 'vendedor(a)', NULL, NULL);

INSERT INTO `pas_tra` (`ced_tra`, `ide_car`, `nom_tra`, `dir_tra`, `cor_tra`, `tel_tra`, `cla_tra`) VALUES
('123456', 'ADM01', 'Jose Mendoza', 'La Intersección con La Avenida Martines', 'jose@gmail.com', '+58 963891', '2338ce5072a81e14df20756816e8d540');

Insert Into pas_tip_ins ( ide_tip, tip_ins, est_tip )
    VALUES ( 'CRM01', 'Cremalleras', 1),
    ( 'BTN01', 'Botones', 1),
    ( 'BRC01', 'Broches', 1),
    ( 'ADN01', 'Adornos', 1),
    ( 'LEN01', 'Lentejuelas', 1),
    ( 'AGU01', 'Agujas', 1 ),
    ( 'HEB01', 'Hebillas', 1),
    ( 'BOR01', 'Bordados', 1),
    ( 'CIN01', 'Cintas', 1),
    ( 'APL01', 'Apliques', 1),
    ( 'TEL01', 'Telas', 1);

Insert Into pas_tip_pre ( ide_tip, tip_pre, est_tip) 
    VALUES ( 'ABR01', 'Abrigo', 1),
    ( 'JNS01' , 'Blue Jeans', 1),
    ( 'BOT01', 'Botas', 1),
    ( 'BRA01', 'Bragas', 1),
    ( 'BFN01', 'Bufanda', 1),
    ( 'CAR01', 'Cartera', 1),
    ( 'CAM01', 'Camisa', 1),
    ( 'CHA01', 'Chal', 1),
    ( 'CHA02', 'Chaleco', 1),
    ( 'CHA03', 'Chandal', 1),
    ( 'CHA04', 'Chaqueta', 1),
    ( 'CIN01', 'Cinturon', 1),
    ( 'COL01', 'Collar', 1),
    ( 'FAL01', 'Falda', 1),
    ( 'FRA01', 'Franela', 1),
    ( 'FRAM02', 'Franelilla', 1),
    ( 'GAB01', 'Gabardina', 1),
    ( 'GOR01', 'Gorra', 1),
    ( 'GOR02', 'Gorro Tejido', 1),
    ( 'MED01', 'Medias', 1),
    ( 'MOC01' , 'Mochila', 1),
    ( 'PAN01', 'Pantalon', 1),
    ( 'PAN02', 'Pañuelo', 1),
    ( 'PIJ01', 'Pijama', 1),
    ( 'PUL01', 'Pulsera', 1),
    ( 'SHO01', 'Short', 1),
    ( 'SOM01', 'Sombrero', 1),
    ( 'SUE01', 'Sueter', 1),
    ( 'SUJ01', 'Sujetador', 1),
    ( 'TAC01', 'Tacones', 1),
    ( 'TRA01', 'Traje de Baño', 1),
    ( 'VES01', 'Vestido', 1),
    ( 'ZAP01', 'Zapatos', 1);



INSERT INTO `pas_ins` (`ide_ins`, `ide_tip`, `nom_ins`, `pre_ins`, `can_ins`, `est_ins`) VALUES
('AGU01', 'AGU01', 'AGUJA NORMAL', '2000.00', '5.00', 1),
('BTN01', 'BTN01', 'BOTONES NEGROS 3X1', '2100.00', '10.00', 1),
('CINT01', 'CIN01', 'CINTAS BLANCAS 3 CM', '900.00', '5.00', 1),
('TEL01', 'TEL01', 'TELA CHIFON', '12000.00', '4.20', 1);

