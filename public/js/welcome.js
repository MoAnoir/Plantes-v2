// Loader Effect
window.addEventListener('load', () => {
    const loader = document.getElementById('loader');
    setTimeout(() => {
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }, 1000);
});

// Back to Top Button
const backToTopButton = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        backToTopButton.classList.add('visible');
    } else {
        backToTopButton.classList.remove('visible');
    }
});

// Search and Filter Logic
const nomSyndromeInput = document.getElementById('nomSyndromeInput');
const categorieSelect = document.getElementById('categorieSelect');
const organeAssocieSelect = document.getElementById('organeAssocieSelect');
const formuleSelect = document.getElementById('formuleSelect');
const filterDisplay = document.getElementById('filterDisplay');
const nomSyndromeSuggestions = document.getElementById('nomSyndromeSuggestions');

// Données dynamiques depuis Laravel (injectées dans welcome.blade.php)
const syndromes = window.syndromesData;
const categories = window.categoriesData;
const organesAssocies = window.organesAssociesData;
const formules = window.formulesData;

let selectedFilters = {
    nomSyndrome: [],
    categorie: [],
    organeAssocie: [],
    formule: []
};

function showSuggestions(input, suggestionsList, data) {
    const value = input.value.toLowerCase();
    suggestionsList.innerHTML = '';
    if (value) {
        const filteredSuggestions = data.filter(item => item.toLowerCase().includes(value));
        filteredSuggestions.forEach(item => {
            const li = document.createElement('li');
            li.className = 'suggestion-item';
            li.textContent = item;
            li.addEventListener('click', () => {
                addFilter('nomSyndrome', item);
                input.value = '';
                suggestionsList.style.display = 'none';
            });
            suggestionsList.appendChild(li);
        });
        suggestionsList.style.display = filteredSuggestions.length ? 'block' : 'none';
    } else {
        suggestionsList.style.display = 'none';
    }
}

function addFilter(type, value) {
    if (!value.trim() || selectedFilters[type].includes(value)) return;

    selectedFilters[type].push(value);

    const tag = document.createElement('span');
    tag.className = 'inline-flex items-center px-3 py-1 bg-green-200 text-green-800 rounded-full text-sm font-medium space-x-1 transition-all duration-300 hover:bg-green-300';
    tag.innerHTML = `${type === 'nomSyndrome' ? 'Nom: ' : type === 'categorie' ? 'Catégorie: ' : type === 'organeAssocie' ? 'Organe: ' : 'Formule: '}${value} <button class="ml-2 text-red-500 hover:text-red-700 focus:outline-none">×</button>`;
    tag.querySelector('button').addEventListener('click', () => removeFilter(type, value, tag));
    filterDisplay.appendChild(tag);

    updateSearchBar();
}

function removeFilter(type, value, tag) {
    selectedFilters[type] = selectedFilters[type].filter(item => item !== value);
    filterDisplay.removeChild(tag);
    updateSearchBar();
}

function updateSearchBar() {
    const allFilters = [
        ...selectedFilters.nomSyndrome.map(s => `nom:${s}`),
        ...selectedFilters.categorie.map(c => `categorie:${c}`),
        ...selectedFilters.organeAssocie.map(o => `organe:${o}`),
        ...selectedFilters.formule.map(f => `formule:${f}`)
    ];
    document.getElementById('searchInput').value = allFilters.join(' ').trim();
}

nomSyndromeInput.addEventListener('input', () => showSuggestions(nomSyndromeInput, nomSyndromeSuggestions, syndromes));

nomSyndromeInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && syndromes.includes(nomSyndromeInput.value.trim())) {
        e.preventDefault();
        addFilter('nomSyndrome', nomSyndromeInput.value.trim());
        nomSyndromeInput.value = '';
        nomSyndromeSuggestions.style.display = 'none';
    }
});

categorieSelect.addEventListener('change', () => {
    const value = categorieSelect.value;
    if (value) addFilter('categorie', value);
    categorieSelect.value = '';
});

organeAssocieSelect.addEventListener('change', () => {
    const value = organeAssocieSelect.value;
    if (value) addFilter('organeAssocie', value);
    organeAssocieSelect.value = '';
});

formuleSelect.addEventListener('change', () => {
    const value = formuleSelect.value;
    if (value) addFilter('formule', value);
    formuleSelect.value = '';
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('.relative')) {
        nomSyndromeSuggestions.style.display = 'none';
    }
});