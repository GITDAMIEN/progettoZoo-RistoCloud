<x-layout>

    <x-slot name="title">Modifica animale</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Modifica animale</h1>

    <div class="container mb-5 pb-5">
        <div class="row justify-content-center align-items-lg-center">

            <div class="col-12 col-lg-6 ps-lg-0 pe-lg-5">
                <img src="{{$animal->image ? Storage::url($animal->image) : "../storage/images/ImagePlaceholder.png"}}" class="card-img-top" alt="Immagine di animale">
            </div>

            {{-- FORM MODIFICA ANIMALE  --}}
            <form method="POST" action="{{route('confirmAnimalEdit', $animal)}}" enctype="multipart/form-data" class="col-12 col-lg-6 pe-lg-0 ps-lg-5 mt-5 mt-lg-0">
                @csrf
                @method('PUT')

                <div class="w-100 text-center mt-4">
                    <label for="newAnimalNameInput" class="form-label">Nome animale</label>
                    <input id="newAnimalNameInput" type="text" class="form-control" name="animalName" placeholder="Nome animale" value="{{$animal->name}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalDescriptionInput" class="form-label">Descrizione animale</label>
                    <textarea name="animalDescription" id="newAnimalDescriptionInput"  class="form-control" cols="30" rows="6" placeholder="Descrizione animale">{{$animal->description}}</textarea>
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalAgeInput" class="form-label">Età animale</label>
                    <input id="newAnimalAgeInput" type="number" class="form-control" name="animalAge" placeholder="Età animale" value="{{$animal->age}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newAnimalImageInput" class="form-label">Immagine animale</label>
                    <input id="newAnimalImageInput" type="file" class="form-control" name="animalImage">
                </div>

                <div class="w-100 text-center mt-4">
                    <label for="newAnimalCategoryInput" class="form-label">Categoria animale</label>
                    <select id="newAnimalCategoryInput" class="form-select" name="category">
                        @if(count($categories)<1)
                            <option value="0">Nessuna categoria presente. Inserisci una nuova categoria.</option>
                        @else
                            @foreach ($categories as $category)
                                <option @if($category->id == $animal->category_id) selected="selected" @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-warning offset-3 w-50 mt-4">Modifica animale</button>
            </form>

        </div>
    </div>
    
</x-layout>