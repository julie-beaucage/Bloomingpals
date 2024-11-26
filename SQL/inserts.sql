USE BloomingPals;
SELECT * FROM meetups_requests;

-- Interets --
INSERT INTO categories_interests (name) VALUES 
('Sport'),
('Culturel'),
('Musique'),
('Nerd'),
('Social'),
('Art');

-- Notifications types
Insert INTO types_notifications (name) Values('Meetup Request');
Insert INTO types_notifications (name) Values('Friendship Request');
Insert INTO types_notifications (name) Values('Meetup Interest');
Insert INTO types_notifications (name) Values('Friendship Accept');

-- Sport
INSERT INTO interests (name, id_category) VALUES ('Bowling', 1);
INSERT INTO interests (name, id_category) VALUES ('Tennis', 1);
INSERT INTO interests (name, id_category) VALUES ('Ski', 1);
INSERT INTO interests (name, id_category) VALUES ('Planche à neige', 1);
INSERT INTO interests (name, id_category) VALUES ('Skidoo', 1);
INSERT INTO interests (name, id_category) VALUES ('Nage', 1);
INSERT INTO interests (name, id_category) VALUES ('Plongée', 1);
INSERT INTO interests (name, id_category) VALUES ('Saut en plongée', 1);
INSERT INTO interests (name, id_category) VALUES ('Hockey', 1);
INSERT INTO interests (name, id_category) VALUES ('Ringuette', 1);
INSERT INTO interests (name, id_category) VALUES ('Marche', 1);
INSERT INTO interests (name, id_category) VALUES ('Randonnée pédestre', 1);
INSERT INTO interests (name, id_category) VALUES ('Soccer', 1);
INSERT INTO interests (name, id_category) VALUES ('Basketball', 1);
INSERT INTO interests (name, id_category) VALUES ('Billard', 1);
INSERT INTO interests (name, id_category) VALUES ('Patinage', 1);
INSERT INTO interests (name, id_category) VALUES ('Ping-pong', 1);
INSERT INTO interests (name, id_category) VALUES ('Escalade', 1);
INSERT INTO interests (name, id_category) VALUES ('Course à pied', 1);
INSERT INTO interests (name, id_category) VALUES ('Musculation', 1);
INSERT INTO interests (name, id_category) VALUES ('Kayak', 1);
INSERT INTO interests (name, id_category) VALUES ('Volleyball', 1);
INSERT INTO interests (name, id_category) VALUES ('Badminton', 1);
INSERT INTO interests (name, id_category) VALUES ('Danse', 1);
INSERT INTO interests (name, id_category) VALUES ('Vélo', 1);
INSERT INTO interests (name, id_category) VALUES ('Patin à roulettes', 1);
INSERT INTO interests (name, id_category) VALUES ('Athlétisme', 1);
INSERT INTO interests (name, id_category) VALUES ('Golf', 1);
INSERT INTO interests (name, id_category) VALUES ('Crossfit', 1);
INSERT INTO interests (name, id_category) VALUES ('Arts martiaux', 1);
INSERT INTO interests (name, id_category) VALUES ('Surf', 1);
INSERT INTO interests (name, id_category) VALUES ('Ski nautique', 1);
INSERT INTO interests (name, id_category) VALUES ('Raquette à neige', 1);
INSERT INTO interests (name, id_category) VALUES ('Lutte', 1);
INSERT INTO interests (name, id_category) VALUES ('Tir à l''arc', 1);
INSERT INTO interests (name, id_category) VALUES ('Cyclisme', 1);
INSERT INTO interests (name, id_category) VALUES ('Rugby', 1);
INSERT INTO interests (name, id_category) VALUES ('Ultimate frisbee', 1);
INSERT INTO interests (name, id_category) VALUES ('Escalade en salle', 1);
INSERT INTO interests (name, id_category) VALUES ('Paddleboard', 1);

-- Culture
INSERT INTO interests (name, id_category) VALUES ('Lecture', 2);
INSERT INTO interests (name, id_category) VALUES ('Écriture', 2);
INSERT INTO interests (name, id_category) VALUES ('Jeux d\échecs', 2);
INSERT INTO interests (name, id_category) VALUES ('Visite de musée', 2);
INSERT INTO interests (name, id_category) VALUES ('Cinéma', 2);
INSERT INTO interests (name, id_category) VALUES ('Histoire', 2);
INSERT INTO interests (name, id_category) VALUES ('Poésie', 2);
INSERT INTO interests (name, id_category) VALUES ('Cuisine régionale', 2);
INSERT INTO interests (name, id_category) VALUES ('Voyage culturel', 2);

-- Musicale
INSERT INTO interests (name, id_category) VALUES ('Piano', 3);
INSERT INTO interests (name, id_category) VALUES ('Guitare', 3);
INSERT INTO interests (name, id_category) VALUES ('Batterie', 3);
INSERT INTO interests (name, id_category) VALUES ('Violon', 3);
INSERT INTO interests (name, id_category) VALUES ('Flûte', 3);
INSERT INTO interests (name, id_category) VALUES ('Saxophone', 3);
INSERT INTO interests (name, id_category) VALUES ('Clarinette', 3);
INSERT INTO interests (name, id_category) VALUES ('Harmonica', 3);
INSERT INTO interests (name, id_category) VALUES ('Trompette', 3);
INSERT INTO interests (name, id_category) VALUES ('Accordéon', 3);
INSERT INTO interests (name, id_category) VALUES ('Synthétiseur', 3);
INSERT INTO interests (name, id_category) VALUES ('Ukulélé', 3);
INSERT INTO interests (name, id_category) VALUES ('Classique', 3);
INSERT INTO interests (name, id_category) VALUES ('Rock', 3);
INSERT INTO interests (name, id_category) VALUES ('Pop', 3);
INSERT INTO interests (name, id_category) VALUES ('Jazz', 3);
INSERT INTO interests (name, id_category) VALUES ('Hip-hop', 3);
INSERT INTO interests (name, id_category) VALUES ('Reggae', 3);
INSERT INTO interests (name, id_category) VALUES ('Blues', 3);
INSERT INTO interests (name, id_category) VALUES ('Électro', 3);
INSERT INTO interests (name, id_category) VALUES ('Folk', 3);
INSERT INTO interests (name, id_category) VALUES ('Métal', 3);
INSERT INTO interests (name, id_category) VALUES ('Gospel', 3);
INSERT INTO interests (name, id_category) VALUES ('R&B', 3);
INSERT INTO interests (name, id_category) VALUES ('Country', 3);
INSERT INTO interests (name, id_category) VALUES ('Chanter', 3);
INSERT INTO interests (name, id_category) VALUES ('Écouter de la musique', 3);
INSERT INTO interests (name, id_category) VALUES ('Assister à des concerts', 3);
INSERT INTO interests (name, id_category) VALUES ('Composer', 3);
INSERT INTO interests (name, id_category) VALUES ('Jouer en groupe', 3);
INSERT INTO interests (name, id_category) VALUES ('Produire de la musique', 3);
INSERT INTO interests (name, id_category) VALUES ('Écrire des chansons', 3);
INSERT INTO interests (name, id_category) VALUES ('Participer à des jam sessions', 3);

-- Nerd
INSERT INTO interests (name, id_category) VALUES ('Anime', 4);
INSERT INTO interests (name, id_category) VALUES ('Manga', 4);
INSERT INTO interests (name, id_category) VALUES ('Jeux vidéo', 4);
INSERT INTO interests (name, id_category) VALUES ('Cosplay', 4);
INSERT INTO interests (name, id_category) VALUES ('Science-fiction', 4);
INSERT INTO interests (name, id_category) VALUES ('Fantaisie', 4);
INSERT INTO interests (name, id_category) VALUES ('Jeux de société', 4);
INSERT INTO interests (name, id_category) VALUES ('Comics', 4);
INSERT INTO interests (name, id_category) VALUES ('Jeux de rôle', 4);
INSERT INTO interests (name, id_category) VALUES ('Cartes à collectionner', 4);
INSERT INTO interests (name, id_category) VALUES ('Streaming', 4);
INSERT INTO interests (name, id_category) VALUES ('Création de contenu', 4);
INSERT INTO interests (name, id_category) VALUES ('Programmation', 4);
INSERT INTO interests (name, id_category) VALUES ('Écriture de fanfiction', 4);
INSERT INTO interests (name, id_category) VALUES ('Observation des oiseaux', 4);
INSERT INTO interests (name, id_category) VALUES ('Astronomie', 4);

-- Activite social
INSERT INTO interests (name, id_category) VALUES ('Plage', 5);
INSERT INTO interests (name, id_category) VALUES ('Restaurant', 5);
INSERT INTO interests (name, id_category) VALUES ('Voyager', 5);
INSERT INTO interests (name, id_category) VALUES ('Magasiner', 5);
INSERT INTO interests (name, id_category) VALUES ('Regarder la télévision', 5);
INSERT INTO interests (name, id_category) VALUES ('Bars', 5);
INSERT INTO interests (name, id_category) VALUES ('Aller dans les clubs', 5);
INSERT INTO interests (name, id_category) VALUES ('Zoo', 5);
INSERT INTO interests (name, id_category) VALUES ('Aquarium', 5);
INSERT INTO interests (name, id_category) VALUES ('Concerts', 5);
INSERT INTO interests (name, id_category) VALUES ('Sorties entre amis', 5);
INSERT INTO interests (name, id_category) VALUES ('Pique-nique', 5);
INSERT INTO interests (name, id_category) VALUES ('Camping', 5);
INSERT INTO interests (name, id_category) VALUES ('Jardiner', 5);
INSERT INTO interests (name, id_category) VALUES ('Visite de parcs', 5);

-- Art
INSERT INTO interests (name, id_category) VALUES ('Peinture', 6);
INSERT INTO interests (name, id_category) VALUES ('Sculpture', 6);
INSERT INTO interests (name, id_category) VALUES ('Photographie', 6);
INSERT INTO interests (name, id_category) VALUES ('Danse contemporaine', 6);
INSERT INTO interests (name, id_category) VALUES ('Expositions d\art', 6);
INSERT INTO interests (name, id_category) VALUES ('Arts visuels', 6);
INSERT INTO interests (name, id_category) VALUES ('Théâtre', 6);
INSERT INTO interests (name, id_category) VALUES ('Arts du spectacle', 6);
INSERT INTO interests (name, id_category) VALUES ('Dessin', 6);
INSERT INTO interests (name, id_category) VALUES ('Dessin numérique', 6);
INSERT INTO interests (name, id_category) VALUES ('Vidéo', 6);
INSERT INTO interests (name, id_category) VALUES ('Menuiserie', 6);
INSERT INTO interests (name, id_category) VALUES ('Scrapbooking', 6);
INSERT INTO interests (name, id_category) VALUES ('Couture', 6);
INSERT INTO interests (name, id_category) VALUES ('Humour', 6);

insert into groups_personalities (name) values 
('analystes'),
('diplomates'),
('sentinelles'),
('explorateurs');

-- Insérer les types de personnalité dans la table personalities
CALL insertTablePersonality(1, 'INTJ', 'Architecte', 'Penseurs imaginatifs et stratèges, avec un plan pour tout.');
CALL insertTablePersonality(1, 'INTP', 'Logicien', 'Inventeurs innovateurs démontrant une soif inextinguible de connaissances.');
CALL insertTablePersonality(1, 'ENTJ', 'Commandant', 'Leaders hardis, imaginatifs et dotés d’un fort caractère, qui trouvent toujours un moyen d’arriver à leurs fins, ou le créent.');
CALL insertTablePersonality(1, 'ENTP', 'Innovateur', 'Penseurs astucieux et curieux incapables de résister à un défi intellectuel.');

CALL insertTablePersonality(2, 'INFJ', 'Avocat', 'Idéalistes calmes et mystiques et pourtant très inspirants et infatigables.');
CALL insertTablePersonality(2, 'INFP', 'Médiateur', 'Personnes poétiques, gentilles et altruistes qui sont toujours prêtes à soutenir une bonne cause.');
CALL insertTablePersonality(2, 'ENFJ', 'Protagoniste', 'Leaders charismatiques et inspirants, capables de fasciner leur public.');
CALL insertTablePersonality(2, 'ENFP', 'Inspirateur', 'Esprits libres enthousiastes, créatifs et sociables, qui arrivent toujours à trouver une raison de sourire.');

CALL insertTablePersonality(3, 'ISTJ', 'Logisticien', 'Individus pragmatiques et intéressés par les faits, dont le sérieux ne saurait être mis en cause.');
CALL insertTablePersonality(3, 'ISFJ', 'Défenseur', 'Protecteurs très dévoués et très chaleureux, toujours prêts à défendre ceux qu’ils aiment.');
CALL insertTablePersonality(3, 'ESTJ', 'Directeur', 'Excellents gestionnaires, d’une efficacité inégalée quand il s’agit de gérer les choses, ou les gens.');
CALL insertTablePersonality(3, 'ESFJ', 'Consul', 'Personnes extraordinairement attentionnées, sociables et populaires, toujours prêtes à aider les autres.');

CALL insertTablePersonality(4, 'ISTP', 'Virtuose', 'Expérimentateurs hardis et pragmatiques, maîtres de toutes sortes d’outils.');
CALL insertTablePersonality(4, 'ISFP', 'Aventurier', 'Artistes flexibles et charmants, toujours prêts à explorer et à essayer quelque chose de nouveau.');
CALL insertTablePersonality(4, 'ESTP', 'Entrepreneur', 'Personnes astucieuses, énergiques et très perspicaces, qui aiment vraiment vivre à la pointe du progrès.');
CALL insertTablePersonality(4, 'ESFP', 'Amuseur', 'Amuseurs spontanés, énergiques et enthousiastes ; avec eux, on ne s’ennuie jamais.');

insert into types_personalities (type, description) VALUES
('E', 'Extraverti'), 
('I', 'Introverti'), 
('S', 'Sensation'), 
('N', 'Intuition'), 
('T', 'Pensée'), 
('F', 'Sentiment'), 
('P', 'Perception'), 
('J', 'Jugement');

INSERT INTO questions (no, question) VALUES
(1, 'À une fête, faites-vous : '),
(2, 'Êtes-vous plus : '),
(3, 'Est-il pire de : '),
(4, 'Êtes-vous plus impressionné par : '),
(5, 'Êtes-vous plus attiré par le : '),
(6, 'Préférez-vous travailler : '),
(7, 'Avez-vous tendance à choisir : ' ),
(8, 'Lorsque vous sortez, avez-vous l/habitude de : ' ),
(9, 'Êtes-vous plus attiré par : ' ),
(10, 'Êtes-vous plus intéressé par : ' ),
(11, 'En jugeant les autres, êtes-vous plus influencé par : '),
(12, 'En approchant les autres, votre inclination est-elle plutôt : '),
(13, 'Êtes-vous plus : '),
(14, 'Cela vous dérange-t-il plus d\avoir des choses : '),
(15, 'Dans vos groupes sociaux, faites-vous : '),
(16, 'En faisant des choses ordinaires, êtes-vous plus susceptible de : '),
(17, 'Les écrivains devraient : '),
(18, 'Lequel vous attire le plus : '),
(19, 'Êtes-vous plus à l\aise pour prendre : '),
(20, 'Voulez-vous des choses : '),
(21, 'Diriez-vous que vous êtes plus : '),
(22, 'En téléphonant, faites-vous : '),
(23, 'Des faits : '),
(24, 'Sont des visionnaires : '),
(25, 'Êtes-vous plus souvent : '),
(26, 'Est-il pire d\être : '),
(27, 'Devrait-on généralement laisser les événements se produire : '),
(28, 'Vous sentez-vous mieux à propos de : '),
(29, 'En société, faites-vous : '),
(30, 'Le bon sens est : '),
(31, 'Les enfants ne font souvent pas : '),
(32, 'En prenant des décisions, vous sentez-vous plus à l\aise avec : '),
(33, 'Êtes-vous plus : '),
(34, 'Lequel est plus admirable : '),
(35, 'Mettez-vous plus de valeur sur : ');

INSERT INTO answers (question_id, answer, type_answer) VALUES
(1, 'Interagir avec beaucoup de gens, y compris des inconnus', 'E'),
(1, 'Interagir avec quelques personnes, connues de vous', 'I'),
(2, 'Réaliste plutôt que spéculatif', 'S'),
(2, 'Spéculatif plutôt que réaliste', 'N'),
(3, 'Avoir votre "tête dans les nuages"', 'S'),
(3, 'Être "dans une routine"', 'N'),
(4, 'Principes', 'T'),
(4, 'Émotions', 'F'),
(5, 'Convaincant', 'T'),
(5, 'Touchant', 'F'),
(6, 'À des délais', 'J'),
(6, 'Juste "quand cela vous chante"', 'P'),
(7, 'Plutôt soigneusement', 'J'),
(7, 'Quelque peu impulsivement', 'P'),
(8,'Rester tard, avec une énergie croissante', 'E'),
(8,'Partir tôt avec une énergie diminuée', 'I'),
(9, 'Des gens sensés', 'S'),
(9,'Des gens imaginatifs', 'N'),
(10,'Ce qui est réel', 'S'),
(10,'Ce qui est possible', 'N'),
(11, 'Des lois plutôt que des circonstances', 'T'),
(11,'Des circonstances plutôt que des lois', 'F'),
(12,'Objectif', 'T'),
(12, 'Personnel', 'F'),
(13, 'Ponctuel', 'J'),
(13, 'Décontracté', 'P'),
(14,'Incomplet', 'J'),
(14, 'Complété', 'P'),
(15, 'Se tenir au courant des événements des autres', 'E'), 
(15, 'Prendre du retard sur les nouvelles', 'I'), 
(16, 'Le faire de la manière habituelle', 'S'), 
(16, 'Le faire à votre manière', 'N'), 
(17, 'Dire ce qu\ils pensent et penser ce qu\ils disent', 'S'),
(17, 'Exprimer les choses davantage par analogie', 'N'),
(18, 'La cohérence de la pensée', 'T'), 
(18, 'Des relations humaines harmonieuses', 'F'), 
(19, 'Des jugements logiques', 'T'), 
(19, 'Des jugements de valeur', 'F'),
(20, 'Stabilisé et décidé', 'J'), 
(20, 'Non stabilisé et indécis', 'P'), 
(21, 'Sérieux et déterminé', 'J'), 
(21, 'Détendu', 'P'), 
(22, 'Remettre rarement en question que tout sera dit', 'E'), 
(22, 'Répéter ce que vous allez dire', 'I'), 
(23, '"Parler pour eux-mêmes"', 'S'), 
(23, 'Illustrer des principes', 'N'), 
(24, 'quelque peu ennuyeux', 'S'), 
(24, 'plutôt fascinant', 'N'), 
(25, 'une personne posée', 'T'), 
(25, 'une personne chaleureuse', 'F'), 
(26, 'injuste', 'T'), 
(26, 'impitoyable', 'F'), 
(27, 'par une sélection et un choix soigneux', 'J'), 
(27, 'au hasard et par chance', 'P'), 
(28, 'ayant acheté', 'J'), 
(28, 'ayant la possibilité d\acheter', 'P'), 
(29, 'initier la conversation', 'E'), 
(29, 'attendre d\être approché', 'I'), 
(30, 'rarement discutable', 'S'), 
(30, 'fréquemment discutable', 'N'), 
(31, 'se rendre utile', 'S'), 
(31, 'exercer suffisamment leur fantaisie', 'N'), 
(32, 'des normes', 'T'), 
(32, 'des sentiments', 'F'), 
(33, 'ferme plutôt que doux', 'T'), 
(33, 'doux plutôt que ferme', 'F'), 
(34, 'la capacité d\organiser et d\être méthodique', 'J'), 
(34, 'la capacité de s\adapter et de se plier à l\événement', 'P'), 
(35, 'celui qui fournit des preuves', 'T'), 
(35, 'celui qui fournit des sentiments', 'F');

-- Users --
INSERT INTO users (email, last_name, first_name, birthdate, password, gender, personality, email_verified_at) VALUES
('user1@email.com', 'Smith', 'John', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 1, CURDATE()),
('user2@email.com', 'Johnson', 'Emily', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', null, CURDATE()),
('user3@email.com', 'Williams', 'Michael', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 2, CURDATE()),
('user4@email.com', 'Brown', 'Jessica', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 3, CURDATE()),
('user5@email.com', 'Jones', 'David', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 4, CURDATE()),
('user6@email.com', 'Garcia', 'Sophia', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', null, CURDATE()),
('user7@email.com', 'Martinez', 'Daniel', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 5, CURDATE()),
('user8@email.com', 'Rodriguez', 'Olivia', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 6, CURDATE()),
('user9@email.com', 'Lee', 'James', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 7, CURDATE()),
('user10@email.com', 'Harris', 'Mia', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', null, CURDATE()),
('user11@email.com', 'Clark', 'Benjamin', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 8, CURDATE()),
('user12@email.com', 'Lewis', 'Ava', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 9, CURDATE()),
('user13@email.com', 'Walker', 'Lucas', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 10, CURDATE()),
('user14@email.com', 'Hall', 'Ella', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 11, CURDATE()),
('user15@email.com', 'Allen', 'Alexander', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 12, CURDATE()),
('user16@email.com', 'Young', 'Charlotte', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 13, CURDATE()),
('user17@email.com', 'King', 'Henry', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', null, CURDATE()),
('user18@email.com', 'Wright', 'Amelia', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 14, CURDATE()),
('user19@email.com', 'Scott', 'Jack', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'homme', 15, CURDATE()),
('user20@email.com', 'Torres', 'Grace', CURDATE(), '$2y$10$7jOPoIpOTPKYDYHlcJmZT.qBPSnD2fRiwWFlkxKSVmT9iTDrswOxi', 'femme', 16, CURDATE());

-- Meetups --
INSERT INTO meetups(name, description, id_owner, adress, date, nb_participant, public) 
    VALUES("Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1);
    
INSERT INTO meetups(name, description, id_owner, adress, date, nb_participant, public) 
    VALUES("Sortie au bar", "Voici la description", 2, "1234 rue popcorn", DATE "2025-07-11", 100, 1);
    INSERT INTO meetups (name, description, id_owner, adress, date, nb_participant, public) 
    VALUES("Badminton", "Ravis de vous revoir gang :)", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1);
    INSERT INTO meetups(name, description, id_owner, adress, date, nb_participant, public) 
    VALUES("Basket", "Oublier pas vos bouteilles d'eaus guys", 3, "1234 rue popcorn", DATE "2025-01-01", 100, 1);
    INSERT INTO meetups(name, description, id_owner, adress, date, nb_participant, public) 
    VALUES("Randonné", "Nous allons monté le Mont-Tremblant", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1);

-- Create Private Chats
INSERT INTO chatRooms (name) VALUES (NULL), (NULL), (NULL), (NULL), (NULL), (NULL), (NULL), (NULL), (NULL), (NULL);

-- Insert Users into Private Chats
INSERT INTO chatRooms_users (id_chatRoom, id_user) VALUES (1, 1), (1, 2), (2, 3), (2, 4), (3, 5), (3, 6), (4, 7), (4, 8), (5, 9), (5, 10), (6, 11), (6, 12), (7, 13), (7, 14), (8, 15), (8, 16), (9, 17), (9, 18), (10, 19), (10, 20);

-- Create Group Chats
INSERT INTO chatRooms (name) VALUES ('Projet d''équipe'), ('Club de lecture'), ('Gaming Group'), ('Groupe d''étude'), ('Fitness');

-- Insert Users into Group Chats
INSERT INTO chatRooms_users (id_chatRoom, id_user) VALUES 
(11, 1), (11, 2), (11, 3), (11, 4), (11, 5), (12, 4), (12, 5), (12, 6), (13, 7), (13, 8), (13, 9), (14, 10), (14, 11), (14, 12), (15, 13), (15, 14), (15, 15);


-- Private Chat 1 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES 
(1, 1, 'Bonjour! Comment ça va?', '2024-11-14 08:00:00'),
(1, 2, 'Ça va bien, et toi?', '2024-11-14 08:02:00'),
(1, 1, 'Très bien, merci!', '2024-11-14 08:03:00'),
(1, 2, 'As-tu des plans pour ce week-end?', '2024-11-14 08:05:00'),
(1, 1, 'Oui, je vais au cinéma.', '2024-11-14 08:07:00'),
(1, 2, 'Super! Quel film?', '2024-11-14 08:10:00'),
(1, 1, 'Je vais voir "Dune".', '2024-11-14 08:12:00'),
(1, 2, 'Ah, j''aimerais le voir aussi.', '2024-11-14 08:15:00'),
(1, 1, 'On pourra en parler lundi.', '2024-11-14 08:17:00'),
(1, 2, 'Avec plaisir!', '2024-11-14 08:19:00');

-- Private Chat 2 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES 
(2, 3, 'Salut! Tu as fini le projet?', '2024-11-14 09:00:00'),
(2, 4, 'Pas encore, j''y travaille encore.', '2024-11-14 09:05:00'),
(2, 3, 'Ok, dis-moi si tu as besoin d''aide.', '2024-11-14 09:10:00'),
(2, 4, 'Merci, je vais te faire signe.', '2024-11-14 09:15:00'),
(2, 3, 'Pas de souci, bon courage!', '2024-11-14 09:20:00'),
(2, 4, 'Merci, tu as des plans ce soir?', '2024-11-14 09:5:00'),
(2, 3, 'Rien de spécial, et toi?', '2024-11-14 09:10:00'),
(2, 4, 'Peut-être regarder un film.', '2024-11-14 09:15:00'),
(2, 3, 'Bonne idée, lequel?', '2024-11-14 09:40:00'),
(2, 4, 'J''hésite encore, des suggestions?', '2024-11-14 09:45:00');

-- Private Chat 3 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES 
(3, 5, 'Tu viens à la fête demain?', '2024-11-14 10:00:00'),
(3, 6, 'Oui, j''y serai.', '2024-11-14 10:05:00'),
(3, 5, 'Génial! À quelle heure?', '2024-11-14 10:10:00'),
(3, 6, 'Vers 20h.', '2024-11-14 10:15:00'),
(3, 5, 'Parfait, à demain alors!', '2024-11-14 10:20:00'),
(3, 6, 'Super, à demain!', '2024-11-14 10:5:00'),
(3, 5, 'As-tu besoin que j''apporte quelque chose?', '2024-11-14 10:10:00'),
(3, 6, 'Non, tout est prêt.', '2024-11-14 10:15:00');

-- Private Chat 4 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES 
(4, 7, 'Salut! Tu as des nouvelles de Pierre?', '2024-11-14 11:00:00'),
(4, 8, 'Oui, il va bien.', '2024-11-14 11:05:00'),
(4, 7, 'Super, merci!', '2024-11-14 11:10:00'),
(4, 8, 'De rien!', '2024-11-14 11:15:00'),
(4, 7, 'Il revient quand?', '2024-11-14 11:20:00'),
(4, 8, 'La semaine prochaine.', '2024-11-14 11:5:00'),
(4, 7, 'Parfait, on pourra se voir.', '2024-11-14 11:10:00'),
(4, 8, 'Oui, c''est sûr.', '2024-11-14 11:15:00');

-- Private Chat 5 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES 
(5, 9, 'Bonjour, comment était ton voyage?', '2024-11-14 12:00:00'),
(5, 10, 'Salut! C''était incroyable!', '2024-11-14 12:05:00'),
(5, 9, 'Raconte-moi tout!', '2024-11-14 12:10:00'),
(5, 10, 'J''ai visité des endroits merveilleux.', '2024-11-14 12:15:00'),
(5, 9, 'Quelle a été ta meilleure expérience?', '2024-11-14 12:20:00'),
(5, 10, 'Difficile à dire, tout était génial!', '2024-11-14 12:5:00'),
(5, 9, 'J''aimerais vraiment y aller aussi.', '2024-11-14 12:10:00'),
(5, 10, 'Tu devrais, ça vaut vraiment le coup!', '2024-11-14 12:15:00');

-- Group Chat 11 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES
(11, 1, 'Salut tout le monde, on commence quand le projet ?', '2024-05-01 10:15:00'),
(11, 2, 'Bonjour ! Je propose qu’on commence demain matin.', '2024-05-01 10:17:00'),
(11, 3, 'Ça me va. Quel est le sujet exact du projet ?', '2024-05-01 10:20:00'),
(11, 1, 'On doit travailler sur la gestion des ressources.', '2024-05-01 10:5:00'),
(11, 2, 'Parfait, je vais préparer quelques documents.', '2024-05-01 10:10:00'),
(11, 3, 'Merci ! J’apporterai mes notes aussi.', '2024-05-01 10:15:00'),
(11, 1, 'Super, rendez-vous demain à 9h.', '2024-05-01 10:40:00'),
(11, 2, 'Quelqu’un a des idées pour la première étape ?', '2024-05-02 09:10:00'),
(11, 3, 'On pourrait faire une analyse des besoins.', '2024-05-02 09:15:00'),
(11, 1, 'Oui, c’est un bon début.', '2024-05-02 09:17:00'),
(11, 2, 'On divise les tâches après cette étape ?', '2024-05-02 09:30:00'),
(11, 3, 'Exactement, chacun peut travailler sur un aspect spécifique.', '2024-05-02 09:31:00'),
(11, 1, 'Parfait, je m’occupe de la recherche initiale.', '2024-05-02 09:32:00'),
(11, 2, 'Moi je vais gérer les contacts.', '2024-05-02 09:45:00'),
(11, 3, 'Ça marche. On fait un point vendredi ?', '2024-05-02 10:00:00'),
(11, 1, 'Bonne idée, ça nous laisse le temps d’avancer.', '2024-05-02 10:00:00'),
(11, 2, 'Je suis disponible vendredi après-midi.', '2024-05-02 10:10:00'),
(11, 3, 'Pareil, disons à 14h ?', '2024-05-02 10:15:00'),
(11, 1, 'Ça marche, à vendredi alors !', '2024-05-02 10:20:00'),
(11, 2, 'Petite question, on a besoin de quel logiciel ?', '2024-05-03 09:00:00'),
(11, 3, 'Je pense qu’on pourrait utiliser Excel pour l’analyse.', '2024-05-03 09:05:00'),
(11, 1, 'D’accord, je vérifierai si tout le monde l’a.', '2024-05-03 09:10:00'),
(11, 2, 'Je l’ai déjà installé.', '2024-05-03 09:15:00'),
(11, 3, 'Moi aussi.', '2024-05-03 09:20:00'),
(11, 1, 'Parfait, on est prêts.', '2024-05-03 09:5:00'),
(11, 2, 'On fait un test cet après-midi ?', '2024-05-03 14:00:00'),
(11, 3, 'Oui, c’est mieux de tester avant.', '2024-05-03 14:10:00'),
(11, 1, 'Je suis dispo après 15h.', '2024-05-03 14:15:00'),
(11, 2, 'Ok, disons 15h15.', '2024-05-03 14:20:00'),
(11, 3, 'À plus tard !', '2024-05-03 14:50:00');

-- Group Chat 12 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES
(12, 4, 'Quel livre lit-on ce mois-ci ?', '2024-06-15 08:00:00'),
(12, 5, 'Je propose "L’Alchimiste" de Paulo Coelho.', '2024-06-15 08:05:00'),
(12, 6, 'Bonne idée ! J’ai entendu de bons avis.', '2024-06-15 08:10:00'),
(12, 4, 'Super, on peut se fixer une date pour en discuter ?', '2024-06-15 08:15:00'),
(12, 5, 'Oui, le 10 juin à 18h ?', '2024-06-15 08:20:00'),
(12, 6, 'Parfait pour moi, j’aurai fini le livre d’ici là.', '2024-06-15 08:5:00'),
(12, 4, 'Je viens de commencer, le début est captivant.', '2024-06-16 09:10:00'),
(12, 5, 'Oui, l’écriture est vraiment fluide.', '2024-06-16 09:15:00'),
(12, 6, 'C’est vrai, on est vite emporté par l’histoire.', '2024-06-16 09:40:00'),
(12, 4, 'J’ai hâte d’arriver à la fin pour voir le message final.', '2024-06-17 10:00:00'),
(12, 5, 'Quel passage vous a marqué le plus jusqu’ici ?', '2024-06-17 10:05:00'),
(12, 6, 'Le passage où il rencontre l’alchimiste est puissant.', '2024-06-17 10:10:00'),
(12, 4, 'Oui, ça montre l’importance de suivre ses rêves.', '2024-06-17 10:15:00'),
(12, 5, 'Vous avez d’autres suggestions pour le prochain mois ?', '2024-06-18 11:00:00'),
(12, 6, 'On pourrait lire un classique français ? Zola peut-être ?', '2024-06-18 11:05:00'),
(12, 4, 'Bonne idée ! "Germinal" serait intéressant.', '2024-06-18 11:10:00'),
(12, 5, 'J’approuve, un grand classique de la littérature.', '2024-06-18 11:15:00'),
(12, 6, 'D’accord, on se lance dans Zola après ce mois-ci.', '2024-06-18 11:20:00'),
(12, 4, 'Super, j’ai presque fini "L’Alchimiste".', '2024-06-19 12:10:00'),
(12, 5, 'Moi aussi, plus que quelques pages.', '2024-06-19 12:15:00'),
(12, 6, 'J’ai hâte de discuter de la fin avec vous !', '2024-06-19 12:40:00'),
(12, 4, 'On pourrait organiser un café lecture bientôt ?', '2024-06-20 14:00:00'),
(12, 5, 'Oui, une super idée pour échanger nos avis.', '2024-06-20 14:05:00'),
(12, 6, 'Qui se charge de trouver un lieu ?', '2024-06-20 14:10:00'),
(12, 4, 'Je connais un café tranquille, je vais vérifier la disponibilité.', '2024-06-20 14:15:00'),
(12, 5, 'Merci, tiens-nous au courant.', '2024-06-20 14:20:00'),
(12, 6, 'Hâte de le lire avec vous tous !', '2024-06-20 14:5:00'),
(12, 4, 'Rendez-vous pris pour le 5 juin, 16h au Café Littéraire.', '2024-06-1 09:00:00'),
(12, 5, 'Super, merci ! À bientôt alors.', '2024-06-1 09:05:00'),
(12, 6, 'À samedi prochain, hâte de discuter !', '2024-06-1 09:10:00');

-- Group Chat 13 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES
(13, 7, 'Salut tout le monde, qui est partant pour une session ce soir ?', '2024-07-01 18:00:00'),
(13, 8, 'Moi je suis dispo, on joue à quoi ?', '2024-07-01 18:05:00'),
(13, 9, 'J’aimerais bien jouer à "League of Legends".', '2024-07-01 18:10:00'),
(13, 7, 'Parfait, ça me va aussi ! On se donne rendez-vous à 1h ?', '2024-07-01 18:15:00'),
(13, 8, 'Ça marche, à ce soir 1h alors.', '2024-07-01 18:20:00'),
(13, 9, 'J’ai hâte, je vais faire chauffer le PC.', '2024-07-01 18:5:00'),
(13, 7, 'Vous êtes prêts ? Je lance le jeu.', '2024-07-01 1:00:00'),
(13, 8, 'Prêt ! Allez, on va gagner cette fois.', '2024-07-01 1:02:00'),
(13, 9, 'Je prends le rôle de tank, ça vous va ?', '2024-07-01 1:05:00'),
(13, 7, 'Oui, parfait ! Je vais jouer en soutien.', '2024-07-01 1:10:00'),
(13, 8, 'Je serai le DPS alors, let’s go !', '2024-07-01 1:12:00'),
(13, 9, 'Bien joué pour cette manche, on continue !', '2024-07-01 2:00:00'),
(13, 7, 'Super coordination, c’était intense.', '2024-07-01 2:10:00'),
(13, 8, 'On est vraiment en forme ce soir !', '2024-07-01 2:12:00'),
(13, 9, 'Prêt pour une autre partie ?', '2024-07-01 2:15:00'),
(13, 7, 'Oui, allons-y !', '2024-07-01 2:16:00'),
(13, 8, 'J’adore ce jeu, surtout quand on gagne.', '2024-07-01 2:20:00'),
(13, 9, 'Belle victoire !', '2024-07-01 2:50:00'),
(13, 7, 'On remet ça demain soir ?', '2024-07-01 3:00:00'),
(13, 8, 'Je suis partant, même heure ?', '2024-07-01 3:05:00'),
(13, 9, 'Oui, 1h encore ?', '2024-07-01 3:10:00'),
(13, 7, 'Ça marche, à demain les amis.', '2024-07-01 3:15:00'),
(13, 8, 'Bonne nuit !', '2024-07-01 3:20:00'),
(13, 9, 'Bonne nuit tout le monde.', '2024-07-01 3:5:00'),
(13, 7, 'Prêts pour une nouvelle session ?', '2024-07-02 1:00:00'),
(13, 8, 'Oui, je suis prêt !', '2024-07-02 1:05:00'),
(13, 9, 'Go team !', '2024-07-02 1:10:00'),
(13, 7, 'On gère bien ce soir, bien joué à tous.', '2024-07-02 2:00:00'),
(13, 8, 'On continue comme ça !', '2024-07-02 2:05:00'),
(13, 9, 'On fait une pause après cette partie ?', '2024-07-02 2:10:00');

-- Group Chat 14 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES
(14, 10, 'Salut à tous, on commence à étudier quel chapitre aujourd’hui ?', '2024-08-01 15:00:00'),
(14, 11, 'Je pense qu’on devrait revoir le chapitre 3, il est assez complexe.', '2024-08-01 15:05:00'),
(14, 12, 'Oui, surtout la partie sur les intégrales.', '2024-08-01 15:10:00'),
(14, 10, 'Je peux expliquer si vous avez besoin.', '2024-08-01 15:15:00'),
(14, 11, 'Merci, j’ai quelques questions sur les exercices.', '2024-08-01 15:20:00'),
(14, 12, 'Moi aussi, notamment sur l’exercice 4.', '2024-08-01 15:5:00'),
(14, 10, 'D’accord, voyons ça ensemble.', '2024-08-01 15:10:00'),
(14, 11, 'Ça commence à devenir plus clair, merci.', '2024-08-01 15:15:00'),
(14, 12, 'Oui, c’est plus facile avec des explications.', '2024-08-01 15:40:00'),
(14, 10, 'On continue avec les intégrales doubles ?', '2024-08-01 15:45:00'),
(14, 11, 'Oui, c’est un peu difficile mais ça en vaut la peine.', '2024-08-01 15:50:00'),
(14, 12, 'Merci pour votre aide !', '2024-08-01 15:55:00'),
(14, 10, 'Pas de souci, on est là pour ça.', '2024-08-01 16:00:00'),
(14, 11, 'Quand est notre prochaine session ?', '2024-08-01 16:05:00'),
(14, 12, 'Demain même heure ?', '2024-08-01 16:10:00'),
(14, 10, 'Ça marche pour moi, à demain alors.', '2024-08-01 16:15:00'),
(14, 11, 'Merci à tous, à demain !', '2024-08-01 16:20:00'),
(14, 12, 'Bonne révision !', '2024-08-01 16:5:00'),
(14, 10, 'Salut, on attaque le chapitre 4 aujourd’hui ?', '2024-08-02 15:00:00'),
(14, 11, 'Oui, surtout les dérivées partielles.', '2024-08-02 15:05:00'),
(14, 12, 'J’ai du mal avec ce sujet, j’espère comprendre aujourd’hui.', '2024-08-02 15:10:00'),
(14, 10, 'On va le faire étape par étape.', '2024-08-02 15:15:00'),
(14, 11, 'Merci pour ta patience.', '2024-08-02 15:20:00'),
(14, 12, 'Oui, vraiment, c’est plus facile de cette façon.', '2024-08-02 15:5:00'),
(14, 10, 'Content d’aider, on révise après la session ?', '2024-08-02 15:10:00'),
(14, 11, 'Oui, bonne idée pour assimiler.', '2024-08-02 15:15:00'),
(14, 12, 'Merci pour la session, à demain !', '2024-08-02 15:40:00'),
(14, 10, 'À demain tout le monde.', '2024-08-02 15:45:00');

-- Group Chat 15 Messages
INSERT INTO messages (id_chatRoom, id_user, content, created_at) VALUES
(15, 13, 'Quelqu’un pour un jogging ce soir ?', '2024-09-05 17:10:00'),
(15, 14, 'Oui, ça me tente !', '2024-09-05 17:15:00'),
(15, 15, 'Je suis partant aussi !', '2024-09-05 17:40:00'),
(15, 13, 'On se retrouve à quelle heure ?', '2024-09-05 17:45:00'),
(15, 14, 'Vers 18h10 ça vous va ?', '2024-09-05 17:50:00'),
(15, 15, 'Parfait, je serai au point de rendez-vous.', '2024-09-05 17:55:00'),
(15, 13, 'Excellent jogging hier, merci à tous !', '2024-09-06 09:00:00'),
(15, 14, 'Oui, c’était top ! On remet ça bientôt ?', '2024-09-06 09:05:00'),
(15, 15, 'Ce weekend ça vous irait ?', '2024-09-06 09:10:00'),
(15, 13, 'Oui, parfait pour dimanche matin ?', '2024-09-06 09:15:00'),
(15, 14, 'D’accord, disons 9h au parc.', '2024-09-06 09:20:00'),
(15, 15, 'Parfait, à dimanche alors !', '2024-09-06 09:5:00'),
(15, 13, 'Qui est motivé pour une session de HIIT en semaine ?', '2024-09-08 18:00:00'),
(15, 14, 'Moi ! Ça va bien compléter le cardio.', '2024-09-08 18:05:00'),
(15, 15, 'Bonne idée, j’ai besoin de travailler le cardio.', '2024-09-08 18:10:00'),
(15, 13, 'On peut se retrouver mardi soir ?', '2024-09-08 18:15:00'),
(15, 14, 'Vers 19h au gymnase ?', '2024-09-08 18:20:00'),
(15, 15, '19h me va, je serai là.', '2024-09-08 18:5:00'),
(15, 13, 'Génial, on se retrouve mardi pour transpirer !', '2024-09-08 18:10:00'),
(15, 14, 'Prêt pour la session de HIIT ce soir ?', '2024-09-12 18:00:00'),
(15, 15, 'Oui, j’ai hâte de tester ça !', '2024-09-12 18:05:00'),
(15, 13, 'J’apporte la musique pour nous motiver !', '2024-09-12 18:10:00'),
(15, 14, 'Super, à ce soir !', '2024-09-12 18:15:00'),
(15, 15, 'Merci pour la session, c’était intense !', '2024-09-12 20:00:00'),
(15, 13, 'Oui, super énergie ! On remet ça la semaine prochaine ?', '2024-09-12 20:05:00'),
(15, 14, 'Volontiers, on pourrait même varier les exercices.', '2024-09-12 20:10:00'),
(15, 15, 'Bonne idée, je suis partant.', '2024-09-12 20:15:00'),
(15, 13, 'On peut intégrer du renforcement musculaire.', '2024-09-12 20:20:00'),
(15, 14, 'Parfait, hâte de voir le programme !', '2024-09-12 20:5:00');



-- Users Interests --
CALL add_user_interests (1, "24, 25, 51, 63, 89, 100, 122");
CALL add_user_interests (2, "89");

-- Meetups Interests --
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (100, 2);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (24, 2);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (66, 2);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (23, 3);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (14, 4);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (11, 5);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (100, 5);


-- Type Feed
INSERT INTO types_actions(name) VALUES('Meetup Create');
INSERT INTO types_actions (name) VALUES('Meetup Join');
INSERT INTO types_actions (name) VALUES('Personality Test');

-- Feed
-- CALL fillFeed(2);
INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Badminton au Tennis 13", "Vener me rejoindre pour jouer avec moi du badminton au tennis 13. Joueur avancé svp",
    20, "1013 Autoroute 13",'Laval', DATE '2024-12-04', 4, 1,'images//tennis13.png');

INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (23, 6);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Marche dans le parc La Fontaine", "Le parc La Fontaine, situé au cœur de Montréal, est un véritable havre de paix.
    Avec ses vastes espaces verts, ses lacs et ses sentiers, 
    il invite à la détente et aux activités en plein air. Ce parc offre aussi des aires de jeux, 
    des sculptures et des événements culturels.", 
    19, "3819 Av. Calixa-Lavallée",'Montréal', DATE '2024-12-12', 3, 1,'images//parc.jpg');

INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (113, 7);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (109, 7);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Baignade", "Bonjour à tous, je invite à me rejoindre dans la piscine du collège Laval pour construire dans fort flottant et faire des sauts de tremplin", 
    20, "1275 Av. du Collège",'Laval', DATE '2024-12-01', 6, 1,'images//piscine.jpeg');
    
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (7, 8);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (8, 8);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Escape Game", "Penser-vous êtres assez malin pour venir avec faire une escape game et gagner. Rejoignez moi au Cube Secret !",
    18, "4289 Laurentian Autoroute",'Laval', DATE '2024-12-04', 6, 1,'images//escape.jpg');

INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (109, 9);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Concert de musique baroque et ancienne", "Avec Blessed Echoes (« échos bénis »), 
    l’ensemble Près de votre oreille propose un riche parcours dans la
    musique vocale élisabéthaine. Une véritable incursion dans un genre qui fut très prisé à l’époque : la « lute song » (chanson avec luth).",
    18, "1380, rue Sherbrooke Ouest",'Montréal', DATE '2024-12-10', 2, 1,'images//baroque.webp');

INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (53, 10);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (76, 10);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (77, 10);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Biodôme de Montréal", "Le Biodôme de Montréal, situé dans le Parc Olympic, est un musée vivant qui reproduit différents écosystèmes du continent américain. Les visiteurs peuvent y découvrir des forêts tropicales, des récifs marins, des régions subarctiques et des forêts laurentiennes, offrant une immersion unique dans la faune et la flore. Grâce à ses installations interactives et ses expositions éducatives, le Biodôme sensibilise à la conservation de la biodiversité et à l'importance de la protection de l'environnement. Un lieu fascinant pour les familles, les passionnés de nature et les curieux, alliant découverte, éducation et respect de l'écosystème.",
    17, "4777 Pierre-de Coubertin Ave",'Montréal', DATE '2024-12-15', 4, 1,'images//biodome.jpeg');
    
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (97, 11);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (44, 11);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Chez Lionel", "c'est un super bon restaurent ! Venez souper avec moi, on vas passer une superbe soirée et on vas se régaler",
    17, "4777 Pierre-de Coubertin Ave",'Montréal', DATE '2024-11-29', 3, 1,'images//lionel.jpeg');
    
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (100, 12);
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (104, 12);

INSERT INTO meetups(name, description, id_owner, adress,city, date, nb_participant, public,image) 
    VALUES("Bâton Rouge", "Bâton Rouge à Laval est un restaurant populaire connu pour sa cuisine grillée, notamment ses steaks, côtes levées et poissons. L’ambiance chaleureuse et moderne en fait un endroit idéal pour des repas entre amis ou en famille. Le service est attentionné, et le menu propose une variété de plats savoureux.",
    19, "1600, boulevard Laval",'Laval', DATE '2024-11-30', 3, 1,'images//baton_rouge.jpg');
    
INSERT INTO meetups_interests (id_interest, id_meetup) VALUES (100, 13);


-- feed
Call addAction(20,'Meetup Create',json_object('meetup',6));
Call addActionPerso(12,'Personality Test');
Call addActionPerso(13,'Personality Test');
Call addAction(19,'Meetup Create',json_object('meetup',7));
Call addAction(20,'Meetup Create',json_object('meetup',8));
Call addActionPerso(19,'Personality Test');
Call addActionPerso(20,'Personality Test');
Call addAction(18,'Meetup Create',json_object('meetup',9));
Call addActionPerso(7,'Personality Test');
Call addActionPerso(8,'Personality Test');
Call addActionPerso(9,'Personality Test');
Call addAction(18,'Meetup Create',json_object('meetup',10));
Call addAction(17,'Meetup Create',json_object('meetup',11));
Call addActionPerso(15,'Personality Test');
Call addActionPerso(16,'Personality Test');
Call addActionPerso(18,'Personality Test');
Call addAction(17,'Meetup Create',json_object('meetup',12));
Call addAction(19,'Meetup Create',json_object('meetup',13));

Call addActionPerso(1,'Personality Test');
Call addActionPerso(3,'Personality Test');
Call addActionPerso(4,'Personality Test');
Call addActionPerso(5,'Personality Test');
Call addActionPerso(11,'Personality Test');
Call addActionPerso(14,'Personality Test');

-- Evenement --
CALL addEvent ('Tori Kelly', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-10-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/ZvkgASpWsMVv5Xr3RLNEz/e4b9c537ee8c00f15fef16a71b0c8e93/tori_kelly_2024.jpg');
CALL addEvent ('Enter Shikari', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-21 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3hqpyWdpePLTHhy9uDfSI4/d4fa3c09772e08406c4ef2804892152a/enter_shikari_2024.jpg');
CALL addEvent ('Montreal Canadiens vs New York Rangers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-22 23:15:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7aF3ZjVn7wezzFdR2fL9e7/0a0be5d9732cc48c11eb0e156541636e/4037_Billeterie_01_Molson_680x473_NYR.jpg');
CALL addEvent ('Okean Elzy', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-10-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3pVy3E0znQeKYCypswbDlT/c9e38136b5ae6a3ebaf5058161e932ec/okean_elzy_2024_2.jpg');
CALL addEvent ('Sueco', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-10-22 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7uvCWoEQSEX6Vva4PAI2zD/40ca9e7855d641dce3573774351d162f/sueco_2024.jpg');
CALL addEvent ('Meghan Oak', '', 'Musique', 'Sherbrooke', '58 Rue Meadow', '2024-10-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/GRhSIo7SflhDgSGF696qK/d128619cea499d338b50f5346f183361/meghan_oak_2024.jpg');
CALL addEvent ('Christian Nodal', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2024-10-24 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6Tj9mPFAlHLcdQQ9ASL7uk/0bd081584d1d9308fbfffd2a37fbcf06/christian_nodal_2024.jpg');
CALL addEvent ('Protest The Hero', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-23 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5C3n5rSsoyIOJZhsCmXxot/28fda1d6f7900d8a9574ac485fda3988/protest_the_hero_2024.jpg');
CALL addEvent ('Meghan Oak', '', 'Musique', 'Montreal', '57 Prince Arthur Est', '2024-10-24 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/GRhSIo7SflhDgSGF696qK/d128619cea499d338b50f5346f183361/meghan_oak_2024.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Montreal', '175, rue Sainte-Catherine Ouest', '2024-10-24 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bfljXzLVcKJHyZYyyHyJD/ac219ef2c5ba7312a8ece5012a9b0bc9/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Carnifex', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-24 22:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4Hc23BoAsgouGRpT0OzJqW/bbf5db1b90e41180b86e0d6111669ee6/carnifex_2024.jpg');
CALL addEvent ('Johnny Stimson', '', 'Musique', 'Montreal', '4467A Rue Saint-Denis', '2024-10-25 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7iDzZGJ4xoTG6lFz6GX7s6/de34eec6c24aa367b107e39af1d9c3c8/Johnny_Stimson__680x473_.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Longueuil', '180 rue De Gentilly Est', '2024-10-25 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Fleurir', '', 'Art', 'Montreal', '2901, boulevard Saint-Joseph', '2024-10-24 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/57BvzD1ADa3hUsVESzpGzt/36acee708ee582eab195e1f77a29e72a/fleurir_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Evanescence', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-25 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7i7kEvpgq1iU1QBDNi1xQI/fa0768d186f71b496b36804b08340ec7/evanescence_2024.jpg');
CALL addEvent ('Rocket de Laval vs Utica Comets', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-10-25 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/473RE7XKxNiuA0ZIq2QSBs/81fc7c73eda3e08fd7cba3864eb10fc3/2425-5005_ticketmaster_event_matchups_SAISON_680x473_UTC.jpg');
CALL addEvent ('David Kushner', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-10-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6kmuQ2zAJZstvsxdCumiTc/ff2eae64cea319ad051783b1f28d7978/david_kushner_2024.jpg');
CALL addEvent ('Wave to Earth', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/ibH7GcoIvdESBhG1umsfc/06e9cae828c4fa0d2330a9feb344f325/wave_to_earth_2024.jpg');
CALL addEvent ('MINDCHATTER', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2024-10-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/16foyVbWZ5Q4a8aS8Gzb9T/5c4f4c96a3efa79124e0f597dcaafc32/mindchatter_2024.jpg');
CALL addEvent ('Montreal Canadiens vs St.Louis Blues', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-26 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/iAD80pjwVrsaYiFimEATN/3692f71188a2680bd26a2d7e79bbc327/4037_Billeterie_01_Molson_680x473_STL.jpg');
CALL addEvent ('RY X', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4Qzip8kSGIVWlg6slc0s2T/0ca19cc3b6123607f394f2e441b141f0/ry_x_2024.jpg');
CALL addEvent ('Myles Smith', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3F39jwIZ0FS4WtHK2HFmMk/8d5a05bc7295745f2c15aaab984c4ce5/myles_smith_2024.jpg');
CALL addEvent ('Within The Ruins', '', 'Musique', 'Montreal', '87, rue Ste-Catherine est', '2024-10-26 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ebu5WOtyES7Vdv41S3D06/7fb2ab92104d7ece41492cd04b9af9b8/within_the_ruins_2024.jpg');
CALL addEvent ('Sebastian Bach', '', 'Musique', 'Quebec', '972 Rue Saint-Jean', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5vKyKCbEeX95NvqJZrUiW9/c4bb37f9b875f087d76572259c5d119d/sebastian_bach_2024.jpg');
CALL addEvent ('Fleurir', '', 'Art', 'Lavaltrie', '1255, Notre-Dame st', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4OwLlYX8HSwQDAXS61QI1T/fb5a8ca49eef5de7f1dc4b7354cd036f/fleurir_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Val-Morin', '1121 10th Av. ', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Baie-du-Febvre', '23 A rue de l&#x27;Église, c.p. 262', '2024-10-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bfljXzLVcKJHyZYyyHyJD/ac219ef2c5ba7312a8ece5012a9b0bc9/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Elyanna', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-10-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7havFmDVHGDbbL7ZIyrtz1/bd0ad388be5612531635648abb54bea5/elyanna_2024_3.jpg');
CALL addEvent ('Jean Dawson', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-10-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3i1Eyi390FyPR3J66klGgY/c7a14c3edd37b34da6a7bec528bac471/jean_dawson_2024.jpg');
CALL addEvent ('Lili St-Cyr', '', 'Culturel', 'Lasalle', '1111 rue Lapierre', '2024-10-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3c6NwEgrgh9YvZBZxusltQ/9f14f6e6382b73eed5f9977675fd6d14/lili_st_cyr_2024_2024.jpg');
CALL addEvent ('Craig Ferguson', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/57gGws1IYjPv4iXwdENZz1/8b14ee36eed7d2ad0af4c04afb3e9330/craig_ferguson_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Sebastian Bach', '', 'Musique', 'Moncton', '21 Casino Drive', '2024-10-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5vKyKCbEeX95NvqJZrUiW9/c4bb37f9b875f087d76572259c5d119d/sebastian_bach_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Seattle Kraken', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-29 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2OnMJZPM7PmoNDBxr6lk6o/7cafb440cd56c663325a6bc9317e0a76/4037_Billeterie_01_Molson_680x473_SEA.jpg');
CALL addEvent ('Sebastian Bach', '', 'Musique', 'Halifax', '1983 Upper Water St', '2024-10-30 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5vKyKCbEeX95NvqJZrUiW9/c4bb37f9b875f087d76572259c5d119d/sebastian_bach_2024.jpg');
CALL addEvent ('Donovan Woods', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-10-30 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2w5TQ3ed3RSgH0x5hPh9r0/9c6aa4b12247fed93094a649cee2228b/donovan_woods_2024.jpg');
CALL addEvent ('Iron Maiden', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-30 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2iw7xmxiFDgQpUozECPJtx/387af3091a1009b966d4459e93d37f06/iron_maiden_2024.jpg');
CALL addEvent ('Rocket de Laval vs Utica Comets', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-10-30 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5ckPnNkcEIgwNEpI1XiYlW/897fa6d797a7e32ee35075bcd11fdf6c/2425-5005_ticketmaster_event_matchups_SAISON_680x473_UTC.jpg');
CALL addEvent ('James Vincent McMorrow', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-10-31 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1sovOPFBZAag5YJACx1QNS/54a857838be8538f7cfd114f1b28330e/james_vincent_mcmorrow_2024.jpg');
CALL addEvent ('Bruce Springsteen & The E Street Band', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-10-31 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2afrhInniFbAJTCHUYW0RE/630cffc0fdb4fdf8b425f72e063c0476/bruce_springsteen_2024.jpg');
CALL addEvent ('Zack Fox', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2024-11-01 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/55jQLks4k50LcnP1uF4D1N/3feacfb9faf9fced9e90b875521e29ec/zack_fox_2024.jpg');
CALL addEvent ('Rocket de Laval vs Providence Bruins', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-11-01 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2BPtgIXdOrKifIL9WaWK8x/bd43ab969620ee2876676a143fab9a05/2425-5005_ticketmaster_event_matchups_SAISON_680x473_PRO.jpg');
CALL addEvent ('Lawrence', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5e5h8BcAUuhNQG26duAomn/a1d9d4b66dd3fb8744deb35d97c79733/lawrence_2024.jpg');
CALL addEvent ('Tenille Townes', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1GV2m13Yq7XYdxpU16x1rJ/a64abd5c64248bab3dff1ade3256b74a/tenille_townes_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Trois-Rivières', '1425 Pl. de l&#x27;Hôtel de Ville', '2024-11-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5BBdIp321UtkMNXuflhQJa/fa30ab8c028f211280090a43eb73ca08/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Providence Bruins', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-11-02 19:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5Ck0Db6UYWH2STwuZGfYpk/1da12fac9a783c827be1b1151a7202436/2425-5005_ticketmaster_event_matchups_SAISON_680x473_PRO.jpg');
CALL addEvent ('King Diamond', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-02 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3cS1VdKx5VXC92iCUVHpxK/8e5b7d77f5780259c40d76ff79a3ba77/king_diamond_2024.jpg');
CALL addEvent ('Soul Asylum', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7fZHbLIfD7QAenQD0FWR2L/865fd27d85cf555d2ae88b279fccd3a8/soul_asylum_2024.jpg');
CALL addEvent ('ALLEYCVT', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2LnjUutfmYnSIwuwXFb7VT/9412da6909b8041280a5f1e025787154/alleycvt_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Quebec', '269, boul René-Lévesque E', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3WYral2n7E9yVw6WjIXfsk/2e410899e34c10653dad6a4fb827566c/fijm24_jordan_officer.jpg');
CALL addEvent ('Orion Sun', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-11-02 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6CMKbdNZz2LSylMpm1hk4w/6e859a30c75f223c328f3e996b4981f8/orion_sun_2024.jpg');
CALL addEvent ('Adam Baldwin', '', 'Musique', 'Montreal', '57 Prince Arthur Est', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/61ewkJr0sgYI5sbh95TFkD/db790e631bd5a0c9532d1212e7ea9af6/adam_baldwin_2024.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Papineauville', '378 Rue Papineau', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bfljXzLVcKJHyZYyyHyJD/ac219ef2c5ba7312a8ece5012a9b0bc9/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Lili St-Cyr', '', 'Culturel', 'Saint-Hyacinthe', '1705, rue St-Antoine', '2024-11-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3c6NwEgrgh9YvZBZxusltQ/9f14f6e6382b73eed5f9977675fd6d14/lili_st_cyr_2024_2024.jpg');
CALL addEvent ('Chase Atlantic', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-04 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7eAQomEhNRjA5WJQ15f5aj/a8ce98369630ecf489aa21e221ff349c/chase_atlantic_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Quebec', '269, boul René-Lévesque E', '2024-11-04 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1KfwnqndxG4xXasAJRNn4I/459fcc0085f9b1db98b1c8f6feba1c45/fijm24_jordan_officer.jpg');
CALL addEvent ('Sarah McLachlan', '', 'Musique', 'Moncton', '1100 Main Street', '2024-11-05 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2xn6XZ2ExofMLkQ2DWIuQg/7713c19e1eb6e61e488a99cfe41fabaa/sarah_mclachlan_2024_2.jpg');
CALL addEvent ('Montreal Canadiens vs Calgary Flames', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1mhQiN0SHE26sV4MTSProE/0ca6641067ad02fde8e05f57ce8ee992/4037_Billeterie_01_Molson_680x473_CAL.jpg');
CALL addEvent ('The Black Dahlia Murder & Dying Fetus', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-05 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1O38HvoYa44VNbcmqeCwkk/009a603891a45d6bb9558bab10160bd8/The_Black_Dahlia_Murder__680x473_.jpg');
CALL addEvent ('MUHC''s Got Talent', '', 'Culturel', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-05 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2bosL5nSxUiNsywuaiG3Gp/98a0f88e2d2f05ff1ded266267bbb091/muhc_2024.jpg');
CALL addEvent ('Jordan Rakei', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-06 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/dGuIZcu71Z1KVUG6nWO8O/b075fa4c9958e4eda931269cba64cf54/jordan_rakei_2024.jpg');
CALL addEvent ('Sarah McLachlan', '', 'Musique', 'Halifax', 'P.O. Box 955, 1800 Argyle St.', '2024-11-06 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2xn6XZ2ExofMLkQ2DWIuQg/7713c19e1eb6e61e488a99cfe41fabaa/sarah_mclachlan_2024_2.jpg');
CALL addEvent ('La Fève', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4HVNfGTCQMExmUKf12FBcK/b0d80122d230620a126224e344762827/la_feve_2024.jpg');
CALL addEvent ('Myles Smith', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3F39jwIZ0FS4WtHK2HFmMk/8d5a05bc7295745f2c15aaab984c4ce5/myles_smith_2024.jpg');
CALL addEvent ('Jessia', '', 'Musique', 'Montreal', '4521 Saint-Laurent Boulevard', '2024-11-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2b9N2hHzL8oYt6c91mHEs9/0499ca4917025e714e5758e3690ac72b/STD-241106-JESSIA-WEB-Visuels-Website-680x473.jpg');
CALL addEvent ('Odie Leigh', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-11-07 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7j561nVkpKBRM6V0l5fXxC/7ea873368334486a8c769afcfa7ac8bb/odie_leigh_2024.jpg');
CALL addEvent ('TR/ST', '', 'Musique', 'Montreal', '1201, boul Saint-Laurent', '2024-11-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4UwRlJGhffm6cIksoqFYzz/0be897a49da841ffac284ed5933dd3e8/trst_2024.jpg');
CALL addEvent ('Two Feet', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3dsJ0SqDJiTcEuflukCbfX/68b27f20d1c4c650981353310ad4cbe5/two_feet_2024.jpg');
CALL addEvent ('Laura Ramoso ', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-08 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4QwNOtujDM0HKt7QR1ga2u/74012d293fcd2dbcc0dd0e23ebfd675b/laura_ramoso_2024_2.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Irène', '', 'Musique', 'Montreal', '57 Prince Arthur Est', '2024-11-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/22PjxSh4F2QByyQX6deNZP/c332573d8036f2cbe331342641bb377d/irene_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Longueuil', '901 Ch Tiffin', '2024-11-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7FjCfnhulY9pNNtPtQT45M/c64c7ccd8bbfd4ff024f50ea70577a20/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Fally Ipupa', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4DiTMzETF66niIQw02TLgj/9195efd7ca1942ad3dd38d17a3d1308d/fally_ipupa_2024.jpg');
CALL addEvent ('Infected Mushroom', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-09 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6vlPoNh0AGneBdlYf0cDOw/51d297272050886e308df1dbba854ebe/infected_mushroom_2024.jpg');
CALL addEvent ('Laura Ramoso ', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-09 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4QwNOtujDM0HKt7QR1ga2u/74012d293fcd2dbcc0dd0e23ebfd675b/laura_ramoso_2024_2.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Renaud Gratton', '', 'Musique', 'Granby', ' 505 Rue Chénier', '2024-11-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/76blhxfUAI3kZtr0BUAipy/6eef3fd319cb80b320bef9e649a4b581/renaud-gratton.jpg');
CALL addEvent ('Shallou', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-11-09 02:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1SIgaxwgYuMlUrCNcTyWAC/10c927368d8023fc5a604354710c904d/shallou_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Saint-Georges-de-Beauce', '200, 18ieme rue Ouest', '2024-11-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2F9wIx0O2qCvR43r7CSgTf/951cabd0457663825f8ec4b20532926d/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Infected Mushroom', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-10 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3MBZuBxBusOyMsuksAkUft/3de0cdfe302e91623706aeff753587f4/infected_mushroom_2024.jpg');
CALL addEvent ('Abo Gabi', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-10 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4wzZ3bpyX1AZdlrQ3WNlmq/b701891a11bc9a939f46320a063330e2/abo_gabi_2024.jpg');
CALL addEvent ('Valley', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-10 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/21lC6fqyTgM4yIn5oHw2jD/4d2dd6baf850f0a9cfca7cc6ac470b8b/valley_2024__2_.jpg');
CALL addEvent ('Jessica Audiffred', '', 'Musique', 'Montreal', '917 Rue Sainte-Catherine E,', '2024-11-10 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/DkeEVKqjCWWha9B5OSb5C/1a467d6b004362f798e371699ec2670b/jessica_audriffred_2024.jpg');
CALL addEvent ('Ratboys and Ducks Ltd.', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-11-10 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5KNjICRfQcu1MMzCKypQe0/6f105138fd197b2c0265b687d09e90ec/Ratboys__680x473_.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Magog', '64 Rue Merry N', '2024-11-10 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/60wBlQK0sGfFeE6Z5pHCYI/8788abe0a298a04c958a5e5583ff1986/paul_piche_2024.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Saint-Damien-de-Buckland', '75 Rte St Gérard', '2024-11-10 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bfljXzLVcKJHyZYyyHyJD/ac219ef2c5ba7312a8ece5012a9b0bc9/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Tinashe', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-11 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2NLvPGELqrkdgYT5uFOqcE/1dbe5973228bfd83b9b01dc6c47f0c9e/tinashe_2024.png');
CALL addEvent ('JJ Wilde', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-11 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3UOupohS61xdSDjLJFp60r/7cc5632b3e8573245e076ab62a64c41e/jj_wilde_2024.jpg');
CALL addEvent ('La Femme', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/Y8SADDIpWfre6HelcxxSu/c4ae5ed700dfb2ba3e9b6b485d8263a1/la_femme_2024.jpg');
CALL addEvent ('Owen Riegling', '', 'Musique', 'Halifax', '2037 Gottingen St', '2024-11-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5pTTPiwTZGPdVWZsUq5uOS/3555216147e588dffe980aa3017329b9/Owen-Riegling---Press-photo-680x473.png');
CALL addEvent ('Thee Sacred Souls', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5oqbbIJ9r4ccv8N4J6WfXG/bc84244ddcbe0a1b78271f0e0161e955/Thee_Sacred_Souls__680x473_.jpg');
CALL addEvent ('Nick Carter ', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1vitW3NQ2fY36QtvNMCJnT/f947df70dda976b5597c5d8879d9469b/nick_carter_2024.jpg');
CALL addEvent ('IAMDDB', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7E21wgDq51cIdFtv6Xv5Wp/91648a3d6a834744339fac8f2020076f/iamddb_2024.jpg');
CALL addEvent ('Owen Riegling', '', 'Musique', 'Moncton', '700 Main St', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5pTTPiwTZGPdVWZsUq5uOS/3555216147e588dffe980aa3017329b9/Owen-Riegling---Press-photo-680x473.png');
CALL addEvent ('Mayhem', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7e1vW9trXijCJjCogMZaEG/1d6b3b8e17ea2c200e15e5d3e6ce5591/mayhem_2024.jpg');
CALL addEvent ('Destroy Boys', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2024-11-13 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1vQ7jfD0hVPUHm2lIliBh9/13c63e630653b94845f432e0b4775548/Destroy_Boys__680x473_.jpg');
CALL addEvent ('La Femme', '', 'Musique', 'Quebec', '972 Rue Saint-Jean', '2024-11-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/Y8SADDIpWfre6HelcxxSu/c4ae5ed700dfb2ba3e9b6b485d8263a1/la_femme_2024.jpg');
CALL addEvent ('Don Toliver', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-14 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1FBESjIfJ9dJxLEdWGd4Jy/ddee47ed94a8f3aa6484fd9b26f99660/don_toliver_2024_3.jpg');
CALL addEvent ('W.A.S.P.', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6vqEX4giZV6uu8RlmFoGtc/76dae7ae9988c331c6261e42af868e71/wasp_2024.jpg');
CALL addEvent ('eaJ', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2FcDfnjKIYKkH16mVrQ33U/0a3661e067e9ba4e8748d25177fdfcc1/eaj_2024_2.jpg');
CALL addEvent ('Nick Carter ', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1vitW3NQ2fY36QtvNMCJnT/f947df70dda976b5597c5d8879d9469b/nick_carter_2024.jpg');
CALL addEvent ('Le Comédie Punch', '', 'Art', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-14 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3pFVPqxeoailcNu7AkLAvO/afc17cd943b6b934aac6364043cf3ffa/comedie_punch_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('In Conversation with Matty Matheson', '', 'Culturel', 'Montreal', '1220 Rue Sainte-Catherine E', '2024-11-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5jz64NQICNN9rGv1LMgSeI/e94acf53ada80617b4af27982eeb6083/matty_matheson_2024.jpg');
CALL addEvent ('W.A.S.P.', '', 'Musique', 'Quebec', '972 Rue Saint-Jean', '2024-11-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ryH7qFstlE16z5tmEw63N/9ca6d77999620d56897ca908ae456329/wasp_2024.jpg');
CALL addEvent ('Chayanne', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7imLC03Zq06sZPAdgI7QEc/96ed6bdf37fb4ae85a287df78310c300/chayanne_2024.jpg');
CALL addEvent ('KISS OF LIFE', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6TjE9QQQ6vYYozsQzXPtvI/e7ed32b5475ce71e1fdc3e5711491077/kiss_of_life_2024.jpg');
CALL addEvent ('Zamdane', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/trgZF1AyRcq4bh83tV1jA/949d6531a0f2f4c117db871a28656638/zamdane_2024__2_.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Cowansville', '331 Chemin Brosseau', '2024-11-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Columbus Blue Jackets', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-17 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/eRUVwgriiPu22HQ7nZWjo/706178f33a1a5d25be8947cb205c91cd/4037_Billeterie_01_Molson_680x473_CLB.jpg');
CALL addEvent ('Sullivan King ', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-17 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/53D4paJLM8nXmBiCemrkOe/98efbf3e415d3b04561e795f0e40a0ec/sullivan_king_2024.jpg');
CALL addEvent ('Lendemain de Veille', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1OehYKbDR8rzWuQAY306bi/0060d5797046c74087374ba56502a597/lendemain_de_veille_2024.jpg');
CALL addEvent ('BUSHI', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/11FeXZ2bFXKIELooHMb9m5/a1754dcbab468b0249357a5d6f6c6c73/bushi_2024.jpg');
CALL addEvent ('Games We Play', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-11-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4qzcXDUi9UY9AmfNE9l4Gf/ca7de89edb908f1d4369283fbd9399d2/games_we_play_2024.jpg');
CALL addEvent ('Marianas Trench', '', 'Musique', 'Halifax', '1800 Argyle St.', '2024-11-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5wA03nGWsFuXo3t5SCQj68/df023304a97e00a86335b1756fdbb478/marianas_trench_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Sainte-Geneviève', '15 615 Boul. Gouin Ouest', '2024-11-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Ocie Elliott', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/23SkfmNvXRZ78OUQoxSoVR/cf75cd59399386c1397fde5664c72309/ocie_elliott_2024.jpg');
CALL addEvent ('The Living Tombstone', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3DCEkRXlJxLdhGlNvzT4id/34b38b96eece19201702117cb54e3ca6/the_living_tombstone_2024.jpg');
CALL addEvent ('Marianas Trench', '', 'Musique', 'Halifax', '1800 Argyle St.', '2024-11-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2pKvHtcsgoejVL8FMFAwQn/3f1c05a5d68cb0dc52f8a73da360fd72/marianas_trench_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Edmonton Oilers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-19 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6cceqIpkW5wZwueHUlErXR/84fc927593ec15e888eaba4535ddae6c/4037_Billeterie_01_Molson_680x473_EDM.jpg');
CALL addEvent ('Exodus', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-19 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1XMMoVQsJ2oAEOz9Qmm0l1/cde6c4f3ea306eeeb31bb8544e0c724b/Exodus__680x473_.jpg');
CALL addEvent ('Senses Fail', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5NDA2DEHHz4G1h8qbI6FF/99d5c7989b72d9a00ec0516f9a6c51e1/senses_fail_2024.jpg');
CALL addEvent ('Rocket de Laval vs Rochester Americans', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-11-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/10ZKKLTCGtDy8IsyOoEBxO/2d85c05e7ea3e1e6f759598550539e04/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ROC.jpg');
CALL addEvent ('Marianas Trench', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1L7ibDuuaxIIa0EpuMn3lp/c5a62c1baa2a65506dfe314b2ed7fb69/marianas_trench_2024.jpg');
CALL addEvent ('Fleurir', '', 'Art', 'Sherbrooke', '2500, boul. de l&#x27;Université', '2024-11-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/57BvzD1ADa3hUsVESzpGzt/36acee708ee582eab195e1f77a29e72a/fleurir_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Sebastian Maniscalco', '', 'Art', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-22 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3hgJqwYMMbu4FSERv6iC2d/91fc2d17365a2dd4f3dc5fcee7cd5e44/splash__5_.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Ruby Waters', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/IGeE8DzNDbcE0nvf2a8qH/0c76d273ffb7eae48971d35f4517b064/ruby_waters_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Daveluyville,', '503 2e rue', '2024-11-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7xVCkmRiYhenVXOdRIryrQ/357d47b2b21a18252a4741e6eca08e97/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Lili St-Cyr', '', 'Culturel', 'Victoriaville', '150, Notre-Dame Street East', '2024-11-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3c6NwEgrgh9YvZBZxusltQ/9f14f6e6382b73eed5f9977675fd6d14/lili_st_cyr_2024_2024.jpg');
CALL addEvent ('Rocket de Laval vs Belleville Senators', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-11-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4fKxZa3a0vCPzuPYAuUAri/a027245c37dc7816032889625e5f0b4d/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BEL.jpg');
CALL addEvent ('Wyatt Flores', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-23 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/30Yp3AqneoGFT144Xbj2s1/521125f37599b46796945916022135e1/wyatt_flores_2024.jpg');
CALL addEvent ('Becky Hill', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-23 02:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7IdrvTCkh9MRFpMwnZBb94/981c9f070f701a8166b05812a34b35ac/becky_hill_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Lavaltrie', '1351, Notre-Dame st. ', '2024-11-23 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Vegas Golden Knights', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-24 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6y5NZrX5NyBCCMPhSoXTFD/fc66c161356916aeda9fdc4cfdd400b1/4037_Billeterie_01_Molson_680x473_VGK.jpg');
CALL addEvent ('Black Tiger Sex Machine', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2024-11-24 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1YtKqTPP5SxzYm9GvVKTfr/f684f7d66cc354ca2fb0869e478d9f2a/black_tiger_sex_machine_2024.jpg');
CALL addEvent ('Karkwa and Guests', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2EwWBcWexH3owZx5S5eSKo/70d51c9931ea64d3097fc8eec597e9d7/splash__22_.jpg');
CALL addEvent ('Chase Matthew', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/60g55TKw8J3zjjJf6dpCHU/98710e9b52fe7d9c367202604dd0b353/chase_matthew_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Richmond', '1010 rue Principale Nord', '2024-11-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3AeBlXqBwq4W3sUyORjhPJ/624e601da4394cb63d4fed15ec79a3e2/fijm24_jordan_officer.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sainte-Agathe-des-Monts', '258, rue Saint-Venant', '2024-11-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2wzr7paFYLaAaZVU2jRkdn/ab12a15c769d09e31623ac6eadfee914/pierre_lapointe_2024.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Acton Vale', '1450 3rd avenue', '2024-11-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/vuxKOxrPm4qGPwoWfosR5/0ae88c6af6453c3c7936231f8c1a71df/paul_piche_2024.jpg');
CALL addEvent ('Ana Gabriel', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2024-11-25 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6EZ7SGehMcYhjEKWbi8reT/8ef6b408f86e9033eab2295c46355905/Ana_Gabriel__680x473_.jpg');
CALL addEvent ('Kes', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-25 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6nRY166vjpqJpBntPyZg1V/e3ddc509d7717826fb0657ba1a9c8a0e/kes_2024.jpg');
CALL addEvent ('Creed', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4TnhbMz7WVECY2SRREcl8M/743135115cbf43e602a3b57485414d68/creed_2024.jpg');
CALL addEvent ('Kes', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-26 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5e01rRdKCM2MYBMiqqt0DY/ef0f389af6767224a64a1633662f86c6/kes_2024.jpg');
CALL addEvent ('Caribou', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2024-11-26 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7H9WvE7GHRTvWpWemsfSXa/bfb15c8767c4aecd96864aec3c3baac6/caribou_2024_2.jpg');
CALL addEvent ('Montreal Canadiens vs Utah Hockey Club', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-11-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/Dcm8Nztl22cxfXzJ0HYq6/09184d5e1b265d92629c7c28be8cbc3f/4037_Billeterie_01_Molson_680x473_UTAH.jpg');
CALL addEvent ('Forest Blakk', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-27 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/29Rw3VtzLVYANYJTrVk4zF/06722595dedc571d4c141fc6bdcf4254/forest_blakk_2024.jpg');
CALL addEvent ('The Pineapple Thief', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-28 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2JxykbAx3GgLuZGzwOVutO/bd1903fe8b13438cc0546a74a3f80e57/the_pineapple_thief_2024.jpg');
CALL addEvent ('Zeal & Ardor ', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/30auQDX8voGE6YAcHZIbpW/1fadb76c063855ed409cc28a791e534a/zeal_ardor_2024.jpg');
CALL addEvent ('Joel Plaskett', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-29 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2aWHyNx1dIt87tqH1adGus/83022a221b03fc102e4943a570e015ae/joel_plaskett_2024.jpg');
CALL addEvent ('Brittany Kennell', '', 'Musique', 'Montreal', '872 Rue du Couvent', '2024-11-28 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2K8mfzNIOszSGOJbN6folP/963505b20fb2e14d2e23ca879e2f5299/Christmas_Show_Poster_680x473.png');
CALL addEvent ('Irène', '', 'Musique', 'Quebec', '251 Rue Dorchester', '2024-11-29 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/22PjxSh4F2QByyQX6deNZP/c332573d8036f2cbe331342641bb377d/irene_2024.jpg');
CALL addEvent ('The Jinkx & DeLa Holiday Show', '', 'Culturel', 'Montreal', '1004 St-Catherine Est', '2024-11-29 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4AxolleSrASYEl1jIN20rx/7dcfa33374a33b3d1db913b21b1eb812/jinkx_monsoon_dela_holiday_2024.jpg');
CALL addEvent ('K.Maro', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-11-30 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4Sy6AMjhk2UN41XZ1S32Dj/b584363305927a9051596851f4829fe9/k_maro_2024.jpg');
CALL addEvent ('Mark Ambor', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-11-30 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5VEtDgyCbrY1ANIsQ1zBlN/23f2dcbd4859fe70acb76e546ad61bc4/mark_ambor_2024_2.jpg');
CALL addEvent ('Sterling Scott', '', 'Art', 'Montreal', '305 rue Sainte-Catherine West', '2024-11-30 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3BSPAAYnlCJBkFdXNpDqmh/b820f33864963c9de9b94f96c1f8e4bb/sterling_scott_2024_2.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pat Metheny', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2024-11-30 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1wyiaP4yksEp6ZHCloaLur/10f8d9df6a81be6873e979bf65eac382/pat_metheny_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Lasalle', '1111 rue Lapierre', '2024-11-30 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/wwesj4QI8cW3lxvibPKs4/d70a4f3f9ebc92dc89f5fb5336d459af/pierre_lapointe_2024.jpg');
CALL addEvent ('Steve Hill ', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7HjhxlBKDJUIw8E3VZzaXT/b7d408e8b1b0092cba37be1ff6ac308f/steve_hill_2024.jpg');
CALL addEvent ('Snotty Nose Rez Kids', '', 'Musique', 'Montreal', '4483 Boulevard Saint Laurent', '2024-12-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2flKKRguGU6ShzcFYVSld1/8a7b580ed8888fe0d4a2a3d4c42d69ee/snotty_nose_rez_kids_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Shawinigan', 'Centre des Arts de Shawinigan', '2024-12-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6b4xIOXNdYaOWswdEqe5aG/ef4d8fa624b7a867e110363414207088/pierre_lapointe_2024.jpg');
CALL addEvent ('Alexander Stewart ', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-02 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/135Yo1fjORmLewETIPDDOa/2f79f491e5570e1405896642307d84a7/alexander_stewart_2024_2.jpg');
CALL addEvent ('Classified', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-02 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6RoWBHmbm3V6m0Ni7tEtRz/be68fd8234fd2beb365f2aa32bb2020c/classified_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2024-12-02 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6b4xIOXNdYaOWswdEqe5aG/ef4d8fa624b7a867e110363414207088/pierre_lapointe_2024.jpg');
CALL addEvent ('Tokio Hotel', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2024-12-03 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3yMK2e2XhxvA5lNaQ1ADlO/96681e23f4840a73029aa8e5975d4a11/Tokio_Hotel__680x473_.jpg');
CALL addEvent ('Montreal Canadiens vs New York Islanders', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/33CSYcDyalRWVRyD8oYiLq/91507c0487a774ec6e2606392f02340b/4037_Billeterie_01_Molson_680x473_NYI.jpg');
CALL addEvent ('Luedji Luna', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-05 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/yt0YdOLQHonrAO2FNI1L7/678d69af3bfba3452fc28a301adccc92/luedji_luna_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Lasalle', '1111 rue Lapierre', '2024-12-05 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Nashville Predators', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4JxZz55IypPMy8cZ9X3T9d/ab638bad2dbee3aedf2e4e0dcfb91689/4037_Billeterie_01_Molson_680x473_NAS.jpg');
CALL addEvent ('K. Trevor Wilson', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-06 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/nEcliJ3o0zofJKx06EB3v/a05d24da3bd18d265edb10d936ac40fe/K._Trevor_Wilson__680x473_.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Canabliss', '', 'Musique', 'Montreal', '1403 Rue Sainte Élisabeth', '2024-12-06 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3EFuFPriUAAzXwqM4HXrHx/3c059bbad55f8b5136fdd4c4ec6e9180/canabliss_2024.jpg');
CALL addEvent ('DVTR', '', 'Musique', 'Montreal', '87, rue Ste-Catherine est', '2024-12-06 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/395WmdDwtpMVGxNy0BgoAg/f3ba47d0c087a73696d09f2fc47853d8/DVTR__680x473_.jpg');
CALL addEvent ('Russell Peters', '', 'Art', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6kqzvnUdtoQgi488a8lZds/2d3c819ded2a9500d59efebaad4cb3b0/russell_peters_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Toronto Marlies', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-07 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6mCy8wFsrYaV3xDoPLtY7o/9ca8772dc0ef77bcc964c5e01845c10f/2425-5005_ticketmaster_event_matchups_SAISON_680x473_TOR.jpg');
CALL addEvent ('The Dead South', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5p0Mv3X5QLaGuTmZKy9wzx/2aff30f6bae93ae834ecf74147eaddf9/the_dead_south_2024.jpg');
CALL addEvent ('Vacra', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/11sB6t2L21pSlUgUJBNhoL/1f6a45acc1c9651a7e2c78ee424425cf/vacra_2024.jpg');
CALL addEvent ('Owen Riegling', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5pTTPiwTZGPdVWZsUq5uOS/3555216147e588dffe980aa3017329b9/Owen-Riegling---Press-photo-680x473.png');
CALL addEvent ('Cameron Whitcomb', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-12-07 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7hMOoHoKIaO1O3nXRNeoPL/093675cb1821edcc0232c6af673c8581/cameron_whitcomb_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Saint-Hyacinthe', '1705, rue St-Antoine', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/69h6gWNliuQUZode7cc0GQ/cddd9d7419d5496adb179b05ef804b46/pierre_lapointe_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Bromont', '593 rue Shefford', '2024-12-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Washington Capitals', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-08 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/64ug6LfYUydbSNEXPXnbSr/d558f17663d11454c4b66092e7345d04/4037_Billeterie_01_Molson_680x473_WAS.jpg');
CALL addEvent ('Rocket de Laval vs Toronto Marlies', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-07 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1VedpBpeExFlHW3jgZkTty/aa311834767fa6a7d94d9430074a8c9a/2425-5005_ticketmaster_event_matchups_SAISON_680x473_TOR.jpg');
CALL addEvent ('Conner Smith', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4WkG3CMVGUDDrQji8cVK57/d7d314d41212d859bbe2100f776deb73/conner_smith_2024.jpg');
CALL addEvent ('Texas King', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-12-08 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6ER3JqBWqFqDfJvj7hvWxu/674649f1c32327352982dfe7d63dc193/texas_king_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Saint-Eustache', '305 Avenue Mathers', '2024-12-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/69h6gWNliuQUZode7cc0GQ/cddd9d7419d5496adb179b05ef804b46/pierre_lapointe_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Acton Vale', '1450 3rd avenue', '2024-12-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Saint Levant ', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4wIPUqBFVzCGy3q9PRkYNa/b2ae075790309e3f8fad45d0d8014fcc/saint_levant_2024.jpg');
CALL addEvent ('Lili St-Cyr', '', 'Culturel', 'St-Jean-sur-Richelieu', '30, boulevard du Séminaire Nord', '2024-12-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3c6NwEgrgh9YvZBZxusltQ/9f14f6e6382b73eed5f9977675fd6d14/lili_st_cyr_2024_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Anaheim Ducks', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-10 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/59RS26UcNcLDqhEUMiLch6/e4284495c49fcf4c81b1f9bf0e6983ed/4037_Billeterie_01_Molson_680x473_ANA.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Brossard', '6000 Boulevard de Rome', '2024-12-11 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2wzr7paFYLaAaZVU2jRkdn/ab12a15c769d09e31623ac6eadfee914/pierre_lapointe_2024.jpg');
CALL addEvent ('Gad Elmaleh', '', 'Art', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5hiUNdC7OHmBrEoFoJb6EP/affd758865a72823f883ae2f2f0ad455/gad_elmaleh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Rochester Americans', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3fBq6XCyl1qYAORqhifhOo/bf9a0e23e29a250f2a90a13e637718b7/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ROC.jpg');
CALL addEvent ('Elisapie - Uvattini', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2oy8OU42WVDjIYg0M793nX/860af8f26ce0b06446bab40cdb5f682d/fijm24_elisapie.jpg');
CALL addEvent ('Bedouin Soundclash', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1WujWlItdfBwEj3I9ehhIz/a4cde493b6bef7a6603d3947f0f6cac4/bedouin_soundclash_2024.jpg');
CALL addEvent ('MC4D', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2024-12-12 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5Wm4eK8BO19jBVqs15Qx2t/a355800f38f355f7df9c86ba8492e8b0/mc4d_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Quebec', '68 rue du Petit-Champlain', '2024-12-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Pittsburgh Penguins', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3VvQ99cJ7lLmcJUukOdOTn/4017dee468801e9918d1774a40af280d/4037_Billeterie_01_Molson_680x473_PIT.jpg');
CALL addEvent ('Le Comédie Punch', '', 'Art', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-12 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3pFVPqxeoailcNu7AkLAvO/afc17cd943b6b934aac6364043cf3ffa/comedie_punch_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('The Flatliners ', '', 'Musique', 'Montreal', '1225 Boul St Laurent', '2024-12-13 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/70Ct35mNhcdZl1RP2FmsXb/399997d52fc4c0c8c58defeee7c75cf8/Sans_titre-8.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Quebec', '68 rue du Petit-Champlain', '2024-12-13 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Tony Ann ', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7E8YWCxdcUDJCIqUXKSYi2/783a790f73e0ac67f58385bcfbf66bee/tony_ann_2024.jpg');
CALL addEvent ('Sara Dufour', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/9JDmgMAJsdoqELfKYghWq/ed45959ac5dad89ac630320dcaa67352/sara_dufour_2024.jpg');
CALL addEvent ('Térez Montcalm', '', 'Musique', 'Montreal', '1248 Rue Bernard O', '2024-12-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5tbNTkjz0Z63mp4ALjIVa/e41a7edb5ab479b0f1f4fbed6f5f514d/terez_montcalm_2024.jpg');
CALL addEvent ('Kasablanca', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2024-12-14 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7kdW5NiJSjc9o7RpTYtkZG/8e556c1f5b6869b509811c062f28c051/kasablanca_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Gatineau', '25 Rue Laurier', '2024-12-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Saint-Jérôme', '118, De la Gare street', '2024-12-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2wzr7paFYLaAaZVU2jRkdn/ab12a15c769d09e31623ac6eadfee914/pierre_lapointe_2024.jpg');
CALL addEvent ('Suki Waterhouse', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7829GLE1ZyyRdskg6OPB5W/fef51071a47248e79c62b242d14b5982/suki_waterhouse_2024__2_.jpg');
CALL addEvent ('Philippe Brach', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6URZyNTwXMAxJsDDb4anHB/f6993f46c31b9546372b1ca06a7e004a/philippe_brach_2024.jpg');
CALL addEvent ('Scott Helman', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2024-12-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3lrPupbevzn6QgKlo7c0Wc/6a57824fefcbcfeaac7d2c9a945a926b/scott_helman_2024.jpg');
CALL addEvent ('Layz', '', 'Musique', 'Montreal', '1225 Boul St Laurent', '2024-12-15 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6qGsLfk6w9F18vs0JuVG1C/709ed55357297c1aac4d0149c5c1902e/layz_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Laval', '475 boulevard de l&#x27;Avenir', '2024-12-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2wzr7paFYLaAaZVU2jRkdn/ab12a15c769d09e31623ac6eadfee914/pierre_lapointe_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Venise-en-Québec', '239 16e Av O', '2024-12-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Buffalo Sabres', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-18 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2cKZ7mYAMD2aNjjvUjwDSl/df12fbe13aabf8bcaa0b2781d53a27a6/4037_Billeterie_01_Molson_680x473_BUF.jpg');
CALL addEvent ('Down With Webster', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-19 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5dXRHpcU9OmRGEQEgH7AuQ/0c65d18c3b516ed6c240af7f817de8ed/down_with_webster_2024.jpg');
CALL addEvent ('Machine Girl', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2024-12-20 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2KET6R29z8hgBLWdpg5Wxl/c07dae4afebe9527119dacab8127e972/machine_girl_2024_2.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Quebec', '269 Boul. Rene-Levesque', '2024-12-20 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/75MpLyZcFsRngM0dpG4K51/37e1b39033a5ad59c99a4332264ae101/pierre_lapointe_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Sainte-Geneviève', '15 615 Boul. Gouin Ouest', '2024-12-20 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Belleville Senators', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5PlYc3KHdzs0X8DmIltjzE/c1d61557ad0c757a7d46224c4c29c226/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BEL.jpg');
CALL addEvent ('Orloge Simard', '', 'Musique', 'Montreal', '59 St Catherine Est', '2024-12-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2jSn6I5fqwG9UGkcgHrEuv/3464c669e6b59b2644a1a6e0d43f164d/orloge_simard_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Quebec', '269 Boul. Rene-Levesque', '2024-12-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2wzr7paFYLaAaZVU2jRkdn/ab12a15c769d09e31623ac6eadfee914/pierre_lapointe_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Detroit Red Wings', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4gZulDOfLyOBYmsFk1kgHX/da130b2918ae9863bbed63ebd32bdf8e/4037_Billeterie_01_Molson_680x473_DET.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Saguenay', '534 rue Jacques-Cartier Est', '2024-12-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/75MpLyZcFsRngM0dpG4K51/37e1b39033a5ad59c99a4332264ae101/pierre_lapointe_2024.jpg');
CALL addEvent ('Bruno Pelletier', '', 'Musique', 'Quebec', '68 rue du Petit-Champlain', '2024-12-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3s8a6ZyMY1jpATa3IonCT5/5ced96ff23178b4370b760d0314afe93/bruno_pelletier_2024.jpg');
CALL addEvent ('Rocket de Laval vs Springfield Thunderbirds', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-22 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1OcLCyaZTNV3bRRaXUcFO4/191491c15f20ad86f1c73c652dca9c69/2425-5005_ticketmaster_event_matchups_SAISON_680x473_SPR.jpg');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Rocket de Laval vs Syracuse Crunch', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5DxEqfxn4DYp7chMZ8q6Oa/9899466a14d61e23028295f65a82d851/2425-5005_ticketmaster_event_matchups_SAISON_680x473_SYR.jpg');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-28 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Rocket de Laval vs Syracuse Crunch', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2024-12-28 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3pZlbbk949aAZ79zj1h6NH/6fc729611435a6f560f05d81c901fa03/2425-5005_ticketmaster_event_matchups_SAISON_680x473_SYR.jpg');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-29 22:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-29 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-31 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-30 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2024-12-31 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-03 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Rocket de Laval vs Abbotsford Canucks ', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6DUwTeNcOLNBHhis25Qkgy/966002bd7264ccac868adbae01f020d0/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ABB.jpg');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-04 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Rocket de Laval vs Abbotsford Canucks ', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5cDbpQWuvR5xYdheHuxSed/99b7c4c6399b241f89a7a644d5447a99/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ABB.jpg');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-05 22:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Cirque du Soleil: OVO ', '', 'Culturel', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-05 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1kep7yyTUsA3n4KaxWgxij/cd90503a611be48d21c371d4551fd84d/ovo_2024.png');
CALL addEvent ('Montreal Canadiens vs Vancouver Canucks', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-07 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/bKMHXoKf1xXTqbFLZnHcg/7212deebcf509b3f6fb1e38dc440443f/4037_Billeterie_01_Molson_680x473_VAN.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-10 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-10 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('The Gracefully Hip', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-01-11 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1D7ZZNiT6XyFKP7mR1mnCA/2eec4241f235590ee6a7fc29c976cb4e/cropper__5_.jpg');
CALL addEvent ('Montreal Canadiens vs Dallas Stars', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/zscU5EEWDkel128fpdJCr/3ef960b0e37f5d8c084cae0a0a2a8c87/4037_Billeterie_01_Molson_680x473_DAL.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-11 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-11 16:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('INFEKT', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-01-12 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6ieM8hNRLkrybXSckKAin0/0a7511f1b92d13aeaf6954712b9d02c5/infekt_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Chertsey', '543 chemin de l&#x27;Église', '2025-01-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/60wBlQK0sGfFeE6Z5pHCYI/8788abe0a298a04c958a5e5583ff1986/paul_piche_2024.jpg');
CALL addEvent ('Jerry Seinfeld & Jim Gaffigan', '', 'Art', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-13 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6SZPWqBKDGLp8qrkdTyqsl/250edf1d822f019f06d06cb530449243/seinfeld_gaffigan_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-12 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('DISNEY ON ICE: Into the Magic ', '', 'Culturel', 'Laval', '1950 Claude-Gagné Road', '2025-01-12 16:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4zsmsHHoatoED3yDjw2MFo/70a9e0f8f53d08a04ce288f01e1e7b3f/disney_on_ice_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-01-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Rocket de Laval vs Wilkes-Barre/Scranton Penguins', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1b6yu1PxokAtQPaPKaEtLd/d195cfc9c38ee4a62e045a0c1a6bdbfe/2425-5005_ticketmaster_event_matchups_SAISON_680x473_WBS.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-01-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Musical Box', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-01-17 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4Ipcp9DeN2G8rtrwN1x0EO/4082f926c697cb0f7898de10ff6fea3f/musical_box_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-01-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('La Grande Veillée', '', 'Musique', 'Gatineau', '1 boulevard du Casino', '2025-01-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6CtbvpdaOXmgrJIBnX4ax7/d4fd0df00bf84eb46a37a63fd7fdcc76/la_grande_veillee_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Montreal', '1248 Rue Bernard O', '2025-01-18 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5yo4C9NVlwm4JYuTvudna1/efcd7e8e3107f9b7184c91a28de439d5/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Toronto Maple Leafs', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-19 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4ROdYmZTyYD6fs9wvbzoAJ/f930f02c65df31bb91acaa6728fb2eb7/4037_Billeterie_01_Molson_680x473_TOR.jpg');
CALL addEvent ('Rocket de Laval vs Utica Comets', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-19 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2UcQ41SwIdPVEHFIg60IQA/7f47369f5b26e556c989de9d5e31fa69/2425-5005_ticketmaster_event_matchups_SAISON_680x473_UTC.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-01-19 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Brossard', '9200 Boul. Leduc #210', '2025-01-19 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/wp9K9SsZ3poe5zR80eDST/880dd60246c55e5e064fc416d22b4625/fijm24_jordan_officer.jpg');
CALL addEvent ('Sungazer ', '', 'Musique', 'Montreal', '1225 Boul St Laurent', '2025-01-19 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/VRkUMIqPqbiOCT1mDdf2Z/3b4100254a84fb6d118c4e0d126df447/sungazer_2024.jpg');
CALL addEvent ('Montreal Canadiens vs New York Rangers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1YNFV2q5IgBOmzbOcKK4DA/710304e230a24bdaa0045b528a81667b/4037_Billeterie_01_Molson_680x473_NYR.jpg');
CALL addEvent ('The Vaccines', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-01-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4JnkKjI5zMgj3HvYALKm1I/eccc4a719812c40fa39b31a365b16ccb/the_vaccines_2025.jpg');
CALL addEvent ('Montreal Canadiens vs Tampa Bay Lightning', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/xBidblS9rIVG1oygZtCPf/4d1d729aad8a38244056823101274cd4/4037_Billeterie_01_Molson_680x473_TB.jpg');
CALL addEvent ('L''Impératrice', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-01-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bntVCQNcOXwnQ90Dh5jJG/1c58ebd3051819c62d83e320740e0609/l_imperatrice_2024.jpg');
CALL addEvent ('Been Stellar', '', 'Musique', 'Montreal', '57 Prince Arthur Est', '2025-01-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6FwEZ9KLdNRsJOn5y7WqoD/68d84f6b2c5e639660d93cbcd0980984/been_stellar_2025.jpg');
CALL addEvent ('Rocket de Laval vs Hershey Bears', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5RFe3LQGZuomUg542AWza5/5ec313c354ec3858c47cd1fe47a8f799/2425-5005_ticketmaster_event_matchups_SAISON_680x473_HER.jpg');
CALL addEvent ('L''Impératrice', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-01-23 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5bntVCQNcOXwnQ90Dh5jJG/1c58ebd3051819c62d83e320740e0609/l_imperatrice_2024.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Rivière-du-Loup', '67 rue du Rocher', '2025-01-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/qbNT87MBJXRJr1xhmYUr3/384fcd3e8fed6743745f06f4a7ca238d/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Paul Piché', '', 'Musique', 'Quebec', '68 rue du Petit-Champlain', '2025-01-24 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iuqMAgk3FER9y4Z1KrJYO/bf93916a31ba8844b146deb40a196208/paul_piche_2024.jpg');
CALL addEvent ('Les Nets vs Raptors 905', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-25 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/WAzXgqIJCpcUQRFYSMtLR/0b0e4f5698c2c5dfa761588ad108a28c/nets_raptors905.jpg');
CALL addEvent ('La Grande Veillée', '', 'Musique', 'Montreal', '1 Avenue de Casino', '2025-01-25 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6CtbvpdaOXmgrJIBnX4ax7/d4fd0df00bf84eb46a37a63fd7fdcc76/la_grande_veillee_2024.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Quebec', '620 Avenue Plante', '2025-01-25 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4dc7fUvNLyZ9fSZUtGLU14/2aee21eaa032bc485f85877ef3228fe6/paul_piche_2024.jpg');
CALL addEvent ('Montreal Canadiens vs New Jersey Devils ', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4XBvdwBRtKifMscgyEE7yM/cc19c65780b42d66dff75b9fc7240277/4037_Billeterie_01_Molson_680x473_NJ.jpg');
CALL addEvent ('Sum 41', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-01-25 23:50:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/ttEUqadqlRnvCSatohvhq/a38d90619006b93926d1b8acb1103a13/sum41_2024_2.jpg');
CALL addEvent ('Joy Oladokun', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-01-26 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5HIM3oJRrEpvSEd1aQkTFP/18f3101664c02003cda2ec8508baba61/joy_oladokun_2025.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Saint-Eustache', '271, rue Saint-Eustache', '2025-01-26 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6LF9MueYMRhBJPELMVlVvm/14ab93babea76b664de7f862724ea799/fijm24_jordan_officer.jpg');
CALL addEvent ('Les Nets vs Raptors 905', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-01-26 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/Hj6P6BsA1ekvYpsSSmCrz/3b098e1d415e9ec4803f94a2baa22675/nets_raptors905.jpg');
CALL addEvent ('Montreal Canadiens  vs Winnipeg Jets', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3Xtp9bKH8gzb4ndEVecQLj/f2f556aa1ee941a4dfd7f560d8897ab5/4037_Billeterie_01_Molson_680x473_WIN.jpg');
CALL addEvent ('Wunderhouse', '', 'Musique', 'Montreal', '4483 Boulevard Saint Laurent', '2025-01-29 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5CnvyfSghsCmgkZxxHzvxG/aad5e3ebf416b3b9375e2705ea1a4209/wunderhouse_2024.jpg');
CALL addEvent ('Fred Dionne', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-01-29 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5oq5Q73AvRuuf5wKVk14Ty/f5ada1bd87d27744e48e9f1ca719901c/fred_dionne_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Minnesota Wild', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-01-31 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/35DF1gvMuY1F91gESKrhVZ/0382b9699bf21bb75d67c81cc35c83cf/4037_Billeterie_01_Molson_680x473_MIN.jpg');
CALL addEvent ('Of The Trees', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-01-31 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2X2eXkHhl54oZtgzSIoQ0H/b8eca998fded0d16933f37e4f063820c/of_the_trees_2025.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Montmagny', '29 rue St-Jean-Baptiste Est', '2025-01-31 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7FjCfnhulY9pNNtPtQT45M/c64c7ccd8bbfd4ff024f50ea70577a20/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Hartford Wolf Pack', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-01 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1gyt8fAePv77oVx8yp5U5z/ccd413011dfe4d40743f7d7dbe494e98/2425-5005_ticketmaster_event_matchups_SAISON_680x473_HFD.jpg');
CALL addEvent ('HOL!', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-01 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2W7tbSQW7p26JuDAKj68d2/9098280e652602edbe7ae997a0155e79/hol_2025.jpg');
CALL addEvent ('Rocket de Laval vs Hartford Wolf Pack', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-01 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2cvMRynQPRCfVGnfbYTy0X/f6dbbed7364fb4c9dcc4b729e3531a5c/2425-5005_ticketmaster_event_matchups_SAISON_680x473_HFD.jpg');
CALL addEvent ('Nurse John', '', 'Art', 'Montreal', '1004 St-Catherine Est', '2025-02-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6QV3Kp8g1se59fkS8up9Fq/1da6bd717fcfedf5886a6c835d2575a1/nurse_john_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Soccer Mommy', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-02-03 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/Hc8Rsfo42rtTPGQ3cRjsq/b08fd89fc213b33cfefdca7add5ca06b/soccer_mommy_2025.jpg');
CALL addEvent ('Kerry King ', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2025-02-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/knpp7uimZzH5ltTbYJYm0/cde19a4844a6bb821c607830dc1b1542/kerry_king_2025.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-05 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Les Nets vs Greensboro Swarm', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5A4c4ss6iELI02JCcHXkxW/eee46c5161097d1e1a048fb0591ce8ec/nets_greesnboro.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-06 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('MUZZ', '', 'Musique', 'Montreal', '1403 Rue Sainte Élisabeth', '2025-02-07 02:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1fxeSS7NH8Li8W1HaHh88A/4140b61299df164a5b73a3b5a20f860f/muzz_2025.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-07 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('ATLiens', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-08 03:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5iAXPkIsLgYdlwq9R6y23F/fcbe82a8164ee8bd86c3bd7625232079/atliens_2025.jpg');
CALL addEvent ('Fábio Porchat', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2025-02-07 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67Blqfac9eYqZpKwcmaRRT/8695c9548b19543e2cdab49bbd416b01/fabio_porchat_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Fábio Porchat', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2025-02-08 02:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6TumhKQccgA3MqolHETlDe/dd0643806d6056f1eff27e2a615119b9/fabio_porchat_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Steph Tolev', '', 'Art', 'Halifax', '1800 Argyle St.', '2025-02-08 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1qSDO2ZcqFHyL16f6cBv4l/1bd3c456d00b3fddf95911e78caee3a7/steph_tolev_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-08 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'La Conception', '1330 RUE DU CENTENAIRE', '2025-02-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6t9tNkrJVNIkWl3YZY4YsS/c108f2f81b7d9a6302d5e8fdc0c73a2f/paul_piche_2024.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Saint-Bruno-de-Montarville', '530, boulevard Clairevue Ouest', '2025-02-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5Ud9uiaZ7OB6o2vs3KX2wU/20b86e74ff140dfc4fa25499da889b46/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Trois-Rivières', '', '2025-02-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Montreal Canadiens vs New Jersey Devils', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-02-08 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/26WBT2GrEbfIOHzq4JhTqp/c8beb52aaf0c7410073bcb0ccfe9f5d2/4037_Billeterie_01_Molson_680x473_NJ.jpg');
CALL addEvent ('Les Nets vs Delaware Blue Coats', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-08 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2mXoxvX2vqIQk32anTh8yv/06216c123c5a38a81874d4839a1f44af/nets_delaware.jpg');
CALL addEvent ('Uncle Acid & The Deadbeats', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1IZkYUcVAtVoucD7f1G5Te/dc1aae9b487c1095b94f7202e1cbf925/uncle_acid_the_deadbeats_2025.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-09 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-08 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Hansom Eli', '', 'Musique', 'Sherbrooke', '58 Rue Meadow', '2025-02-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/seDDJ1k0RAh4n6AXSxXg1/6f57e8427e22ba276e38fabcc31e4c17/hansom_eli_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Tampa Bay Lightning ', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-02-09 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2OOMyu1e8RCAC2Rt96A5nd/1d3b7b4675687d2e1e0ebaec927e02c2/4037_Billeterie_01_Molson_680x473_TB.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-10 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Tina: The Tina Turner Musical', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-02-09 18:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2DZy55ROEnuL8VKjMY9AP2/d88fa81e03413ae77e3ce908dac98eb6/tina_turner_2025.jpg');
CALL addEvent ('Toro y Moi & Panda Bear', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-12 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5VWPWJfrB15yAxkAzmTFQF/6a791d4a88434499d3e3861a59699364/ToroyMoiPandaBear_2025.jpg');
CALL addEvent ('Apocalyptica', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-13 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3H05D1th6UixoPaX2qLZYK/62df3a8322ac1d4224ba0960f697fc03/apocalyptica_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Laval', '475 boulevard de l&#x27;Avenir', '2025-02-15 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Silverstein ', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2025-02-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1IhCwmEO5A3oMEXA0UMYmu/e3a0defabafef20e8a5b6198506fbd46/silverstein_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Mont-Tremblant', '1829 Chem. du Village', '2025-02-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6sQ4fKRcraWclnEiUawJoI/630bb2c4f31e59c8fd31eeed486c93c3/pierre_lapointe_2025.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Shawinigan', '15 avenue de Grand-Mère', '2025-02-16 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6LF9MueYMRhBJPELMVlVvm/14ab93babea76b664de7f862724ea799/fijm24_jordan_officer.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Valleyfield', '169 rue Champlain', '2025-02-16 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Rocket de Laval vs Manitoba Moose', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6HXMG7fqTOPTmgEDsJCfe6/240dc48e6e3513f6d95cdabf03824578/2425-5005_ticketmaster_event_matchups_SAISON_680x473_MB.jpg');
CALL addEvent ('Foster the People', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-02-20 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4AmrjBor5wfTctD5vufsiC/5a53b70b10d4a2a24c68439f6e09e87e/foster_the_people_2025.jpg');
CALL addEvent ('Yuridia', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2025-02-20 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6Bvq9HaN0U8G0JFPWwfI2f/1d560eb98544c6bdcc8a93830352f215/yuridia_2025.jpg');
CALL addEvent ('Tiakola', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-02-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/GU68gapfP93o6dER1oecP/8b047496a0a15274257f19cb93e3c031/tiakola_2025.jpg');
CALL addEvent ('Lou-Adriane Cassidy', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-02-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/38Z27M5n5tsn71ngz9li85/aa8eba95dd296a83a1c52d548e47a4cf/lou_adriane_cassidy_2025.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Saint-Jérôme', '101 place du Curé-Labelle', '2025-02-21 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2mHYdIzgdeguvllKMwx6Oe/31f6e262597b319240344deec2b0e7ee/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Manitoba Moose', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-02-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/vPYb20ciqO2L1SU2vJb3Y/792651038828bfa006451be07c1837b4/2425-5005_ticketmaster_event_matchups_SAISON_680x473_MB.jpg');
CALL addEvent ('Hyprov', '', 'Culturel', 'Montreal', '59 St Catherine Est', '2025-02-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5ok83KJiEIWpD4nyOCrk7q/d80dbf2890b7bda31f5bcc76c589d48b/hyprov_2024.jpg');
CALL addEvent ('Lou-Adriane Cassidy', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-02-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2LpuKGqXmlNwcenCu56f2h/a785d75221bc8db4c02ce5ec08ccbaa6/lou_adriane_cassidy_2025.jpg');
CALL addEvent ('Mild Minds', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2025-02-22 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7723CC6GaZuzwKU4iyyQHi/d398f3916df70fb2f48f151096e48021/mild_minds_2025.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Laval', '1395 boul. de la Concorde Ouest', '2025-02-23 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3ymnHDrwBQxMFjTpxbbITJ/1c521d4801a8f31a149aeddd972f86b3/fijm24_jordan_officer.jpg');
CALL addEvent ('Montreal Canadiens vs Carolina Hurricanes', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-02-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/N4Tri1R6j0jFJAeZFEsLb/8d053e7027428b20da2ae8c42d6ff2bc/4037_Billeterie_01_Molson_680x473_CAR.jpg');
CALL addEvent ('Thierry Eliez', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-02-27 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6Z405i29PZ2SdgAwJJSdui/ef049a396d244aec4c4c72181273d1db/thierry_eliez_2025.jpg');
CALL addEvent ('Rita Baga', '', 'Culturel', 'Montreal', '1004 St-Catherine Est', '2025-02-27 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1iIga2oqS0jxhjihQrJG6t/02c732262272d3ced9690d8a38e914b2/rita_baga_2025.jpg');
CALL addEvent ('Montreal Canadiens vs San Jose Sharks', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-02-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3UIkjGFTr6ncIRTTT1vGZc/88cf5969cae34b3fe7189ca8a7022615/4037_Billeterie_01_Molson_680x473_SJ.jpg');
CALL addEvent ('La Marche de l''empereur', '', 'Musique', 'Montreal', '1225 Boul St Laurent', '2025-02-28 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/S6prDwmbCLhWYHZNIzpBF/effee6191e6d71bbf330840bda65d669/marche_de_lempereur_2025.jpg');
CALL addEvent ('Flore Laurentienne', '', 'Musique', 'Montreal', '463, rue Sainte-Catherine', '2025-03-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7oyM4TRptTB1s2YZ3sznxj/e0edf4a3577c5ee79d945d93593f5512/flore_laurentienne_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Trois-Rivières', '3175 Boulevard Laviolette', '2025-03-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6sQ4fKRcraWclnEiUawJoI/630bb2c4f31e59c8fd31eeed486c93c3/pierre_lapointe_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Thetford Mines', '561 Rue St Patrick', '2025-03-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2pnNqezfpdhlMAG4PXXEBi/d79b51e1a6ce940fd0cec38979b01a95/paul_piche_2024.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Thetford Mines', '561 Rue St Patrick', '2025-03-01 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5XkHfTmUngW2On8dzVlyj6/37385a0e51a997d31637257ac432ac8b/paul_piche_2024.jpg');
CALL addEvent ('Rocket de Laval vs Belleville Senators', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1mPfWFyNPd2aCznarOhjZz/3401e3c4ab81f0457e943d9bfec1dcae/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BEL.jpg');
CALL addEvent ('Faye Webster', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-01 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1ttwlCFYheyc1ZSRA4YDiT/36b2f119dfcb2e2a454a58b6662ccc1c/faye_webster_2025.jpg');
CALL addEvent ('Folkfest Of The North', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-03-01 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6g0AxEa76kVPbeDGVI0GOD/aa54f02b0cec7f931881948922a4a57e/folkfest_2024.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Granby', '135 rue Principale, bureau 20', '2025-03-02 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6sQ4fKRcraWclnEiUawJoI/630bb2c4f31e59c8fd31eeed486c93c3/pierre_lapointe_2025.jpg');
CALL addEvent ('Mother Mother', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-03-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5CeliWpb8UyNLl2JJ7sxIj/1a734a395c8b1a6c071e19da793518c8/mother_mother_2024.jpg');
CALL addEvent ('Federico Albanese', '', 'Musique', 'Montreal', '175, rue Sainte-Catherine Ouest', '2025-03-03 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7IVYAoCLRKd3pEdx6yXxdS/1e66e74e17bd2f299c0fb3fc3d246d8c/federico_albanese_2025.jpg');
CALL addEvent ('Montreal Canadiens vs Buffalo Sabres', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/O4EtVHBSe6pImOFIfBTln/6b51bef07453a080627d11b0467bc829/4037_Billeterie_01_Molson_680x473_BUF.jpg');
CALL addEvent ('Rocket de Laval vs Utica Comets', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/D1YcL4czUFfdHmJIEGFut/594ea104057f1c12cfb8df58cc66755a/2425-5005_ticketmaster_event_matchups_SAISON_680x473_UTC.jpg');
CALL addEvent ('MARO & NASAYA', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-06 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3yygPCUfuVGVUNrFXctQA2/555f047ab9b70c4ae22bcc134c49fe10/maro_nasaya_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Montreal', '1200, rue de Bleury', '2025-03-06 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6fRUURSBkWT1FppdR8FW3Y/9b1cc71e8bb71587292630ea692bad76/pierre_lapointe_2025.jpg');
CALL addEvent ('Elliot Maginot', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4eU9nHjsrO0YtA5ZRZtcfT/3daf3fdae515897af719cca0d380312a/elliot_maginot_2024.jpg');
CALL addEvent ('Gerry Dee', '', 'Art', 'Charlottetown', '145 Richmond', '2025-03-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4v6iqBfqnoPfjJP6VKNxeH/54fd7f02d32b5ded32dcefe398dd6bc1/gerry_dee_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Paul Piché', '', 'Musique', 'Lasalle', '1111 rue Lapierre', '2025-03-07 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1nq42qj154XpApkUlT19UZ/1bb162e2981ec9398c2c1f67ae618ec8/paul_piche_2024.jpg');
CALL addEvent ('Rocket de Laval vs Rochester Americans', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-08 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5u2K1Az3KcyPuQ8K0lgTGt/4c22dc948110abece1eda7d7f0acd0d4/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ROC.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Brossard', '6000 Boulevard de Rome', '2025-03-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/vuxKOxrPm4qGPwoWfosR5/0ae88c6af6453c3c7936231f8c1a71df/paul_piche_2024.jpg');
CALL addEvent ('Gerry Dee', '', 'Art', 'Halifax', '6101 Univerisity Ave.', '2025-03-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5EP7Q0AkCfG77i9maeMQXb/2068288758bbca709e037929a9ec5a20/gerry_dee_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Joliette', '20, St-Charles-Borromée sud', '2025-03-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'LaSalle', '111 rue Lapierre,', '2025-03-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6s4zTpiwYZsxfMZKR7xEVp/d45a0a9fe618b8bfb72a7c80e0f255ac/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Waterloo', '441, rue de la Cour', '2025-03-08 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Rochester Americans', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-08 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/61y72oMTH7bwGecurKCFFL/f74aa22543017eeeaa66d6d9f1c36ead/2425-5005_ticketmaster_event_matchups_SAISON_680x473_ROC.jpg');
CALL addEvent ('bbno$', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6HatTxET4Aj1M1CGu4dSP6/465c8d7d1e565a284afbd2c750a72a64/bbnos_2025.jpg');
CALL addEvent ('Vincent Lima', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-09 00:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2YRXcYMsHSeqL3sPu5iiSa/3fda2a80bb2d959f8c1e0395d6b6a388/vincent_lima_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sherbrooke', '2500, University boulevard', '2025-03-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6sQ4fKRcraWclnEiUawJoI/630bb2c4f31e59c8fd31eeed486c93c3/pierre_lapointe_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Sorel-Tracy', '28, rue du Roi', '2025-03-09 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7CuzoBnLXYTpktdG2koRci/5eb98b059a0399507ff1e68b964fd1aa/anthony_kavanagh_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Imminence', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2025-03-09 22:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3k4zR51ERAom9Tm6S842G0/92a7474154de34b0183aa09e1c97b125/imminence_2025.jpg');
CALL addEvent ('Our Lady Peace', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-03-10 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3bN2ABctw9YgTfDJ2e10qT/1ec0fc23c08a0331d6ea6c58c1e72518/our_lady_peace_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Gatineau', '855, boulevard de la Gappe', '2025-03-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Montreal', '1004 St-Catherine Est', '2025-03-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Bridgeport Islanders', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-12 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/KyRYGVl0XDHprtysTkFo5/84adc68811e1046050b8c54e673037e2/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BRI.jpg');
CALL addEvent ('Manu Katché', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5jhcFbTAXzr9HoR6wR01ry/0fbb1c7721f4cef56605effd57bf483d/manu_katche_2025.jpg');
CALL addEvent ('Our Lady Peace', '', 'Musique', 'Moncton', '1100 Main Street', '2025-03-12 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3bN2ABctw9YgTfDJ2e10qT/1ec0fc23c08a0331d6ea6c58c1e72518/our_lady_peace_2025.jpg');
CALL addEvent ('Dream Theater', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-03-12 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2LLZHesT4H0pPQkogu8rNG/f4642d1da1e350bc075df51844be608f/dream_theatre_2025.jpg');
CALL addEvent ('Les Nets vs Memphis Hustle', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-13 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6nvtvXqyxFCyj03HkKgjgE/bcffabe75a80534f16e6fe30d5e70ea5/nets_memphis.jpg');
CALL addEvent ('Ben Böhmer', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-14 01:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1RbuzKnn7oNMxAXtknfNhE/5e4470885b58afefa97f5ce321e5b9f4/ben_bohmer_2025.jpg');
CALL addEvent ('Jack Kays', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2025-03-14 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6e6lpEnvUoIf4qr9K9TUxH/60efed07f1182c9c271796a7f1afd50c/jack_kays_2025.jpg');
CALL addEvent ('Our Lady Peace', '', 'Musique', 'Halifax', 'P.O. Box 955, 1800 Argyle St.', '2025-03-13 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3bN2ABctw9YgTfDJ2e10qT/1ec0fc23c08a0331d6ea6c58c1e72518/our_lady_peace_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'L''Assomption', '225, boulevard l&#x27;Ange-Gardien', '2025-03-14 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6sQ4fKRcraWclnEiUawJoI/630bb2c4f31e59c8fd31eeed486c93c3/pierre_lapointe_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Ottawa', '1 rue Elgin', '2025-03-14 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Les Nets vs Memphis Hustle', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-14 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2hImKGM3yCPZMFY8kWk4VT/6724e0e1c723fd2f4165509121f20e32/nets_memphis.jpg');
CALL addEvent ('Basia Bulat', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2025-03-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5M7eBuS62HUP0d5jDUF1iQ/8e7ceeb0caab596f09421b778370a0ce/basia_bulat_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Chambly', '1625 Bd de Périgny', '2025-03-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5stRUNQc7dQgmPiOe8NTsn/4a9f925a6aa44955b49bbbf88b63d02d/pierre_lapointe_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Laval', '475 boulevard de l&#x27;Avenir', '2025-03-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Florida Panthers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-15 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4L7ISOufshfgoOFMGkljqq/64409bb80412c9c96a845ce4ac27fb38/4037_Billeterie_01_Molson_680x473_FLO.jpg');
CALL addEvent ('The Red Clay Strays', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/iyRsHNMUoKWTSmAgIzD43/76e9e7c65278a40b19d9a0d4c7518c18/red_clay_strays_2025.jpg');
CALL addEvent ('Palace', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-03-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4kPhuOX2cSgBV8wn1ym5K8/67f7b576a806a95da521ee0e4358699c/palace_2024.jpg');
CALL addEvent ('Meghan Oak', '', 'Musique', 'Gatineau', '120, rue Principale', '2025-03-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4ofKJcYVpmhvdIY98FN1yc/bb09f6b07aca79425f012a1c1d654e87/meghan_oak_2024.jpg');
CALL addEvent ('Hansom Eli', '', 'Musique', 'Gatineau', '120, rue Principale', '2025-03-15 22:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1zL426K9yMEDmnmSC0PxZz/c30af235d4765f0c9e4d5050be151033/hansom_eli_2024.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Sherbrooke', '53 Wellington Nord', '2025-03-16 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('DARKSIDE', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-17 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1z20J3bYG9QbWxIwT6y6M0/a4bc667772f6bdbc83d7818f7d00820f/darkside_2025.jpg');
CALL addEvent ('Montreal Canadiens vs Ottawa Senators', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-18 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2R35rgSPcYowpmwpeJyjI1/aba9ca81c0e4e5155f8af976074ffc09/4037_Billeterie_01_Molson_680x473_OTT.jpg');
CALL addEvent ('ROLE MODEL', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-19 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1mt9E6VaUCUgfKXQzOXSGj/f0c12eea54391904b3b6a1e16138a3fa/role_model_2025.jpg');
CALL addEvent ('Disturbed', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-19 22:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5me5KbVZ6NKESo0maiAmBC/4064fe1c008fdd5deb75dca095abfe21/disturbed_2025__2_.jpg');
CALL addEvent ('Rocket de Laval vs Toronto Marlies', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-19 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5JaKhMxaz4PpMxAjXJ0dIW/29ba4d29a8a3f1f58112de7ca6a93646/2425-5005_ticketmaster_event_matchups_SAISON_680x473_TOR.jpg');
CALL addEvent ('Oklou', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7vgXT1CWZX5ZEJygOMcZI8/2f9c48945f7ad02135aa56829b22e040/oklou_2025.jpg');
CALL addEvent ('Emei', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2025-03-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2x4s8THJFDm3HROISgRAHs/44d6a2c8abd075724c3affcfadb6bb8e/emei_2025.jpg');
CALL addEvent ('Megan Moroney', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3dYupywikAM0l5wWmDp6PF/4060f06264c4ae18d9ac3770237a29fc/megan_moroney_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Brossard', '6000 Boulevard de Rome', '2025-03-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/73IgIOz9JVRKdgr30IRfZt/ccc6a5d95405f2b3d42b0af404f64ea4/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Longueuil', '150 Rue de Gentilly E', '2025-03-21 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Rocket de Laval vs Cleveland Monsters', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-21 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/FPAZJtIxlErSfpr22MOsg/e3a14b66be3a0983d9e8faff2e7376e9/2425-5005_ticketmaster_event_matchups_SAISON_680x473_CLE.jpg');
CALL addEvent ('Stereophonics ', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-03-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/vsFCXg9taY0a9qxGpz6cG/8ad50a3bcea1c279ba81cea99bbfa0dc/stereop_onics_2025.jpg');
CALL addEvent ('Wax Tailor', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/218ep4b6rFDUbee4srrmVn/a0041419ef3674fa34da4de28c425d85/wax_tailor_2025.jpg');
CALL addEvent ('Maruja', '', 'Musique', 'Montreal', '179 Jean-Talon Ouest', '2025-03-21 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4sW9rKk4Kh4CXkKVV1yQtE/4614c4cfaf485d4a7b5d5440d308722c/maruja_2025.jpg');
CALL addEvent ('Vansire', '', 'Musique', 'Montreal', '87, rue Ste-Catherine est', '2025-03-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3d8FEX1PKTkO8tYHnJO2Bm/cacd7487878080f66f85b47213f1966d/vansire_2025.jpeg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sorel-Tracy', '28, rue du Roi', '2025-03-22 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Delain', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2025-03-21 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/27xeThUfCqG5i5MSHBFNND/7a22b169620c956451b5b86e834ff442/Delain__680x473_.jpg');
CALL addEvent ('Montreal Canadiens vs Colorado Avalanche', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-22 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3knU2vf6n7LVHyJc24Suv1/0a2015ad2ee2559fc3973e04c8c85107/4037_Billeterie_01_Molson_680x473_COL.jpg');
CALL addEvent ('Rocket de Laval vs Cleveland Monsters', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-22 19:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1qFoOeNnBzHLmykCUDozYi/73536dde799b03671834458c097d905e/2425-5005_ticketmaster_event_matchups_SAISON_680x473_CLE.jpg');
CALL addEvent ('Alcest', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-03-22 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1pppk8qDq8ssO9tZFxi4LO/158a6808949b9b25b5440755f8ceb723/alcest_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Salaberry-de-Valleyfield', '169 rue Champlain', '2025-03-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Quebec', '620 Avenue Plante', '2025-03-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5i4lhxPgFJs78bkJNxvVsn/1608b96cef2e24b36564e831a7edf795/paul_piche_2024.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Quebec', '269 Boul. Rene-Levesque', '2025-03-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Chertsey', '543 chemin de l&#x27;Église', '2025-03-23 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Paul Piché', '', 'Musique', 'Quebec', '68 rue du Petit-Champlain', '2025-03-24 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/50cRfN3FEttb1i8zv15p0h/bb043009f2ddfad3fa4c8f31a04bcc05/paul_piche_2024.jpg');
CALL addEvent ('Nathaniel Rateliff & The Night Sweats', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-03-24 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7t5pxc2JMnYPR5nJaDLGuQ/c4886506a92714549dcede897b899893/nathaniel_rateliff_the_sweats_2025.jpg');
CALL addEvent ('Confidence Man', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7BKslyysuj7Vl8vNXDSkA3/b2dc09122d3894edc7ee33834a561690/confidence_man_2025.jpg');
CALL addEvent ('Nate Smith', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/IesrlwAwp8D6E5EQjZSO8/0fc619f3643c91143fba8aee20664dab/nate_smith_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Brossard', '6000 Boulevard de Rome', '2025-03-28 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Gabriel Iglesias', '', 'Art', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4NzGYbXZLo2Z4X2MC5s2JC/07527e7dc3bf8befbc2830daf05dbd7a/gabriel_iglesias_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Rocket de Laval vs Toronto Marlies', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-28 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/PwjOK0j5r7udIKMykGDmc/930a2f5687157434828e24a5fab3af81/2425-5005_ticketmaster_event_matchups_SAISON_680x473_TOR.jpg');
CALL addEvent ('Maya Hawke', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-03-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6HVazpx1yJuoMNvTvqhRt0/5b5ab5f8c48e290775de2c9aef633d37/maya_hawke_2025.jpg');
CALL addEvent ('Jeremie Albino', '', 'Musique', 'Montreal', '305 rue Sainte-Catherine West', '2025-03-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2iCQzPzQHwwmpLICIZsVQ5/36e5a5231e08e267683958d020ba9de0/jeremie_albino_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Lasalle', '1111 rue Lapierre', '2025-03-29 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Rocket de Laval vs Lehigh Valley Phantoms', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-03-29 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1lDv9oPBVyZQ0loOs95oi9/6ecf3cc51ba5c7de225923419eb79400/2425-5005_ticketmaster_event_matchups_SAISON_680x473_LV.jpg');
CALL addEvent ('Antoni Remillard', '', 'Art', 'Coaticook', '116 rue Wellington', '2025-03-30 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3f2vbxRHJBJwRUhYyXBBnA/b97b051e52170331bab6d2ea7cdd5ea1/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Mont-Tremblant', '1829 Chem. du Village', '2025-03-30 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Kylie Minogue', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-03-30 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6AzWpNpyFWEPnOod25FQLA/2174d4e89b3953d13b5d55c7950f75df/kylie_minogue_2025.jpg');
CALL addEvent ('flipturn', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-03-31 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4q5f1BgnpZ0tHOdEcXAv17/d4c3643634662c6244b3a49ff501be73/flipturn_2025.jpg');
CALL addEvent ('Montreal Canadiens vs Florida Panthers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-01 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/awkA6X2WEoRso7Wwyrd0i/f34797d28d68de193fdd1aa968206b4b/4037_Billeterie_01_Molson_680x473_FLO.jpg');
CALL addEvent ('Heart', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/k9Wbh3LIdrby06TBlDMN8/387363e4d79ad0f3be76bec1a6431082/heart_2024.jpg');
CALL addEvent ('Montreal Canadiens vs Boston Bruins', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-03 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67u0nkXcgCttSzF8ZvoRt4/c1288153516b40521eb84f0caf10e3ad/4037_Billeterie_01_Molson_680x473_BOS.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Longueuil', '150 Rue de Gentilly E', '2025-04-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Quebec', '2410 Chemin Sainte-Foy', '2025-04-04 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2Z9DEzJx7B4CuU6MpcCL75/a4a52df8d6336ad11128d64b8714acc8/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Kane Brown', '', 'Musique', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-04 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4aWbOt0pvtsZEPHL9XWdSh/c02881ac98cd2f0409b1a4f9979c4c0a/kane_brown_2025.jpg');
CALL addEvent ('Kane Brown & BBQ Night', '', 'Musique', 'Montreal', '1280 Av. des Canadiens-de-Montréal', '2025-04-04 20:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/41qw8rVznIbuasDBwCbNB3/a007ea2d8f34feb75b36e0c1a3946e3a/LAS25-Web-Visuels-KaneBrown_Taverne-680x473_2-EN__1_.jpg');
CALL addEvent ('Snow Patrol', '', 'Musique', 'Montreal', '1004 St-Catherine Est', '2025-04-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3EGcc0MUPuDFwmx0TemYrd/3ad9244a9bf278e81d66e8a6285d2efb/snow_patrol_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Joliette', '20, St-Charles-Borromée sud', '2025-04-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Jordan Officer', '', 'Musique', 'Saint-Hyacinthe', '1705, rue Saint-Antoine', '2025-04-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6yNy18t2qZVjmjbTUAzhs7/7982000e59f01525151560e1180fe988/fijm24_jordan_officer.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Sherbrooke', '2500, University boulevard', '2025-04-05 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Monbtreal Canadiens vs Philadelphia Flyers', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-05 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3V48XAIoq2v5LPNSFN1Txu/c7790acb9bb7907d02ed0cd4e9345e65/4037_Billeterie_01_Molson_680x473_PHI.jpg');
CALL addEvent ('Marc Scibilia', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-04-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5iixTtyhM6bweYnvFNywZl/ff75c6430cea4f96a8a486dc5a1ff1ae/marc_scibilia_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sainte-Geneviève', '15 615 Boul. Gouin Ouest', '2025-04-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Sherbrooke', '2500, University boulevard', '2025-04-06 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Antoni Remillard', '', 'Art', 'L''Assomption', '265 Boul. l&#x27;Ange-Gardien', '2025-04-08 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5vzptuwhyD34He1exRgRNO/95db373b39dfc63089f3eee93584c64b/antoni_remillard_2024_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Montreal Canadiens vs Detroit Red Wings', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-08 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3GGPPPFTfQj71JEXJEGdLS/1761f7901f706dc028fc7df057a9d2b5/4037_Billeterie_01_Molson_680x473_DET.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'La Pocatière', '140, 4ième Avenue', '2025-04-09 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/13MwhXzDpaAGoN5avnMAfC/31009dd1742cd1c1b46aa2faf0837edc/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Tamino', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-04-10 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5keK8eDBmCNqcar9biTVnj/d989ce7f4df45ea44e4a765583a88d09/tamino_2025.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Rimouski', '25, rue Saint-German Ouest', '2025-04-10 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/13MwhXzDpaAGoN5avnMAfC/31009dd1742cd1c1b46aa2faf0837edc/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Zaho de Sagazan', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-04-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/19KueFhkIPSwbznmeGsEQE/8c8b7e2df4ba1c8bd771520f33064b67/ff24_zaho_de_sagazan__2___1_.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Amqui', '95, avenue du Parc', '2025-04-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/13MwhXzDpaAGoN5avnMAfC/31009dd1742cd1c1b46aa2faf0837edc/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sainte-Agathe-des-Monts', '258, rue Saint-Venant', '2025-04-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Grand Corps Malade ', '', 'Musique', 'Lasalle', '1111 rue Lapierre', '2025-04-11 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5koDE9qKRA4Eh77fOzA6OE/9f0d62d3907068fab16ce29f35c95c0a/grand_corps_malade_2024.jpg');
CALL addEvent ('Zaho de Sagazan', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-04-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/19KueFhkIPSwbznmeGsEQE/8c8b7e2df4ba1c8bd771520f33064b67/ff24_zaho_de_sagazan__2___1_.jpg');
CALL addEvent ('David Goudreault', '', 'Art', 'Rivière-du-Loup', '85 Rue Sainte-Anne', '2025-04-12 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/13MwhXzDpaAGoN5avnMAfC/31009dd1742cd1c1b46aa2faf0837edc/david_goudreault_2024.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Dave Gaudet', '', 'Art', 'Laval', '1950 Claude-Gagné Road', '2025-04-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/30IgZAsCcxmFD69iUDOyid/d61abcd82ef1de119280e0a441daabcf/dave_gaudet_2025.png');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Troy Hawke', '', 'Art', 'Montreal', '2490 Notre-Dame Ouest', '2025-04-12 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2S8MMkOEyKdbMhppGJ1dHY/c38ebb4379d216f3686e9d1977bad554/troy_hawke_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Renaud Gratton', '', 'Musique', 'Longueuil', '901 Ch Tiffin', '2025-04-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5OgNuCh97cj308EZw1aFZw/be46f72da2a823432e6f4e627871b2e9/renaud-gratton.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'L''Assomption', '225, boulevard l&#x27;Ange-Gardien', '2025-04-13 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/nm6HYG0NhSP4KRnGhhuzm/32c8e28f932e7a6d2de23bcf00a552a4/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Mogwai', '', 'Musique', 'Montreal', '2490 Notre-Dame Ouest', '2025-04-14 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6CDYWtDgmXtlb7feEIT2sp/d4abe09b9fbbf30b0355a58515fe5911/mogwai_2025.jpg');
CALL addEvent ('Montreal Canadiens vs Chicago Blackhawks', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-14 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4j20PJ1nuJPoTraPBKnPqY/bf24966b5d745ec3b5a7449130145dcf/4037_Billeterie_01_Molson_680x473_CHI.jpg');
CALL addEvent ('Franz Ferdinand', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-04-15 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5EecMPZ9AhvLjgrHGujUOr/39f8b3d5804a46cc722bf74a51b91cbd/franz_ferdinand.jpg');
CALL addEvent ('Montreal Canadiens vs Carolina Hurricanes', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-16 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5Lk0fwGf4ieKNkCa3tjJcc/6b4d801571ff972cc49709dd6844811c/4037_Billeterie_01_Molson_680x473_CAR.jpg');
CALL addEvent ('Rocket de Laval vs Belleville Senators', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-04-16 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6ZaNiYTEeTa7LpKgO53JP2/1f5a6b757e9ef4d5860830d1fb029a3e/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BEL.jpg');
CALL addEvent ('Brit Floyd', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-17 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6to1hLs3sD3YRVVQHzpaXA/52aac51c02c54a9b02024dc381ba9b15/brit_floyd_2025.jpg');
CALL addEvent ('Harlem Globetrotters', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-04-17 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/1bP8ce92sX2d9CjuMvOrB4/4e4d3b41f03b04c4734918791a08d497/harlem_globetrotters_2025.jpg');
CALL addEvent ('Harlem Globetrotters', '', 'Sport', 'Montreal', '1909 avenue des Canadiens-de-Montréal', '2025-04-18 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5ZjTs5tYHyUK7lvFzuqxyD/c9fac3d51847dc223e827d6a73aa5011/harlem_globetrotters_2025.jpg');
CALL addEvent ('Rocket de Laval vs Belleville Senators', '', 'Sport', 'Laval', '1950 Claude-Gagné Road', '2025-04-18 23:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5KCbUnF3FdwKd3CHcAvlz5/782571d7b095c2822339ea8d76abaa22/2425-5005_ticketmaster_event_matchups_SAISON_680x473_BEL.jpg');
CALL addEvent ('Myles Smith', '', 'Musique', 'Montreal', '59 St Catherine Est', '2025-04-19 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7gqBjrJS2pfA6RrBRJ0lzy/8058b2906db0bb8ebd72b81c74627803/myles_smith_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Papineauville', '378 Rue Papineau', '2025-04-19 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4jHCYYrWF3BBy186cQe47O/251bc570260a95a4ee9c731ee21eb7b6/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Quebec', '269 Boul. Rene-Levesque', '2025-04-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Sherbrooke', '2500, University boulevard', '2025-04-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3c8ZY42f23apxYgFEVlLLu/58279f3216af849179cb1a100c012d69/paul_piche_2024.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Saint-Jérôme', '118, De la Gare street', '2025-04-20 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Coucou Passe-Partout, le spectacle !', '', 'Culturel', 'Sainte-Agathe-des-Monts', '258, rue Saint-Venant', '2025-04-20 19:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4cuUjB5SOxta5kmt5x4JBj/f279709bb8addb607a23a9fe864416b0/passe_partout_2024.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-22 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-23 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Nick Cave & The Bad Seeds', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-04-25 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/6fR5Qf8K1KfDzDorvTYhaG/c3e2a21f902baae37515e750d494aa86/PB-250424-NickCave-Web-Visuels-680x473-EN.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-24 23:40:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Laval', '475 boulevard de l&#x27;Avenir', '2025-04-25 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Mont-Laurier', '543, Pont Street', '2025-04-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-25 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Anthony Kavanagh', '', 'Art', 'Thetford Mines', '561 Rue St Patrick', '2025-04-26 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3iamQoXJfd7XAJmtk9o40K/bb64eaea95b015ce61f08a27c6382145/anthony_kavanagh_2025.jpg');
CALL addEventInterests (last_insert_id(), 'Humour');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Terrebonne', '866 Rue Saint Pierre', '2025-04-27 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-26 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-26 17:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-27 23:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Mean Girls', '', 'Musique', 'Montreal', '175 Sainte-Catherine Street West', '2025-04-27 17:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/67N4skNTF5reRNNe9YA4ee/efd98fc76f61558053cd27361fbf3990/mean_girls_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Sainte-Thérèse', '100 Rue Duquet', '2025-05-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Rivière-du-Loup', '85 Rue Sainte-Anne', '2025-05-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2CR3lMbiaQlbzT6KkKjn5I/4dd615291d433d201898d4de301660f8/paul_piche_2024.jpg');
CALL addEvent ('Renaud Gratton', '', 'Musique', 'LaSalle', '55 Avenue Dupras', '2025-05-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/76blhxfUAI3kZtr0BUAipy/6eef3fd319cb80b320bef9e649a4b581/renaud-gratton.jpg');
CALL addEvent ('Esstradinaire Esstradivarius', '', 'Musique', 'St-Jean-sur-Richelieu', '30, boulevard du Séminaire Nord', '2025-05-02 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/2OA07EgcW3bFbHXzLlSkfW/a19c5dbd03b76bfe7fbec77b7effedb3/sol_en_chanson_2025.jpg');
CALL addEvent ('Pierre Lapointe', '', 'Musique', 'Drummondville', '175, rue Ringuet', '2025-05-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/7G68Yjqzi0v68HDPue7skl/43deb9cfa320366b38e674dd8838d3a5/pierre_lapointe_2025.jpg');
CALL addEvent ('Rare Americans', '', 'Musique', 'Montreal', '5240, Avenue du Parc', '2025-05-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/4hXBPHfGpqKtJwZHewP13Q/427d08c12a9a66e3bc6cfa4f3de5de1c/rare_americans_2025.jpg');
CALL addEvent ('Paul Piché', '', 'Musique', 'Matane', '455, avenue Saint-Rédempteur', '2025-05-03 00:00:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/5RHT6BqBpKphK0q242mJXN/b2e6fdae7102e033d4c869411c313bcf/paul_piche_2024.jpg');
CALL addEvent ('Bullet for my Valentine & Trivium', '', 'Musique', 'Laval', '1950 Claude-Gagné Road', '2025-05-03 22:30:00', 'Paid', '//images.ctfassets.net/3yxl57nu0yl4/3EobVerfLCnf8dg0zZYAus/ad56851e6c6bbcd0e4074ea19f58f015/bullet_valentine_trivium_2025.jpg');

-- Canada Cities -- 
INSERT INTO `canadacities` VALUES ('Toronto','Toronto','ON','Ontario','43.7417','-79.3733',5647660,4427.8,'America/Toronto',1,'M5T M5V M5P M5S M5R M5E M5G M5A M5C M5B M5M M5N M5H M5J M4X M4Y M4R M4S M4P M4V M4W M4T M4J M4K M4H M4N M4L M4M M4B M4C M4A M4G M4E M3N M3M M3L M3K M3J M3H M3C M3B M3A M2P M2R M2L M2M M2N M2H M2J M2K M1C M1B M1E M1G M1H M1K M1J M1M M1L M1N M1P M1S M1R M1T M1W M1V M1X M9P M9R M9W M9V M9M M9L M9N M9A M9C M9B M6P M6R M6S M6A M6B M6C M6E M6G M6H M6J M6K M6L M6M M6N M8Z M8X M8Y M8V M8W','1124279679');
INSERT INTO `canadacities` VALUES ('Montréal','Montreal','QC','Quebec','45.5089','-73.5617',3675220,4833.5,'America/Toronto',1,'H1X H1Y H1Z H1P H1R H1S H1T H1V H1W H1H H1J H1K H1L H1M H1N H1A H1B H1C H1E H1G H2Y H2X H2Z H2T H2W H2V H2P H2S H2R H2M H2L H2N H2H H2K H2J H2E H2G H2A H2C H2B H3B H3C H3A H3G H3E H3J H3K H3H H3N H3L H3M H3R H3S H3V H3W H3T H3X H4G H4E H4C H4B H4A H4N H4M H4L H4K H4J H4H H4V H4T H4S H4R H4P H8N H8S H8R H8P H8T H8Z H8Y H9A H9E H9H H9J H9K H9C','1124586170');
INSERT INTO `canadacities` VALUES ('Vancouver','Vancouver','BC','British Columbia','49.2500','-123.1000',2426160,5749.9,'America/Vancouver',1,'V6Z V6S V6R V6P V6N V6M V6L V6K V6J V6H V6G V6E V6C V6B V6A V5M V5K V5S V5P V5Z V5N V5L V5V V5W V5T V5R V5X V5Y','1124825478');
INSERT INTO `canadacities` VALUES ('Calgary','Calgary','AB','Alberta','51.0500','-114.0667',1306780,1592.4,'America/Edmonton',1,'T1Y T2H T2K T2J T2M T2L T2N T2A T2C T2B T2E T2G T2Y T2X T2Z T2S T2R T2T T2W T2V T3N T3L T3M T3J T3K T3H T3G T3E T3B T3C T3A T3R T3S T3P','1124690423');
INSERT INTO `canadacities` VALUES ('Edmonton','Edmonton','AB','Alberta','53.5344','-113.4903',1151640,1320.4,'America/Edmonton',1,'T5X T5Y T5Z T5P T5R T5S T5T T5V T5W T5H T5J T5K T5L T5M T5N T5A T5B T5C T5E T5G T6Y T6X T6T T6W T6V T6P T6S T6R T6M T6L T6N T6H T6K T6J T6E T6G T6A T6C T6B','1124290735');
INSERT INTO `canadacities` VALUES ('Ottawa','Ottawa','ON','Ontario','45.4247','-75.6950',1068820,364.9,'America/Toronto',1,'K4P K4M K4A K4B K4C K7S K1S K1R K1P K1W K1V K1T K1Z K1Y K1X K1C K1B K1A K1G K1E K1K K1J K1H K1N K1M K1L K0A K2R K2S K2P K2V K2W K2T K2J K2K K2H K2L K2M K2B K2C K2A K2G K2E','1124399363');
INSERT INTO `canadacities` VALUES ('Winnipeg','Winnipeg','MB','Manitoba','49.8844','-97.1464',758515,1623.3,'America/Winnipeg',1,'R2N R2M R2L R2K R2J R2H R2G R2C R2Y R2X R2W R2V R2R R2P R3L R3M R3N R3H R3J R3K R3E R3G R3A R3B R3X R3Y R3T R3V R3W R3P R3R R3S','1124224963');
INSERT INTO `canadacities` VALUES ('Quebec City','Quebec City','QC','Quebec','46.8139','-71.2081',733156,1214.8,'America/Toronto',1,'G3J G1N G1M G1L G1K G1J G1H G1G G1E G1C G1B G1Y G1X G1W G1V G1T G1S G1R G1P G3E G3G G3K G2G G2E G2B G2C G2A G2N G2L G2M G2J G2K','1124823933');
INSERT INTO `canadacities` VALUES ('Hamilton','Hamilton','ON','Ontario','43.2567','-79.8692',729560,509.1,'America/Toronto',2,'L0R L0P L8W L8V L8T L8S L8R L8P L8G L8E L8B L8N L8M L8L L8K L8J L8H L9G L9A L9B L9C L9H L9K N1R','1124567288');
INSERT INTO `canadacities` VALUES ('Mississauga','Mississauga','ON','Ontario','43.6000','-79.6500',717961,2452.5,'America/Toronto',2,'L4W L4V L4T L4Z L4Y L4X L5R L5S L5T L5V L5W L5A L5B L5C L5E L5G L5H L5J L5K L5L L5M L5N','1124112672');
INSERT INTO `canadacities` VALUES ('Brampton','Brampton','ON','Ontario','43.6833','-79.7667',656480,2469,'America/Toronto',2,'L7A L6T L6W L6V L6P L6S L6R L6Y L6X L6Z','1124625989');
INSERT INTO `canadacities` VALUES ('Surrey','Surrey','BC','British Columbia','49.1900','-122.8489',568322,1797.9,'America/Vancouver',2,'V4A V4N V4P V3R V3S V3W V3T V3V V3X V3Z','1124001454');
INSERT INTO `canadacities` VALUES ('Kitchener','Kitchener','ON','Ontario','43.4186','-80.4728',522888,1877.6,'America/Toronto',1,'N2K N2H N2N N2M N2C N2B N2A N2G N2E N2R N2P','1124158530');
INSERT INTO `canadacities` VALUES ('Halifax','Halifax','NS','Nova Scotia','44.6475','-63.5906',439819,80.3,'America/Halifax',1,'B2Z B2Y B2X B2W B2V B2T B2S B2R B3Z B3T B3V B3P B3R B3S B3L B3M B3N B3H B3J B3K B3E B3G B3A B3B B0J B0N B4E B4G B4A B4C B4B','1124130981');
INSERT INTO `canadacities` VALUES ('Laval','Laval','QC','Quebec','45.5833','-73.7500',438366,1781,'America/Toronto',2,'H7N H7L H7M H7J H7K H7H H7G H7E H7B H7C H7A H7X H7Y H7V H7W H7T H7R H7S H7P','1124922301');
INSERT INTO `canadacities` VALUES ('London','London','ON','Ontario','42.9836','-81.2497',423369,1004.3,'America/Toronto',2,'N5Z N5X N5Y N5V N5W N6P N6G N6E N6C N6B N6A N6N N6M N6L N6K N6H N6J','1124469960');
INSERT INTO `canadacities` VALUES ('Victoria','Victoria','BC','British Columbia','48.4283','-123.3647',363222,4722.3,'America/Vancouver',1,'V9A V8T V8W V8V V8S V8R','1124147219');
INSERT INTO `canadacities` VALUES ('Markham','Markham','ON','Ontario','43.8767','-79.2633',338503,1604.8,'America/Toronto',2,'L3T L3R L3P L3S L6E L6G L6C L6B','1124272698');
INSERT INTO `canadacities` VALUES ('Oshawa','Oshawa','ON','Ontario','43.9000','-78.8500',335949,1203.6,'America/Toronto',2,'L1L L1H L1J L1K L1G','1124541904');
INSERT INTO `canadacities` VALUES ('Vaughan','Vaughan','ON','Ontario','43.8333','-79.5000',323103,1185.9,'America/Toronto',2,'L0J L3L L4K L4J L4H L4L L6A','1124000141');
INSERT INTO `canadacities` VALUES ('Windsor','Windsor','ON','Ontario','42.2833','-83.0000',306519,1572.8,'America/Toronto',2,'N8T N8W N8P N8S N8R N8Y N8X N9J N9B N9C N9A N9G N9E N0R','1124261024');
INSERT INTO `canadacities` VALUES ('Gatineau','Gatineau','QC','Quebec','45.4833','-75.6500',291041,851.4,'America/Toronto',2,'J8P J8R J8T J8Y J8X J8Z J8M J9J J9H J9A','1124722129');
INSERT INTO `canadacities` VALUES ('Saskatoon','Saskatoon','SK','Saskatchewan','52.1333','-106.6833',266141,1174.7,'America/Regina',2,'S7H S7K S7J S7M S7L S7N S7S S7R S7W S7V','1124612546');
INSERT INTO `canadacities` VALUES ('Longueuil','Longueuil','QC','Quebec','45.5333','-73.5167',254483,2198.2,'America/Toronto',2,'J4T J4V J4P J4R J4M J4L J4N J4H J4K J4J J4G J3Y J3Z','1124122753');
INSERT INTO `canadacities` VALUES ('Burnaby','Burnaby','BC','British Columbia','49.2667','-122.9667',249125,2750.7,'America/Vancouver',2,'V5H V5G V5E V5B V5C V5J V5A V3J V3N','1124817304');
INSERT INTO `canadacities` VALUES ('St. Catharines','St. Catharines','ON','Ontario','43.1833','-79.2333',242460,1422.1,'America/Toronto',2,'L2M L2N L2P L2S L2R L2T L2W','1124140229');
INSERT INTO `canadacities` VALUES ('Regina','Regina','SK','Saskatchewan','50.4547','-104.6067',226404,1266.2,'America/Regina',2,'S4N S4T S4V S4W S4P S4R S4S S4X S4Y S4Z','1124342541');
INSERT INTO `canadacities` VALUES ('Oakville','Oakville','ON','Ontario','43.4500','-79.6833',213759,1538.5,'America/Toronto',2,'L6M L6L L6H L6K L6J','1124080468');
INSERT INTO `canadacities` VALUES ('Richmond','Richmond','BC','British Columbia','49.1667','-123.1333',209937,1629,'America/Vancouver',2,'V6Y V6X V6W V6V V7E V7A V7B V7C','1124121940');
INSERT INTO `canadacities` VALUES ('Richmond Hill','Richmond Hill','ON','Ontario','43.8667','-79.4333',202022,2004.4,'America/Toronto',2,'L4S L4C L4B L4E','1124364273');
INSERT INTO `canadacities` VALUES ('Burlington','Burlington','ON','Ontario','43.3167','-79.8000',186948,1004.4,'America/Toronto',2,'L7R L7S L7P L7T L7N L7L L7M','1124955083');
INSERT INTO `canadacities` VALUES ('St. John''s','St. John''s','NL','Newfoundland and Labrador','47.4817','-52.7971',185565,247.8,'America/St_Johns',2,'A1H A1S A1E A1G A1A A1C A1B','1124741456');
INSERT INTO `canadacities` VALUES ('Kelowna','Kelowna','BC','British Columbia','49.8881','-119.4956',181380,682.4,'America/Vancouver',2,'V1X V1Y V1P V1W V1V','1124080626');
INSERT INTO `canadacities` VALUES ('Sherbrooke','Sherbrooke','QC','Quebec','45.4000','-71.9000',172950,489.4,'America/Toronto',2,'J1N J1L J1M J1J J1K J1H J1G J1E J1C J1R','1124559506');
INSERT INTO `canadacities` VALUES ('Sudbury','Sudbury','ON','Ontario','46.4900','-81.0100',166004,52.1,'America/Toronto',2,'P0M P3N P3L P3B P3C P3A P3G P3Y P3P','1124539524');
INSERT INTO `canadacities` VALUES ('Barrie','Barrie','ON','Ontario','44.3711','-79.6769',154676,1493.1,'America/Toronto',2,'L9J L4N L4M','1124340223');
INSERT INTO `canadacities` VALUES ('Abbotsford','Abbotsford','BC','British Columbia','49.0500','-122.3167',153524,409,'America/Vancouver',2,'V4X V2T V2S V3G','1124808029');
INSERT INTO `canadacities` VALUES ('Lévis','Levis','QC','Quebec','46.8000','-71.1833',149683,334.1,'America/Toronto',2,'G7A G6J G6K G6C G6Z G6X G6Y G6V G6W','1124958950');
INSERT INTO `canadacities` VALUES ('Coquitlam','Coquitlam','BC','British Columbia','49.2839','-122.7919',148625,1216.7,'America/Vancouver',2,'V3C V3E V3B V3J V3K','1124000500');
INSERT INTO `canadacities` VALUES ('Saguenay','Saguenay','QC','Quebec','48.4167','-71.0667',144723,128.7,'America/Toronto',2,'G8A G7T G7Z G7G G7B G7N G7H G7K G7J G7P G7S G7Y G7X','1124001930');
INSERT INTO `canadacities` VALUES ('Guelph','Guelph','ON','Ontario','43.5500','-80.2500',144356,1644.1,'America/Toronto',2,'N1C N1G N1E N1K N1H N1L','1124968815');
INSERT INTO `canadacities` VALUES ('Trois-Rivières','Trois-Rivieres','QC','Quebec','46.3500','-72.5500',139163,482.1,'America/Toronto',2,'G9C G9B G9A G8T G8V G8W G8Y G8Z','1124407487');
INSERT INTO `canadacities` VALUES ('Whitby','Whitby','ON','Ontario','43.8833','-78.9417',138501,944.1,'America/Toronto',2,'L0B L1P L1R L1M L1N','1124112077');
INSERT INTO `canadacities` VALUES ('Cambridge','Cambridge','ON','Ontario','43.3972','-80.3114',138479,1225.5,'America/Toronto',2,'N3H N3C N3E N1R N1S N1P N1T','1124113576');
INSERT INTO `canadacities` VALUES ('Milton','Milton','ON','Ontario','43.5083','-79.8833',132979,365.5,'America/Toronto',2,'L7J L0P L9T L9E','1124001426');
INSERT INTO `canadacities` VALUES ('Ajax','Ajax','ON','Ontario','43.8583','-79.0364',126666,1900.6,'America/Toronto',2,'L1Z L1T L1S','1124382916');
INSERT INTO `canadacities` VALUES ('Waterloo','Waterloo','ON','Ontario','43.4667','-80.5167',121436,1895.8,'America/Toronto',2,'N2K N2J N2L N2V N2T','1124321390');
INSERT INTO `canadacities` VALUES ('Terrebonne','Terrebonne','QC','Quebec','45.7000','-73.6333',119944,780.1,'America/Toronto',2,'J6Y J6X J6W J7M J6V','1124993674');
INSERT INTO `canadacities` VALUES ('Moncton','Moncton','NB','New Brunswick','46.1328','-64.7714',119785,564.9,'America/Moncton',2,'E1H E1A E1C E1E E1G','1124521303');
INSERT INTO `canadacities` VALUES ('Saanich','Saanich','BC','British Columbia','48.4840','-123.3810',117735,1136.6,'America/Vancouver',2,'V9A V8N V8Z V8P V9E V8Y V8X V8R','1124000949');
INSERT INTO `canadacities` VALUES ('White Rock','White Rock','BC','British Columbia','49.0250','-122.8028',109167,4240.6,'America/Vancouver',2,'V4B','1124260555');
INSERT INTO `canadacities` VALUES ('Thunder Bay','Thunder Bay','ON','Ontario','48.3822','-89.2461',108843,332.1,'America/Toronto',2,'P7G P7E P7B P7C P7J P7K','1124398712');
INSERT INTO `canadacities` VALUES ('Delta','Delta','BC','British Columbia','49.0847','-123.0586',108455,603.7,'America/Vancouver',2,'V4C V4E V4G V4K V4M V4L','1124001200');
INSERT INTO `canadacities` VALUES ('Nanaimo','Nanaimo','BC','British Columbia','49.1642','-123.9364',106079,1104.1,'America/Vancouver',2,'V9R V9S V9V V9T','1124623893');
INSERT INTO `canadacities` VALUES ('Brantford','Brantford','ON','Ontario','43.1667','-80.2500',104688,1061.2,'America/Toronto',2,'N3P N3R N3S N3T N3V','1124737006');
INSERT INTO `canadacities` VALUES ('Chatham','Chatham','ON','Ontario','42.4229','-82.1324',103988,42.4,'America/Toronto',2,'N8A N0P N7L N7M','1124393373');
INSERT INTO `canadacities` VALUES ('Clarington','Clarington','ON','Ontario','43.9350','-78.6083',101427,166,'America/Toronto',2,'L0B L0A L1E L1B L1C','1124000882');
INSERT INTO `canadacities` VALUES ('Saint-Jérôme','Saint-Jerome','QC','Quebec','45.7833','-74.0000',100859,889.5,'America/Toronto',2,'J7Y J7Z J5L','1124268324');
INSERT INTO `canadacities` VALUES ('Red Deer','Red Deer','AB','Alberta','52.2681','-113.8111',100844,966.5,'America/Edmonton',2,'T4S T4R T4P T4N','1124404130');
INSERT INTO `canadacities` VALUES ('Pickering','Pickering','ON','Ontario','43.8354','-79.0890',99186,429.2,'America/Toronto',3,'L0H L1X L1Y L1V L1W','1124781814');
INSERT INTO `canadacities` VALUES ('Lethbridge','Lethbridge','AB','Alberta','49.6942','-112.8328',98406,812.5,'America/Edmonton',3,'T1H T1J T1K','1124321200');
INSERT INTO `canadacities` VALUES ('Kamloops','Kamloops','BC','British Columbia','50.6761','-120.3408',97902,328.6,'America/Vancouver',3,'V2E V2C V1S V2B','1124735582');
INSERT INTO `canadacities` VALUES ('Saint-Jean-sur-Richelieu','Saint-Jean-sur-Richelieu','QC','Quebec','45.3167','-73.2667',97873,431.3,'America/Toronto',3,'J2W J2Y J2X J3A J3B','1124278447');
INSERT INTO `canadacities` VALUES ('Niagara Falls','Niagara Falls','ON','Ontario','43.0600','-79.1067',94415,449.1,'America/Toronto',3,'L0S L2E L2G L2H L2J L3B','1124704011');
INSERT INTO `canadacities` VALUES ('Cape Breton','Cape Breton','NS','Nova Scotia','46.1389','-60.1931',93694,38.7,'America/Glace_Bay',3,'B2A B1S B1V B1G B1B B1C B1A B1L B1M B1K B1H B1T B1R B1P B1Y B1E B1N B1J','1124000383');
INSERT INTO `canadacities` VALUES ('Chilliwack','Chilliwack','BC','British Columbia','49.1577','-121.9509',93203,356.6,'America/Vancouver',3,'V4Z V2R V2P','1124531262');
INSERT INTO `canadacities` VALUES ('Brossard','Brossard','QC','Quebec','45.4667','-73.4500',91525,2025.3,'America/Toronto',2,'J4Y J4X J4Z J4W','1124655166');
INSERT INTO `canadacities` VALUES ('Maple Ridge','Maple Ridge','BC','British Columbia','49.2167','-122.6000',90990,339.7,'America/Vancouver',3,'V4R V2W V2X','1124001699');
INSERT INTO `canadacities` VALUES ('Newmarket','Newmarket','ON','Ontario','44.0500','-79.4667',87942,2284.1,'America/Toronto',2,'L3X L3Y','1124400266');
INSERT INTO `canadacities` VALUES ('Repentigny','Repentigny','QC','Quebec','45.7333','-73.4667',86100,1399.6,'America/Toronto',3,'J6A J5Z J5Y','1124379778');
INSERT INTO `canadacities` VALUES ('Peterborough','Peterborough','ON','Ontario','44.3000','-78.3167',84793,1291.8,'America/Toronto',3,'K9K K9J K9H K9L','1124440356');
INSERT INTO `canadacities` VALUES ('Drummondville','Drummondville','QC','Quebec','45.8833','-72.4833',79258,320.7,'America/Toronto',3,'J2E J2C J2B J2A J1Z','1124624283');
INSERT INTO `canadacities` VALUES ('Kawartha Lakes','Kawartha Lakes','ON','Ontario','44.3500','-78.7500',79247,26.1,'America/Toronto',3,'L0K L0B L0A K9V K0M','1124000852');
INSERT INTO `canadacities` VALUES ('New Westminster','New Westminster','BC','British Columbia','49.2069','-122.9111',78916,5052.4,'America/Vancouver',2,'V3L V3M','1124196524');
INSERT INTO `canadacities` VALUES ('Prince George','Prince George','BC','British Columbia','53.9169','-122.7494',76708,242.2,'America/Vancouver',3,'V2L V2K V2N V2M','1124733292');
INSERT INTO `canadacities` VALUES ('Caledon','Caledon','ON','Ontario','43.8667','-79.8667',76581,111.2,'America/Toronto',3,'L7K L7C L7E','1124070007');
INSERT INTO `canadacities` VALUES ('Châteauguay','Chateauguay','QC','Quebec','45.3800','-73.7500',75891,1481.2,'America/Toronto',3,'J6K J6J','1124437897');
INSERT INTO `canadacities` VALUES ('Belleville','Belleville','ON','Ontario','44.1667','-77.3833',75052,222.8,'America/Toronto',3,'K8N K8P K0K','1124786959');
INSERT INTO `canadacities` VALUES ('Airdrie','Airdrie','AB','Alberta','51.2917','-114.0144',74100,878.1,'America/Edmonton',3,'T4B T4A','1124990202');
INSERT INTO `canadacities` VALUES ('Sarnia','Sarnia','ON','Ontario','42.9994','-82.3089',73944,439.6,'America/Toronto',3,'N7T N7V N7W N7S N7X','1124509835');
INSERT INTO `canadacities` VALUES ('Wood Buffalo','Wood Buffalo','AB','Alberta','57.6042','-111.3284',72326,1.2,'America/Edmonton',3,'T9H T9K T9J T0P','1124001123');
INSERT INTO `canadacities` VALUES ('Sault Ste. Marie','Sault Ste. Marie','ON','Ontario','46.5333','-84.3500',72051,324.6,'America/Toronto',3,'P6A P6C P6B','1124810690');
INSERT INTO `canadacities` VALUES ('Saint John','Saint John','NB','New Brunswick','45.2806','-66.0761',69895,221.5,'America/Moncton',3,'E2P E2L E2M E2N E2H E2J E2K','1124631364');
INSERT INTO `canadacities` VALUES ('Welland','Welland','ON','Ontario','42.9833','-79.2333',69302,686.9,'America/Toronto',3,'L3B L3C','1124745616');
INSERT INTO `canadacities` VALUES ('Granby','Granby','QC','Quebec','45.4000','-72.7333',69025,452.1,'America/Toronto',3,'J2G J2J J2H','1124502071');
INSERT INTO `canadacities` VALUES ('St. Albert','St. Albert','AB','Alberta','53.6303','-113.6258',68232,1426.4,'America/Edmonton',3,'T8N','1124850754');
INSERT INTO `canadacities` VALUES ('Fredericton','Fredericton','NB','New Brunswick','45.9636','-66.6431',64614,471.3,'America/Moncton',3,'E3G E3C E3B E3A','1124061289');
INSERT INTO `canadacities` VALUES ('Grande Prairie','Grande Prairie','AB','Alberta','55.1708','-118.7947',64141,483.3,'America/Edmonton',3,'T8V T8X T8W','1124505481');
INSERT INTO `canadacities` VALUES ('Medicine Hat','Medicine Hat','AB','Alberta','50.0417','-110.6775',63382,565.1,'America/Edmonton',3,'T1A T1B T1C','1124303972');
INSERT INTO `canadacities` VALUES ('Halton Hills','Halton Hills','ON','Ontario','43.6300','-79.9500',62951,227.4,'America/Toronto',3,'L7J L7G L0P L9T','1124000788');
INSERT INTO `canadacities` VALUES ('Aurora','Aurora','ON','Ontario','44.0000','-79.4667',62057,1241.1,'America/Toronto',3,'L4G','1124085034');
INSERT INTO `canadacities` VALUES ('Port Coquitlam','Port Coquitlam','BC','British Columbia','49.2625','-122.7811',61498,2108.7,'America/Vancouver',2,'V3C V3B','1124473757');
INSERT INTO `canadacities` VALUES ('Mirabel','Mirabel','QC','Quebec','45.6500','-74.0833',61108,126.2,'America/Toronto',3,'J7J J7N','1124182375');
INSERT INTO `canadacities` VALUES ('Blainville','Blainville','QC','Quebec','45.6700','-73.8800',59819,1088.2,'America/Toronto',3,'J7B J7C','1124000623');
INSERT INTO `canadacities` VALUES ('Lac-Brome','Lac-Brome','QC','Quebec','45.2167','-72.5167',58889,27.3,'America/Toronto',3,'J0E','1124000579');
INSERT INTO `canadacities` VALUES ('North Vancouver','North Vancouver','BC','British Columbia','49.3201967175102','-123.069940224484',58120,4913,'America/Vancouver',2,'V7L V7M','1124000146');
INSERT INTO `canadacities` VALUES ('Saint-Hyacinthe','Saint-Hyacinthe','QC','Quebec','45.6167','-72.9500',57239,303.1,'America/Toronto',3,'J2T J2S J2R','1124010116');
INSERT INTO `canadacities` VALUES ('Beloeil','Beloeil','QC','Quebec','45.5667','-73.2000',52959,988.8,'America/Toronto',3,'J3G','1124469084');
INSERT INTO `canadacities` VALUES ('North Bay','North Bay','ON','Ontario','46.3000','-79.4500',52662,166.9,'America/Toronto',3,'P1A P1B P1C','1124058496');
INSERT INTO `canadacities` VALUES ('Charlottetown','Charlottetown','PE','Prince Edward Island','46.2403','-63.1347',52390,876.6,'America/Halifax',3,'C1C C1A C1E','1124897699');
INSERT INTO `canadacities` VALUES ('Vernon','Vernon','BC','British Columbia','50.2670','-119.2720',51896,461.7,'America/Vancouver',3,'V1T V1H','1124553338');
INSERT INTO `canadacities` VALUES ('Brandon','Brandon','MB','Manitoba','49.8483','-99.9500',51313,649.2,'America/Winnipeg',3,'R7A R7B R7C','1124239939');
INSERT INTO `canadacities` VALUES ('Mascouche','Mascouche','QC','Quebec','45.7500','-73.6000',51183,478.8,'America/Toronto',3,'J7K J7L','1124001580');
INSERT INTO `canadacities` VALUES ('Stouffville','Stouffville','ON','Ontario','43.9667','-79.2500',49864,241.6,'America/Toronto',3,'L4A','1124207594');
INSERT INTO `canadacities` VALUES ('Shawinigan','Shawinigan','QC','Quebec','46.5667','-72.7500',49620,68,'America/Toronto',3,'G9N G9T G9R G9P G0X','1124441118');
INSERT INTO `canadacities` VALUES ('Joliette','Joliette','QC','Quebec','46.0167','-73.4500',49246,931.2,'America/Toronto',3,'J6E','1124841554');
INSERT INTO `canadacities` VALUES ('Rimouski','Rimouski','QC','Quebec','48.4500','-68.5300',48935,144.3,'America/Toronto',3,'G5N G5M G5L G0L','1124433645');
INSERT INTO `canadacities` VALUES ('Courtenay','Courtenay','BC','British Columbia','49.6878','-124.9944',48917,876.7,'America/Vancouver',3,'V9N','1124324905');
INSERT INTO `canadacities` VALUES ('Dollard-des-Ormeaux','Dollard-des-Ormeaux','QC','Quebec','45.4833','-73.8167',48403,3230.2,'America/Toronto',2,'H9A H9B H9G','1124902278');
INSERT INTO `canadacities` VALUES ('Cornwall','Cornwall','ON','Ontario','45.0275','-74.7400',47845,777.9,'America/Toronto',3,'K6J K6K K6H','1124938303');
INSERT INTO `canadacities` VALUES ('Victoriaville','Victoriaville','QC','Quebec','46.0500','-71.9667',47760,566.4,'America/Toronto',3,'G6R G6P G6T','1124149787');
INSERT INTO `canadacities` VALUES ('Georgina','Georgina','ON','Ontario','44.3000','-79.4333',47642,165.6,'America/Toronto',3,'L0E L4P','1124000048');
INSERT INTO `canadacities` VALUES ('Woodstock','Woodstock','ON','Ontario','43.1306','-80.7467',46705,827.2,'America/Toronto',3,'N4S N4T N4V','1124758374');
INSERT INTO `canadacities` VALUES ('Langford Station','Langford Station','BC','British Columbia','48.4506','-123.5058',46584,1124.4,'America/Vancouver',3,'V9B V9C','1124095065');
INSERT INTO `canadacities` VALUES ('Quinte West','Quinte West','ON','Ontario','44.1833','-77.5667',46560,94,'America/Toronto',3,'K8N K8R K8V K0K','1124001037');
INSERT INTO `canadacities` VALUES ('St. Thomas','St. Thomas','ON','Ontario','42.7750','-81.1833',45732,1203.2,'America/Toronto',3,'N5R N5P','1124790209');
INSERT INTO `canadacities` VALUES ('Saint-Eustache','Saint-Eustache','QC','Quebec','45.5700','-73.9000',45276,642.1,'America/Toronto',3,'J7P J7R','1124758162');
INSERT INTO `canadacities` VALUES ('West Vancouver','West Vancouver','BC','British Columbia','49.3667','-123.1667',44122,506.1,'America/Vancouver',3,'V7T V7V V7S','1124001824');
INSERT INTO `canadacities` VALUES ('New Tecumseth','New Tecumseth','ON','Ontario','44.0833','-79.7500',43948,160.5,'America/Toronto',3,'L0L L0G L9R','1124001571');
INSERT INTO `canadacities` VALUES ('Innisfil','Innisfil','ON','Ontario','44.3000','-79.5833',43326,165.1,'America/Toronto',3,'L0L L9S','1124001408');
INSERT INTO `canadacities` VALUES ('Vaudreuil-Dorion','Vaudreuil-Dorion','QC','Quebec','45.4000','-74.0333',43268,595.5,'America/Toronto',3,'J7V','1124618618');
INSERT INTO `canadacities` VALUES ('Bradford West Gwillimbury','Bradford West Gwillimbury','ON','Ontario','44.1333','-79.6333',42880,213.7,'America/Toronto',3,'L0G L3Z','1124001093');
INSERT INTO `canadacities` VALUES ('Salaberry-de-Valleyfield','Salaberry-de-Valleyfield','QC','Quebec','45.2500','-74.1300',42787,394.1,'America/Toronto',3,'J6S J6T','1124638758');
INSERT INTO `canadacities` VALUES ('Rouyn-Noranda','Rouyn-Noranda','QC','Quebec','48.2333','-79.0167',42313,7.1,'America/Toronto',3,'J9X J9Y J0Y J0Z','1124267752');
INSERT INTO `canadacities` VALUES ('Boucherville','Boucherville','QC','Quebec','45.6000','-73.4500',41743,587.8,'America/Toronto',3,'J4B','1124000296');
INSERT INTO `canadacities` VALUES ('Mission','Mission','BC','British Columbia','49.1337','-122.3112',41519,182.9,'America/Vancouver',3,'V4S V2V','1124502601');
INSERT INTO `canadacities` VALUES ('Timmins','Timmins','ON','Ontario','48.4667','-81.3333',41145,13.9,'America/Toronto',3,'P0N P4N P4R P4P','1124760634');
INSERT INTO `canadacities` VALUES ('Lakeshore','Lakeshore','ON','Ontario','42.2399','-82.6511',40410,76.4,'America/Toronto',3,'N8M N8N N9K N0P N0R','1124001501');
INSERT INTO `canadacities` VALUES ('Brant','Brant','ON','Ontario','43.1167','-80.3667',39474,48.3,'America/Toronto',3,'N3L N3T N3W N0E','1124000682');
INSERT INTO `canadacities` VALUES ('Spruce Grove','Spruce Grove','AB','Alberta','53.5450','-113.9008',39348,1003.3,'America/Edmonton',3,'T7X','1124943146');
INSERT INTO `canadacities` VALUES ('Campbell River','Campbell River','BC','British Columbia','50.0244','-125.2475',38108,246,'America/Vancouver',3,'V9H V9W','1124851971');
INSERT INTO `canadacities` VALUES ('Prince Albert','Prince Albert','SK','Saskatchewan','53.2000','-105.7500',37756,562.1,'America/Regina',3,'S6X S6V S6W','1124158154');
INSERT INTO `canadacities` VALUES ('Penticton','Penticton','BC','British Columbia','49.4911','-119.5886',36893,857.3,'America/Vancouver',3,'V2A','1124613898');
INSERT INTO `canadacities` VALUES ('Sorel-Tracy','Sorel-Tracy','QC','Quebec','46.0333','-73.1167',36650,614,'America/Toronto',3,'J3P J3R','1124000182');
INSERT INTO `canadacities` VALUES ('East Kelowna','East Kelowna','BC','British Columbia','49.8625','-119.5833',36078,295.5,'America/Vancouver',3,'V1Z V4T','1124070905');
INSERT INTO `canadacities` VALUES ('Leamington','Leamington','ON','Ontario','42.0667','-82.5833',35730,113.6,'America/Toronto',3,'N8H N0P','1124258797');
INSERT INTO `canadacities` VALUES ('East Gwillimbury','East Gwillimbury','ON','Ontario','44.1333','-79.4167',34637,141.4,'America/Toronto',3,'L0G L9N','1124001370');
INSERT INTO `canadacities` VALUES ('Côte-Saint-Luc','Cote-Saint-Luc','QC','Quebec','45.4687','-73.6673',34504,4903.7,'America/Toronto',2,'H4W H4V H4X','1124563603');
INSERT INTO `canadacities` VALUES ('Orangeville','Orangeville','ON','Ontario','43.9167','-80.1167',34177,1989.5,'America/Toronto',3,'L9W','1124566061');
INSERT INTO `canadacities` VALUES ('Leduc','Leduc','AB','Alberta','53.2594','-113.5492',34094,806.9,'America/Edmonton',3,'T9E','1124170853');
INSERT INTO `canadacities` VALUES ('Moose Jaw','Moose Jaw','SK','Saskatchewan','50.3933','-105.5519',33665,511.5,'America/Regina',3,'S6J S6K S6H','1124806868');
INSERT INTO `canadacities` VALUES ('Port Moody','Port Moody','BC','British Columbia','49.2831','-122.8317',33535,1297.3,'America/Vancouver',3,'V3H','1124252668');
INSERT INTO `canadacities` VALUES ('Pointe-Claire','Pointe-Claire','QC','Quebec','45.4500','-73.8167',33488,1770.9,'America/Toronto',3,'H9R H9S','1124470650');
INSERT INTO `canadacities` VALUES ('Orillia','Orillia','ON','Ontario','44.6000','-79.4167',33411,1171.1,'America/Toronto',3,'L3V','1124049830');
INSERT INTO `canadacities` VALUES ('Stratford','Stratford','ON','Ontario','43.3708','-80.9819',33232,1107,'America/Toronto',3,'N4Z N5A','1124676255');
INSERT INTO `canadacities` VALUES ('Fort Erie','Fort Erie','ON','Ontario','42.9167','-79.0167',32901,197.9,'America/Toronto',3,'L0S L2A','1124516852');
INSERT INTO `canadacities` VALUES ('Val-d’Or','Val-d''Or','QC','Quebec','48.1000','-77.7833',32752,9.3,'America/Toronto',3,'J9P','1124239138');
INSERT INTO `canadacities` VALUES ('LaSalle','LaSalle','ON','Ontario','42.2167','-83.0667',32721,503.7,'America/Toronto',3,'N9J N9H','1124000988');
INSERT INTO `canadacities` VALUES ('Cochrane','Cochrane','AB','Alberta','51.1890','-114.4670',32199,1019.5,'America/Edmonton',3,'T4C','1124952542');
INSERT INTO `canadacities` VALUES ('North Cowichan','North Cowichan','BC','British Columbia','48.8236','-123.7192',31990,163.7,'America/Vancouver',3,'V0R V9L','1124000052');
INSERT INTO `canadacities` VALUES ('Lloydminster','Lloydminster','SK','Saskatchewan','53.2783','-110.0050',31582,655.8,'America/Edmonton',3,'S9V','1124051728');
INSERT INTO `canadacities` VALUES ('Chambly','Chambly','QC','Quebec','45.4311','-73.2873',31444,1253.7,'America/Toronto',3,'J3L','1124345124');
INSERT INTO `canadacities` VALUES ('Centre Wellington','Centre Wellington','ON','Ontario','43.7000','-80.3667',31093,75.9,'America/Toronto',3,'N0B N1M','1124000849');
INSERT INTO `canadacities` VALUES ('Okotoks','Okotoks','AB','Alberta','50.7250','-113.9750',30405,788.7,'America/Edmonton',3,'T1S','1124521470');
INSERT INTO `canadacities` VALUES ('Alma','Alma','QC','Quebec','48.5500','-71.6500',30331,155.6,'America/Toronto',3,'G8E G8B G8C','1124138438');
INSERT INTO `canadacities` VALUES ('Sainte-Julie','Sainte-Julie','QC','Quebec','45.5833','-73.3333',30045,619.6,'America/Toronto',3,'J3E','1124000521');
INSERT INTO `canadacities` VALUES ('Saint-Constant','Saint-Constant','QC','Quebec','45.3700','-73.5700',29954,524.9,'America/Toronto',3,'J5A','1124000054');
INSERT INTO `canadacities` VALUES ('Langley','Langley','BC','British Columbia','49.0986908053773','-122.659728692569',28963,2845.2,'America/Vancouver',2,'V3A','1124000480');
INSERT INTO `canadacities` VALUES ('Grimsby','Grimsby','ON','Ontario','43.2000','-79.5500',28883,420.4,'America/Toronto',3,'L3M','1124989517');
INSERT INTO `canadacities` VALUES ('Magog','Magog','QC','Quebec','45.2667','-72.1500',28312,196.3,'America/Toronto',3,'J1X','1124404849');
INSERT INTO `canadacities` VALUES ('Boisbriand','Boisbriand','QC','Quebec','45.6200','-73.8300',28308,1022.9,'America/Toronto',3,'J7H J7E J7G','1124001940');
INSERT INTO `canadacities` VALUES ('Whitehorse','Whitehorse','YT','Yukon','60.7029','-135.0691',28201,68.1,'America/Whitehorse',3,'Y1A','1124348186');
INSERT INTO `canadacities` VALUES ('Dieppe','Dieppe','NB','New Brunswick','46.0989','-64.7242',28114,365,'America/Moncton',3,'E1A','1124195431');
INSERT INTO `canadacities` VALUES ('King','King','ON','Ontario','44.0463','-79.6044',27333,82.3,'America/Toronto',3,'L7B L0G L3Y','1124001693');
INSERT INTO `canadacities` VALUES ('Parksville','Parksville','BC','British Columbia','49.3150','-124.3120',27330,939.5,'America/Vancouver',3,'V9P','1124698963');
INSERT INTO `canadacities` VALUES ('Conception Bay South','Conception Bay South','NL','Newfoundland and Labrador','47.5167','-52.9833',27168,454.9,'America/St_Johns',3,'A1W A1X','1124000563');
INSERT INTO `canadacities` VALUES ('Fort Saskatchewan','Fort Saskatchewan','AB','Alberta','53.7128','-113.2133',27088,479.4,'America/Edmonton',3,'T8L','1124769097');
INSERT INTO `canadacities` VALUES ('Woolwich','Woolwich','ON','Ontario','43.5667','-80.4833',26999,82.7,'America/Toronto',3,'N2J N3B N0B','1124000096');
INSERT INTO `canadacities` VALUES ('Sainte-Thérèse','Sainte-Therese','QC','Quebec','45.6333','-73.8500',26533,2798.9,'America/Toronto',2,'J7E','1124190411');
INSERT INTO `canadacities` VALUES ('Clarence-Rockland','Clarence-Rockland','ON','Ontario','45.4833','-75.2000',26505,89.1,'America/Toronto',3,'K4K K0A','1124000639');
INSERT INTO `canadacities` VALUES ('La Prairie','La Prairie','QC','Quebec','45.4200','-73.5000',26406,607.4,'America/Toronto',3,'J5R','1124956496');
INSERT INTO `canadacities` VALUES ('Saint-Bruno-de-Montarville','Saint-Bruno-de-Montarville','QC','Quebec','45.5333','-73.3500',26273,613.2,'America/Toronto',3,'J3V','1124286783');
INSERT INTO `canadacities` VALUES ('Midland','Midland','ON','Ontario','44.7500','-79.8833',26246,504.3,'America/Toronto',3,'L4R','1124104490');
INSERT INTO `canadacities` VALUES ('Thetford Mines','Thetford Mines','QC','Quebec','46.1000','-71.3000',26072,115.4,'America/Toronto',3,'G6H G6G','1124032181');
INSERT INTO `canadacities` VALUES ('Lincoln','Lincoln','ON','Ontario','43.1300','-79.4300',25719,158,'America/Toronto',3,'L0R L2R','1124001767');
INSERT INTO `canadacities` VALUES ('Quispamsis','Quispamsis','NB','New Brunswick','45.4322','-65.9462',24881,329.4,'America/Moncton',3,'E2S E2E E2G','1124000379');
INSERT INTO `canadacities` VALUES ('Wasaga Beach','Wasaga Beach','ON','Ontario','44.5206','-80.0167',24862,433,'America/Toronto',3,'L9Z','1124001919');
INSERT INTO `canadacities` VALUES ('Collingwood','Collingwood','ON','Ontario','44.5000','-80.2167',24811,748.3,'America/Toronto',3,'L9Y','1124219884');
INSERT INTO `canadacities` VALUES ('Sept-Îles','Sept-Iles','QC','Quebec','50.2167','-66.3833',24569,14.1,'America/Toronto',3,'G4S G0G','1124406431');
INSERT INTO `canadacities` VALUES ('Duncan','Duncan','BC','British Columbia','48.7787','-123.7079',24358,2444.5,'America/Vancouver',2,'V9L','1124316061');
INSERT INTO `canadacities` VALUES ('Hudson','Hudson','QC','Quebec','45.4500','-74.1500',24245,248.4,'America/Toronto',3,'J0P','1124590540');
INSERT INTO `canadacities` VALUES ('Saint-Lin--Laurentides','Saint-Lin--Laurentides','QC','Quebec','45.8500','-73.7667',24030,203.2,'America/Toronto',3,'J5M','1124906585');
INSERT INTO `canadacities` VALUES ('Strathroy-Caradoc','Strathroy-Caradoc','ON','Ontario','42.9575','-81.6167',23871,88.1,'America/Toronto',3,'N0L N7G','1124000831');
INSERT INTO `canadacities` VALUES ('Squamish','Squamish','BC','British Columbia','49.7017','-123.1589',23819,227.5,'America/Vancouver',3,'V0N V8B','1124005958');
INSERT INTO `canadacities` VALUES ('Thorold','Thorold','ON','Ontario','43.1167','-79.2000',23816,285.9,'America/Toronto',3,'L0S L2V L3B','1124718251');
INSERT INTO `canadacities` VALUES ('Truro','Truro','NS','Nova Scotia','45.3647','-63.2800',23583,345.3,'America/Halifax',3,'B2N','1124952899');
INSERT INTO `canadacities` VALUES ('Amherstburg','Amherstburg','ON','Ontario','42.1000','-83.0833',23524,128,'America/Toronto',3,'N9V N0R','1124696938');
INSERT INTO `canadacities` VALUES ('L’Assomption','L''Assomption','QC','Quebec','45.8333','-73.4167',23442,237.4,'America/Toronto',3,'J5W','1124500862');
INSERT INTO `canadacities` VALUES ('Tecumseh','Tecumseh','ON','Ontario','42.2431','-82.9256',23300,246.3,'America/Toronto',3,'N8N N9K N0R','1124720869');
INSERT INTO `canadacities` VALUES ('Candiac','Candiac','QC','Quebec','45.3800','-73.5200',22997,1331.3,'America/Toronto',3,'J5R','1124457982');
INSERT INTO `canadacities` VALUES ('Essa','Essa','ON','Ontario','44.2500','-79.7833',22970,82.1,'America/Toronto',3,'L0M L0L L9R','1124001569');
INSERT INTO `canadacities` VALUES ('Paradise','Paradise','NL','Newfoundland and Labrador','47.5333','-52.8667',22957,773.8,'America/St_Johns',3,'A1L','1124001159');
INSERT INTO `canadacities` VALUES ('Saint-Lambert','Saint-Lambert','QC','Quebec','45.5000','-73.5167',22761,3009.8,'America/Toronto',2,'J4P J4S J4R','1124174363');
INSERT INTO `canadacities` VALUES ('Mount Pearl Park','Mount Pearl Park','NL','Newfoundland and Labrador','47.5189','-52.8058',22477,1436.2,'America/St_Johns',3,'A1N','1124869949');
INSERT INTO `canadacities` VALUES ('Saint-Lazare','Saint-Lazare','QC','Quebec','45.4000','-74.1333',22354,334.3,'America/Toronto',3,'J7T','1124000613');
INSERT INTO `canadacities` VALUES ('Owen Sound','Owen Sound','ON','Ontario','44.5667','-80.9333',22318,892.6,'America/Toronto',3,'N4K','1124623613');
INSERT INTO `canadacities` VALUES ('Brockville','Brockville','ON','Ontario','44.5833','-75.6833',22293,1057.8,'America/Toronto',3,'K6V','1124286131');
INSERT INTO `canadacities` VALUES ('Chestermere','Chestermere','AB','Alberta','51.0500','-113.8225',22163,675,'America/Edmonton',3,'T1X','1124000371');
INSERT INTO `canadacities` VALUES ('Kingsville','Kingsville','ON','Ontario','42.1000','-82.7167',22119,89.9,'America/Toronto',3,'N8M N9Y N0P N0R','1124616034');
INSERT INTO `canadacities` VALUES ('Port Alberni','Port Alberni','BC','British Columbia','49.2339','-124.8050',21711,928.9,'America/Vancouver',3,'V9Y','1124952808');
INSERT INTO `canadacities` VALUES ('Springwater','Springwater','ON','Ontario','44.4333','-79.7333',21701,40.5,'America/Toronto',3,'L0L L9X','1124001298');
INSERT INTO `canadacities` VALUES ('Scugog','Scugog','ON','Ontario','44.0900','-78.9360',21617,45.4,'America/Toronto',3,'L0C L0B L9L','1124000741');
INSERT INTO `canadacities` VALUES ('Uxbridge','Uxbridge','ON','Ontario','44.1167','-79.1333',21556,51.3,'America/Toronto',3,'L0E L0C L9P','1124829638');
INSERT INTO `canadacities` VALUES ('Fort St. John','Fort St. John','BC','British Columbia','56.2465','-120.8476',21465,656.9,'America/Dawson_Creek',3,'V1J','1124517495');
INSERT INTO `canadacities` VALUES ('Wilmot','Wilmot','ON','Ontario','43.4000','-80.6500',21429,81.2,'America/Toronto',3,'N3A N0B','1124001797');
INSERT INTO `canadacities` VALUES ('Essex','Essex','ON','Ontario','42.0833','-82.9000',21216,76.4,'America/Toronto',3,'N8M N0R','1124628052');
INSERT INTO `canadacities` VALUES ('Varennes','Varennes','QC','Quebec','45.6833','-73.4333',21198,223.6,'America/Toronto',3,'J3X','1124232101');
INSERT INTO `canadacities` VALUES ('Oro-Medonte','Oro-Medonte','ON','Ontario','44.5667','-79.5833',21036,35.8,'America/Toronto',3,'L0L L0K L3V L4R L4M','1124001350');
INSERT INTO `canadacities` VALUES ('Mont-Royal','Mont-Royal','QC','Quebec','45.5161','-73.6431',20953,2776.7,'America/Toronto',2,'H3R H3P H4P','1124001920');
INSERT INTO `canadacities` VALUES ('Beaumont','Beaumont','AB','Alberta','53.3572','-113.4147',20888,845.6,'America/Edmonton',3,'T4X','1124001210');
INSERT INTO `canadacities` VALUES ('Baie-Comeau','Baie-Comeau','QC','Quebec','49.2167','-68.1500',20687,61.8,'America/Toronto',3,'G5C G4Z','1124859576');
INSERT INTO `canadacities` VALUES ('Riverview','Riverview','NB','New Brunswick','46.0613','-64.8052',20584,603.7,'America/Moncton',3,'E1B','1124000112');
INSERT INTO `canadacities` VALUES ('Cobourg','Cobourg','ON','Ontario','43.9667','-78.1667',20519,915.7,'America/Toronto',3,'K9A','1124831257');
INSERT INTO `canadacities` VALUES ('Cranbrook','Cranbrook','BC','British Columbia','49.5097','-115.7667',202499,641.2,'America/Edmonton',3,'V1C','1124937794');
INSERT INTO `canadacities` VALUES ('Yellowknife','Yellowknife','NT','Northwest Territories','62.4709','-114.4053',20340,196.8,'America/Yellowknife',3,'X1A','1124208917');
INSERT INTO `canadacities` VALUES ('South Frontenac','South Frontenac','ON','Ontario','44.5081','-76.4939',20188,21.3,'America/Toronto',3,'K0H','1124000063');
INSERT INTO `canadacities` VALUES ('Rivière-du-Loup','Riviere-du-Loup','QC','Quebec','47.8333','-69.5333',20118,240.2,'America/Toronto',3,'G5R','1124662123');
INSERT INTO `canadacities` VALUES ('Port Colborne','Port Colborne','ON','Ontario','42.8833','-79.2500',20033,164.2,'America/Toronto',3,'L0S L3K','1124274319');
INSERT INTO `canadacities` VALUES ('Saint-Augustin-de-Desmaures','Saint-Augustin-de-Desmaures','QC','Quebec','46.7333','-71.4667',19907,232,'America/Toronto',3,'G3A','1124000358');
INSERT INTO `canadacities` VALUES ('Huntsville','Huntsville','ON','Ontario','45.3333','-79.2167',19816,27.9,'America/Toronto',3,'P0B P1H','1124961145');
INSERT INTO `canadacities` VALUES ('Sainte-Marthe-sur-le-Lac','Sainte-Marthe-sur-le-Lac','QC','Quebec','45.5300','-73.9300',19797,2267.4,'America/Toronto',2,'J0N','1124001153');
INSERT INTO `canadacities` VALUES ('Lloydminster','Lloydminster','AB','Alberta','53.2807','-110.0350',19739,823.1,'America/Edmonton',3,'T9V','1124000858');
INSERT INTO `canadacities` VALUES ('Westmount','Westmount','QC','Quebec','45.4833','-73.6000',19658,4860.9,'America/Toronto',2,'H3Z H3Y','1124878078');
INSERT INTO `canadacities` VALUES ('Russell','Russell','ON','Ontario','45.2569','-75.3583',19598,98.6,'America/Toronto',3,'K4R K0A','1124982538');
INSERT INTO `canadacities` VALUES ('Les Coteaux','Les Coteaux','QC','Quebec','45.2800','-74.2300',19582,485,'America/Toronto',3,'J7X','1124001989');
INSERT INTO `canadacities` VALUES ('Salmon Arm','Salmon Arm','BC','British Columbia','50.7022','-119.2722',19432,125.2,'America/Vancouver',3,'V1E','1124478865');
INSERT INTO `canadacities` VALUES ('Kirkland','Kirkland','QC','Quebec','45.4500','-73.8667',19413,2012,'America/Toronto',2,'H9H H9J','1124000941');
INSERT INTO `canadacities` VALUES ('Corner Brook','Corner Brook','NL','Newfoundland and Labrador','48.9287','-57.9260',19333,130.7,'America/St_Johns',3,'A2H','1124244792');
INSERT INTO `canadacities` VALUES ('New Glasgow','New Glasgow','NS','Nova Scotia','45.5926','-62.6455',19316,951.3,'America/Halifax',3,'B2H','1124760188');
INSERT INTO `canadacities` VALUES ('Dorval','Dorval','QC','Quebec','45.4500','-73.7500',19302,923,'America/Toronto',3,'H9P H9S','1124933556');
INSERT INTO `canadacities` VALUES ('Beaconsfield','Beaconsfield','QC','Quebec','45.4333','-73.8667',19277,1747.5,'America/Toronto',3,'H9W','1124755118');
INSERT INTO `canadacities` VALUES ('Pitt Meadows','Pitt Meadows','BC','British Columbia','49.2333','-122.6833',19146,221.7,'America/Vancouver',3,'V3Y','1124786902');
INSERT INTO `canadacities` VALUES ('Niagara-on-the-Lake','Niagara-on-the-Lake','ON','Ontario','43.2553','-79.0717',19088,145.3,'America/New_York',3,'L0S','1124366228');
INSERT INTO `canadacities` VALUES ('Colwood','Colwood','BC','British Columbia','48.4236','-123.4958',18961,1073.6,'America/Vancouver',3,'V9B V9C','1124000395');
INSERT INTO `canadacities` VALUES ('Middlesex Centre','Middlesex Centre','ON','Ontario','43.0500','-81.4500',18928,32.2,'America/Toronto',3,'N0M N0L N6P N6H','1124001841');
INSERT INTO `canadacities` VALUES ('Mont-Saint-Hilaire','Mont-Saint-Hilaire','QC','Quebec','45.5622','-73.1917',18859,427.8,'America/Toronto',3,'J3H','1124333461');
INSERT INTO `canadacities` VALUES ('Camrose','Camrose','AB','Alberta','53.0167','-112.8333',18772,450.5,'America/Edmonton',3,'T4V','1124351657');
INSERT INTO `canadacities` VALUES ('Selwyn','Selwyn','ON','Ontario','44.4167','-78.3333',18653,59,'America/Toronto',3,'K9J K9L K0L','1124000937');
INSERT INTO `canadacities` VALUES ('Tillsonburg','Tillsonburg','ON','Ontario','42.8667','-80.7333',18615,838.6,'America/Toronto',3,'N4G','1124817746');
INSERT INTO `canadacities` VALUES ('Pelham','Pelham','ON','Ontario','43.0333','-79.3333',18192,144,'America/Toronto',3,'L0S','1124000042');
INSERT INTO `canadacities` VALUES ('Petawawa','Petawawa','ON','Ontario','45.9000','-77.2833',18160,110.3,'America/Toronto',3,'K8H','1124206291');
INSERT INTO `canadacities` VALUES ('Stony Plain','Stony Plain','AB','Alberta','53.5264','-114.0069',17993,507.6,'America/Edmonton',3,'T7Z','1124982081');
INSERT INTO `canadacities` VALUES ('Oak Bay','Oak Bay','BC','British Columbia','48.4264','-123.3228',17990,1710.1,'America/Vancouver',3,'V8P V8S V8R','1124761730');
INSERT INTO `canadacities` VALUES ('North Grenville','North Grenville','ON','Ontario','44.9667','-75.6500',17964,51,'America/Toronto',3,'K0G','1124000746');
INSERT INTO `canadacities` VALUES ('Loyalist','Loyalist','ON','Ontario','44.2500','-76.7500',17943,52.4,'America/Toronto',3,'K7N K7R K0H','1124001145');
INSERT INTO `canadacities` VALUES ('Deux-Montagnes','Deux-Montagnes','QC','Quebec','45.5333','-73.8833',17915,2947.8,'America/Toronto',2,'J7R','1124980214');
INSERT INTO `canadacities` VALUES ('Steinbach','Steinbach','MB','Manitoba','49.5258','-96.6839',17806,474.1,'America/Winnipeg',3,'R5G','1124152692');
INSERT INTO `canadacities` VALUES ('Saint-Colomban','Saint-Colomban','QC','Quebec','45.7300','-74.1300',17740,191.4,'America/Toronto',3,'J5K','1124001676');
INSERT INTO `canadacities` VALUES ('Miramichi','Miramichi','NB','New Brunswick','47.0196','-65.5072',17692,98.8,'America/Moncton',3,'E1V E1N','1124714190');
INSERT INTO `canadacities` VALUES ('Esquimalt','Esquimalt','BC','British Columbia','48.4306','-123.4147',17533,2476.7,'America/Vancouver',2,'V9A','1124990218');
INSERT INTO `canadacities` VALUES ('Central Saanich','Central Saanich','BC','British Columbia','48.5142','-123.3839',17385,421.9,'America/Vancouver',3,'V8M','1124000519');
INSERT INTO `canadacities` VALUES ('Sainte-Catherine','Sainte-Catherine','QC','Quebec','45.4000','-73.5800',17347,1851.4,'America/Toronto',3,'J5C','1124941451');
INSERT INTO `canadacities` VALUES ('Port Hope','Port Hope','ON','Ontario','43.9500','-78.3000',17294,62,'America/Toronto',3,'L0A L1A','1124105292');
INSERT INTO `canadacities` VALUES ('Inverness','Inverness','NS','Nova Scotia','46.2000','-61.1000',17235,4.5,'America/Glace_Bay',3,'B0E','1124840965');
INSERT INTO `canadacities` VALUES ('Saint-Basile-le-Grand','Saint-Basile-le-Grand','QC','Quebec','45.5333','-73.2833',17053,475.8,'America/Toronto',3,'J3N','1124000968');
INSERT INTO `canadacities` VALUES ('L’Ancienne-Lorette','L''Ancienne-Lorette','QC','Quebec','46.8000','-71.3500',16970,2197,'America/Toronto',2,'G2E','1124580674');
INSERT INTO `canadacities` VALUES ('Swift Current','Swift Current','SK','Saskatchewan','50.2881','-107.7939',16750,571.6,'America/Swift_Current',3,'S9H','1124460875');
INSERT INTO `canadacities` VALUES ('Pembroke','Pembroke','ON','Ontario','45.8167','-77.1000',16571,1002.8,'America/Toronto',3,'K8A','1124877940');
INSERT INTO `canadacities` VALUES ('Edmundston','Edmundston','NB','New Brunswick','47.3765','-68.3253',16437,153.8,'America/Moncton',3,'E7C E7B E3V','1124274233');
INSERT INTO `canadacities` VALUES ('Yorkton','Yorkton','SK','Saskatchewan','51.2139','-102.4628',16280,449.8,'America/Regina',3,'S3N','1124108820');
INSERT INTO `canadacities` VALUES ('Springfield','Springfield','MB','Manitoba','49.9292','-96.6939',16142,14.7,'America/Winnipeg',3,'R5N R5L R5M R5R R5P R5T','1124000696');
INSERT INTO `canadacities` VALUES ('Sylvan Lake','Sylvan Lake','AB','Alberta','52.3083','-114.0964',16142,692.8,'America/Edmonton',3,'T4S','1124397940');
INSERT INTO `canadacities` VALUES ('Bracebridge','Bracebridge','ON','Ontario','45.0333','-79.3000',16010,25.5,'America/Toronto',3,'P1L','1124793645');
INSERT INTO `canadacities` VALUES ('Summerside','Summerside','PE','Prince Edward Island','46.4000','-63.7833',16001,567.2,'America/Halifax',3,'C1N C0B','1124487102');
INSERT INTO `canadacities` VALUES ('Canmore','Canmore','AB','Alberta','51.0890','-115.3590',15990,233.5,'America/Edmonton',3,'T1W','1124688642');
INSERT INTO `canadacities` VALUES ('Bathurst','Bathurst','NB','New Brunswick','47.6200','-65.6500',15985,132.7,'America/Moncton',3,'E2A','1124816720');
INSERT INTO `canadacities` VALUES ('Greater Napanee','Greater Napanee','ON','Ontario','44.2500','-76.9500',15892,34.5,'America/Toronto',3,'K7R K0H K0K','1124001319');
INSERT INTO `canadacities` VALUES ('Lake Country','Lake Country','BC','British Columbia','50.0833','-119.4142',15817,129.5,'America/Vancouver',3,'V4V','1124001544');
INSERT INTO `canadacities` VALUES ('Hanover','Hanover','MB','Manitoba','49.4433','-96.8492',15733,21.2,'America/Winnipeg',3,'R5G R0A','1124001704');
INSERT INTO `canadacities` VALUES ('Winkler','Winkler','MB','Manitoba','49.1817','-97.9397',15335,663.1,'America/Winnipeg',3,'R6W','1124205424');
INSERT INTO `canadacities` VALUES ('Saint-Charles-Borromée','Saint-Charles-Borromee','QC','Quebec','46.0500','-73.4667',15285,827,'America/Toronto',3,'J6E','1124000877');
INSERT INTO `canadacities` VALUES ('Cowansville','Cowansville','QC','Quebec','45.2000','-72.7500',15234,325,'America/Toronto',3,'J2K','1124357421');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-des-Plaines','Sainte-Anne-des-Plaines','QC','Quebec','45.7617','-73.82024',15221,162.9,'America/Toronto',3,'J0N','1124304532');
INSERT INTO `canadacities` VALUES ('Gaspé','Gaspe','QC','Quebec','48.8333','-64.4833',15163,13.5,'America/Toronto',3,'G4X','1124212754');
INSERT INTO `canadacities` VALUES ('Sooke','Sooke','BC','British Columbia','48.3761','-123.7378',15086,266.6,'America/Vancouver',3,'V9Z','1124034713');
INSERT INTO `canadacities` VALUES ('Kenora','Kenora','ON','Ontario','49.7667','-94.4833',14967,70.7,'America/Winnipeg',3,'P9N','1124844807');
INSERT INTO `canadacities` VALUES ('Cold Lake','Cold Lake','AB','Alberta','54.4642','-110.1825',14961,249.7,'America/Edmonton',3,'T9M','1124089461');
INSERT INTO `canadacities` VALUES ('Brooks','Brooks','AB','Alberta','50.5642','-111.8989',14924,819.8,'America/Edmonton',3,'T1R','1124093123');
INSERT INTO `canadacities` VALUES ('Kentville','Kentville','NS','Nova Scotia','45.0775','-64.4958',14905,388.2,'America/Halifax',3,'B4N','1124530137');
INSERT INTO `canadacities` VALUES ('Comox','Comox','BC','British Columbia','49.6733','-124.9022',14806,877.7,'America/Vancouver',3,'V0R V9M','1124788300');
INSERT INTO `canadacities` VALUES ('Pincourt','Pincourt','QC','Quebec','45.3833','-73.9833',14751,2078,'America/Toronto',2,'J7W','1124637966');
INSERT INTO `canadacities` VALUES ('Mississippi Mills','Mississippi Mills','ON','Ontario','45.2167','-76.2000',14740,28.8,'America/Toronto',3,'K7C K0A','1124001617');
INSERT INTO `canadacities` VALUES ('St. Clair','St. Clair','ON','Ontario','42.7833','-82.3500',14659,23.7,'America/Toronto',3,'N8A N0N N0P','1124000228');
INSERT INTO `canadacities` VALUES ('Terrace','Terrace','BC','British Columbia','54.5164','-128.5997',14633,209.6,'America/Vancouver',3,'V8G','1124878479');
INSERT INTO `canadacities` VALUES ('Mercier','Mercier','QC','Quebec','45.3200','-73.7500',14626,318.2,'America/Toronto',3,'J6R','1124186621');
INSERT INTO `canadacities` VALUES ('West Lincoln','West Lincoln','ON','Ontario','43.0667','-79.5667',14500,37.4,'America/Toronto',3,'L0R','1124001460');
INSERT INTO `canadacities` VALUES ('Lavaltrie','Lavaltrie','QC','Quebec','45.8833','-73.2833',14425,211.4,'America/Toronto',3,'J5T','1124818327');
INSERT INTO `canadacities` VALUES ('West Nipissing / Nipissing Ouest','West Nipissing / Nipissing Ouest','ON','Ontario','46.3667','-79.9167',14364,7.2,'America/Toronto',3,'P0H P1B P2B','1124000026');
INSERT INTO `canadacities` VALUES ('Strathmore','Strathmore','AB','Alberta','51.0378','-113.4003',14339,531.5,'America/Edmonton',3,'T1P','1124000881');
INSERT INTO `canadacities` VALUES ('High River','High River','AB','Alberta','50.5808','-113.8744',14324,645.4,'America/Edmonton',3,'T1V','1124607825');
INSERT INTO `canadacities` VALUES ('Clearview','Clearview','ON','Ontario','44.3981','-80.0742',14151,25.4,'America/Toronto',3,'L0M L9Y','1124000053');
INSERT INTO `canadacities` VALUES ('Lachute','Lachute','QC','Quebec','45.6500','-74.3333',14100,129.8,'America/Toronto',3,'J8H','1124217062');
INSERT INTO `canadacities` VALUES ('Rosemère','Rosemere','QC','Quebec','45.6369','-73.8000',14090,1318.7,'America/Toronto',3,'J7A','1124741055');
INSERT INTO `canadacities` VALUES ('Matane','Matane','QC','Quebec','48.8500','-67.5333',13987,71.5,'America/Toronto',3,'G4W','1124528318');
INSERT INTO `canadacities` VALUES ('Thames Centre','Thames Centre','ON','Ontario','43.0300','-81.0800',13980,32.2,'America/Toronto',3,'N0M N0L N6M','1124000993');
INSERT INTO `canadacities` VALUES ('Powell River','Powell River','BC','British Columbia','49.8353','-124.5247',13943,482.4,'America/Vancouver',3,'V8A','1124154376');
INSERT INTO `canadacities` VALUES ('Carleton Place','Carleton Place','ON','Ontario','45.1333','-76.1333',13940,1259.4,'America/Toronto',3,'K7C','1124676010');
INSERT INTO `canadacities` VALUES ('Guelph/Eramosa','Guelph/Eramosa','ON','Ontario','43.6300','-80.2200',13904,47.5,'America/Toronto',3,'N0B N1E N1H','1124001707');
INSERT INTO `canadacities` VALUES ('Grand Falls','Grand Falls','NL','Newfoundland and Labrador','48.9578','-55.6633',13853,252.6,'America/St_Johns',3,'A2A A2B','1124068277');
INSERT INTO `canadacities` VALUES ('North Battleford','North Battleford','SK','Saskatchewan','52.7575','-108.2861',13836,412.4,'America/Swift_Current',3,'S9A','1124789635');
INSERT INTO `canadacities` VALUES ('Mont-Laurier','Mont-Laurier','QC','Quebec','46.5500','-75.5000',13779,23.3,'America/Toronto',3,'J9L','1124355399');
INSERT INTO `canadacities` VALUES ('Central Elgin','Central Elgin','ON','Ontario','42.7667','-81.1000',13746,49.1,'America/Toronto',3,'N5R N5P N5L N0L','1124000475');
INSERT INTO `canadacities` VALUES ('Mistassini','Mistassini','QC','Quebec','48.8229','-72.2154',13718,46.8,'America/Toronto',3,'G8L','1124980171');
INSERT INTO `canadacities` VALUES ('Saugeen Shores','Saugeen Shores','ON','Ontario','44.4333','-81.3667',13715,80.2,'America/Toronto',3,'N0H','1124000488');
INSERT INTO `canadacities` VALUES ('Ingersoll','Ingersoll','ON','Ontario','43.0392','-80.8836',13693,1075.3,'America/Toronto',3,'N5C','1124716784');
INSERT INTO `canadacities` VALUES ('Beauharnois','Beauharnois','QC','Quebec','45.3200','-73.8700',13638,199.9,'America/Toronto',3,'J6N','1124880971');
INSERT INTO `canadacities` VALUES ('South Stormont','South Stormont','ON','Ontario','45.0833','-74.9667',13570,30.3,'America/Toronto',3,'K0C','1124001793');
INSERT INTO `canadacities` VALUES ('Bécancour','Becancour','QC','Quebec','46.3333','-72.4333',13561,30.9,'America/Toronto',3,'G9H','1124242297');
INSERT INTO `canadacities` VALUES ('Severn','Severn','ON','Ontario','44.7500','-79.5167',13477,24.5,'America/Toronto',3,'L0K P0E L3V','1124489890');
INSERT INTO `canadacities` VALUES ('Lacombe','Lacombe','AB','Alberta','52.4683','-113.7369',13396,650.8,'America/Edmonton',3,'T4L','1124057569');
INSERT INTO `canadacities` VALUES ('Sainte-Sophie','Sainte-Sophie','QC','Quebec','45.8200','-73.9000',13375,120.2,'America/Toronto',3,'J5J','1124001574');
INSERT INTO `canadacities` VALUES ('Val-des-Monts','Val-des-Monts','QC','Quebec','45.6500','-75.6667',13328,30.7,'America/Toronto',3,'J8N','1124001051');
INSERT INTO `canadacities` VALUES ('Saint-Amable','Saint-Amable','QC','Quebec','45.6500','-73.3000',13322,362.3,'America/Toronto',3,'J0L','1124000904');
INSERT INTO `canadacities` VALUES ('Portage La Prairie','Portage La Prairie','MB','Manitoba','49.9728','-98.2919',13270,536.8,'America/Winnipeg',3,'R1N','1124282782');
INSERT INTO `canadacities` VALUES ('South Glengarry','South Glengarry','ON','Ontario','45.2000','-74.5833',13150,21.7,'America/Toronto',3,'K6H K0C','1124001506');
INSERT INTO `canadacities` VALUES ('Sainte-Marie','Sainte-Marie','QC','Quebec','46.4500','-71.0333',13134,122.1,'America/Toronto',3,'G6E','1124650507');
INSERT INTO `canadacities` VALUES ('North Perth','North Perth','ON','Ontario','43.7300','-80.9500',13130,26.6,'America/Toronto',3,'N4W N0K N0G','1124000749');
INSERT INTO `canadacities` VALUES ('Thompson','Thompson','MB','Manitoba','55.7433','-97.8553',13035,784.3,'America/Winnipeg',3,'R8N','1124110693');
INSERT INTO `canadacities` VALUES ('Trent Hills','Trent Hills','ON','Ontario','44.3142','-77.8514',12900,25.2,'America/Toronto',3,'K0K K0L','1124001755');
INSERT INTO `canadacities` VALUES ('Trail','Trail','BC','British Columbia','49.0950','-117.7100',12863,472,'America/Vancouver',3,'V1R','1124817036');
INSERT INTO `canadacities` VALUES ('The Nation / La Nation','The Nation / La Nation','ON','Ontario','45.3500','-75.0333',12808,19.5,'America/Toronto',3,'K0A K0B K0C','1124001243');
INSERT INTO `canadacities` VALUES ('Amos','Amos','QC','Quebec','48.5667','-78.1167',12675,29.5,'America/Toronto',3,'J9T','1124939649');
INSERT INTO `canadacities` VALUES ('Wetaskiwin','Wetaskiwin','AB','Alberta','52.9694','-113.3769',12594,671.6,'America/Edmonton',3,'T9A','1124492484');
INSERT INTO `canadacities` VALUES ('West Grey','West Grey','ON','Ontario','44.1833','-80.8167',12518,14.3,'America/Toronto',3,'N4N N0G N0C','1124000272');
INSERT INTO `canadacities` VALUES ('Warman','Warman','SK','Saskatchewan','52.3219','-106.5842',12419,948.3,'America/Regina',3,'S0K','1124688931');
INSERT INTO `canadacities` VALUES ('Dawson Creek','Dawson Creek','BC','British Columbia','55.7606','-120.2356',12323,461.1,'America/Dawson_Creek',3,'V1G','1124081402');
INSERT INTO `canadacities` VALUES ('Sidney','Sidney','BC','British Columbia','48.6506','-123.3986',12318,2412.8,'America/Vancouver',2,'V8L','1124421362');
INSERT INTO `canadacities` VALUES ('Gravenhurst','Gravenhurst','ON','Ontario','44.9167','-79.3667',12311,23.8,'America/Toronto',3,'P0E P1P','1124842372');
INSERT INTO `canadacities` VALUES ('Prince Rupert','Prince Rupert','BC','British Columbia','54.3122','-130.3271',12300,186.4,'America/Vancouver',3,'V8J','1124847707');
INSERT INTO `canadacities` VALUES ('Perth East','Perth East','ON','Ontario','43.4700','-80.9500',12261,17.2,'America/Toronto',3,'N4W N5A N3A N0K N0B','1124001760');
INSERT INTO `canadacities` VALUES ('North Saanich','North Saanich','BC','British Columbia','48.6142','-123.4200',12235,329.2,'America/Vancouver',3,'V8L','1124000779');
INSERT INTO `canadacities` VALUES ('Prévost','Prevost','QC','Quebec','45.8700','-74.0800',12171,347.2,'America/Toronto',3,'J0R','1124001584');
INSERT INTO `canadacities` VALUES ('Sainte-Adèle','Sainte-Adele','QC','Quebec','45.9500','-74.1300',12137,100.4,'America/Toronto',3,'J8B','1124439200');
INSERT INTO `canadacities` VALUES ('Sainte-Agathe-des-Monts','Sainte-Agathe-des-Monts','QC','Quebec','46.0500','-74.2800',12136,86.8,'America/Toronto',3,'J8C','1124041166');
INSERT INTO `canadacities` VALUES ('Quesnel','Quesnel','BC','British Columbia','52.9784','-122.4927',12110,279.8,'America/Vancouver',3,'V2J','1124028015');
INSERT INTO `canadacities` VALUES ('Les Îles-de-la-Madeleine','Les Iles-de-la-Madeleine','QC','Quebec','47.3833','-61.8667',12010,69.5,'America/Halifax',3,'G4T','1124000721');
INSERT INTO `canadacities` VALUES ('Taché','Tache','MB','Manitoba','49.7081','-96.6736',11916,20.5,'America/Winnipeg',3,'R5J R5K R0A','1124000169');
INSERT INTO `canadacities` VALUES ('Wellington North','Wellington North','ON','Ontario','43.9000','-80.5700',11914,22.6,'America/Toronto',3,'N0G','1124001997');
INSERT INTO `canadacities` VALUES ('St. Andrews','St. Andrews','MB','Manitoba','50.2700','-96.9747',11913,15.8,'America/Winnipeg',3,'R0C R1A','1124001672');
INSERT INTO `canadacities` VALUES ('Williams Lake','Williams Lake','BC','British Columbia','52.1294','-122.1383',11906,330.5,'America/Vancouver',3,'V2G','1124821980');
INSERT INTO `canadacities` VALUES ('Gander','Gander','NL','Newfoundland and Labrador','48.9569','-54.6089',11880,113.7,'America/St_Johns',3,'A1V','1124310517');
INSERT INTO `canadacities` VALUES ('Whistler','Whistler','BC','British Columbia','50.1208','-122.9544',11854,49.3,'America/Vancouver',3,'V8E','1124001562');
INSERT INTO `canadacities` VALUES ('Brighton','Brighton','ON','Ontario','44.1222','-77.7642',11844,43.2,'America/Toronto',3,'K0K','1124672085');
INSERT INTO `canadacities` VALUES ('Tiny','Tiny','ON','Ontario','44.6833','-79.9500',11787,35,'America/Toronto',3,'L0L L9M','1124000103');
INSERT INTO `canadacities` VALUES ('Hawkesbury','Hawkesbury','ON','Ontario','45.6000','-74.6000',11755,1009.7,'America/Toronto',3,'K6A','1124065659');
INSERT INTO `canadacities` VALUES ('Carignan','Carignan','QC','Quebec','45.4500','-73.3000',11740,189.1,'America/Toronto',3,'J3L','1124001655');
INSERT INTO `canadacities` VALUES ('Brock','Brock','ON','Ontario','44.3167','-79.0833',11642,27.5,'America/Toronto',3,'L0K L0E L0C','1124001106');
INSERT INTO `canadacities` VALUES ('L’Île-Perrot','L''Ile-Perrot','QC','Quebec','45.3833','-73.9500',11638,2130.1,'America/Toronto',2,'J7V','1124063001');
INSERT INTO `canadacities` VALUES ('Summerland','Summerland','BC','British Columbia','49.6006','-119.6778',11615,156.8,'America/Vancouver',3,'V0H','1124400731');
INSERT INTO `canadacities` VALUES ('St. Clements','St. Clements','MB','Manitoba','50.2689','-96.6742',11586,16.3,'America/Winnipeg',3,'R0E R1B R1C R1A','1124000566');
INSERT INTO `canadacities` VALUES ('View Royal','View Royal','BC','British Columbia','48.4517','-123.4339',11575,807.6,'America/Vancouver',3,'V9B','1124001985');
INSERT INTO `canadacities` VALUES ('Montmagny','Montmagny','QC','Quebec','46.9833','-70.5500',11491,91.1,'America/Toronto',3,'G5V','1124025705');
INSERT INTO `canadacities` VALUES ('Cantley','Cantley','QC','Quebec','45.5667','-75.7833',11449,90.8,'America/Toronto',3,'J8V','1124000263');
INSERT INTO `canadacities` VALUES ('Erin','Erin','ON','Ontario','43.7667','-80.0667',11439,38.4,'America/Toronto',3,'L7J L0N N0B','1124418313');
INSERT INTO `canadacities` VALUES ('Notre-Dame-de-l''Île-Perrot','Notre-Dame-de-l''Ile-Perrot','QC','Quebec','45.3667','-73.9333',11427,407.3,'America/Toronto',3,'J7V','1124001191');
INSERT INTO `canadacities` VALUES ('Kincardine','Kincardine','ON','Ontario','44.1667','-81.6333',11389,21.2,'America/Toronto',3,'N2Z N0G','1124781881');
INSERT INTO `canadacities` VALUES ('Elliot Lake','Elliot Lake','ON','Ontario','46.3833','-82.6500',11372,16.3,'America/Toronto',3,'P5A','1124793448');
INSERT INTO `canadacities` VALUES ('Bromont','Bromont','QC','Quebec','45.3167','-72.6500',11357,99.6,'America/Toronto',3,'J2L','1124286457');
INSERT INTO `canadacities` VALUES ('Arnprior','Arnprior','ON','Ontario','45.4333','-76.3500',11305,738.5,'America/Toronto',3,'K7S','1124700031');
INSERT INTO `canadacities` VALUES ('North Dundas','North Dundas','ON','Ontario','45.0833','-75.3500',11278,22.4,'America/Toronto',3,'K0C K0E','1124000474');
INSERT INTO `canadacities` VALUES ('Wellesley','Wellesley','ON','Ontario','43.5500','-80.7167',11260,40.5,'America/Toronto',3,'N0B','1124590159');
INSERT INTO `canadacities` VALUES ('Nelson','Nelson','BC','British Columbia','49.5000','-117.2833',11198,930.6,'America/Vancouver',3,'V0G V1L','1124361295');
INSERT INTO `canadacities` VALUES ('Ladysmith','Ladysmith','BC','British Columbia','48.9975','-123.8203',11194,746.5,'America/Vancouver',3,'V9G','1124872385');
INSERT INTO `canadacities` VALUES ('Coldstream','Coldstream','BC','British Columbia','50.2200','-119.2481',11171,167.8,'America/Vancouver',3,'V1B','1124000216');
INSERT INTO `canadacities` VALUES ('Georgian Bluffs','Georgian Bluffs','ON','Ontario','44.6500','-81.0333',11100,18.5,'America/Toronto',3,'N4K N0H','1124001470');
INSERT INTO `canadacities` VALUES ('Weyburn','Weyburn','SK','Saskatchewan','49.6611','-103.8525',11019,579.1,'America/Regina',3,'S4H','1124618383');
INSERT INTO `canadacities` VALUES ('La Tuque','La Tuque','QC','Quebec','48.0652','-74.0528',11001,0.4,'America/Toronto',3,'G9X G0X','1124000430');
INSERT INTO `canadacities` VALUES ('Norwich','Norwich','ON','Ontario','42.9833','-80.6000',11001,25.5,'America/Toronto',3,'N4S N4G N0J','1124219807');
INSERT INTO `canadacities` VALUES ('Meaford','Meaford','ON','Ontario','44.5800','-80.7300',10991,18.7,'America/Toronto',3,'N4K N4L N0H','1124445257');
INSERT INTO `canadacities` VALUES ('Adjala-Tosorontio','Adjala-Tosorontio','ON','Ontario','44.1333','-79.9333',10975,29.5,'America/Toronto',3,'L0N L0M L0G L9R','1124000498');
INSERT INTO `canadacities` VALUES ('Hamilton Township','Hamilton Township','ON','Ontario','44.0540','-78.2164',10942,42.7,'America/Toronto',3,'K9A K0K K0L','1124000994');
INSERT INTO `canadacities` VALUES ('Stratford','Stratford','PE','Prince Edward Island','46.2167','-63.0893',10927,482,'America/Halifax',3,'C1B','1124001331');
INSERT INTO `canadacities` VALUES ('Estevan','Estevan','SK','Saskatchewan','49.1392','-102.9861',10851,592.9,'America/Regina',3,'S4A','1124416742');
INSERT INTO `canadacities` VALUES ('South Dundas','South Dundas','ON','Ontario','44.9167','-75.2667',10833,20.8,'America/Toronto',3,'K0C K0E','1124001404');
INSERT INTO `canadacities` VALUES ('Lambton Shores','Lambton Shores','ON','Ontario','43.1833','-81.9000',10631,32.1,'America/Toronto',3,'N0M N0N','1124001891');
INSERT INTO `canadacities` VALUES ('North Dumfries','North Dumfries','ON','Ontario','43.3200','-80.3800',10619,56.5,'America/Toronto',3,'N0B N1R','1124000802');
INSERT INTO `canadacities` VALUES ('Martensville','Martensville','SK','Saskatchewan','52.2897','-106.6667',10549,777.9,'America/Regina',3,'S0K','1124000654');
INSERT INTO `canadacities` VALUES ('Mapleton','Mapleton','ON','Ontario','43.7358','-80.6681',10527,19.7,'America/Toronto',3,'N0G N0B','1124000835');
INSERT INTO `canadacities` VALUES ('Rawdon','Rawdon','QC','Quebec','46.0500','-73.7167',10416,55.7,'America/Toronto',3,'J0K','1124084263');
INSERT INTO `canadacities` VALUES ('Morinville','Morinville','AB','Alberta','53.8022','-113.6497',10385,931,'America/Edmonton',3,'T8R','1124322535');
INSERT INTO `canadacities` VALUES ('Blackfalds','Blackfalds','AB','Alberta','52.3833','-113.8000',10315,567.3,'America/Edmonton',3,'T0M T4M','1124056144');
INSERT INTO `canadacities` VALUES ('Chester','Chester','NS','Nova Scotia','44.6500','-64.3000',10310,9.2,'America/Halifax',3,'B0J','1124772236');
INSERT INTO `canadacities` VALUES ('Queens','Queens','NS','Nova Scotia','44.0333','-64.7167',10307,4.3,'America/Halifax',3,'B0T','1124001652');
INSERT INTO `canadacities` VALUES ('Selkirk','Selkirk','MB','Manitoba','50.1436','-96.8839',10278,413.4,'America/Winnipeg',3,'R1A','1124499880');
INSERT INTO `canadacities` VALUES ('Saint-Félicien','Saint-Felicien','QC','Quebec','48.6500','-72.4500',10278,28.3,'America/Toronto',3,'G8K','1124555496');
INSERT INTO `canadacities` VALUES ('Roberval','Roberval','QC','Quebec','48.5200','-72.2300',10227,66.8,'America/Toronto',3,'G8H','1124395055');
INSERT INTO `canadacities` VALUES ('Rideau Lakes','Rideau Lakes','ON','Ontario','44.6667','-76.2167',10207,14,'America/Toronto',3,'K7A K0E K0G','1124000369');
INSERT INTO `canadacities` VALUES ('Sechelt','Sechelt','BC','British Columbia','49.4742','-123.7542',10200,212.9,'America/Vancouver',3,'V0N','1124845591');
INSERT INTO `canadacities` VALUES ('Bois-des-Filion','Bois-des-Filion','QC','Quebec','45.6667','-73.7500',10159,2327.8,'America/Toronto',2,'J6Z','1124978470');
INSERT INTO `canadacities` VALUES ('North Glengarry','North Glengarry','ON','Ontario','45.3333','-74.7333',10109,15.7,'America/Toronto',3,'K0B K0C','1124000836');
INSERT INTO `canadacities` VALUES ('South Huron','South Huron','ON','Ontario','43.3200','-81.5000',10096,23.4,'America/Toronto',3,'N0M N0K','1124000910');
INSERT INTO `canadacities` VALUES ('Marieville','Marieville','QC','Quebec','45.4333','-73.1667',10094,160.8,'America/Toronto',3,'J3M','1124834229');
INSERT INTO `canadacities` VALUES ('Penetanguishene','Penetanguishene','ON','Ontario','44.7667','-79.9333',10077,396.4,'America/Toronto',3,'L9M','1124304117');
INSERT INTO `canadacities` VALUES ('Tay','Tay','ON','Ontario','44.7167','-79.7667',10033,72.1,'America/Toronto',3,'L0K L4R','1124001057');
INSERT INTO `canadacities` VALUES ('Castlegar','Castlegar','BC','British Columbia','49.3256','-117.6661',10029,408.6,'America/Vancouver',3,'V1N','1124379972');
INSERT INTO `canadacities` VALUES ('Cavan Monaghan','Cavan Monaghan','ON','Ontario','44.2000','-78.4667',10016,32.7,'America/Toronto',3,'L0A K0L','1124001281');
INSERT INTO `canadacities` VALUES ('Morden','Morden','MB','Manitoba','49.1919','-98.1006',9929,609.6,'America/Winnipeg',3,'R6M','1124327817');
INSERT INTO `canadacities` VALUES ('Temiskaming Shores','Temiskaming Shores','ON','Ontario','47.5167','-79.6833',9920,55.7,'America/Toronto',3,'P0J','1124001880');
INSERT INTO `canadacities` VALUES ('Hinton','Hinton','AB','Alberta','53.4114','-117.5639',9882,294.8,'America/Edmonton',3,'T7V','1124131074');
INSERT INTO `canadacities` VALUES ('Saint-Sauveur','Saint-Sauveur','QC','Quebec','45.9000','-74.1700',9881,206.8,'America/Toronto',3,'J0R','1124720935');
INSERT INTO `canadacities` VALUES ('Grey Highlands','Grey Highlands','ON','Ontario','44.3333','-80.5000',9804,11.1,'America/Toronto',3,'N4L N0C','1124000119');
INSERT INTO `canadacities` VALUES ('East St. Paul','East St. Paul','MB','Manitoba','49.9772','-97.0103',9725,232.7,'America/Winnipeg',3,'R2E','1124000695');
INSERT INTO `canadacities` VALUES ('Stoneham-et-Tewkesbury','Stoneham-et-Tewkesbury','QC','Quebec','47.1667','-71.4333',9682,14.5,'America/Toronto',3,'G3C','1124000439');
INSERT INTO `canadacities` VALUES ('Alfred and Plantagenet','Alfred and Plantagenet','ON','Ontario','45.5667','-74.9167',9680,24.7,'America/Toronto',3,'K0B','1124001813');
INSERT INTO `canadacities` VALUES ('Mont-Tremblant','Mont-Tremblant','QC','Quebec','46.1167','-74.6000',9646,40.5,'America/Toronto',3,'J8E','1124041173');
INSERT INTO `canadacities` VALUES ('Saint-Zotique','Saint-Zotique','QC','Quebec','45.2500','-74.2500',9618,384,'America/Toronto',3,'J0P','1124170824');
INSERT INTO `canadacities` VALUES ('Saint-Raymond','Saint-Raymond','QC','Quebec','46.9000','-71.8333',9615,14.3,'America/Toronto',3,'G3L','1124162305');
INSERT INTO `canadacities` VALUES ('Gibsons','Gibsons','BC','British Columbia','49.4028','-123.5036',9603,1066,'America/Vancouver',3,'V0N','1124342069');
INSERT INTO `canadacities` VALUES ('Amherst','Amherst','NS','Nova Scotia','45.8167','-64.2167',9548,779.7,'America/Halifax',3,'B4H','1124895094');
INSERT INTO `canadacities` VALUES ('Elizabethtown-Kitley','Elizabethtown-Kitley','ON','Ontario','44.7000','-75.8833',9545,17.2,'America/Toronto',3,'K6V K6T K0E K0G','1124001450');
INSERT INTO `canadacities` VALUES ('Smiths Falls','Smiths Falls','ON','Ontario','44.9000','-76.0167',9517,909.1,'America/Toronto',3,'K7A','1124233827');
INSERT INTO `canadacities` VALUES ('Lorraine','Lorraine','QC','Quebec','45.6833','-73.7833',9502,1609.9,'America/Toronto',3,'J6Z','1124001859');
INSERT INTO `canadacities` VALUES ('Ramara','Ramara','ON','Ontario','44.6333','-79.2167',9488,22.7,'America/Toronto',3,'L0K L3V','1124000641');
INSERT INTO `canadacities` VALUES ('Notre-Dame-des-Prairies','Notre-Dame-des-Prairies','QC','Quebec','46.0500','-73.4333',9471,523.2,'America/Toronto',3,'J6E','1124001393');
INSERT INTO `canadacities` VALUES ('Leeds and the Thousand Islands','Leeds and the Thousand Islands','ON','Ontario','44.4500','-76.0800',9465,15.1,'America/Toronto',3,'K7G K0E','1124000531');
INSERT INTO `canadacities` VALUES ('Brockton','Brockton','ON','Ontario','44.1667','-81.2167',9461,16.7,'America/Toronto',3,'N0G','1124000713');
INSERT INTO `canadacities` VALUES ('Laurentian Valley','Laurentian Valley','ON','Ontario','45.7681','-77.2239',9450,17.5,'America/Toronto',3,'K8A K8B','1124000736');
INSERT INTO `canadacities` VALUES ('Mono','Mono','ON','Ontario','44.0167','-80.0667',9421,33.8,'America/Toronto',3,'L9V L9W','1124001904');
INSERT INTO `canadacities` VALUES ('Sainte-Julienne','Sainte-Julienne','QC','Quebec','45.9700','-73.7200',9331,94,'America/Toronto',3,'J0K','1124086540');
INSERT INTO `canadacities` VALUES ('Qualicum Beach','Qualicum Beach','BC','British Columbia','49.3500','-124.4333',9303,517.5,'America/Vancouver',3,'V9K','1124822520');
INSERT INTO `canadacities` VALUES ('Malahide','Malahide','ON','Ontario','42.7928','-80.9361',9292,23.5,'America/Toronto',3,'N5H N0L','1124001777');
INSERT INTO `canadacities` VALUES ('Oromocto','Oromocto','NB','New Brunswick','45.8488','-66.4788',9223,411,'America/Moncton',3,'E2V','1124928183');
INSERT INTO `canadacities` VALUES ('Whitecourt','Whitecourt','AB','Alberta','54.1417','-115.6833',9195,386,'America/Edmonton',3,'T7S','1124641551');
INSERT INTO `canadacities` VALUES ('Olds','Olds','AB','Alberta','51.7928','-114.1067',9184,615.3,'America/Edmonton',3,'T4H','1124330412');
INSERT INTO `canadacities` VALUES ('Huron East','Huron East','ON','Ontario','43.6300','-81.2800',9138,13.8,'America/Toronto',3,'N4W N0M N0K N0G','1124000724');
INSERT INTO `canadacities` VALUES ('Beckwith','Beckwith','ON','Ontario','45.0833','-76.0667',9021,37.7,'America/Toronto',3,'K7A K7C K0A','1124000163');
INSERT INTO `canadacities` VALUES ('Labrador City','Labrador City','NL','Newfoundland and Labrador','52.9500','-66.9167',9011,186,'America/Goose_Bay',3,'A2V','1124000773');
INSERT INTO `canadacities` VALUES ('Shelburne','Shelburne','ON','Ontario','44.0833','-80.2000',8989,907.1,'America/Toronto',3,'L9V','1124470888');
INSERT INTO `canadacities` VALUES ('Stanley','Stanley','MB','Manitoba','49.1331','-98.0656',8981,10.8,'America/Winnipeg',3,'R6M R6W','1124001503');
INSERT INTO `canadacities` VALUES ('Taber','Taber','AB','Alberta','49.7847','-112.1508',8978,537.9,'America/Edmonton',3,'T1G','1124113583');
INSERT INTO `canadacities` VALUES ('Donnacona','Donnacona','QC','Quebec','46.6747','-71.7294',8952,357.6,'America/Toronto',3,'G3M','1124002794');
INSERT INTO `canadacities` VALUES ('Corman Park No. 344','Corman Park No. 344','SK','Saskatchewan','52.2291','-106.8002',8909,4.7,'America/Regina',4,'S0K S7K S7P S7T','1124000077');
INSERT INTO `canadacities` VALUES ('L’Epiphanie','L''Epiphanie','QC','Quebec','45.8482664184978','-73.506054079174',8883,157,'America/Toronto',3,'J5X','1124599436');
INSERT INTO `canadacities` VALUES ('West Perth','West Perth','ON','Ontario','43.4700','-81.2000',8865,15.3,'America/Toronto',3,'N0K','1124001056');
INSERT INTO `canadacities` VALUES ('Campbellton','Campbellton','NB','New Brunswick','48.0050','-66.6731',8833,379.5,'America/Toronto',3,'E3N','1124336512');
INSERT INTO `canadacities` VALUES ('Bridgewater','Bridgewater','NS','Nova Scotia','44.3700','-64.5200',8790,625.9,'America/Halifax',3,'B4V','1124736310');
INSERT INTO `canadacities` VALUES ('Coaldale','Coaldale','AB','Alberta','49.7333','-112.6167',8771,645.9,'America/Edmonton',3,'T1M','1124989507');
INSERT INTO `canadacities` VALUES ('Pont-Rouge','Pont-Rouge','QC','Quebec','46.7500','-71.7000',8723,72,'America/Toronto',3,'G3H','1124608325');
INSERT INTO `canadacities` VALUES ('Champlain','Champlain','ON','Ontario','45.5333','-74.6500',8706,42,'America/Toronto',3,'K6A K0B','1124000537');
INSERT INTO `canadacities` VALUES ('Coaticook','Coaticook','QC','Quebec','45.1333','-71.8000',8698,39.6,'America/Toronto',3,'J1A','1124454176');
INSERT INTO `canadacities` VALUES ('Minto','Minto','ON','Ontario','43.9167','-80.8667',8671,28.8,'America/Toronto',3,'N0G','1124000198');
INSERT INTO `canadacities` VALUES ('La Pêche','La Peche','QC','Quebec','45.6833','-75.9833',8636,15,'America/Toronto',3,'J0X','1124001249');
INSERT INTO `canadacities` VALUES ('Shediac','Shediac','NB','New Brunswick','46.2167','-64.5333',8563,123.5,'America/Moncton',3,'E4P','1124770042');
INSERT INTO `canadacities` VALUES ('Otterburn Park','Otterburn Park','QC','Quebec','45.5333','-73.2167',8479,1578.2,'America/Toronto',3,'J3H','1124899409');
INSERT INTO `canadacities` VALUES ('Sainte-Brigitte-de-Laval','Sainte-Brigitte-de-Laval','QC','Quebec','47.0000','-71.2000',8468,78.1,'America/Toronto',3,'G0A','1124647754');
INSERT INTO `canadacities` VALUES ('Sainte-Catherine-de-la-Jacques-Cartier','Sainte-Catherine-de-la-Jacques-Cartier','QC','Quebec','46.8500','-71.6167',8442,69.9,'America/Toronto',3,'G3N','1124001417');
INSERT INTO `canadacities` VALUES ('South Bruce Peninsula','South Bruce Peninsula','ON','Ontario','44.7333','-81.2000',8416,15.8,'America/Toronto',3,'N0H','1124000114');
INSERT INTO `canadacities` VALUES ('Portugal Cove-St. Philip''s','Portugal Cove-St. Philip''s','NL','Newfoundland and Labrador','47.6272','-52.8506',8415,146.1,'America/St_Johns',3,'A1M','1124001559');
INSERT INTO `canadacities` VALUES ('Edson','Edson','AB','Alberta','53.5817','-116.4344',8414,283.1,'America/Edmonton',3,'T7E','1124553562');
INSERT INTO `canadacities` VALUES ('Renfrew','Renfrew','ON','Ontario','45.4717','-76.6831',8337,643.4,'America/Toronto',3,'K7V','1124652971');
INSERT INTO `canadacities` VALUES ('Farnham','Farnham','QC','Quebec','45.2833','-72.9833',8330,90.5,'America/Toronto',3,'J2N','1124553013');
INSERT INTO `canadacities` VALUES ('Delson','Delson','QC','Quebec','45.3700','-73.5500',8328,1089.6,'America/Toronto',3,'J5B','1124405717');
INSERT INTO `canadacities` VALUES ('Plympton-Wyoming','Plympton-Wyoming','ON','Ontario','43.0167','-82.0833',8308,26.1,'America/Toronto',3,'N0N','1124001273');
INSERT INTO `canadacities` VALUES ('Banff','Banff','AB','Alberta','51.1781','-115.5719',8305,1646,'America/Edmonton',3,'T1L','1124351648');
INSERT INTO `canadacities` VALUES ('Kapuskasing','Kapuskasing','ON','Ontario','49.4167','-82.4333',8292,98.3,'America/Toronto',3,'P5N','1124764245');
INSERT INTO `canadacities` VALUES ('La Malbaie','La Malbaie','QC','Quebec','47.6500','-70.1500',8271,18,'America/Toronto',3,'G5A','1124466004');
INSERT INTO `canadacities` VALUES ('Boischatel','Boischatel','QC','Quebec','46.9000','-71.1500',8231,404.3,'America/Toronto',3,'G0A','1124332563');
INSERT INTO `canadacities` VALUES ('Beauport','Beauport','QC','Quebec','46.9667','-71.3000',8164,132.2,'America/Toronto',3,'G3B','1124715267');
INSERT INTO `canadacities` VALUES ('Zorra','Zorra','ON','Ontario','43.1500','-80.9500',8138,15.4,'America/Toronto',3,'N5C N0M N0J','1124000608');
INSERT INTO `canadacities` VALUES ('Kitimat','Kitimat','BC','British Columbia','54.0000','-128.7000',8131,34.7,'America/Vancouver',3,'V8C','1124198272');
INSERT INTO `canadacities` VALUES ('Macdonald','Macdonald','MB','Manitoba','49.6725','-97.4472',8120,7,'America/Winnipeg',3,'R4G R0G','1124000633');
INSERT INTO `canadacities` VALUES ('Happy Valley','Happy Valley','NL','Newfoundland and Labrador','53.3396','-60.4467',8109,26.5,'America/Goose_Bay',4,'A0P','1124879731');
INSERT INTO `canadacities` VALUES ('Saint-Hippolyte','Saint-Hippolyte','QC','Quebec','45.9300','-74.0200',8083,67,'America/Toronto',3,'J8A','1124001758');
INSERT INTO `canadacities` VALUES ('Dauphin','Dauphin','MB','Manitoba','51.1992','-100.0633',8034,670.7,'America/Winnipeg',3,'R7N','1124144510');
INSERT INTO `canadacities` VALUES ('Church Point','Church Point','NS','Nova Scotia','44.3333','-66.1167',8018,9.4,'America/Halifax',3,'B0W','1124316445');
INSERT INTO `canadacities` VALUES ('Old Chelsea','Old Chelsea','QC','Quebec','45.5000','-75.7833',8000,71,'America/Toronto',3,'J9B','1124835028');
INSERT INTO `canadacities` VALUES ('Drumheller','Drumheller','AB','Alberta','51.4636','-112.7194',7982,73.9,'America/Edmonton',3,'T0J','1124745292');
INSERT INTO `canadacities` VALUES ('Kirkland Lake','Kirkland Lake','ON','Ontario','48.1500','-80.0333',7981,30.4,'America/Toronto',3,'P0K P2N','1124683504');
INSERT INTO `canadacities` VALUES ('Aylmer','Aylmer','ON','Ontario','42.7667','-80.9833',7975,1197.6,'America/Toronto',3,'N5H','1124964102');
INSERT INTO `canadacities` VALUES ('Saint-Apollinaire','Saint-Apollinaire','QC','Quebec','46.6167','-71.5167',7968,82.3,'America/Toronto',3,'G0S','1124951601');
INSERT INTO `canadacities` VALUES ('Puslinch','Puslinch','ON','Ontario','43.4500','-80.1667',7944,37,'America/Toronto',3,'N3C N0B N1H','1124129947');
INSERT INTO `canadacities` VALUES ('Argyle','Argyle','NS','Nova Scotia','43.8000','-65.8500',7899,5.2,'America/Halifax',3,'B0W','1124503052');
INSERT INTO `canadacities` VALUES ('Torbay','Torbay','NL','Newfoundland and Labrador','47.6500','-52.7333',7852,225,'America/St_Johns',3,'A1K','1124406642');
INSERT INTO `canadacities` VALUES ('Yarmouth','Yarmouth','NS','Nova Scotia','43.8361','-66.1175',7848,616.9,'America/Halifax',3,'B5A','1124983867');
INSERT INTO `canadacities` VALUES ('Innisfail','Innisfail','AB','Alberta','52.0333','-113.9500',7847,404.6,'America/Edmonton',3,'T4G','1124612670');
INSERT INTO `canadacities` VALUES ('Nicolet','Nicolet','QC','Quebec','46.2167','-72.6167',7828,81.5,'America/Toronto',3,'J3T','1124746363');
INSERT INTO `canadacities` VALUES ('Rockwood','Rockwood','MB','Manitoba','50.2856','-97.2869',7823,6.5,'America/Winnipeg',3,'R0C','1124000435');
INSERT INTO `canadacities` VALUES ('Drummond/North Elmsley','Drummond/North Elmsley','ON','Ontario','44.9667','-76.2000',7773,21.2,'America/Toronto',3,'K7A K7C K7H K0G','1124001787');
INSERT INTO `canadacities` VALUES ('Contrecoeur','Contrecoeur','QC','Quebec','45.8500','-73.2333',7768,102.2,'America/Toronto',3,'J0L','1124384220');
INSERT INTO `canadacities` VALUES ('Hanover','Hanover','ON','Ontario','44.1500','-81.0333',7761,763.8,'America/Toronto',3,'N4N','1124868817');
INSERT INTO `canadacities` VALUES ('Dryden','Dryden','ON','Ontario','49.7833','-92.8333',7749,117.1,'America/Winnipeg',3,'P8N','1124295097');
INSERT INTO `canadacities` VALUES ('Iqaluit','Iqaluit','NU','Nunavut','63.7598','-68.5107',7740,147.4,'America/Iqaluit',4,'X0A','1124379539');
INSERT INTO `canadacities` VALUES ('Fort Frances','Fort Frances','ON','Ontario','48.6167','-93.4000',7739,303.4,'America/Winnipeg',3,'P9A','1124939714');
INSERT INTO `canadacities` VALUES ('Goderich','Goderich','ON','Ontario','43.7333','-81.7000',7728,882.8,'America/Toronto',3,'N7A','1124989247');
INSERT INTO `canadacities` VALUES ('La Sarre','La Sarre','QC','Quebec','48.8000','-79.2000',7719,51.9,'America/Toronto',3,'J9Z','1124902252');
INSERT INTO `canadacities` VALUES ('Chandler','Chandler','QC','Quebec','48.3500','-64.6833',7703,18.4,'America/Toronto',3,'G0C','1124111932');
INSERT INTO `canadacities` VALUES ('Stone Mills','Stone Mills','ON','Ontario','44.4500','-76.9167',7702,10.9,'America/Toronto',3,'K0K','1124000075');
INSERT INTO `canadacities` VALUES ('South-West Oxford','South-West Oxford','ON','Ontario','42.9500','-80.8000',7664,20.7,'America/Toronto',3,'N4S N4G N5C N0L N0J','1124000210');
INSERT INTO `canadacities` VALUES ('Acton Vale','Acton Vale','QC','Quebec','45.6500','-72.5667',7664,84.2,'America/Toronto',3,'J0H','1124864792');
INSERT INTO `canadacities` VALUES ('Douro-Dummer','Douro-Dummer','ON','Ontario','44.4500','-78.1000',7632,16.6,'America/Toronto',3,'K9J K0L','1124001679');
INSERT INTO `canadacities` VALUES ('Saint-Philippe','Saint-Philippe','QC','Quebec','45.3500','-73.4700',7597,122.6,'America/Toronto',3,'J0L','1124461923');
INSERT INTO `canadacities` VALUES ('McNab/Braeside','McNab/Braeside','ON','Ontario','45.4500','-76.5000',7591,29.7,'America/Toronto',3,'K7S K7V K0A','1124001458');
INSERT INTO `canadacities` VALUES ('Central Huron','Central Huron','ON','Ontario','43.6300','-81.5700',7576,16.9,'America/Toronto',3,'N0M N7A','1124001983');
INSERT INTO `canadacities` VALUES ('Rigaud','Rigaud','QC','Quebec','45.4833','-74.3000',7566,74.1,'America/Toronto',3,'J0P','1124176101');
INSERT INTO `canadacities` VALUES ('Louiseville','Louiseville','QC','Quebec','46.2500','-72.9500',7517,120.1,'America/Toronto',3,'J5V','1124866425');
INSERT INTO `canadacities` VALUES ('Chibougamau','Chibougamau','QC','Quebec','49.9167','-74.3667',7504,10.7,'America/Toronto',3,'G8P','1124650514');
INSERT INTO `canadacities` VALUES ('Coteau-du-Lac','Coteau-du-Lac','QC','Quebec','45.3000','-74.1800',7473,159.4,'America/Toronto',3,'J0P','1124000308');
INSERT INTO `canadacities` VALUES ('Ritchot','Ritchot','MB','Manitoba','49.6647','-97.1167',7469,22.5,'America/Winnipeg',3,'R5A R0A R0G','1124001990');
INSERT INTO `canadacities` VALUES ('Kimberley','Kimberley','BC','British Columbia','49.6697','-115.9775',7425,122.5,'America/Edmonton',3,'V1A','1124170837');
INSERT INTO `canadacities` VALUES ('Blandford-Blenheim','Blandford-Blenheim','ON','Ontario','43.2333','-80.6000',7399,19.4,'America/Toronto',3,'N0J','1124001001');
INSERT INTO `canadacities` VALUES ('Bayham','Bayham','ON','Ontario','42.7333','-80.7833',7396,30.2,'America/Toronto',3,'N5H N0J','1124000461');
INSERT INTO `canadacities` VALUES ('Augusta','Augusta','ON','Ontario','44.7511','-75.6003',7353,23.4,'America/Toronto',3,'K6V K0E K0G','1124000619');
INSERT INTO `canadacities` VALUES ('Stephenville','Stephenville','NL','Newfoundland and Labrador','48.5500','-58.5667',7344,185.6,'America/St_Johns',3,'A2N','1124000201');
INSERT INTO `canadacities` VALUES ('The Pas','The Pas','MB','Manitoba','53.8250','-101.2533',7302,115.3,'America/Winnipeg',3,'R9A R0B','1124755168');
INSERT INTO `canadacities` VALUES ('St. Marys','St. Marys','ON','Ontario','43.2583','-81.1333',7271,583.5,'America/Toronto',3,'N4X','1124438866');
INSERT INTO `canadacities` VALUES ('Saint-Rémi','Saint-Remi','QC','Quebec','45.2667','-73.6167',7265,92.2,'America/Toronto',3,'J0L','1124638080');
INSERT INTO `canadacities` VALUES ('Drayton Valley','Drayton Valley','AB','Alberta','53.2222','-114.9769',7235,235.5,'America/Edmonton',3,'T7A','1124814220');
INSERT INTO `canadacities` VALUES ('Ponoka','Ponoka','AB','Alberta','52.6833','-113.5667',7229,417.1,'America/Edmonton',3,'T4J','1124308190');
INSERT INTO `canadacities` VALUES ('Southgate','Southgate','ON','Ontario','44.1000','-80.5833',7190,11.4,'America/Toronto',3,'N0G N0C','1124000656');
INSERT INTO `canadacities` VALUES ('Les Cèdres','Les Cedres','QC','Quebec','45.3000','-74.0500',7184,92.5,'America/Toronto',3,'J7T','1124051098');
INSERT INTO `canadacities` VALUES ('Baie-Saint-Paul','Baie-Saint-Paul','QC','Quebec','47.4500','-70.5000',7146,13.1,'America/Toronto',3,'G3Z','1124415452');
INSERT INTO `canadacities` VALUES ('Merritt','Merritt','BC','British Columbia','50.1128','-120.7897',7139,273.9,'America/Vancouver',3,'V1K','1124550302');
INSERT INTO `canadacities` VALUES ('Bluewater','Bluewater','ON','Ontario','43.4500','-81.6000',7136,17.1,'America/Toronto',3,'N0M','1124000066');
INSERT INTO `canadacities` VALUES ('East Zorra-Tavistock','East Zorra-Tavistock','ON','Ontario','43.2333','-80.7833',7129,29.4,'America/Toronto',3,'N4S N0J N0B','1124000189');
INSERT INTO `canadacities` VALUES ('Brownsburg','Brownsburg','QC','Quebec','45.6703','-74.4467',7122,28.8,'America/Toronto',4,'J8G','1124023263');
INSERT INTO `canadacities` VALUES ('Asbestos','Asbestos','QC','Quebec','45.7667','-71.9333',7096,239.1,'America/Toronto',3,'J1T','1124583779');
INSERT INTO `canadacities` VALUES ('Otonabee-South Monaghan','Otonabee-South Monaghan','ON','Ontario','44.2333','-78.2333',7087,20.5,'America/Toronto',3,'K9J K0L','1124000517');
INSERT INTO `canadacities` VALUES ('Huron-Kinloss','Huron-Kinloss','ON','Ontario','44.0500','-81.5333',7069,16,'America/Toronto',3,'N2Z N0G','1124000614');
INSERT INTO `canadacities` VALUES ('Hampstead','Hampstead','QC','Quebec','45.4833','-73.6333',7037,3922.1,'America/Toronto',2,'H3X','1124000763');
INSERT INTO `canadacities` VALUES ('Saint-Joseph-du-Lac','Saint-Joseph-du-Lac','QC','Quebec','45.5333','-74.0000',7031,170.6,'America/Toronto',3,'J0N','1124001195');
INSERT INTO `canadacities` VALUES ('Plessisville','Plessisville','QC','Quebec','46.2167','-71.7833',7028,1546,'America/Toronto',3,'G6L','1124223899');
INSERT INTO `canadacities` VALUES ('The Blue Mountains','The Blue Mountains','ON','Ontario','44.4833','-80.3833',7025,24.5,'America/Toronto',3,'L9Y N0H','1124000370');
INSERT INTO `canadacities` VALUES ('Whitewater Region','Whitewater Region','ON','Ontario','45.7167','-76.8333',7009,13,'America/Toronto',3,'K0J','1124001363');
INSERT INTO `canadacities` VALUES ('Edwardsburgh/Cardinal','Edwardsburgh/Cardinal','ON','Ontario','44.8333','-75.5000',6959,22.3,'America/Toronto',3,'K0E','1124001736');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-des-Monts','Sainte-Anne-des-Monts','QC','Quebec','49.1333','-66.5000',6933,26.3,'America/Toronto',3,'G4V','1124183859');
INSERT INTO `canadacities` VALUES ('Bay Roberts','Bay Roberts','NL','Newfoundland and Labrador','47.5847','-53.2783',6897,249.9,'America/St_Johns',3,'A0A','1124372298');
INSERT INTO `canadacities` VALUES ('Wainfleet','Wainfleet','ON','Ontario','42.9250','-79.3750',6887,31.7,'America/Toronto',3,'L0S L0R L3B L3K','1124538125');
INSERT INTO `canadacities` VALUES ('North Stormont','North Stormont','ON','Ontario','45.2167','-75.0000',6873,13.3,'America/Toronto',3,'K0A K0C','1124000261');
INSERT INTO `canadacities` VALUES ('Alnwick/Haldimand','Alnwick/Haldimand','ON','Ontario','44.0833','-78.0333',6869,17.25,'America/Toronto',3,'K9A K0K','1124000698');
INSERT INTO `canadacities` VALUES ('Peace River','Peace River','AB','Alberta','56.2339','-117.2897',6842,260.6,'America/Edmonton',3,'T8S','1124941936');
INSERT INTO `canadacities` VALUES ('Saint-Lambert-de-Lauzon','Saint-Lambert-de-Lauzon','QC','Quebec','46.5865','-71.2271',6817,63.9,'America/Toronto',4,'G0S','1124610423');
INSERT INTO `canadacities` VALUES ('Arran-Elderslie','Arran-Elderslie','ON','Ontario','44.4000','-81.2000',6803,14.8,'America/Toronto',3,'N0H N0G','1124001766');
INSERT INTO `canadacities` VALUES ('Parry Sound','Parry Sound','ON','Ontario','45.3333','-80.0333',6788,478.2,'America/Toronto',3,'P2A','1124245809');
INSERT INTO `canadacities` VALUES ('Val-Shefford','Val-Shefford','QC','Quebec','45.3500','-72.5667',6711,56.7,'America/Toronto',3,'J2M','1124787548');
INSERT INTO `canadacities` VALUES ('West St. Paul','West St. Paul','MB','Manitoba','50.0119','-97.1150',6682,76.4,'America/Winnipeg',3,'R4A R2V','1124001136');
INSERT INTO `canadacities` VALUES ('Slave Lake','Slave Lake','AB','Alberta','55.2853','-114.7706',6651,460.5,'America/Edmonton',3,'T0G','1124106662');
INSERT INTO `canadacities` VALUES ('Port-Cartier','Port-Cartier','QC','Quebec','50.0333','-66.8667',6651,6,'America/Toronto',3,'G5B G0H','1124795368');
INSERT INTO `canadacities` VALUES ('Barrington','Barrington','NS','Nova Scotia','43.5646','-65.5639',6646,10.5,'America/Halifax',3,'B0W','1124548310');
INSERT INTO `canadacities` VALUES ('Rocky Mountain House','Rocky Mountain House','AB','Alberta','52.3753','-114.9217',6635,521.8,'America/Edmonton',3,'T4T','1124203206');
INSERT INTO `canadacities` VALUES ('Muskoka Falls','Muskoka Falls','ON','Ontario','45.1264','-79.5580',6588,8.3,'America/Toronto',4,'P0C P0B P1L P1P','1124955753');
INSERT INTO `canadacities` VALUES ('Cornwall','Cornwall','PE','Prince Edward Island','46.2407','-63.2009',6574,233,'America/Halifax',3,'C0A','1124001245');
INSERT INTO `canadacities` VALUES ('Saint-Paul','Saint-Paul','QC','Quebec','45.9833','-73.4500',6566,133.7,'America/Toronto',3,'J0K','1124001817');
INSERT INTO `canadacities` VALUES ('Devon','Devon','AB','Alberta','53.3633','-113.7322',6545,459.1,'America/Edmonton',3,'T9G','1124268366');
INSERT INTO `canadacities` VALUES ('Perth','Perth','ON','Ontario','44.9000','-76.2500',6486,484.1,'America/Toronto',3,'K7H','1124732094');
INSERT INTO `canadacities` VALUES ('Wainwright','Wainwright','AB','Alberta','52.8333','-110.8667',6461,688.7,'America/Edmonton',3,'T9W','1124385336');
INSERT INTO `canadacities` VALUES ('Shannon','Shannon','QC','Quebec','46.8833','-71.5167',6432,101.2,'America/Toronto',3,'G3S','1124440867');
INSERT INTO `canadacities` VALUES ('Saint-Honoré','Saint-Honore','QC','Quebec','48.5333','-71.0833',6376,33.7,'America/Toronto',4,'G0V','1124504668');
INSERT INTO `canadacities` VALUES ('Beaubassin East / Beaubassin-est','Beaubassin East / Beaubassin-est','NB','New Brunswick','46.1726','-64.3122',6376,21.9,'America/Moncton',3,'E4P E4N','1124000427');
INSERT INTO `canadacities` VALUES ('Bonnyville','Bonnyville','AB','Alberta','54.2667','-110.7500',6359,421.4,'America/Edmonton',3,'T9N','1124166469');
INSERT INTO `canadacities` VALUES ('Cramahe','Cramahe','ON','Ontario','44.0833','-77.8833',6355,31.4,'America/Toronto',3,'K0K','1124000879');
INSERT INTO `canadacities` VALUES ('Beauceville','Beauceville','QC','Quebec','46.2000','-70.7833',6354,37.9,'America/Toronto',3,'G5X','1124575286');
INSERT INTO `canadacities` VALUES ('North Middlesex','North Middlesex','ON','Ontario','43.1500','-81.6333',6352,10.6,'America/Toronto',3,'N0M','1124001914');
INSERT INTO `canadacities` VALUES ('Beaupré','Beaupre','QC','Quebec','47.0500','-70.9000',6342,163.4,'America/Toronto',3,'G0A','1124125524');
INSERT INTO `canadacities` VALUES ('Charlemagne','Charlemagne','QC','Quebec','45.7167','-73.4833',6302,2906.2,'America/Toronto',2,'J5Z','1124185024');
INSERT INTO `canadacities` VALUES ('Kent','Kent','BC','British Columbia','49.2833','-121.7500',6300,37.4,'America/Vancouver',3,'V0M','1124001999');
INSERT INTO `canadacities` VALUES ('Clarenville','Clarenville','NL','Newfoundland and Labrador','48.1566','-53.9650',6291,44.7,'America/St_Johns',3,'A5A','1124924217');
INSERT INTO `canadacities` VALUES ('Mont-Joli','Mont-Joli','QC','Quebec','48.5800','-68.1800',6281,272.6,'America/Toronto',3,'G5H','1124642037');
INSERT INTO `canadacities` VALUES ('Pointe-Calumet','Pointe-Calumet','QC','Quebec','45.5000','-73.9700',6281,1367.7,'America/Toronto',3,'J0N','1124629762');
INSERT INTO `canadacities` VALUES ('Dysart et al','Dysart et al','ON','Ontario','45.20242','-78.4047',6280,4.2,'America/Toronto',4,'K0L K0M','1124000824');
INSERT INTO `canadacities` VALUES ('Carbonear','Carbonear','NL','Newfoundland and Labrador','47.7375','-53.2294',6235,411.5,'America/St_Johns',3,'A1Y','1124121214');
INSERT INTO `canadacities` VALUES ('Hope','Hope','BC','British Columbia','49.3858','-121.4419',6181,151,'America/Vancouver',3,'V0X','1124662863');
INSERT INTO `canadacities` VALUES ('Pontiac','Pontiac','QC','Quebec','45.5833','-76.1333',6142,13.8,'America/Toronto',3,'J0X','1124000248');
INSERT INTO `canadacities` VALUES ('L''Ange-Gardien','L''Ange-Gardien','QC','Quebec','45.5833','-75.4500',6102,28.2,'America/Toronto',3,'J8L','1124001197');
INSERT INTO `canadacities` VALUES ('Hindon Hill','Hindon Hill','ON','Ontario','44.9333','-78.7333',6088,6.9,'America/Toronto',3,'K0M','1124076260');
INSERT INTO `canadacities` VALUES ('La Broquerie','La Broquerie','MB','Manitoba','49.3994','-96.5103',6076,10.5,'America/Winnipeg',3,'R0A','1124000582');
INSERT INTO `canadacities` VALUES ('Tweed','Tweed','ON','Ontario','44.6000','-77.3333',6044,6.3,'America/Toronto',3,'K0K','1124220211');
INSERT INTO `canadacities` VALUES ('Oliver Paipoonge','Oliver Paipoonge','ON','Ontario','48.3900','-89.5200',6035,17.2,'America/Toronto',3,'P0T P7G P7J P7K','1124000729');
INSERT INTO `canadacities` VALUES ('Saint-Félix-de-Valois','Saint-Felix-de-Valois','QC','Quebec','46.1700','-73.4300',6029,68.6,'America/Toronto',3,'J0K','1124578689');
INSERT INTO `canadacities` VALUES ('Melfort','Melfort','SK','Saskatchewan','52.8564','-104.6100',5992,405.4,'America/Regina',3,'S0E','1124817334');
INSERT INTO `canadacities` VALUES ('Stettler','Stettler','AB','Alberta','52.3236','-112.7192',5952,453,'America/Edmonton',3,'T0C','1124010388');
INSERT INTO `canadacities` VALUES ('Niverville','Niverville','MB','Manitoba','49.6056','-97.0417',5947,683.7,'America/Winnipeg',3,'R0A','1124001529');
INSERT INTO `canadacities` VALUES ('McMasterville','McMasterville','QC','Quebec','45.5500','-73.2333',5936,1904,'America/Toronto',3,'J3G','1124000115');
INSERT INTO `canadacities` VALUES ('Douglas','Douglas','NB','New Brunswick','46.2819','-66.9420',5935,4.1,'America/Moncton',4,'E6L E6B E3G','1124000768');
INSERT INTO `canadacities` VALUES ('Saint-Calixte','Saint-Calixte','QC','Quebec','45.9500','-73.8500',5934,41.4,'America/Toronto',3,'J0K','1124001462');
INSERT INTO `canadacities` VALUES ('Lac-Mégantic','Lac-Megantic','QC','Quebec','45.5833','-70.8833',5932,272.5,'America/Toronto',3,'G6B','1124329615');
INSERT INTO `canadacities` VALUES ('Humboldt','Humboldt','SK','Saskatchewan','52.2019','-105.1231',5869,1783.4,'America/Regina',3,'S0K','1124147660');
INSERT INTO `canadacities` VALUES ('St. Paul','St. Paul','AB','Alberta','53.9928','-111.2972',5827,674.2,'America/Edmonton',3,'T0A','1124528022');
INSERT INTO `canadacities` VALUES ('Saint-Henri','Saint-Henri','QC','Quebec','46.7000','-71.0667',5813,47.4,'America/Toronto',4,'G0R','1124057702');
INSERT INTO `canadacities` VALUES ('Peachland','Peachland','BC','British Columbia','49.7736','-119.7369',5789,359.6,'America/Vancouver',3,'V0H','1124440160');
INSERT INTO `canadacities` VALUES ('Verchères','Vercheres','QC','Quebec','45.7833','-73.3500',5759,79.3,'America/Toronto',3,'J0L','1124549666');
INSERT INTO `canadacities` VALUES ('Richelieu','Richelieu','QC','Quebec','45.4500','-73.2500',5742,185.4,'America/Toronto',3,'J3L','1124000387');
INSERT INTO `canadacities` VALUES ('Petrolia','Petrolia','ON','Ontario','42.8833','-82.1417',5742,452.8,'America/Toronto',3,'N0N','1124479624');
INSERT INTO `canadacities` VALUES ('Southwest Middlesex','Southwest Middlesex','ON','Ontario','42.7500','-81.7000',5723,13.4,'America/Toronto',3,'N0L','1124000520');
INSERT INTO `canadacities` VALUES ('Front of Yonge','Front of Yonge','ON','Ontario','44.5333','-75.8667',5710,20.3,'America/Toronto',3,'K0E','1124001901');
INSERT INTO `canadacities` VALUES ('Oliver','Oliver','BC','British Columbia','49.1844','-119.5500',5708,896,'America/Vancouver',3,'V0H','1124145879');
INSERT INTO `canadacities` VALUES ('Vegreville','Vegreville','AB','Alberta','53.4928','-112.0522',5708,405.4,'America/Edmonton',3,'T9C','1124534321');
INSERT INTO `canadacities` VALUES ('Princeville','Princeville','QC','Quebec','46.1667','-71.8833',5693,29.3,'America/Toronto',4,'G6L','1124715340');
INSERT INTO `canadacities` VALUES ('Saint-Césaire','Saint-Cesaire','QC','Quebec','45.4167','-73.0000',5686,68.1,'America/Toronto',3,'J0L','1124948389');
INSERT INTO `canadacities` VALUES ('Tay Valley','Tay Valley','ON','Ontario','44.8667','-76.3833',5665,10.3,'America/Toronto',3,'K7H K0G K0H','1124000734');
INSERT INTO `canadacities` VALUES ('South Bruce','South Bruce','ON','Ontario','44.0333','-81.2000',5639,11.6,'America/Toronto',3,'N0G','1124001457');
INSERT INTO `canadacities` VALUES ('Antigonish','Antigonish','NS','Nova Scotia','45.6167','-61.9833',5620,871.7,'America/Glace_Bay',3,'B2G','1124839247');
INSERT INTO `canadacities` VALUES ('Crowsnest Pass','Crowsnest Pass','AB','Alberta','49.5955','-114.5136',5589,15,'America/Edmonton',4,'T0K','1124000595');
INSERT INTO `canadacities` VALUES ('Redcliff','Redcliff','AB','Alberta','50.0792','-110.7783',5581,345.5,'America/Edmonton',3,'T0J','1124603057');
INSERT INTO `canadacities` VALUES ('Val-David','Val-David','QC','Quebec','46.0300','-74.2200',5558,130.3,'America/Toronto',3,'J0T','1124707666');
INSERT INTO `canadacities` VALUES ('Fernie','Fernie','BC','British Columbia','49.5042','-115.0628',5519,388.8,'America/Edmonton',3,'V0B','1124927114');
INSERT INTO `canadacities` VALUES ('Windsor','Windsor','NS','Nova Scotia','44.9803','-64.1292',5514,400.6,'America/Halifax',3,NULL,'1124800737');
INSERT INTO `canadacities` VALUES ('Notre-Dame-du-Mont-Carmel','Notre-Dame-du-Mont-Carmel','QC','Quebec','46.4833','-72.6500',5467,42.6,'America/Toronto',3,'G0X','1124893320');
INSERT INTO `canadacities` VALUES ('Sainte-Martine','Sainte-Martine','QC','Quebec','45.2500','-73.8000',5461,86.4,'America/Toronto',3,'J0S','1124000017');
INSERT INTO `canadacities` VALUES ('Creston','Creston','BC','British Columbia','49.0900','-116.5100',5459,626.8,'America/Creston',3,'V0B','11242024302');
INSERT INTO `canadacities` VALUES ('Saint-Roch-de-l''Achigan','Saint-Roch-de-l''Achigan','QC','Quebec','45.8500','-73.6000',5453,68.1,'America/Toronto',3,'J0K','1124000365');
INSERT INTO `canadacities` VALUES ('Sussex','Sussex','NB','New Brunswick','45.7167','-65.5167',5447,478.3,'America/Moncton',3,'E5P E4E','1124362993');
INSERT INTO `canadacities` VALUES ('Saint-Pie','Saint-Pie','QC','Quebec','45.5000','-72.9000',5438,49.9,'America/Toronto',3,'J0H','1124508787');
INSERT INTO `canadacities` VALUES ('Ashfield-Colborne-Wawanosh','Ashfield-Colborne-Wawanosh','ON','Ontario','43.8667','-81.6000',5422,9.2,'America/Toronto',3,'N0M N0G N7A','1124000025');
INSERT INTO `canadacities` VALUES ('Trent Lakes','Trent Lakes','ON','Ontario','44.6667','-78.4333',5397,6.3,'America/Toronto',3,'K0L K0M','1124001268');
INSERT INTO `canadacities` VALUES ('Northern Rockies','Northern Rockies','BC','British Columbia','59.0000','-123.7500',5393,0.063,'America/Fort_Nelson',3,'V0C','1124001362');
INSERT INTO `canadacities` VALUES ('Gananoque','Gananoque','ON','Ontario','44.3300','-76.1700',5383,733.6,'America/Toronto',3,'K7G','1124349596');
INSERT INTO `canadacities` VALUES ('Windsor','Windsor','QC','Quebec','45.5667','-72.0000',5367,375.5,'America/Toronto',3,'J1S','1124798166');
INSERT INTO `canadacities` VALUES ('Smithers','Smithers','BC','British Columbia','54.7819','-127.1681',5351,514.9,'America/Vancouver',3,'V0J','1124191574');
INSERT INTO `canadacities` VALUES ('Tracadie','Tracadie','NB','New Brunswick','47.5143142815185','-64.918859562748',5349,217,'America/Moncton',3,'E1X','1124362021');
INSERT INTO `canadacities` VALUES ('Meadow Lake','Meadow Lake','SK','Saskatchewan','54.1242','-108.4358',5344,433.6,'America/Swift_Current',3,'S9X','1124434578');
INSERT INTO `canadacities` VALUES ('Lanark Highlands','Lanark Highlands','ON','Ontario','45.0880','-76.5170',5338,5.1,'America/Toronto',3,'K0A K0G','1124000887');
INSERT INTO `canadacities` VALUES ('Sackville','Sackville','NB','New Brunswick','45.9000','-64.3667',5331,71.9,'America/Moncton',3,'E4L','1124877244');
INSERT INTO `canadacities` VALUES ('Grand Falls','Grand Falls','NB','New Brunswick','47.0344','-67.7394',5326,294.4,'America/Moncton',3,'E3Z','1124904843');
INSERT INTO `canadacities` VALUES ('Armstrong','Armstrong','BC','British Columbia','50.4483','-119.1961',5323,927.7,'America/Vancouver',3,'V0E','1124201947');
INSERT INTO `canadacities` VALUES ('Cochrane','Cochrane','ON','Ontario','49.0667','-81.0167',5321,9.9,'America/Toronto',3,'P0L','1124296729');
INSERT INTO `canadacities` VALUES ('La Ronge','La Ronge','SK','Saskatchewan','55.1000','-105.3000',5317,163.9,'America/Regina',3,'S0J','1124763455');
INSERT INTO `canadacities` VALUES ('Marystown','Marystown','NL','Newfoundland and Labrador','47.1667','-55.1667',5316,85.8,'America/St_Johns',3,'A0E','1124408131');
INSERT INTO `canadacities` VALUES ('Sioux Lookout','Sioux Lookout','ON','Ontario','50.1000','-91.9167',5272,13.9,'America/Winnipeg',3,'P0V P8T','1124804545');
INSERT INTO `canadacities` VALUES ('Didsbury','Didsbury','AB','Alberta','51.6658','-114.1311',5268,321.7,'America/Edmonton',3,'T0M','1124574154');
INSERT INTO `canadacities` VALUES ('Deer Lake','Deer Lake','NL','Newfoundland and Labrador','49.1744','-57.4269',5249,71.7,'America/St_Johns',3,'A8A','1124841556');
INSERT INTO `canadacities` VALUES ('Woodstock','Woodstock','NB','New Brunswick','46.1522','-67.5983',5228,356.7,'America/Moncton',3,'E7M','1124035280');
INSERT INTO `canadacities` VALUES ('Flin Flon','Flin Flon','SK','Saskatchewan','54.7667','-101.8778',5185,448.9,'America/Winnipeg',3,'S0P','1124500458');
INSERT INTO `canadacities` VALUES ('Brokenhead','Brokenhead','MB','Manitoba','50.1428','-96.5319',5122,6.8,'America/Winnipeg',3,'R0E','1124000321');
INSERT INTO `canadacities` VALUES ('Burton','Burton','NB','New Brunswick','45.8009','-66.4066',5119,19.8,'America/Moncton',4,'E2V','1124000544');
INSERT INTO `canadacities` VALUES ('Spallumcheen','Spallumcheen','BC','British Columbia','50.4462','-119.2121',5106,20,'America/Vancouver',4,'V0E','1124001340');
INSERT INTO `canadacities` VALUES ('Westlock','Westlock','AB','Alberta','54.1522','-113.8511',5101,381.4,'America/Edmonton',3,'T7P','1124037311');
INSERT INTO `canadacities` VALUES ('Témiscouata-sur-le-Lac','Temiscouata-sur-le-Lac','QC','Quebec','47.6800','-68.8800',5096,23.3,'America/Toronto',3,'G0L','1124001776');
INSERT INTO `canadacities` VALUES ('Osoyoos','Osoyoos','BC','British Columbia','49.0325','-119.4661',5085,598.2,'America/Vancouver',3,'V0H','1124713973');
INSERT INTO `canadacities` VALUES ('Saint Marys','Saint Marys','NB','New Brunswick','46.1748','-66.4897',5084,6.8,'America/Moncton',4,'E6C E3A','1124000221');
INSERT INTO `canadacities` VALUES ('Hearst','Hearst','ON','Ontario','49.6869','-83.6544',5070,51.5,'America/Toronto',3,'P0L','1124376843');
INSERT INTO `canadacities` VALUES ('Metchosin','Metchosin','BC','British Columbia','48.3819','-123.5378',5067,72.8,'America/Vancouver',3,'V9C','1124625175');
INSERT INTO `canadacities` VALUES ('Wolfville','Wolfville','NS','Nova Scotia','45.0833','-64.3667',5057,649.8,'America/Halifax',3,'B4P','1124909280');
INSERT INTO `canadacities` VALUES ('Breslau','Breslau','ON','Ontario','43.4816','-80.4080',5053,928.8,'America/Toronto',3,'N0B','1124001083');
INSERT INTO `canadacities` VALUES ('Stonewall','Stonewall','MB','Manitoba','50.1344','-97.3261',5046,802.8,'America/Winnipeg',3,'R0C','1124829875');
INSERT INTO `canadacities` VALUES ('Memramcook','Memramcook','NB','New Brunswick','46.0000','-64.5500',5029,26.9,'America/Moncton',3,'E4K','1124833147');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-Bellevue','Sainte-Anne-de-Bellevue','QC','Quebec','45.4039','-73.9525',5027,480.8,'America/Toronto',3,'H9X','1124418135');
INSERT INTO `canadacities` VALUES ('Stirling-Rawdon','Stirling-Rawdon','ON','Ontario','44.3667','-77.5917',5015,17.8,'America/Toronto',3,'K0K','1124001948');
INSERT INTO `canadacities` VALUES ('Mont-Orford','Mont-Orford','QC','Quebec','45.3661','-72.1838',5007,36.8,'America/Toronto',4,'J1X','1124618048');
INSERT INTO `canadacities` VALUES ('Ste. Anne','Ste. Anne','MB','Manitoba','49.6186','-96.5708',5003,10.5,'America/Winnipeg',4,'R5H R5G R0A R0E','1124000501');
INSERT INTO `canadacities` VALUES ('Espanola','Espanola','ON','Ontario','46.2500','-81.7667',4996,60.3,'America/Toronto',3,'P5E','1124133485');
INSERT INTO `canadacities` VALUES ('West Elgin','West Elgin','ON','Ontario','42.5833','-81.6667',4995,15.5,'America/Toronto',3,'N0L','1124000948');
INSERT INTO `canadacities` VALUES ('Flin Flon (Part)','Flin Flon (Part)','MB','Manitoba','54.7712','-101.8419',4982,359.2,'America/Winnipeg',3,'R8A','1124000122');
INSERT INTO `canadacities` VALUES ('Grand Bay-Westfield','Grand Bay-Westfield','NB','New Brunswick','45.3608','-66.2415',4967,83,'America/Moncton',3,'E5K','1124001504');
INSERT INTO `canadacities` VALUES ('East Ferris','East Ferris','ON','Ontario','46.2667','-79.3000',4946,32.6,'America/Toronto',3,'P0H','1124000523');
INSERT INTO `canadacities` VALUES ('Neepawa','Neepawa','MB','Manitoba','50.2289','-99.4656',4938,206.5,'America/Winnipeg',3,'R0J','1124375380');
INSERT INTO `canadacities` VALUES ('North Huron','North Huron','ON','Ontario','43.8300','-81.4200',4932,27.6,'America/Toronto',3,'N0G','1124001142');
INSERT INTO `canadacities` VALUES ('Saint-Germain-de-Grantham','Saint-Germain-de-Grantham','QC','Quebec','45.8333','-72.5667',4922,56.3,'America/Toronto',3,'J0C','1124972184');
INSERT INTO `canadacities` VALUES ('Saint-Cyrille-de-Wendover','Saint-Cyrille-de-Wendover','QC','Quebec','45.9333','-72.4333',4920,44.6,'America/Toronto',3,'J1Z','1124582350');
INSERT INTO `canadacities` VALUES ('Chisasibi','Chisasibi','QC','Quebec','53.6645','-78.7938',4872,5.9,'America/Toronto',4,'J0M','1124000072');
INSERT INTO `canadacities` VALUES ('Southwold','Southwold','ON','Ontario','42.7500','-81.3167',4851,16.1,'America/Toronto',3,'N5P N5L N0L','1124001461');
INSERT INTO `canadacities` VALUES ('Chertsey','Chertsey','QC','Quebec','46.1700','-73.9200',4836,16.8,'America/Toronto',3,'J0K','1124001234');
INSERT INTO `canadacities` VALUES ('Shippagan','Shippagan','NB','New Brunswick','47.8557','-64.6012',4800,23.1,'America/Moncton',4,'E8T E8S','1124001772');
INSERT INTO `canadacities` VALUES ('Lanoraie','Lanoraie','QC','Quebec','45.9667','-73.2167',4787,46.4,'America/Toronto',3,'J0K','1124453107');
INSERT INTO `canadacities` VALUES ('Centre Hastings','Centre Hastings','ON','Ontario','44.4167','-77.4417',4774,20.4,'America/Toronto',3,'K0K','1124000705');
INSERT INTO `canadacities` VALUES ('Coverdale','Coverdale','NB','New Brunswick','46.0003','-64.8859',4766,20.2,'America/Moncton',4,'E1J E4J','1124001531');
INSERT INTO `canadacities` VALUES ('Warwick','Warwick','QC','Quebec','45.9500','-71.9833',4766,43.3,'America/Toronto',3,'J0A','1124510688');
INSERT INTO `canadacities` VALUES ('Hanwell','Hanwell','NB','New Brunswick','45.8681','-66.7947',4743,31.2,'America/Moncton',3,'E3E E3C E3B','1124001405');
INSERT INTO `canadacities` VALUES ('Napierville','Napierville','QC','Quebec','45.1833','-73.4000',4740,796.6,'America/Toronto',3,'J0J','1124015883');
INSERT INTO `canadacities` VALUES ('Waterloo','Waterloo','QC','Quebec','45.3500','-72.5167',4727,360.2,'America/Toronto',3,'J0E','1124389471');
INSERT INTO `canadacities` VALUES ('Saint-Joseph-de-Beauce','Saint-Joseph-de-Beauce','QC','Quebec','46.3000','-70.8833',4722,42.6,'America/Toronto',3,'G0S','1124865207');
INSERT INTO `canadacities` VALUES ('White City','White City','SK','Saskatchewan','50.4353','-104.3572',4713,489.7,'America/Regina',3,'S4L','1124001289');
INSERT INTO `canadacities` VALUES ('Lucan Biddulph','Lucan Biddulph','ON','Ontario','43.2000','-81.3833',4700,27.8,'America/Toronto',3,'N0M','1124000469');
INSERT INTO `canadacities` VALUES ('Berthierville','Berthierville','QC','Quebec','46.0833','-73.1833',4677,596.8,'America/Toronto',3,'J0K','1124734495');
INSERT INTO `canadacities` VALUES ('Rivière-Rouge','Riviere-Rouge','QC','Quebec','46.4167','-74.8667',4645,10.2,'America/Toronto',3,'J0T','1124001720');
INSERT INTO `canadacities` VALUES ('Greenstone','Greenstone','ON','Ontario','50.0000','-86.7333',4636,1.7,'America/Toronto',3,'P0T','1124000068');
INSERT INTO `canadacities` VALUES ('Kindersley','Kindersley','SK','Saskatchewan','51.4678','-109.1567',4597,347.5,'America/Swift_Current',3,'S0L','1124343190');
INSERT INTO `canadacities` VALUES ('Saint-Denis-de-Brompton','Saint-Denis-de-Brompton','QC','Quebec','45.4500','-72.0833',4594,65.4,'America/Toronto',4,'J0B','1124001970');
INSERT INTO `canadacities` VALUES ('Jasper','Jasper','AB','Alberta','52.9013','-118.1312',4590,5,'America/Edmonton',4,'T0E','1124533812');
INSERT INTO `canadacities` VALUES ('Barrhead','Barrhead','AB','Alberta','54.1167','-114.4000',4579,560.4,'America/Edmonton',3,'T7N','1124181687');
INSERT INTO `canadacities` VALUES ('Melville','Melville','SK','Saskatchewan','50.9306','-102.8078',4562,307.8,'America/Regina',3,'S0A','1124823140');
INSERT INTO `canadacities` VALUES ('Amqui','Amqui','QC','Quebec','48.4667','-67.4333',4560,111.1,'America/Toronto',3,'G5J','1124681333');
INSERT INTO `canadacities` VALUES ('Saint-Mathias-sur-Richelieu','Saint-Mathias-sur-Richelieu','QC','Quebec','45.4667','-73.2667',4544,96.6,'America/Toronto',3,'J3L','1124000576');
INSERT INTO `canadacities` VALUES ('Tyendinaga','Tyendinaga','ON','Ontario','44.3000','-77.2000',4538,14.5,'America/Toronto',3,'K0K','1124000109');
INSERT INTO `canadacities` VALUES ('Iroquois Falls','Iroquois Falls','ON','Ontario','48.7667','-80.6667',4537,7.6,'America/Toronto',3,'P0K','1124652927');
INSERT INTO `canadacities` VALUES ('Havelock-Belmont-Methuen','Havelock-Belmont-Methuen','ON','Ontario','44.5667','-77.9000',4530,8.3,'America/Toronto',3,'K0L','1124001644');
INSERT INTO `canadacities` VALUES ('Cornwallis','Cornwallis','MB','Manitoba','49.7981','-99.8481',4520,9,'America/Winnipeg',3,'R7A R0K','1124000766');
INSERT INTO `canadacities` VALUES ('Saint-Boniface','Saint-Boniface','QC','Quebec','46.5000','-72.8167',4511,41.4,'America/Toronto',3,'G0X','1124000235');
INSERT INTO `canadacities` VALUES ('Westbank','Westbank','BC','British Columbia','49.8423','-119.6743',4491,101.7,'America/Vancouver',4,'V4T','1124001101');
INSERT INTO `canadacities` VALUES ('Edenwold No. 158','Edenwold No. 158','SK','Saskatchewan','50.5166','-104.3451',4466,5.3,'America/Regina',4,'S0G S4L','1124001180');
INSERT INTO `canadacities` VALUES ('Cumberland','Cumberland','BC','British Columbia','49.6206','-125.0261',4447,153.1,'America/Vancouver',3,'V0R','1124658693');
INSERT INTO `canadacities` VALUES ('Goulds','Goulds','NL','Newfoundland and Labrador','47.4517','-52.7647',4441,744.3,'America/St_Johns',3,'A1S','1124000955');
INSERT INTO `canadacities` VALUES ('Vanderhoof','Vanderhoof','BC','British Columbia','54.0143','-124.0089',4439,81,'America/Vancouver',3,'V0J','1124100075');
INSERT INTO `canadacities` VALUES ('Château-Richer','Chateau-Richer','QC','Quebec','46.9667','-71.0167',4425,19.3,'America/Toronto',3,'G0A','1124518769');
INSERT INTO `canadacities` VALUES ('Saint Stephen','Saint Stephen','NB','New Brunswick','45.2000','-67.2833',4415,326.6,'America/Moncton',3,'E3L','1124128038');
INSERT INTO `canadacities` VALUES ('Nipawin','Nipawin','SK','Saskatchewan','53.3572','-104.0192',4401,505,'America/Regina',3,'S0E','1124567955');
INSERT INTO `canadacities` VALUES ('Battleford','Battleford','SK','Saskatchewan','52.7383','-108.3153',4400,189.2,'America/Swift_Current',3,'S0M','1124885955');
INSERT INTO `canadacities` VALUES ('Hampton','Hampton','NB','New Brunswick','45.5251491193206','-65.8425461391407',4395,209.6,'America/Moncton',3,'E5N','1124175945');
INSERT INTO `canadacities` VALUES ('Central Frontenac','Central Frontenac','ON','Ontario','44.7167','-76.8000',4373,4.3,'America/Toronto',3,'K0H','1124000254');
INSERT INTO `canadacities` VALUES ('Saint-Antonin','Saint-Antonin','QC','Quebec','47.7667','-69.4833',4338,24.7,'America/Toronto',4,'G0L','1124990343');
INSERT INTO `canadacities` VALUES ('Saint-Jean-de-Matha','Saint-Jean-de-Matha','QC','Quebec','46.2300','-73.5300',4335,39.6,'America/Toronto',3,'J0K','1124833822');
INSERT INTO `canadacities` VALUES ('Headingley','Headingley','MB','Manitoba','49.8681','-97.3908',4331,40.3,'America/Winnipeg',3,'R4H R4J','1124000273');
INSERT INTO `canadacities` VALUES ('Seguin','Seguin','ON','Ontario','45.2882','-79.8116',4304,7.2,'America/Toronto',3,'P0C P2A','1124001464');
INSERT INTO `canadacities` VALUES ('Beresford','Beresford','NB','New Brunswick','47.6992725956168','-65.705074842192',4294,223.2,'America/Moncton',3,'E8K','1124000299');
INSERT INTO `canadacities` VALUES ('La Pocatière','La Pocatiere','QC','Quebec','47.3667','-70.0333',4266,196.3,'America/Toronto',3,'G0R','1124845219');
INSERT INTO `canadacities` VALUES ('Bowen Island','Bowen Island','BC','British Columbia','49.3833','-123.3833',4256,84.9,'America/Vancouver',3,'V0N','1124000418');
INSERT INTO `canadacities` VALUES ('Caraquet','Caraquet','NB','New Brunswick','47.7853','-64.9592',4248,62.1,'America/Moncton',3,'E1W','1124593896');
INSERT INTO `canadacities` VALUES ('Altona','Altona','MB','Manitoba','49.1044','-97.5625',4227,445.2,'America/Winnipeg',3,'R0G','1124628560');
INSERT INTO `canadacities` VALUES ('Roxton Pond','Roxton Pond','QC','Quebec','45.4833','-72.6667',4224,43.3,'America/Toronto',4,'J0E','1124356503');
INSERT INTO `canadacities` VALUES ('Saint-Étienne-des-Grès','Saint-Etienne-des-Gres','QC','Quebec','46.4333','-72.7667',4217,40.2,'America/Toronto',3,'G0X','1124635032');
INSERT INTO `canadacities` VALUES ('Grand Forks','Grand Forks','BC','British Columbia','49.0333','-118.4400',4166,388.1,'America/Vancouver',3,'V0H','1124547325');
INSERT INTO `canadacities` VALUES ('New Maryland','New Maryland','NB','New Brunswick','45.8911','-66.6847',4153,195.4,'America/Moncton',3,'E3C','1124001875');
INSERT INTO `canadacities` VALUES ('Port Hardy','Port Hardy','BC','British Columbia','50.7225','-127.4928',4132,106.7,'America/Vancouver',3,'V0N','1124937351');
INSERT INTO `canadacities` VALUES ('Saint-Donat','Saint-Donat','QC','Quebec','46.3167','-74.2167',4130,11.7,'America/Toronto',3,'J0T','1124430126');
INSERT INTO `canadacities` VALUES ('Madawaska Valley','Madawaska Valley','ON','Ontario','45.5000','-77.6667',4123,6.1,'America/Toronto',3,'K0J','1124000653');
INSERT INTO `canadacities` VALUES ('Deep River','Deep River','ON','Ontario','46.1000','-77.4917',4109,82,'America/Toronto',3,'K0J','1124309248');
INSERT INTO `canadacities` VALUES ('Asphodel-Norwood','Asphodel-Norwood','ON','Ontario','44.3531','-78.0183',4109,25.5,'America/Toronto',3,'K0L','1124001973');
INSERT INTO `canadacities` VALUES ('Red Lake','Red Lake','ON','Ontario','51.0333','-93.8333',4107,6.7,'America/Winnipeg',3,'P0V','1124856215');
INSERT INTO `canadacities` VALUES ('Métabetchouan-Lac-à-la-Croix','Metabetchouan-Lac-a-la-Croix','QC','Quebec','48.4333','-71.8667',4097,21.9,'America/Toronto',3,'G8G','1124093309');
INSERT INTO `canadacities` VALUES ('Maniwaki','Maniwaki','QC','Quebec','46.3750','-75.9667',4094,677.7,'America/Toronto',3,'J9E','1124137130');
INSERT INTO `canadacities` VALUES ('Vermilion','Vermilion','AB','Alberta','53.3542','-110.8528',4084,315.8,'America/Edmonton',3,'T9X','1124995979');
INSERT INTO `canadacities` VALUES ('Hastings Highlands','Hastings Highlands','ON','Ontario','45.2333','-77.9333',4078,4.2,'America/Toronto',3,'K0L','1124000285');
INSERT INTO `canadacities` VALUES ('Prescott','Prescott','ON','Ontario','44.7167','-75.5167',4078,1273.5,'America/Toronto',3,'K0E','1124461297');
INSERT INTO `canadacities` VALUES ('Carstairs','Carstairs','AB','Alberta','51.5619','-114.0953',4077,342.1,'America/Edmonton',3,'T0M','1124621475');
INSERT INTO `canadacities` VALUES ('Danville','Danville','QC','Quebec','45.7833','-72.0167',4070,26.7,'America/Toronto',3,'J0A J1T','1124290094');
INSERT INTO `canadacities` VALUES ('Channel-Port aux Basques','Channel-Port aux Basques','NL','Newfoundland and Labrador','47.5694','-59.1361',4067,104.9,'America/St_Johns',3,'A0M','1124993496');
INSERT INTO `canadacities` VALUES ('Lac-Etchemin','Lac-Etchemin','QC','Quebec','46.4000','-70.5000',4061,25.8,'America/Toronto',3,'G0R','1124000895');
INSERT INTO `canadacities` VALUES ('Saint-Jacques','Saint-Jacques','QC','Quebec','45.9500','-73.5667',4021,59.7,'America/Toronto',3,'J0K','1124472694');
INSERT INTO `canadacities` VALUES ('Swan River','Swan River','MB','Manitoba','52.1058','-101.2667',4014,560.4,'America/Winnipeg',3,'R0L','1124210942');
INSERT INTO `canadacities` VALUES ('Stellarton','Stellarton','NS','Nova Scotia','45.5567','-62.6600',4007,445.6,'America/Halifax',3,'B0K','1124388660');
INSERT INTO `canadacities` VALUES ('Northern Bruce Peninsula','Northern Bruce Peninsula','ON','Ontario','45.0800','-81.3800',3999,5.1,'America/Toronto',3,'N0H','1124000606');
INSERT INTO `canadacities` VALUES ('L’Islet-sur-Mer','L''Islet-sur-Mer','QC','Quebec','47.1000','-70.3500',3999,33.3,'America/Toronto',3,'G0R','1124309185');
INSERT INTO `canadacities` VALUES ('Carleton-sur-Mer','Carleton-sur-Mer','QC','Quebec','48.1000','-66.1333',3991,18,'America/Toronto',3,'G0C','1124001943');
INSERT INTO `canadacities` VALUES ('Sparwood','Sparwood','BC','British Columbia','49.7331','-114.8853',3990,19.4,'America/Edmonton',3,'V0B','1124001718');
INSERT INTO `canadacities` VALUES ('Casselman','Casselman','ON','Ontario','45.3000','-75.0833',3970,693.4,'America/Toronto',3,'K0A','1124666499');
INSERT INTO `canadacities` VALUES ('Oka','Oka','QC','Quebec','45.4700','-74.0800',3968,69.6,'America/Toronto',3,'J0N','1124446142');
INSERT INTO `canadacities` VALUES ('Callander','Callander','ON','Ontario','46.1781','-79.4125',3964,38.5,'America/Toronto',4,'P0H','1124853285');
INSERT INTO `canadacities` VALUES ('Amaranth','Amaranth','ON','Ontario','43.9833','-80.2333',3963,15,'America/Toronto',3,'L9V L9W','1124001154');
INSERT INTO `canadacities` VALUES ('Marmora and Lake','Marmora and Lake','ON','Ontario','44.6425','-77.7372',3953,7.1,'America/Toronto',3,'K0K K0L','1124000420');
INSERT INTO `canadacities` VALUES ('Raymond','Raymond','AB','Alberta','49.4658','-112.6508',3942,557.1,'America/Edmonton',3,'T0K','1124125903');
INSERT INTO `canadacities` VALUES ('Morin-Heights','Morin-Heights','QC','Quebec','45.9000','-74.2500',3925,69.5,'America/Toronto',3,'J0R','1124001231');
INSERT INTO `canadacities` VALUES ('Dundas','Dundas','NB','New Brunswick','46.3155','-64.6947',3914,22.4,'America/Moncton',4,'E4R E4V','1124001475');
INSERT INTO `canadacities` VALUES ('Simonds','Simonds','NB','New Brunswick','45.3145','-65.8030',3913,13.9,'America/Moncton',4,'E2S','1124001671');
INSERT INTO `canadacities` VALUES ('Crabtree','Crabtree','QC','Quebec','45.9667','-73.4667',3887,155,'America/Toronto',3,'J0K','1124136084');
INSERT INTO `canadacities` VALUES ('Bancroft','Bancroft','ON','Ontario','45.0500','-77.8500',3881,16.9,'America/Toronto',3,'K0L','1124451822');
INSERT INTO `canadacities` VALUES ('Saint-Tite','Saint-Tite','QC','Quebec','46.7333','-72.5667',3880,41.9,'America/Toronto',3,'G0X','1124821328');
INSERT INTO `canadacities` VALUES ('Howick','Howick','ON','Ontario','43.9000','-81.0700',3873,13.4,'America/Toronto',3,'N0G','1124000394');
INSERT INTO `canadacities` VALUES ('Dutton/Dunwich','Dutton/Dunwich','ON','Ontario','42.6667','-81.5000',3866,13.1,'America/Toronto',3,'N0L','1124000540');
INSERT INTO `canadacities` VALUES ('New Richmond','New Richmond','QC','Quebec','48.1667','-65.8667',3810,22.6,'America/Toronto',3,'G0C','1124960222');
INSERT INTO `canadacities` VALUES ('Perth South','Perth South','ON','Ontario','43.3000','-81.1500',3810,9.7,'America/Toronto',3,'N4X N5A N0K','1124000996');
INSERT INTO `canadacities` VALUES ('Claresholm','Claresholm','AB','Alberta','50.0194','-113.5783',3780,465.9,'America/Edmonton',3,'T0L','1124380878');
INSERT INTO `canadacities` VALUES ('Baie-d’Urfé','Baie-d''Urfe','QC','Quebec','45.4167','-73.9167',3764,623.9,'America/Toronto',3,'H9X','1124534130');
INSERT INTO `canadacities` VALUES ('Montague','Montague','ON','Ontario','44.9667','-75.9667',3761,13.4,'America/Toronto',3,'K7A K0G','1124001810');
INSERT INTO `canadacities` VALUES ('Saint-André-Avellin','Saint-Andre-Avellin','QC','Quebec','45.7167','-75.0667',3749,27.2,'America/Toronto',3,'J0V','1124494033');
INSERT INTO `canadacities` VALUES ('Saint-Ambroise-de-Kildare','Saint-Ambroise-de-Kildare','QC','Quebec','46.0833','-73.5500',3747,55.3,'America/Toronto',3,'J0K','1124306240');
INSERT INTO `canadacities` VALUES ('East Angus','East Angus','QC','Quebec','45.4833','-71.6667',3741,472.7,'America/Toronto',3,'J0B','1124456321');
INSERT INTO `canadacities` VALUES ('Rossland','Rossland','BC','British Columbia','49.0786','-117.7992',3729,62.4,'America/Vancouver',3,'V0G','1124850810');
INSERT INTO `canadacities` VALUES ('Mackenzie','Mackenzie','BC','British Columbia','55.3381','-123.0944',3714,22.6,'America/Vancouver',3,'V0J','1124001437');
INSERT INTO `canadacities` VALUES ('Golden','Golden','BC','British Columbia','51.3019','-116.9667',3708,325,'America/Edmonton',3,'V0A','1124428625');
INSERT INTO `canadacities` VALUES ('Saint-Adolphe-d''Howard','Saint-Adolphe-d''Howard','QC','Quebec','45.9700','-74.3300',3702,26.6,'America/Toronto',3,'J0T','1124001188');
INSERT INTO `canadacities` VALUES ('Warwick','Warwick','ON','Ontario','43.0000','-81.8917',3692,12.7,'America/Toronto',3,'N0M N0N','1124864287');
INSERT INTO `canadacities` VALUES ('Bonnechere Valley','Bonnechere Valley','ON','Ontario','45.5333','-77.1000',3674,6.2,'America/Toronto',3,'K0J','1124000398');
INSERT INTO `canadacities` VALUES ('Pincher Creek','Pincher Creek','AB','Alberta','49.4861','-113.9500',3642,361.1,'America/Edmonton',3,'T0K','1124252125');
INSERT INTO `canadacities` VALUES ('Alnwick','Alnwick','NB','New Brunswick','47.2656','-65.2292',3640,5.4,'America/Moncton',4,'E1V E9G E9H','1124000627');
INSERT INTO `canadacities` VALUES ('Saint-Prosper','Saint-Prosper','QC','Quebec','46.2167','-70.4833',3605,27,'America/Toronto',4,'G0M','1124232575');
INSERT INTO `canadacities` VALUES ('Crossfield','Crossfield','AB','Alberta','51.4333','-114.0333',3599,302.7,'America/Edmonton',3,'T0M','1124737275');
INSERT INTO `canadacities` VALUES ('Ormstown','Ormstown','QC','Quebec','45.1300','-74.0000',3595,25.2,'America/Toronto',3,'J0S','1124670346');
INSERT INTO `canadacities` VALUES ('Cardston','Cardston','AB','Alberta','49.2025','-113.3019',3585,417.5,'America/Edmonton',3,'T0K','1124479644');
INSERT INTO `canadacities` VALUES ('De Salaberry','De Salaberry','MB','Manitoba','49.4403','-96.9844',3580,5.3,'America/Winnipeg',3,'R0A','1124001664');
INSERT INTO `canadacities` VALUES ('Grande Cache','Grande Cache','AB','Alberta','53.8773','-119.1199',3571,102.1,'America/Edmonton',4,NULL,'1124001952');
INSERT INTO `canadacities` VALUES ('Saint-Agapit','Saint-Agapit','QC','Quebec','46.5667','-71.4333',3567,54.5,'America/Toronto',4,'G0S','1124119699');
INSERT INTO `canadacities` VALUES ('Fruitvale','Fruitvale','BC','British Columbia','49.0986937703863','-117.563382142451',3557,592,'America/Vancouver',3,'V0G','1124854890');
INSERT INTO `canadacities` VALUES ('Saint-Ambroise','Saint-Ambroise','QC','Quebec','48.5500','-71.3333',3546,23.5,'America/Toronto',4,'G7P','1124001342');
INSERT INTO `canadacities` VALUES ('Westville','Westville','NS','Nova Scotia','45.5500','-62.7000',3540,248.6,'America/Halifax',3,'B0K','1124476279');
INSERT INTO `canadacities` VALUES ('Hay River','Hay River','NT','Northwest Territories','60.7531','-115.9004',3528,26.5,'America/Yellowknife',4,'X0E','1124721803');
INSERT INTO `canadacities` VALUES ('Pasadena','Pasadena','NL','Newfoundland and Labrador','49.0161','-57.6050',3524,71.7,'America/St_Johns',3,'A0L','1124001778');
INSERT INTO `canadacities` VALUES ('Mistissini','Mistissini','QC','Quebec','50.5707','-73.6829',3523,4.1,'America/Toronto',4,'G0W J0Y','1124001942');
INSERT INTO `canadacities` VALUES ('Studholm','Studholm','NB','New Brunswick','45.8133','-65.5747',3522,7.8,'America/Moncton',4,'E5P E4G','1124001373');
INSERT INTO `canadacities` VALUES ('Lorette','Lorette','MB','Manitoba','49.7414','-96.8761',3512,743.8,'America/Winnipeg',3,'R5K','1124000429');
INSERT INTO `canadacities` VALUES ('Saint-Faustin--Lac-Carré','Saint-Faustin--Lac-Carre','QC','Quebec','46.0813','-74.4668',3499,28.8,'America/Toronto',4,'J0T','1124677642');
INSERT INTO `canadacities` VALUES ('Morris-Turnberry','Morris-Turnberry','ON','Ontario','43.8500','-81.2500',3496,9.1,'America/Toronto',3,'N0G','1124001124');
INSERT INTO `canadacities` VALUES ('Placentia','Placentia','NL','Newfoundland and Labrador','47.2458','-53.9611',3496,60.2,'America/St_Johns',3,'A0B','1124471582');
INSERT INTO `canadacities` VALUES ('Saint-Pascal','Saint-Pascal','QC','Quebec','47.5333','-69.8000',3490,58.8,'America/Toronto',3,'G0L','1124617986');
INSERT INTO `canadacities` VALUES ('Mulmur','Mulmur','ON','Ontario','44.1917','-80.1083',3478,12.1,'America/Toronto',3,'L9V','1124001711');
INSERT INTO `canadacities` VALUES ('Blind River','Blind River','ON','Ontario','46.1833','-82.9500',3472,6.6,'America/Toronto',3,'P0R','1124244510');
INSERT INTO `canadacities` VALUES ('Dunham','Dunham','QC','Quebec','45.1333','-72.8000',3471,17.8,'America/Toronto',3,'J0E','1124514371');
INSERT INTO `canadacities` VALUES ('High Level','High Level','AB','Alberta','58.5169','-117.1361',3461,108.2,'America/Edmonton',3,'T0H','1124099423');
INSERT INTO `canadacities` VALUES ('Havre-Saint-Pierre','Havre-Saint-Pierre','QC','Quebec','50.2333','-63.6000',3460,1.2,'America/Toronto',3,'G0G','1124890113');
INSERT INTO `canadacities` VALUES ('Saint-Anselme','Saint-Anselme','QC','Quebec','46.6333','-70.9667',3458,46.9,'America/Toronto',4,'G0R','1124041118');
INSERT INTO `canadacities` VALUES ('Trois-Pistoles','Trois-Pistoles','QC','Quebec','48.1200','-69.1800',3456,450.9,'America/Toronto',3,'G0L','1124667916');
INSERT INTO `canadacities` VALUES ('Grande-Rivière','Grande-Riviere','QC','Quebec','48.4000','-64.5000',3456,39.5,'America/Toronto',3,'G0C','1124608500');
INSERT INTO `canadacities` VALUES ('Malartic','Malartic','QC','Quebec','48.1333','-78.1333',3449,23.2,'America/Toronto',3,'J0Y','1124600555');
INSERT INTO `canadacities` VALUES ('Bonavista','Bonavista','NL','Newfoundland and Labrador','48.6597','-53.1208',3448,109.4,'America/St_Johns',3,'A0C','1124990261');
INSERT INTO `canadacities` VALUES ('Prince Albert No. 461','Prince Albert No. 461','SK','Saskatchewan','53.1089','-105.6574',3438,3.4,'America/Regina',4,'S6V','1124001802');
INSERT INTO `canadacities` VALUES ('Saint-Maurice','Saint-Maurice','QC','Quebec','46.4667','-72.5333',3432,37.6,'America/Toronto',3,'G0X','1124381241');
INSERT INTO `canadacities` VALUES ('Killarney - Turtle Mountain','Killarney - Turtle Mountain','MB','Manitoba','49.1775','-99.6906',3429,3.7,'America/Winnipeg',4,'R0K','1124001432');
INSERT INTO `canadacities` VALUES ('Woodlands','Woodlands','MB','Manitoba','50.2408','-97.7358',3416,2.9,'America/Winnipeg',4,'R0C','1124530756');
INSERT INTO `canadacities` VALUES ('Lewisporte','Lewisporte','NL','Newfoundland and Labrador','49.2300','-55.0700',3409,92.4,'America/St_Johns',3,'A0G','1124582594');
INSERT INTO `canadacities` VALUES ('Invermere','Invermere','BC','British Columbia','50.5083','-116.0303',3391,315.9,'America/Edmonton',3,'V0A','1124839399');
INSERT INTO `canadacities` VALUES ('Bifrost-Riverton','Bifrost-Riverton','MB','Manitoba','51.0603','-97.1436',3378,2.1,'America/Winnipeg',3,'R0C','1124000047');
INSERT INTO `canadacities` VALUES ('Ascot Corner','Ascot Corner','QC','Quebec','45.4500','-71.7667',3368,41.3,'America/Toronto',4,'J0B','1124945733');
INSERT INTO `canadacities` VALUES ('Cartier','Cartier','MB','Manitoba','49.9161','-97.7000',3368,6.1,'America/Winnipeg',3,'R4K R0H','1124001073');
INSERT INTO `canadacities` VALUES ('Fossambault-sur-le-Lac','Fossambault-sur-le-Lac','QC','Quebec','46.8667','-71.6167',3367,202.6,'America/Toronto',3,'G3N','1124001825');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-des-Lacs','Sainte-Anne-des-Lacs','QC','Quebec','45.8500','-74.1333',3363,135.8,'America/Toronto',3,'J0R','1124001507');
INSERT INTO `canadacities` VALUES ('Saint-Sulpice','Saint-Sulpice','QC','Quebec','45.8333','-73.3500',3360,92.9,'America/Toronto',3,'J5W','1124000703');
INSERT INTO `canadacities` VALUES ('Penhold','Penhold','AB','Alberta','52.1333','-113.8667',3359,619.9,'America/Edmonton',3,'T0M','1124360682');
INSERT INTO `canadacities` VALUES ('Powassan','Powassan','ON','Ontario','46.0825','-79.3619',3346,15,'America/Toronto',3,'P0H','1124971329');
INSERT INTO `canadacities` VALUES ('Highlands East','Highlands East','ON','Ontario','44.9667','-78.2500',3343,4.7,'America/Toronto',3,'K0L K0M','1124001598');
INSERT INTO `canadacities` VALUES ('Saint-Alphonse-de-Granby','Saint-Alphonse-de-Granby','QC','Quebec','45.3333','-72.8167',3341,66.7,'America/Toronto',3,'J0E','1124000185');
INSERT INTO `canadacities` VALUES ('Sainte-Claire','Sainte-Claire','QC','Quebec','46.6000','-70.8667',3325,37.8,'America/Toronto',3,'G0R','1124401109');
INSERT INTO `canadacities` VALUES ('Bright','Bright','NB','New Brunswick','46.1205','-67.0545',3317,8.2,'America/Moncton',4,'E6L E6E','1124001649');
INSERT INTO `canadacities` VALUES ('Ellison','Ellison','BC','British Columbia','49.9646','-119.3178',3316,40.6,'America/Vancouver',4,'V1X V1P','1124000194');
INSERT INTO `canadacities` VALUES ('Percé','Perce','QC','Quebec','48.5333','-64.2167',3312,7.7,'America/Toronto',3,'G0C','1124000234');
INSERT INTO `canadacities` VALUES ('Saint-Jean-Port-Joli','Saint-Jean-Port-Joli','QC','Quebec','47.2167','-70.2667',3304,47.9,'America/Toronto',3,'G0R','1124255737');
INSERT INTO `canadacities` VALUES ('East Hawkesbury','East Hawkesbury','ON','Ontario','45.5167','-74.4667',3296,14,'America/Toronto',3,'K6A K0B','1124000222');
INSERT INTO `canadacities` VALUES ('Buckland No. 491','Buckland No. 491','SK','Saskatchewan','53.3276','-105.7804',3277,4.2,'America/Regina',4,'S0J S6V','1124001476');
INSERT INTO `canadacities` VALUES ('Saint-André-d''Argenteuil','Saint-Andre-d''Argenteuil','QC','Quebec','45.5667','-74.3333',3275,33.5,'America/Toronto',3,'J0V','1124000962');
INSERT INTO `canadacities` VALUES ('Saint-Côme--Linière','Saint-Come--Liniere','QC','Quebec','46.0667','-70.5167',3274,21.8,'America/Toronto',4,'G0M','1124151898');
INSERT INTO `canadacities` VALUES ('Marathon','Marathon','ON','Ontario','48.7500','-86.3667',3273,19.2,'America/Toronto',3,'P0T','1124974800');
INSERT INTO `canadacities` VALUES ('Forestville','Forestville','QC','Quebec','48.7333','-69.0833',3270,16.8,'America/Toronto',3,'G0T','1124215354');
INSERT INTO `canadacities` VALUES ('Compton','Compton','QC','Quebec','45.2333','-71.8167',3270,15.8,'America/Toronto',4,'J0B','1124144541');
INSERT INTO `canadacities` VALUES ('Shuniah','Shuniah','ON','Ontario','48.5833','-88.8333',3247,5.7,'America/Toronto',3,'P0T P7A','1124000092');
INSERT INTO `canadacities` VALUES ('Inuvik','Inuvik','NT','Northwest Territories','68.3407','-133.6096',3243,51.9,'America/Inuvik',4,'X0E','1124116419');
INSERT INTO `canadacities` VALUES ('Richmond','Richmond','QC','Quebec','45.6667','-72.1500',3232,460.2,'America/Toronto',3,'J0B','1124924022');
INSERT INTO `canadacities` VALUES ('Lake Cowichan','Lake Cowichan','BC','British Columbia','48.8258','-124.0542',3226,369.6,'America/Vancouver',3,'V0R','1124082843');
INSERT INTO `canadacities` VALUES ('Saint-Gabriel-de-Valcartier','Saint-Gabriel-de-Valcartier','QC','Quebec','46.9333','-71.4667',3223,7.5,'America/Toronto',3,'G0A G3S','1124782327');
INSERT INTO `canadacities` VALUES ('Gibbons','Gibbons','AB','Alberta','53.8278','-113.3228',3218,340.1,'America/Edmonton',3,'T0A','1124001097');
INSERT INTO `canadacities` VALUES ('Sables-Spanish Rivers','Sables-Spanish Rivers','ON','Ontario','46.2333','-82.0000',3214,3.9,'America/Toronto',3,'P0P','1124000330');
INSERT INTO `canadacities` VALUES ('Hillsburg-Roblin-Shell River','Hillsburg-Roblin-Shell River','MB','Manitoba','51.3343','-101.2929',3214,1.9,'America/Winnipeg',4,'R0L','1124001467');
INSERT INTO `canadacities` VALUES ('Port Hawkesbury','Port Hawkesbury','NS','Nova Scotia','45.6153','-61.3642',3214,396.6,'America/Glace_Bay',3,'B9A','1124913307');
INSERT INTO `canadacities` VALUES ('Three Hills','Three Hills','AB','Alberta','51.7072','-113.2647',3212,475.7,'America/Edmonton',3,'T0M','1124247045');
INSERT INTO `canadacities` VALUES ('Kingston','Kingston','NB','New Brunswick','45.4663','-66.0217',3202,16,'America/Moncton',4,'E5N E5S','1124000116');
INSERT INTO `canadacities` VALUES ('Paspebiac','Paspebiac','QC','Quebec','48.0333','-65.2500',3198,33.8,'America/Toronto',3,'G0C','1124858850');
INSERT INTO `canadacities` VALUES ('Saint-Thomas','Saint-Thomas','QC','Quebec','46.0167','-73.3500',3193,33.6,'America/Toronto',3,'J0K','1124176940');
INSERT INTO `canadacities` VALUES ('Saint-Jean-Baptiste','Saint-Jean-Baptiste','QC','Quebec','45.5167','-73.1167',3191,44.3,'America/Toronto',3,'J0L','1124000869');
INSERT INTO `canadacities` VALUES ('Portneuf','Portneuf','QC','Quebec','46.7000','-71.8833',3187,29.1,'America/Toronto',3,'G0A','1124993610');
INSERT INTO `canadacities` VALUES ('Pictou','Pictou','NS','Nova Scotia','45.6814','-62.7119',3186,397.6,'America/Halifax',3,'B0K','1124595917');
INSERT INTO `canadacities` VALUES ('Tisdale','Tisdale','SK','Saskatchewan','52.8500','-104.0500',3180,491.5,'America/Regina',3,'S0E','1124001086');
INSERT INTO `canadacities` VALUES ('Lake of Bays','Lake of Bays','ON','Ontario','45.3043','-79.0180',3167,4.7,'America/Toronto',4,'P0B P0A P1H','1124000232');
INSERT INTO `canadacities` VALUES ('Bishops Falls','Bishops Falls','NL','Newfoundland and Labrador','49.0167','-55.5167',3156,112.2,'America/St_Johns',3,'A0H','1124735612');
INSERT INTO `canadacities` VALUES ('WestLake-Gladstone','WestLake-Gladstone','MB','Manitoba','50.2862','-98.8415',3154,1.7,'America/Winnipeg',4,'R0H R0J','1124001087');
INSERT INTO `canadacities` VALUES ('Normandin','Normandin','QC','Quebec','48.8333','-72.5333',3137,14.8,'America/Toronto',3,'G8M','1124410764');
INSERT INTO `canadacities` VALUES ('Mitchell','Mitchell','MB','Manitoba','49.5363','-96.7634',3136,856.7,'America/Winnipeg',3,'R5G','1124001295');
INSERT INTO `canadacities` VALUES ('Saint-Alphonse-Rodriguez','Saint-Alphonse-Rodriguez','QC','Quebec','46.1833','-73.7000',3134,32,'America/Toronto',3,'J0K','1124001435');
INSERT INTO `canadacities` VALUES ('Beauséjour','Beausejour','MB','Manitoba','50.0622','-96.5161',3126,584.4,'America/Winnipeg',3,'R0E','1124260967');
INSERT INTO `canadacities` VALUES ('Dalhousie','Dalhousie','NB','New Brunswick','48.1000','-66.6167',3126,205.3,'America/Toronto',3,'E8C','1124540945');
INSERT INTO `canadacities` VALUES ('Val-Morin','Val-Morin','QC','Quebec','46.0000','-74.1800',3123,79.7,'America/Toronto',3,'J0T','1124001446');
INSERT INTO `canadacities` VALUES ('Lac du Bonnet','Lac du Bonnet','MB','Manitoba','50.2577','-96.1209',3121,2.8,'America/Winnipeg',4,'R0E','1124000450');
INSERT INTO `canadacities` VALUES ('Clermont','Clermont','QC','Quebec','47.6833','-70.2333',3118,62.8,'America/Toronto',3,'G4A','1124937298');
INSERT INTO `canadacities` VALUES ('Virden','Virden','MB','Manitoba','49.8508','-100.9317',3114,370.2,'America/Winnipeg',3,'R0M','1124620072');
INSERT INTO `canadacities` VALUES ('Saint-Christophe-d''Arthabaska','Saint-Christophe-d''Arthabaska','QC','Quebec','46.0333','-71.8833',3111,45.1,'America/Toronto',4,'G6R G6S','1124000694');
INSERT INTO `canadacities` VALUES ('Mont-Saint-Grégoire','Mont-Saint-Gregoire','QC','Quebec','45.3333','-73.1667',3086,38.8,'America/Toronto',3,'J0J','1124094125');
INSERT INTO `canadacities` VALUES ('Thurso','Thurso','QC','Quebec','45.5969','-75.2433',3084,463.8,'America/Toronto',3,'J0X','1124913486');
INSERT INTO `canadacities` VALUES ('Wellington','Wellington','NB','New Brunswick','46.4768','-64.7478',3079,16.7,'America/Moncton',4,'E4S E4V','1124001391');
INSERT INTO `canadacities` VALUES ('Cedar','Cedar','BC','British Columbia','49.0853','-123.8259',3078,91.3,'America/Vancouver',4,'V9X','1124000187');
INSERT INTO `canadacities` VALUES ('Saint-Gabriel','Saint-Gabriel','QC','Quebec','46.3000','-73.3833',3068,1012.3,'America/Toronto',3,'J0K','1124920056');
INSERT INTO `canadacities` VALUES ('Merrickville','Merrickville','ON','Ontario','44.8539','-75.8269',3067,14.3,'America/Toronto',4,'K0G','1124846224');
INSERT INTO `canadacities` VALUES ('Saint-Liboire','Saint-Liboire','QC','Quebec','45.6500','-72.7667',3051,41.9,'America/Toronto',3,'J0H','1124016354');
INSERT INTO `canadacities` VALUES ('Dégelis','Degelis','QC','Quebec','47.5500','-68.6500',3051,5.5,'America/Toronto',3,'G5T','1124001549');
INSERT INTO `canadacities` VALUES ('Morris','Morris','MB','Manitoba','49.3986','-97.4592',3047,2.9,'America/Winnipeg',4,'R0G','1124001886');
INSERT INTO `canadacities` VALUES ('Saint-Alexis-des-Monts','Saint-Alexis-des-Monts','QC','Quebec','46.4667','-73.1333',3046,2.9,'America/Toronto',3,'J0K','1124120192');
INSERT INTO `canadacities` VALUES ('Cap-Saint-Ignace','Cap-Saint-Ignace','QC','Quebec','47.0333','-70.4667',3045,14.6,'America/Toronto',3,'G0R','1124138813');
INSERT INTO `canadacities` VALUES ('Fort Macleod','Fort Macleod','AB','Alberta','49.7256','-113.3975',3038,126.8,'America/Edmonton',3,'T0L','1124975838');
INSERT INTO `canadacities` VALUES ('Enderby','Enderby','BC','British Columbia','50.5508','-119.1397',3028,695.8,'America/Vancouver',3,'V0E','1124312550');
INSERT INTO `canadacities` VALUES ('Carman','Carman','MB','Manitoba','49.4992','-98.0008',3027,702.4,'America/Winnipeg',3,'R0G','1124732787');
INSERT INTO `canadacities` VALUES ('Saint-Anaclet-de-Lessard','Saint-Anaclet-de-Lessard','QC','Quebec','48.4800','-68.4200',3019,23.9,'America/Toronto',4,'G0K','1124764523');
INSERT INTO `canadacities` VALUES ('Stoke','Stoke','QC','Quebec','45.5333','-71.8000',3014,11.8,'America/Toronto',4,'J0B','1124001196');
INSERT INTO `canadacities` VALUES ('Adelaide-Metcalfe','Adelaide-Metcalfe','ON','Ontario','42.9500','-81.7000',3011,9.1,'America/Toronto',3,'N0M N7G','1124000926');
INSERT INTO `canadacities` VALUES ('Melancthon','Melancthon','ON','Ontario','44.1500','-80.2667',3008,9.7,'America/Toronto',3,'L9V','1124736504');
INSERT INTO `canadacities` VALUES ('Cap Santé','Cap Sante','QC','Quebec','46.6667','-71.7833',2996,54.7,'America/Toronto',3,'G0A','1124080648');
INSERT INTO `canadacities` VALUES ('Saint-David-de-Falardeau','Saint-David-de-Falardeau','QC','Quebec','48.6167','-71.1167',2996,7.5,'America/Toronto',4,'G0V','1124001854');
INSERT INTO `canadacities` VALUES ('Harbour Grace','Harbour Grace','NL','Newfoundland and Labrador','47.6917','-53.2167',2995,88.8,'America/St_Johns',3,'A0A','1124871661');
INSERT INTO `canadacities` VALUES ('Houston','Houston','BC','British Columbia','54.3975','-126.6419',2993,41,'America/Vancouver',3,'V0J','1124993327');
INSERT INTO `canadacities` VALUES ('Springdale','Springdale','NL','Newfoundland and Labrador','49.4974','-56.0727',2971,168.8,'America/St_Johns',3,'A0J','1124612197');
INSERT INTO `canadacities` VALUES ('Pemberton','Pemberton','BC','British Columbia','50.3203','-122.8053',2970,217.5,'America/Vancouver',3,'V0N','1124476252');
INSERT INTO `canadacities` VALUES ('Athabasca','Athabasca','AB','Alberta','54.7197','-113.2856',2965,168,'America/Edmonton',3,'T9S','1124006333');
INSERT INTO `canadacities` VALUES ('Saint-Ferréol-les-Neiges','Saint-Ferreol-les-Neiges','QC','Quebec','47.1167','-70.8500',2964,35.6,'America/Toronto',3,'G0A','1124255920');
INSERT INTO `canadacities` VALUES ('Laurentian Hills','Laurentian Hills','ON','Ontario','46.1333','-77.5500',2961,4.6,'America/Toronto',3,'K0J','1124000976');
INSERT INTO `canadacities` VALUES ('Grand Valley','Grand Valley','ON','Ontario','43.9500','-80.3667',2956,18.7,'America/Toronto',3,'L9W','1124627074');
INSERT INTO `canadacities` VALUES ('Senneterre','Senneterre','QC','Quebec','48.3833','-77.2333',2953,0.2,'America/Toronto',3,'J0Y','1124548422');
INSERT INTO `canadacities` VALUES ('Saint-Mathieu-de-Beloeil','Saint-Mathieu-de-Beloeil','QC','Quebec','45.5667','-73.2000',2952,74.9,'America/Toronto',3,'J3G','1124000340');
INSERT INTO `canadacities` VALUES ('Sainte-Marie-Madeleine','Sainte-Marie-Madeleine','QC','Quebec','45.6000','-73.1000',2935,57.7,'America/Toronto',4,'J0H','1124000666');
INSERT INTO `canadacities` VALUES ('Admaston/Bromley','Admaston/Bromley','ON','Ontario','45.5292','-76.8969',2935,5.6,'America/Toronto',3,'K7V K0J','1124001494');
INSERT INTO `canadacities` VALUES ('North Algona Wilberforce','North Algona Wilberforce','ON','Ontario','45.6167','-77.2000',2915,7.7,'America/Toronto',3,'K8A K0J','1124001620');
INSERT INTO `canadacities` VALUES ('Errington','Errington','BC','British Columbia','49.2874','-124.3433',2907,105.9,'America/Vancouver',4,'V0R V9P','1124001138');
INSERT INTO `canadacities` VALUES ('Wawa','Wawa','ON','Ontario','47.9931','-84.7736',2905,7,'America/Toronto',3,'P0S','1124381797');
INSERT INTO `canadacities` VALUES ('Sainte-Mélanie','Sainte-Melanie','QC','Quebec','46.1333','-73.5167',2892,38.1,'America/Toronto',3,'J0K','1124173990');
INSERT INTO `canadacities` VALUES ('Horton','Horton','ON','Ontario','45.5000','-76.6667',2887,18.2,'America/Toronto',3,'K7V','1124001850');
INSERT INTO `canadacities` VALUES ('Saint-Paul-d''Abbotsford','Saint-Paul-d''Abbotsford','QC','Quebec','45.4333','-72.8833',2886,36.3,'America/Toronto',4,'J0E','1124492372');
INSERT INTO `canadacities` VALUES ('Saint-Michel','Saint-Michel','QC','Quebec','45.2333','-73.5667',2884,48.2,'America/Toronto',3,'J0L','1124926265');
INSERT INTO `canadacities` VALUES ('Botwood','Botwood','NL','Newfoundland and Labrador','49.1500','-55.3667',2875,191,'America/St_Johns',3,'A0H','1124634384');
INSERT INTO `canadacities` VALUES ('Coalhurst','Coalhurst','AB','Alberta','49.7457','-112.9319',2869,931.3,'America/Edmonton',3,'T0L','1124001548');
INSERT INTO `canadacities` VALUES ('Saint-Marc-des-Carrières','Saint-Marc-des-Carrieres','QC','Quebec','46.6833','-72.0500',2862,172,'America/Toronto',3,'G0A','1124924445');
INSERT INTO `canadacities` VALUES ('Stanstead','Stanstead','QC','Quebec','45.0167','-72.1000',2857,125.8,'America/Toronto',3,'J0B','1124000851');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-Beaupré','Sainte-Anne-de-Beaupre','QC','Quebec','47.0167','-70.9333',2854,45.6,'America/Toronto',3,'G0A','1124323389');
INSERT INTO `canadacities` VALUES ('Sainte-Luce','Sainte-Luce','QC','Quebec','48.5500','-68.3800',2851,39,'America/Toronto',3,'G0K','1124000034');
INSERT INTO `canadacities` VALUES ('Saint-Joseph-de-Sorel','Saint-Joseph-de-Sorel','QC','Quebec','46.0446','-73.1308',2850,1164.5,'America/Toronto',3,'J3R','1124557970');
INSERT INTO `canadacities` VALUES ('Rankin Inlet','Rankin Inlet','NU','Nunavut','62.8300','-92.1321',2842,140.4,'America/Rankin_Inlet',4,'X0C','1124057160');
INSERT INTO `canadacities` VALUES ('Kingsclear','Kingsclear','NB','New Brunswick','45.8796','-66.8695',2839,18.9,'America/Moncton',4,'E3E','1124744497');
INSERT INTO `canadacities` VALUES ('Princeton','Princeton','BC','British Columbia','49.4589','-120.5060',2828,47.4,'America/Vancouver',3,'V0X','1124790102');
INSERT INTO `canadacities` VALUES ('La Loche','La Loche','SK','Saskatchewan','56.4833','-109.4333',2827,181.3,'America/Swift_Current',3,'S0M','1124048077');
INSERT INTO `canadacities` VALUES ('Ferme-Neuve','Ferme-Neuve','QC','Quebec','46.7000','-75.4500',2822,3.6,'America/Toronto',3,'J0W','1124159065');
INSERT INTO `canadacities` VALUES ('Yamachiche','Yamachiche','QC','Quebec','46.2667','-72.8333',2813,26.4,'America/Toronto',3,'G0X','1124138672');
INSERT INTO `canadacities` VALUES ('Adstock','Adstock','QC','Quebec','46.0500','-71.0800',2806,9.7,'America/Toronto',4,'G0N','1124001673');
INSERT INTO `canadacities` VALUES ('Cowichan Bay','Cowichan Bay','BC','British Columbia','48.7666','-123.6743',2799,104.5,'America/Vancouver',4,'V9L','1124254242');
INSERT INTO `canadacities` VALUES ('Vanscoy No. 345','Vanscoy No. 345','SK','Saskatchewan','52.0073','-107.0552',2799,3.3,'America/Swift_Current',4,'S0K S0L S7K','1124001166');
INSERT INTO `canadacities` VALUES ('Enniskillen','Enniskillen','ON','Ontario','42.8167','-82.1250',2796,8.3,'America/Toronto',3,'N0N','1124001379');
INSERT INTO `canadacities` VALUES ('Royston','Royston','BC','British Columbia','49.6405','-124.9406',2791,152.4,'America/Vancouver',4,'V9N','1124000692');
INSERT INTO `canadacities` VALUES ('Bonaventure','Bonaventure','QC','Quebec','48.0500','-65.4833',2775,26.6,'America/Toronto',3,'G0C','1124014798');
INSERT INTO `canadacities` VALUES ('Pohénégamook','Pohenegamook','QC','Quebec','47.4667','-69.2167',2770,8.1,'America/Toronto',3,'G0L','1124000688');
INSERT INTO `canadacities` VALUES ('Saint-Isidore','Saint-Isidore','QC','Quebec','45.3000','-73.6800',2769,53,'America/Toronto',3,'J0L','1124775572');
INSERT INTO `canadacities` VALUES ('Wakefield','Wakefield','NB','New Brunswick','46.2406','-67.6248',2767,14.1,'America/Moncton',4,'E7M E7P','1124000329');
INSERT INTO `canadacities` VALUES ('Arviat','Arviat','NU','Nunavut','61.0996','-94.1688',2766,20.1,'America/Rankin_Inlet',4,'X0C','1124309634');
INSERT INTO `canadacities` VALUES ('Sainte-Marguerite-du-Lac-Masson','Sainte-Marguerite-du-Lac-Masson','QC','Quebec','46.0560','-74.0723',2763,30,'America/Toronto',4,'J0T','1124208615');
INSERT INTO `canadacities` VALUES ('Saint-Prime','Saint-Prime','QC','Quebec','48.5800','-72.3300',2758,18.7,'America/Toronto',3,'G8J','1124389119');
INSERT INTO `canadacities` VALUES ('Kuujjuaq','Kuujjuaq','QC','Quebec','58.1429','-68.3742',2754,9.4,'America/Toronto',4,'J0M','1124705411');
INSERT INTO `canadacities` VALUES ('Atikokan','Atikokan','ON','Ontario','48.7500','-91.6167',2753,8.6,'America/Atikokan',3,'P0T','1124868159');
INSERT INTO `canadacities` VALUES ('Grenville-sur-la-Rouge','Grenville-sur-la-Rouge','QC','Quebec','45.6500','-74.6333',2746,8.7,'America/Toronto',3,'J0V','1124001524');
INSERT INTO `canadacities` VALUES ('North Cypress-Langford','North Cypress-Langford','MB','Manitoba','49.9969','-99.3982',2745,1.6,'America/Winnipeg',4,'R0K R0J','1124001785');
INSERT INTO `canadacities` VALUES ('Saint-Dominique','Saint-Dominique','QC','Quebec','45.5667','-72.8500',2741,38.9,'America/Toronto',3,'J0H','1124847475');
INSERT INTO `canadacities` VALUES ('Macamic','Macamic','QC','Quebec','48.7500','-79.0000',2734,13.5,'America/Toronto',3,'J0Z','1124965674');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-Sorel','Sainte-Anne-de-Sorel','QC','Quebec','46.0500','-73.0667',2731,75,'America/Toronto',4,'J3P','1124001977');
INSERT INTO `canadacities` VALUES ('Sundre','Sundre','AB','Alberta','51.7972','-114.6406',2729,245.6,'America/Edmonton',3,'T0M','1124001279');
INSERT INTO `canadacities` VALUES ('Rougemont','Rougemont','QC','Quebec','45.4333','-73.0500',2723,62,'America/Toronto',3,'J0L','1124876872');
INSERT INTO `canadacities` VALUES ('Piedmont','Piedmont','QC','Quebec','45.9000','-74.1300',2721,111.7,'America/Toronto',3,'J0R','1124001265');
INSERT INTO `canadacities` VALUES ('Grimshaw','Grimshaw','AB','Alberta','56.1908','-117.6117',2718,383.4,'America/Edmonton',3,'T0H','1124339886');
INSERT INTO `canadacities` VALUES ('Lac-des-Écorces','Lac-des-Ecorces','QC','Quebec','46.5500','-75.3500',2713,18.8,'America/Toronto',3,'J0W','1124808962');
INSERT INTO `canadacities` VALUES ('Markstay','Markstay','ON','Ontario','46.4912','-80.4717',2708,5.4,'America/Toronto',4,'P0H P0M','1124061532');
INSERT INTO `canadacities` VALUES ('Northeastern Manitoulin and the Islands','Northeastern Manitoulin and the Islands','ON','Ontario','45.9667','-81.9333',2706,5.5,'America/Toronto',3,'P0P','1124001541');
INSERT INTO `canadacities` VALUES ('Pelican Narrows','Pelican Narrows','SK','Saskatchewan','55.1883','-102.9342',2703,295,'America/Regina',3,'S0P S0J','1124970223');
INSERT INTO `canadacities` VALUES ('McDougall','McDougall','ON','Ontario','45.4500','-80.0167',2702,10.1,'America/Toronto',3,'P2A','1124000643');
INSERT INTO `canadacities` VALUES ('Black Diamond','Black Diamond','AB','Alberta','50.6881','-114.2333',2700,702.7,'America/Edmonton',3,'T0L','1124170822');
INSERT INTO `canadacities` VALUES ('Saint-Pamphile','Saint-Pamphile','QC','Quebec','46.9667','-69.7833',2685,19.6,'America/Toronto',3,'G0R','1124993070');
INSERT INTO `canadacities` VALUES ('Bedford','Bedford','QC','Quebec','45.1167','-72.9833',2684,639.4,'America/Toronto',3,'J0J','1124195813');
INSERT INTO `canadacities` VALUES ('Weedon-Centre','Weedon-Centre','QC','Quebec','45.7000','-71.4667',2683,12.4,'America/Toronto',3,'J0B','1124651516');
INSERT INTO `canadacities` VALUES ('Lacolle','Lacolle','QC','Quebec','45.0833','-73.3667',2680,54,'America/Toronto',3,'J0J','1124270266');
INSERT INTO `canadacities` VALUES ('Saint-Gabriel-de-Brandon','Saint-Gabriel-de-Brandon','QC','Quebec','46.2667','-73.3833',2679,26.8,'America/Toronto',3,'J0K','1124001827');
INSERT INTO `canadacities` VALUES ('Huntingdon','Huntingdon','QC','Quebec','45.0800','-74.1700',2673,879.2,'America/Toronto',3,'J0S','1124322836');
INSERT INTO `canadacities` VALUES ('French River / Rivière des Français','French River / Riviere des Francais','ON','Ontario','46.1667','-80.5000',2662,3.6,'America/Toronto',3,'P0M','1124000556');
INSERT INTO `canadacities` VALUES ('Spaniards Bay','Spaniards Bay','NL','Newfoundland and Labrador','47.6181','-53.3369',2653,40.4,'America/St_Johns',3,'A0A','1124334544');
INSERT INTO `canadacities` VALUES ('Cocagne','Cocagne','NB','New Brunswick','46.3406','-64.6200',2649,66.78,'America/Moncton',3,'E4R','1124000195');
INSERT INTO `canadacities` VALUES ('Pilot Butte','Pilot Butte','SK','Saskatchewan','50.4667','-104.4167',2638,462.3,'America/Regina',3,'S0G','1124343267');
INSERT INTO `canadacities` VALUES ('Saint-Bruno','Saint-Bruno','QC','Quebec','48.4667','-71.6500',2636,33.8,'America/Toronto',3,'G0W','1124000655');
INSERT INTO `canadacities` VALUES ('Laurier-Station','Laurier-Station','QC','Quebec','46.5333','-71.6333',2634,219.3,'America/Toronto',3,'G0S','1124029105');
INSERT INTO `canadacities` VALUES ('Saint-Anicet','Saint-Anicet','QC','Quebec','45.1200','-74.3500',2626,19.4,'America/Toronto',3,'J0S','1124287636');
INSERT INTO `canadacities` VALUES ('Cap-Chat','Cap-Chat','QC','Quebec','49.1000','-66.6833',2623,14.4,'America/Toronto',3,'G0J','1124662875');
INSERT INTO `canadacities` VALUES ('Sexsmith','Sexsmith','AB','Alberta','55.3508','-118.7825',2620,197.9,'America/Edmonton',3,'T0H','1124024490');
INSERT INTO `canadacities` VALUES ('Notre-Dame-de-Lourdes','Notre-Dame-de-Lourdes','QC','Quebec','46.1000','-73.4333',2595,72.6,'America/Toronto',4,'J0K','1124935751');
INSERT INTO `canadacities` VALUES ('Ville-Marie','Ville-Marie','QC','Quebec','47.3333','-79.4333',2595,424.8,'America/Toronto',3,'J9V','1124001938');
INSERT INTO `canadacities` VALUES ('Wickham','Wickham','QC','Quebec','45.7500','-72.5000',2587,26.2,'America/Toronto',3,'J0C','1124353605');
INSERT INTO `canadacities` VALUES ('Shippegan','Shippegan','NB','New Brunswick','47.7439','-64.7178',2580,257.6,'America/Moncton',3,'E8S','1124198415');
INSERT INTO `canadacities` VALUES ('East Garafraxa','East Garafraxa','ON','Ontario','43.8500','-80.2500',2579,15.5,'America/Toronto',3,'L9W','1124000753');
INSERT INTO `canadacities` VALUES ('Unity','Unity','SK','Saskatchewan','52.4333','-109.1667',2573,244.6,'America/Swift_Current',3,'S0K','1124230227');
INSERT INTO `canadacities` VALUES ('Rimbey','Rimbey','AB','Alberta','52.6333','-114.2167',2567,225.1,'America/Edmonton',3,'T0C','1124861733');
INSERT INTO `canadacities` VALUES ('High Prairie','High Prairie','AB','Alberta','55.4325','-116.4861',2564,355.3,'America/Edmonton',3,'T0G','1124163323');
INSERT INTO `canadacities` VALUES ('Turner Valley','Turner Valley','AB','Alberta','50.6739','-114.2786',2559,442.1,'America/Edmonton',3,'T0L','1124557397');
INSERT INTO `canadacities` VALUES ('Hanna','Hanna','AB','Alberta','51.6383','-111.9419',2559,290.6,'America/Edmonton',3,'T0J','1124751402');
INSERT INTO `canadacities` VALUES ('Neuville','Neuville','QC','Quebec','46.7000','-71.5833',2543,162.5,'America/Toronto',3,'G0A','1124862301');
INSERT INTO `canadacities` VALUES ('Fort Smith','Fort Smith','NT','Northwest Territories','60.0260','-112.0821',2542,27.4,'America/Yellowknife',4,'X0E','1124491408');
INSERT INTO `canadacities` VALUES ('Maria','Maria','QC','Quebec','48.1667','-65.9833',2536,26.7,'America/Toronto',3,'G0C','1124002967');
INSERT INTO `canadacities` VALUES ('Saint-Chrysostome','Saint-Chrysostome','QC','Quebec','45.1000','-73.7667',2522,25.2,'America/Toronto',3,'J0S','1124333805');
INSERT INTO `canadacities` VALUES ('Greater Madawaska','Greater Madawaska','ON','Ontario','45.2722','-76.8589',2518,2.4,'America/Toronto',3,'K7V K0J','1124001487');
INSERT INTO `canadacities` VALUES ('Berwick','Berwick','NS','Nova Scotia','45.0475','-64.7360',2509,381.3,'America/Halifax',3,'B0P','1124831957');
INSERT INTO `canadacities` VALUES ('Saint-Damase','Saint-Damase','QC','Quebec','45.5333','-73.0000',2506,31.7,'America/Toronto',3,'J0H','1124245814');
INSERT INTO `canadacities` VALUES ('Disraeli','Disraeli','QC','Quebec','45.9000','-71.3500',2502,362.1,'America/Toronto',3,'G0N','1124115327');
INSERT INTO `canadacities` VALUES ('Meadow Lake No. 588','Meadow Lake No. 588','SK','Saskatchewan','54.1213','-108.2837',2501,0.4,'America/Swift_Current',4,'S0M S9X','1124001846');
INSERT INTO `canadacities` VALUES ('Elkford','Elkford','BC','British Columbia','50.0214','-114.9158',2499,24.6,'America/Edmonton',3,'V0B','1124000218');
INSERT INTO `canadacities` VALUES ('Georgian Bay','Georgian Bay','ON','Ontario','44.9833','-79.8167',2499,4.6,'America/Toronto',3,'L0K','1124001020');
INSERT INTO `canadacities` VALUES ('Saint-Alexandre','Saint-Alexandre','QC','Quebec','45.2333','-73.1167',2495,32.8,'America/Toronto',3,'J0J','1124016760');
INSERT INTO `canadacities` VALUES ('Hérbertville','Herbertville','QC','Quebec','48.3473','-71.6784',2491,9.5,'America/Toronto',4,'G8N','1124806332');
INSERT INTO `canadacities` VALUES ('Moosomin','Moosomin','SK','Saskatchewan','50.1420','-101.6700',2485,327.5,'America/Regina',3,'S0G','1124103159');
INSERT INTO `canadacities` VALUES ('Highlands','Highlands','BC','British Columbia','48.5200','-123.5000',2482,65.3,'America/Vancouver',3,'V9B V9E','1124001752');
INSERT INTO `canadacities` VALUES ('North Kawartha','North Kawartha','ON','Ontario','44.7500','-78.1000',2479,3.2,'America/Toronto',3,'K0L','1124001184');
INSERT INTO `canadacities` VALUES ('Sainte-Thècle','Sainte-Thecle','QC','Quebec','46.8167','-72.5000',2478,11.6,'America/Toronto',3,'G0X','1124387301');
INSERT INTO `canadacities` VALUES ('Fermont','Fermont','QC','Quebec','52.7833','-67.0833',2474,5.2,'America/Toronto',3,'G0G','1124001089');
INSERT INTO `canadacities` VALUES ('Esterhazy','Esterhazy','SK','Saskatchewan','50.6500','-102.0667',2472,520.9,'America/Regina',3,'S0A','1124095034');
INSERT INTO `canadacities` VALUES ('Holyrood','Holyrood','NL','Newfoundland and Labrador','47.3833','-53.1333',2471,19.6,'America/St_Johns',4,'A0A','1124289617');
INSERT INTO `canadacities` VALUES ('La Présentation','La Presentation','QC','Quebec','45.6667','-73.0500',2466,26.1,'America/Toronto',3,'J0H','1124865042');
INSERT INTO `canadacities` VALUES ('Beaverlodge','Beaverlodge','AB','Alberta','55.2094','-119.4292',2465,430.5,'America/Edmonton',3,'T0H','1124894073');
INSERT INTO `canadacities` VALUES ('Sainte-Catherine-de-Hatley','Sainte-Catherine-de-Hatley','QC','Quebec','45.2500','-72.0500',2464,28.5,'America/Toronto',3,'J0B','1124000135');
INSERT INTO `canadacities` VALUES ('Saint-Basile','Saint-Basile','QC','Quebec','46.7500','-71.8167',2463,25.1,'America/Toronto',3,'G0A','1124369196');
INSERT INTO `canadacities` VALUES ('Saint-Raphaël','Saint-Raphael','QC','Quebec','46.8000','-70.7500',2463,20.3,'America/Toronto',4,'G0R','1124630982');
INSERT INTO `canadacities` VALUES ('Saint-Martin','Saint-Martin','QC','Quebec','45.9667','-70.6500',2462,20.8,'America/Toronto',4,'G0M','1124001971');
INSERT INTO `canadacities` VALUES ('Causapscal','Causapscal','QC','Quebec','48.3667','-67.2333',2458,15.2,'America/Toronto',3,'G0J','1124289460');
INSERT INTO `canadacities` VALUES ('Brigham','Brigham','QC','Quebec','45.2500','-72.8500',2457,28.2,'America/Toronto',3,'J2K','1124336821');
INSERT INTO `canadacities` VALUES ('Sainte-Victoire-de-Sorel','Sainte-Victoire-de-Sorel','QC','Quebec','45.9500','-73.0833',2457,32.6,'America/Toronto',4,'J0G','1124001523');
INSERT INTO `canadacities` VALUES ('Perry','Perry','ON','Ontario','45.5000','-79.2833',2454,13.1,'America/Toronto',3,'P0A','1124001994');
INSERT INTO `canadacities` VALUES ('Port-Daniel--Gascons','Port-Daniel--Gascons','QC','Quebec','48.1833','-64.9667',2453,8.1,'America/Toronto',3,'G0C','1124001024');
INSERT INTO `canadacities` VALUES ('Rosetown','Rosetown','SK','Saskatchewan','51.5500','-107.9833',2451,201.9,'America/Swift_Current',3,'S0L','1124742251');
INSERT INTO `canadacities` VALUES ('Minnedosa','Minnedosa','MB','Manitoba','50.2453','-99.8428',2449,161.1,'America/Winnipeg',3,'R0J','1124860237');
INSERT INTO `canadacities` VALUES ('Labelle','Labelle','QC','Quebec','46.2833','-74.7333',2445,12.3,'America/Toronto',3,'J0T','1124748931');
INSERT INTO `canadacities` VALUES ('Lincoln','Lincoln','NB','New Brunswick','45.8716','-66.5437',2441,95.6,'America/Moncton',4,'E3B','1124001266');
INSERT INTO `canadacities` VALUES ('Black River-Matheson','Black River-Matheson','ON','Ontario','48.5333','-80.4667',2438,2.1,'America/Toronto',3,'P0K','1124000106');
INSERT INTO `canadacities` VALUES ('Saint-Michel-des-Saints','Saint-Michel-des-Saints','QC','Quebec','46.6833','-73.9167',2436,4.9,'America/Toronto',3,'J0K','1124969050');
INSERT INTO `canadacities` VALUES ('Dufferin','Dufferin','MB','Manitoba','49.5319','-98.0700',2435,2.7,'America/Winnipeg',4,'R0G','1124001018');
INSERT INTO `canadacities` VALUES ('Saint-Victor','Saint-Victor','QC','Quebec','46.1500','-70.9000',2430,20.2,'America/Toronto',3,'G0M','1124899336');
INSERT INTO `canadacities` VALUES ('Sicamous','Sicamous','BC','British Columbia','50.8378','-118.9703',2429,192,'America/Vancouver',3,'V0E','1124519194');
INSERT INTO `canadacities` VALUES ('Cap Pele','Cap Pele','NB','New Brunswick','46.2172','-64.2822',2425,103.8,'America/Moncton',4,'E4N','1124541608');
INSERT INTO `canadacities` VALUES ('Kelsey','Kelsey','MB','Manitoba','53.7356','-101.3950',2424,2.8,'America/Winnipeg',3,'R9A R0B','1124001840');
INSERT INTO `canadacities` VALUES ('Killaloe, Hagarty and Richards','Killaloe, Hagarty and Richards','ON','Ontario','45.6000','-77.5000',2420,6.1,'America/Toronto',3,'K0J','1124001779');
INSERT INTO `canadacities` VALUES ('Alvinston','Alvinston','ON','Ontario','42.8489','-81.9049',2411,7.7,'America/Toronto',4,'N0N','1124753895');
INSERT INTO `canadacities` VALUES ('Trenton','Trenton','NS','Nova Scotia','45.6193','-62.6332',2407,396.7,'America/Halifax',3,'B0K','1124776153');
INSERT INTO `canadacities` VALUES ('Lunenburg','Lunenburg','NS','Nova Scotia','44.3833','-64.3167',2405,560.1,'America/Halifax',3,'B0J','1124214420');
INSERT INTO `canadacities` VALUES ('Saint-Éphrem-de-Beauce','Saint-Ephrem-de-Beauce','QC','Quebec','46.0516','-70.9374',2400,20.2,'America/Toronto',4,'G0M','1124956973');
INSERT INTO `canadacities` VALUES ('Chase','Chase','BC','British Columbia','50.8189','-119.6844',2399,639.3,'America/Vancouver',3,'V0E','1124452830');
INSERT INTO `canadacities` VALUES ('Léry','Lery','QC','Quebec','45.3500','-73.8000',2390,230.7,'America/Toronto',3,'J6N','11244812024');
INSERT INTO `canadacities` VALUES ('Assiniboia','Assiniboia','SK','Saskatchewan','49.6167','-105.9833',2389,630.3,'America/Regina',3,'S0H','1124513932');
INSERT INTO `canadacities` VALUES ('Tumbler Ridge','Tumbler Ridge','BC','British Columbia','55.1333','-121.0000',2389,1.3,'America/Dawson_Creek',3,'V0C','1124001642');
INSERT INTO `canadacities` VALUES ('Salisbury','Salisbury','NB','New Brunswick','46.0377884219739','-65.0479059884912',2387,176.1,'America/Moncton',4,'E4J','1124001982');
INSERT INTO `canadacities` VALUES ('Témiscaming','Temiscaming','QC','Quebec','46.7167','-79.1000',2385,3.3,'America/Toronto',3,'J0Z','1124002169');
INSERT INTO `canadacities` VALUES ('Magrath','Magrath','AB','Alberta','49.4239','-112.8683',2374,396.4,'America/Edmonton',3,'T0K','1124735480');
INSERT INTO `canadacities` VALUES ('Sainte-Geneviève-de-Berthier','Sainte-Genevieve-de-Berthier','QC','Quebec','46.0833','-73.2167',2365,35.5,'America/Toronto',4,'J0K','1124001090');
INSERT INTO `canadacities` VALUES ('Logy Bay-Middle Cove-Outer Cove','Logy Bay-Middle Cove-Outer Cove','NL','Newfoundland and Labrador','47.6300','-52.6800',2364,139.1,'America/St_Johns',3,'A1K','1124001213');
INSERT INTO `canadacities` VALUES ('Buctouche','Buctouche','NB','New Brunswick','46.4719','-64.7249',2361,130.5,'America/Moncton',3,'E4S','1124405790');
INSERT INTO `canadacities` VALUES ('Grand Manan','Grand Manan','NB','New Brunswick','44.6900','-66.8200',2360,15.8,'America/Moncton',3,'E5G','1124000229');
INSERT INTO `canadacities` VALUES ('Sainte-Madeleine','Sainte-Madeleine','QC','Quebec','45.6000','-73.1000',2356,439.8,'America/Toronto',3,'J0H','1124000679');
INSERT INTO `canadacities` VALUES ('Anmore','Anmore','BC','British Columbia','49.3144','-122.8564',2356,85.6,'America/Vancouver',3,'V3H','1124001000');
INSERT INTO `canadacities` VALUES ('Sainte-Croix','Sainte-Croix','QC','Quebec','46.6200','-71.7300',2352,33.8,'America/Toronto',3,'G0S','1124208011');
INSERT INTO `canadacities` VALUES ('Algonquin Highlands','Algonquin Highlands','ON','Ontario','45.4000','-78.7500',2351,2.3,'America/Toronto',3,'K0M','1124001381');
INSERT INTO `canadacities` VALUES ('Valcourt','Valcourt','QC','Quebec','45.5000','-72.3167',2349,467.3,'America/Toronto',3,'J0E','1124334549');
INSERT INTO `canadacities` VALUES ('Gimli','Gimli','MB','Manitoba','50.6330912150395','-96.9923294282923',2345,938,'America/Winnipeg',3,'R0C','1124472413');
INSERT INTO `canadacities` VALUES ('Saint George','Saint George','NB','New Brunswick','45.2916','-66.8501',2341,4.7,'America/Moncton',4,'E5C','1124000156');
INSERT INTO `canadacities` VALUES ('Saint-Mathieu','Saint-Mathieu','QC','Quebec','45.3167','-73.5164',2339,74.5,'America/Toronto',3,'J0L','1124978563');
INSERT INTO `canadacities` VALUES ('Paquetville','Paquetville','NB','New Brunswick','47.6334','-65.1803',2329,10.6,'America/Moncton',4,'E8R','1124000770');
INSERT INTO `canadacities` VALUES ('Clearwater','Clearwater','BC','British Columbia','51.6500','-120.0333',2324,41.7,'America/Vancouver',3,'V0E','1124911350');
INSERT INTO `canadacities` VALUES ('Addington Highlands','Addington Highlands','ON','Ontario','45.0000','-77.2500',2323,1.7,'America/Toronto',3,'K0H','1124001921');
INSERT INTO `canadacities` VALUES ('Lillooet','Lillooet','BC','British Columbia','50.6864','-121.9364',2321,84.4,'America/Vancouver',3,'V0K','1124632130');
INSERT INTO `canadacities` VALUES ('Burin','Burin','NL','Newfoundland and Labrador','47.0500','-55.1800',2315,67.8,'America/St_Johns',3,'A0E','1124434509');
INSERT INTO `canadacities` VALUES ('Grand Bank','Grand Bank','NL','Newfoundland and Labrador','47.1000','-55.7833',2310,136.1,'America/St_Johns',3,'A0E','1124257527');
INSERT INTO `canadacities` VALUES ('Waterville','Waterville','QC','Quebec','45.2667','-71.9000',2307,52.4,'America/Toronto',3,'J0B','1124639721');
INSERT INTO `canadacities` VALUES ('Minto','Minto','NB','New Brunswick','46.1497','-66.1067',2305,72.8,'America/Moncton',3,'E4B','1124754728');
INSERT INTO `canadacities` VALUES ('Rosthern No. 403','Rosthern No. 403','SK','Saskatchewan','52.6206','-106.3967',2300,2.4,'America/Regina',4,'S0K','1124001178');
INSERT INTO `canadacities` VALUES ('Mansfield-et-Pontefract','Mansfield-et-Pontefract','QC','Quebec','45.8611','-76.7392',2285,4.8,'America/Toronto',3,'J0X','1124000865');
INSERT INTO `canadacities` VALUES ('Saint-Denis','Saint-Denis','QC','Quebec','45.7833','-73.1500',2285,26.9,'America/Toronto',3,'J0H','1124298615');
INSERT INTO `canadacities` VALUES ('Gore','Gore','QC','Quebec','45.7700','-74.2500',2283,25.4,'America/Toronto',3,'J0V','1124000246');
INSERT INTO `canadacities` VALUES ('Outlook','Outlook','SK','Saskatchewan','51.5000','-107.0500',2279,291,'America/Swift_Current',3,'S0L','1124721522');
INSERT INTO `canadacities` VALUES ('Saint-Gédéon-de-Beauce','Saint-Gedeon-de-Beauce','QC','Quebec','45.8500','-70.6333',2277,11.6,'America/Toronto',4,'G0M','1124765625');
INSERT INTO `canadacities` VALUES ('Saint-Léonard-d''Aston','Saint-Leonard-d''Aston','QC','Quebec','46.1000','-72.3667',2271,27.5,'America/Toronto',3,'J0C','1124836222');
INSERT INTO `canadacities` VALUES ('Fort-Coulonge','Fort-Coulonge','QC','Quebec','45.8500','-76.7333',2263,462.4,'America/Toronto',3,'J0X','1124453309');
INSERT INTO `canadacities` VALUES ('Albanel','Albanel','QC','Quebec','48.8833','-72.4500',2262,11.4,'America/Toronto',3,'G8M','1124386968');
INSERT INTO `canadacities` VALUES ('St. Anthony','St. Anthony','NL','Newfoundland and Labrador','51.3725','-55.5947',2258,61,'America/St_Johns',3,'A0K','1124808047');
INSERT INTO `canadacities` VALUES ('Pessamit','Pessamit','QC','Quebec','49.0485','-68.6814',2256,8.8,'America/Toronto',4,'G0H','1124000551');
INSERT INTO `canadacities` VALUES ('Logan Lake','Logan Lake','BC','British Columbia','50.4911','-120.8153',2255,7,'America/Vancouver',3,'V0K','1124000306');
INSERT INTO `canadacities` VALUES ('Maskinongé','Maskinonge','QC','Quebec','46.2333','-73.0167',2253,30.2,'America/Toronto',3,'J0K','1124944084');
INSERT INTO `canadacities` VALUES ('Saint-Charles-de-Bellechasse','Saint-Charles-de-Bellechasse','QC','Quebec','46.7667','-70.9500',2246,24.1,'America/Toronto',4,'G0R','1124845287');
INSERT INTO `canadacities` VALUES ('Fogo Island','Fogo Island','NL','Newfoundland and Labrador','49.6667','-54.1833',2244,9.4,'America/St_Johns',3,'A0G','1124001746');
INSERT INTO `canadacities` VALUES ('Neebing','Neebing','ON','Ontario','48.1833','-89.4667',2241,2.6,'America/Toronto',3,'P7L','1124000953');
INSERT INTO `canadacities` VALUES ('Port McNeill','Port McNeill','BC','British Columbia','50.5903','-127.0847',2234,149.9,'America/Vancouver',3,'V0N','1124339378');
INSERT INTO `canadacities` VALUES ('Hatley','Hatley','QC','Quebec','45.2700','-71.9500',2230,31.1,'America/Toronto',4,'J0B','1124001440');
INSERT INTO `canadacities` VALUES ('East Broughton','East Broughton','QC','Quebec','46.2167','-71.0667',2229,255.3,'America/Toronto',3,'G0N','1124076092');
INSERT INTO `canadacities` VALUES ('Saint-Polycarpe','Saint-Polycarpe','QC','Quebec','45.3000','-74.3000',2224,31.8,'America/Toronto',3,'J0P','1124227112');
INSERT INTO `canadacities` VALUES ('Deschambault','Deschambault','QC','Quebec','46.6436','-72.0236',2220,17.8,'America/Toronto',4,'G0A','1124057933');
INSERT INTO `canadacities` VALUES ('Canora','Canora','SK','Saskatchewan','51.6339','-102.4369',2219,303.7,'America/Regina',3,'S0A','1124454845');
INSERT INTO `canadacities` VALUES ('Upper Miramichi','Upper Miramichi','NB','New Brunswick','46.5254','-66.2085',2218,1.2,'America/Moncton',4,'E9C E6A','1124001963');
INSERT INTO `canadacities` VALUES ('Tofino','Tofino','BC','British Columbia','49.1275','-125.8852',2217,183.1,'America/Vancouver',4,'V0R','1124140302');
INSERT INTO `canadacities` VALUES ('Hardwicke','Hardwicke','NB','New Brunswick','47.0208','-65.0302',2201,7.9,'America/Moncton',4,'E1N E9A','1124081011');
INSERT INTO `canadacities` VALUES ('Wendake','Wendake','QC','Quebec','46.8693','-71.3628',2200,1262,'America/Toronto',3,'G0A','1124000757');
INSERT INTO `canadacities` VALUES ('Saint-Côme','Saint-Come','QC','Quebec','46.2700','-73.7800',2198,13.5,'America/Toronto',3,'J0K','1124183187');
INSERT INTO `canadacities` VALUES ('Waskaganish','Waskaganish','QC','Quebec','51.3674','-78.7069',2196,4.4,'America/Toronto',4,'J0M J0Y','1124626196');
INSERT INTO `canadacities` VALUES ('Twillingate','Twillingate','NL','Newfoundland and Labrador','49.6444','-54.7436',2196,85.3,'America/St_Johns',3,'A0G','1124836835');
INSERT INTO `canadacities` VALUES ('Saint-Quentin','Saint-Quentin','NB','New Brunswick','47.5135','-67.3921',2194,517.2,'America/Moncton',3,'E8A','1124243371');
INSERT INTO `canadacities` VALUES ('Lebel-sur-Quévillon','Lebel-sur-Quevillon','QC','Quebec','49.0500','-76.9833',2187,53.8,'America/Toronto',3,'J0Y','1124000875');
INSERT INTO `canadacities` VALUES ('Calmar','Calmar','AB','Alberta','53.2500','-113.7833',2183,467.6,'America/Edmonton',3,'T0C','1124941943');
INSERT INTO `canadacities` VALUES ('Nanton','Nanton','AB','Alberta','50.3494','-113.7717',2181,447.8,'America/Edmonton',3,'T0L','1124418201');
INSERT INTO `canadacities` VALUES ('Pierreville','Pierreville','QC','Quebec','46.0667','-72.8167',2176,27.8,'America/Toronto',3,'J0G','1124888889');
INSERT INTO `canadacities` VALUES ('New-Wes-Valley','New-Wes-Valley','NL','Newfoundland and Labrador','49.1500','-53.5833',2172,16.3,'America/St_Johns',3,'A0G','1124000397');
INSERT INTO `canadacities` VALUES ('Pennfield Ridge','Pennfield Ridge','NB','New Brunswick','45.1924','-66.6858',2170,6,'America/Moncton',4,'E5H','1124474914');
INSERT INTO `canadacities` VALUES ('Northesk','Northesk','NB','New Brunswick','47.2569','-66.2613',2169,0.6,'America/Moncton',4,'E1V E9E','1124000917');
INSERT INTO `canadacities` VALUES ('West Interlake','West Interlake','MB','Manitoba','50.9837','-98.3572',2162,1.3,'America/Winnipeg',4,'R0C','1124001724');
INSERT INTO `canadacities` VALUES ('Biggar','Biggar','SK','Saskatchewan','52.0590','-107.9790',2161,137.2,'America/Swift_Current',3,'S0K','1124897904');
INSERT INTO `canadacities` VALUES ('Kent','Kent','NB','New Brunswick','46.6221','-67.2953',2153,2.6,'America/Moncton',4,'E7J','1124001214');
INSERT INTO `canadacities` VALUES ('Maple Creek','Maple Creek','SK','Saskatchewan','49.9167','-109.4667',2151,471.3,'America/Swift_Current',3,'S0N','1124706244');
INSERT INTO `canadacities` VALUES ('Wabana','Wabana','NL','Newfoundland and Labrador','47.6500','-52.9333',2146,148,'America/St_Johns',3,'A0A','1124180362');
INSERT INTO `canadacities` VALUES ('Bonfield','Bonfield','ON','Ontario','46.2167','-79.1333',2146,10.4,'America/Toronto',3,'P0H','1124001075');
INSERT INTO `canadacities` VALUES ('Saint-Gilles','Saint-Gilles','QC','Quebec','46.5167','-71.3667',2138,12.1,'America/Toronto',4,'G0S','1124239919');
INSERT INTO `canadacities` VALUES ('Saint-Bernard','Saint-Bernard','QC','Quebec','46.5000','-71.1333',2131,23.7,'America/Toronto',4,'G0S','1124594239');
INSERT INTO `canadacities` VALUES ('Sainte-Cécile-de-Milton','Sainte-Cecile-de-Milton','QC','Quebec','45.4833','-72.7500',2128,29.1,'America/Toronto',4,'J0E','1124000630');
INSERT INTO `canadacities` VALUES ('Saint-Roch-de-Richelieu','Saint-Roch-de-Richelieu','QC','Quebec','45.8833','-73.1667',2122,60.9,'America/Toronto',4,'J0L','1124796601');
INSERT INTO `canadacities` VALUES ('Burns Lake','Burns Lake','BC','British Columbia','54.2292','-125.7625',2117,269.8,'America/Vancouver',3,'V0J','1124512812');
INSERT INTO `canadacities` VALUES ('Redwater','Redwater','AB','Alberta','53.9489','-113.1067',2115,106.1,'America/Edmonton',3,'T0A','1124001733');
INSERT INTO `canadacities` VALUES ('Saint-Nazaire','Saint-Nazaire','QC','Quebec','48.5833','-71.5333',2114,14.6,'America/Toronto',4,'G0W','1124583281');
INSERT INTO `canadacities` VALUES ('Westfield Beach','Westfield Beach','NB','New Brunswick','45.3432','-66.2868',2114,7.2,'America/Moncton',4,'E5K E5S','11242024415');
INSERT INTO `canadacities` VALUES ('Saltair','Saltair','BC','British Columbia','48.9504','-123.7637',2114,311.7,'America/Vancouver',3,'V0R V9G','1124001512');
INSERT INTO `canadacities` VALUES ('Saint-Elzéar','Saint-Elzear','QC','Quebec','46.4000','-71.0667',2107,24.1,'America/Toronto',4,'G0S','1124069879');
INSERT INTO `canadacities` VALUES ('Hinchinbrooke','Hinchinbrooke','QC','Quebec','45.0500','-74.1000',2103,14.1,'America/Toronto',3,'J0S','1124000812');
INSERT INTO `canadacities` VALUES ('Dundurn No. 314','Dundurn No. 314','SK','Saskatchewan','51.8261','-106.5416',2101,2.6,'America/Regina',4,'S0K S7C','1124000094');
INSERT INTO `canadacities` VALUES ('Saint-François-Xavier-de-Brompton','Saint-Francois-Xavier-de-Brompton','QC','Quebec','45.5333','-72.0500',2101,21.5,'America/Toronto',4,'J0B','1124331796');
INSERT INTO `canadacities` VALUES ('Papineauville','Papineauville','QC','Quebec','45.6167','-75.0167',2101,34.3,'America/Toronto',3,'J0V','1124866604');
INSERT INTO `canadacities` VALUES ('Prairie View','Prairie View','MB','Manitoba','50.3304','-100.9803',2088,1.2,'America/Winnipeg',4,'R0J R0M','1124001412');
INSERT INTO `canadacities` VALUES ('Saint-Ignace-de-Loyola','Saint-Ignace-de-Loyola','QC','Quebec','46.0667','-73.1333',2086,57.7,'America/Toronto',3,'J0K','1124837640');
INSERT INTO `canadacities` VALUES ('Central Manitoulin','Central Manitoulin','ON','Ontario','45.7167','-82.2000',2084,4.8,'America/Toronto',3,'P0P','1124001582');
INSERT INTO `canadacities` VALUES ('Glovertown','Glovertown','NL','Newfoundland and Labrador','48.6667','-54.0500',2083,29.6,'America/St_Johns',3,'A0G','1124282877');
INSERT INTO `canadacities` VALUES ('Tofield','Tofield','AB','Alberta','53.3703','-112.6667',2081,253.4,'America/Edmonton',3,'T0B','1124392098');
INSERT INTO `canadacities` VALUES ('Madoc','Madoc','ON','Ontario','44.5833','-77.5167',2078,7.9,'America/Toronto',3,'K0K','1124600331');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-Sabrevois','Sainte-Anne-de-Sabrevois','QC','Quebec','45.2000','-73.2167',2074,46.3,'America/Toronto',3,'J0J','1124001436');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-la-Pérade','Sainte-Anne-de-la-Perade','QC','Quebec','46.5833','-72.2000',2072,18.8,'America/Toronto',3,'G0X','1124630006');
INSERT INTO `canadacities` VALUES ('Saint-Damien-de-Buckland','Saint-Damien-de-Buckland','QC','Quebec','46.6333','-70.6667',2071,25.2,'America/Toronto',4,'G0R','1124710733');
INSERT INTO `canadacities` VALUES ('Baker Lake','Baker Lake','NU','Nunavut','64.3287','-96.0308',2069,11.4,'America/Rankin_Inlet',4,'X0C','1124826935');
INSERT INTO `canadacities` VALUES ('Saint-Ferdinand','Saint-Ferdinand','QC','Quebec','46.1000','-71.5667',2067,15.1,'America/Toronto',3,'G0N','1124190438');
INSERT INTO `canadacities` VALUES ('Pouch Cove','Pouch Cove','NL','Newfoundland and Labrador','47.7670','-52.7670',2063,35.4,'America/St_Johns',3,'A0A','1124198879');
INSERT INTO `canadacities` VALUES ('Britannia No. 502','Britannia No. 502','SK','Saskatchewan','53.4236','-109.7772',2061,2.3,'America/Edmonton',4,'S9V','1124000458');
INSERT INTO `canadacities` VALUES ('Saint-Fulgence','Saint-Fulgence','QC','Quebec','48.4500','-70.9000',2061,5.9,'America/Toronto',4,'G0V','1124969917');
INSERT INTO `canadacities` VALUES ('Digby','Digby','NS','Nova Scotia','44.6222','-65.7606',2060,654.6,'America/Halifax',3,'B0V','1124797865');
INSERT INTO `canadacities` VALUES ('Manouane','Manouane','QC','Quebec','47.2091','-74.3833',2060,258.4,'America/Toronto',3,'J0K','1124764304');
INSERT INTO `canadacities` VALUES ('Saint-Gervais','Saint-Gervais','QC','Quebec','46.7167','-70.8833',2058,23.1,'America/Toronto',4,'G0R','1124488792');
INSERT INTO `canadacities` VALUES ('Saint-Alexandre-de-Kamouraska','Saint-Alexandre-de-Kamouraska','QC','Quebec','47.6817','-69.6250',2050,18.4,'America/Toronto',4,'G0L','1124090811');
INSERT INTO `canadacities` VALUES ('Saint-Marc-sur-Richelieu','Saint-Marc-sur-Richelieu','QC','Quebec','45.6833','-73.2000',2050,33.8,'America/Toronto',4,'J0L','1124009496');
INSERT INTO `canadacities` VALUES ('Mandeville','Mandeville','QC','Quebec','46.3667','-73.3500',20243,6.3,'America/Toronto',3,'J0K','1124912146');
INSERT INTO `canadacities` VALUES ('Caplan','Caplan','QC','Quebec','48.1000','-65.6833',2039,23.7,'America/Toronto',3,'G0C','1124049436');
INSERT INTO `canadacities` VALUES ('Allardville','Allardville','NB','New Brunswick','47.4321','-65.4383',2032,3.1,'America/Moncton',4,'E8L','1124442131');
INSERT INTO `canadacities` VALUES ('Saint-Damien','Saint-Damien','QC','Quebec','46.3300','-73.4800',2020,7.9,'America/Toronto',3,'J0K','1124745807');
INSERT INTO `canadacities` VALUES ('Lac-Nominingue','Lac-Nominingue','QC','Quebec','46.4000','-75.0333',2019,6.6,'America/Toronto',3,'J0W','1124245371');
INSERT INTO `canadacities` VALUES ('Obedjiwan','Obedjiwan','QC','Quebec','48.6686','-74.9289',2019,234.4,'America/Toronto',3,'G0W','1124832696');
INSERT INTO `canadacities` VALUES ('Rama','Rama','SK','Saskatchewan','51.7578','-103.0008',2016,3087.3,'America/Regina',2,'S0A','1124000936');
INSERT INTO `canadacities` VALUES ('Deloraine-Winchester','Deloraine-Winchester','MB','Manitoba','49.1775','-100.4322',2011,2,'America/Winnipeg',4,'R0M','1124000085');
INSERT INTO `canadacities` VALUES ('Oakland-Wawanesa','Oakland-Wawanesa','MB','Manitoba','49.6208','-99.8481',2011,2.9,'America/Winnipeg',4,'R0K','1124000206');
INSERT INTO `canadacities` VALUES ('Brenda-Waskada','Brenda-Waskada','MB','Manitoba','49.1775','-100.7019',2011,0.9,'America/Winnipeg',4,'R0M','1124000292');
INSERT INTO `canadacities` VALUES ('Russell-Binscarth','Russell-Binscarth','MB','Manitoba','50.7272','-101.3689',2011,4.3,'America/Winnipeg',4,'R0J','1124000326');
INSERT INTO `canadacities` VALUES ('Ellice-Archie','Ellice-Archie','MB','Manitoba','50.3239','-101.2729',2011,0.8,'America/Winnipeg',4,'R0M','1124000366');
INSERT INTO `canadacities` VALUES ('Souris-Glenwood','Souris-Glenwood','MB','Manitoba','49.6208','-100.2581',2011,4.4,'America/Winnipeg',4,'R0K','1124000381');
INSERT INTO `canadacities` VALUES ('Riverdale','Riverdale','MB','Manitoba','49.9750','-100.2789',2011,3.7,'America/Winnipeg',3,'R0K','1124000402');
INSERT INTO `canadacities` VALUES ('Pembina','Pembina','MB','Manitoba','49.1775','-98.5408',2011,2.1,'America/Winnipeg',3,'R0G','1124000460');
INSERT INTO `canadacities` VALUES ('Wallace-Woodworth','Wallace-Woodworth','MB','Manitoba','49.9156','-100.9389',2011,1.5,'America/Winnipeg',4,'R0M','1124000533');
INSERT INTO `canadacities` VALUES ('Lorne','Lorne','MB','Manitoba','49.4436','-98.7494',2011,3.3,'America/Winnipeg',3,'R0G R0K','1124000596');
INSERT INTO `canadacities` VALUES ('Yellowhead','Yellowhead','MB','Manitoba','50.4847','-100.4828',2011,1.8,'America/Winnipeg',4,'R0J','1124000631');
INSERT INTO `canadacities` VALUES ('Swan Valley West','Swan Valley West','MB','Manitoba','51.9978','-101.3944',2011,1.6,'America/Winnipeg',3,'R0L','1124000683');
INSERT INTO `canadacities` VALUES ('Grey','Grey','MB','Manitoba','49.7094','-98.0736',2011,2.8,'America/Winnipeg',4,'R0G','1124000699');
INSERT INTO `canadacities` VALUES ('Gilbert Plains','Gilbert Plains','MB','Manitoba','51.1547','-100.4381',2011,1.4,'America/Winnipeg',4,'R0L','1124524030');
INSERT INTO `canadacities` VALUES ('Norfolk-Treherne','Norfolk-Treherne','MB','Manitoba','49.6653','-98.5967',2011,2.4,'America/Winnipeg',4,'R0G','1124000889');
INSERT INTO `canadacities` VALUES ('Emerson-Franklin','Emerson-Franklin','MB','Manitoba','49.1333','-97.0331',2011,2.6,'America/Winnipeg',3,'R0A','1124000940');
INSERT INTO `canadacities` VALUES ('Sifton','Sifton','MB','Manitoba','49.6653','-100.6678',2011,2.6,'America/Winnipeg',3,'R0M','1124001004');
INSERT INTO `canadacities` VALUES ('Grassland','Grassland','MB','Manitoba','49.4306','-100.3103',2011,1.2,'America/Winnipeg',4,'R0K R0M','1124001149');
INSERT INTO `canadacities` VALUES ('Louise','Louise','MB','Manitoba','49.1772','-98.8794',2011,2,'America/Winnipeg',4,'R0G R0K','1124001192');
INSERT INTO `canadacities` VALUES ('Ste. Rose','Ste. Rose','MB','Manitoba','51.0222','-99.4306',2011,2.7,'America/Winnipeg',4,'R0J R0L','1124001220');
INSERT INTO `canadacities` VALUES ('Cartwright-Roblin','Cartwright-Roblin','MB','Manitoba','49.1331','-99.2797',2011,1.8,'America/Winnipeg',3,'R0K','1124001248');
INSERT INTO `canadacities` VALUES ('Mossey River','Mossey River','MB','Manitoba','51.7550','-99.9664',2011,1,'America/Winnipeg',4,'R0L','1124001378');
INSERT INTO `canadacities` VALUES ('Lakeshore','Lakeshore','MB','Manitoba','51.2440','-99.6562',2011,1.1,'America/Winnipeg',4,'R0L','1124001415');
INSERT INTO `canadacities` VALUES ('Riding Mountain West','Riding Mountain West','MB','Manitoba','50.8347','-101.0961',2011,0.9,'America/Winnipeg',3,'R0J','1124001496');
INSERT INTO `canadacities` VALUES ('Clanwilliam-Erickson','Clanwilliam-Erickson','MB','Manitoba','50.5061','-99.8156',2011,2.5,'America/Winnipeg',4,'R0J','1124001796');
INSERT INTO `canadacities` VALUES ('Glenboro-South Cypress','Glenboro-South Cypress','MB','Manitoba','49.6650','-99.3708',2011,1.4,'America/Winnipeg',4,'R0K','1124001832');
INSERT INTO `canadacities` VALUES ('North Norfolk','North Norfolk','MB','Manitoba','49.9308','-98.8356',2011,3.3,'America/Winnipeg',4,'R0H','1124001856');
INSERT INTO `canadacities` VALUES ('Reinland','Reinland','MB','Manitoba','49.1331','-97.5942',2011,6.2,'America/Winnipeg',3,'R0G','1124389945');
INSERT INTO `canadacities` VALUES ('Minitonas-Bowsman','Minitonas-Bowsman','MB','Manitoba','52.1433','-100.9772',2011,1.4,'America/Winnipeg',4,'R0L','1124001902');
INSERT INTO `canadacities` VALUES ('Kippens','Kippens','NL','Newfoundland and Labrador','48.5492','-58.6236',2008,140.3,'America/St_Johns',3,'A2N','1124001147');
INSERT INTO `canadacities` VALUES ('Saint-Gédéon','Saint-Gedeon','QC','Quebec','48.5000','-71.7667',2001,31.5,'America/Toronto',3,'G0W','1124458135');
INSERT INTO `canadacities` VALUES ('Lumby','Lumby','BC','British Columbia','50.2494','-118.9656',2000,379.5,'America/Vancouver',3,'V0E','1124173367');
INSERT INTO `canadacities` VALUES ('Kingsey Falls','Kingsey Falls','QC','Quebec','45.8500','-72.0667',2000,28.7,'America/Toronto',3,'J0A','1124274388');
INSERT INTO `canadacities` VALUES ('Provost','Provost','AB','Alberta','52.3539','-110.2686',1998,423,'America/Edmonton',3,'T0B','1124659213');
INSERT INTO `canadacities` VALUES ('Saint-Charles','Saint-Charles','NB','New Brunswick','46.6692','-65.0184',1997,11.4,'America/Moncton',4,'E4W','1124000730');
INSERT INTO `canadacities` VALUES ('Swift Current No. 137','Swift Current No. 137','SK','Saskatchewan','50.2211','-107.8559',1995,1.8,'America/Swift_Current',4,'S0N S9H','1124000742');
INSERT INTO `canadacities` VALUES ('Mattawa','Mattawa','ON','Ontario','46.3167','-78.7000',1993,544.8,'America/Toronto',3,'P0H','1124041230');
INSERT INTO `canadacities` VALUES ('Blucher','Blucher','SK','Saskatchewan','52.0134','-106.2176',1984,2.5,'America/Regina',4,'S0K S7B','1124237296');
INSERT INTO `canadacities` VALUES ('L''Ascension-de-Notre-Seigneur','L''Ascension-de-Notre-Seigneur','QC','Quebec','48.7000','-71.6833',1983,15,'America/Toronto',4,'G0W','1124000873');
INSERT INTO `canadacities` VALUES ('Bow Island','Bow Island','AB','Alberta','49.8667','-111.3667',1983,341.6,'America/Edmonton',3,'T0K','1124002843');
INSERT INTO `canadacities` VALUES ('Barraute','Barraute','QC','Quebec','48.4333','-77.6333',1980,4,'America/Toronto',3,'J0Y','1124495319');
INSERT INTO `canadacities` VALUES ('One Hundred Mile House','One Hundred Mile House','BC','British Columbia','51.6413','-121.3127',1980,37.2,'America/Vancouver',4,'V0K','1124920746');
INSERT INTO `canadacities` VALUES ('Saint-Liguori','Saint-Liguori','QC','Quebec','46.0167','-73.5667',1976,39.1,'America/Toronto',4,'J0K','1124672824');
INSERT INTO `canadacities` VALUES ('Saint Mary','Saint Mary','NB','New Brunswick','46.3987','-64.8681',1972,8.3,'America/Moncton',4,'E4S','1124001508');
INSERT INTO `canadacities` VALUES ('Saint-Patrice-de-Sherrington','Saint-Patrice-de-Sherrington','QC','Quebec','45.1667','-73.5167',1971,21.3,'America/Toronto',3,'J0L','1124878423');
INSERT INTO `canadacities` VALUES ('Fox Creek','Fox Creek','AB','Alberta','54.3950','-116.8092',1971,159.4,'America/Edmonton',3,'T0H','1124001709');
INSERT INTO `canadacities` VALUES ('Lumsden No. 189','Lumsden No. 189','SK','Saskatchewan','50.6734','-104.7686',1968,2.4,'America/Regina',4,'S0G','1124001061');
INSERT INTO `canadacities` VALUES ('Dawn-Euphemia','Dawn-Euphemia','ON','Ontario','42.7000','-82.0167',1967,4.4,'America/Toronto',3,'N0P','1124000898');
INSERT INTO `canadacities` VALUES ('Chapleau','Chapleau','ON','Ontario','47.8333','-83.4000',1964,138.2,'America/Toronto',3,'P0M','1124518288');
INSERT INTO `canadacities` VALUES ('Saint-Esprit','Saint-Esprit','QC','Quebec','45.9000','-73.6667',1963,36.4,'America/Toronto',3,'J0K','1124001003');
INSERT INTO `canadacities` VALUES ('Montague','Montague','PE','Prince Edward Island','46.1652','-62.6500',1961,620.8,'America/Halifax',3,NULL,'1124079838');
INSERT INTO `canadacities` VALUES ('Mashteuiatsh','Mashteuiatsh','QC','Quebec','48.5690','-72.2495',1957,134.9,'America/Toronto',4,'G0W','1124000997');
INSERT INTO `canadacities` VALUES ('Saint-François-du-Lac','Saint-Francois-du-Lac','QC','Quebec','46.0667','-72.8333',1957,30.4,'America/Toronto',3,'J0G','1124010410');
INSERT INTO `canadacities` VALUES ('Petit Rocher','Petit Rocher','NB','New Brunswick','47.7839','-65.7159',1954,432.2,'America/Moncton',3,'E8J','1124808094');
INSERT INTO `canadacities` VALUES ('Eel River Crossing','Eel River Crossing','NB','New Brunswick','48.0125','-66.4208',1953,29.8,'America/Moncton',3,'E8E','1124000490');
INSERT INTO `canadacities` VALUES ('Millet','Millet','AB','Alberta','53.0978','-113.4728',1945,522.9,'America/Edmonton',3,'T0C','1124327149');
INSERT INTO `canadacities` VALUES ('Ucluelet','Ucluelet','BC','British Columbia','48.9358','-125.5433',1940,264.5,'America/Vancouver',3,'V0R','1124290800');
INSERT INTO `canadacities` VALUES ('Vallée-Jonction','Vallee-Jonction','QC','Quebec','46.3667','-70.9167',1940,76.6,'America/Toronto',4,'G0S','1124672986');
INSERT INTO `canadacities` VALUES ('Manitouwadge','Manitouwadge','ON','Ontario','49.1333','-85.8333',1937,5.5,'America/Toronto',3,'P0T','1124548320');
INSERT INTO `canadacities` VALUES ('Wellington','Wellington','ON','Ontario','43.9579','-77.3534',1932,275.4,'America/Toronto',3,NULL,'1124209670');
INSERT INTO `canadacities` VALUES ('Frontenac Islands','Frontenac Islands','ON','Ontario','44.2000','-76.3833',1930,10.9,'America/Toronto',3,'K7G K0H','1124000098');
INSERT INTO `canadacities` VALUES ('Point Edward','Point Edward','ON','Ontario','42.9931','-82.4083',1930,585,'America/Detroit',3,'N7T N7V','1124647566');
INSERT INTO `canadacities` VALUES ('Picture Butte','Picture Butte','AB','Alberta','49.8731','-112.7800',1930,639.7,'America/Edmonton',3,'T0K','1124001015');
INSERT INTO `canadacities` VALUES ('Manners Sutton','Manners Sutton','NB','New Brunswick','45.6417','-67.0609',1920,3.7,'America/Moncton',4,'E6K','1124811576');
INSERT INTO `canadacities` VALUES ('Fort Qu’Appelle','Fort Qu''Appelle','SK','Saskatchewan','50.7667','-103.7833',1919,363.2,'America/Regina',3,'S0G','1124904751');
INSERT INTO `canadacities` VALUES ('Vulcan','Vulcan','AB','Alberta','50.4000','-113.2500',1917,302.3,'America/Edmonton',3,'T0L','1124607765');
INSERT INTO `canadacities` VALUES ('Chetwynd','Chetwynd','BC','British Columbia','55.6972','-121.6333',1917,181.7,'America/Dawson_Creek',3,'V0C','1124001005');
INSERT INTO `canadacities` VALUES ('Indian Head','Indian Head','SK','Saskatchewan','50.5333','-103.6667',1910,602,'America/Regina',3,'S0G','1124084038');
INSERT INTO `canadacities` VALUES ('Wabush','Wabush','NL','Newfoundland and Labrador','52.9081','-66.8690',1906,41.2,'America/Goose_Bay',3,'A0R','1124012604');
INSERT INTO `canadacities` VALUES ('Saint-Fabien','Saint-Fabien','QC','Quebec','48.3000','-68.8700',1906,15.9,'America/Toronto',4,'G0L','1124462554');
INSERT INTO `canadacities` VALUES ('Harrison Hot Springs','Harrison Hot Springs','BC','British Columbia','49.3000','-121.7819',1905,347.3,'America/Vancouver',3,'V0M','1124001888');
INSERT INTO `canadacities` VALUES ('Watrous','Watrous','SK','Saskatchewan','51.6841','-105.4661',1900,170.1,'America/Regina',4,'S0K','1124468381');
INSERT INTO `canadacities` VALUES ('North Frontenac','North Frontenac','ON','Ontario','44.9500','-76.9000',1898,1.6,'America/Toronto',3,'K0H','1124000803');
INSERT INTO `canadacities` VALUES ('Lac-Supérieur','Lac-Superieur','QC','Quebec','46.2000','-74.4667',1892,5.1,'America/Toronto',3,'J0T','1124000862');
INSERT INTO `canadacities` VALUES ('Les Escoumins','Les Escoumins','QC','Quebec','48.3500','-69.4000',1891,7,'America/Toronto',3,'G0T','1124123618');
INSERT INTO `canadacities` VALUES ('Richibucto','Richibucto','NB','New Brunswick','46.6189','-64.8385',1887,7.6,'America/Moncton',4,'E4W','1124000569');
INSERT INTO `canadacities` VALUES ('Terrasse-Vaudreuil','Terrasse-Vaudreuil','QC','Quebec','45.4000','-73.9833',1887,1782.4,'America/Toronto',3,'J7V','1124001658');
INSERT INTO `canadacities` VALUES ('Rivière-Beaudette','Riviere-Beaudette','QC','Quebec','45.2333','-74.3333',1885,101.9,'America/Toronto',3,'J0P','1124687157');
INSERT INTO `canadacities` VALUES ('Orkney No. 244','Orkney No. 244','SK','Saskatchewan','51.2557','-102.6469',1883,2.4,'America/Regina',4,'S3N','1124000139');
INSERT INTO `canadacities` VALUES ('Saint-Barthélemy','Saint-Barthelemy','QC','Quebec','46.1833','-73.1333',1883,17.9,'America/Toronto',4,'J0K','1124598418');
INSERT INTO `canadacities` VALUES ('Komoka','Komoka','ON','Ontario','42.9580','-81.4001',1882,1691.5,'America/Toronto',3,'N0L','1124109518');
INSERT INTO `canadacities` VALUES ('Nisga''a','Nisga''a','BC','British Columbia','55.1078','-129.4293',1880,0.9,'America/Vancouver',4,'V0J','1124000744');
INSERT INTO `canadacities` VALUES ('Austin','Austin','QC','Quebec','45.1833','-72.2833',1880,25.5,'America/Toronto',3,'J0B','1124000885');
INSERT INTO `canadacities` VALUES ('Saint-Paul-de-l''Île-aux-Noix','Saint-Paul-de-l''Ile-aux-Noix','QC','Quebec','45.1333','-73.2833',1877,63.4,'America/Toronto',3,'J0J','1124000680');
INSERT INTO `canadacities` VALUES ('Behchokò','Behchoko','NT','Northwest Territories','62.8184','-115.9933',1874,24.9,'America/Yellowknife',4,'X0E','1124001992');
INSERT INTO `canadacities` VALUES ('Saint-Cyprien-de-Napierville','Saint-Cyprien-de-Napierville','QC','Quebec','45.1833','-73.4167',1869,19.2,'America/Toronto',3,'J0J','1124000843');
INSERT INTO `canadacities` VALUES ('Valleyview','Valleyview','AB','Alberta','55.0686','-117.2683',1863,199.9,'America/Edmonton',3,'T0H','1124211786');
INSERT INTO `canadacities` VALUES ('Déléage','Deleage','QC','Quebec','46.3833','-75.9167',1856,7.5,'America/Toronto',4,'J9E','1124001615');
INSERT INTO `canadacities` VALUES ('Potton','Potton','QC','Quebec','45.0833','-72.3667',1849,7.1,'America/Toronto',3,'J0E','1124000571');
INSERT INTO `canadacities` VALUES ('Sainte-Béatrix','Sainte-Beatrix','QC','Quebec','46.2000','-73.6167',1849,22,'America/Toronto',3,'J0K','1124233714');
INSERT INTO `canadacities` VALUES ('Saint-Georges-de-Cacouna','Saint-Georges-de-Cacouna','QC','Quebec','47.9167','-69.5000',1848,29.4,'America/Toronto',3,'G0L','1124882699');
INSERT INTO `canadacities` VALUES ('Lakeview','Lakeview','BC','British Columbia','49.9026','-119.5699',1847,73.7,'America/Vancouver',4,'V1Z','1124001451');
INSERT INTO `canadacities` VALUES ('Sainte-Justine','Sainte-Justine','QC','Quebec','46.4000','-70.3500',1845,14.6,'America/Toronto',3,'G0R','1124340970');
INSERT INTO `canadacities` VALUES ('Saint-Valérien-de-Milton','Saint-Valerien-de-Milton','QC','Quebec','45.5667','-72.7167',1840,17.1,'America/Toronto',3,'J0H','1124253518');
INSERT INTO `canadacities` VALUES ('Saint-Cuthbert','Saint-Cuthbert','QC','Quebec','46.1500','-73.2333',1839,13.9,'America/Toronto',3,'J0K','1124546028');
INSERT INTO `canadacities` VALUES ('Saint-Blaise-sur-Richelieu','Saint-Blaise-sur-Richelieu','QC','Quebec','45.2167','-73.2833',1837,26.3,'America/Toronto',3,'J0J','1124693015');
INSERT INTO `canadacities` VALUES ('Middleton','Middleton','NS','Nova Scotia','44.9418','-65.0686',1832,329.1,'America/Halifax',3,'B0S','1124792393');
INSERT INTO `canadacities` VALUES ('Kamsack','Kamsack','SK','Saskatchewan','51.5650','-101.8947',1825,311.8,'America/Regina',3,'S0A','1124566093');
INSERT INTO `canadacities` VALUES ('Carberry','Carberry','MB','Manitoba','49.8689','-99.3594',1823,350.7,'America/Winnipeg',3,'R0K','1124314305');
INSERT INTO `canadacities` VALUES ('Saint-Joseph-de-Coleraine','Saint-Joseph-de-Coleraine','QC','Quebec','45.9700','-71.3700',1820,14.4,'America/Toronto',4,'G0N','1124000088');
INSERT INTO `canadacities` VALUES ('Trinity Bay North','Trinity Bay North','NL','Newfoundland and Labrador','48.4978','-53.0860',1819,71.5,'America/St_Johns',4,'A0C','1124001498');
INSERT INTO `canadacities` VALUES ('Pointe-Lebel','Pointe-Lebel','QC','Quebec','49.1667','-68.2000',1817,21.2,'America/Toronto',4,'G0H','1124216164');
INSERT INTO `canadacities` VALUES ('Grenville','Grenville','QC','Quebec','45.6333','-74.6000',1816,644.6,'America/Toronto',3,'J0V','1124831011');
INSERT INTO `canadacities` VALUES ('Saint-Michel-de-Bellechasse','Saint-Michel-de-Bellechasse','QC','Quebec','46.8667','-70.9167',1816,41,'America/Toronto',3,'G0R','1124972269');
INSERT INTO `canadacities` VALUES ('Sainte-Angèle-de-Monnoir','Sainte-Angele-de-Monnoir','QC','Quebec','45.3833','-73.1000',1812,39.9,'America/Toronto',3,'J0L','1124001386');
INSERT INTO `canadacities` VALUES ('Champlain','Champlain','QC','Quebec','46.4500','-72.3500',1807,31.1,'America/Toronto',3,'G0X','1124942363');
INSERT INTO `canadacities` VALUES ('Sacré-Coeur-Saguenay','Sacre-Coeur-Saguenay','QC','Quebec','48.2479','-69.8540',1803,5.9,'America/Toronto',4,'G0T','1124365978');
INSERT INTO `canadacities` VALUES ('Saint-Louis','Saint-Louis','NB','New Brunswick','46.7048','-65.1046',1802,7,'America/Moncton',4,'E4X','1124001801');
INSERT INTO `canadacities` VALUES ('Saint-Lucien','Saint-Lucien','QC','Quebec','45.8667','-72.2667',1801,16.2,'America/Toronto',4,'J0C','1124000172');
INSERT INTO `canadacities` VALUES ('Victoria','Victoria','NL','Newfoundland and Labrador','47.7675','-53.2411',1800,102,'America/St_Johns',3,'A0A','1124985055');
INSERT INTO `canadacities` VALUES ('Lumsden','Lumsden','SK','Saskatchewan','50.6463','-104.8676',1800,366,'America/Regina',3,'S0G','1124301488');
INSERT INTO `canadacities` VALUES ('Saint-Robert','Saint-Robert','QC','Quebec','45.9667','-73.0000',1794,27.7,'America/Toronto',3,'J0G','1124000874');
INSERT INTO `canadacities` VALUES ('Armstrong','Armstrong','MB','Manitoba','50.6400','-97.4950',1792,1,'America/Winnipeg',3,'R0C','1124000801');
INSERT INTO `canadacities` VALUES ('Keremeos','Keremeos','BC','British Columbia','49.2025','-119.8294',1791,717.5,'America/Vancouver',3,'V0X','1124920590');
INSERT INTO `canadacities` VALUES ('Regina Beach','Regina Beach','SK','Saskatchewan','50.7900','-104.9900',1790,332.7,'America/Regina',3,'S0G','1124000991');
INSERT INTO `canadacities` VALUES ('La Guadeloupe','La Guadeloupe','QC','Quebec','45.9500','-70.9300',1787,54.8,'America/Toronto',3,'G0M','1124124557');
INSERT INTO `canadacities` VALUES ('Sutton','Sutton','QC','Quebec','45.1037248954726','-72.6180936643302',1787,197.7,'America/Toronto',4,'J0E','1124001526');
INSERT INTO `canadacities` VALUES ('Saint Andrews','Saint Andrews','NB','New Brunswick','45.0740','-67.0521',1786,213.9,'America/Moncton',3,'E5B','1124559218');
INSERT INTO `canadacities` VALUES ('Saint-Placide','Saint-Placide','QC','Quebec','45.5333','-74.2000',1784,41.6,'America/Toronto',3,'J0V','1124722091');
INSERT INTO `canadacities` VALUES ('Grunthal','Grunthal','MB','Manitoba','49.4065','-96.8603',1782,661.2,'America/Winnipeg',3,'R0A','1124001008');
INSERT INTO `canadacities` VALUES ('Povungnituk','Povungnituk','QC','Quebec','60.0477','-77.2751',1779,20.6,'America/Toronto',4,'J0M','1124176799');
INSERT INTO `canadacities` VALUES ('Pointe-des-Cascades','Pointe-des-Cascades','QC','Quebec','45.3333','-73.9667',1775,646.8,'America/Toronto',3,'J0P','1124001740');
INSERT INTO `canadacities` VALUES ('Deseronto','Deseronto','ON','Ontario','44.2000','-77.0500',1774,705.7,'America/Toronto',3,'K0K','1124824752');
INSERT INTO `canadacities` VALUES ('Lamont','Lamont','AB','Alberta','53.7603','-112.7778',1774,192.8,'America/Edmonton',3,'T0B','1124567192');
INSERT INTO `canadacities` VALUES ('Chambord','Chambord','QC','Quebec','48.4333','-72.0667',1773,14.6,'America/Toronto',3,'G0W','1124404193');
INSERT INTO `canadacities` VALUES ('Maugerville','Maugerville','NB','New Brunswick','46.1301','-66.2859',1772,1.9,'America/Moncton',4,'E3A','1124001594');
INSERT INTO `canadacities` VALUES ('Dudswell','Dudswell','QC','Quebec','45.5833','-71.5833',1771,8.1,'America/Toronto',3,'J0B','1124209090');
INSERT INTO `canadacities` VALUES ('Nipissing','Nipissing','ON','Ontario','46.0500','-79.5500',1769,4.6,'America/Toronto',3,'P0H','1124001066');
INSERT INTO `canadacities` VALUES ('Shaunavon','Shaunavon','SK','Saskatchewan','49.6510','-108.4120',1769,344.2,'America/Swift_Current',3,'S0N','1124484836');
INSERT INTO `canadacities` VALUES ('Wynyard','Wynyard','SK','Saskatchewan','51.7667','-104.1833',1767,334.1,'America/Regina',3,'S0A','1124699826');
INSERT INTO `canadacities` VALUES ('Cambridge Bay','Cambridge Bay','NU','Nunavut','69.1528','-105.1707',1766,8.7,'America/Cambridge_Bay',4,'X0B','1124596377');
INSERT INTO `canadacities` VALUES ('Dalmeny','Dalmeny','SK','Saskatchewan','52.3411','-106.7733',1766,537.8,'America/Regina',3,'S0K','1124962648');
INSERT INTO `canadacities` VALUES ('Saint-Narcisse','Saint-Narcisse','QC','Quebec','46.5667','-72.4667',1762,16.8,'America/Toronto',3,'G0X','1124808791');
INSERT INTO `canadacities` VALUES ('Waswanipi','Waswanipi','QC','Quebec','49.7883','-75.9544',1759,4.2,'America/Toronto',4,'J0Y','1124000056');
INSERT INTO `canadacities` VALUES ('Inukjuak','Inukjuak','QC','Quebec','58.4824','-78.1309',1757,31.6,'America/Toronto',4,'J0M','1124369757');
INSERT INTO `canadacities` VALUES ('Balgonie','Balgonie','SK','Saskatchewan','50.4880','-104.2690',1756,369.2,'America/Regina',3,'S0G','1124001148');
INSERT INTO `canadacities` VALUES ('Piney','Piney','MB','Manitoba','49.2069','-95.8333',1755,0,'America/Winnipeg',3,'R0A','1124958787');
INSERT INTO `canadacities` VALUES ('Warfield','Warfield','BC','British Columbia','49.0953','-117.7344',1753,929.3,'America/Vancouver',3,'V1R','1124000473');
INSERT INTO `canadacities` VALUES ('Saint-Zacharie','Saint-Zacharie','QC','Quebec','46.1333','-70.3667',1751,9.4,'America/Toronto',4,'G0M','1124927704');
INSERT INTO `canadacities` VALUES ('Hemmingford','Hemmingford','QC','Quebec','45.0833','-73.5833',1747,11.1,'America/Toronto',3,'J0L','1124000648');
INSERT INTO `canadacities` VALUES ('Saint-Pierre-de-l''Île-d''Orléans','Saint-Pierre-de-l''Ile-d''Orleans','QC','Quebec','46.8833','-71.0667',1743,55.1,'America/Toronto',3,'G0A','1124000266');
INSERT INTO `canadacities` VALUES ('Kensington','Kensington','PE','Prince Edward Island','46.4333','-63.6500',1743,537.9,'America/Halifax',3,'C0B','1124918690');
INSERT INTO `canadacities` VALUES ('Shelburne','Shelburne','NS','Nova Scotia','43.7633','-65.3236',1743,197.2,'America/Halifax',3,'B0T','1124659892');
INSERT INTO `canadacities` VALUES ('Saint-Clet','Saint-Clet','QC','Quebec','45.3500','-74.2200',1738,44.3,'America/Toronto',3,'J0P','1124001293');
INSERT INTO `canadacities` VALUES ('Blumenort','Blumenort','MB','Manitoba','49.6033','-96.7006',1738,548.2,'America/Winnipeg',3,'R0A','1124001566');
INSERT INTO `canadacities` VALUES ('Brighton','Brighton','NB','New Brunswick','46.3316','-67.3585',1735,3.4,'America/Moncton',4,'E7L E7P','1124001133');
INSERT INTO `canadacities` VALUES ('Saint-Antoine','Saint-Antoine','NB','New Brunswick','46.3629','-64.7530',1733,274.3,'America/Moncton',3,'E4V','1124873921');
INSERT INTO `canadacities` VALUES ('Northampton','Northampton','NB','New Brunswick','46.1313','-67.4713',1724,7.1,'America/Moncton',4,'E7N','1124001603');
INSERT INTO `canadacities` VALUES ('Flat Rock','Flat Rock','NL','Newfoundland and Labrador','47.7086','-52.7144',1722,95.1,'America/St_Johns',3,'A1K','1124195076');
INSERT INTO `canadacities` VALUES ('Saint-Ours','Saint-Ours','QC','Quebec','45.8833','-73.1500',1721,29,'America/Toronto',3,'J0G','1124177651');
INSERT INTO `canadacities` VALUES ('Stephenville Crossing','Stephenville Crossing','NL','Newfoundland and Labrador','48.5167','-58.4167',1719,55.1,'America/St_Johns',3,'A0N','1124113007');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-de-la-Pocatière','Sainte-Anne-de-la-Pocatiere','QC','Quebec','47.3500','-70.0000',1717,31.1,'America/Toronto',3,'G0R','1124000130');
INSERT INTO `canadacities` VALUES ('Popkum','Popkum','BC','British Columbia','49.1911','-121.7553',1710,268.2,'America/Vancouver',3,'V0X','1124000726');
INSERT INTO `canadacities` VALUES ('Notre-Dame-du-Bon-Conseil','Notre-Dame-du-Bon-Conseil','QC','Quebec','46.0000','-72.3500',1708,406.5,'America/Toronto',3,'J0C','1124217511');
INSERT INTO `canadacities` VALUES ('Fisher','Fisher','MB','Manitoba','51.0825','-97.6611',1708,1.2,'America/Winnipeg',4,'R0C','1124001091');
INSERT INTO `canadacities` VALUES ('Sainte-Clotilde','Sainte-Clotilde','QC','Quebec','45.1500','-73.6833',1704,21.6,'America/Toronto',3,'J0L','1124121082');
INSERT INTO `canadacities` VALUES ('Lantz','Lantz','NS','Nova Scotia','44.9894','-63.4736',1703,573.6,'America/Halifax',3,'B2S','1124980158');
INSERT INTO `canadacities` VALUES ('Wicklow','Wicklow','NB','New Brunswick','46.5017','-67.7067',1697,8.7,'America/Moncton',4,'E7K E7L','1124000344');
INSERT INTO `canadacities` VALUES ('Nouvelle','Nouvelle','QC','Quebec','48.1333','-66.3167',1689,7.3,'America/Toronto',3,'G0C','1124064051');
INSERT INTO `canadacities` VALUES ('Wasagamack','Wasagamack','MB','Manitoba','53.9056','-94.9412',1689,17.3,'America/Winnipeg',4,'R0B','1124000650');
INSERT INTO `canadacities` VALUES ('Rosthern','Rosthern','SK','Saskatchewan','52.6500','-106.3333',1688,392,'America/Regina',3,'S0K','1124886826');
INSERT INTO `canadacities` VALUES ('Yamaska','Yamaska','QC','Quebec','46.0236','-72.9391',1687,23.2,'America/Toronto',4,'J0G','1124001651');
INSERT INTO `canadacities` VALUES ('Neguac','Neguac','NB','New Brunswick','47.2333','-65.0500',1684,62.9,'America/Moncton',3,'E9G','1124936735');
INSERT INTO `canadacities` VALUES ('Saint-Antoine-de-Tilly','Saint-Antoine-de-Tilly','QC','Quebec','46.6667','-71.5833',1682,28.1,'America/Toronto',4,'G0S','1124590960');
INSERT INTO `canadacities` VALUES ('Igloolik','Igloolik','NU','Nunavut','69.3817','-81.6811',1682,16.3,'America/Iqaluit',4,'X0A','1124253277');
INSERT INTO `canadacities` VALUES ('Whitehead','Whitehead','MB','Manitoba','49.7981','-100.2575',1679,2.9,'America/Winnipeg',4,'R7A R0K','1124001853');
INSERT INTO `canadacities` VALUES ('Saint-Élie-de-Caxton','Saint-Elie-de-Caxton','QC','Quebec','46.4833','-72.9667',1676,14.2,'America/Toronto',3,'G0X','1124000951');
INSERT INTO `canadacities` VALUES ('Balmoral','Balmoral','NB','New Brunswick','47.9667','-66.4500',1674,38.6,'America/Moncton',3,'E8E','1124774000');
INSERT INTO `canadacities` VALUES ('Price','Price','QC','Quebec','48.6017','-68.1227',1673,646,'America/Toronto',3,'G0J','1124592512');
INSERT INTO `canadacities` VALUES ('Rosedale','Rosedale','MB','Manitoba','50.4397','-99.5389',1672,1.9,'America/Winnipeg',4,'R0J','1124000230');
INSERT INTO `canadacities` VALUES ('Saint-Jacques-le-Mineur','Saint-Jacques-le-Mineur','QC','Quebec','45.2833','-73.4167',1672,24.9,'America/Toronto',3,'J0J','1124000320');
INSERT INTO `canadacities` VALUES ('Coombs','Coombs','BC','British Columbia','49.3008','-124.4049',1672,107.4,'America/Vancouver',4,'V0R','1124001663');
INSERT INTO `canadacities` VALUES ('Val-Joli','Val-Joli','QC','Quebec','45.6000','-71.9700',1671,18.2,'America/Toronto',4,'J1S','1124000422');
INSERT INTO `canadacities` VALUES ('Southesk','Southesk','NB','New Brunswick','46.9901','-66.4336',1666,0.7,'America/Moncton',4,'E9E','1124001519');
INSERT INTO `canadacities` VALUES ('Huron Shores','Huron Shores','ON','Ontario','46.2833','-83.2000',1664,3.8,'America/Toronto',3,'P0R','1124000756');
INSERT INTO `canadacities` VALUES ('Saint-Antoine-sur-Richelieu','Saint-Antoine-sur-Richelieu','QC','Quebec','45.7833','-73.1833',1659,25.2,'America/Toronto',4,'J0L','1124151577');
INSERT INTO `canadacities` VALUES ('Saint-Pacôme','Saint-Pacome','QC','Quebec','47.4000','-69.9500',1658,57.5,'America/Toronto',4,'G0L','1124275513');
INSERT INTO `canadacities` VALUES ('Saint-Stanislas-de-Kostka','Saint-Stanislas-de-Kostka','QC','Quebec','45.1800','-74.1300',1654,28.7,'America/Toronto',3,'J0S','1124267249');
INSERT INTO `canadacities` VALUES ('Saint-Jacques','Saint-Jacques','NB','New Brunswick','47.5634','-68.3693',1652,5.5,'America/Moncton',4,'E7B','1124840998');
INSERT INTO `canadacities` VALUES ('Frontenac','Frontenac','QC','Quebec','45.5800','-70.8300',1650,7.4,'America/Toronto',4,'G6B','1124001833');
INSERT INTO `canadacities` VALUES ('Stuartburn','Stuartburn','MB','Manitoba','49.1331','-96.5158',1648,1.4,'America/Winnipeg',3,'R0A','1124000992');
INSERT INTO `canadacities` VALUES ('Sainte-Émélie-de-l''Énergie','Sainte-Emelie-de-l''Energie','QC','Quebec','46.3167','-73.6500',1644,10.7,'America/Toronto',3,'J0K','1124367776');
INSERT INTO `canadacities` VALUES ('Saint-Charles-sur-Richelieu','Saint-Charles-sur-Richelieu','QC','Quebec','45.6833','-73.1833',1643,25.2,'America/Toronto',3,'J0H','1124477144');
INSERT INTO `canadacities` VALUES ('Nipigon','Nipigon','ON','Ontario','49.0153','-88.2683',1642,15,'America/Toronto',3,'P0T','1124361489');
INSERT INTO `canadacities` VALUES ('Witless Bay','Witless Bay','NL','Newfoundland and Labrador','47.2800','-52.8300',1640,93.1,'America/St_Johns',3,'A0A','1124037826');
INSERT INTO `canadacities` VALUES ('Sainte-Hélène-de-Bagot','Sainte-Helene-de-Bagot','QC','Quebec','45.7333','-72.7333',1637,22.3,'America/Toronto',3,'J0H','1124837882');
INSERT INTO `canadacities` VALUES ('Franklin Centre','Franklin Centre','QC','Quebec','45.0467','-73.9005',1636,14.5,'America/Toronto',4,'J0S','1124556676');
INSERT INTO `canadacities` VALUES ('Harbour Breton','Harbour Breton','NL','Newfoundland and Labrador','47.4833','-55.8333',1634,118.9,'America/St_Johns',3,'A0H','1124833379');
INSERT INTO `canadacities` VALUES ('Mille-Isles','Mille-Isles','QC','Quebec','45.8200','-74.2200',1629,26.8,'America/Toronto',3,'J0R','1124001094');
INSERT INTO `canadacities` VALUES ('Naramata','Naramata','BC','British Columbia','49.5886','-119.5838',1628,200.7,'America/Vancouver',3,'V0H','1124000620');
INSERT INTO `canadacities` VALUES ('Lyster','Lyster','QC','Quebec','46.3667','-71.6167',1628,9.7,'America/Toronto',4,'G0S','1124296106');
INSERT INTO `canadacities` VALUES ('Oakview','Oakview','MB','Manitoba','50.1964','-100.2167',1626,1.4,'America/Winnipeg',4,'R0K','1124000384');
INSERT INTO `canadacities` VALUES ('Harrison Park','Harrison Park','MB','Manitoba','50.5563','-100.1674',1622,1.7,'America/Winnipeg',4,'R0J','1124000697');
INSERT INTO `canadacities` VALUES ('Pond Inlet','Pond Inlet','NU','Nunavut','72.6808','-77.7503',1617,9.3,'America/Iqaluit',4,'X0A','1124788973');
INSERT INTO `canadacities` VALUES ('Sainte-Clotilde-de-Horton','Sainte-Clotilde-de-Horton','QC','Quebec','45.9833','-72.2333',1616,14.2,'America/Toronto',4,'J0A','1124416351');
INSERT INTO `canadacities` VALUES ('Burford','Burford','ON','Ontario','43.1036','-80.4240',1615,208.2,'America/Toronto',3,NULL,'1124578509');
INSERT INTO `canadacities` VALUES ('Saint-Benoît-Labre','Saint-Benoit-Labre','QC','Quebec','46.0667','-70.8000',1612,19,'America/Toronto',4,'G0M','1124381557');
INSERT INTO `canadacities` VALUES ('Terrace Bay','Terrace Bay','ON','Ontario','48.8000','-87.1000',1611,10.5,'America/Toronto',3,'P0T','1124634789');
INSERT INTO `canadacities` VALUES ('Maliotenam','Maliotenam','QC','Quebec','50.2114','-66.1911',1610,309.7,'America/Toronto',3,'G4R','1124000333');
INSERT INTO `canadacities` VALUES ('Chapais','Chapais','QC','Quebec','49.7819','-74.8544',1610,25.3,'America/Toronto',3,'G0W','1124629095');
INSERT INTO `canadacities` VALUES ('Saint-Honoré-de-Shenley','Saint-Honore-de-Shenley','QC','Quebec','45.9667','-70.8333',1610,12.1,'America/Toronto',4,'G0M','1124007745');
INSERT INTO `canadacities` VALUES ('Cleveland','Cleveland','QC','Quebec','45.6700','-72.0800',1609,12.9,'America/Toronto',4,'J0B','1124001081');
INSERT INTO `canadacities` VALUES ('Messines','Messines','QC','Quebec','46.2333','-76.0167',1608,14.1,'America/Toronto',3,'J0X','1124295094');
INSERT INTO `canadacities` VALUES ('Saint-Laurent-de-l''Île-d''Orléans','Saint-Laurent-de-l''Ile-d''Orleans','QC','Quebec','46.8667','-71.0167',1607,45.1,'America/Toronto',3,'G0A','1124000659');
INSERT INTO `canadacities` VALUES ('Saint-Jean-de-Dieu','Saint-Jean-de-Dieu','QC','Quebec','48.0000','-69.0500',1606,10.6,'America/Toronto',4,'G0L','1124739032');
INSERT INTO `canadacities` VALUES ('Massey Drive','Massey Drive','NL','Newfoundland and Labrador','48.9372','-57.9000',1606,655.1,'America/St_Johns',3,'A2H','1124000923');
INSERT INTO `canadacities` VALUES ('Nakusp','Nakusp','BC','British Columbia','50.2434','-117.8002',1605,195.2,'America/Vancouver',3,'V0G','1124310238');
INSERT INTO `canadacities` VALUES ('Florenceville','Florenceville','NB','New Brunswick','46.4435','-67.6152',1604,102.7,'America/Moncton',3,'E7L','1124518996');
INSERT INTO `canadacities` VALUES ('Larouche','Larouche','QC','Quebec','48.4500','-71.5167',1601,18.9,'America/Toronto',4,'G0W','1124000827');
INSERT INTO `canadacities` VALUES ('Fort St. James','Fort St. James','BC','British Columbia','54.4431','-124.2542',1598,72,'America/Vancouver',3,'V0J','1124865218');
INSERT INTO `canadacities` VALUES ('Saint-François-de-la-Rivière-du-Sud','Saint-Francois-de-la-Riviere-du-Sud','QC','Quebec','46.8833','-70.7167',1596,17,'America/Toronto',4,'G0R','1124001406');
INSERT INTO `canadacities` VALUES ('Wabasca','Wabasca','AB','Alberta','55.9855','-113.8566',1594,15.7,'America/Edmonton',4,'T0G','1124001857');
INSERT INTO `canadacities` VALUES ('Hilliers','Hilliers','BC','British Columbia','49.3022','-124.4727',1590,54.7,'America/Vancouver',4,'V0R V9K','1124744995');
INSERT INTO `canadacities` VALUES ('Perth','Perth','NB','New Brunswick','46.7393','-67.6984',1590,177.3,'America/Moncton',3,'E7H','1124468740');
INSERT INTO `canadacities` VALUES ('Eeyou Istchee Baie-James','Eeyou Istchee Baie-James','QC','Quebec','52.3382','-75.1977',1589,0,'America/Toronto',4,'J0Y','1124001722');
INSERT INTO `canadacities` VALUES ('Shellbrook No. 493','Shellbrook No. 493','SK','Saskatchewan','53.3545','-106.2553',1587,1.3,'America/Regina',4,'S0J','1124000896');
INSERT INTO `canadacities` VALUES ('Shawville','Shawville','QC','Quebec','45.6000','-76.4833',1587,294.5,'America/Toronto',3,'J0X','1124868099');
INSERT INTO `canadacities` VALUES ('Lambton','Lambton','QC','Quebec','45.8300','-71.0800',1584,14.6,'America/Toronto',4,'G0M','1124236153');
INSERT INTO `canadacities` VALUES ('Saint-Flavien','Saint-Flavien','QC','Quebec','46.5167','-71.6000',1578,23.4,'America/Toronto',4,'G0S','1124326824');
INSERT INTO `canadacities` VALUES ('Boissevain','Boissevain','MB','Manitoba','49.2298751870001','-100.059391205376',1577,544.7,'America/Winnipeg',3,'R0K','1124368869');
INSERT INTO `canadacities` VALUES ('Sainte-Marcelline-de-Kildare','Sainte-Marcelline-de-Kildare','QC','Quebec','46.1167','-73.6000',1567,45.2,'America/Toronto',4,'J0K','1124028672');
INSERT INTO `canadacities` VALUES ('Rivière-Blanche','Riviere-Blanche','QC','Quebec','48.7833','-67.7000',1567,13,'America/Toronto',3,'G0J','1124696529');
INSERT INTO `canadacities` VALUES ('Bay Bulls','Bay Bulls','NL','Newfoundland and Labrador','47.3158','-52.8103',1566,51.2,'America/St_Johns',3,'A0A','1124701391');
INSERT INTO `canadacities` VALUES ('Saint-Félix-de-Kingsey','Saint-Felix-de-Kingsey','QC','Quebec','45.8000','-72.1833',1563,12.3,'America/Toronto',3,'J0B','1124052771');
INSERT INTO `canadacities` VALUES ('Upper Island Cove','Upper Island Cove','NL','Newfoundland and Labrador','47.6472','-53.2233',1561,199,'America/St_Johns',3,'A0A','1124254175');
INSERT INTO `canadacities` VALUES ('Sainte-Élisabeth','Sainte-Elisabeth','QC','Quebec','46.0833','-73.3500',1559,18.8,'America/Toronto',4,'J0K','1124368135');
INSERT INTO `canadacities` VALUES ('Ashcroft','Ashcroft','BC','British Columbia','50.7256','-121.2806',1558,32.3,'America/Vancouver',3,'V0K','1124521001');
INSERT INTO `canadacities` VALUES ('Clarkes Beach','Clarkes Beach','NL','Newfoundland and Labrador','47.5447','-53.2824',1558,122.6,'America/St_Johns',4,'A0A','1124886112');
INSERT INTO `canadacities` VALUES ('Falmouth','Falmouth','NS','Nova Scotia','44.9967','-64.1634',1553,297.8,'America/Halifax',3,'B0P','1124001382');
INSERT INTO `canadacities` VALUES ('Uashat','Uashat','QC','Quebec','50.2330','-66.3947',1550,657.2,'America/Toronto',3,'G4R G4S','1124001483');
INSERT INTO `canadacities` VALUES ('Saint-Bernard-de-Lacolle','Saint-Bernard-de-Lacolle','QC','Quebec','45.0833','-73.4167',1549,13,'America/Toronto',3,'J0J','1124000541');
INSERT INTO `canadacities` VALUES ('Saint-Joseph','Saint-Joseph','NB','New Brunswick','47.5580','-68.3082',1549,4.8,'America/Moncton',4,'E7B','1124001284');
INSERT INTO `canadacities` VALUES ('Belledune','Belledune','NB','New Brunswick','47.9000','-65.8167',1548,8.2,'America/Moncton',3,'E8G','1124444357');
INSERT INTO `canadacities` VALUES ('Saint-Guillaume','Saint-Guillaume','QC','Quebec','45.8833','-72.7667',1547,17.6,'America/Toronto',4,'J0C','1124732782');
INSERT INTO `canadacities` VALUES ('Venise-en-Québec','Venise-en-Quebec','QC','Quebec','45.0833','-73.1333',1547,116.9,'America/Toronto',3,'J0J','1124001019');
INSERT INTO `canadacities` VALUES ('Gambo','Gambo','NL','Newfoundland and Labrador','48.7833','-54.2167',1543,156.3,'America/St_Johns',3,'A0G','1124499854');
INSERT INTO `canadacities` VALUES ('Nauwigewauk','Nauwigewauk','NB','New Brunswick','45.4812','-65.8738',1538,50.5,'America/Moncton',4,'E5N','1124029649');
INSERT INTO `canadacities` VALUES ('Humbermouth','Humbermouth','NL','Newfoundland and Labrador','49.0156','-58.1678',1537,23.6,'America/St_Johns',4,'A0L','1124416255');
INSERT INTO `canadacities` VALUES ('Springbrook','Springbrook','AB','Alberta','52.1796','-113.8850',1534,291.6,'America/Edmonton',3,'T4S','1124001537');
INSERT INTO `canadacities` VALUES ('Saint-Paulin','Saint-Paulin','QC','Quebec','46.4167','-73.0333',1534,16,'America/Toronto',4,'J0K','1124571978');
INSERT INTO `canadacities` VALUES ('Glenelg','Glenelg','NB','New Brunswick','46.9455','-65.2893',1532,3,'America/Moncton',4,'E1N','1124001212');
INSERT INTO `canadacities` VALUES ('Saint David','Saint David','NB','New Brunswick','45.2918','-67.1983',1529,8,'America/Moncton',4,'E5A E3L','1124001550');
INSERT INTO `canadacities` VALUES ('Saint-Albert','Saint-Albert','QC','Quebec','46.0000','-72.0833',1526,21.8,'America/Toronto',4,'J0A','1124484773');
INSERT INTO `canadacities` VALUES ('Matagami','Matagami','QC','Quebec','49.7500','-77.6333',1526,22.8,'America/Toronto',3,'J0Y','1124686252');
INSERT INTO `canadacities` VALUES ('Grindrod','Grindrod','BC','British Columbia','50.6300','-119.1314',1526,35.3,'America/Vancouver',4,'V0E V1E','1124245869');
INSERT INTO `canadacities` VALUES ('Springfield','Springfield','NB','New Brunswick','45.7005','-65.8079',1525,6.1,'America/Moncton',4,'E5T E5P','1124760693');
INSERT INTO `canadacities` VALUES ('Amherst','Amherst','QC','Quebec','46.0500','-74.7667',1524,6.6,'America/Toronto',3,'J0T','1124000118');
INSERT INTO `canadacities` VALUES ('Carlyle','Carlyle','SK','Saskatchewan','49.6333','-102.2667',1519,451.1,'America/Regina',3,'S0C','1124830228');
INSERT INTO `canadacities` VALUES ('Notre-Dame-du-Laus','Notre-Dame-du-Laus','QC','Quebec','46.0833','-75.6167',1518,1.8,'America/Toronto',3,'J0X','1124131832');
INSERT INTO `canadacities` VALUES ('Langham','Langham','SK','Saskatchewan','52.3667','-106.9667',1518,355.1,'America/Regina',3,'S0K','1124101937');
INSERT INTO `canadacities` VALUES ('St. George','St. George','NB','New Brunswick','45.1333','-66.8167',1517,93.8,'America/Moncton',3,'E5C','1124740743');
INSERT INTO `canadacities` VALUES ('Wembley','Wembley','AB','Alberta','55.1572','-119.1392',1516,318.9,'America/Edmonton',3,'T0H','1124957462');
INSERT INTO `canadacities` VALUES ('Macdonald, Meredith and Aberdeen Additional','Macdonald, Meredith and Aberdeen Additional','ON','Ontario','46.4833','-84.0667',1513,9.3,'America/Toronto',3,'P0S','1124001485');
INSERT INTO `canadacities` VALUES ('Pinawa','Pinawa','MB','Manitoba','50.1707','-95.9547',1512,11.7,'America/Winnipeg',4,'R0E','1124622420');
INSERT INTO `canadacities` VALUES ('Windermere','Windermere','BC','British Columbia','50.4856','-115.9948',1511,144.7,'America/Edmonton',4,'V0A V0B','1124519589');
INSERT INTO `canadacities` VALUES ('Saint-Tite-des-Caps','Saint-Tite-des-Caps','QC','Quebec','47.1333','-70.7667',1506,11.7,'America/Toronto',3,'G0A','1124367873');
INSERT INTO `canadacities` VALUES ('Hudson Bay','Hudson Bay','SK','Saskatchewan','52.8510','-102.3920',1504,86.7,'America/Regina',3,'S0E','1124151446');
INSERT INTO `canadacities` VALUES ('Brudenell, Lyndoch and Raglan','Brudenell, Lyndoch and Raglan','ON','Ontario','45.3167','-77.4000',1503,2.1,'America/Toronto',3,'K0J','1124001367');
INSERT INTO `canadacities` VALUES ('Gold River','Gold River','BC','British Columbia','49.7769','-126.0514',1500,15,'America/Vancouver',3,'V0P','1124000663');
INSERT INTO `canadacities` VALUES ('Saint-Casimir','Saint-Casimir','QC','Quebec','46.6500','-72.1333',1500,22.5,'America/Toronto',3,'G0A','1124445682');
INSERT INTO `canadacities` VALUES ('Dunsmuir','Dunsmuir','BC','British Columbia','49.3696','-124.5772',1497,70.2,'America/Vancouver',4,'V9K','1124000426');
INSERT INTO `canadacities` VALUES ('Frenchman Butte','Frenchman Butte','SK','Saskatchewan','53.6052','-109.4298',1494,0.8,'America/Swift_Current',4,'S0M','1124729147');
INSERT INTO `canadacities` VALUES ('Gordon','Gordon','NB','New Brunswick','46.8363','-67.1913',1493,1,'America/Moncton',4,'E7G','1124001029');
INSERT INTO `canadacities` VALUES ('Saint-Malachie','Saint-Malachie','QC','Quebec','46.5333','-70.7667',1489,14.8,'America/Toronto',3,'G0R','1124048620');
INSERT INTO `canadacities` VALUES ('Southampton','Southampton','NB','New Brunswick','46.0789','-67.3124',1484,3.3,'America/Moncton',4,'E6E E6G','1124711539');
INSERT INTO `canadacities` VALUES ('Salluit','Salluit','QC','Quebec','62.2013','-75.6337',1483,101.1,'America/Toronto',4,'J0M','1124962070');
INSERT INTO `canadacities` VALUES ('Pangnirtung','Pangnirtung','NU','Nunavut','66.1436','-65.6829',1481,190.6,'America/Iqaluit',4,'X0A','1124731886');
INSERT INTO `canadacities` VALUES ('Saint-Louis-de-Gonzague','Saint-Louis-de-Gonzague','QC','Quebec','45.2000','-73.9800',1481,18.6,'America/Toronto',3,'J0S','1124000598');
INSERT INTO `canadacities` VALUES ('Moosonee','Moosonee','ON','Ontario','51.2722','-80.6431',1481,2.7,'America/Toronto',3,'P0L','1124592907');
INSERT INTO `canadacities` VALUES ('Englehart','Englehart','ON','Ontario','47.8167','-79.8667',1479,489.7,'America/Toronto',3,'P0J','1124297839');
INSERT INTO `canadacities` VALUES ('Saint-Urbain','Saint-Urbain','QC','Quebec','47.5500','-70.5333',1474,4.4,'America/Toronto',4,'G0A','1124108877');
INSERT INTO `canadacities` VALUES ('Tring-Jonction','Tring-Jonction','QC','Quebec','46.2667','-70.9833',1473,57.5,'America/Toronto',4,'G0N','1124821925');
INSERT INTO `canadacities` VALUES ('Wilton No. 472','Wilton No. 472','SK','Saskatchewan','53.1240','-109.7885',1473,1.4,'America/Edmonton',4,'S0M S9V','1124001208');
INSERT INTO `canadacities` VALUES ('Denmark','Denmark','NB','New Brunswick','47.1155','-67.4771',1471,2,'America/Moncton',4,'E7H E7G','1124001349');
INSERT INTO `canadacities` VALUES ('Saint-Joachim','Saint-Joachim','QC','Quebec','47.0500','-70.8500',1471,34.5,'America/Toronto',3,'G0A','1124056373');
INSERT INTO `canadacities` VALUES ('Torch River No. 488','Torch River No. 488','SK','Saskatchewan','53.5445','-104.4619',1471,0.3,'America/Regina',4,'S0J','1124001716');
INSERT INTO `canadacities` VALUES ('Saint-Théodore-d''Acton','Saint-Theodore-d''Acton','QC','Quebec','45.6833','-72.5833',1471,17.7,'America/Toronto',4,'J0H','1124207486');
INSERT INTO `canadacities` VALUES ('L’ Îsle-Verte','L'' Isle-Verte','QC','Quebec','48.0167','-69.3333',1469,12.5,'America/Toronto',3,'G0L','1124320524');
INSERT INTO `canadacities` VALUES ('Palmarolle','Palmarolle','QC','Quebec','48.6667','-79.2000',1465,12.5,'America/Toronto',3,'J0Z','1124693739');
INSERT INTO `canadacities` VALUES ('Bon Accord','Bon Accord','AB','Alberta','53.8328','-113.4189',1461,366.4,'America/Edmonton',3,'T0A','1124764880');
INSERT INTO `canadacities` VALUES ('Sussex Corner','Sussex Corner','NB','New Brunswick','45.7122','-65.4719',1461,156.4,'America/Moncton',4,'E4E','1124001821');
INSERT INTO `canadacities` VALUES ('Saint-Odilon-de-Cranbourne','Saint-Odilon-de-Cranbourne','QC','Quebec','46.3667','-70.6833',1459,11.2,'America/Toronto',4,'G0S','1124001239');
INSERT INTO `canadacities` VALUES ('Pipestone','Pipestone','MB','Manitoba','49.6653','-101.1444',1458,1.3,'America/Winnipeg',3,'R0M','1124293936');
INSERT INTO `canadacities` VALUES ('La Doré','La Dore','QC','Quebec','48.7200','-72.6500',1453,5,'America/Toronto',3,'G8J','1124387334');
INSERT INTO `canadacities` VALUES ('Lac-au-Saumon','Lac-au-Saumon','QC','Quebec','48.4167','-67.3500',1453,17.7,'America/Toronto',3,'G0J','1124759496');
INSERT INTO `canadacities` VALUES ('Wotton','Wotton','QC','Quebec','45.7333','-71.8000',1453,10.1,'America/Toronto',4,'J0A','1124174332');
INSERT INTO `canadacities` VALUES ('Prairie Lakes','Prairie Lakes','MB','Manitoba','49.4034','-99.6298',1453,1.4,'America/Winnipeg',4,'R0K','1124001186');
INSERT INTO `canadacities` VALUES ('Elk Point','Elk Point','AB','Alberta','53.8967','-110.8972',1452,295.5,'America/Edmonton',3,'T0A','1124622637');
INSERT INTO `canadacities` VALUES ('St. François Xavier','St. Francois Xavier','MB','Manitoba','49.9903','-97.6722',1449,7.1,'America/Winnipeg',3,'R4L','1124001915');
INSERT INTO `canadacities` VALUES ('Shellbrook','Shellbrook','SK','Saskatchewan','53.2167','-106.4000',1444,390.3,'America/Regina',3,'S0J','1124817725');
INSERT INTO `canadacities` VALUES ('Wemindji','Wemindji','QC','Quebec','53.0440','-78.7384',1444,3.7,'America/Toronto',4,'J0M','1124079157');
INSERT INTO `canadacities` VALUES ('Cape Dorset','Cape Dorset','NU','Nunavut','64.2237','-76.5405',1441,147.9,'America/Iqaluit',4,'X0A','1124646146');
INSERT INTO `canadacities` VALUES ('Strong','Strong','ON','Ontario','45.7500','-79.4000',1439,9,'America/Toronto',3,'P0A','1124000578');
INSERT INTO `canadacities` VALUES ('Nobleford','Nobleford','AB','Alberta','49.8822','-113.0531',1438,848.6,'America/Edmonton',3,'T0L','1124281605');
INSERT INTO `canadacities` VALUES ('Lappe','Lappe','ON','Ontario','48.5693','-89.3573',1434,9.8,'America/Toronto',4,'P7G','1124000934');
INSERT INTO `canadacities` VALUES ('Pointe-aux-Outardes','Pointe-aux-Outardes','QC','Quebec','49.0500','-68.4333',1434,19.1,'America/Toronto',3,'G0H','1124001253');
INSERT INTO `canadacities` VALUES ('Rivière-Héva','Riviere-Heva','QC','Quebec','48.2333','-78.2167',1433,3.4,'America/Toronto',4,'J0Y','1124000406');
INSERT INTO `canadacities` VALUES ('Scott','Scott','QC','Quebec','46.507872396847','-71.0665628160423',1433,364.7,'America/Toronto',3,'G0S','1124001254');
INSERT INTO `canadacities` VALUES ('Godmanchester','Godmanchester','QC','Quebec','45.0800','-74.2500',1417,10.2,'America/Toronto',3,'J0S','1124000511');
INSERT INTO `canadacities` VALUES ('Macklin','Macklin','SK','Saskatchewan','52.3300','-109.9400',1415,450.7,'America/Swift_Current',3,'S0L','1124573046');
INSERT INTO `canadacities` VALUES ('Armour','Armour','ON','Ontario','45.6289','-79.3436',1414,8.6,'America/Toronto',3,'P0A','1124000589');
INSERT INTO `canadacities` VALUES ('Saint-Simon','Saint-Simon','QC','Quebec','45.7190','-72.8463',1413,20.5,'America/Toronto',4,'J0H','1124669265');
INSERT INTO `canadacities` VALUES ('Tingwick','Tingwick','QC','Quebec','45.8873','-71.9244',1410,8.3,'America/Toronto',4,'J0A','1124969542');
INSERT INTO `canadacities` VALUES ('Saint-Aubert','Saint-Aubert','QC','Quebec','47.1833','-70.2167',1409,14,'America/Toronto',3,'G0R','1124439130');
INSERT INTO `canadacities` VALUES ('Saint-Mathieu-du-Parc','Saint-Mathieu-du-Parc','QC','Quebec','46.5667','-72.9167',1407,6.3,'America/Toronto',4,'G0X','1124001318');
INSERT INTO `canadacities` VALUES ('Saint-Ubalde','Saint-Ubalde','QC','Quebec','46.7500','-72.2667',1403,10,'America/Toronto',3,'G0A','1124614507');
INSERT INTO `canadacities` VALUES ('Creighton','Creighton','SK','Saskatchewan','54.7561','-101.8973',1402,97.4,'America/Winnipeg',3,'S0P','1124000828');
INSERT INTO `canadacities` VALUES ('Faraday','Faraday','ON','Ontario','45.0000','-77.9167',1401,6.4,'America/Toronto',3,'K0L','1124001991');
INSERT INTO `canadacities` VALUES ('Berthier-sur-Mer','Berthier-sur-Mer','QC','Quebec','46.9167','-70.7333',1398,52.2,'America/Toronto',3,'G0R','1124625020');
INSERT INTO `canadacities` VALUES ('Bayfield','Bayfield','ON','Ontario','43.5615','-81.6983',1394,448.7,'America/Toronto',3,'N0M','1124665510');
INSERT INTO `canadacities` VALUES ('Frampton','Frampton','QC','Quebec','46.4667','-70.8000',1393,9.2,'America/Toronto',3,'G0R','1124063273');
INSERT INTO `canadacities` VALUES ('Barrière','Barriere','BC','British Columbia','51.1803','-120.1261',1391,251.4,'America/Vancouver',3,'V0E','1124124556');
INSERT INTO `canadacities` VALUES ('Chute-aux-Outardes','Chute-aux-Outardes','QC','Quebec','49.1167','-68.4000',1391,185.3,'America/Toronto',4,'G0H','1124968977');
INSERT INTO `canadacities` VALUES ('Lions Bay','Lions Bay','BC','British Columbia','49.4581','-123.2369',1390,549,'America/Vancouver',3,'V0N','1124001126');
INSERT INTO `canadacities` VALUES ('New Carlisle','New Carlisle','QC','Quebec','48.0167','-65.3333',1388,20.5,'America/Toronto',3,'G0C','1124193848');
INSERT INTO `canadacities` VALUES ('Laird No. 404','Laird No. 404','SK','Saskatchewan','52.5696','-106.7312',1387,1.9,'America/Regina',4,'S0K','1124001811');
INSERT INTO `canadacities` VALUES ('Saint-Majorique-de-Grantham','Saint-Majorique-de-Grantham','QC','Quebec','45.9333','-72.5833',1384,24.1,'America/Toronto',4,'J2B','1124000808');
INSERT INTO `canadacities` VALUES ('Petitcodiac','Petitcodiac','NB','New Brunswick','45.9333','-65.1667',1383,80.4,'America/Moncton',3,'E4Z','1124122911');
INSERT INTO `canadacities` VALUES ('Canwood No. 494','Canwood No. 494','SK','Saskatchewan','53.4574','-106.7768',1381,0.7,'America/Swift_Current',4,'S0J','1124001486');
INSERT INTO `canadacities` VALUES ('Wentworth-Nord','Wentworth-Nord','QC','Quebec','45.8500','-74.4500',1381,8.8,'America/Toronto',3,'J0T','1124001955');
INSERT INTO `canadacities` VALUES ('Bas Caraquet','Bas Caraquet','NB','New Brunswick','47.8000','-64.8333',1380,44.5,'America/Moncton',4,'E1W','1124124817');
INSERT INTO `canadacities` VALUES ('Two Hills','Two Hills','AB','Alberta','53.7150','-111.7461',1379,400,'America/Edmonton',3,'T0B','1124512958');
INSERT INTO `canadacities` VALUES ('Sainte-Ursule','Sainte-Ursule','QC','Quebec','46.2833','-73.0333',1375,20.2,'America/Toronto',4,'J0K','1124000577');
INSERT INTO `canadacities` VALUES ('Dawson','Dawson','YT','Yukon','64.0464','-139.3893',1375,42.4,'America/Dawson',4,'Y0B','1124075766');
INSERT INTO `canadacities` VALUES ('Nantes','Nantes','QC','Quebec','45.6333','-71.0333',1374,11.4,'America/Toronto',3,'G6B G0Y','1124802333');
INSERT INTO `canadacities` VALUES ('Lac-aux-Sables','Lac-aux-Sables','QC','Quebec','46.8667','-72.4000',1373,5.1,'America/Toronto',3,'G0X','1124691735');
INSERT INTO `canadacities` VALUES ('Stewiacke','Stewiacke','NS','Nova Scotia','45.1422','-63.3483',1373,77.9,'America/Halifax',3,'B0N','1124573534');
INSERT INTO `canadacities` VALUES ('Vaudreuil-sur-le-Lac','Vaudreuil-sur-le-Lac','QC','Quebec','45.4000','-74.0333',1361,983,'America/Toronto',3,'J7V','1124001806');
INSERT INTO `canadacities` VALUES ('Grahamdale','Grahamdale','MB','Manitoba','51.4200','-98.3733',1359,0.6,'America/Winnipeg',3,'R0C','1124001918');
INSERT INTO `canadacities` VALUES ('Upham','Upham','NB','New Brunswick','45.5083','-65.6618',1357,7.2,'America/Moncton',4,'E5N','1124000748');
INSERT INTO `canadacities` VALUES ('St.-Charles','St.-Charles','ON','Ontario','46.3422','-80.4497',1357,4.3,'America/Toronto',4,'P0M','1124428919');
INSERT INTO `canadacities` VALUES ('Cardwell','Cardwell','NB','New Brunswick','45.7848','-65.3037',1353,4.3,'America/Moncton',4,'E4Z E4G','1124001428');
INSERT INTO `canadacities` VALUES ('Amulet','Amulet','QC','Quebec','48.2938','-79.0274',1350,727.2,'America/Toronto',3,'J9X J9Y','1124000786');
INSERT INTO `canadacities` VALUES ('L’Avenir','L''Avenir','QC','Quebec','45.7667','-72.3000',1350,13.8,'America/Toronto',4,'J0C','1124154040');
INSERT INTO `canadacities` VALUES ('Hillsborough','Hillsborough','NB','New Brunswick','45.9205781884486','-64.650665366647',1348,105.2,'America/Moncton',4,'E4H','1124000107');
INSERT INTO `canadacities` VALUES ('Spiritwood No. 496','Spiritwood No. 496','SK','Saskatchewan','53.4435','-107.4495',1347,0.6,'America/Swift_Current',4,'S0J','1124001575');
INSERT INTO `canadacities` VALUES ('Pointe-à-la-Croix','Pointe-a-la-Croix','QC','Quebec','48.0167','-66.6833',1344,3.4,'America/Toronto',3,'G0C','1124993506');
INSERT INTO `canadacities` VALUES ('Hérouxville','Herouxville','QC','Quebec','46.6667','-72.6167',1340,25.3,'America/Toronto',3,'G0X','1124001698');
INSERT INTO `canadacities` VALUES ('Weldford','Weldford','NB','New Brunswick','46.5221','-65.1114',1338,2.2,'America/Moncton',4,'E4W E4T','1124000165');
INSERT INTO `canadacities` VALUES ('Reynolds','Reynolds','MB','Manitoba','49.7678','-95.8842',1338,0.4,'America/Winnipeg',3,'R0E','1124938750');
INSERT INTO `canadacities` VALUES ('St. Laurent','St. Laurent','MB','Manitoba','50.4300','-97.7933',1338,2.9,'America/Winnipeg',4,'R0C','1124303582');
INSERT INTO `canadacities` VALUES ('L''Isle-aux-Allumettes','L''Isle-aux-Allumettes','QC','Quebec','45.8667','-77.0667',1334,7.2,'America/Toronto',3,'J0X','1124001726');
INSERT INTO `canadacities` VALUES ('Emo','Emo','ON','Ontario','48.6333','-93.8333',1333,6.6,'America/Winnipeg',3,'P0W','1124320866');
INSERT INTO `canadacities` VALUES ('Sainte-Brigide-d''Iberville','Sainte-Brigide-d''Iberville','QC','Quebec','45.3167','-73.0667',1331,18.7,'America/Toronto',3,'J0J','1124015542');
INSERT INTO `canadacities` VALUES ('Les Éboulements','Les Eboulements','QC','Quebec','47.4833','-70.3167',1331,8.5,'America/Toronto',3,'G0A','1124253187');
INSERT INTO `canadacities` VALUES ('Smooth Rock Falls','Smooth Rock Falls','ON','Ontario','49.2833','-81.6333',1330,6.6,'America/Toronto',3,'P0L','1124418972');
INSERT INTO `canadacities` VALUES ('Bruederheim','Bruederheim','AB','Alberta','53.8042','-112.9278',1329,143.2,'America/Edmonton',3,'T0B','1124027946');
INSERT INTO `canadacities` VALUES ('Oxbow','Oxbow','SK','Saskatchewan','49.2333','-102.1667',1328,412.6,'America/Regina',3,'S0C','1124727899');
INSERT INTO `canadacities` VALUES ('Telkwa','Telkwa','BC','British Columbia','54.6972','-127.0500',1327,191.9,'America/Vancouver',3,'V0J','1124000170');
INSERT INTO `canadacities` VALUES ('Landmark','Landmark','MB','Manitoba','49.6711','-96.8179',1326,445.7,'America/Winnipeg',3,'R0A','1124000247');
INSERT INTO `canadacities` VALUES ('Norton','Norton','NB','New Brunswick','45.6387','-65.6955',1325,9.2,'America/Moncton',3,'E5N','1124362919');
INSERT INTO `canadacities` VALUES ('Gjoa Haven','Gjoa Haven','NU','Nunavut','68.6448','-95.8912',1324,46.5,'America/Cambridge_Bay',4,'X0B','1124942230');
INSERT INTO `canadacities` VALUES ('Sainte-Barbe','Sainte-Barbe','QC','Quebec','45.1667','-74.2000',1324,33,'America/Toronto',3,'J0S','1124147367');
INSERT INTO `canadacities` VALUES ('Mayerthorpe','Mayerthorpe','AB','Alberta','53.9503','-115.1336',1320,302.2,'America/Edmonton',3,'T0E','1124001053');
INSERT INTO `canadacities` VALUES ('Ootischenia','Ootischenia','BC','British Columbia','49.2916','-117.6323',1320,170.6,'America/Vancouver',4,'V1N','1124935527');
INSERT INTO `canadacities` VALUES ('Saint-Louis-du-Ha! Ha!','Saint-Louis-du-Ha! Ha!','QC','Quebec','47.6700','-68.9800',1318,11.7,'America/Toronto',3,'G0L','1124487645');
INSERT INTO `canadacities` VALUES ('Taylor','Taylor','BC','British Columbia','56.1590','-120.6878',1317,77.8,'America/Dawson_Creek',3,'V0C','1124063816');
INSERT INTO `canadacities` VALUES ('Powerview-Pine Falls','Powerview-Pine Falls','MB','Manitoba','50.5661','-96.1981',1316,262,'America/Winnipeg',3,'R0E','1124001400');
INSERT INTO `canadacities` VALUES ('Ragueneau','Ragueneau','QC','Quebec','49.0667','-68.5333',1314,7.3,'America/Toronto',4,'G0H','1124000159');
INSERT INTO `canadacities` VALUES ('Baie Verte','Baie Verte','NL','Newfoundland and Labrador','49.9167','-56.1833',1313,3.5,'America/St_Johns',3,'A0K','1124727368');
INSERT INTO `canadacities` VALUES ('Chisholm','Chisholm','ON','Ontario','46.1000','-79.2333',1312,6.4,'America/Toronto',4,'P0H','1124000894');
INSERT INTO `canadacities` VALUES ('Saint-Édouard','Saint-Edouard','QC','Quebec','45.2333','-73.5167',1312,24.8,'America/Toronto',3,'J0L','1124689962');
INSERT INTO `canadacities` VALUES ('Charlo','Charlo','NB','New Brunswick','48.0000','-66.3200',1310,41.9,'America/Moncton',3,'E8E','1124001583');
INSERT INTO `canadacities` VALUES ('Sorrento','Sorrento','BC','British Columbia','50.8832','-119.4782',1309,110.3,'America/Vancouver',4,'V0E','1124978509');
INSERT INTO `canadacities` VALUES ('Burgeo','Burgeo','NL','Newfoundland and Labrador','47.6000','-57.6333',1307,41.7,'America/St_Johns',3,'A0N','1124034870');
INSERT INTO `canadacities` VALUES ('Wadena','Wadena','SK','Saskatchewan','51.9458','-103.8014',1306,449.5,'America/Regina',3,'S0A','1124604550');
INSERT INTO `canadacities` VALUES ('St-Pierre-Jolys','St-Pierre-Jolys','MB','Manitoba','49.4403','-96.9844',1305,440.5,'America/Winnipeg',3,'R0A','1124001013');
INSERT INTO `canadacities` VALUES ('Richmond','Richmond','NB','New Brunswick','46.0776','-67.7248',1303,5,'America/Moncton',4,'E7N E7M','1124000907');
INSERT INTO `canadacities` VALUES ('Youbou','Youbou','BC','British Columbia','48.8562','-124.1731',1302,146.4,'America/Vancouver',4,'V0R','1124809081');
INSERT INTO `canadacities` VALUES ('Swan Hills','Swan Hills','AB','Alberta','54.7106','-115.4133',1301,49.8,'America/Edmonton',3,'T0G','1124000651');
INSERT INTO `canadacities` VALUES ('Wilkie','Wilkie','SK','Saskatchewan','52.4167','-108.7000',1301,137.3,'America/Swift_Current',3,'S0K','1124926813');
INSERT INTO `canadacities` VALUES ('Saint-Léonard','Saint-Leonard','NB','New Brunswick','47.1625','-67.9250',1300,249.2,'America/Moncton',3,'E7E','1124194436');
INSERT INTO `canadacities` VALUES ('Rivière-Bleue','Riviere-Bleue','QC','Quebec','47.4333','-69.0500',1299,7.5,'America/Toronto',4,'G0L','1124592122');
INSERT INTO `canadacities` VALUES ('Noyan','Noyan','QC','Quebec','45.0667','-73.3000',1297,29,'America/Toronto',3,'J0J','1124781949');
INSERT INTO `canadacities` VALUES ('Notre-Dame-du-Portage','Notre-Dame-du-Portage','QC','Quebec','47.7667','-69.6167',1296,32.4,'America/Toronto',3,'G0L','1124956445');
INSERT INTO `canadacities` VALUES ('Ile-à-la-Crosse','Ile-a-la-Crosse','SK','Saskatchewan','55.4500','-107.8833',1296,54.4,'America/Swift_Current',3,'S0M','1124359869');
INSERT INTO `canadacities` VALUES ('Saint-Hugues','Saint-Hugues','QC','Quebec','45.8000','-72.8667',1292,15.4,'America/Toronto',3,'J0H','1124983381');
INSERT INTO `canadacities` VALUES ('Sainte-Anne-du-Sault','Sainte-Anne-du-Sault','QC','Quebec','46.1733','-72.1415',1290,21.6,'America/Toronto',4,NULL,'1124001314');
INSERT INTO `canadacities` VALUES ('La Conception','La Conception','QC','Quebec','46.1500','-74.7000',1287,9.9,'America/Toronto',3,'J0T','1124175484');
INSERT INTO `canadacities` VALUES ('Vauxhall','Vauxhall','AB','Alberta','50.0689','-112.0975',1286,449.4,'America/Edmonton',3,'T0K','1124148360');
INSERT INTO `canadacities` VALUES ('Lamèque','Lameque','NB','New Brunswick','47.7925','-64.6532',1285,102.8,'America/Moncton',3,'E8T','1124209362');
INSERT INTO `canadacities` VALUES ('Arborg','Arborg','MB','Manitoba','50.9075','-97.2182',1279,611,'America/Winnipeg',3,'R0C','1124353392');
INSERT INTO `canadacities` VALUES ('Estevan No. 5','Estevan No. 5','SK','Saskatchewan','49.1308','-103.0126',1279,1.7,'America/Regina',4,'S4A','1124000725');
INSERT INTO `canadacities` VALUES ('Thessalon','Thessalon','ON','Ontario','46.2500','-83.5500',1279,284.6,'America/Toronto',3,'P0R','1124087342');
INSERT INTO `canadacities` VALUES ('L''Isle-aux-Coudres','L''Isle-aux-Coudres','QC','Quebec','47.4000','-70.3833',1279,42.5,'America/Toronto',3,'G0A','1124001681');
INSERT INTO `canadacities` VALUES ('Lanigan','Lanigan','SK','Saskatchewan','51.8500','-105.0333',1277,165.2,'America/Regina',3,'S0K','1124052623');
INSERT INTO `canadacities` VALUES ('Elton','Elton','MB','Manitoba','49.9750','-99.8658',1276,2.2,'America/Winnipeg',4,'R0K','1124000871');
INSERT INTO `canadacities` VALUES ('Bowden','Bowden','AB','Alberta','51.9306','-114.0256',1275,442.8,'America/Edmonton',3,'T0M','1124945470');
INSERT INTO `canadacities` VALUES ('South Qu''Appelle No. 157','South Qu''Appelle No. 157','SK','Saskatchewan','50.5389','-104.0141',1275,1.4,'America/Regina',4,'S0G','1124001385');
INSERT INTO `canadacities` VALUES ('Conestogo','Conestogo','ON','Ontario','43.5441','-80.4997',1272,587.8,'America/Toronto',3,'N0B','1124566995');
INSERT INTO `canadacities` VALUES ('Rosser','Rosser','MB','Manitoba','49.9900','-97.4592',1270,2.9,'America/Winnipeg',3,'R3C R0H','1124001581');
INSERT INTO `canadacities` VALUES ('Sainte-Lucie-des-Laurentides','Sainte-Lucie-des-Laurentides','QC','Quebec','46.1300','-74.1800',1269,11.1,'America/Toronto',4,'J0T','1124001146');
INSERT INTO `canadacities` VALUES ('Saint-Alexis','Saint-Alexis','QC','Quebec','45.9333','-73.6167',1267,29.2,'America/Toronto',4,'J0K','1124001453');
INSERT INTO `canadacities` VALUES ('Roxton Falls','Roxton Falls','QC','Quebec','45.5667','-72.5167',1265,259.1,'America/Toronto',3,'J0H','1124901453');
INSERT INTO `canadacities` VALUES ('Montcalm','Montcalm','MB','Manitoba','49.1775','-97.3247',1260,2.7,'America/Winnipeg',3,'R0G','1124000100');
INSERT INTO `canadacities` VALUES ('Irishtown-Summerside','Irishtown-Summerside','NL','Newfoundland and Labrador','48.9833','-57.9500',1260,106,'America/St_Johns',4,'A2H','1124000307');
INSERT INTO `canadacities` VALUES ('Clarendon','Clarendon','QC','Quebec','45.6500','-76.5167',1256,3.8,'America/Toronto',3,'J0X','1124000922');
INSERT INTO `canadacities` VALUES ('Mervin No. 499','Mervin No. 499','SK','Saskatchewan','53.5455','-108.8762',1256,0.8,'America/Swift_Current',4,'S0M','1124001677');
INSERT INTO `canadacities` VALUES ('Saint-Ludger','Saint-Ludger','QC','Quebec','45.7500','-70.7000',1255,9.8,'America/Toronto',4,'G0M','1124281144');
INSERT INTO `canadacities` VALUES ('Coldwell','Coldwell','MB','Manitoba','50.6389','-98.0417',1254,1.4,'America/Winnipeg',4,'R0C','1124001845');
INSERT INTO `canadacities` VALUES ('Musquash','Musquash','NB','New Brunswick','45.1836','-66.3514',1253,5.4,'America/Moncton',4,'E5J','1124987756');
INSERT INTO `canadacities` VALUES ('Racine','Racine','QC','Quebec','45.5000','-72.2500',1252,11.8,'America/Toronto',4,'J0E','1124253350');
INSERT INTO `canadacities` VALUES ('Osler','Osler','SK','Saskatchewan','52.3700','-106.5400',1251,771.7,'America/Regina',3,'S0K','1124000037');
INSERT INTO `canadacities` VALUES ('Saint-Zénon','Saint-Zenon','QC','Quebec','46.5500','-73.8167',1250,2.7,'America/Toronto',3,'J0K','1124443019');
INSERT INTO `canadacities` VALUES ('Saint-Armand','Saint-Armand','QC','Quebec','45.0333','-73.0500',1248,15.1,'America/Toronto',3,'J0J','1124958164');
INSERT INTO `canadacities` VALUES ('Saint-Édouard-de-Lotbinière','Saint-Edouard-de-Lotbiniere','QC','Quebec','46.5667','-71.8333',1248,12.7,'America/Toronto',4,'G0S','1124001130');
INSERT INTO `canadacities` VALUES ('Alonsa','Alonsa','MB','Manitoba','50.9794','-99.0796',1247,0.4,'America/Winnipeg',4,'R0H','1124385753');
INSERT INTO `canadacities` VALUES ('Saint-Arsène','Saint-Arsene','QC','Quebec','47.9167','-69.4333',1245,17.6,'America/Toronto',4,'G0L','1124482227');
INSERT INTO `canadacities` VALUES ('Listuguj','Listuguj','QC','Quebec','48.0609','-66.7491',1241,28,'America/Halifax',4,'G0C','1124001828');
INSERT INTO `canadacities` VALUES ('St. Joseph','St. Joseph','ON','Ontario','46.2667','-84.0000',1240,9.3,'America/Toronto',3,'P0R','1124001430');
INSERT INTO `canadacities` VALUES ('Queensbury','Queensbury','NB','New Brunswick','45.9918','-67.0632',1237,4.2,'America/Moncton',4,'E6L E6E','1124001691');
INSERT INTO `canadacities` VALUES ('Saint-Hubert-de-Rivière-du-Loup','Saint-Hubert-de-Riviere-du-Loup','QC','Quebec','47.8167','-69.1500',1235,6.4,'America/Toronto',4,'G0L','1124000191');
INSERT INTO `canadacities` VALUES ('Saint-Jude','Saint-Jude','QC','Quebec','45.7667','-72.9833',1235,16,'America/Toronto',3,'J0H','1124510808');
INSERT INTO `canadacities` VALUES ('La Minerve','La Minerve','QC','Quebec','46.2500','-74.9333',1234,4.4,'America/Toronto',3,'J0T','1124869065');
INSERT INTO `canadacities` VALUES ('Trécesson','Trecesson','QC','Quebec','48.6500','-78.3167',1232,6.3,'America/Toronto',4,'J0Y','1124000493');
INSERT INTO `canadacities` VALUES ('Legal','Legal','AB','Alberta','53.9492','-113.5950',1232,387.9,'America/Edmonton',3,'T0G','1124819805');
INSERT INTO `canadacities` VALUES ('Moonbeam','Moonbeam','ON','Ontario','49.3500','-82.1500',1231,5.2,'America/Toronto',3,'P0L','1124775223');
INSERT INTO `canadacities` VALUES ('Notre-Dame-des-Pins','Notre-Dame-des-Pins','QC','Quebec','46.1833','-70.7167',1227,51.2,'America/Toronto',3,'G0M','1124000253');
INSERT INTO `canadacities` VALUES ('Saint-Alban','Saint-Alban','QC','Quebec','46.7167','-72.0833',1225,8.2,'America/Toronto',3,'G0A','1124839435');
INSERT INTO `canadacities` VALUES ('Saint-Pierre-les-Becquets','Saint-Pierre-les-Becquets','QC','Quebec','46.5000','-72.2000',1223,25.6,'America/Toronto',4,'G0X','1124957722');
INSERT INTO `canadacities` VALUES ('Beaver River','Beaver River','SK','Saskatchewan','54.3531','-109.5575',1216,0.5,'America/Swift_Current',4,'S0M','1124717040');
INSERT INTO `canadacities` VALUES ('Labrecque','Labrecque','QC','Quebec','48.6667','-71.5333',1215,7.9,'America/Toronto',4,'G0W','1124000362');
INSERT INTO `canadacities` VALUES ('Claremont','Claremont','ON','Ontario','43.9741','-79.1316',1215,573.6,'America/Toronto',3,'L1Y','1124327632');
INSERT INTO `canadacities` VALUES ('New Bandon','New Bandon','NB','New Brunswick','47.6912','-65.2900',1214,3.4,'America/Moncton',4,'E2A E8N','1124001513');
INSERT INTO `canadacities` VALUES ('Sainte-Hénédine','Sainte-Henedine','QC','Quebec','46.5500','-70.9833',1212,23.6,'America/Toronto',4,'G0S','1124771909');
INSERT INTO `canadacities` VALUES ('L''Anse-Saint-Jean','L''Anse-Saint-Jean','QC','Quebec','48.2333','-70.2000',1208,2.4,'America/Toronto',3,'G0V','1124155071');
INSERT INTO `canadacities` VALUES ('Moose Jaw No. 161','Moose Jaw No. 161','SK','Saskatchewan','50.4433','-105.5091',1207,1.6,'America/Regina',4,'S6H','1124000515');
INSERT INTO `canadacities` VALUES ('Bassano','Bassano','AB','Alberta','50.7833','-112.4667',1206,231.2,'America/Edmonton',3,'T0J','1124776374');
INSERT INTO `canadacities` VALUES ('Parrsboro','Parrsboro','NS','Nova Scotia','45.3998','-64.3312',1205,81.4,'America/Halifax',4,NULL,'1124877589');
INSERT INTO `canadacities` VALUES ('St. George''s','St. George''s','NL','Newfoundland and Labrador','48.4275','-58.4778',1203,46.6,'America/St_Johns',3,'A0N','1124178262');
INSERT INTO `canadacities` VALUES ('Fort Simpson','Fort Simpson','NT','Northwest Territories','61.8082','-121.3199',1202,15.3,'America/Inuvik',4,'X0E','1124669512');
INSERT INTO `canadacities` VALUES ('Akwesasne','Akwesasne','QC','Quebec','45.0155','-74.5769',1202,48.4,'America/Toronto',4,'J0S','1124000436');
INSERT INTO `canadacities` VALUES ('Ignace','Ignace','ON','Ontario','49.4167','-91.6667',1202,16.5,'America/Winnipeg',3,'P0T','1124972211');
INSERT INTO `canadacities` VALUES ('Teulon','Teulon','MB','Manitoba','50.3858','-97.2611',1201,372.3,'America/Winnipeg',3,'R0C','1124616630');
INSERT INTO `canadacities` VALUES ('Peel','Peel','NB','New Brunswick','46.4058','-67.5278',1196,10.6,'America/Moncton',4,'E7L','1124771409');
INSERT INTO `canadacities` VALUES ('Miltonvale Park','Miltonvale Park','PE','Prince Edward Island','46.3180','-63.2370',1196,34,'America/Halifax',4,'C1E','1124001949');
INSERT INTO `canadacities` VALUES ('St. Lawrence','St. Lawrence','NL','Newfoundland and Labrador','46.9244','-55.3928',1192,33.6,'America/St_Johns',3,'A0E','1124645666');
INSERT INTO `canadacities` VALUES ('Oxford','Oxford','NS','Nova Scotia','45.7306','-63.8733',1190,110.6,'America/Halifax',3,'B0M','1124455847');
INSERT INTO `canadacities` VALUES ('Minto-Odanah','Minto-Odanah','MB','Manitoba','50.2406','-99.8056',1189,1.6,'America/Winnipeg',4,'R0J','1124001517');
INSERT INTO `canadacities` VALUES ('Saint-Valère','Saint-Valere','QC','Quebec','46.0667','-72.1000',1188,11,'America/Toronto',4,'G0P','1124182292');
INSERT INTO `canadacities` VALUES ('St. Alban''s','St. Alban''s','NL','Newfoundland and Labrador','47.8753','-55.8414',1186,56.9,'America/St_Johns',3,'A0H','1124613667');
INSERT INTO `canadacities` VALUES ('Kaleden','Kaleden','BC','British Columbia','49.3926','-119.5955',1186,274.9,'America/Vancouver',3,'V0H','1124001071');
INSERT INTO `canadacities` VALUES ('Saint James','Saint James','NB','New Brunswick','45.3822','-67.3427',1186,2.1,'America/Moncton',4,'E5A E3L','1124001675');
INSERT INTO `canadacities` VALUES ('Saint-Norbert-d''Arthabaska','Saint-Norbert-d''Arthabaska','QC','Quebec','46.1000','-71.8167',1185,11.4,'America/Toronto',4,'G0P','1124000467');
INSERT INTO `canadacities` VALUES ('Manning','Manning','AB','Alberta','56.9142','-117.6272',1183,291.9,'America/Edmonton',3,'T0H','1124001357');
INSERT INTO `canadacities` VALUES ('Glenella-Lansdowne','Glenella-Lansdowne','MB','Manitoba','50.4163','-99.2097',1181,0.9,'America/Winnipeg',4,'R0J','1124001185');
INSERT INTO `canadacities` VALUES ('Saint-Hilarion','Saint-Hilarion','QC','Quebec','47.5667','-70.4000',1181,11.9,'America/Toronto',4,'G0A','1124375343');
INSERT INTO `canadacities` VALUES ('Saint-Modeste','Saint-Modeste','QC','Quebec','47.8333','-69.4000',1180,10.8,'America/Toronto',4,'G0L','1124591131');
INSERT INTO `canadacities` VALUES ('Saint-Siméon','Saint-Simeon','QC','Quebec','48.0667','-65.5667',1179,20.9,'America/Toronto',4,'G0C','1124797465');
INSERT INTO `canadacities` VALUES ('Saint-Barnabé','Saint-Barnabe','QC','Quebec','46.4000','-72.8833',1179,20,'America/Toronto',3,'G0X','1124760889');
INSERT INTO `canadacities` VALUES ('Irricana','Irricana','AB','Alberta','51.3189','-113.6106',1179,364.6,'America/Edmonton',3,'T0M','1124968867');
INSERT INTO `canadacities` VALUES ('Saint Martins','Saint Martins','NB','New Brunswick','45.4563','-65.4395',1177,1.9,'America/Moncton',4,'E5R','1124001010');
INSERT INTO `canadacities` VALUES ('Two Borders','Two Borders','MB','Manitoba','49.2668','-101.1124',1175,0.5,'America/Winnipeg',4,'R0M','1124001678');
INSERT INTO `canadacities` VALUES ('Bury','Bury','QC','Quebec','45.4667','-71.5000',1174,4.9,'America/Toronto',3,'J0B','1124643055');
INSERT INTO `canadacities` VALUES ('Lac-Bouchette','Lac-Bouchette','QC','Quebec','48.2500','-72.1800',1174,1.3,'America/Toronto',4,'G0W','1124365485');
INSERT INTO `canadacities` VALUES ('Saint-Lazare-de-Bellechasse','Saint-Lazare-de-Bellechasse','QC','Quebec','46.6500','-70.8000',1172,13.6,'America/Toronto',4,'G0R','1124054719');
INSERT INTO `canadacities` VALUES ('Saint-Michel-du-Squatec','Saint-Michel-du-Squatec','QC','Quebec','47.8800','-68.7200',1171,3.2,'America/Toronto',4,'G0L','1124190334');
INSERT INTO `canadacities` VALUES ('Saint-Joachim-de-Shefford','Saint-Joachim-de-Shefford','QC','Quebec','45.4500','-72.5333',1171,9.2,'America/Toronto',4,'J0E','1124777025');
INSERT INTO `canadacities` VALUES ('Grand-Remous','Grand-Remous','QC','Quebec','46.6167','-75.9000',1168,3.3,'America/Toronto',3,'J0W','1124917091');
INSERT INTO `canadacities` VALUES ('Saint-Gabriel-de-Rimouski','Saint-Gabriel-de-Rimouski','QC','Quebec','48.4209','-68.1791',1167,9.2,'America/Toronto',4,'G0K','1124766556');
INSERT INTO `canadacities` VALUES ('Armstrong','Armstrong','ON','Ontario','47.7083','-79.8250',1166,12.9,'America/Toronto',3,'P0J','1124000411');
INSERT INTO `canadacities` VALUES ('Rogersville','Rogersville','NB','New Brunswick','46.7167','-65.4167',1166,161.9,'America/Moncton',3,'E4Y','1124369581');
INSERT INTO `canadacities` VALUES ('Langenburg','Langenburg','SK','Saskatchewan','50.8333','-101.7000',1165,337.1,'America/Regina',3,'S0A','1124335442');
INSERT INTO `canadacities` VALUES ('Sainte-Marie-Salomé','Sainte-Marie-Salome','QC','Quebec','45.9333','-73.5000',1164,34.5,'America/Toronto',3,'J0K','1124001034');
INSERT INTO `canadacities` VALUES ('Saint-Cyprien','Saint-Cyprien','QC','Quebec','47.9000','-69.0167',1163,8.4,'America/Toronto',4,'G0L','1124986836');
INSERT INTO `canadacities` VALUES ('Centreville','Centreville','NS','Nova Scotia','45.1300','-64.5224',1159,490.2,'America/Halifax',3,'B0P','1124795742');
INSERT INTO `canadacities` VALUES ('Maidstone','Maidstone','SK','Saskatchewan','53.0920','-109.2940',1156,233.5,'America/Edmonton',3,'S0M','1124537085');
INSERT INTO `canadacities` VALUES ('Très-Saint-Sacrement','Tres-Saint-Sacrement','QC','Quebec','45.1833','-73.8500',1155,11.7,'America/Toronto',3,'J0S','1124001118');
INSERT INTO `canadacities` VALUES ('Hillsburgh','Hillsburgh','ON','Ontario','43.7914','-80.1354',1152,391.7,'America/Toronto',3,'N0B','1124258378');
INSERT INTO `canadacities` VALUES ('McAdam','McAdam','NB','New Brunswick','45.5944','-67.3258',1151,80.6,'America/Moncton',3,'E6J','1124054455');
INSERT INTO `canadacities` VALUES ('Newcastle','Newcastle','NB','New Brunswick','47.1725','-65.5551',1149,2,'America/Moncton',4,'E1V','1124367015');
INSERT INTO `canadacities` VALUES ('Saints-Anges','Saints-Anges','QC','Quebec','46.4167','-70.8833',1149,16.6,'America/Toronto',4,'G0S','1124749056');
INSERT INTO `canadacities` VALUES ('Saint-Urbain-Premier','Saint-Urbain-Premier','QC','Quebec','45.2200','-73.7300',1148,21.6,'America/Toronto',3,'J0S','1124927145');
INSERT INTO `canadacities` VALUES ('Centreville-Wareham-Trinity','Centreville-Wareham-Trinity','NL','Newfoundland and Labrador','48.9879','-53.9069',1147,30.8,'America/St_Johns',3,'A0G','1124000332');
INSERT INTO `canadacities` VALUES ('Alberton','Alberton','PE','Prince Edward Island','46.8167','-64.0667',1145,253.5,'America/Halifax',3,'C0B','1124792801');
INSERT INTO `canadacities` VALUES ('Winnipeg Beach','Winnipeg Beach','MB','Manitoba','50.5058','-96.9742',1145,295.9,'America/Winnipeg',3,'R0C','1124001121');
INSERT INTO `canadacities` VALUES ('Sainte-Agathe-de-Lotbinière','Sainte-Agathe-de-Lotbiniere','QC','Quebec','46.3833','-71.4167',1145,6.9,'America/Toronto',4,'G0S','1124003470');
INSERT INTO `canadacities` VALUES ('Salmo','Salmo','BC','British Columbia','49.1942','-117.2778',1141,466.2,'America/Vancouver',3,'V0G','1124411651');
INSERT INTO `canadacities` VALUES ('Kipling','Kipling','SK','Saskatchewan','50.1015','-102.6324',1140,396.5,'America/Regina',3,'S0G','1124000823');
INSERT INTO `canadacities` VALUES ('Sagamok','Sagamok','ON','Ontario','46.1529','-82.2072',1140,11.6,'America/Toronto',4,'P0P','1124001822');
INSERT INTO `canadacities` VALUES ('Grande-Vallée','Grande-Vallee','QC','Quebec','49.2167','-65.1333',1137,7.9,'America/Toronto',3,'G0E','1124608975');
INSERT INTO `canadacities` VALUES ('Bertrand','Bertrand','NB','New Brunswick','47.7622','-65.0686',1137,24.5,'America/Moncton',4,'E1W','1124001809');
INSERT INTO `canadacities` VALUES ('Mont-Carmel','Mont-Carmel','QC','Quebec','47.4397','-69.8586',1136,2.7,'America/Toronto',4,'G0L','1124064864');
INSERT INTO `canadacities` VALUES ('Victoria','Victoria','MB','Manitoba','49.6644','-98.9153',1132,2.2,'America/Winnipeg',4,'R0G R0K','1124000196');
INSERT INTO `canadacities` VALUES ('Saint-Eugène','Saint-Eugene','QC','Quebec','45.8000','-72.7000',1131,14.9,'America/Toronto',3,'J0C','1124834014');
INSERT INTO `canadacities` VALUES ('Notre-Dame-des-Neiges','Notre-Dame-des-Neiges','QC','Quebec','48.1167','-69.1667',1129,12,'America/Toronto',4,'G0L','1124000518');
INSERT INTO `canadacities` VALUES ('Saint-André','Saint-Andre','NB','New Brunswick','47.1392','-67.7444',1129,8.8,'America/Moncton',4,NULL,'1124000931');
INSERT INTO `canadacities` VALUES ('Roland','Roland','MB','Manitoba','49.3547','-97.8997',1129,2.3,'America/Winnipeg',4,'R0G','1124796797');
INSERT INTO `canadacities` VALUES ('Saint-Léon-de-Standon','Saint-Leon-de-Standon','QC','Quebec','46.4833','-70.6167',1128,8.2,'America/Toronto',4,'G0R','1124297826');
INSERT INTO `canadacities` VALUES ('Hensall','Hensall','ON','Ontario','43.4345','-81.5040',1126,569,'America/Toronto',3,NULL,'1124762629');
INSERT INTO `canadacities` VALUES ('Carnduff','Carnduff','SK','Saskatchewan','49.1670','-101.7830',1126,498.2,'America/Regina',3,'S0C','1124238691');
INSERT INTO `canadacities` VALUES ('Greenwich','Greenwich','NB','New Brunswick','45.5112','-66.1229',1126,9.8,'America/Moncton',4,'E5M','1124001377');
INSERT INTO `canadacities` VALUES ('Carling','Carling','ON','Ontario','45.4333','-80.2167',1125,4.5,'America/Toronto',3,'P0G','1124000522');
INSERT INTO `canadacities` VALUES ('Eckville','Eckville','AB','Alberta','52.3622','-114.3614',1125,703.3,'America/Edmonton',3,'T0M','1124000793');
INSERT INTO `canadacities` VALUES ('Nain','Nain','NL','Newfoundland and Labrador','56.5422','-61.6928',1125,11.9,'America/Goose_Bay',3,'A0P','1124719084');
INSERT INTO `canadacities` VALUES ('Foam Lake','Foam Lake','SK','Saskatchewan','51.6500','-103.5333',1123,189.4,'America/Regina',3,'S0A','1124751136');
INSERT INTO `canadacities` VALUES ('Sayabec','Sayabec','QC','Quebec','48.5667','-67.6833',1122,353.1,'America/Toronto',3,'G0J','1124175872');
INSERT INTO `canadacities` VALUES ('Laird','Laird','ON','Ontario','46.3833','-84.0667',1121,10.9,'America/Toronto',4,'P0S','1124000662');
INSERT INTO `canadacities` VALUES ('Sainte-Sabine','Sainte-Sabine','QC','Quebec','45.2333','-73.0167',1120,20.3,'America/Toronto',4,'J0J','1124001836');
INSERT INTO `canadacities` VALUES ('Tara','Tara','ON','Ontario','44.4793','-81.1445',1119,465.3,'America/Toronto',3,'N0H','1124001864');
INSERT INTO `canadacities` VALUES ('Saint-Maxime-du-Mont-Louis','Saint-Maxime-du-Mont-Louis','QC','Quebec','49.2333','-65.7333',1118,4.8,'America/Toronto',3,'G0E','1124000029');
INSERT INTO `canadacities` VALUES ('Blanc-Sablon','Blanc-Sablon','QC','Quebec','51.4167','-57.1333',1118,4.5,'America/Blanc-Sablon',3,'G0G','1124785666');
INSERT INTO `canadacities` VALUES ('Cobalt','Cobalt','ON','Ontario','47.4000','-79.6833',1118,776,'America/Toronto',3,'P0J','1124248298');
INSERT INTO `canadacities` VALUES ('South River','South River','ON','Ontario','45.8417','-79.3750',1114,268.3,'America/Toronto',3,'P0A','1124154548');
INSERT INTO `canadacities` VALUES ('Hudson Bay No. 394','Hudson Bay No. 394','SK','Saskatchewan','53.0295','-102.3122',1114,0.1,'America/Regina',4,'S0E','1124001694');
INSERT INTO `canadacities` VALUES ('Waldheim','Waldheim','SK','Saskatchewan','52.6500','-106.6167',1113,525.5,'America/Regina',3,'S0K','1124273730');
INSERT INTO `canadacities` VALUES ('McKellar','McKellar','ON','Ontario','45.4833','-79.8500',1111,6.1,'America/Toronto',3,'P0G P2A','1124000057');
INSERT INTO `canadacities` VALUES ('Buffalo Narrows','Buffalo Narrows','SK','Saskatchewan','55.8769','-108.5244',1110,16.2,'America/Swift_Current',3,'S0M','1124766743');
INSERT INTO `canadacities` VALUES ('Ayer’s Cliff','Ayer''s Cliff','QC','Quebec','45.1667','-72.0500',1109,197.9,'America/Toronto',3,'J0B','1124916439');
INSERT INTO `canadacities` VALUES ('Les Méchins','Les Mechins','QC','Quebec','49.0000','-66.9833',1107,2.5,'America/Toronto',3,'G0J','1124540316');
INSERT INTO `canadacities` VALUES ('Sainte-Marguerite','Sainte-Marguerite','QC','Quebec','46.5167','-70.9333',1107,12.9,'America/Toronto',4,'G0S','1124041972');
INSERT INTO `canadacities` VALUES ('Saint-Claude','Saint-Claude','QC','Quebec','45.6667','-71.9833',1106,9.3,'America/Toronto',4,'J1S','1124525083');
INSERT INTO `canadacities` VALUES ('Air Ronge','Air Ronge','SK','Saskatchewan','55.0872','-105.3318',1106,184.3,'America/Regina',3,'S0J','1124001996');
INSERT INTO `canadacities` VALUES ('Chipman','Chipman','NB','New Brunswick','46.1710','-65.8840',1104,58,'America/Moncton',3,'E4A','1124551016');
INSERT INTO `canadacities` VALUES ('Weyburn No. 67','Weyburn No. 67','SK','Saskatchewan','49.6535','-103.8348',1103,1.4,'America/Regina',4,'S4H','1124000632');
INSERT INTO `canadacities` VALUES ('Alberta Beach','Alberta Beach','AB','Alberta','53.6767','-114.3500',1103,507.1,'America/Edmonton',3,'T0E','1124000690');
INSERT INTO `canadacities` VALUES ('Sainte-Jeanne-d''Arc','Sainte-Jeanne-d''Arc','QC','Quebec','48.8575','-72.0939',1101,4.1,'America/Toronto',3,'G0W','1124001392');
INSERT INTO `canadacities` VALUES ('Sainte-Félicité','Sainte-Felicite','QC','Quebec','48.9000','-67.3333',1100,12.1,'America/Toronto',3,'G0J','1124831574');
INSERT INTO `canadacities` VALUES ('Girardville','Girardville','QC','Quebec','49.0000','-72.5500',1100,8.9,'America/Toronto',4,'G0W','1124315247');
INSERT INTO `canadacities` VALUES ('Saint-Bruno-de-Guigues','Saint-Bruno-de-Guigues','QC','Quebec','47.4667','-79.4333',1100,8.8,'America/Toronto',4,'J0Z','1124052468');
INSERT INTO `canadacities` VALUES ('Grenfell','Grenfell','SK','Saskatchewan','50.4167','-102.9167',1099,347,'America/Regina',3,'S0G','1124603747');
INSERT INTO `canadacities` VALUES ('South Algonquin','South Algonquin','ON','Ontario','45.4967','-78.0239',1096,1.3,'America/Toronto',3,'K0J','1124001032');
INSERT INTO `canadacities` VALUES ('Upton','Upton','QC','Quebec','45.6500','-72.6833',1092,348.6,'America/Toronto',3,'J0H','1124955599');
INSERT INTO `canadacities` VALUES ('Saint-Narcisse-de-Beaurivage','Saint-Narcisse-de-Beaurivage','QC','Quebec','46.4833','-71.2333',1091,17.6,'America/Toronto',4,'G0S','1124000086');
INSERT INTO `canadacities` VALUES ('Plaisance','Plaisance','QC','Quebec','45.6167','-75.1167',1088,30.1,'America/Toronto',3,'J0V','1124858477');
INSERT INTO `canadacities` VALUES ('Roxton-Sud','Roxton-Sud','QC','Quebec','45.5521','-72.5265',1086,7.3,'America/Toronto',4,'J0H','1124174410');
INSERT INTO `canadacities` VALUES ('St. Louis No. 431','St. Louis No. 431','SK','Saskatchewan','52.8277','-105.7873',1086,1.4,'America/Regina',4,'S0J S0K','1124000136');
INSERT INTO `canadacities` VALUES ('Noonan','Noonan','NB','New Brunswick','45.9544','-66.4868',1086,14.3,'America/Moncton',4,'E3A','1124001109');
INSERT INTO `canadacities` VALUES ('Duchess','Duchess','AB','Alberta','50.7333','-111.9000',1085,553.4,'America/Edmonton',3,'T0J','1124156956');
INSERT INTO `canadacities` VALUES ('Saint-Frédéric','Saint-Frederic','QC','Quebec','46.3000','-70.9667',1085,14.9,'America/Toronto',4,'G0N','1124436339');
INSERT INTO `canadacities` VALUES ('Saint-Narcisse-de-Rimouski','Saint-Narcisse-de-Rimouski','QC','Quebec','48.2800','-68.4300',1084,6.7,'America/Toronto',4,'G0K','1124000363');
INSERT INTO `canadacities` VALUES ('Atholville','Atholville','NB','New Brunswick','47.9818511106651','-66.714689041714',1084,105.5,'America/Toronto',3,'E3N','1124001302');
INSERT INTO `canadacities` VALUES ('Viking','Viking','AB','Alberta','53.0953','-111.7769',1083,292.5,'America/Edmonton',3,'T0B','1124502081');
INSERT INTO `canadacities` VALUES ('Sioux Narrows-Nestor Falls','Sioux Narrows-Nestor Falls','ON','Ontario','49.4000','-94.0800',1082,0.5,'America/Winnipeg',3,'P0X','1124000587');
INSERT INTO `canadacities` VALUES ('Repulse Bay','Repulse Bay','NU','Nunavut','66.5628','-86.3186',1082,2.6,'America/Rankin_Inlet',4,'X0C','1124398936');
INSERT INTO `canadacities` VALUES ('Saint-Patrice-de-Beaurivage','Saint-Patrice-de-Beaurivage','QC','Quebec','46.4167','-71.2333',1080,12.6,'America/Toronto',4,'G0S','1124097931');
INSERT INTO `canadacities` VALUES ('Bentley','Bentley','AB','Alberta','52.4667','-114.0500',1078,482.2,'America/Edmonton',3,'T0C','1124340912');
INSERT INTO `canadacities` VALUES ('Durham','Durham','NB','New Brunswick','47.7631','-66.0849',1076,2.6,'America/Moncton',4,'E8G','1124000804');
INSERT INTO `canadacities` VALUES ('Sainte-Marthe','Sainte-Marthe','QC','Quebec','45.4000','-74.3000',1075,13.5,'America/Toronto',3,'J0P','1124191744');
INSERT INTO `canadacities` VALUES ('Notre-Dame-du-Nord','Notre-Dame-du-Nord','QC','Quebec','47.6000','-79.4833',1075,14.3,'America/Toronto',3,'J0Z','1124408692');
INSERT INTO `canadacities` VALUES ('Beachburg','Beachburg','ON','Ontario','45.7303','-76.8559',1074,250.3,'America/Toronto',3,'K0J','1124185620');
INSERT INTO `canadacities` VALUES ('Pinehouse','Pinehouse','SK','Saskatchewan','55.5136','-106.5986',1074,142.9,'America/Regina',3,'S0J','1124001604');
INSERT INTO `canadacities` VALUES ('Saint-Aimé-des-Lacs','Saint-Aime-des-Lacs','QC','Quebec','47.6833','-70.3000',1073,11.6,'America/Toronto',4,'G0T','1124001325');
INSERT INTO `canadacities` VALUES ('Wedgeport','Wedgeport','NS','Nova Scotia','43.7323','-65.9797',1071,111.1,'America/Halifax',4,'B0W','1124599537');
INSERT INTO `canadacities` VALUES ('Lac-Drolet','Lac-Drolet','QC','Quebec','45.7200','-70.8500',1071,8.6,'America/Toronto',4,'G0Y','1124120357');
INSERT INTO `canadacities` VALUES ('Preeceville','Preeceville','SK','Saskatchewan','51.9580','-102.6673',1070,0.7,'America/Regina',3,'S0A','1124064523');
INSERT INTO `canadacities` VALUES ('Maple Creek No. 111','Maple Creek No. 111','SK','Saskatchewan','49.8044','-109.6508',1068,0.3,'America/Swift_Current',4,'S0N','1124000783');
INSERT INTO `canadacities` VALUES ('Harbour Main-Chapel''s Cove-Lakeview','Harbour Main-Chapel''s Cove-Lakeview','NL','Newfoundland and Labrador','47.4337','-53.1458',1067,50.6,'America/St_Johns',3,'A0A','1124000035');
INSERT INTO `canadacities` VALUES ('Coleraine','Coleraine','QC','Quebec','45.9649','-71.3734',1067,255.6,'America/Toronto',3,'G0N','1124793029');
INSERT INTO `canadacities` VALUES ('Birch Hills','Birch Hills','SK','Saskatchewan','52.9833','-105.4333',1066,468.4,'America/Regina',3,'S0J','11245202497');
INSERT INTO `canadacities` VALUES ('Saint-Bonaventure','Saint-Bonaventure','QC','Quebec','45.9667','-72.6833',1066,13.5,'America/Toronto',4,'J0C','1124324069');
INSERT INTO `canadacities` VALUES ('Saint-Wenceslas','Saint-Wenceslas','QC','Quebec','46.1667','-72.3333',1064,13.3,'America/Toronto',4,'G0Z','1124947290');
INSERT INTO `canadacities` VALUES ('Kerrobert','Kerrobert','SK','Saskatchewan','51.9200','-109.1272',1061,141.7,'America/Swift_Current',3,'S0L','1124941446');
INSERT INTO `canadacities` VALUES ('Havelock','Havelock','NB','New Brunswick','45.9523','-65.3885',1061,3,'America/Moncton',4,'E4Z','1124740292');
INSERT INTO `canadacities` VALUES ('Eston','Eston','SK','Saskatchewan','51.1500','-108.7500',1061,390.3,'America/Swift_Current',3,'S0L','1124212993');
INSERT INTO `canadacities` VALUES ('Sainte-Geneviève-de-Batiscan','Sainte-Genevieve-de-Batiscan','QC','Quebec','46.5333','-72.3333',1060,10.8,'America/Toronto',3,'G0X','1124685530');
INSERT INTO `canadacities` VALUES ('Saint-Justin','Saint-Justin','QC','Quebec','46.2500','-73.0833',1060,13.5,'America/Toronto',4,'J0K','1124449723');
INSERT INTO `canadacities` VALUES ('Saint-Norbert','Saint-Norbert','QC','Quebec','46.1667','-73.3167',1059,14.1,'America/Toronto',3,'J0K','1124000928');
INSERT INTO `canadacities` VALUES ('Schreiber','Schreiber','ON','Ontario','48.8167','-87.2667',1059,28.8,'America/Toronto',3,'P0T','1124663303');
INSERT INTO `canadacities` VALUES ('Trochu','Trochu','AB','Alberta','51.8236','-113.2328',1058,381.1,'America/Edmonton',3,'T0M','1124642144');
INSERT INTO `canadacities` VALUES ('Botsford','Botsford','NB','New Brunswick','46.1145','-63.9804',1058,3.5,'America/Moncton',4,'E4M','1124000452');
INSERT INTO `canadacities` VALUES ('Riviere-Ouelle','Riviere-Ouelle','QC','Quebec','47.4333','-70.0167',1058,18.6,'America/Toronto',3,'G0L','1124401890');
INSERT INTO `canadacities` VALUES ('Stukely-Sud','Stukely-Sud','QC','Quebec','45.3167','-72.4167',1058,15.8,'America/Toronto',4,'J0E','1124476796');
INSERT INTO `canadacities` VALUES ('Saint-Georges-de-Clarenceville','Saint-Georges-de-Clarenceville','QC','Quebec','45.0667','-73.2500',1056,16.6,'America/Toronto',3,'J0J','1124963246');
INSERT INTO `canadacities` VALUES ('Plantagenet','Plantagenet','ON','Ontario','45.5321','-74.9956',1056,270.7,'America/Toronto',3,'K0B','1124496473');
INSERT INTO `canadacities` VALUES ('Sainte-Thérèse-de-Gaspé','Sainte-Therese-de-Gaspe','QC','Quebec','48.4167','-64.4167',1055,31.5,'America/Toronto',3,'G0C','1124000271');
INSERT INTO `canadacities` VALUES ('Sainte-Pétronille','Sainte-Petronille','QC','Quebec','46.8500','-71.1333',1055,244.4,'America/Toronto',3,'G0A','1124000628');
INSERT INTO `canadacities` VALUES ('Desbiens','Desbiens','QC','Quebec','48.4167','-71.9500',1053,101.1,'America/Toronto',4,'G0W','1124443927');
INSERT INTO `canadacities` VALUES ('Clyde River','Clyde River','NU','Nunavut','70.4632','-68.4822',1053,9.9,'America/Iqaluit',4,'X0A','1124801172');
INSERT INTO `canadacities` VALUES ('La Macaza','La Macaza','QC','Quebec','46.3667','-74.7667',1053,6.5,'America/Toronto',3,'J0T','1124760668');
INSERT INTO `canadacities` VALUES ('Souris','Souris','PE','Prince Edward Island','46.3554','-62.2542',1053,303.7,'America/Halifax',3,'C0A','1124838959');
INSERT INTO `canadacities` VALUES ('Kindersley No. 290','Kindersley No. 290','SK','Saskatchewan','51.4894','-109.0979',1049,0.5,'America/Swift_Current',4,'S0L','1124000416');
INSERT INTO `canadacities` VALUES ('Falher','Falher','AB','Alberta','55.7372','-117.2014',1047,376.4,'America/Edmonton',3,'T0H','1124001263');
INSERT INTO `canadacities` VALUES ('Saint-Vallier','Saint-Vallier','QC','Quebec','46.8833','-70.8167',1046,23.4,'America/Toronto',3,'G0R','1124440624');
INSERT INTO `canadacities` VALUES ('Melita','Melita','MB','Manitoba','49.2681','-100.9958',1042,342.7,'America/Winnipeg',3,'R0M','1124113199');
INSERT INTO `canadacities` VALUES ('Davidson','Davidson','SK','Saskatchewan','51.2667','-105.9667',1039,228.4,'America/Regina',3,'S0G','1124057902');
INSERT INTO `canadacities` VALUES ('Bristol','Bristol','QC','Quebec','45.5333','-76.4667',1036,5,'America/Toronto',3,'J0X','1124215672');
INSERT INTO `canadacities` VALUES ('Mahone Bay','Mahone Bay','NS','Nova Scotia','44.4489','-64.3819',1036,332.1,'America/Halifax',3,'B0J','1124406380');
INSERT INTO `canadacities` VALUES ('Saint-Sylvestre','Saint-Sylvestre','QC','Quebec','46.3667','-71.2333',1035,7.1,'America/Toronto',3,'G0S','1124754541');
INSERT INTO `canadacities` VALUES ('Taloyoak','Taloyoak','NU','Nunavut','69.5554','-93.4972',1029,27.3,'America/Cambridge_Bay',4,'X0B','1124099415');
INSERT INTO `canadacities` VALUES ('Onoway','Onoway','AB','Alberta','53.7011','-114.1981',1029,310.3,'America/Edmonton',3,'T0E','1124983122');
INSERT INTO `canadacities` VALUES ('Saint-Stanislas','Saint-Stanislas','QC','Quebec','46.6167','-72.4000',1029,11.5,'America/Toronto',3,'G0X','1124711165');
INSERT INTO `canadacities` VALUES ('Battle River No. 438','Battle River No. 438','SK','Saskatchewan','52.7343','-108.4452',1029,1,'America/Swift_Current',4,'S0M','1124001521');
INSERT INTO `canadacities` VALUES ('Malpeque','Malpeque','PE','Prince Edward Island','46.5000','-63.6667',1029,8.1,'America/Halifax',3,'C0B','1124663926');
INSERT INTO `canadacities` VALUES ('Longue-Rive','Longue-Rive','QC','Quebec','48.5500','-69.2500',1026,3.3,'America/Toronto',3,'G0T','1124001270');
INSERT INTO `canadacities` VALUES ('Argyle','Argyle','MB','Manitoba','49.3697','-99.1506',1025,1.3,'America/Winnipeg',4,'R0K','1124001193');
INSERT INTO `canadacities` VALUES ('Delisle','Delisle','SK','Saskatchewan','51.9254','-107.1333',1024,307.5,'America/Swift_Current',3,'S0L','1124184784');
INSERT INTO `canadacities` VALUES ('Plaster Rock','Plaster Rock','NB','New Brunswick','46.8833','-67.3833',1023,336.1,'America/Moncton',3,'E7G','1124983558');
INSERT INTO `canadacities` VALUES ('Wilmot','Wilmot','NB','New Brunswick','46.3463','-67.7099',1022,5.3,'America/Moncton',4,'E7K','1124000939');
INSERT INTO `canadacities` VALUES ('Valemount','Valemount','BC','British Columbia','52.8284','-119.2659',1021,197.6,'America/Vancouver',4,'V0E','1124899599');
INSERT INTO `canadacities` VALUES ('Saint-Léonard-de-Portneuf','Saint-Leonard-de-Portneuf','QC','Quebec','46.8833','-71.9167',1019,7.2,'America/Toronto',4,'G0A','1124001565');
INSERT INTO `canadacities` VALUES ('Longlaketon No. 219','Longlaketon No. 219','SK','Saskatchewan','50.9386','-104.6913',1016,1,'America/Regina',4,'S0G','1124000772');
INSERT INTO `canadacities` VALUES ('Papineau-Cameron','Papineau-Cameron','ON','Ontario','46.3000','-78.7333',1016,1.8,'America/Toronto',4,'P0H','1124000867');
INSERT INTO `canadacities` VALUES ('Assiginack','Assiginack','ON','Ontario','45.7333','-81.8000',1013,4.5,'America/Toronto',3,'P0P','1124000091');
INSERT INTO `canadacities` VALUES ('Brébeuf','Brebeuf','QC','Quebec','46.0667','-74.6667',1012,27.9,'America/Toronto',4,'J0T','1124001084');
INSERT INTO `canadacities` VALUES ('Hudson Hope','Hudson Hope','BC','British Columbia','56.0316','-121.9057',1012,1.1,'America/Dawson_Creek',3,'V0C','1124260692');
INSERT INTO `canadacities` VALUES ('Baie-du-Febvre','Baie-du-Febvre','QC','Quebec','46.1300','-72.7200',1010,10.4,'America/Toronto',3,'J0G','1124218916');
INSERT INTO `canadacities` VALUES ('Durham-Sud','Durham-Sud','QC','Quebec','45.6667','-72.3333',1008,10.8,'America/Toronto',4,'J0H','1124105436');
INSERT INTO `canadacities` VALUES ('Melbourne','Melbourne','QC','Quebec','45.5800','-72.1700',1004,5.8,'America/Toronto',3,'J0B','1124850489');
INSERT INTO `canadacities` VALUES ('Nipawin No. 487','Nipawin No. 487','SK','Saskatchewan','53.2881','-104.0544',1004,1.1,'America/Regina',4,'S0E','1124001339');
INSERT INTO `canadacities` VALUES ('Duck Lake No. 463','Duck Lake No. 463','SK','Saskatchewan','52.9596','-106.2089',1004,1,'America/Regina',4,'S0K S6V','1124001661');
INSERT INTO `canadacities` VALUES ('Oyen','Oyen','AB','Alberta','51.3522','-110.4739',1001,189.6,'America/Edmonton',3,'T0J','1124000494');
INSERT INTO `canadacities` VALUES ('Gravelbourg','Gravelbourg','SK','Saskatchewan','49.8740','-106.5550',986,316,'America/Regina',3,'S0H','1124409900');
INSERT INTO `canadacities` VALUES ('Lajord No. 128','Lajord No. 128','SK','Saskatchewan','50.1965','-104.2507',985,1,'America/Regina',4,'S0G','1124000590');
INSERT INTO `canadacities` VALUES ('Hébertville','Hebertville','QC','Quebec','48.3908095949458','-71.6819728261466',981,1303.3,'America/Toronto',3,'G8N','1124293093');
INSERT INTO `canadacities` VALUES ('Lorrainville','Lorrainville','QC','Quebec','47.3542299036518','-79.3520914698444',977,267.6,'America/Toronto',3,'J0Z','1124001976');
INSERT INTO `canadacities` VALUES ('Prince','Prince','ON','Ontario','46.5333','-84.5000',975,11.5,'America/Toronto',3,'P6A','1124000733');
INSERT INTO `canadacities` VALUES ('Athens','Athens','ON','Ontario','44.6250','-75.9500',974,458.8,'America/Toronto',3,'K0E','1124291343');
INSERT INTO `canadacities` VALUES ('Saint-René-de-Matane','Saint-Rene-de-Matane','QC','Quebec','48.7000','-67.3833',961,3.8,'America/Toronto',4,'G0J','1124000167');
INSERT INTO `canadacities` VALUES ('Eastman','Eastman','QC','Quebec','45.2968981712764','-72.3055222480217',961,77,'America/Toronto',4,'J0E','1124001358');
INSERT INTO `canadacities` VALUES ('Kugluktuk','Kugluktuk','NU','Nunavut','67.823848117453','-115.099088952782',956,2845.2,'America/Cambridge_Bay',2,'X0B','1124349489');
INSERT INTO `canadacities` VALUES ('Kedgwick','Kedgwick','NB','New Brunswick','47.6456','-67.3431',953,238.5,'America/Moncton',3,'E8B','1124759374');
INSERT INTO `canadacities` VALUES ('Wemotaci','Wemotaci','QC','Quebec','47.9024818814051','-73.7817090155559',950,2323.9,'America/Toronto',2,'G0X','1124001294');
INSERT INTO `canadacities` VALUES ('Cookshire','Cookshire','QC','Quebec','45.4121611599823','-71.6161136717221',950,471.3,'America/Toronto',3,'J0B','1124895156');
INSERT INTO `canadacities` VALUES ('Dorchester','Dorchester','NB','New Brunswick','45.9016','-64.5161',906,158.7,'America/Moncton',3,'E4K','1124001021');
INSERT INTO `canadacities` VALUES ('Fortune','Fortune','NL','Newfoundland and Labrador','47.0722112118505','-55.8243165856721',894,1671.3,'America/St_Johns',3,'A0E','1124546267');
INSERT INTO `canadacities` VALUES ('Hamiota','Hamiota','MB','Manitoba','50.1964','-100.6342',856,255.6,'America/Winnipeg',3,'R0M','1124139264');
INSERT INTO `canadacities` VALUES ('Gillam','Gillam','MB','Manitoba','56.3489179571208','-94.7111288476739',836,824.5,'America/Winnipeg',3,'R0B','1124560722');
INSERT INTO `canadacities` VALUES ('Grand View','Grand View','MB','Manitoba','51.1550','-100.7892',808,286.9,'America/Winnipeg',3,'R0L','1124791401');
INSERT INTO `canadacities` VALUES ('Dildo','Dildo','NL','Newfoundland and Labrador','47.5685','-53.5471',803,144.6,'America/St_Johns',4,'A0B','1124396361');
INSERT INTO `canadacities` VALUES ('Laurierville','Laurierville','QC','Quebec','46.3000','-71.6500',701,195.8,'America/Toronto',4,'G0S','1124864029');
INSERT INTO `canadacities` VALUES ('Ripon','Ripon','QC','Quebec','45.7833','-75.1000',684,140.5,'America/Toronto',4,'J0V','1124368199');
INSERT INTO `canadacities` VALUES ('Henryville','Henryville','QC','Quebec','45.1333','-73.1833',655,860.9,'America/Toronto',3,'J0J','1124175333');
INSERT INTO `canadacities` VALUES ('Gracefield','Gracefield','QC','Quebec','46.0926321848593','-76.0513883182302',620,206.8,'America/Toronto',3,'J0X','1124000820');
INSERT INTO `canadacities` VALUES ('Chatsworth','Chatsworth','ON','Ontario','44.3800','-80.8700',560,733.8,'America/Toronto',3,'N0H','1124525225');
INSERT INTO `canadacities` VALUES ('McCreary','McCreary','MB','Manitoba','50.7494','-99.4850',497,269.5,'America/Winnipeg',3,'R0J','1124852381');
INSERT INTO `canadacities` VALUES ('Yamaska-Est','Yamaska-Est','QC','Quebec','46.0000','-72.9200',490,239.7,'America/Toronto',3,'J0G','1124187626');
INSERT INTO `canadacities` VALUES ('Rossburn','Rossburn','MB','Manitoba','50.7272','-100.7408',489,142.6,'America/Winnipeg',4,'R0J','1124628261');
INSERT INTO `canadacities` VALUES ('Rothesay','Rothesay','NB','New Brunswick','45.3995696420244','-65.8776221957435',342,47.1,'America/Moncton',3,'E2S','1124211328');
INSERT INTO `canadacities` VALUES ('Ethelbert','Ethelbert','MB','Manitoba','51.5364','-100.4981',314,118.2,'America/Winnipeg',4,'R0L','1124793190');
INSERT INTO `canadacities` VALUES ('Frelighsburg','Frelighsburg','QC','Quebec','45.0547772061142','-72.8416732377738',285,161.7,'America/Toronto',4,'J0J','1124000101');
INSERT INTO `canadacities` VALUES ('Magnetawan','Magnetawan','ON','Ontario','45.6667','-79.6333',268,171.2,'America/Toronto',3,'P0A','1124537839');