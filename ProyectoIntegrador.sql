
CREATE TABLE ciudadesti (
                id_destino INT NOT NULL,
                ciudad_destino VARCHAR(50) NOT NULL,
                ranking INT NOT NULL,
                PRIMARY KEY (ciudad_destino)
);


CREATE TABLE pasajero (
                id INT AUTO_INCREMENT NOT NULL,
                nombre_pasajero VARCHAR(50) NOT NULL,
                num_pasaporte INT NOT NULL,
                fecha_nacimiento DATE NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE avion (
                asientos INT NOT NULL,
                PRIMARY KEY (asientos)
);


CREATE TABLE compras (
                id INT AUTO_INCREMENT NOT NULL,
                customer_id INT NOT NULL,
                total_price FLOAT(10,2) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE boleto (
                id INT NOT NULL,
                order_id INT NOT NULL,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE clientes (
                id INT AUTO_INCREMENT NOT NULL,
                nombre VARCHAR(50) NOT NULL,
                correo VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_user)
);


CREATE TABLE aereolinea (
                aereolinea VARCHAR(25) NOT NULL,
                PRIMARY KEY (aereolinea)
);


CREATE TABLE ciudad (
                ciudad_origen VARCHAR(50) NOT NULL,
                PRIMARY KEY (ciudad_origen)
);


CREATE TABLE vuelo (
                id INT AUTO_INCREMENT NOT NULL,
                ciudad_origen VARCHAR(50) NOT NULL,
                aereolinea VARCHAR(25) NOT NULL,
		foto_aereo VARCHAR(200) NOT NULL,
                fecha_llegada DATE NOT NULL,
                num_vuelo INT NOT NULL,
                fecha_salida DATE NOT NULL,
                hora_salida TIME NOT NULL,
                valor_pasaje INT NOT NULL,
                hora_llegada TIME NOT NULL,
                asientos INT NOT NULL,
                ciudad_destino VARCHAR(50) NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE vuelo ADD CONSTRAINT ciudadesti_vuelo_fk
FOREIGN KEY (ciudad_destino)
REFERENCES ciudadesti (ciudad_destino)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE compras ADD CONSTRAINT pasajero_compras_fk
FOREIGN KEY (customer_id)
REFERENCES clientes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE vuelo ADD CONSTRAINT avion_vuelo_fk
FOREIGN KEY (asientos)
REFERENCES avion (asientos)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE boleto ADD CONSTRAINT compras_boleto_fk
FOREIGN KEY (order_id)
REFERENCES compras (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE vuelo ADD CONSTRAINT aereolinea_vuelo_fk
FOREIGN KEY (aereolinea)
REFERENCES aereolinea (aereolinea)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE vuelo ADD CONSTRAINT ciudad_vuelo_fk
FOREIGN KEY (ciudad_origen)
REFERENCES ciudad (ciudad_origen)
ON DELETE NO ACTION
ON UPDATE NO ACTION;