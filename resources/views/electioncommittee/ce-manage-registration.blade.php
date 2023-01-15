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
    <br />
        <p class="sub__title">Manage Candidate Registration</p>
        
    <div class="electionlist__container">
        <form action="ApproveCandidate" method="post" enctype="multipart/form-data" id="approvecandidate">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="positionlist__table">
            <h2 class="position__title">High Council Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($highcouncillist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($highcouncillist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($highcouncillist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($highcouncillist as $list)
                            <td class="positionlist"><input type="checkbox" id="select{{$list->matricid}}" 
                                name="selectcandidate[]" value="{{$list->matricid}}">
                                <label for="select{{$list->matricid}}">Select</label></td>
                        @endforeach
                    </tr>
                </table>
        </div>
        
        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Publicity & Announcement Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($publicitylist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($publicitylist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($publicitylist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($publicitylist as $list)
                            <td class="positionlist"><input type="checkbox" id="select{{$list->matricid}}" 
                                name="selectcandidate[]" value="{{$list->matricid}}">
                                <label for="select{{$list->matricid}}">Select</label></td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Sports & Recreation Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($sportslist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($sportslist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($sportslist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($sportslist as $list)
                            <td class="positionlist"><input type="checkbox" id="select{{$list->matricid}}" 
                                name="selectcandidate[]" value="{{$list->matricid}}">
                                <label for="select{{$list->matricid}}">Select</label></td>
                        @endforeach
                    </tr>
                </table>
        </div>
        <div style="text-align:center">
                <input class="submitelection" type="submit" name="action" value="Approve">
                <input class="submitelection" type="submit" name="action" value="Reject">
        </div>
    </div>
    </form>
@endsection
