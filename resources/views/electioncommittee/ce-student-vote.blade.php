<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

<script type="text/javascript">
  
  window.onload = function() {
    Hide();
  };

  function Hide() {
    var x = document.getElementById("maindiv");
    var status = document.getElementById("electionstatus").textContent;
    
    if( status  == 'OFF'){
        x.style.display = 'none';
        Show();
    }
    else{
        x.style.display = 'table-row';
    }
  };

  function Show() {
    var y = document.getElementById("substitutediv");
    y.style.display = 'flex';
  };
  

</script>

@extends('layouts.main-election')

@section('content')

<div id="electionstatus" style="display:none;">
  <?php
    echo $status;
  ?>
</div>

    <div class="electionheader__container">
        <h1 class="main__title">Committee Election</h1>
    </div>
    <br />
    <p class="sub__title">Vote Candidate</p>

    <div id="substitutediv" style="display:none">
        <h2>Election has not started yet. Please wait for further announcement. Thank you</h2>
    </div>

    <script>
    document.write(status);
    </script>
    <div class="electionlist__container" id="maindiv">
        <form action="VoteCandidate" method="post" enctype="multipart/form-data" id="votecandidate">
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
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
                            <td class="positionlist"><input type="checkbox" id="vote{{$list->matricid}}" 
                                name="votecandidate[]" value="{{$list->matricid}}">
                                <label for="vote{{$list->matricid}}">Vote</label></td>
                        @endforeach
                    </tr>
                </table>
        </div>

        <div style="text-align:center">
        <a href="{{url()->previous()}}">
                        <button class="electionnormal" disabled>
                            <h3 style="font-size:medium">Cancel</h3>
                        </button>
        </a>
        <input class="submitelection" type="submit" name="action" value="Submit Vote">    
        
            
        </div>
    </form>
    </div>
    
    
        
@endsection
