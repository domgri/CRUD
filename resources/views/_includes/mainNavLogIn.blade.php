<nav class="navbar" role="navigation" aria-label="main navigation">
   <div class="navbar-brand">
      <a class="navbar-item">
      <img src="{{ asset('images/crud.png') }}" alt="CRUD application" width="112" height="28">
      </a>
   </div>
   <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
      </div>
   </div>
   <div class="navbar-end">
      <div class="navbar-item">
         <div class="buttons">
            <a href="{{route('register')}}"class="button is-primary">
            <strong>Sign up</strong>
            </a>
            <a href="{{route('login')}}" class="button is-light">
            Log in
            </a>
         </div>
      </div>
   </div>
</nav>
