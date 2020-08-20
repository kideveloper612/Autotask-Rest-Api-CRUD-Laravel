<!DOCTYPE html>
<html>
<head>
	<title>Autotask API - @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="/assets/images/favicon.jpg"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/custome.css">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(/assets/images/logo.png);"></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="/">Dashboard</a> 
                    </li>
                    <li>
                        <a href="#companyMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Company</a>
                        <ul class="collapse list-unstyled" id="companyMenu">
                            <li>
                                <a href="/company/create">Create</a>
                            </li>
                            <li>
                                <a href="/company">Query</a>
                            </li>
                            <li>
                            	<a href="/company/update">Update</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#companyLocationMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CompanyLocation</a>
                        <ul class="collapse list-unstyled" id="companyLocationMenu">
                            <li>
                                <a href="/location/create">Create</a>
                            </li>
                            <li>
                                <a href="/location">Query</a>
                            </li>
                            <li>
                                <a href="/location/update">Update</a>
                            </li>
                            <li>
                                <a href="/location/delete">Delete</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#ContactMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contact</a>
                        <ul class="collapse list-unstyled" id="ContactMenu">
                            <li>
                                <a href="/contact/create">Create</a>
                            </li>
                            <li>
                                <a href="/contact">Query</a>
                            </li>
                            <li>
                                <a href="/contact/update">Update</a>
                            </li>
                            <li>
                                <a href="/contact/delete">Delete</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#TicketMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ticket</a>
                        <ul class="collapse list-unstyled" id="TicketMenu">
                            <li>
                                <a href="/ticket/create">Create</a>
                            </li>
                            <li>
                                <a href="/ticket">Query</a>
                            </li>
                            <li>
                                <a href="/ticket/update">Update</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="footer">
                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </p>
                </div>
            </div>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                    </button>
                    @if (Route::has('login'))
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                          @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                          @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                            @endif
                          @endauth
                        </ul>
                    </div>
                    @endif
                </div>
            </nav>
            @yield('content')
		</div>
    </div>
	<script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/theme.js"></script>
	<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>