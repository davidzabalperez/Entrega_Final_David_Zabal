@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Envia un mensaje nuevo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        session ('status')
                    @endif
                    <br>
                    <br>
                    <span>Nombre:</span>
                    <input type="text" name="" id="" value="{{ Auth::user()->name }}">
                    <br>
                    <span>Mensaje:</span>
                    <br>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <br>
                    <br>
                    <button type="button" class="btn btn-primary">Enviar</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
