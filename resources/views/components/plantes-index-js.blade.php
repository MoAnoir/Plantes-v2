<script>
    const plantes = @json($plantes); // Pass the plant data from Laravel
    const itemsPerPage = 12;
    let currentPage = 1;
    let filteredPlantes = [...plantes];
    const plantGrid = document.getElementById('plant-grid');
    const pagination = document.getElementById('pagination');
    const overlay = document.getElementById('plant-detail-overlay');
    const overlayContent = overlay.querySelector('.overlay-content');
    const closeBtn = overlay.querySelector('.close-btn');
    const plantName = document.getElementById('plant-name');
    const plantImage = document.getElementById('plant-image');
    const plantDetails = document.getElementById('plant-details');
    const searchNom = document.getElementById('search-nom');
        const filterPartie = document.getElementById('filter-partie');
        const filterFormule = document.getElementById('filter-formule');
        const resetFilters = document.getElementById('reset-filters');
        function getIconForPartieUtilisee(partie) {
            switch (partie) {
                case 'Feuille': return 'fas fa-leaf';
                case 'Racine': return 'fas fa-root';
                case 'Rhizome': return 'fas fa-seedling';
                case 'Écorce': return 'fas fa-tree';
                case 'Fleur': return 'fas fa-flower';
                default: return 'fas fa-leaf';
            }
        }

        function applyFilters() {
    const nomFilter = searchNom.value.toLowerCase();
    const partieFilter = filterPartie.value;
    const formuleFilter = filterFormule.value;

    filteredPlantes = plantes.filter(plante => {
        const matchesNom = plante.nom_latin ? plante.nom_latin.toLowerCase().includes(nomFilter) : false;
        const matchesPartie = partieFilter ? plante.partie_utilisee === partieFilter : true;
        const matchesFormule = formuleFilter ? plante.formules.some(f => f.nom === formuleFilter) : true;
        return matchesNom && matchesPartie && matchesFormule;
    });

    console.log(filteredPlantes); // Check if the filtering works correctly

    currentPage = 1;
    displayPage(currentPage);
    generatePagination();
}


        function resetFiltersFunc() {
            searchNom.value = '';
            filterPartie.value = '';
            filterFormule.value = '';
            filteredPlantes = [...plantes];
            currentPage = 1;
            displayPage(currentPage);
            generatePagination();
        }
        function displayPage(page) {
    plantGrid.innerHTML = '';
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedPlantes = filteredPlantes.slice(start, end); // Use filteredPlantes instead of plantes

    paginatedPlantes.forEach((plante, index) => {
        const card = document.createElement('div');
        card.className = 'card';
        card.style.animationDelay = `${index * 0.2}s`;
        card.innerHTML = `
            ${plante.image ? `<img src="{{ asset('storage') }}/${plante.image}" alt="${plante.nom_chinois}" />` : 
                `<div class="no-image">Aucune image disponible</div>`}
            <h3>${plante.nom_chinois}</h3>
            ${plante.nom_latin ? `<p class="nom-latin">${plante.nom_latin}</p>` : ''}
            ${plante.description ? `<p class="description line-clamp-3">${plante.description}</p>` : ''}
            <a href="#" class="detail-link mt-4 inline-block" 
                data-nom_chinois="${plante.nom_chinois}"
                data-nom_latin="${plante.nom_latin}"
                data-partie_utilisee="${plante.partie_utilisee}"
                data-description="${plante.description}"
                data-image="${plante.image ? '{{ asset('storage') }}/' + plante.image : ''}"
            >En savoir plus</a>
        `;
        plantGrid.appendChild(card);

        setTimeout(() => {
            card.classList.add('visible');
            card.style.animation = `slideInUp 0.8s ease-out forwards`;
        }, index * 200);
    });

    updateDetailLinks();
}


    function generatePagination() {
        pagination.innerHTML = '';
        const totalPages = Math.ceil(plantes.length / itemsPerPage);

        const prevBtn = document.createElement('button');
        prevBtn.textContent = 'Précédent';
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
        nextBtn.textContent = 'Suivant';
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
            else if (index === buttons.length - 1) btn.disabled = currentPage === Math.ceil(plantes.length / itemsPerPage);
            else btn.className = (parseInt(btn.textContent) === currentPage) ? 'active' : '';
        });
    }

    function updateDetailLinks() {
            const detailLinks = document.querySelectorAll('.detail-link');
            detailLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const card = link.parentElement;
                    const nom_chinois = card.querySelector('h3').textContent.replace(' ', '');
                    const nom_latin = card.querySelector('.nom-latin')?.textContent.replace(' ', '') || '';
                    const partie_utilisee = card.querySelector('.partie-utilisee')?.textContent.replace('Partie : ', '') || '';
                    const image = card.querySelector('img') ? card.querySelector('img').src : '';
                    const formulesList = card.querySelector('.formules-list')?.textContent.replace('Formules : ', '') || '';
                    const description = plantes.find(p => p.nom_chinois === nom_chinois).description || '';
                    const partieIcon = getIconForPartieUtilisee(partie_utilisee);

                    plantName.innerHTML = `<i class="fas fa-seedling"></i> ${nom_chinois}`;
                    plantImage.innerHTML = image ? `<img src="${image}" alt="${nom_chinois}" />` : 
                        `<div class="no-image">Aucune image disponible</div>`;
                    plantDetails.innerHTML = `
                        ${nom_latin ? `<p><i class="fas fa-book"></i> <strong>Nom Latin :</strong> ${nom_latin}</p>` : ''}
                        ${partie_utilisee ? `<p><i class="${partieIcon}"></i> <strong>Partie Utilisée :</strong> ${partie_utilisee}</p>` : ''}
                        ${description ? `<p><i class="fas fa-file-alt"></i> <strong>Description :</strong> ${description}</p>` : ''}
                        ${formulesList ? `<p><i class="fas fa-vial"></i> <strong>Formules Associées :</strong> ${formulesList}</p>` : ''}
                    `;

                    overlay.style.display = 'flex';
                    overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
                    void overlayContent.offsetWidth;
                    overlayContent.classList.add('animate-bounce-in');
                    setTimeout(() => {
                        plantImage.classList.add('animate-spin-fade');
                        plantName.classList.add('animate-rotate-in');
                        plantDetails.querySelectorAll('p').forEach((p, i) => {
                            p.classList.add('animate-slide-in-up');
                            p.style.animationDelay = `${i * 0.2}s`;
                        });
                        closeBtn.classList.add('animate-fade-in-down');
                    }, 100);
                });
            });
        }

        searchNom.addEventListener('input', applyFilters);
        filterPartie.addEventListener('change', applyFilters);
        filterFormule.addEventListener('change', applyFilters);
        resetFilters.addEventListener('click', resetFiltersFunc);


        closeBtn.addEventListener('click', () => {
            overlay.style.display = 'none';
            overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
            plantImage.classList.remove('animate-spin-fade');
            plantName.classList.remove('animate-rotate-in');
            plantDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
            closeBtn.classList.remove('animate-fade-in-down');
        });
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.style.display = 'none';
                overlayContent.classList.remove('animate-bounce-in', 'animate-spin-fade', 'animate-flip-in', 'animate-rotate-in', 'animate-slide-in-up', 'animate-fade-in-down');
                plantImage.classList.remove('animate-spin-fade');
                plantName.classList.remove('animate-rotate-in');
                plantDetails.querySelectorAll('p').forEach(p => p.classList.remove('animate-slide-in-up'));
                closeBtn.classList.remove('animate-fade-in-down');
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            displayPage(currentPage);
            generatePagination();
        });

</script>