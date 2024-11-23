 -- DROP DATABASE IF EXISTS `BloomingPals`;
Create DATABASE IF NOT EXISTS `BloomingPals`  DEFAULT CHARACTER SET utf8mb4;
USE BloomingPals;

DROP TABLE IF EXISTS canadacities;
DROP TABLE IF EXISTS meetups_interests;
DROP TABLE IF EXISTS events_interests;
DROP TABLE IF EXISTS events_categories;
DROP TABLE IF EXISTS users_interests;
DROP TABLE IF EXISTS interests;
DROP TABLE IF EXISTS categories_interests;
DROP TABLE IF EXISTS search_history;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS chatRooms_users;
DROP TABLE IF EXISTS chatRooms;
DROP TABLE IF EXISTS affinities_users;
DROP TABLE IF EXISTS relations;
DROP TABLE IF EXISTS meetups_users;
DROP TABLE IF EXISTS events_users;
DROP TABLE IF EXISTS friendships_requests;
DROP TABLE IF EXISTS reports;
DROP TABLE IF EXISTS notifications;
DROP TABLE IF EXISTS new_notifications;
DROP TABLE IF EXISTS meetups_requests;
DROP TABLE IF EXISTS meetups;
DROP TABLE IF EXISTS objects_types;
DROP TABLE IF EXISTS answers;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS actions;
DROP TABLE IF EXISTS types_actions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS types_notifications;
DROP TABLE IF EXISTS affinities;
DROP TABLE IF EXISTS types_personalities;
DROP TABLE IF EXISTS personalities;
DROP TABLE IF EXISTS groups_personalities;


-- types_personalities -----------------------------------
CREATE TABLE IF NOT EXISTS groups_personalities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
)
ENGINE = InnoDB;

 CREATE TABLE IF NOT EXISTS personalities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    group_perso INT,
    type VARCHAR(4) NOT NULL, 
    name VARCHAR(50) NOT NULL, 
    nameDescription VARCHAR(500) NOT NULL,  
    FOREIGN KEY (group_perso) REFERENCES groups_personalities (id)
)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS types_personalities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type CHAR(1) NOT NULL UNIQUE,  
    description VARCHAR(50) NOT NULL,  
    CHECK (type IN ('E', 'I', 'S', 'N', 'T', 'F', 'P', 'J')) 
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS questions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    no INT NOT NULL, 
    question VARCHAR(1000) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS answers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT NOT NULL,  
    type_answer CHAR(1) NOT NULL, 
    answer VARCHAR(1000) NOT NULL,  
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE,
    FOREIGN KEY (type_answer) REFERENCES types_personalities(type)
) ENGINE = InnoDB;



-- -----------------------------------------------------
-- users -----------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    is_admin BOOLEAN DEFAULT FALSE,
    email VARCHAR(255) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
    personality INT DEFAULT NULL,
    image_profil VARCHAR(2048) DEFAULT 'images/flower.png',
    background_image VARCHAR(2048) DEFAULT 'images/R.jpg',
    gender ENUM('homme', 'femme', 'non-genre') NOT NULL,
    password CHAR(128) NOT NULL,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    remember_token VARCHAR(100) NULL,
     daily_notification datetime,
    confidentiality enum('public','friends','prive') DEFAULT 'public',
    notification tinyint DEFAULT 1,
    FOREIGN KEY (personality) REFERENCES personalities (id)
) ENGINE=InnoDB;

-- -----------------------------------------------------

-- search_history --------------------------------
CREATE TABLE IF NOT EXISTS search_history(
    id_user INT,
    text VARCHAR(200) NOT NULL,
    `date` Date NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users (id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- chatRooms ------------------------------------
CREATE TABLE IF NOT EXISTS chatRooms(
    id INT PRIMARY KEY auto_increment,
    `name` varchar(20) default null
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Message ---------------------------------------------
CREATE TABLE IF NOT EXISTS messages(
    id INT PRIMARY KEY auto_increment,
    id_chatRoom INT NOT NULL,
    id_user INT NOT NULL,
    content Varchar(2000) NOT NULL,
    `modify` Bool DEFAULT(False),
    created_at datetime,
    FOREIGN KEY (id_chatRoom) REFERENCES chatRooms (id),
    FOREIGN KEY (id_user) REFERENCES users (id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- chatRooms_users ------------------------------
CREATE TABLE IF NOT EXISTS chatRooms_users(
    id_chatRoom INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_chatRoom) REFERENCES chatRooms (id),
    FOREIGN KEY (id_user) REFERENCES users (id),
    PRIMARY KEY pk_chatRooms_users (id_chatRoom, id_user)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- affinities --------------------------------------------
CREATE TABLE IF NOT EXISTS affinities(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name Varchar(50) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- affinities_users --------------------------------
CREATE TABLE IF NOT EXISTS affinities_users(
    id_user INT NOT NULL,
    id_affinity INT NOT NULL,
    FOREIGN KEY (id_affinity) REFERENCES affinities(id),
    FOREIGN KEY (id_user) REFERENCES users (id),
    PRIMARY KEY pk_affinities_users (id_user, id_affinity)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- types_notifications -----------------------------------
CREATE TABLE IF NOT EXISTS types_notifications(
    id INT PRIMARY KEY auto_increment,
    name Varchar(50) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- Auto_Increment --------------------------------------
CREATE TABLE IF NOT EXISTS objects_types(
  id INT PRIMARY KEY auto_increment,
  name varchar(100) NOT NULL
)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- meetups -------------------------------------------
CREATE TABLE IF NOT EXISTS meetups(
  id INT PRIMARY KEY auto_increment,
  name varchar(100) NOT NULL,
  `description` Varchar(4096),
  id_owner INT,
  adress Varchar(100) NOT NULL,
  city Varchar(100),
  `date` DATETIME NOT NULL,
  nb_participant INT DEFAULT(2),
  image varchar(2048) NOT NULL,
  public Bool DEFAULT(true),
  created_at datetime DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (id_owner) REFERENCES users(id)
  )
ENGINE = InnoDB;
-- -----------------------------------------------------
-- meetups_users -------------------------------
CREATE TABLE IF NOT EXISTS meetups_users(
    id_meetup INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_meetup) REFERENCES meetups(id),
    FOREIGN KEY (id_user) REFERENCES users(id),
    PRIMARY KEY pk_meetup_user (id_meetup, id_user)
)
ENGINE = InnoDB;
-- ----------------------------------------------------
-- meetups_requests -----------------------------------
CREATE TABLE IF NOT EXISTS meetups_requests(
    id INT PRIMARY KEY auto_increment,
    id_user INT NOT NULL,
    id_meetup INT NOT NULL,
    status ENUM('pending', 'accepted', 'refused') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_meetup) REFERENCES meetups(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Notifications--------------------------------------
CREATE TABLE IF NOT EXISTS notifications(
    id INT PRIMARY KEY auto_increment,
    `type` INT NOT NULL,
    id_user INT NOT NULL,
    content Varchar(4096),
    status ENUM ('read','unread') NOT NULL,
    created_date datetime,
    FOREIGN KEY (id_user) REFERENCES users(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- New Notifications
CREATE TABLE IF NOT EXISTS new_notifications(
    id INT PRIMARY KEY auto_increment,
    `type` INT NOT NULL,
    id_user INT NOT NULL,
    content Varchar(4096),
    created_date datetime,    
    FOREIGN KEY (id_user) REFERENCES users(id)
)
ENGINE = InnoDB;

-- relations --------------------------------------------
CREATE TABLE IF NOT EXISTS relations(
    id_user1 INT NOT NULL,
    id_user2 INT NOT NULL,
    `type` ENUM('Blocked','Friend') NOT NULL,
    FOREIGN KEY (id_user1) REFERENCES users(id),
    FOREIGN KEY (id_user2) REFERENCES users(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- events -------------------------------------------
CREATE TABLE IF NOT EXISTS `events`(
    id INT PRIMARY KEY auto_increment,
    `name` varchar(100) NOT NULL,
    `description` Varchar(1024),
    city Varchar(100) NOT NULL,
    adress Varchar(100) NOT NULL,
    `date` DATETIME NOT NULL,
    price varchar(20),
    image varchar(2048)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- events_users -------------------------------
CREATE TABLE IF NOT EXISTS events_users(
    id_event INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_event) REFERENCES events(id),
    FOREIGN KEY (id_user) REFERENCES users(id),
    PRIMARY KEY pk_events_users (id_event, id_user)
)
ENGINE = InnoDB;


-- -----------------------------------------------------

-- friendships_requests -----------------------------------------
select * from friendships_requests;
CREATE TABLE IF NOT EXISTS friendships_requests(
    id_user_send INT NOT NULL,
    id_user_receive INT NOT NULL,
    status ENUM('pending', 'accepted', 'refused') DEFAULT 'pending',
    FOREIGN KEY (id_user_send) REFERENCES users(id),
    FOREIGN KEY (id_user_receive) REFERENCES users(id),
    PRIMARY KEY pk_friendships_requests (id_user_send, id_user_receive)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- reports -----------------------------------------
CREATE TABLE IF NOT EXISTS reports(
    id Int primary key auto_increment,
    id_user_send INT not null,
    id_object INT,
    id_type_object INT,
    FOREIGN KEY (id_user_send) REFERENCES users(id),
    FOREIGN KEY (id_type_object) REFERENCES objects_types(id)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- categories_interests -----------------------------------
CREATE TABLE IF NOT EXISTS categories_interests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;
-- -----------------------------------------------------

-- interests ---------------------------------------------
CREATE TABLE IF NOT EXISTS interests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL UNIQUE,
    id_category INT,
    FOREIGN KEY (id_category) REFERENCES categories_interests(id)
) ENGINE=InnoDB;
-- -----------------------------------------------------

-- users_interests ---------------------------------
CREATE TABLE IF NOT EXISTS users_interests (
    id_user INT,
    id_interest INT,
    PRIMARY KEY (id_user, id_interest),
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_interest) REFERENCES interests(id)
) ENGINE=InnoDB;
-- -----------------------------------------------------

-- meetups_interests --------------------------------------
CREATE TABLE IF NOT EXISTS meetups_interests(
    id_interest INT not null,
    id_meetup INT not null,
	FOREIGN KEY (id_interest) REFERENCES interests(id),
    FOREIGN KEY (id_meetup) REFERENCES meetups(id),
    PRIMARY KEY (id_interest, id_meetup)
)
ENGINE = InnoDB;
-- -----------------------------------------------------
select * from events_interests;
-- events_interests --------------------------------------
CREATE TABLE IF NOT EXISTS events_interests(
    id_interest INT not null,
    id_event INT not null,
	FOREIGN KEY (id_interest) REFERENCES interests(id),
    FOREIGN KEY (id_event) REFERENCES `events`(id),
    PRIMARY KEY (id_interest, id_event)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- events_categories --------------------------------------
CREATE TABLE IF NOT EXISTS events_categories(
	id_category INT not null,
    id_event INT not null,
    FOREIGN KEY (id_category) REFERENCES categories_interests(id),
    FOREIGN KEY (id_event) REFERENCES `events`(id),
    PRIMARY KEY (id_category, id_event)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- types_feeds
CREATE TABLE IF NOT EXISTS types_actions(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(50)
)
ENGINE = InnoDB;
-- -----------------------------------------------------

-- feeds ----------
CREATE TABLE IF NOT EXISTS actions(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    type INT NOT NULL,
    content JSON,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (type) REFERENCES types_actions(id)
)
ENGINE = InnoDB;

-- canada_cities ---------------------------------------
CREATE TABLE canadacities (
  city TEXT(120),
  city_ascii TEXT(120),
  province_id TEXT(2),
  province_name TEXT(50),
  lat TEXT(20),
  lng TEXT(20),
  population FLOAT,
  density FLOAT,
  timezone TEXT(120),
  ranking INT,
  postal TEXT(4000),
  id TEXT(10)
);
