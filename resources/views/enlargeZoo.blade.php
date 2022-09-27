<x-layout>

    <x-slot name="title">Aggiungi</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Aggiungi</h1>

    <div class="container mb-5 pb-5">
        <div class="row">

            {{-- FORM INSERIMENTO NUOVO ANIMALE  --}}
            <form method="POST" action="{{route('addAnimal')}}" enctype="multipart/form-data" class="col-12 col-lg-6 ps-lg-0 pe-lg-5">
                <h3 class="text-center mb-2">Aggiungi animale</h3>
                @csrf
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalNameInput" class="form-label">Nome animale</label>
                    <input id="newAnimalNameInput" type="text" class="form-control" name="animalName" placeholder="Nome animale" value="{{old('animalName')}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalDescriptionInput" class="form-label">Descrizione animale</label>
                    <textarea name="animalDescription" id="newAnimalDescriptionInput"  class="form-control" cols="30" rows="6" placeholder="Descrizione animale">{{old('animalDescription')}}</textarea>
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalAgeInput" class="form-label">Età animale</label>
                    <input id="newAnimalAgeInput" type="number" class="form-control" name="animalAge" placeholder="Età animale" value="{{old('animalAge')}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalImageInput" class="form-label">Immagine animale</label>
                    <input id="newAnimalImageInput" type="file" class="form-control" name="animalImage" value="{{old('animalImage')}}">
                </div>

                <div class="w-100 text-center mt-4">
                    <label for="newAnimalCategoryInput" class="form-label">Categoria animale</label>
                    <select id="newAnimalCategoryInput" class="form-select" name="category" value="{{old("category")}}">
                        @if(count($categories)<1)
                            <option value="0">Nessuna categoria presente. Inserisci una nuova categoria.</option>
                        @else
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-warning offset-3 w-50 mt-4">Registra nuovo animale</button>
            </form>

            {{-- FORM INSERIMENTO NUOVA CATEGORIA --}}
            <form method="POST" action="{{route('addCategory')}}" enctype="multipart/form-data" class="col-12 col-lg-6 ps-lg-5 pe-lg-0 mt-5 pt-5 mt-lg-0 pt-lg-0">
                <h3 class="text-center mb-2">Aggiungi categoria</h3>
                @csrf
                <div class="w-100 text-center mt-4">
                    <label for="newCategoryNameInput" class="form-label">Nome categoria</label>
                    <input id="newCategoryNameInput" type="text" class="form-control" name="newCategoryName" placeholder="Nome categoria" value="{{old('newCategoryName')}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newCategoryDescriptionInput" class="form-label">Descrizione categoria</label>
                    <textarea name="newCategoryDescription" id="newCategoryDescriptionInput"  class="form-control" cols="30" rows="6" placeholder="Descrizione categoria">{{old('newCategoryDescription')}}</textarea>
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newCategoryImageInput" class="form-label">Immagine categoria</label>
                    <input id="newCategoryImageInput" type="file" class="form-control" name="newCategoryImage" value="{{old('newCategoryImage')}}">
                </div>

                <button type="submit" class="btn btn-warning offset-3 w-50 mt-4">Registra nuova categoria</button>
            </form>
        </div>
    </div>
    
</x-layout>