@extends('layouts.root')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>

<div class="row">
                    <img src="/uploads/avatars/{{ $user->avatar }}" class="vcenter" style=" width: 150px;height: 150px ;float:left;border-radius: 50%; margin-right: 25px;">
                        <form enctype="multipart/form-data" class="" action="/profile" method="POST">
                                    <div class="form-group"> 
                                    <label for="">Mettre a jour votre image </label><br>
                                    <input type="file" name="avatar">
                                    </div>
                                    @csrf
                                    <br>
                                    <input type="submit" class="btn btn-sm btn-primary">
                        </form>
</div>

@stop