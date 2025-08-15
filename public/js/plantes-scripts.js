// Données injectées depuis Blade
const plantes = window.plantesData || [];
const itemsPerPagePlantes = 12;
let currentPagePlantes = 1;
let filteredPlantes = [...plantes];

const planteGrid = document.getElementById('plante-grid');
const paginationPlantes = document.getElementById('pagination-plantes');
const planteOverlay = document.getElementById('plante-detail-overlay');
const planteOverlayContent = planteOverlay.querySelector('.overlay-content');
const closeBtn = planteOverlay.querySelector('.close-btn');
const plantName = document.getElementById('plantName');
const plantImage = document.getElementById('plantImage');
const plantDetails = document.getElementById('plantDetails');
const searchNomLatin = document.getElementById('search-nom-latin');
const searchNomChinois = document.getElementById('search-nom-chinois');
const filterPartieUtilisee = document.getElementById('filter-partie-utilisee');
const filterFormule = document.getElementById('filter-formule');
const resetFiltersPlantes = document.getElementById('reset-filters-plantes');

// Fonction pour obtenir l'icône en fonction de la partie utilisée
function getIconForPartieUtilisee(partie) {
    switch (partie.toLowerCase()) {
        case 'racine': return 'fas fa-leaf';
        case 'feuille': return 'fas fa-tree';
        case 'fleur': return 'fas fa-spa';
        case 'écorce': return 'fas fa-shield-alt';
        case 'graine': return 'fas fa-seedling';
        default: return 'fas fa-seedling';
    }
}

// Appliquer les filtres
function applyFiltersPlantes() {
    const nomLatinFilter = searchNomLatin.value.toLowerCase();
    const nomChinoisFilter = searchNomChinois.value.toLowerCase();
    const partieUtiliseeFilter = filterPartieUtilisee.value.toLowerCase();
    const formuleFilter = filterFormule.value;

    filteredPlantes = plantes.filter(plante => {
        const matchesNomLatin = plante.nom_latin.toLowerCase().includes(nomLatinFilter);
        const matchesNomChinois = plante.nom_chinois.toLowerCase().includes(nomChinoisFilter);
        const matchesPartieUtilisee = !partieUtiliseeFilter || (plante.partie_utilisee && plante.partie_utilisee.toLowerCase() === partieUtiliseeFilter);
        const matchesFormule = !formuleFilter || (plante.formules && plante.formules.some(formule => formule.nom === formuleFilter));

        return (matchesNomLatin || matchesNomChinois) && matchesPartieUtilisee && matchesFormule;
    });

    currentPagePlantes = 1;
    displayPlantesPage(currentPagePlantes);
    generatePaginationPlantes();
}

// Réinitialiser les filtres
function resetFiltersPlantesFunc() {
    searchNomLatin.value = '';
    searchNomChinois.value = '';
    filterPartieUtilisee.value = '';
    filterFormule.value = '';
    filteredPlantes = [...plantes];
    currentPagePlantes = 1;
    displayPlantesPage(currentPagePlantes);
    generatePaginationPlantes();
}

// Afficher la page courante
function displayPlantesPage(page) {
    planteGrid.innerHTML = '';
    const start = (page - 1) * itemsPerPagePlantes;
    const end = start + itemsPerPagePlantes;
    const paginatedPlantes = filteredPlantes.slice(start, end);

    paginatedPlantes.forEach((plante, index) => {
        const card = document.createElement('div');
        card.className = 'plante-card relative';
        card.style.animationDelay = `${index * 0.15}s`;
        const imageSrc = plante.image ? `${plante.image}` : '';
        const partieIcon = getIconForPartieUtilisee(plante.partie_utilisee || '');
        card.innerHTML = `
            <h3>${plante.nom_chinois} </h3>
            ${plante.nom_latin && plante.nom_latin !== plante.nom_chinois ? `<p class="nom-latin">${plante.nom_latin}</p>` : ''}
            ${plante.partie_utilisee ? `
                <p class="partie-utilisee">
                    <span class="partie-icon"><i class="${partieIcon}"></i></span>
                    <span class="partie-label">Partie : </span>${plante.partie_utilisee}
                </p>` : ''}
            ${imageSrc ? `
            <div class="image-container flex justify-center mt-2">
                <img src="${imageSrc}" alt="${plante.nom_chinois}" class="w-24 h-24 rounded-full object-cover">
            </div>` : ''}
                ${plante.formules && plante.formules.length ? `<p class="formules-list">Formules : ${plante.formules.map(f => f.nom).join(', ')}</p>` : ''}
            <a href="#" class="detail-link"><i class="fas fa-info-circle"></i> En savoir plus</a>
        `;
        planteGrid.appendChild(card);

        setTimeout(() => {
            card.classList.add('visible');
            card.style.animation = `grow 1s ease-out forwards`;
        }, index * 150);
    });

    updateDetailLinks();
}

// Générer la pagination
function generatePaginationPlantes() {
    paginationPlantes.innerHTML = '';
    const totalPages = Math.ceil(filteredPlantes.length / itemsPerPagePlantes);

    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i> Précédent';
    prevBtn.disabled = currentPagePlantes === 1;
    prevBtn.addEventListener('click', () => {
        if (currentPagePlantes > 1) {
            currentPagePlantes--;
            displayPlantesPage(currentPagePlantes);
            updatePaginationPlantes();
        }
    });
    paginationPlantes.appendChild(prevBtn);

    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.textContent = i;
        pageBtn.className = i === currentPagePlantes ? 'active' : '';
        pageBtn.addEventListener('click', () => {
            currentPagePlantes = i;
            displayPlantesPage(currentPagePlantes);
            updatePaginationPlantes();
        });
        paginationPlantes.appendChild(pageBtn);
    }

    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = 'Suivant <i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = currentPagePlantes === totalPages;
    nextBtn.addEventListener('click', () => {
        if (currentPagePlantes < totalPages) {
            currentPagePlantes++;
            displayPlantesPage(currentPagePlantes);
            updatePaginationPlantes();
        }
    });
    paginationPlantes.appendChild(nextBtn);
}

// Mettre à jour la pagination
function updatePaginationPlantes() {
    const buttons = paginationPlantes.querySelectorAll('button');
    buttons.forEach((btn, index) => {
        if (index === 0) btn.disabled = currentPagePlantes === 1;
        else if (index === buttons.length - 1) btn.disabled = currentPagePlantes === Math.ceil(filteredPlantes.length / itemsPerPagePlantes);
        else btn.className = (parseInt(btn.textContent) === currentPagePlantes) ? 'active' : '';
    });
}

// Mettre à jour les liens de détails avec liens cliquables
function updateDetailLinks() {
    const detailLinks = document.querySelectorAll('.detail-link');
    detailLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const card = link.parentElement;
            const nomChinois = card.querySelector('h3').textContent.trim();
            const nomLatin = card.querySelector('.nom-latin')?.textContent.trim() || '';
            const partieUtilisee = card.querySelector('.partie-utilisee')?.textContent.replace('Partie : ', '').trim() || '';
            const imageSrc = card.querySelector('img') ? card.querySelector('img').src : '';
            const formulesListRaw = card.querySelector('.formules-list')?.textContent.replace('Formules : ', '').trim() || '';
            const plante = plantes.find(p => p.nom_chinois === nomChinois || p.nom_latin === nomLatin);
            const partieIcon = getIconForPartieUtilisee(partieUtilisee);

            if (!plante) {
                console.error('Plante non trouvée pour nom_chinois:', nomChinois, 'ou nom_latin:', nomLatin);
                return;
            }

            plantName.innerHTML = `<i class="fas fa-seedling"></i> ${plante.nom_chinois || plante.nom_latin}`;
            plantImage.innerHTML = imageSrc ? `<img src="${imageSrc}" alt="${plante.nom_chinois || plante.nom_latin}" class="w-40 h-40 rounded-full object-cover" />` : 
                `<div class="no-image text-gray-500">Aucune image disponible</div>`;
            let detailsHtml = '';
            if (nomLatin && nomLatin !== plante.nom_chinois) detailsHtml += `<p><i class="fas fa-book"></i> <strong>Nom Latin :</strong> ${nomLatin}</p>`;
            if (partieUtilisee) detailsHtml += `
            <p class="partie-utilisee">
                <span class="partie-icon"><i class="${partieIcon}"></i></span>
                <span class="partie-label">Partie Utilisée : </span>${partieUtilisee}
            </p>`;
            if (plante.description) detailsHtml += `<p><i class="fas fa-file-alt"></i> <strong>Description :</strong> ${plante.description}</p>`;

            if (plante.formules && plante.formules.length > 0) {
                const formulesLinks = plante.formules.map(formule => {
                    return `<a href="/formules/${encodeURIComponent(formule.nom)}" class="text-blue-500 hover:underline">${formule.nom}</a>`;
                }).join(', ');
                detailsHtml += `<p><i class="fas fa-vial"></i> <strong>Formules Associées :</strong> ${formulesLinks}</p>`;
            } else if (formulesListRaw) {
                const formulesLinks = formulesListRaw.split(', ').map(formule => {
                    return `<a href="/formules/${encodeURIComponent(formule.trim())}" class="text-blue-500 hover:underline">${formule.trim()}</a>`;
                }).join(', ');
                detailsHtml += `<p><i class="fas fa-vial"></i> <strong>Formules Associées :</strong> ${formulesLinks}</p>`;
            }

            plantDetails.innerHTML = detailsHtml;

            planteOverlay.style.display = 'flex';
            planteOverlayContent.classList.remove('animate-bloom');
            void planteOverlayContent.offsetWidth; // Réinitialiser l'animation
            planteOverlayContent.classList.add('animate-bloom');
            setTimeout(() => {
                if (plantImage.querySelector('img')) plantImage.querySelector('img').classList.add('animate-spin-fade');
                plantName.classList.add('animate-petal-fall');
                plantDetails.querySelectorAll('p').forEach((p, i) => {
                    p.classList.add('animate-slide-in-up');
                    p.style.animationDelay = `${i * 0.2}s`;
                });
                closeBtn.classList.add('animate-rotate-in');
            }, 100);
        });
    });
}

// Événements
searchNomLatin.addEventListener('input', applyFiltersPlantes);
searchNomChinois.addEventListener('input', applyFiltersPlantes);
filterPartieUtilisee.addEventListener('change', applyFiltersPlantes);
filterFormule.addEventListener('change', applyFiltersPlantes);
resetFiltersPlantes.addEventListener('click', resetFiltersPlantesFunc);

closeBtn.addEventListener('click', () => {
    planteOverlay.style.display = 'none';
    planteOverlayContent.classList.remove('animate-bloom');
    plantName.classList.remove('animate-petal-fall');
    plantDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
    closeBtn.classList.remove('animate-rotate-in');
    if (plantImage.querySelector('img')) plantImage.querySelector('img').classList.remove('animate-spin-fade');
});
planteOverlay.addEventListener('click', (e) => {
    if (e.target === planteOverlay) {
        planteOverlay.style.display = 'none';
        planteOverlayContent.classList.remove('animate-bloom');
        plantName.classList.remove('animate-petal-fall');
        plantDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
        closeBtn.classList.remove('animate-float-in');
        if (plantImage.querySelector('img')) plantImage.querySelector('img').classList.remove('animate-spin-fade');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    displayPlantesPage(currentPagePlantes);
    generatePaginationPlantes();
});