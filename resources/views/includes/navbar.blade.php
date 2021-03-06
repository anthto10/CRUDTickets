<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
  <a class="navbar-brand" href="#">CRUD Tickets</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item {{Request::is('register') ? 'active': ''}}">
        <a class="nav-link" href="{{route('tickets.register')}}">
            Registro de Tickets <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item  {{Request::is('list','list/*','edit/*') ? 'active': ''}}">
        <a class="nav-link" href="{{route('tickets.list')}}">
            Lista de Tickets
        </a>
      </li>
    </ul>
  </div>
</nav>