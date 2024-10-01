INSERT INTO type_personnalite(id, nom) VALUES(1, "personalité");
INSERT INTO utilisateur(estAdmin, email, prenom, nom, date_naissance, type_personnalite, password) VALUES(0, "gg@hotmail.com", "Reneau", "Lavoie", DATE "2000-01-01", 1, "test");
INSERT INTO utilisateur(estAdmin, email, prenom, nom, date_naissance, type_personnalite, password) VALUES(0, "test@hotmail.com", "prenomTest", "nomTest", DATE "2000-01-01", 1, "test");
INSERT INTO rencontre(id, nom, description, id_organisateur, adresse, date, nb_participant, public) 
    VALUES(1, "Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1);

INSERT INTO demande_rencontre (id_utilisateur, id_rencontre) VALUES (2, 1);