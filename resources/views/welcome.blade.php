<x-layout>

    <x-slot name="title">Welcome</x-slot>

    @if(session('message'))
        <div class="alert alert-success m-0">{{session('message')}}</div>
    @endif

    <header id="homeHeader">
        <h1 id="homeHeaderH1" class="text-center p-2 yellowZoo blackZooBg mx-4 mx-md-auto offset-lg-3">Benvenuto in RistoZoo!</h1>
    </header>

    <div class="d-flex flex-wrap justify-content-center my-5 py-5">
        <div class="col-12 text-center">
            <a href="{{route('aboutUs')}}" class="btn btn-warning fs-4 my-2">Scopri di più sul nostro zoo</a>
        </div>
        
        <div class="col-12 text-center">
            <a href="{{route('contactUs')}}" class="btn btn-warning fs-4 my-2">Contattaci!</a>
        </div>
    </div>


</x-layout>