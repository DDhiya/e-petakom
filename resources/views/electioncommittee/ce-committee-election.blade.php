<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

@extends('layouts.main-election')

@section('content')
            <div class="electionheader__container">
                <h1 class="main__title">Committee Election</h1>
            </div>
            <br>
            <p class="sub__title">Manage Election</p>
            <div class="mainelection__container">

            <a href="{{route('changeelection')}}">
                <button class="electionmain">
                <h2 style="white-space: nowrap;">Change Election Status</h2><br>
                <h2 style="white-space: nowrap;">Current Status: {{$status}}</h2>
                </button>
            </a>
            </div>
@endsection