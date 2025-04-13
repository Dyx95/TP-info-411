-- Création de la base de données si elle n'existe pas déjà
CREATE DATABASE IF NOT EXISTS `jeu`;
USE `jeu`;

-- Création de la table Utilisateurs
CREATE TABLE IF NOT EXISTS `Utilisateurs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,  -- Identifiant unique de l'utilisateur
    `email` VARCHAR(255) UNIQUE NOT NULL,  -- Email unique de l'utilisateur
    `mot_de_passe` VARCHAR(255) NOT NULL,  -- Mot de passe haché
    `niveau` ENUM('joueur', 'admin') DEFAULT 'joueur' NOT NULL,  -- Niveau de l'utilisateur (joueur ou admin)
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Date de création de l'utilisateur
);

-- Optionnel : Ajouter un index sur l'email pour améliorer les recherches par email
CREATE INDEX idx_email ON `Utilisateurs` (`email`);
