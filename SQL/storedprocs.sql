USE BloomingPals;

-- Utilisateur ------------------------------------------------
DROP PROCEDURE IF EXISTS creerUsager;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE creerUsager(
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
        INSERT INTO users (email, last_name, first_name, birthdate, type_personality, password, gender)
        VALUES (p_courriel, p_nom, p_prenom, p_date_naissance, 1, p_password, p_sex);
    END IF;
END
// DELIMITER ;

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

-- Interets --------------------------------------------
DROP PROCEDURE IF EXISTS ajouterInterets;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE ajouterInterets(
    IN utilisateurId INT,
    IN interetsParam VARCHAR(255)
)
BEGIN
    DECLARE interetId INT;
    DECLARE interetList TEXT;

    -- Supprimer les intérêts existants pour l'utilisateur
    DELETE FROM users_interests WHERE id_user = utilisateurId;

    SET interetList = interetsParam;

    WHILE LENGTH(interetList) > 0 DO
        SET interetId = SUBSTRING_INDEX(interetList, ',', 1);
        IF interetId <> '' THEN
            -- Insérer l'intérêt
            INSERT INTO users_interests (id_users, id_interests) VALUES (utilisateurId, interetId);
        END IF;

        SET interetList = SUBSTRING(interetList, LENGTH(interetId) + 2);
    END WHILE;
END;
// DELIMITER ;
-- -----------------------------------------------------

-- Evenement ------------------------------------------------
DROP PROCEDURE IF EXISTS ajouterEvenement;

DELIMITER //
CREATE PROCEDURE ajouterEvenement (p_nom VARCHAR(100), p_description VARCHAR(1024), p_category VARCHAR(50), p_ville VARCHAR(100), p_adresse VARCHAR(100), p_date datetime, p_prix varchar(20), p_image varchar(2048))
BEGIN
	DECLARE id_tag_inserted INT;
    DECLARE id_evenement_inserted INT;
    
	START TRANSACTION;
	SELECT id INTO id_tag_inserted FROM tags WHERE name = p_category;
	IF id_tag_inserted IS NULL THEN
		INSERT IGNORE INTO tags (name) 
		VALUES (p_category);
	
		SELECT last_insert_id() INTO id_tag_inserted;
	END IF;
	
	SELECT id INTO id_evenement_inserted FROM events WHERE name = p_nom AND city = p_ville AND adress = p_adresse AND `date` = p_date;
	IF id_evenement_inserted IS NULL THEN
		INSERT IGNORE INTO events (name, `description`, city, adress, `date`, price, image) 
		VALUES (p_nom, p_description, p_ville, p_adresse, p_date, p_prix, p_image);
		
		SELECT last_insert_id() INTO id_evenement_inserted;
	ELSE
		UPDATE events
		SET name = p_nom, `description`= p_description, city = p_ville, adress = p_adresse, `date` = p_date, price = p_prix, image = p_image 
		WHERE id = id_evenement_inserted;
	END IF;

	INSERT IGNORE INTO tags_events (id_tag, id_event)
	VALUES (id_tag_inserted, id_evenement_inserted);
    COMMIT;
END;
// DELIMITER ;
-- -----------------------------------------------------

-- Ineret ------------------------------------------------
DROP PROCEDURE IF EXISTS ajouterInterets;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterInterets`(
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
END;
// DELIMITER ;
-- -----------------------------------------------------


-- Rencontre -------------------------------------------
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
