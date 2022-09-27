<x-layout>
    
    <x-slot name="title">Dettagli animale</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Dettagli animale</h1>

    @auth
        <button id="modifyModeBtn" class="btn redZooBg mb-4" onclick="switchMod()"><i class="fa-solid fa-pen me-3"></i>Modalità modifica: <span id="modSpan">OFF</span></button>
    @endauth

    <div class="justify-content-center d-flex mt-5 pt-5">
        
        <div class="card mb-5 mx-3 px-0" style="width: 30rem;">
            <img src="{{$animal->image ? Storage::url($animal->image) : "../storage/images/ImagePlaceholder.png"}}" class="card-img-top" alt="Immagine di animale">
            <div class="card-body">
                <h5 class="card-title mt-2">{{$animal->name}}</h5>
                <p class="card-text" value="{{$animal->category_id}}">{{$animal->category->name}}</p>
                <p class="card-text">{{$animal->description}}</p>
                <span id="etaAnimale">Età: <span>{{$animal->age}}</span> anni</span>
            </div>
        </div>
    </div>


    <div id="modifyIcons2" class="d-none d-flex justify-content-center">

        {{-- TASTO MODIFICA ANIMALE --}}
        <a href="{{route('editAnimal', $animal)}}" class="btn mx-2 btn-warning">
            <i class="fa-solid fa-pen"></i>
            Modifica
        </a>
        
        {{-- TASTO ELIMINA ANIMALE --}}
        <form id="deleteAnimalForm" method="POST" action="{{route('deleteAnimal', $animal)}}" class="">
            @csrf
            @method('delete')
            <button type="button" class="btn redZooBg" data-bs-toggle="modal" data-bs-target="#deleteAnimalModal">
                <i class="fa-solid fa-trash"></i>
                Elimina
            </button>
        </form>
        
    </div>


    <!-- MODALE CONFERMA ELIMINAZIONE ANIMALE -->
    <div class="modal fade" id="deleteAnimalModal" tabindex="-1">
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
    </div>


    <script>
        let mod = false;
        let modSpan = document.querySelector('#modSpan');
        let modifyIcons2 = document.querySelector('#modifyIcons2');

        function switchMod(){
            mod = !mod;
            modSpan.innerHTML = mod ? 'ON' : 'OFF';

            modifyIcons2.classList.toggle('d-none');
            modifyIcons2.classList.toggle('d-block');
        }

    </script>
</x-layout>