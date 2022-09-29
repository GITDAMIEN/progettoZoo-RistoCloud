<x-layout>
    
    <x-slot name="title">Tutti gli animali</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutti gli animali di RistoZoo</h1>

    @auth    
        {{-- BOTTONE PER MODALITA' DI MODIFICA --}}
        <button id="modifyModeBtn" class="btn redZooBg mb-4" onclick="switchMod()"><i class="fa-solid fa-pen me-3"></i>Modalità modifica: <span id="modSpan">OFF</span></button>
    @endauth

    @if (count($allAnimals)<1)
        <div class="row">
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Nessun animale disponibile!</div>
            <a class="btn btn-warning w-50 offset-3" href="{{route('enlargeZoo')}}">Inserisci tu il primo animale!</a>
        </div>
    @else
            
        {{-- CAMPI DI RICERCA --}}
        <form id="searchForm" action="" class="text-center container mb-3 pb-3">
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
                    <div id="ageSearch" class="d-flex">
                        <input type="number" class="form-control w-50 me-1" placeholder="Età minima">
                        <input type="number" class="form-control w-50 ms-1" placeholder="Età massima">
                    </div>
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
        
        {{-- SELECT PER ORDINAMENTO ANIMALI --}}
        <div class="container mb-5">
            <div class="row justify-content-center text-center">
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="sortSelect" class="form-label">Ordina risultati</label>
                    <select id="sortSelect" class="form-select">
                        <option value="a2z" selected>Dalla A alla Z</option>
                        <option value="z2a">Dalla Z alla A</option>
                        <option value="young2old">Dal più giovane al più vecchio</option>
                        <option value="old2young">Dal più vecchio al più giovane</option>
                    </select>
                </div>
            </div>
        </div>

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
                        <div id="modifyIcons" class="d-none redZooBg d-flex align-items-center">

                            {{-- TASTO MODIFICA ANIMALE --}}
                            <a href="{{route('editAnimal', $animal)}}" class="mx-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                            {{-- TASTO ELIMINA ANIMALE --}}
                            <form id="deleteAnimalForm" method="POST" action="{{route('deleteAnimal', $animal)}}" class="">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            
                            {{-- TASTO ELIMINA ANIMALE CON MODALE --}}
                            {{-- <form id="deleteAnimalForm" method="POST" action="{{route('deleteAnimal', $animal)}}" class="">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteAnimalModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form> --}}
                            
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- {{$allAnimals->links()}} --}}
        </div>
    @endif

    <!-- MODALE CONFERMA ELIMINAZIONE ANIMALE -->
    {{-- <div class="modal fade" id="deleteAnimalModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAnimalModalLabel">Conferma eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Confermi di voler eliminare {{$animal->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="submit" form="deleteAnimalForm" class="btn btn-danger">Elimina</button>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        let mod = false;
        let modSpan = document.querySelector('#modSpan');
        let cards = document.querySelectorAll('.card');
        let modifyModeBtn = document.querySelector('#modifyModeBtn');

        function switchMod(){
            mod = !mod;
            modSpan.innerHTML = mod ? 'ON' : 'OFF';
            modifyModeBtn.classList.toggle('greenZooBg');
            modifyModeBtn.classList.toggle('redZooBg');

            cards.forEach(card => {
                card.children[1].classList.toggle('d-none');
                card.children[1].classList.toggle('d-block');
            });
        }

    </script>
</x-layout>