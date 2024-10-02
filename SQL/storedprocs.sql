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
    
    -- Vérifie si l'email existe déjà
    SELECT COUNT(*) INTO nb_courriel FROM utilisateur WHERE email = p_courriel;
    
    IF nb_courriel != 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le courriel existe déjà.';
    ELSE
        -- Insertion de l'utilisateur avec les informations
        INSERT INTO utilisateur (email, nom, prenom, date_naissance, type_personnalite, password, genre)
        VALUES (p_courriel, p_nom, p_prenom, p_date_naissance, 1, p_password, p_sex);
    END IF;
END
// DELIMITER ;

DROP PROCEDURE IF EXISTS updateUserProfile;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE updateUserProfile(IN p_user_id INT,
     IN p_prenom VARCHAR(50), 
     IN p_nom VARCHAR(50), 
     IN p_image_profil VARCHAR(255), 
     IN p_background_image VARCHAR(255), 
     IN p_sexe ENUM('homme', 'femme', 'non-genre')
)
BEGIN
    UPDATE utilisateur
    SET 
        prenom = p_prenom,
        nom = p_nom,
        image_profil = p_image_profil,
        background_image = p_background_image,
        genre = p_sexe
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
    DELETE FROM utilisateur_interet WHERE id_utilisateur = utilisateurId;

    SET interetList = interetsParam;

    WHILE LENGTH(interetList) > 0 DO
        SET interetId = SUBSTRING_INDEX(interetList, ',', 1);
        IF interetId <> '' THEN
            -- Insérer l'intérêt
            INSERT INTO utilisateur_interet (id_utilisateur, id_interet) VALUES (utilisateurId, interetId);
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
	SELECT id INTO id_tag_inserted FROM tag WHERE nom = p_category;
	IF id_tag_inserted IS NULL THEN
		INSERT IGNORE INTO tag (nom) 
		VALUES (p_category);
	
		SELECT last_insert_id() INTO id_tag_inserted;
	END IF;
	
	SELECT id INTO id_evenement_inserted FROM evenement WHERE nom = p_nom AND ville = p_ville AND adresse = p_adresse AND `date` = p_date;
	IF id_evenement_inserted IS NULL THEN
		INSERT IGNORE INTO evenement (nom, `description`, ville, adresse, `date`, prix, image) 
		VALUES (p_nom, p_description, p_ville, p_adresse, p_date, p_prix, p_image);
		
		SELECT last_insert_id() INTO id_evenement_inserted;
	ELSE
		UPDATE evenement
		SET nom = p_nom, `description`= p_description, ville = p_ville, adresse = p_adresse, `date` = p_date, prix = p_prix, image = p_image 
		WHERE id = id_evenement_inserted;
	END IF;

	INSERT IGNORE INTO tag_evenement (id_tag, id_evenement)
	VALUES (id_tag_inserted, id_evenement_inserted);
    COMMIT;
END;
// DELIMITER ;
-- -----------------------------------------------------