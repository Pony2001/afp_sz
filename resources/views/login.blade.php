<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4" >
<form method="get" class="form-validation" action="admin">
    <div>
        <label for="" class="form-validation mt-3">Felhasználónév:</label>
        <input type="text" name="username" id="username"  minlength="3"
                            class="form-control" placeholder="Pl.: username">
    </div>
    <div>
        <label for="" class="form-validation mt-3">Jelszó:</label>
        <input type="password" name="password" id="password"  minlength="3" class="form-control"
                            placeholder="Pl.: password">
    </div>
    <div align="center">
        <br>
        <button class="btn btn-warning" >Bejelentkezés</button>
    </div>
</form> 

</div>
<div class="col-md-4"></div>
</div>
@endsection