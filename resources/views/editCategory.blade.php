<x-layout>

    <x-slot name="title">Modifica categoria</x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 id="headerH1" class="text-center p-2 my-5 mx-4 mx-md-auto offset-lg-3">Modifica categoria</h1>

    <div class="container mb-5 pb-5">
        <div class="row justify-content-center align-items-lg-center">

            <div class="col-12 col-lg-6 ps-lg-0 pe-lg-5">
                <img src="{{$category->image ? Storage::url($category->image) : "../storage/images/ImagePlaceholder.png"}}" class="card-img-top" alt="Immagine di categoria">
            </div>

            {{-- FORM MODIFICA CATEGORIA  --}}
            <form method="POST" action="{{route('confirmCategoryEdit', $category)}}" enctype="multipart/form-data" class="col-12 col-lg-6 pe-lg-0 ps-lg-5 mt-5 mt-lg-0">
                @csrf
                @method('PUT')

                <div class="w-100 text-center mt-4">
                    <label for="newCategoryNameInput" class="form-label">Nome Categoria</label>
                    <input id="newCategoryNameInput" type="text" class="form-control" name="categoryName" placeholder="Nome categoria" value="{{$category->name}}">
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newCategoryDescriptionInput" class="form-label">Descrizione categoria</label>
                    <textarea name="categoryDescription" id="newCategoryDescriptionInput"  class="form-control" cols="30" rows="6" placeholder="Descrizione categoria">{{$category->description}}</textarea>
                </div>
                <div class="w-100 text-center mt-4">
                    <label for="newCategoryImageInput" class="form-label">Immagine categoria</label>
                    <input id="newCategoryImageInput" type="file" class="form-control" name="categoryImage">
                </div>

                <button type="submit" class="btn btn-warning offset-3 w-50 mt-4">Modifica categoria</button>
            </form>

        </div>
    </div>
    
</x-layout>