<x-layout>
    
    <x-slot name="title">Tutti gli animali</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutti gli animali di RistoZoo</h1>

    @if (count($allAnimals)<1)
        <div class="row">
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Nessun animale disponibile!</div>
            <a class="btn btn-warning w-50 offset-3" href="{{route('manageZoo')}}">Inserisci tu il primo animale!</a>
        </div>
    @else
            
        {{-- CAMPI DI RICERCA --}}
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
                    <select id="categorySearch" class="form-select">
                        <option value="0" selected>Tutte le categorie</option>
                        @foreach($allCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="reset" id="resetBtn" class="btn greyZooBg w-25 mt-2">Reset</button>
            <button type="button" id="searchBtn" class="btn btn-warning w-25 mt-2">Cerca</button>
        </form>
        
        {{-- CARDS DEGLI ANIMALI --}}
        <div id="cardsContainer" class="container">
            <div class="animalCards row justify-content-center mb-5">

                @foreach($allAnimals as $animal)
                    <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                        <a href="{{route('animalDetails', $animal)}}">
                            <img src="{{$animal->image ? Storage::url($animal->image) : "storage/images/ImagePlaceholder.png"}}" class="card-img-top" alt="Immagine di animale">
                            <div class="card-body">
                                <h5 class="card-title mt-2">{{$animal->name}}</h5>
                                <p class="card-text" value="{{$animal->category_id}}">{{$animal->category->name}}</p>
                                <p class="card-text">{{$animal->description}}</p>
                                <span id="etaAnimale">Età: <span>{{$animal->age}}</span> anni</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{$allAnimals->links()}}
        </div>
    @endif

</x-layout>