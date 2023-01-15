<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

@extends('layouts.main-election')

@section('content')
            <div class="electionheader__container">
                <h1>Committee Election</h1>
            </div>
            <div class="mainelection__container">

            <a href="{{route('getpositionlist')}}">
                <button class="electionmain">
                    <h2>Manage Candidate Registration</h2>
                </button>
            </a>

                <a href="{{route('getstatus')}}">
                <button class="electionmain">
                    <h2>Manage Election</h2>
                </button>
                </a>

            <a href="{{route('votingcount')}}">
                <button class="electionmain">
                    <h2>Voting Count</h2>
                </button>
            </a>

            </div>
@endsection
