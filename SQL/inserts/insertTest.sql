INSERT INTO type_personnalite(id, nom) VALUES(1, "personalité");
Call creerUsager('emcfdail@outlook.com', "NomTest", "PrenomTest", Date("2000-01-01 00:00:00"), "test");
Call creerUsager('emfsdaail@outlook.com', "NomTest1", "PrenomTest1", Date("2000-01-01 00:00:00"), "test");
Call creerUsager('emfsdail@outlook.com', "NomTest2", "PrenomTest2", Date("2000-01-01 00:00:00"), "test");
Call creerUsager('emagsil@outlook.com', "NomTest3", "PrenomTest3", Date("2000-01-01 00:00:00"), "test");
Call creerUsager('emaigadsfl@outlook.com', "NomTest4", "PrenomTest4", Date("2000-01-01 00:00:00"), "test");
INSERT INTO rencontre(id, nom, description, id_organisateur, adresse, date, nb_participant, public) 
    VALUES(1, "Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1);