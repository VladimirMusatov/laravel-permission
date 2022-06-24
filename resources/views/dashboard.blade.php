<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">

        @if (session('status'))
          <div class="alert alert-success mt-3">
              {{session('status')}}
          </div>
        @endif

        @if(auth()->user()->can('add posts'))
        <div class="mb-5">
            <a href="{{route('form')}}" class="btn btn-success">Add new article</a>
        </div>
        @endif
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-12 mt-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">{{$post->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">{{$post->text}}</p>
                     @if(auth()->user()->can('edit posts'))
                        <a href="{{route('edit',$post->id)}}" class="card-link btn btn-warning">Edit</a>
                     @endif
                     @if(auth()->user()->can('delete posts'))
                    <a href="{{route('delete',$post->id)}}" class="card-link btn btn-danger">Delete</a>
                     @endif
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
