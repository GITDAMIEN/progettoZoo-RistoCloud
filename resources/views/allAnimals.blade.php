<x-layout>
    
    <x-slot name="title">Tutti gli animali</x-slot>

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutti gli animali di RistoZoo</h1>
    
    {{-- DA ELIMINARE --}}
        @if (count($allAnimals)>0)
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Ci sono animali nel DB da caricare</div>
        @else
            <div class="gZooFont text-center mb-5 fs-1 redZoo border">Nessun animale disponibile nel DB</div>
        @endif
    {{-- FIN QUI --}}

    <form id="searchForm" action="" class="text-center container mb-5 pb-3">
        <div class="row">
            <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="nameSearch" class="form-label">Cerca per nome</label>
                <input type="text" class="form-control" id="nameSearch" placeholder="Cerca per nome">
            </div>
            <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="descriptionSearch" class="form-label">Cerca per descrizione</label>
                <input type="text" class="form-control" id="descriptionSearch" placeholder="Cerca per descrizione">
            </div>
            <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="ageSearch" class="form-label">Cerca per età (numero)</label>
                <input type="number" class="form-control" id="ageSearch" placeholder="Cerca per età">
            </div>
            <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="categorySearch" class="form-label">Cerca per categoria</label>
                <select id="categorySearch" class="form-select" aria-label="Default select example">
                    <option value="0" selected>Tutte le categorie</option>
                    {{-- popolato da JS --}}
                </select>
            </div>
        </div>
        <button type="button" id="searchBtn" class="btn btn-warning w-25 mt-2">Cerca</button>
        <button type="reset" id="resetBtn" class="btn greyZooBg w-25 mt-2">Reset</button>
    </form>
        
        
    <div class="container">
        <div class="animalCards row justify-content-center mb-5">
            
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Mucca</h5>
                    <p class="card-text" value="1">Bovino</p>
                    <p class="card-text">Detta anche vacca</p>
                    <span id="etaAnimale">Età: <span>4</span> anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Gatto</h5>
                    <p class="card-text" value="2">Felino</p>
                    <p class="card-text">Animale ruffiano e approfittatore</p>
                    <span id="etaAnimale">Età: <span>2</span> anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Cavallo</h5>
                    <p class="card-text" value="3">Equino</p>
                    <p class="card-text">Animale super elegante</p>
                    <span id="etaAnimale">Età: <span>10</span> anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Maiale</h5>
                    <p class="card-text" value="4">Suino</p>
                    <p class="card-text">Non solo un animale</p>
                    <span id="etaAnimale">Età: <span>7</span> anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Pecorina</h5>
                    <p class="card-text" value="5">Ovino</p>
                    <p class="card-text">Non solo un animale</p>
                    <span id="etaAnimale">Età: <span>5</span> anni</span>
                </div>
            </div>
        </div>
        {{$allAnimals->links()}}
    </div>


</x-layout>