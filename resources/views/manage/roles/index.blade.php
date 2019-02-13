@extends('layouts.clean')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Available Roles</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns is-multiline ">
      @foreach ($roles as $role)
        <div class="column is-one-quarter">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content ">
                  <h3 class="title role-div">{{$role->display_name}}</h3>
                  <h4 class="subtitle role-div"><em>{{$role->name}}</em></h4>
                  <p>
                    {{$role->description}}
                  </p>
                </div>

                <div class="columns is-mobile">
                  <div class="column is-one-half">
                    <a href="{{route('roles.show', $role->id)}}" class="button is-primary is-fullwidth">Details</a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
