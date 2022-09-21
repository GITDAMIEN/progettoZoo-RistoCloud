<x-layout>

    <x-slot name="title">Login</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h3 class="text-center my-5 fs-3">Fai il login su RistoZoo</h3>

    <form method="POST" action="{{route('login')}}" class="text-center d-flex justify-content-center flex-column">
        @csrf
        <div class="mb-3 w-50 mx-auto">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailInput" name="email">
        </div>
        <div class="mb-3 w-50 mx-auto">
          <label for="passwordInput" class="form-label">Password</label>
          <input type="password" class="form-control" id="passwordInput" name="password">
        </div>
        <button type="submit" class="btn btn-warning w-50 mx-auto mt-3">Login</button>
    </form>

</x-layout>
