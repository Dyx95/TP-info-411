document.addEventListener('DOMContentLoaded', () => {
    const dailyMissionsContainer = document.getElementById('daily-missions');
    const specialMissionContainer = document.getElementById('special-mission');
    const progress = document.querySelector('.progress');

    let completedMissions = 0;

    // Données des missions (elles peuvent venir d'une base de données)
    const allMissions = {
        daily: [
            "Faire 50 pompes",
            "Courir 3 kilomètres",
            "Pratiquer une séance de yoga",
            "Méditer pendant 10 minutes",
            "Boire 2 litres d'eau"
        ],
        special: [
            "Participer à un tournoi local",
            "Apprendre une compétence en une journée",
            "Réaliser un défi avancé comme un marathon"
        ]
    };

    const totalMissions = 3; // 2 quotidiennes + 1 spéciale

    // Sélection des missions
    const dailyMissions = allMissions.daily.sort(() => Math.random() - 0.5).slice(0, 2);
    const specialMission = allMissions.special[Math.floor(Math.random() * allMissions.special.length)];

    // Affichage des missions quotidiennes
    dailyMissionsContainer.innerHTML = `
        <h3>Missions Quotidiennes</h3>
        <ul>
            ${dailyMissions.map(mission => `<li><input type="checkbox" data-type="daily"><label>${mission}</label></li>`).join('')}
        </ul>
    `;

    // Affichage de la mission spéciale
    specialMissionContainer.innerHTML = `
        <h3>Mission Spéciale</h3>
        <ul>
            <li><input type="checkbox" data-type="special"><label>${specialMission}</label></li>
        </ul>
    `;

    // Fonction de mise à jour de la barre de progression
    const updateProgress = () => {
        const percentage = Math.round((completedMissions / totalMissions) * 100);
        progress.style.width = `${percentage}%`;
        progress.textContent = `${percentage}%`;
    };

    // Écoute des changements sur les cases à cocher
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                completedMissions++;
                checkbox.parentElement.classList.add('completed');
            } else {
                completedMissions--;
                checkbox.parentElement.classList.remove('completed');
            }
            updateProgress();
        });
    });

    // Initialisation de la barre de progression
    updateProgress();
});
