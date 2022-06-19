<x-app-layout>
    <x-slot name="header">

    </x-slot>

<div class="container mt-6">

@foreach($roles as $role)
 <div class="col-md-12 mt-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{$role->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"></p>
                    <a href="{{route('edit',$role->id)}}" class="card-link btn btn-warning">Edit</a>
                    <a href="{{route('delete',$role->id)}}" class="card-link btn btn-danger">Delete</a>
                  </div>
                </div>
            </div>
@endforeach

</div>
</x-app-layout>