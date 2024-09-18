USE BloomingPals;

-- User ------------------------------------------------
DROP PROCEDURE creerUsager;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `creerUsager`(
    IN p_courriel VARCHAR(255),
    IN p_nom VARCHAR(50),
    IN p_prenom VARCHAR(50),
    IN p_date_naissance DATE,
    IN p_password VARCHAR(255)
)
BEGIN
    DECLARE nb_courriel INT;
    
    -- Vérifie si l'email existe déjà
    SELECT COUNT(*) INTO nb_courriel FROM utilisateur WHERE email = p_courriel;
    
    IF nb_courriel != 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le courriel existe déjà.';
    ELSE
        -- Insertion de l'utilisateur avec les informations
        INSERT INTO utilisateur (email, nom, prenom, date_naissance, type_personnalite, mot_passe, estAdmin)
        VALUES (p_courriel, p_nom, p_prenom, p_date_naissance, 1, p_password, 0);
    END IF;
END $$
-- -----------------------------------------------------