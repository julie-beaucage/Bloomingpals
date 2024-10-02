-- DROP DATABASE IF EXISTS `BloomingPals`;
Create DATABASE IF NOT EXISTS `BloomingPals`  DEFAULT CHARACTER SET utf8mb4;
USE BloomingPals;

DROP TABLE IF EXISTS utilisateur_interet;
DROP TABLE IF EXISTS interet;
DROP TABLE IF EXISTS categorie_interet;
DROP TABLE IF EXISTS historique_recherche;
DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS clavardage_utilisateur;
DROP TABLE IF EXISTS salle_clavardage;
DROP TABLE IF EXISTS affinite_utilisateur;
DROP TABLE IF EXISTS relation;
DROP TABLE IF EXISTS rencontre_utilisateur;
DROP TABLE IF EXISTS evenement_utilisateur;
DROP TABLE IF EXISTS tag_rencontre;
DROP TABLE IF EXISTS tag_evenement;
DROP TABLE IF EXISTS demande_ami;
DROP TABLE IF EXISTS demande_rencontre;
DROP TABLE IF EXISTS signalement;
DROP TABLE IF EXISTS notification;
DROP TABLE IF EXISTS tag;
DROP TABLE IF EXISTS rencontre;
DROP TABLE IF EXISTS type_objet;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS evenement;
DROP TABLE IF EXISTS type_personnalite;
DROP TABLE IF EXISTS type_notification;
DROP TABLE IF EXISTS affinite;

-- Type_Personnalite -----------------------------------
CREATE TABLE IF NOT EXISTS type_personnalite (
    id INT PRIMARY KEY auto_increment ,
    nom VARCHAR(50) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Utilisateur -----------------------------------------
CREATE TABLE IF NOT EXISTS utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    est_admin BOOLEAN DEFAULT FALSE,
    email VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    date_naissance DATE NOT NULL,
    type_personnalite INT DEFAULT 0 NOT NULL,
    image_profil VARCHAR(2048),
    background_image VARCHAR(2048), 
    genre ENUM('homme', 'femme', 'non-genre') NOT NULL,
    password CHAR(128) NOT NULL,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    remember_token VARCHAR(100) NULL,
    FOREIGN KEY (type_personnalite) REFERENCES type_personnalite (id)
) ENGINE=InnoDB;

INSERT INTO type_personnalite (id, nom) VALUES (0, 'Aucun'); -- code obligatoire en attendant de remplir la table personnalite)
-- -----------------------------------------------------

-- Historique_Recherche --------------------------------
CREATE TABLE IF NOT EXISTS historique_recherche(
    id_utilisateur INT,
    Texte VARCHAR(200) NOT NULL,
    `date` Date NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Salle_Clavardage ------------------------------------
CREATE TABLE IF NOT EXISTS salle_clavardage(
    id INT PRIMARY KEY auto_increment
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Message ---------------------------------------------
CREATE TABLE IF NOT EXISTS message(
    id INT PRIMARY KEY auto_increment,
    id_clavardage INT NOT NULL,
    id_utilisateur_envoie INT NOT NULL,
    content Varchar(2000) NOT NULL,
    modifie Bool DEFAULT(False),
    FOREIGN KEY (id_clavardage) REFERENCES salle_clavardage (id),
    FOREIGN KEY (id_utilisateur_envoie) REFERENCES utilisateur (id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Clavardage_Utilisateur ------------------------------
CREATE TABLE IF NOT EXISTS clavardage_utilisateur(
    id_clavardage INT NOT NULL,
    id_utilisateur_envoie INT NOT NULL,
    FOREIGN KEY (id_clavardage) REFERENCES salle_clavardage (id),
    FOREIGN KEY (id_utilisateur_envoie) REFERENCES utilisateur (id),
    PRIMARY KEY pk_clavardage_utilisateur (id_clavardage, id_utilisateur_envoie)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Affinite --------------------------------------------
CREATE TABLE IF NOT EXISTS affinite(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom Varchar(50) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Affinite_Utilisateur --------------------------------
CREATE TABLE IF NOT EXISTS affinite_utilisateur(
    id_utilisateur INT NOT NULL,
    id_affinite INT NOT NULL,
    FOREIGN KEY (id_affinite) REFERENCES affinite(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id),
    PRIMARY KEY pk_affinite_utilisateur (id_utilisateur, id_affinite)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Type_Notification -----------------------------------
CREATE TABLE IF NOT EXISTS type_notification(
    id INT PRIMARY KEY auto_increment,
    nom INT NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Auto_Increment --------------------------------------
CREATE TABLE IF NOT EXISTS type_objet(
  id INT PRIMARY KEY auto_increment,
  nom varchar(100) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Rencontre -------------------------------------------
CREATE TABLE IF NOT EXISTS rencontre(
  id INT PRIMARY KEY auto_increment,
  nom varchar(100) NOT NULL,
  `description` Varchar(4096),
  id_organisateur INT,
  adresse Varchar(100) NOT NULL,
  ville Varchar(100),
  `date` DATETIME NOT NULL,
  nb_participant INT DEFAULT(2),
  image varchar(1024),
  public Bool DEFAULT(true),

  FOREIGN KEY (id_organisateur) REFERENCES utilisateur(id)
  )
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Rencontre_Utilisateur -------------------------------
CREATE TABLE IF NOT EXISTS rencontre_utilisateur(
    id_rencontre INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_rencontre) REFERENCES rencontre(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
    PRIMARY KEY pk_rencontre_utilisateur (id_rencontre, id_utilisateur)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Auto_Increment --------------------------------------
CREATE TABLE IF NOT EXISTS notification(
    id INT PRIMARY KEY auto_increment,
    `type` INT NOT NULL,
    id_utilisateur INT NOT NULL,
    id_contenu INT,
    id_type_objet INT,
    contenu VARCHAR(1024),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (id_type_objet) REFERENCES type_objet(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Relation --------------------------------------------
CREATE TABLE IF NOT EXISTS relation(
    id_utilisateur1 INT NOT NULL,
    id_utilisateur2 INT NOT NULL,
    `type` ENUM('bloquer','ami') NOT NULL,
    FOREIGN KEY (id_utilisateur1) REFERENCES utilisateur(id),
    FOREIGN KEY (id_utilisateur2) REFERENCES utilisateur(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Evenement -------------------------------------------
CREATE TABLE IF NOT EXISTS evenement(
    id INT PRIMARY KEY auto_increment,
    nom varchar(100) NOT NULL,
    `description` Varchar(1024),
    ville Varchar(100) NOT NULL,
    adresse Varchar(100) NOT NULL,
    `date` DATETIME NOT NULL,
    prix varchar(20),
    image varchar(2048),
    nb_participant INT DEFAULT(0)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Evenement_Utilisateur -------------------------------
CREATE TABLE IF NOT EXISTS evenement_utilisateur(
    id_evenement INT NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_evenement) REFERENCES evenement(id),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
    PRIMARY KEY pk_evenement_utilisateur (id_evenement, id_utilisateur)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Demande_Ami -----------------------------------------
CREATE TABLE IF NOT EXISTS demande_ami(
    id_utilisateur_envoie INT NOT NULL,
    id_utilisateur_recoit INT NOT NULL,
    etat ENUM('Envoyee','Acceptee', 'refusee') NOT NULL,
    FOREIGN KEY (id_utilisateur_envoie) REFERENCES utilisateur(id),
    FOREIGN KEY (id_utilisateur_recoit) REFERENCES utilisateur(id),
    PRIMARY KEY pk_demande_ami (id_utilisateur_envoie, id_utilisateur_recoit)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Demande_Rencontre -----------------------------------
CREATE TABLE IF NOT EXISTS demande_rencontre(
    id INT PRIMARY KEY auto_increment,
    id_utilisateur INT NOT NULL,
    id_rencontre INT NOT NULL,
    etat ENUM('Envoyee','Acceptee', 'Refusee') NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (id_rencontre) REFERENCES rencontre(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Tag ------------------------------------------------
CREATE TABLE IF NOT EXISTS tag(
    id INT PRIMARY KEY auto_increment,
    nom Varchar(50) not null
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Tag_Rencontre --------------------------------------
CREATE TABLE IF NOT EXISTS tag_rencontre(
    id_rencontre INT not null,
    id_tag INT not null,
    FOREIGN KEY (id_rencontre) REFERENCES rencontre(id),
    FOREIGN KEY (id_tag) REFERENCES tag(id),
    PRIMARY KEY (id_tag, id_rencontre)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Tag_Evenement --------------------------------------
CREATE TABLE IF NOT EXISTS tag_evenement(
	id_tag INT not null,
    id_evenement INT not null,
    FOREIGN KEY (id_tag) REFERENCES tag(id),
    FOREIGN KEY (id_evenement) REFERENCES evenement(id),
    PRIMARY KEY (id_tag, id_evenement)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Signalement -----------------------------------------
CREATE TABLE IF NOT EXISTS signalement(
    id Int primary key auto_increment,
    id_utilisateur_envoie INT not null,
    id_objet INT,
    id_type_objet INT,
    FOREIGN KEY (id_utilisateur_envoie) REFERENCES utilisateur(id),
    FOREIGN KEY (id_type_objet) REFERENCES type_objet(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Categorie_Interet -----------------------------------
CREATE TABLE IF NOT EXISTS categorie_interet (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;
-- -----------------------------------------------------

-- Interet ---------------------------------------------
CREATE TABLE IF NOT EXISTS interet (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL UNIQUE,
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie_interet(id)
) ENGINE=InnoDB;
-- -----------------------------------------------------

-- Utilisateur_interet ---------------------------------
CREATE TABLE IF NOT EXISTS utilisateur_interet (
    id_utilisateur INT,
    id_interet INT,
    PRIMARY KEY (id_utilisateur, id_interet),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (id_interet) REFERENCES interet(id)
) ENGINE=InnoDB;
-- -----------------------------------------------------