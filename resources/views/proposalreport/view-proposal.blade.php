<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>
@extends('layouts.main-proposal&report')
@section('content')
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Author : {{ $proposal->Author }}</h5>
        <p class="card-text">MatricID : {{ $proposal->MatricID }}</p>
        <p class="card-text">Title : {{ $proposal->Title }}</p>
  </div>
      
    </hr>
  
  </div>
</div>