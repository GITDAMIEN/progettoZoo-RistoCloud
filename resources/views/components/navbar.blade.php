<nav class="navbar navbar-expand-lg navbar-light yellowZooBg">
    <div class="container-fluid mx-4">
      <a class="navbar-brand gZooFont blacZoo fs-1 pt-2" href="{{route('welcome')}}"><i class="fa-solid fa-hippo me-3"></i>RistoZoo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-lg-flex text-end pe-2 justify-content-lg-between flex-lg-wrap w-100">
          <ul class="d-lg-flex flex-lg-row">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categorie di animali</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Su di noi</a>
            </li>
          </ul>
          <ul class="d-lg-flex flex-lg-row">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Registrati</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>
            @endguest
          </ul>
        </ul>
      </div>
    </div>
</nav>