CREATE TABLE CategoriesPlats(
   id INT AUTO_INCREMENT,
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
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE Photos(
   id INT AUTO_INCREMENT,
   image VARCHAR(50),
   description TEXT,
   PRIMARY KEY(id)
);

CREATE TABLE Plats(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prix DECIMAL(13,2),
   image VARCHAR(255),
   commentaire TEXT,
   contient_porc TINYINT(1),
   present_carte TINYINT(1),
   categoriesplats_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(categoriesplats_id) REFERENCES CategoriesPlats(id)
);

CREATE TABLE Reservations(
   id INT AUTO_INCREMENT,
   horaire DATETIME,
   nbDePersonnes INT,
   created_at DATE,
   updated_at VARCHAR(50),
   etat_id INT NOT NULL,
   clients_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(etat_id) REFERENCES Etat(id),
   FOREIGN KEY(clients_id) REFERENCES Clients(id)
);

CREATE TABLE Affiche(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   description TEXT,
   plats_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(plats_id) REFERENCES Plats(id)
);

CREATE TABLE Menus_Plats(
   plats_id INT,
   menus_id INT,
   PRIMARY KEY(plats_id, menus_id),
   FOREIGN KEY(plats_id) REFERENCES Plats(id),
   FOREIGN KEY(menus_id) REFERENCES Menus(id)
);

CREATE TABLE Evenement_Categories(
   evenements_id INT,
   categoriesEvenements_id INT,
   PRIMARY KEY(evenements_id, categoriesEvenements_id),
   FOREIGN KEY(evenements_id) REFERENCES Evenements(id),
   FOREIGN KEY(categoriesEvenements_id) REFERENCES CategoriesEvenements(id)
);
