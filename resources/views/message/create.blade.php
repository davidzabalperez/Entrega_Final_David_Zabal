@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Enviar Mensaje</h2>
        <hr>
        <form method="post" action="/message">
            <div class="form-group">
                @csrf
                <label for="receiver_id">Destinatario:</label>
                <select name="receiver_id" id="receiver_id">
                    @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>    
                    @endforeach
                </select>
                <br>
                {{$errors->first('receiver_id')}}
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="text">Mensaje:</label>
                  <textarea class="form-control" name="text" id="text" rows="5">
                  </textarea>
                  <br>
                  {{$errors->first('text')}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

@endsection
