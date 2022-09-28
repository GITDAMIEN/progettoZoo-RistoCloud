<x-layout>
    
    <x-slot name="title">Tutte le categorie</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutte le categorie di RistoZoo</h1>

    @auth    
        {{-- BOTTONE PER MODALITA' DI MODIFICA --}}
        <button id="modifyModeBtn" class="btn redZooBg mb-4" onclick="switchMod()"><i class="fa-solid fa-pen me-3"></i>Modalità modifica: <span id="modSpan">OFF</span></button>
    @endauth

    @if (count($allCategories)<1)
        <div class="row">
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Nessuna categoria disponibile!</div>
            <a class="btn btn-warning w-50 offset-3" href="{{route('enlargeZoo')}}">Inserisci tu la prima categoria!</a>
        </div>
    @else
        
        {{-- SELECT PER ORDINAMENTO ANIMALI --}}
        <div class="container mb-5">
            <div class="row justify-content-center text-center">
                <div class="mb-3 col-12 col-md-6 col-lg-3">
                    <label for="sortSelect" class="form-label">Ordina risultati</label>
                    <select id="sortSelect" class="form-select">
                        <option value="a2z" selected>Dalla A alla Z</option>
                        <option value="z2a">Dalla Z alla A</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- CARDS DELLE CATEGORIE --}}
        <div id="cardsContainer" class="container">
            <div class="animalCards row justify-content-center mb-5">

                @foreach($allCategories as $category)
                    <div class="card mb-5 mx-3 px-0 col-12 col-md-4 col-lg-3" style="width: 18rem;">
                        <a href="{{route('allAnimals', ['category' => $category])}}">
                            <img src="{{$category->image ? Storage::url($category->image) : "storage/images/ImagePlaceholder.png"}}" class="card-img-top" alt="Immagine della categoria">
                            <div class="card-body">
                                <h5 class="card-title mt-2">{{$category->name}}</h5>
                                <p class="card-text">{{$category->description}}</p>
                            </div>
                        </a>
                        <div id="modifyIcons" class="d-none redZooBg d-flex align-items-center">

                            {{-- TASTO MODIFICA CATEGORIA --}}
                            <a href="{{route('editCategory', $category)}}" class="mx-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                            {{-- TASTO ELIMINA CATEGORIA --}}
                            <form id="deleteCategoryForm" method="POST" action="{{route('deleteCategory', $category)}}" class="">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            
                            {{-- TASTO ELIMINA CATEGORIA CON MODALE --}}
                            {{-- <form id="deleteCategoryForm" method="POST" action="{{route('deleteCategory', $category)}}" class="">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form> --}}
                            
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- {{$allCategories->links()}} --}}
        </div>
    @endif

    <!-- MODALE CONFERMA ELIMINAZIONE CATEGORIA -->
    {{-- <div class="modal fade" id="deleteCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel">Conferma eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Confermi di voler eliminare {{$category->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="submit" form="deleteCategoryForm" class="btn btn-danger">Elimina</button>
                </div>
            </div>
        </div>
    </div> --}}


    <script>
        let mod = false;
        let modSpan = document.querySelector('#modSpan');
        let cards = document.querySelectorAll('.card');

        function switchMod(){
            mod = !mod;
            modSpan.innerHTML = mod ? 'ON' : 'OFF';

            cards.forEach(card => {
                card.children[1].classList.toggle('d-none');
                card.children[1].classList.toggle('d-block');
            });
        }

    </script>
</x-layout>