<x-app-layout>
    <x-slot name="header">

    </x-slot>

<div class="container">


@if($errors->any())
      <div class="alert alert-danger mt-3">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
@endif

@if (session('status'))
  <div class="alert alert-success mt-3">
      {{session('status')}}
  </div>
@endif


  <form method="POST" class="mt-3" style="width:50%; margin: 0 auto;" action="{{route('users.update',$user->id)}}">
  <h2>{{$user->name}}</h2>
  <p>Role:
    @foreach($user->roles as $role)
    {{$role->name}}
    @endforeach
  </p>
    @csrf
    @method('PUT')

    <select name="role_id" class="form-select" aria-label="Default select example">
    @foreach($roles as $role)
    <option value="{{$role->id}}" 
    @if($user->hasRole($role->name))
      selected
    @endif
    >{{$role->name}}</option>
    @endforeach
    </select>
  <div>
    <button type="submit" class="btn btn-success mt-3">
      Update role
    </button>
  </div>
  </form>
</div>
</x-app-layout>