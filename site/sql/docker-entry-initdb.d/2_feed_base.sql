-- Assurez-vous d'utiliser la base de données correcte
USE `jeu`;

-- Insertion d'utilisateurs dans la table Utilisateurs
INSERT INTO `Utilisateurs` (`email`, `mot_de_passe`, `niveau`)
VALUES 
    ('admin@admin.com', 'admin', '1'), -- mot_de_passe : 'admin123' (hâché avec password_hash)
    ('andy@gmail.com', 'test', '2'); -- mot_de_passe : 'joueur456' (hâché avec password_hash)

