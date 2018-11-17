
<?php
require 'header.php';
?>

<br>

<!--log in log out para-->
<?php
if(isset($_SESSION['userNm'])){
 echo   "<section class='jumbotron text-center'>
        <div class='container'>
          <h1 class='jumbotron-heading'>Logged in</h1>            
          </div>
      </section>";

}else{
    echo   "<section class='jumbotron text-center'>
        <div class='container'>
          <h1 class='jumbotron-heading'>Logged out</h1>     
          </div>
      </section>";
}
?>

<?php
require 'footer.php';
?>


