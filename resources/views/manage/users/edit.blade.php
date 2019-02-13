@extends('layouts.clean')

@section('content')
  <div class="flex-container">
    <div class="columns p-b-20">
      <div class="column ">
        <h1 class="title">Edit User</h1>
        @if($message = Session::get('messageLabel'))
        <div class="alet alert-success" id="info" >
          <p>{{$message}}</p>
        </div>
        @endif
      </div>
    </div>

    <form action="{{route('users.update', $user->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="name" class="label">Name:</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name" value="{{$user->name}}" required>
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email:</label>
            <p class="control">
              <input type="text" class="input" name="email" id="email" value="{{$user->email}}" required>
            </p>
          </div>

          <div class="field">
            <label for="password" class="label">Password</label>
            <div class="field">
              <div>

            </div>
              <div>
                <input type="radio" name="password_options" value="keep" v-on:click="isHidden = flase" checked>
                <label for="keep">Do Not Change Password</label>
              </div>
              <div>
                <input type="radio" name="password_options" value="auto" v-on:click="isHidden = flase">
                <label for="auto">Auto Generate New Password</label>
              </div>
              <div id="showORHideTextbox">
                <input type="radio" name="password_options" value="manual"  v-on:click="isHidden = !isHidden">
                <label for="manual">Manually Set New Password</label>
                <input type="text" class="input m-t-10" name="email" id="email" v-if="isHidden">
              </div>
            </div>
          </div> <!-- end of password.column -->
          <div class="field">
            <label for="roles" class="label">Roles:</label>
            @foreach ($roles as $role)
            @if($user->printClearRole() == $role->name)
            <div>
              <input type="radio" name="role" value="{{$role->name}}" checked> {{$role->name}}
            </div>
            @else
            <div>
              <input type="radio" name="role" value="{{$role->name}}"> {{$role->name}}
            </div>
            @endif
            @endforeach
          </div> <!-- end of .column -->
          <button class="button is-primary is-pulled-right" style="width: 250px;">Edit User</button>
    </form>
      </div>
    </div>
  </div> <!-- end of .flex-container -->
@endsection
