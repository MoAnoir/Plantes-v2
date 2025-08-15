// Données injectées depuis Blade
const syndromes = window.syndromesData || [];
const itemsPerPageSyndromes = 50; // Augmenter de 12 à 50 syndromes par page
let currentPageSyndromes = 1;
let filteredSyndromes = [...syndromes];

const syndromeGrid = document.getElementById('syndrome-grid');
const paginationSyndromes = document.getElementById('pagination-syndromes');
const searchNomSyndrome = document.getElementById('search-nom-syndrome');
const filterCategorie = document.getElementById('filter-categorie');
const filterOrganeAssocie = document.getElementById('filter-organe-associe');
const filterFormule = document.getElementById('filter-formule');
const resetFiltersSyndromes = document.getElementById('reset-filters-syndromes');
const popup = document.getElementById('syndrome-detail-popup');
const closeBtn = document.querySelector('.close-btn');

// Appliquer les filtres
function applyFiltersSyndromes() {
    const nomSyndromeFilter = searchNomSyndrome.value.toLowerCase();
    const categorieFilter = filterCategorie.value;
    const organeAssocieFilter = filterOrganeAssocie.value;
    const formuleFilter = filterFormule.value;

    filteredSyndromes = syndromes.filter(syndrome => {
        const matchesNomSyndrome = syndrome.nom_syndrome.toLowerCase().includes(nomSyndromeFilter);
        const matchesCategorie = !categorieFilter || (syndrome.categorie && syndrome.categorie === categorieFilter);
        const matchesOrganeAssocie = !organeAssocieFilter || (syndrome.organe_associe && syndrome.organe_associe === organeAssocieFilter);
        const matchesFormule = !formuleFilter || (syndrome.formules && syndrome.formules.some(formule => formule.nom === formuleFilter));

        return matchesNomSyndrome && matchesCategorie && matchesOrganeAssocie && matchesFormule;
    });

    currentPageSyndromes = 1;
    displaySyndromesPage(currentPageSyndromes);
    generatePaginationSyndromes();
}

// Réinitialiser les filtres
function resetFiltersSyndromesFunc() {
    searchNomSyndrome.value = '';
    filterCategorie.value = '';
    filterOrganeAssocie.value = '';
    filterFormule.value = '';
    filteredSyndromes = [...syndromes];
    currentPageSyndromes = 1;
    displaySyndromesPage(currentPageSyndromes);
    generatePaginationSyndromes();
}

// Afficher la page courante
function displaySyndromesPage(page) {
    syndromeGrid.innerHTML = '';
    const start = (page - 1) * itemsPerPageSyndromes;
    const end = start + itemsPerPageSyndromes;
    const paginatedSyndromes = filteredSyndromes.slice(start, end);

    paginatedSyndromes.forEach((syndrome, index) => {
        const card = document.createElement('div');
        card.className = 'syndrome-card relative';
        card.style.animationDelay = `${index * 0.15}s`;

        let formulesHtml = '';
        if (syndrome.formules && syndrome.formules.length > 0) {
            formulesHtml = `
                <div class="formules-list flex flex-wrap gap-1 text-sm">
                    ${syndrome.formules.map(formule => {
                        if (!formule.id) {
                            console.error('ID de formule manquant pour:', formule);
                            return `<span class="formule-badge text-gray-500">${formule.nom} (ID manquant)</span>`;
                        }
                        return `
                            <a href="${window.routes.formuleShowById(formule.id)}" class="formule-badge text-teal-600 hover:underline">
                                ${formule.nom}
                            </a>
                        `;
                    }).join(', ')}
                </div>
            `;
        } else {
            formulesHtml = '<p class="formules-list text-gray-500 italic text-sm">Aucune formule</p>';
        }

        card.innerHTML = `
            <div class="card-header flex items-center space-x-2">
                <i class="fas fa-book-medical text-teal-600"></i>
                <h3 class="text-base font-semibold text-teal-800 truncate">${syndrome.nom_syndrome}</h3>
            </div>
            ${syndrome.categorie ? `
                <div class="info-item categorie flex items-center space-x-2 text-sm">
                    <i class="fas fa-tag text-gray-500"></i>
                    <span>${syndrome.categorie}</span>
                </div>` : ''}
            ${syndrome.organe_associe ? `
                <div class="info-item organe-associe flex items-center space-x-2 text-sm">
                    <i class="fas fa-heart text-gray-500"></i>
                    <span>${syndrome.organe_associe}</span>
                </div>` : ''}
            ${formulesHtml}
            <a href="#" class="detail-link text-teal-600 hover:underline text-sm" data-id="${syndrome.id_syndrome}"><i class="fas fa-info-circle"></i> Détails</a>
        `;
        syndromeGrid.appendChild(card);

        setTimeout(() => {
            card.classList.add('visible');
            card.style.animation = `zoomIn 0.8s ease-out forwards`;
        }, index * 150);
    });

    // Gestion du clic sur "En savoir plus"
    const detailLinks = document.querySelectorAll('.detail-link');
    detailLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const syndromeId = link.getAttribute('data-id');
            showSyndromeDetails(syndromeId);
        });
    });
}

// Générer la pagination
function generatePaginationSyndromes() {
    paginationSyndromes.innerHTML = '';
    const totalPages = Math.ceil(filteredSyndromes.length / itemsPerPageSyndromes);

    const prevBtn = document.createElement('button');
    prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i> Précédent';
    prevBtn.disabled = currentPageSyndromes === 1;
    prevBtn.addEventListener('click', () => {
        if (currentPageSyndromes > 1) {
            currentPageSyndromes--;
            displaySyndromesPage(currentPageSyndromes);
            updatePaginationSyndromes();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    paginationSyndromes.appendChild(prevBtn);

    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.textContent = i;
        pageBtn.className = i === currentPageSyndromes ? 'active' : '';
        pageBtn.addEventListener('click', () => {
            currentPageSyndromes = i;
            displaySyndromesPage(currentPageSyndromes);
            updatePaginationSyndromes();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        paginationSyndromes.appendChild(pageBtn);
    }

    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = 'Suivant <i class="fas fa-chevron-right"></i>';
    nextBtn.disabled = currentPageSyndromes === totalPages;
    nextBtn.addEventListener('click', () => {
        if (currentPageSyndromes < totalPages) {
            currentPageSyndromes++;
            displaySyndromesPage(currentPageSyndromes);
            updatePaginationSyndromes();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    paginationSyndromes.appendChild(nextBtn);
}

// Mettre à jour la pagination
function updatePaginationSyndromes() {
    const buttons = paginationSyndromes.querySelectorAll('button');
    buttons.forEach((btn, index) => {
        if (index === 0) btn.disabled = currentPageSyndromes === 1;
        else if (index === buttons.length - 1) btn.disabled = currentPageSyndromes === Math.ceil(filteredSyndromes.length / itemsPerPageSyndromes);
        else btn.className = (parseInt(btn.textContent) === currentPageSyndromes) ? 'active' : '';
    });
}

// Afficher les détails dans le popup
function showSyndromeDetails(id) {
    const syndrome = syndromes.find(s => s.id_syndrome == id);
    if (!syndrome) {
        console.error('Syndrome non trouvé pour id:', id);
        return;
    }

    const syndromeName = document.getElementById('syndromeName');
    const syndromeDetails = document.getElementById('syndromeDetails');

    syndromeName.textContent = syndrome.nom_syndrome;
    let detailsHtml = '';
    if (syndrome.categorie) detailsHtml += `<p><strong>Catégorie :</strong> ${syndrome.categorie}</p>`;
    if (syndrome.organe_associe) detailsHtml += `<p><strong>Organe Associé :</strong> ${syndrome.organe_associe}</p>`;
    if (syndrome.description) detailsHtml += `<p><strong>Description :</strong> ${syndrome.description}</p>`;
    if (syndrome.formules && syndrome.formules.length > 0) {
        detailsHtml += `<p><strong>Formules Associées :</strong> ${syndrome.formules.map(f => f.nom).join(', ')}</p>`;
    }
    syndromeDetails.innerHTML = detailsHtml;

    popup.style.display = 'flex';
}

// Événements
searchNomSyndrome.addEventListener('input', applyFiltersSyndromes);
filterCategorie.addEventListener('change', applyFiltersSyndromes);
filterOrganeAssocie.addEventListener('change', applyFiltersSyndromes);
filterFormule.addEventListener('change', applyFiltersSyndromes);
resetFiltersSyndromes.addEventListener('click', resetFiltersSyndromesFunc);

// Fermer le popup
closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});
popup.addEventListener('click', (e) => {
    if (e.target === popup) {
        popup.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', () => {
    displaySyndromesPage(currentPageSyndromes);
    generatePaginationSyndromes();
});