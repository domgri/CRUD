@extends('layouts.clean')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New User</h1>
        @if($message = Session::get('error'))
        <div class="alet alert-success">
          <p>{{$message}}</p>
        </div>
        @endif


      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <form action="{{route('users.store')}}" method="POST">
          {{csrf_field()}}
          <div class="field">
            <label for="name" class="label">Name</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name" required>
            </p>
          </div>

          <div class="field">
            <label for="email" class="label" pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">Email:</label>
            <p class="control">
              <input type="text" class="input" name="email" id="email" required>
            </p>
          </div>

          <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
              <input type="text" class="input" name="password" id="password" placeholder="Manually give a password to this user" required>
            </p>
          <div class="field">
            <label for="password" class="label">Select Role</label>
            @foreach ($roles as $role)

            <div>
              <input type="radio" name="role" value="{{$role->name}}" checked> {{$role->name}}
            </div>
            @endforeach

          </div>


          <button class="button is-success m-t-20">Create User</button>
        </form>
      </div>
    </div>

  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
<!--
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true
      }
    });
  </script>
-->
@endsection
