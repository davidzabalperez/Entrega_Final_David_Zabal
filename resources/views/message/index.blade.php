@extends("layouts.mainud6")

@section("content")
<br>
<br>
<br>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="/message/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Enviar Nuevo Mensaje</a>
        <tr>
            <th>sender_id</th>
            <th>text</th>
            <th class="text-center">Borrar</th>
        </tr>
    </thead>
      @foreach ($messages as $message)
            <tr>
                <td>{{$message->user_sender->name}}</td>
                <td>{{$message->text}}</td>
                <td class="text-center"> 
                    <form action="{{ route('message.destroy', $message->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form></td>
            </tr>
      @endforeach
    </table>
    </div>
</div>

  

@endsection
