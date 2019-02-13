@extends('layouts.app')
@section('content')
<div class="flex-container">
   <div class="card">
      <div class="card-content">
         <div class="columns is-vcentered">
            <div class="column m-b-15">
               <h1 class="title center m-t-15"> Users Table</h1>
            </div>
            <div class="column">
               @if($message = Session::get('messageLabel'))
               <article class="message is-primary">
                  <div id="info" class="message-body ">
                     <p>{{$message}}</p>
                  </div>
               </article>
               @endif
               @if($message = Session::get('messageLogIn'))
               <article class="message is-primary">
                  <div id="info" class="message-body ">
                     <p>{{$message}}</p>
                  </div>
               </article>
               @endif
            </div>
         </div>
      </div>
   </div>
   <hr>
   <div class="card">
      <div class="card-content">
         <table class="table is-striped table is-hoverable table is-narrow is-fullwidth" name="123">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Data created</th>
                  <th>Role</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
               <tr class="id{{$user->id}}">
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at->toFormattedDateString()}}</td>
                  <!--<th>{{!! $user->roles->pluck('name') !!}}</th> -->
                  <td>{!!$user->printClearRole()!!}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   {{$users->links()}}
</div>
@endsection
