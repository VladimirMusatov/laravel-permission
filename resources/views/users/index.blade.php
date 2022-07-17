<x-app-layout>
    <x-slot name="header">
      <div class="container">
    
          <nav class="admin-nav">
            <a class="ad-nav-link active" data-tab="#tab_1">
              Roles
            </a>
            <a class="ad-nav-link" data-tab="#tab_2">
              Users
            </a>
          </nav>
    
      </div>
    </x-slot>

<div class="container mt-6">

@if (session('status'))
          <div class="alert alert-success mt-3">
              {{session('status')}}
          </div>
@endif

<div class="tabs__item active" id="tab_1">
  @foreach($users as $user)
   <div class="col-md-12 mt-3">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$user->name}}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">
                        <p>Role:
                          @foreach($user->roles as $role)
                          {{$role->name}}
                          @endforeach
                        </p>
                      </h6>
                      <p class="card-text"></p>
                      <a href="{{route('users.edit',$user->id)}}" class="card-link btn btn-warning">Edit</a>
                      <a href="{{route('users.destroy',$user->id)}}" class="card-link btn btn-danger">Delete</a>
                    </div>
                  </div>
              </div>
  @endforeach
</div>

<div class="tabs__item" id="tab_2">
  <div class="mb-5">
<a href="{{route('roles.create')}}" class="btn btn-success">Add new role</a>
</div>

@foreach($roles as $role)
 <div class="col-md-12 mt-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{$role->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"></p>
                    <a href="{{route('roles.edit',$role->id)}}" class="card-link btn btn-warning">Edit</a>
                    <a href="{{route('roles.destroy',$role->id)}}" class="card-link btn btn-danger">Delete</a>
                  </div>
                </div>
            </div>
@endforeach
</div>

</div>
</x-app-layout>