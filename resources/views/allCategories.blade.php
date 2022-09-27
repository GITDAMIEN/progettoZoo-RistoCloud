<x-layout>
    
    <x-slot name="title">Tutte le categorie</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Tutte le categorie di RistoZoo</h1>

    @if (count($allCategories)<1)
        <div class="row">
            <div class="gZooFont text-center mb-5 fs-1 redZoo">Nessuna categoria disponibile!</div>
            <a class="btn btn-warning w-50 offset-3" href="{{route('manageZoo')}}">Inserisci tu la prima categoria!</a>
        </div>
    @else
        
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
                    </div>
                @endforeach
            </div>
            {{$allCategories->links()}}
        </div>
    @endif

</x-layout>