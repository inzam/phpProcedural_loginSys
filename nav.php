<!--navbar-->
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Login System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <?php
            if(isset($_SESSION['userNm'])){
              echo  '<form class="form-inline mt-2 mt-md-0" action="include/logout.inc.php" method="post">                     
                        
                        <a class="nav-link" href="include/logout.inc.php">Sign out</a>
                    </form>';
            }else{
                echo'<form class="form-inline mt-2 mt-md-0" action="include/login.inc.php" method="post">
                <input class="form-control mr-sm-2" type="text" name="user" placeholder="User Name" aria-label="Search">
                <input class="form-control mr-sm-2" type="password" name="pass" placeholder="Password" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="login-submit" type="submit">Log In</button>
                <a class="btn btn-outline-primary" href="signup.php">Sign up</a>
                
            </form>';
            }
            ?>

        </div>
    </nav>
</header>