<x-layout>
    
    <x-slot name="title">Dettagli animale</x-slot>
    
    @if(session('message'))
        <div class="alert alert-success m-0 text-center">{{session('message')}}</div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Dettagli animale</h1>

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

</x-layout>