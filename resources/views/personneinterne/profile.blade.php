@extends('layouts.root')

@section('content')
<br>
<br>
<div class="list-inline">
                <div class="row">
                    <img src="/uploads/avatars/{{ $user->avatar }}" class="vcenter" style=" width: 150px;height: 150px ;float:left;border-radius: 50%; margin-right: 25px;">
                                    <form enctype="multipart/form-data" class="vcenter" action="/profile" method="POST">
                                            <label for="">Mettre a jour votre image </label><br>
                                            <input type="file" name="avatar">
                                            @csrf
                                            <br>
                                            <input type="submit" class="btn btn-sm btn-primary">
                                    </form>

                </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    
                    <div class="card-header text-center">Profile de {{ $user->name }}</div>
                        {{ $user->avatar }}
                   
            






            </div>
    </div>
</div>
</div>
</div>
@endsection
