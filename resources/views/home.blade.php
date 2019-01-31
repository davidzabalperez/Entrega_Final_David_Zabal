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

                    UNIDAD 6 'AUTENTIFICACION'
                    <p></p>
                    @if (Cookie::get('userName') != null)
                    Esto es una cookie:
                    {{ Cookie::get('userName')}}
                    @else
                        {{'No hay cookie'}}
                    @endif
                    
                    @auth
                    @if(Auth::user()->hasRole('admin'))
                        <div>Acceso como administrador</div>
                    @else
                        <div>Acceso usuario</div>
                    @endif    
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
