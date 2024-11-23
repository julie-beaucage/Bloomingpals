
USE BloomingPals;

-- ------------------------------------------------------------------------------------------------
-- --------------Test Personalité
-- ------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS insertTablePersonality;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE insertTablePersonality(
    IN p_group_perso INT,
    IN p_type VARCHAR(4),
    IN p_name VARCHAR(50),
    IN p_nameDescription TEXT
)
BEGIN
    DECLARE type_exists INT;
    SELECT COUNT(*) INTO type_exists 
    FROM personalities 
    WHERE type = p_type;
    IF type_exists > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Type de personnalité existe déjà.';
    ELSE
        INSERT INTO personalities (group_perso, type, name, nameDescription) 
        VALUES (p_group_perso, p_type, p_name, p_nameDescription);
    END IF;
END //
DELIMITER ;


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
// DELIMITER ;
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

DROP PROCEDURE IF EXISTS updateAccount;
DELIMITER //
Create Procedure updateAccount(_id INT,_password CHAR(128), _email VARCHAR(255))
BEGIN
	IF( _password !='') 
    THEN
		UPDATE users SET password =_password where id =_id;
	END IF;
    
    IF( _email !='') 
    THEN
		UPDATE users SET email =_email where id=_id;
	END IF;
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
CREATE PROCEDURE creerRencontre( _nom varchar(100), _description varchar(4096), _id_organisateur INT, _adresse Varchar(100), _ville Varchar(100), _date DATETIME ,_nb_participant INT, _image varchar(2048), _public Bool)
BEGIN

	START TRANSACTION;
		Insert INTO meetups (name, `description`, id_owner, adress, city, `date`, nb_participant, image, public) 
		VALUES ( _nom, _description, _id_organisateur, _adresse, _ville, _date,_nb_participant,	_image, _public);
	COMMIT;
     select LAST_INSERT_ID();
	
END;
// DELIMITER ; 

DROP PROCEDURE IF EXISTS modifierRencontre;

DELIMITER //
CREATE PROCEDURE modifierRencontre (id_rencontre INT ,_nom varchar(100), _description varchar(4096),   _id_organisateur INT, _adresse Varchar(100), _ville Varchar(100), _date DATETIME ,_nb_participant INT, _image varchar(2048), _public Bool)
BEGIN
	START TRANSACTION;
		  UPDATE meetups set name=_nom where id = id_rencontre;
          UPDATE meetups set meetups.`description`=_description where id = id_rencontre;
          UPDATE meetups set adress=_adresse where id = id_rencontre;
          UPDATE meetups set city=_ville where id = id_rencontre;
          UPDATE meetups set meetups.`date`=_date where id = id_rencontre;
          UPDATE meetups set nb_participant=_nb_participant where id = id_rencontre;
          
          IF(_image != '') THEN
			IF(_image = 'delete') THEN
				UPDATE meetups set image=null where id = id_rencontre;
              else
				UPDATE meetups set image=_image where id = id_rencontre;
              END IF;
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
		DELETE from meetups_requests where id_meetup=id_rencontre;
		DELETE FROM meetups where meetups.id= id_rencontre;
	COMMIT;
	
END;
// DELIMITER ;
DROP PROCEDURE IF EXISTS send_meetup_request;
DELIMITER //
CREATE PROCEDURE send_meetup_request(IN p_user_id INT, IN p_meetup_id INT)
BEGIN
    DECLARE existing_request_count INT;
    SELECT COUNT(*) INTO existing_request_count
    FROM meetups_requests
    WHERE id_user = p_user_id
    AND id_meetup = p_meetup_id;

    IF existing_request_count = 0 THEN
        INSERT INTO meetups_requests (id_user, id_meetup, status)
        VALUES (p_user_id, p_meetup_id, 'pending');
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Request already sent';
    END IF;
END;
// DELIMITER ;


DROP PROCEDURE IF EXISTS cancel_meetup_request;
DELIMITER //
CREATE PROCEDURE cancel_meetup_request(IN p_user_id INT, IN p_meetup_id INT)
BEGIN
    DELETE FROM meetups_requests
    WHERE id_user = p_user_id
    AND id_meetup = p_meetup_id
    AND status = 'pending';
END;
// DELIMITER ;


DROP PROCEDURE IF EXISTS accept_meetup_request;
DELIMITER //
CREATE PROCEDURE accept_meetup_request(IN p_owner_id INT, IN p_user_id INT, IN p_meetup_id INT)
BEGIN
    DECLARE request_status ENUM('pending', 'accepted', 'refused');
    
    IF EXISTS (SELECT 1 FROM meetups WHERE id = p_meetup_id AND id_owner = p_owner_id) THEN
        SELECT status INTO request_status
        FROM meetups_requests
        WHERE id_user = p_user_id
        AND id_meetup = p_meetup_id;

        IF request_status = 'pending' THEN
            UPDATE meetups_requests
            SET status = 'accepted'
            WHERE id_user = p_user_id
            AND id_meetup = p_meetup_id;

            INSERT INTO meetups_users (id_meetup, id_user)
            VALUES (p_meetup_id, p_user_id);
        ELSE
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Request is not in pending status';
        END IF;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'User is not the owner of the meetup';
    END IF;
END;
// DELIMITER ;

DROP PROCEDURE IF EXISTS refuse_meetup_request;
DELIMITER //
CREATE PROCEDURE refuse_meetup_request(IN p_owner_id INT, IN p_user_id INT, IN p_meetup_id INT)
BEGIN
    DECLARE request_status ENUM('pending', 'accepted', 'refused');
    
    IF EXISTS (SELECT 1 FROM meetups WHERE id = p_meetup_id AND id_owner = p_owner_id) THEN
        SELECT status INTO request_status
        FROM meetups_requests
        WHERE id_user = p_user_id
        AND id_meetup = p_meetup_id;

        IF request_status = 'pending' THEN
            UPDATE meetups_requests
            SET status = 'refused'
            WHERE id_user = p_user_id
            AND id_meetup = p_meetup_id;
        ELSE
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Request is not in pending status';
        END IF;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'User is not the owner of the meetup';
    END IF;
END$$
// DELIMITER ;

-- -----------------------------------------------------

-- Notificications
DROP PROCEDURE IF EXISTS addNewNotification;
DELIMITER //
CREATE PROCEDURE addNewNotification(id_user INT, _type varchar(50), content varchar(4096))
BEGIN
	START TRANSACTION;
		  INSERT INTO new_notifications (id_user,`type`,content,created_date) VALUES(id_user,_type,content,NOW());
	COMMIT;
	
END;
// DELIMITER ;

DROP PROCEDURE IF EXISTS moveNotification;
DELIMITER //
CREATE PROCEDURE moveNotification(id_new_notification INT,id_user INT, id_type INT, content varchar(4096),_date datetime)
BEGIN

	START TRANSACTION;
		  INSERT INTO notifications (id_user,`type`,content,status,created_date) VALUES(id_user,id_type,content,'read',_date);
          Delete From new_notifications where id = id_new_notification;
	COMMIT;
	
END;
// DELIMITER ;

DROP PROCEDURE IF EXISTS moveTableNewNotifications;
DELIMITER //
Create Procedure moveTableNewNotifications( _id_user INT)
Begin

	Declare done INT DEFAULT FALSE;
	DECLARE id_type INT;
	declare _content Varchar(4096);
    Declare _date datetime;

	Declare cur CURSOR FOR SELECT `type`,content,created_date from new_notifications where new_notifications.id_user= _id_user;
	 DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

	OPEN  cur;

	getNotif: LOOP
		Fetch cur into id_type,_content,_date;
		
		IF done Then
			LEAVE getNotif;
		end if;
		
		Insert into notifications (`type`, id_user, content, status,created_date) VALUES (id_type, _id_user, _content, 'unread',_date);
		End loop;
		
		close cur;
        
        Delete from new_notifications where id_user=_id_user;
commit;
End;
// DELIMITER ;

DROP PROCEDURE IF EXISTS deleteNotification;
DELIMITER //
Create Procedure deleteNotification(_id INT)
BEGIN
	DELETE FROM notifications WHERE id=_id;
	
END;
// DELIMITER ;

-- Feed
Drop procedure if exists fillFeed;
DELIMITER //
Create procedure fillFeed(_id Int)
BEGIN 
	DECLARE increment  INT unsigned DEFAULT 1;
    
    INSERT INTO actions (id_user,type,content) values(_id,2,json_object('user',3));
		set increment = increment+1;
    
    while increment<=100 DO
		INSERT INTO actions (id_user,type,content) values(_id,1,json_object('user',2,'meetup',1));
        set increment = increment+1;
        INSERT INTO actions (id_user,type,content) values(_id,1,json_object('user',3,'meetup',4));
		set increment = increment+1;
	end while;
    INSERT INTO actions (id_user,type,content) values(_id,2,json_object('user',3));
		set increment = increment+1;
	
END;
// DELIMITER ;

Drop procedure if exists addAction;
DELIMITER //
Create procedure addAction(_id_user INT, type varchar(40),_content JSON)
BEGIN 
	DECLARE type_id INT;
    
    Select id from types_actions where name = type into type_id;
    
    INSERT INTO actions (id_user,type,content) values(_id_user,type_id,_content);
END;
// DELIMITER ;