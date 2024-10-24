USE BloomingPals;

-- ------------------------------------------------------------------------------------------------
-- --------------Test Personalité
-- ------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS update_user_personality;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_personality`(
IN p_user_id INT, 
IN p_type VARCHAR(4))
BEGIN
DECLARE id_type INT;
DECLARE nb_type INT;
DECLARE nb_user INT;

    SELECT COUNT(*) INTO nb_type FROM personalities WHERE type = p_type;
    SELECT COUNT(*) INTO nb_user FROM users WHERE id = p_user_id;
	
    SELECT id INTO id_type 
    FROM personalities 
    WHERE type = p_type;
    
    IF nb_type = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Type de personalité non valide.';
    ELSEIF nb_user = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Usager non valide';
        	ELSE
		UPDATE users SET personality = id_type
		WHERE id = p_user_id;
	END IF;
        
END
DELIMITER //
-- ------------------------------------------------------------------------------------------------
-- --------------UTILISATEUR
-- ------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS creerUsager;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `creerUsager`(
    IN p_courriel VARCHAR(255),
    IN p_nom VARCHAR(50),
    IN p_prenom VARCHAR(50),
    IN p_date_naissance DATE,
    IN p_password VARCHAR(255),
    IN p_sex ENUM('femme', 'homme', 'non-genre')
)
BEGIN
    DECLARE nb_courriel INT;
    
    SELECT COUNT(*) INTO nb_courriel FROM users WHERE email = p_courriel;
    
    IF nb_courriel != 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le courriel existe déjà.';
    ELSE
        INSERT INTO users (email, last_name, first_name, birthdate, password, gender)
        VALUES (p_courriel, p_nom, p_prenom, p_date_naissance, p_password, p_sex);
    END IF;
END
// DELIMITER ;
-- ------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS updateUserProfile;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE updateUserProfile(IN p_user_id INT,
     IN p_prenom VARCHAR(50), 
     IN p_nom VARCHAR(50), 
     IN p_image_profil VARCHAR(500), 
     IN p_background_image VARCHAR(500), 
     IN p_sexe ENUM('homme', 'femme', 'non-genre')
)
BEGIN
    UPDATE users
    SET 
        first_name = p_prenom,
        last_name = p_nom,
        image_profil = p_image_profil,
        background_image = p_background_image,
        gender = p_sexe
    WHERE id = p_user_id;
END;
// DELIMITER ;
-- -----------------------------------------------------

-- Evenement ------------------------------------------------
DROP PROCEDURE IF EXISTS addEvent;
DELIMITER //
CREATE PROCEDURE addEvent (p_name VARCHAR(100), p_description VARCHAR(1024), p_category VARCHAR(50), p_city VARCHAR(100), p_adress VARCHAR(100), p_date datetime, p_price varchar(20), p_image varchar(2048))
BEGIN
	DECLARE id_category_inserted INT;
    DECLARE id_event_inserted INT;
    
	START TRANSACTION;
	SELECT id INTO id_category_inserted FROM categories_interests WHERE `name` = p_category;
	IF id_category_inserted IS NULL THEN
		INSERT IGNORE INTO categories_interests (`name`) 
		VALUES (p_category);
	
		SELECT last_insert_id() INTO id_category_inserted;
	END IF;
	
	SELECT id INTO id_event_inserted FROM events WHERE `name` = p_name AND city = p_city AND adress = p_adress AND `date` = p_date;
	IF id_event_inserted IS NULL THEN
		INSERT IGNORE INTO events (`name`, `description`, city, adress, `date`, price, image) 
		VALUES (p_name, p_description, p_city, p_adress, p_date, p_price, p_image);
		
		SELECT last_insert_id() INTO id_event_inserted;
	ELSE
		UPDATE events
		SET `name` = p_name, `description`= p_description, city = p_city, adress = p_adress, `date` = p_date, price = p_price, image = p_image 
		WHERE id = id_event_inserted;
	END IF;

	INSERT IGNORE INTO events_categories (id_category, id_event)
	VALUES (id_category_inserted, id_event_inserted);
    COMMIT;
END;
// DELIMITER ;

DROP PROCEDURE IF EXISTS addEventInterests;
DELIMITER //
CREATE PROCEDURE addEventInterests (p_id_event INT, p_interest VARCHAR(50))
BEGIN
	DECLARE id_interest_inserted INT;
    
	START TRANSACTION;
	SELECT id INTO id_interest_inserted FROM interests WHERE `name` = p_interest;
	IF id_interest_inserted IS NULL THEN
		INSERT IGNORE INTO interests (`name`) 
		VALUES (p_interest);
	
		SELECT last_insert_id() INTO id_interest_inserted;
	END IF;

	INSERT IGNORE INTO events_interests (id_interest, id_event)
	VALUES (id_interest_inserted, p_id_event);
    COMMIT;
END;
// DELIMITER ;

-- ------------------------------------------------------------------------------------------------
-- --------------INTERET
-- ------------------------------------------------------------------------------------------------

-- PROCEDURE POUR UTILISRE POUR FAIRE ROULER LE SCRIPT D'INSERTION D'INTERETS DE LA TABLE
DROP PROCEDURE IF EXISTS ajouterInterets;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterInterets`(
    IN p_nom_interet VARCHAR(50),
    IN p_id_category INT
)
BEGIN
	DECLARE nb_interet INT;
    SELECT COUNT(*) INTO nb_interet 
    FROM interests 
    WHERE name = p_nom_interet;

    IF nb_interet != 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ERREUR: Intérêt existe déjà.';
    ELSE
        INSERT INTO interests (name, id_category) 
        VALUES (p_nom_interet, p_id_category);
    END IF;
END;
// DELIMITER ;
-- -----------------------------------------------------
-- PROCEDURE POUR AJOUTER/MODIF INTERET DE USER
DROP PROCEDURE IF EXISTS add_user_interests;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user_interests`(
    IN utilisateurId INT,
    IN interetsParam VARCHAR(1000)
)
BEGIN
    DECLARE interetId INT;
    DECLARE interetList TEXT;

    DELETE FROM users_interests WHERE id_user = utilisateurId;

    SET interetList = interetsParam;

    WHILE LENGTH(interetList) > 0 DO
        SET interetId = SUBSTRING_INDEX(interetList, ',', 1);
        IF interetId <> '' THEN
            INSERT INTO users_interests (id_user, id_interest) VALUES (utilisateurId, interetId);
        END IF;

        SET interetList = SUBSTRING(interetList, LENGTH(interetId) + 2);
    END WHILE;
END
// DELIMITER ;
-- ------------------------------------------------------------------------------------------------
-- --------------RENCONTRE
-- ------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS creerRencontre;
DELIMITER //
CREATE PROCEDURE creerRencontre( _nom varchar(100), _description varchar(4096), _id_organisateur INT, _adresse Varchar(100), _ville Varchar(100), _date DATETIME ,_nb_participant INT, _image varchar(1024), _public Bool)
BEGIN

	START TRANSACTION;
		Insert INTO meetups (name, `description`, id_owner, adress, city, `date`, nb_participant, image, public) 
		VALUES ( _nom, _description, _id_organisateur, _adresse, _ville, _date,_nb_participant,	_image, _public);
	COMMIT;
	
END;
// DELIMITER ; 

DROP PROCEDURE IF EXISTS modifierRencontre;

DELIMITER //
CREATE PROCEDURE modifierRencontre (id_rencontre INT ,_nom varchar(100), _description varchar(4096),   _id_organisateur INT, _adresse Varchar(100), _ville Varchar(100), _date DATETIME ,_nb_participant INT, _image varchar(1024), _public Bool)
BEGIN
	START TRANSACTION;
		  UPDATE meetups set name=_nom where id = id_rencontre;
          UPDATE meetups set meetups.`description`=_description where id = id_rencontre;
          UPDATE meetups set adress=_adresse where id = id_rencontre;
          UPDATE meetups set city=_ville where id = id_rencontre;
          UPDATE meetups set meetups.`date`=_date where id = id_rencontre;
          UPDATE meetups set nb_participant=_nb_participant where id = id_rencontre;
          
          IF(_image != '') THEN
          UPDATE meetups set image=_image where id = id_rencontre;
          END IF;
          
          UPDATE meetups set public=_public where id = id_rencontre;
	COMMIT;
	
END;
// DELIMITER ;
DROP PROCEDURE IF EXISTS effacerRencontre;
DELIMITER //
CREATE PROCEDURE effacerRencontre(id_rencontre INT)
BEGIN
	START TRANSACTION;
		  DELETE FROM meetups where meetups.id= id_rencontre;
	COMMIT;
	
END;
// DELIMITER ;
-- -----------------------------------------------------
