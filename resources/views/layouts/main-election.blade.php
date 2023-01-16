<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

<!-- STYLESHEET -->
<!-- MATERIAL ICONS CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,700,1,0" />
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<!-- GOOGLE FONTS - POPPINS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" <!--Hey! This is the
    original version of Simple CSS Waves-->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style-election.css') }}">
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>


<!------------------- MODUL DHIYA --------------------->
<!------------------- TOP NAVIGATION BAR --------------------->
<div class="navigation__bar">
    <div class="navigation__container">
        <img src="https://hellofathul.s3.ap-southeast-1.amazonaws.com/logo.png" class="logo">
        <!-- <div class="search__bar">
                <span class="material-symbols-rounded">
                    search
                </span>
                <input type="search" placeholder="Search">
            </div> -->
        <div class="profile__area">
            <div class="theme__btn">
                <span class="material-symbols-rounded active-theme">
                    light_mode
                </span>
                <span class="material-symbols-rounded">
                    dark_mode
                </span>
            </div>
            <div class="profile__container">
                <div class="profile__photo">
                    <img src="{{ asset('storage/images/')}}" class="profile-picture-navbar">
                </div>
                <h5 class="mt-2">{{ $logged_user }}</h5>
            </div>
            <button id="menu__btn">
                <span class="material-symbols-rounded">
                    menu
                </span>
            </button>
            <a href="{{ route('user-logout') }}" class="btn btn-danger" role="button">Logout</a>
        </div>
    </div>
</div>
<!------------------- END OF NAVIGATION BAR --------------------->

<!------------------- MODUL FATHUL --------------------->
<!------------------- MAIN PAGE LAYOUT (3 COLUMN GRID SYSTEM) --------------------->
<main class="election">
    <!------------------- START OF ASIDE PAGE LAYOUT (GRID COLUMN 1) --------------------->
    <aside class="election">
        <button id="close__btn">
            <span class="material-symbols-rounded">
                close
            </span>
        </button>

        <!------------------- SIDEBAR --------------------->
        <div class="sidebar__container">
            <a href="{{ route('home') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">manage_accounts</span>
                <h4>Profile</h4>
            </a>
            <a href="{{ route('activities') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">sprint</span>
                <h4>Activities</h4>
            </a>
            <a href="{{ route('calendar') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">calendar_month</span>
                <h4>Yearly Calendar</h4>
            </a>
            <a href="{{ route('rep') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">list_alt</span>
                <h4>Report</h4>
            </a>
            <a href="{{ route('prop') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">edit_document</span>
                <h4>Proposal</h4>
            </a>
            <a href="{{ route('election') }}" class="sidebar__btn active-sidebar-btn">
                <span class="material-symbols-rounded">diversity_3</span>
                <h4>Committee<br>Election</h4>
            </a>
            <a href="{{ route('bulletin') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">newspaper</span>
                <h4>Bulletin</h4>
            </a>
        </div>
        <!------------------- END OF SIDEBAR --------------------->
    </aside>
    <!------------------- END OF ASIDE (GRID COLUMN 1) --------------------->

    <!------------------- START OF MIDDLE SECTION LAYOUT (GRID COLUMN 2) --------------------->
    <section class="middle__container">
        @yield('content')
    </section>
</main>
<!------------------- END OF MAIN PAGE LAYOUT --------------------->


<!------------------- JAVASCRIPT & JQUERY --------------------->

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/sidebar-toggle.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>