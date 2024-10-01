USE BloomingPals;

-- User ------------------------------------------------
DROP PROCEDURE IF EXISTS creerUsager;
DELIMITER $$
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
    
    -- Vérifie si l'email existe déjà
    SELECT COUNT(*) INTO nb_courriel FROM utilisateur WHERE email = p_courriel;
    
    IF nb_courriel != 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le courriel existe déjà.';
    ELSE
        -- Insertion de l'utilisateur avec les informations
        INSERT INTO utilisateur (email, nom, prenom, date_naissance, type_personnalite, password, genre)
        VALUES (p_courriel, p_nom, p_prenom, p_date_naissance, 1, p_password, p_sex);
    END IF;
END $$

DROP PROCEDURE IF EXISTS updateUserProfile;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserProfile`(IN p_user_id INT,
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
END $$
-- -----------------------------------------------------