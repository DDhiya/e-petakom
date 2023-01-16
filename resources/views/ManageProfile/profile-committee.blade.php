<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

@extends('layouts.main')


@section('content')
    <form action="committee_update" method="POST" enctype="multipart/form-data">
        <div class="header__container">
            <h1>Manage Profile</h1>
        </div>
        <div class="main__container">
            <div class="secondary__container">
                @csrf
                <div class="double__input__field">
                    <div class="input__field">
                        <h4>First Name</h4>
                        <input id="tbprofession" type="first-name" value="{{ $committees[0]->committee_first_name }}"
                            class="input__text" name="committee_first_name">
                    </div>
                    <div class="input__field">
                        <h4>Last Name</h4>
                        <input id="tbprofession" type="last-name" value="{{ $committees[0]->committee_last_name }}"
                            class="input__text" name="committee_last_name">
                    </div>
                </div>
                <div class="double__input__field">
                    <div class="email__input__field">
                        <h4>Email</h4>
                        <input class="input__text" type="email" value="{{ $committees[0]->committee_email }}"
                            name="committee_email">
                    </div>
                    <div class="mobile__no">
                        <h4>Mobile No</h4>
                        <input class="input__text" type="mobile-no" value="{{ $committees[0]->committee_mobile_no }}"
                            name="committee_mobile_no">
                    </div>
                </div>
                <div class="address__">
                    <h4>Address</h4>
                    <input class="input__text" type="address" value="{{ $committees[0]->committee_address }}"
                        name="committee_address">
                </div>
                <div class="double__input__field">
                    <div class="input__field">
                        <h4>City</h4>
                        <input class="input__text" type="city" value="{{ $committees[0]->committee_city }}"
                            name="committee_city">
                    </div>
                    <div class="input__field">
                        <h4>State</h4>
                        <input class="input__text" type="state" value="{{ $committees[0]->committee_state }}"
                            name="committee_state">
                    </div>
                </div>
                <div class="double__input__field">
                    <div class="email__input__field">
                        <h4>Zip Code</h4>
                        <input class="input__text" type="zipcode" value="{{ $committees[0]->committee_zipcode }}"
                            name="committee_zipcode">
                    </div>
                    <div class="mobile__no">
                        <h4>Country</h4>
                        <input class="input__text" type="country" value="{{ $committees[0]->committee_country }}"
                            name="committee_country">
                    </div>
                </div>
                <div class="password__">
                    <div>
                        <h4>Password</h4>
                    </div>
                    <input type="password" class="input2 input__text" value="{{ $committees[0]->password }}"
                        name="password">
                    <span class="material-symbols-outlined show">
                        visibility
                    </span>
                    <span class="material-symbols-outlined hide eye-active">
                        visibility_off
                    </span>
                </div>
                <div class="update__button__container">
                    <button class="update__button">Update</button>
                </div>
            </div>
            <div class="tertiary__container">
                <div class="fourth__container profile__picture__container">
                    <div class="profile__picture">
                        <h1>Profile Picture</h1>
                        <img class="profile-picture-manageprofile"
                            src="{{ asset('storage/images/' . $committees[0]->committee_picture) }}" height="100px">
                        <div class="file__upload__container">
                            <input type="file" name="image">
                        </div>

                    </div>
                </div>
                <div class="fourth__container faculty__details_container">
                    <div class="course__dropdown">
                        <h4>Course</h1>
                            <select class="form-select course-dropdown" name="committee_course">
                                <option selected>{{ $committees[0]->committee_course }}</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Graphics and Multimedia Technology">Graphics and Multimedia Technology
                                </option>
                                <option value="Computer System's and Networking">Computer System's and Networking</option>
                                <option value="Diploma Computer Science">Diploma Computer Science</option>
                            </select>
                            {{-- <select name="smsstaff_key" id="smsstaff_key" required>
                                @foreach ($staff as $staffMember)
                                    <option value="{{ $staffMember->smsstaff_key }}"
                                        {{ request()->input('smsstaff_key') == $staffMember->smsstaff_key ? 'selected' : '' }}>
                                        {{ $staffMember->name }}</option>
                                @endforeach
                            </select> --}}
                    </div>
                    <div class="triple__grid">
                        <div class="year__dropdown">
                            <h4>Year</h1>
                                <select class="form-select" name="committee_year">
                                    <option selected>{{ $committees[0]->committee_year }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                        </div>
                        <div class="semester__dropdown">
                            <h4>Semester</h1>
                                <select class="form-select" name="committee_semester">
                                    <option selected>{{ $committees[0]->committee_semester }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                        </div>
                        <div class="matric__id">
                            <h4>Matric ID</h4>
                            <div class="input__field">
                                <input type="matric-id" class="matric-id" value="{{ $committees[0]->username }}"
                                    name="matric-id">
                            </div>
                        </div>
                    </div>
                    <div class="portfolio">
                        <div class="portfolio__name">
                            <h4>Portfolio</h4>
                            <div class="portfolio__dropdown">
                                <select class="form-select portfolio-dropdown" name="committee_portfolio">
                                    <option selected>{{ $committees[0]->committee_semester }}</option>
                                    <option value="Majlis Tertinggi">Majlis Tertinggi</option>
                                    <option value="Portfolio Sukan & Rekreasi">Portfolio Sukan & Rekreasi</option>
                                    <option value="Portfolio Keusahawanan & Logistik">Portfolio Keusahawanan & Logistik
                                    </option>
                                    <option value="Portfolio Komuniti Luar & Hubungan Antarabangsa">Portfolio Komuniti
                                        Luar & Hubungan Antarabangsa</option>
                                    <option value="Portfolio Hebahan & Publisiti">Portfolio Hebahan & Publisiti
                                    </option>
                                    <option value="Portfolio Multimedia">Portfolio Multimedia</option>
                                    <option value="Portfolio Sahsiah & Kebajikan">Portfolio Sahsiah & Kebajikan
                                    </option>
                                    <option value="Portfolio Akademik & Kerjaya">Portfolio Akademik & Kerjaya</option>
                                </select>
                            </div>
                        </div>
                        <div class="portfolio__position">
                            <h4>Position</h4>
                            <div class="portfolio__dropdown">
                                <select class="form-select portfolio-dropdown" name="committee_position">
                                    <option selected>{{ $committees[0]->committee_semester }}</option>
                                    <option value="Majlis Tertinggi">Majlis Tertinggi</option>
                                    <option value="Portfolio Sukan & Rekreasi">Portfolio Sukan & Rekreasi</option>
                                    <option value="Portfolio Keusahawanan & Logistik">Portfolio Keusahawanan & Logistik
                                    </option>
                                    <option value="Portfolio Komuniti Luar & Hubungan Antarabangsa">Portfolio Komuniti
                                        Luar & Hubungan Antarabangsa</option>
                                    <option value="Portfolio Hebahan & Publisiti">Portfolio Hebahan & Publisiti
                                    </option>
                                    <option value="Portfolio Multimedia">Portfolio Multimedia</option>
                                    <option value="Portfolio Sahsiah & Kebajikan">Portfolio Sahsiah & Kebajikan
                                    </option>
                                    <option value="Portfolio Akademik & Kerjaya">Portfolio Akademik & Kerjaya</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
