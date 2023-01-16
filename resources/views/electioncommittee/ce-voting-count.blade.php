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
        <p class="sub__title">Voting Count</p>
        
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
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
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
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
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
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Entrepreneurship & Logistics Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($logisticlist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($logisticlist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($logisticlist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($logisticlist as $list)
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Community & International Relations Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($relationslist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($relationslist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($relationslist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($relationslist as $list)
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Multimedia Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($multimedialist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($multimedialist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($multimedialist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($multimedialist as $list)
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Welfare Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($welfarelist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($welfarelist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($welfarelist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($welfarelist as $list)
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <br>
        <div class="positionlist__table">
            <h2 class="position__title">Academic & Career Portfolio Candidates</h2>
            <br>
                <table>    
                    <tr>
                        @foreach ($academiclist as $list)
                           <td class="positionlist"><img src="{{Storage::url($list->profilepicture)}}" class="candidate_image_reg"></td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($academiclist as $list)
                            <td class="positionlist">{{$list->name}}</td>
                        @endforeach
                    </tr>
            
                    <tr>
                        @foreach ($academiclist as $list)
                            <td class="positionlist">{{$list->intake}} {{$list->major}}</td>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($academiclist as $list)
                            <td class="positionlist">Votes: {{$list->votecount}}</td>
                        @endforeach
                    </tr>
                </table>
        </div>
        <div style="text-align:center">
                <!-- <input class="submitelection" type="submit" name="action" value="Approve">
                <input class="submitelection" type="submit" name="action" value="Reject"> -->
        </div>
    </div>
    </form>
@endsection
