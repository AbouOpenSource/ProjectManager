@extends('layouts.root')

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center">Informations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Soyez les bienvenus sur la plateforme de gestion des projets du centre MURAz
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
