<x-app-layout>
    <x-slot name="header">

    </x-slot>

<div class="container">


@if ($errors->any())
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


<!-- Create Post Form -->
  <form method="POST" class="mt-3" style="width:50%; margin: 0 auto;" action="{{route('roles.store')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
    </div>

      @foreach($permissions as $permission)
       <div class="form-check">
        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
        {{$permission->name}}
       </label>
      </div>
      @endforeach
    
  <div>
    <button type="submit" class="btn btn-success">
      Create role
    </button>
  </div>
  </form>
</div>
</x-app-layout>