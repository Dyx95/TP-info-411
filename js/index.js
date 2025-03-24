document.addEventListener('DOMContentLoaded', () => {
    const dailyCheckboxes = document.querySelectorAll('.daily-checkbox'); // Cases des missions quotidiennes
    const specialCheckbox = document.querySelector('.special-checkbox'); // Case de la mission spéciale
    const experienceBar = document.querySelector('.experience-progress'); // Barre d'expérience
    const playerExp = document.getElementById('player-exp'); // Texte affichant l'expérience
    const playerLevel = document.getElementById('player-level'); // Texte affichant le niveau

    let currentExp = 0; // Expérience actuelle
    let currentLevel = 1; // Niveau actuel
    const expPerLevel = 100; // Expérience nécessaire pour monter de niveau

    // Fonction pour mettre à jour la barre d'expérience et le niveau
    const updateExperience = () => {
        // Augmentation de niveau si l'expérience dépasse la limite
        while (currentExp >= expPerLevel) {
            currentExp -= expPerLevel;
            currentLevel++;
        }

        // Mettre à jour la barre visuelle
        const progressPercentage = (currentExp / expPerLevel) * 100;
        experienceBar.style.width = `${progressPercentage}%`;

        // Mise à jour des textes affichés
        playerExp.textContent = currentExp;
        playerLevel.textContent = currentLevel;
    };

    // Gestion des missions quotidiennes
    dailyCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const expToAdd = parseInt(checkbox.dataset.exp, 10);

            if (checkbox.checked) {
                currentExp += expToAdd; // Ajouter l'expérience lorsque la mission est cochée
            } else {
                currentExp -= expToAdd; // Retirer l'expérience lorsque la mission est décochée
            }

            updateExperience(); // Met à jour la progression
        });
    });

    // Gestion de la mission spéciale
    specialCheckbox.addEventListener('change', () => {
        const expToAdd = parseInt(specialCheckbox.dataset.exp, 10);

        if (specialCheckbox.checked) {
            currentExp += expToAdd; // Ajouter l'expérience lorsque la mission spéciale est cochée
        } else {
            currentExp -= expToAdd; // Retirer l'expérience si décochée
        }

        updateExperience(); // Met à jour la progression
    });

    // Initialisation au chargement
    updateExperience();
});
