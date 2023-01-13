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
            <a href="{{route('electionregister')}}">
                <td>
                    <button class="electionmain">
                
                        <h2>Register As Candidate</h2>
                
                    </button>
                </td>
            </a>

            <a href="{{route('electionregister')}}">
                <td>
                    <button class="electionmain">
                
                        <h2>Register As Candidate</h2>
                
                    </button>
                </td>
            </a>
            
            <a href="{{route('electionvote')}}">
                <button class="electionmain">
                
                    <h2>Vote Candidate</h2>
                
                </button>
            </a>
            </div>
@endsection