<x-layout>
    
    <x-slot name="title">Tutti gli animali</x-slot>

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutti gli animali di RistoZoo</h1>
    
    {{-- DA ELIMINARE --}}
        @if (count($allAnimals)>0)
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Ci sono animali nel DB da caricare</div>
        @else
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Nessun animale disponibile nel DB</div>
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
                <input type="text" class="form-control" id="ageSearch" placeholder="Cerca per età">
            </div>
            <div class="mb-3 col-12 col-md-6 col-lg-3">
                <label for="categorySearch" class="form-label">Cerca per categoria</label>
                <select id="categorySearch" class="form-select" aria-label="Default select example">
                    <option selected>Tutte le categorie</option>
                    {{-- popolato da JS --}}
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-warning w-25">Cerca</button>
    </form>
        
        
    <div class="container">
        <div class="animalCards row justify-content-center mb-5">
            
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Nome animale</h5>
                    <p class="card-text">Categoria animale</p>
                    <p class="card-text">Descrizione animale</p>
                    <span id="etaAnimale">Età: 10 anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Nome animale</h5>
                    <p class="card-text">Categoria animale</p>
                    <p class="card-text">Descrizione animale</p>
                    <span id="etaAnimale">Età: 10 anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Nome animale</h5>
                    <p class="card-text">Categoria animale</p>
                    <p class="card-text">Descrizione animale</p>
                    <span id="etaAnimale">Età: 10 anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Nome animale</h5>
                    <p class="card-text">Categoria animale</p>
                    <p class="card-text">Descrizione animale</p>
                    <span id="etaAnimale">Età: 10 anni</span>
                </div>
            </div>
            <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Immagine di animale">
                <div class="card-body">
                    <h5 class="card-title mt-2">Nome animale</h5>
                    <p class="card-text">Categoria animale</p>
                    <p class="card-text">Descrizione animale</p>
                    <span id="etaAnimale">Età: 10 anni</span>
                </div>
            </div>
        </div>
    </div>


</x-layout>