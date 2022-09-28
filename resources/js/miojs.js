//SE SONO ALLA PAGINA DI TUTTI GLI ANIMALI
if(window.location.pathname == '/allAnimals'){

    // Selezione delle card dall'html
    let animalCards = Array.from(document.querySelectorAll('.card'));

    //Selezione tasto cerca
    let searchBtn = document.querySelector('#searchBtn');
    let resetBtn = document.querySelector('#resetBtn');

    searchBtn.addEventListener('click', ()=>{
        let nameSearched = document.querySelector('#nameSearch').value.toLowerCase();
        let descriptionSearched = document.querySelector('#descriptionSearch').value.toLowerCase();
        let ageSearched = document.querySelector('#ageSearch');
        let categorySearched = document.querySelector('#categorySearch').value;
        
        // console.log(ageSearched);
        // console.log(nameSearched);

        searchName(nameSearched);
        searchDescription(descriptionSearched);
        searchAge(ageSearched);
        // console.log(categorySearched)
        searchCategory(categorySearched);
    })

    resetBtn.addEventListener('click', ()=>{
        animalCards.forEach(card=>{
            card.classList.add('d-block')
            card.classList.remove('d-none')
        })
    })

    //ricerca per nome
    function searchName(nameSearched){
        animalCards.forEach(card=>{
            let animalName = card.children[0].children[1].children[0].innerText.toLowerCase();

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
        animalCards.forEach(card=>{
            let animalDescription = card.children[0].children[1].children[2].innerText.toLowerCase();

            if(! animalDescription.includes(descriptionSearched)){
                card.classList.add('d-none')
                card.classList.remove('d-block')
            }
        })
    }

    //ricerca per età
    function searchAge(ageSearched){
        animalCards.forEach(card=>{
            let animalAge = Number(card.children[0].children[1].children[3].children[0].innerText)
            let minSearched = Number(ageSearched.children[0].value);
            let maxSearched = Number(ageSearched.children[1].value);

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
        animalCards.forEach(card=>{
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


    // ordinamento animalCards
    let sortSelect = document.querySelector('#sortSelect');
    sortSelect.addEventListener('input', sortAnimals);

    sortAnimals() //sort iniziale al caricamento della pagina, in ordine alfabetico

    function sortAnimals(){
        switch(sortSelect.value){
            case 'a2z' :    animalCards.sort((a,b)=>{
                                if(a.children[0].children[1].children[0].innerText.toLowerCase() < b.children[0].children[1].children[0].innerText.toLowerCase())
                                    return -1
                                if(b.children[0].children[1].children[0].innerText.toLowerCase() < a.children[0].children[1].children[0].innerText.toLowerCase())
                                    return 1
                                    
                                // se stesso nome
                                return 0
                            })
                            break;
            case 'z2a' :    animalCards.sort((b,a)=>{
                                if(a.children[0].children[1].children[0].innerText.toLowerCase() < b.children[0].children[1].children[0].innerText.toLowerCase())
                                    return -1
                                if(b.children[0].children[1].children[0].innerText.toLowerCase() < a.children[0].children[1].children[0].innerText.toLowerCase())
                                    return 1
                                
                                // se stesso nome
                                return 0
                            })
                            break;
            case 'young2old' :  animalCards.sort((a,b)=>{
                                    if(Number(a.children[0].children[1].children[3].children[0].innerText) < Number(b.children[0].children[1].children[3].children[0].innerText))
                                        return -1
                                    if(Number(b.children[0].children[1].children[3].children[0].innerText) < Number(a.children[0].children[1].children[3].children[0].innerText))
                                        return 1
                                    
                                    // se stessa età
                                    return 0
                                })
                                break;
            case 'old2young' :  animalCards.sort((b,a)=>{
                                    if(Number(a.children[0].children[1].children[3].children[0].innerText) < Number(b.children[0].children[1].children[3].children[0].innerText))
                                        return -1
                                    if(Number(b.children[0].children[1].children[3].children[0].innerText) < Number(a.children[0].children[1].children[3].children[0].innerText))
                                        return 1
                                    
                                    // se stessa età
                                    return 0
                                })
                                break;
            default : break;
        }

        orderCards();
    }

    function orderCards(){
        animalCards.forEach((card,i) =>{
            card.style.order = i;
        })
    }    

}

// if(window.location.pathname == '/allAnimals' || window.location.pathname == '/allCategories'){

//     // CENTRARE NAVIGATION LINKS
//     let cardsContainerNav = document.querySelector("#cardsContainer nav");

//     cardsContainerNav.getElementsByTagName('div')[0].classList.remove('justify-content-between');
//     cardsContainerNav.getElementsByTagName('div')[0].classList.add('justify-content-center');

//     cardsContainerNav.getElementsByTagName('div')[1].classList.remove('justify-content-sm-between');
//     cardsContainerNav.getElementsByTagName('div')[1].classList.add('justify-content-sm-center');

//     cardsContainerNav.getElementsByTagName('div')[1].removeChild(cardsContainerNav.getElementsByTagName('div')[1].getElementsByTagName('div')[0]);
// }