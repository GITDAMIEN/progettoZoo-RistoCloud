<x-layout>


    <x-slot name="title">Contattaci</x-slot>


    <h1 id="headerH1" class="text-center p-2 mt-5 mx-4 mx-md-auto offset-lg-3">Contatta RistoZoo</h1>

    <form method="POST" action="{{route('contactForm')}}">
        @csrf
        <div class="mb-3 w-75 mx-auto mt-5">
          <label for="nameInput" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nameInput" name="name" placeholder="Nome" value="{{Auth::user() ? Auth::user()->name : ''}}">
        </div>
        <div class="mb-3 w-75 mx-auto">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" value="{{Auth::user() ? Auth::user()->email : ''}}">
        </div>
        <div class="mb-3 w-75 mx-auto">
          <label for="messageInput" class="form-label">Messaggio</label>
          <textarea name="message" class="form-control" id="messageInput" cols="30" rows="10" placeholder="Scrivi qui il tuo messaggio"></textarea>
        </div>
        <div class="mb-3 w-75 mx-auto">
            <button type="submit" class="btn btn-warning w-100 mt-3">Invia messaggio</button>
        </div>
    </form>

</x-layout>