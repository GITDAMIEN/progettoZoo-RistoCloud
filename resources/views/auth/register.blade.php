<x-layout>

    <x-slot name="title">Registrati</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h3 class="text-center my-5 fs-3">Registrati su RistoZoo</h3>

    <form method="POST" action="{{route('register')}}" class="text-center d-flex justify-content-center flex-column">
        @csrf
        <div class="mb-3 w-50 mx-auto">
          <label for="nameInput" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nameInput" name="name">
        </div>
        <div class="mb-3 w-50 mx-auto">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailInput" name="email">
        </div>
        <div class="mb-3 w-50 mx-auto">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password">
        </div>
        <div class="mb-3 w-50 mx-auto">
          <label for="passwordConfirmationInput" class="form-label">Ripeti la password</label>
          <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-warning w-50 mx-auto mt-3">Registrati</button>
    </form>

</x-layout>
