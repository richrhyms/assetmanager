<div class="navbar-inner">
    <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.html">
            ASSET MANAGEMENT SYSTEM
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="assets/img/menu-toggler.png" alt="" />
        </a>          
        <!-- END RESPONSIVE MENU TOGGLER -->				
        <!-- BEGIN TOP NAVIGATION MENU -->					
        <ul class="nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->	

            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="username"><?php session_start(); echo $_SESSION['DISPLAYNAME']; ?></span>
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="../login/server/logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->	
    </div>
</div>

