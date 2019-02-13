@extends('layouts.logIn')
@section('content')
<div class="columns">
   <div class="column is-one-third is-offset-one-third m-t-100  m-b-100">
      <div class="card">
         <div class="card-content">
            <h1 class="title">Log in</h1>
            <form action="{{route('login')}}" method="POST" role="form">
               {{csrf_field()}}
               <div class="field">
                  <label for="email" class="label">Email adress</label>
                  <p class="control">
                     <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com">
                  </p>
                  @if ($errors->has('email'))
                  <p class="help is-danger">{{$errors->first('email')}}</p>
                  @endif
               </div>
               <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                     <input class="input {{$errors->has('password|') ? 'is-danger' : ''}}" type="password" name="password" id="pasword">
                  </p>
                  @if ($errors->has('password'))
                  <p class="help is-danger">{{$errors->first('password')}}</p>
                  @endif
               </div>
               <button class="button is-primary is-outlined is-fullwidth m-t-30">Log in</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
