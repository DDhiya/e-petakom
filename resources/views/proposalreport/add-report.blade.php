<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

<!-- STYLESHEET -->
<!-- MATERIAL ICONS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>


<!------------------- MODUL FATHUL --------------------->
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
                    <img src="../images/profile-1.png">
                </div>
                <h5 class="mt-2">CB19070</h5>
                <span class="material-symbols-rounded">
                    expand_more
                </span>
            </div>
            <button id="menu__btn">
                <span class="material-symbols-rounded">
                    menu
                </span>
            </button>
        </div>
    </div>
</div>
<!------------------- END OF NAVIGATION BAR --------------------->

<!------------------- MODUL FATHUL --------------------->
<!------------------- MAIN PAGE LAYOUT (3 COLUMN GRID SYSTEM) --------------------->
<main>
    <!------------------- START OF ASIDE PAGE LAYOUT (GRID COLUMN 1) --------------------->
    <aside>
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
            <a href="{{ route('rep') }}" class="sidebar__btn active-sidebar-btn">
                <span class="material-symbols-rounded">list_alt</span>
                <h4>Report</h4>
            </a>
            <a href="{{ route('prop') }}" class="sidebar__btn">
                <span class="material-symbols-rounded">edit_document</span>
                <h4>Proposal</h4>
            </a>
            <a href="{{ route('election') }}" class="sidebar__btn">
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
<!-- Main content -->
<center>
	<div class="content">
    <div class="container">
      <table style="width:100%">
        <tr>
			 <h1 style="text-align: center;">Add Report</h1>
        </br>

        <fieldset>
		     <br>

			 <table class="center">
				<form action="proposalreport2" method="POST" >
                @csrf

				<td><td>
					<p>
					<td>
					<label for="Author">Author:</label>
					</td>
					<td>
					<input type="text" name="Author">
					</td>
					</p>
				</td>
				</tr>

				<td><td>
					<p>
					<td>
					<label for="Title">Title:</label>
					</td>
					<td>
					<input type="text" name="Title">
					</td>
					</p>
				</td>
				</tr>

                <td><td>
					<p>
					<td>
					<label for="File">File:</label>
					</td>
					<td>
					<input type="text" name="File">
					</td>
					</p>
				</td>
				</tr>
    
                <td><td>
					<p>
					<td>
					<label for="Report">Report:</label>
					</td>
					<td>
					<input type="text" name="Report">
					</td>
					</p>
				</td>
				</tr>

				</tr>
			</table>
			<br>
			<input type="submit" class="btn btn-success" name="Submit" id="Submit" value="Submit" method="post">
			<a href="view-report" class="btn btn-success">View Report<class="nav-link  @if(url()->current() ===  URL::to('/rep'))
		active
		@endif">
		</a>
			</p>
			</form>
		</fieldset>
</table>
</center>

    </section>
</main>
<!------------------- END OF MAIN PAGE LAYOUT --------------------->


<!------------------- JAVASCRIPT & JQUERY --------------------->

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/sidebar-toggle.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>