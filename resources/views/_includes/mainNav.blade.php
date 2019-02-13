<nav class="navbar" role="navigation" aria-label="main navigation">
   <div class="navbar-brand">
      <a class="navbar-item">
      <img src="{{ asset('images/crud.png') }}" alt="CRUD application" width="112" height="28">
      </a>
   </div>
   <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-item">
         <a href="{{route('home')}}">
            <i class="fa fa-fw fa-home menu-icon"></i>
            <p class="menu-link form-inline"> Home</p>
         </a>
         </a>
      </div>
   </div>
   @if (Auth::guest())
   <div id="navbarBasicExample" class="navbar-end">
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
   @else
   <div id="navbarBasicExample" class="dropdown is-hoverable m-r-30 m-t-10 ">
      <div class="dropdown-trigger">
         <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
         <span>Hey, {{ Auth::user()->name }} !</span>
         <span class="icon is-small">
         <i class="fa fa-caret-down" aria-hidden="true"></i>
         </span>
         </button>
      </div>
      <div class="dropdown-menu" id="dropdown-menu" role="menu">
         <div class="dropdown-content">
            @if(!Auth::User()->hasRole('user'))
            <a href="{{route('users.show', Auth::user()->id)}}" class="dropdown-item">
            <span class="icon"><i class="fa fa-fw fa-user-circle-o"></i></span>
            Profile
            </a>
            <a href="{{route('users.index')}}" class="dropdown-item">
            <span class="icon"><i class="fa fa-fw fa-cog m-r-5"></i></span>
            Manage
            </a>
            @endif
            <a class="dropdown-item"  href="{{route('logout')}}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            <span class="icon"><i class="fa fa-fw fa-sign-out"></i></span>
            Log out
            </a>
         </div>
      </div>
   </div>
   @include('_includes.logout')
   @endif
</nav>
