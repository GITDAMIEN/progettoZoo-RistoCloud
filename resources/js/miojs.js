let categories = [
    {
        'name' : 'Animali acquatici',
        'description' : 'Animali che vivono nell\'acqua',
        'image' : ''
    },
    {
        'name' : 'Volatili',
        'description' : 'Animali che dominano i cieli',
        'image' : ''
    },
    {
        'name' : 'Animali di terra',
        'description' : 'Animali che camminano tra di noi',
        'image' : ''
    },
    {
        'name' : 'Insetti',
        'description' : 'I più odiati di tutti',
        'image' : ''
    },
    {
        'name' : 'Fuoco',
        'description' : 'Solo i pokèmon possono appartenere a questa categoria',
        'image' : ''
    },
]

//SE SONO ALLA PAGINA DI TUTTI GLI ANIMALI
if(window.location.pathname == '/allAnimals'){

    // Selezione delle card dall'html
    let cards = document.querySelectorAll('.card');

    //Selezione tasto cerca
    let searchBtn = document.querySelector('#searchBtn');
    let resetBtn = document.querySelector('#resetBtn');

    searchBtn.addEventListener('click', ()=>{
        let nameSearched = document.querySelector('#nameSearch').value;
        let descriptionSearched = document.querySelector('#descriptionSearch').value;
        let ageSearched = document.querySelector('#ageSearch');
        let categorySearched = document.querySelector('#categorySearch').value;
        
        // console.log(ageSearched);

        searchName(nameSearched);
        searchDescription(descriptionSearched);
        searchAge(ageSearched);
        // console.log(categorySearched)
        searchCategory(categorySearched);
    })

    resetBtn.addEventListener('click', ()=>{
        cards.forEach(card=>{
            card.classList.add('d-block')
            card.classList.remove('d-none')
        })
    })

    //ricerca per nome
    function searchName(nameSearched){
        cards.forEach(card=>{
            let animalName = card.children[0].children[1].children[0].innerText

            if(animalName.includes(nameSearched)){
                card.classList.add('d-block')
                card.classList.remove('d-none')
            }
            else{
                card.classList.add('d-none')
                card.classList.remove('d-block')
            }
        })
    }

    //ricerca per descrizione
    function searchDescription(descriptionSearched){
        cards.forEach(card=>{
            let animalDescription = card.children[0].children[1].children[2].innerText

            if(! animalDescription.includes(descriptionSearched)){
                card.classList.add('d-none')
                card.classList.remove('d-block')
            }
        })
    }

    //ricerca per età
    function searchAge(ageSearched){
        cards.forEach(card=>{
            let animalAge = card.children[0].children[1].children[3].children[0].innerText
            let minSearched = ageSearched.children[0].value;
            let maxSearched = ageSearched.children[1].value;

            // console.log("Età effettiva: " + animalAge);
            // console.log("Minimo cercato: " + minSearched);
            // console.log("Massimo cercato: " + maxSearched);

            if((minSearched && animalAge < minSearched) || (maxSearched && animalAge > maxSearched)){
                card.classList.add('d-none')
                card.classList.remove('d-block')
            }
        })
    }

    //ricerca per categoria
    function searchCategory(categorySearched){
        cards.forEach(card=>{
            let animalCategory = card.children[0].children[1].children[1].getAttribute("value")

            // console.log(animalCategory)
            if(animalCategory != categorySearched && categorySearched != 0){
                card.classList.add('d-none')
                card.classList.remove('d-block')
            }
        })
    }

    //autosettaggio categoria se presente come parametor nell'url
    let urlParams = new URLSearchParams(window.location.search);

    if(urlParams.get('category')){
        document.querySelector('#categorySearch').value = urlParams.get('category');
        searchCategory(urlParams.get('category'));
    }

}

if(window.location.pathname == '/allAnimals' || window.location.pathname == '/allCategories'){

    // CENTRARE NAVIGATION LINKS
    let cardsContainerNav = document.querySelector("#cardsContainer nav");

    cardsContainerNav.getElementsByTagName('div')[0].classList.remove('justify-content-between');
    cardsContainerNav.getElementsByTagName('div')[0].classList.add('justify-content-center');

    cardsContainerNav.getElementsByTagName('div')[1].classList.remove('justify-content-sm-between');
    cardsContainerNav.getElementsByTagName('div')[1].classList.add('justify-content-sm-center');

    cardsContainerNav.getElementsByTagName('div')[1].removeChild(cardsContainerNav.getElementsByTagName('div')[1].getElementsByTagName('div')[0]);
}