
// const formules = @json($formules);
const formules = window.formulesData;
const itemsPerPage = 12;
let currentPage = 1;
let filteredFormules = [...formules];

const formulaGrid = document.getElementById('formula-grid');
const pagination = document.getElementById('pagination');
const overlay = document.getElementById('formula-detail-overlay');
const overlayContent = overlay.querySelector('.overlay-content');
const closeBtn = overlay.querySelector('.close-btn');
const formulaName = document.getElementById('formula-name');
const formulaDetails = document.getElementById('formula-details');
const searchNom = document.getElementById('search-nom');
const filterAlternatif = document.getElementById('filter-alternatif');
const filterPlante = document.getElementById('filter-plante');
const filterCategorie = document.getElementById('filter-categorie');
const resetFilters = document.getElementById('reset-filters');

function getIconForAlternatif(alternatif) {
    switch (alternatif) {
        case 'Tonique': return 'fas fa-bolt';
        case 'Calmante': return 'fas fa-peace';
        case 'Énergisante': return 'fas fa-fire';
        case 'Détoxifiante': return 'fas fa-water';
        case 'Angélique': return 'fas fa-leaf';
        case 'Astragale': return 'fas fa-shield-alt';
        case 'Bien-être féminin': return 'fas fa-female';
        case 'C-Tonic': return 'fas fa-heart';
        case 'Cordyceps': return 'fas fa-seedling';
        case 'Décoction d\'Angélique et de Lorantis': return 'fas fa-leaf';
        case 'Décoction d\'Ophiopogon': return 'fas fa-tint';
        case 'Décoction de tiges de cannelle': return 'fas fa-wind';
        case 'Décoction des 2 Ingrédients Conservés': return 'fas fa-water';
        case 'Décoction des 4 Gentilshommes': return 'fas fa-users';
        case 'Décoction des 4 Ingrédients': return 'fas fa-tint';
        case 'Décoction des 4 Merveilles': return 'fas fa-magic';
        case 'Décoction des 8 Trésors': return 'fas fa-gem';
        case 'Décoction du Paravent de Jade': return 'fas fa-shield-alt';
        case 'Décoction du Printemps de Jade': return 'fas fa-tint';
        case 'Décoction pour nourrir l\'Esprit': return 'fas fa-brain';
        case 'Décoction pour restaurer la Rate': return 'fas fa-heartbeat';
        case 'Décoction pour réchauffer les Méridiens et tonifier le Sang': return 'fas fa-fire-alt';
        case 'Décoction pour tonifier le Centre et augmenter le Qi': return 'fas fa-arrow-up';
        case 'Estotonic': return 'fas fa-stomach';
        case 'Formule spéciale pour équilibrer le Poids': return 'fas fa-weight';
        case 'Fv II': return 'fas fa-virus-slash';
        case 'Gymnema': return 'fas fa-leaf';
        case 'HXHY': return 'fas fa-tint';
        case 'Houttuynia': return 'fas fa-water';
        case 'Kudzu': return 'fas fa-leaf';
        case 'LWDH': return 'fas fa-tint';
        case 'MCL': return 'fas fa-wind';
        case 'Ningxin Guifu': return 'fas fa-tint';
        case 'Ningxin Plus': return 'fas fa-fire-alt';
        case 'Petite décoction de Buplèvre': return 'fas fa-balance-scale';
        case 'Petite décoction pour régulariser le Qi': return 'fas fa-fire';
        case 'Pilule du Marcheur Infatigable': return 'fas fa-walking';
        case 'Mai Men Dong Tang': return 'fas fa-eye';
        case 'Poudre de la Libre Errance': return 'fas fa-wind';
        case 'Poudre de perles': return 'fas fa-gem';
        case 'Poudre pour générer les Pouls': return 'fas fa-tint';
        case 'Poudre pour éliminer le Vent': return 'fas fa-wind';
        case 'QGH': return 'fas fa-fire';
        case 'QSL': return 'fas fa-water';
        case 'Sedum Plus': return 'fas fa-fire';
        case 'Synergie 3': return 'fas fa-users';
        case 'TWBX': return 'fas fa-heart';
        case 'Veinotonic': return 'fas fa-tint';
        case 'ZPG': return 'fas fa-fire-alt';
        default: return 'fas fa-vial';
    }
}

function getIconForCategorie(categorie) {
    switch (categorie) {
        case 'Sang': return 'fas fa-tint';
        case 'Immunité': return 'fas fa-shield-alt';
        case 'Féminin': return 'fas fa-female';
        case 'Cœur': return 'fas fa-heart';
        case 'Rein': return 'fas fa-kidneys';
        case 'Articulations': return 'fas fa-bone';
        case 'Poumon': return 'fas fa-lungs';
        case 'Vent-Froid': return 'fas fa-wind';
        case 'Mucosités': return 'fas fa-water';
        case 'Rate': return 'fas fa-heartbeat';
        case 'Humidité-Chaleur': return 'fas fa-fire';
        case 'Qi-Sang': return 'fas fa-gem';
        case 'Esprit': return 'fas fa-brain';
        case 'Rate-Cœur': return 'fas fa-heartbeat';
        case 'Estomac': return 'fas fa-stomach';
        case 'Poids': return 'fas fa-weight';
        case 'Toxines': return 'fas fa-virus-slash';
        case 'Yang': return 'fas fa-fire-alt';
        case 'Shao Yang': return 'fas fa-balance-scale';
        case 'Chaleur': return 'fas fa-fire';
        case 'Vue': return 'fas fa-eye';
        case 'Foie-Rate': return 'fas fa-heartbeat';
        case 'Foie': return 'fas fa-liver';
        case 'Qi': return 'fas fa-wind';
        case 'Vent': return 'fas fa-wind';
        default: return 'fas fa-tag';
    }
}

function applyFilters() {
    const nomFilter = searchNom.value.toLowerCase();
    const alternatifFilter = filterAlternatif.value;
    const planteFilter = filterPlante.value;
    const categorieFilter = filterCategorie.value;

    filteredFormules = formules.filter(formule => {
        const matchesNom = formule.nom.toLowerCase().includes(nomFilter);
        const matchesAlternatif = alternatifFilter ? formule.nom_alternatif === alternatifFilter : true;
        const matchesPlante = planteFilter ? formule.plantes.some(p => p.nom_latin === planteFilter) : true;
        const matchesCategorie = categorieFilter ? formule.categorie === categorieFilter : true;
        return matchesNom && matchesAlternatif && matchesPlante && matchesCategorie;
    });

    currentPage = 1;
    displayPage(currentPage);
    generatePagination();
}

function resetFiltersFunc() {
    searchNom.value = '';
    filterAlternatif.value = '';
    filterPlante.value = '';
    filterCategorie.value = '';
    filteredFormules = [...formules];
    currentPage = 1;
    displayPage(currentPage);
    generatePagination();
}

function displayPage(page) {
    formulaGrid.innerHTML = '';
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedFormules = filteredFormules.slice(start, end);

    paginatedFormules.forEach((formule, index) => {
        const plantesList = formule.plantes.map(p => `${p.nom_latin || p.nom_chinois} (${p.pivot.role_formule || 'Non spécifié'}, ${p.pivot.pourcentage_formule || 'N/A'}%)`).join(', ');
        const alternatifIcon = getIconForAlternatif(formule.nom_alternatif || '');
        const card = document.createElement('div');
        card.className = 'card relative';
        card.style.animationDelay = `${index * 0.15}s`;
        card.innerHTML = `
            <h3><i class="fas fa-vial"></i> ${formule.nom}</h3>
            ${formule.nom_alternatif ? `<p class="nom-alternatif"><i class="${alternatifIcon}"></i> ${formule.nom_alternatif}</p>` : ''}
            ${formule.description ? `<p class="description">${formule.description}</p>` : ''}
            ${plantesList ? `<p class="plantes-list"><i class="fas fa-seedling"></i> <strong>Plantes :</strong> ${plantesList}</p>` : ''}
            <a href="#" class="detail-link"><i class="fas fa-info-circle"></i> En savoir plus</a>
        `;
        formulaGrid.appendChild(card);

        setTimeout(() => {
            card.classList.add('visible');
            card.style.animation = `slideInUp 0.8s ease-out forwards`;
        }, index * 150);
    });

    updateDetailLinks();
}

function generatePagination() {
    pagination.innerHTML = '';
    const totalPages = Math.ceil(filteredFormules.length / itemsPerPage);

    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i> Précédent';
    prevBtn.disabled = currentPage === 1;
    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayPage(currentPage);
            updatePagination();
        }
    });
    pagination.appendChild(prevBtn);

    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.textContent = i;
        pageBtn.className = i === currentPage ? 'active' : '';
        pageBtn.addEventListener('click', () => {
            currentPage = i;
            displayPage(currentPage);
            updatePagination();
        });
        pagination.appendChild(pageBtn);
    }

    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = 'Suivant <i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = currentPage === totalPages;
    nextBtn.addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            displayPage(currentPage);
            updatePagination();
        }
    });
    pagination.appendChild(nextBtn);
}

function updatePagination() {
    const buttons = pagination.querySelectorAll('button');
    buttons.forEach((btn, index) => {
        if (index === 0) btn.disabled = currentPage === 1;
        else if (index === buttons.length - 1) btn.disabled = currentPage === Math.ceil(filteredFormules.length / itemsPerPage);
        else btn.className = (parseInt(btn.textContent) === currentPage) ? 'active' : '';
    });
}

function updateDetailLinks() {
    const detailLinks = document.querySelectorAll('.detail-link');
    detailLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const card = link.parentElement;
            const nom = card.querySelector('h3').textContent.replace(/\s/g, '');
            const formule = formules.find(f => f.nom.replace(/\s/g, '') === nom);
            const nom_alternatif = card.querySelector('.nom-alternatif')?.textContent || '';
            const description = card.querySelector('.description')?.textContent || '';
            const plantesList = card.querySelector('.plantes-list')?.textContent.replace('Plantes : ', '') || '';
            const alternatifIcon = getIconForAlternatif(nom_alternatif);
            const categorieIcon = getIconForCategorie(formule.categorie);

            formulaName.innerHTML = `<i class="fas fa-vial"></i> ${formule.nom}`;
            let detailsHtml = '';
            if (nom_alternatif) detailsHtml += `<p><i class="${alternatifIcon}"></i> <strong>Nom Alternatif :</strong> ${nom_alternatif}</p>`;
            if (description) detailsHtml += `<p><i class="fas fa-file-alt"></i> <strong>Description :</strong> ${description}</p>`;
            if (formule.indications) detailsHtml += `<p><i class="fas fa-diagnoses"></i> <strong>Indications :</strong> ${formule.indications}</p>`;
            if (formule.posologie) detailsHtml += `<p><i class="fas fa-pills"></i> <strong>Posologie :</strong> ${formule.posologie}</p>`;
            if (formule.contre_indications) detailsHtml += `<p><i class="fas fa-exclamation-triangle"></i> <strong>Contre-indications :</strong> ${formule.contre_indications}</p>`;
            if (formule.pharmacologie) detailsHtml += `<p><i class="fas fa-flask"></i> <strong>Pharmacologie :</strong> ${formule.pharmacologie}</p>`;
            if (formule.toxicologie) detailsHtml += `<p><i class="fas fa-skull-crossbones"></i> <strong>Toxicologie :</strong> ${formule.toxicologie}</p>`;
            if (formule.composition) detailsHtml += `<p><i class="fas fa-list-ul"></i> <strong>Composition :</strong> ${formule.composition}</p>`;
            if (formule.etudes_cliniques) detailsHtml += `<p><i class="fas fa-book-medical"></i> <strong>Études Cliniques :</strong> ${formule.etudes_cliniques}</p>`;
            if (formule.remarques) detailsHtml += `<p><i class="fas fa-comment"></i> <strong>Remarques :</strong> ${formule.remarques}</p>`;
            if (formule.categorie) detailsHtml += `<p><i class="${categorieIcon}"></i> <strong>Catégorie :</strong> ${formule.categorie}</p>`;
            if (formule.date_creation) detailsHtml += `<p><i class="fas fa-calendar-alt"></i> <strong>Date de Création :</strong> ${formule.date_creation}</p>`;
            if (formule.statut) detailsHtml += `<p><i class="fas fa-check-circle"></i> <strong>Statut :</strong> ${formule.statut}</p>`;

            // Ajout de liens cliquables pour les plantes associées
            if (plantesList) {
                const plantesLinks = formule.plantes.map(plante => {
                    const planteName = plante.nom_latin || plante.nom_chinois;
                    return `<a href="/plante/${encodeURIComponent(planteName)}" class="text-blue-500 hover:underline">${planteName} (${plante.pivot.role_formule}, ${plante.pivot.pourcentage_formule || 'N/A'}%)</a>`;
                }).join(', ');
                detailsHtml += `<p><i class="fas fa-seedling"></i> <strong>Plantes Associées :</strong> ${plantesLinks}</p>`;
            }

            formulaDetails.innerHTML = detailsHtml;

            overlay.style.display = 'flex';
            overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
            void overlayContent.offsetWidth;
            overlayContent.classList.add('animate-bounce-in');
            setTimeout(() => {
                formulaName.classList.add('animate-rotate-in');
                formulaDetails.querySelectorAll('p').forEach((p, i) => {
                    p.classList.add('animate-slide-in-up');
                    p.style.animationDelay = `${i * 0.2}s`;
                });
                closeBtn.classList.add('animate-fade-in-down');
            }, 100);
        });
    });
}

searchNom.addEventListener('input', applyFilters);
filterAlternatif.addEventListener('change', applyFilters);
filterPlante.addEventListener('change', applyFilters);
filterCategorie.addEventListener('change', applyFilters);
resetFilters.addEventListener('click', resetFiltersFunc);

closeBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
    overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
    formulaName.classList.remove('animate-rotate-in');
    formulaDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
    closeBtn.classList.remove('animate-fade-in-down');
});
overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
        overlay.style.display = 'none';
        overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
        formulaName.classList.remove('animate-rotate-in');
        formulaDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
        closeBtn.classList.remove('animate-fade-in-down');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    displayPage(currentPage);
    generatePagination();
});
