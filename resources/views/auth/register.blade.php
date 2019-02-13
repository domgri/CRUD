@extends('layouts.app')
@section('content')
<div class="columns">
   <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
         <div class="card-content">
            <h1 class="title">Register</h1>
            @if($message = Session::get('messageLabel'))
            <div class="alet alert-success">
               <p>{{$message}}</p>
            </div>
            @endif
            <form action="{{route('register')}}" method="POST" role="form">
               {{csrf_field()}}
               <div class="field">
                  <label for="username" class="label">Name</label>
                  <p class="control">
                     <input name="name" class="input {{$errors->has('username') ? 'is-danger' : ''}}" type="text" name="username" id="username" required>
                  </p>
                  @if ($errors->has('username'))
                  <p class="help is-danger">{{$errors->first('username')}}</p>
                  @endif
               </div>
               <div class="field">
                  <label for="email" class="label">Email adress</label>
                  <p class="control">
                     <input name="email" class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com" required>
                  </p>
                  @if ($errors->has('password'))
                  <p class="help is-danger">{{$errors->first('email')}}</p>
                  @endif
               </div>
               <div class="columns">
                  <div class="column">
                     <label  for="password" class="label">Password</label>
                     <p class="control">
                        <input name="password" class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="pasword" required>
                     </p>
                     @if ($errors->has('password'))
                     <p class="help is-danger">{{$errors->first('password')}}</p>
                     @endif
                  </div>
                  <div class="column">
                     <label for="password_confimation" class="label">Confirm Password</label>
                     <p class="control">
                        <input class="input {{$errors->has('password_confimation') ? 'is-danger' : ''}}" type="password" name="password_confimation" id="password_confimation" required>
                     </p>
                     @if ($errors->has('password_confimation'))
                     <p class="help is-danger">{{$errors->first('password_confimation')}}</p>
                     @endif
                  </div>
               </div>
               <button type = "submit"class="button is-primary is-outlined is-fullwidth m-t-20">Register</button>
            </form>
         </div>
      </div>
      <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted"> Already have an Account?</a></h5>
   </div>
</div>
@endsection
