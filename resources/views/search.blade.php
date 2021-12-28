<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('css/homepage.css')}}">
</head>
<body>

    <div id="mainContainer">

        <div id="topContainer">

            <div id="navBarContainer">
                <nav class="navBar">
        
                <div class="group">

                    <div class="navItem">
                            <a href="homepage" class="logo">
                                <img src="{{url('images/HipHopCenter.gif')}}" alt="Logo">
                            </a>
                            
                    </div>

                    <div class="navItem">
                            <a href="{{ route('search') }}" class="navItemLink">
                            <i class="fas fa-search"></i>
                            Search</a>
                        </div>

                        <div class="navItem">  
                            <a href="homepage" class="navItemLink">
                                <i class="fas fa-check"> </i>
                                Recomendações</a>
                        </div>

                        <div class="navItem">  
                            <a href="artistas" class="navItemLink">
                            <i class="fas fa-microphone"></i>
                                Artistas</a>
                        </div>

                        <div class="navItem">
                            <a href="yourMusic.php" class="navItemLink">
                                <i class="fas fa-music"></i>
                                Your Music</a>
                        </div>

                        <div class="navItem">
                            <a href="profile.php" class="navItemLink">
                                <i class="fas fa-user"></i>
                                 {{ auth()->user()->name }}</a>
                        </div>

                        <div class="navItem">
                        
                            <a class="logout"  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="fas fa-sign-out-alt"></i>
                                            {{ __('Logout') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                                      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>

                    </div>

                </nav>
            </div>
        </div>

<?php
if(isset($_GET['term'])) {
    $term=$_GET['term'];
}
else {
	$term = "";
}
?>


<div id="mainViewContainer">
            <div id="mainContent">




<div class="searchContainer">

	<h4>Search for an artist, album or song</h4>
    <form Method="GET">
    <input type="text" name="term" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
    <input type="Submit" value="Search">
    </form>
	

</div>
</div>
</div>

</body>
