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
  <form method="POST" class="mt-3" style="width:50%; margin: 0 auto;"
   @if(isset($post))
   action="{{route('update',$post->id)}}"
   @else
   action="{{route('store')}}"
   @endif>
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" @if(isset($post)) value="{{$post->name}}" @endif name="name" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Text</label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3">@if(isset($post)) {{$post->text}} @endif</textarea>
    </div>
  <div>
    <button type="submit" class="btn btn-success">
      @if(isset($post))
      Update post
      @else
      Create post
      @endif
    </button>
  </div>
  </form>
</div>
</x-app-layout>