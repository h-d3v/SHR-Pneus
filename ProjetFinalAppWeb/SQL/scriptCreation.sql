DROP DATABASE IF EXISTS shrDatabase;

CREATE DATABASE shrDataBase DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE shrDataBase;

CREATE TABLE manufacturier (
    nom             VARCHAR(255) PRIMARY KEY
);

INSERT INTO manufacturier VALUES
("BRIDGESTONE"), ("FIRESTONE"), ("MICHELIN"), ("UNIROYAL"), ("BFGOODRICH"), ("CONTINENTAL"), ("GISLAVED"), ("GENERAL"), ("PIRELLI"), ("HANKOOK"), ("GTRADIAL"), ("TOYO"),("GOODYEAR"), ("YOKOHAMA"), ("NEXEN"), ("KUMHO"), ("ROVELO"), ("DUNLOP"), ("KELLY"), ("MAXXIS");

CREATE TABLE categorieActeur (
    nomCategorie    VARCHAR(20) PRIMARY KEY
);

INSERT INTO categorieActeur VALUES ("client"), ("administrateur"), ("expedition");

CREATE TABLE modele (
                        idModele        INT PRIMARY KEY AUTO_INCREMENT,
                        manufacturier   VARCHAR(255) NOT NULL,
                        modeleNom       VARCHAR(255) NOT NULL UNIQUE,
                        winter          CHAR(1),
                        allWeather      CHAR(1),
                        rft             CHAR(1),
                        typeModel       VARCHAR(4) NOT NULL,
                        pictureLink     VARCHAR(255),
                        FOREIGN KEY (manufacturier) REFERENCES manufacturier(nom)
);

CREATE TABLE item (
                      id         INT PRIMARY KEY AUTO_INCREMENT,
                      modeleNom       VARCHAR(255) NOT NULL,
                      largeur         INT NOT NULL,
                      ratio           INT NOT NULL,
                      diametre        INT NOT NULL,
                      indiceCharge    INT NOT NULL,
                      indiceVitesse   CHAR(1) NOT NULL,
                      prix            FLOAT NOT NULL,
                      stock           INT NOT NULL,
                      remise          FLOAT,
                      FOREIGN KEY (modeleNom) REFERENCES modele(modeleNom)
);

CREATE TABLE acteur (
    courriel        VARCHAR(255) PRIMARY KEY ,
    categorieActeur VARCHAR(20) NOT NULL,
    passwordActeur  VARCHAR(255) NOT NULL,
    nom             VARCHAR(255) NOT NULL,
    prenom          VARCHAR(255) NOT NULL,
    adresse         VARCHAR(255) NOT NULL,
    codePostal      CHAR(6) NOT NULL,
    ville           VARCHAR(255) NOT NULL,
    telephone       int NOT NULL,
    FOREIGN KEY (categorieActeur) REFERENCES categorieActeur(nomCategorie)
);

INSERT INTO acteur VALUES 
    ('bobgraton@gmail.com', 'administrateur', 'qwertyqwerty', 'Graton', 'Bob', '344 16e AV', 'A0A0A0', 'MONTREAL', '1234567890'),
    ('client@gmail.com', 'client', 'qwertyqwerty', 'Client', 'Bob le client', '346 14e AV', 'B1B1B1', 'MONTREAL', '2345678901');

CREATE TABLE statut (
    nomStatut       VARCHAR(15) PRIMARY KEY
);

INSERT INTO statut VALUES ("to prepare"), ("send");

CREATE TABLE commande (
                          id              INT PRIMARY KEY AUTO_INCREMENT,
                          clientID       VARCHAR(255),
                          dateCommande    DATETIME,
                          dateExpedition  DATETIME,
                          statut          VARCHAR(15),
                          paiement        CHAR(1),
                          FOREIGN KEY (statut) REFERENCES statut(nomStatut),
                           FOREIGN KEY (clientID) REFERENCES acteur(courriel),
);

<<<<<<< HEAD
CREATE TABLE ligneCommande (
                            
                               commandeID      INT,
                               itemID          INT,
                               quantite        INT,
                              
                               FOREIGN KEY (commandeID) REFERENCES commande(id),
                               FOREIGN KEY (itemID) REFERENCES item(id),
                               CONSTRAINT PK_LIGNECOMMANDE PRIMARY KEY (commandeID, itemID)

=======
CREATE TABLE ligneCommande  (
                               clientID        INT,
                               commandeID      INT,
                               itemID          INT,
                               quantite        INT,
                               FOREIGN KEY (clientID) REFERENCES acteur(courriel),
                               FOREIGN KEY (commandeID) REFERENCES commande(id),
                               FOREIGN KEY (itemID) REFERENCES item(id),
                               CONSTRAINT PK_LIGNECOMMANDE PRIMARY KEY (clientID, commandeID, itemID)
>>>>>>> fba953adfea0b646a57e969802a5707e2f299b9e
);
