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
            <br>
            {{$errors->first('name')}}
            <br>
            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            <br>
            {{$errors->first('email')}}
            <p> </p>
            <input placeholder="contraseña nueva" type="password" name="password" id="password" value="">
            <br>
            {{$errors->first('password')}}
            <p></p>
            <button type="submit" class="btn btn-primary">cambiar datos</button>
            </form>
</div>

  

@endsection
