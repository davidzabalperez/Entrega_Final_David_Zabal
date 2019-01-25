@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        session ('status')
                    @endif
                    UNIDAD 6 'Esto es el perfil'
                    <br>
                    <form action="changeProfile" method="post">
                        @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-primary">cambiar nombre</button>
                    <br>
                    <br>
                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                    <button type="submit" class="btn btn-primary">cambiar email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
