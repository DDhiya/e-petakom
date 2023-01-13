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
                <button class="electionmain">
                
                    <h2>Start Election</h2>
                
                </button>

                <button class="electionmain">
                
                    <h2>Stop Election</h2>
                
                </button>
            </div>
@endsection