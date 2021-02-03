<?php

function getAdminNavBar($active="") {
        $library = ''; $johnpaul = '';  $parishioner = ''; $baptism = '';
        $bookshop = ''; $application = ''; $sacrament = '';
        $home = '';
        if($active === "Library"){
            $library = 'class="active"';
            $bookshop = 'active';
        }else if($active === "John Paul Hall"){ 
            $johnpaul = 'class="active"';
            $application = 'active';
        }else if($active === "Parishioner"){ 
            $parishioner = 'class="active"';
            $application = 'active';
        }
        else if($active === "Baptism"){ 
            $baptism = 'class="active"';
            $sacrament = 'active';
        }
        else if($active === "Home"){ 
            $home = 'active';
        }
        
        echo ' <li class="start '.$home.'">
                    <a href="../index.php">
                    <i class="icon-dashboard"></i> 
                    <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="has-sub '.$sacrament.'">
                    <a href="javascript:;">
                    <i class="icon-folder-open"></i> 
                    <span class="title">Sacraments</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li '.$baptism.'><a href="../sacraments/baptism.php"><i class="icon-book"></i> Baptismal Records</a></li>
                        <li><a href="#"><i class="icon-book"></i>Confirmation Records</a></li>
                        <li><a href="#"><i class="icon-book"></i>Marriage Records</a></li>
                    </ul>
                </li>
                <li class="has-sub '.$bookshop.'">
                    <a href="javascript:;">
                    <i class="icon-book"></i> 
                    <span class="title">Bookshop</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li '.$library.'><a href="../library/library.php"><i class="icon-pencil"></i> Register Book</a></li>

                    </ul>
                </li>
                <li class="has-sub '.$application.'">
                    <a href="javascript:;">
                    <i class="icon-pencil"></i> 
                    <span class="title">Applications</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        <li '.$parishioner.'><a href="../application/parishioner.php"><i class="icon-user-md"></i> Parishioner Registration</a></li>                                                
                        <li '.$johnpaul.'><a href="../application/popejohnpaulhall.php"><i class="icon-home"></i> Pope John Paul II Hall</a></li>                                                
                    </ul>
                </li>';
    
    }