@extends('layouts.manage')

@section('content')

<div class="flex-container">

  <div class="card">
    <div class="card-content">
<div class="columns is-vcentered ">
    <div class="column m-b-15">
       <h1 class="title center m-t-15"> Manage Users</h1>
     </div>
     <div class="column">
       @if($message = Session::get('messageLabel'))
         <article class="message is-primary">
         <div id="info"  class="message-body ">
           <p>{{$message}}</p>
         </div>
         <div class="white-div">
           <p hidden id="buttons"><a href="{{route('users.create')}}" class="button is-primary is-right m-r-20  p-b-10 "><i class= "fa fa-user-plus m-r-10" ></i>Create New User</a>
           <a href="{{route('store')}}" class="button is-link is-right m-r-20 p-b-10"><i  class= "fa fa-user-plus  m-r-10"></i>Import New User</a></p>
         </div>
         </article>
         </div>

          @elseif($message = Session::get('errorLabel'))
           <article class="message is-warning">
           <div id="info"  class="message-body ">
             <p>{{$message}}</p>
           </div>
           <div class="white-div">
             <p hidden id="buttons"><a href="{{route('users.create')}}" class="button is-primary is-right m-r-20  p-b-10 "><i class= "fa fa-user-plus m-r-10" ></i>Create New User</a>
             <a href="{{route('store')}}" class="button is-link is-right m-r-20 p-b-10"><i  class= "fa fa-user-plus  m-r-10"></i>Import New User</a></p>
           </div>
         </article>
         @else
         <p hidden id="buttonsFast"><a href="{{route('users.create')}}" class="button is-primary is-right m-r-20  p-b-10 "><i class= "fa fa-user-plus m-r-10" ></i>Create New User</a>
         <a href="{{route('store')}}" class="button is-link is-right m-r-20 p-b-10"><i  class= "fa fa-user-plus  m-r-10"></i>Import New User</a></p>
           @endif

     </div>

   </div>
 </div>
</div>
<br>

  <div class="card">
    <div class="card-content">
      <table class="table is-striped table is-hoverable is-narrow is-fullwidth" name="123">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Data created</th>
            <th>Role</th>
            <th></th>
          </tr>
        </thead>
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

          <td class="has-text-right"><a class="button is-outlined is-info is-small m-r-5" href="{{route('users.show', $user->id)}}">View</a>
          <a class="button is-outlined is-warning is-small m-r-5" href="{{route('users.edit', $user->id)}}">Edit</a>
          <input type="submit" class="button is-outlined is-danger is-small "name="_method"  value="Delete" form = "form1" /></a>
          <form id = "form1"class="form-inline" action="{{route('users.destroy', $user->id)}}" method="POST">
          {{csrf_field()}}

          <a href="{{route('users.destroy', $user->id)}}" >
        </form>
        </td>

        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>

{{$users->links()}}
</div>


@endsection

<style scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s
  }
  .fade-enter, .fade-leave-to {
    opacity: 0
  }
</style>

<script>

  export default {
    name: 'flash-view',
    data() {
      return {
        type: '',
        message: '',
        visible: false,
      };
    },
    created() {
      this.$on('flashMessage', data => this.setData(data));
    },
    methods: {
      setData(data) {
        this.type = `alert alert-${data.type}`;
        this.message = data.message;
        this.visible = true;
      },
      setFadeOut() {
        setTimeout(() => (
          this.visible = false
        ), 1000);
      },
    },
    watch: {
      visible: 'setFadeOut',
    },
  };
</script>
