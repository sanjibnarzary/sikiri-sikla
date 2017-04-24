<!-- @author: Sanjib Narzary, CLST, IIT Guwahati //-->
<?php
$uri = $_SERVER['REQUEST_URI'];
//echo $uri;
if(preg_match('/admin/',$uri)){
    require_once ('../functions.php');
}
else{
    require_once ('functions.php');
}

$f = new Functions();
?>


<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CIT Kokrajhar <sup>&alpha;</sup></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-education"></i> Academic <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/about-us">About CIT</a></li>
                        <li><a href="/mission-vision">Mission & Vision</a></li>
                        <li><a href="/contact-us">Contact US</a></li>
                        <li><a href="/facilities">Facilities</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-bell"></i> Management <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Administration</li>
                        <li><a href="/director">Director</a></li>
                        <li><a href="/registrar">Registrar</a></li>
                        <li><a href="#">Board of Governors</a></li>
                        <li><a href="#">CIT Society</a></li>
                        <li><a href="#">Head/Co-ordinator of Department/Section</a></li>
                        <li><a href="#">Committees</a></li>
                        <li class="dropdown-header">Establishment</li>
                        <li><a href="#">Engineering Cell</a></li>
                        <li><a href="#">Establishment</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-apple"></i> Departments <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Core Engineering/Design</li>
                        <?php
                            $str = "SELECT * FROM `departments` WHERE `type`='core' AND `code`!='mcd' ORDER BY `title` ASC";
                            $cores = $f->selectQueries($str);
                            foreach ($cores as $core){
                                echo '<li><a href="/department/'.$core['code'].'">'.$core['title'].'</a></li>';
                            }
                        ?>
                        <li><a href="http://cit-mcd.in">Multimedia Communication and Design</a></li>
                        <li class="dropdown-header">Allied Engineering</li>
                        <?php
                        $str = "SELECT * FROM `departments` WHERE `type`='allied' ORDER BY `title` ASC";
                        $allieds = $f->selectQueries($str);
                        foreach ($allieds as $allied){
                            echo '<li><a href="/department/'.$allied['code'].'">'.$allied['title'].'</a></li>';
                        }
                        ?>
                        <li class="dropdown-header">Basic Sciences & HSS</li>
                        <?php
                        $str = "SELECT * FROM `departments` WHERE `type`='basic' ORDER BY `title` ASC";
                        $basics = $f->selectQueries($str);
                        foreach ($basics as $basic){
                            echo '<li><a href="/department/'.$basic['code'].'">'.$basic['title'].'</a></li>';
                        }
                        ?>
                        <li class="dropdown-header">Humanities & Social Sciences</li>
                        <?php
                        $str = "SELECT * FROM `departments` WHERE `type`='humanities' ORDER BY `title` ASC";
                        $rows = $f->selectQueries($str);
                        foreach ($rows as $row){
                            echo '<li><a href="/department/'.$row['code'].'">'.$row['title'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="http://admission.cit.ac.in" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-certificate"></i> Admission <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Diploma</li>
                        <li><a href="#">CITEE</a></li>
                        <li><a href="#">PAT</a></li>
                        <li class="dropdown-header">B.Tech</li>
                        <li><a href="#">CITDEE</a></li>
                        <li><a href="#">CITLET</a></li>
                        <li><a href="#">CITVAT</a></li>

                        <li class="dropdown-header">B.Des</li>
                        <li><a href="#">CITBDAT</a></li>
                        <li class="dropdown-header">Admission Website</li>
                        <li><a href="http://admission.cit.ac.in">CIT Admission Website</a></li>

                    </ul>
                </li>
                <li><a href="http://centrallibrary.cit.ac.in"><i class="glyphicon glyphicon-book"></i> Library</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-adjust"></i> Extras <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Mail</li>
						  <li><a href="http://webmail.cit.ac.in">Webmail</a></li>
                            <li><a href="http://www.gmail.com">Google mail</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Students</li>
                            <li><a href="http://ecstasy.cit.ac.in">Ecstasy</a></li>
                            <li><a href="http://techcracy.org">Techcracy</a></li>
                            <!--
                            <li class="dropdown-header">Accounts</li>
                            <?php
                            @session_start();
                            if(isset($_SESSION['email'])){
                                //logout
                                ?>
                                <li><a
                                            href="logout.php"><i class="glyphicon glyphicon-level-up"></i> Logout</a>
                                </li>
                                <?php
                            }
                            else {
                                ?>
                                <li><a
                                            href="register.php"><i class="glyphicon glyphicon-level-up"></i> Register</a>
                                </li>
                                <li><a
                                            href="login.php"><i class="glyphicon glyphicon-level-up"></i> Login</a>
                                </li>
                                <?php
                            }
                            ?>
                            //-->
						</ul>
					  </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
