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


    {{-- <form method="POST" action="{{route('contactForm')}}">
        @csrf
        <div class="mb-3 w-75 mx-auto mt-5">
          <label for="nameInput" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nameInput" name="name" placeholder="Nome" value="{{Auth::user() ? Auth::user()->name : old('name')}}">
        </div>
        <div class="mb-3 w-75 mx-auto">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" value="{{Auth::user() ? Auth::user()->email : old('email')}}">
        </div>
        <div class="mb-3 w-75 mx-auto">
          <label for="messageInput" class="form-label">Messaggio</label>
          <textarea name="message" class="form-control" id="messageInput" cols="30" rows="10" placeholder="Scrivi qui il tuo messaggio" value="{{old('message')}}"></textarea>
        </div>
        <div class="mb-3 w-75 mx-auto">
            <button type="submit" class="btn btn-warning w-100 mt-3">Invia messaggio</button>
        </div>
    </form> --}}


</x-layout>