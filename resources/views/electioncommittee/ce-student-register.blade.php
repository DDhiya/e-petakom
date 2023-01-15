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
    <div class="electionregister__container">
        <br />
        <h1 style="font-size: 1.8rem;">Register As Candidate</h1>
        <form action="RegisterNewCandidate" method="post" enctype="multipart/form-data" id="registercandidate">
        @csrf
            <div style="text-align:center">
            <button class="electionuploadregister">
                <input type="file" name="candidateprofileimage" id="cdprofimage" 
                width="60" height="60" class="profilepicture_fileupload form-control @error('image') is-invalid @enderror">
                
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </button>
        <br />
        <a>
            <h3 style="text-align:center;">Upload Profile Image</h3>
        </a>
        <div class="electionforms__container">
            <div class="electionform__container">
                    <div class="electionform_inputname_manifesto">
                        <div class="electionforminputname">
                            <h4>Name: </h4>
                            <input class="electiontextform_name" type="text" name="studentname" />
                        </div>

                        <div class="electionforminputname">
                            <h4>Manifesto: </h4>
                            <textarea class="electionmanifesto" name="studentmanifesto" form="registercandidate"></textarea>
                            <!-- <input class="electiontextform_manifesto" type="text" name="studentmanifesto"/> -->
                        </div>
                    </div>
                    <br />

                    <div class="electionforminputname">
                        <h4>Matric ID: </h4>
                        <input class="electiontextform_matricid" type="text" name="studentmatricid" />
                    </div>

                    <br />

                    
                    <h4>Position to compete for: </h4>
                    <select class="eform-select position-dropdown" name="studentposition">
                                <option selected>Choose position</option>
                                <option value="Majlis Tertinggi">Majlis Tertinggi</option>
                                <option value="Portfolio Sukan & Rekreasi">Portfolio Sukan & Rekreasi</option>
                                <option value="Portfolio Keusahawanan & Logistik">Portfolio Keusahawanan & Logistik</option>
                                <option value="Portfolio Komuniti Luar & Hubungan Antarabangsa">Portfolio Komuniti Luar & Hubungan Antarabangsa</option>
                                <option value="Portfolio Hebahan & Publisiti">Portfolio Hebahan & Publisiti</option>
                                <option value="Portfolio Multimedia">Portfolio Multimedia</option>
                                <option value="Portfolio Sahsiah & Kebajikan">Portfolio Sahsiah & Kebajikan</option>
                                <option value="Portfolio Akademik & Kerjaya">Portfolio Akademik & Kerjaya</option>
                            </select>
                    <br />
                    <h4>Terms & Conditions of becoming a member of the PETAKOM Committee </h4>
                    <br />
                    <textarea class="electionterms" label="terms" rows="7" disabled>
First term
First term
First term
First term
First term
First term
                            </textarea>
                    <br />
                    <div style="text-align:center">
                        <a href="{{url()->previous()}}">
                        <button class="electionnormal">
                            <h3 style="font-size:medium">Cancel</h3>
                        </button>
                        </a>
                        <input class="submitelection" type="submit" value="Register">
                    </div>
            </div>
        </div>
</form>
@endsection
