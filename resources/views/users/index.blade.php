<x-app-layout>
    <x-slot name="header">

    </x-slot>

<div class="container mt-6">

@if (session('status'))
          <div class="alert alert-success mt-3">
              {{session('status')}}
          </div>
@endif

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
</x-app-layout>