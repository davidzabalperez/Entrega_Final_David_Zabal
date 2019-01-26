@extends("layouts.mainud6")

@section("content")
<br>
<br>
<br>
<div class="container">
        <form action="{{ route('user.update', Auth::user()->id) }} " method="post">
          @method('PATCH')
          @csrf
             {{-- <input type="hidden" name="id" value="{{ Auth::user()->id }}"> --}} 
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
            <button type="submit" class="btn btn-primary">cambiar nombre</button>
            <br>
            <br>
            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            <button type="submit" class="btn btn-primary">cambiar email</button>
            </form>
</div>

  

@endsection
