CREATE TABLE Plats(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prix DECIMAL(13,2),
   image VARCHAR(255),
   commentaire TEXT,
   contient_porc TINYINT(1) DEFAULT '0',
   present_carte TINYINT(1) DEFAULT '0',
   PRIMARY KEY(id)
);

CREATE TABLE CategoriesPlats(
   id VARCHAR(50),
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Clients(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   email VARCHAR(50),
   numero CHAR(10),
   created_at DATETIME,
   updated_at VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Etat(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Boissons(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prix DECIMAL(13,2),
   description TEXT,
   contenance DECIMAL(15,2),
   present_carte TINYINT(1),
   contient_alcool TINYINT(1),
   PRIMARY KEY(id)
);

CREATE TABLE Menus(
   id INT AUTO_INCREMENT,
   dateMenu DATE,
   PRIMARY KEY(id)
);

CREATE TABLE Evenements(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   horaire_debut DATETIME,
   horaire_fin DATETIME,
   nomDJ VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE CategoriesEvenements(
   id INT,
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Photos(
   id INT AUTO_INCREMENT,
   image VARCHAR(50),
   description TEXT,
   PRIMARY KEY(id)
);

CREATE TABLE Affiche(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   description TEXT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Plats(id)
);

CREATE TABLE Reservations(
   id INT AUTO_INCREMENT,
   horaire DATETIME,
   nbDePersonnes INT,
   created_at DATE,
   updated_at VARCHAR(50),
   id_1 INT NOT NULL,
   id_2 INT NOT NULL,
   id_3 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Etat(id),
   FOREIGN KEY(id_2) REFERENCES Clients(id),
   FOREIGN KEY(id_3) REFERENCES Clients(id)
);

CREATE TABLE Plats_Categories(
   id INT,
   id_1 VARCHAR(50),
   id_2 VARCHAR(50),
   PRIMARY KEY(id, id_1, id_2),
   FOREIGN KEY(id) REFERENCES Plats(id),
   FOREIGN KEY(id_1) REFERENCES CategoriesPlats(id),
   FOREIGN KEY(id_2) REFERENCES CategoriesPlats(id)
);

CREATE TABLE Menus_Plats(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Plats(id),
   FOREIGN KEY(id_1) REFERENCES Menus(id)
);

CREATE TABLE Evenement_Categories(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Evenements(id),
   FOREIGN KEY(id_1) REFERENCES CategoriesEvenements(id)
);
