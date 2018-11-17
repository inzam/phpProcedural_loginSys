<?php
require 'header.php';
?>
<form class="form-signin" action="include/signup.inc.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
    <label for="inputFirstNm" class="sr-only" autofocus>First Name</label>
    <input id="inputFirstNm" class="form-control" type="text" name="firstNm" placeholder="First Name">

    <label for="inputLastNm" class="sr-only">Last Name</label>
    <input id="inputLastNm" class="form-control" type="text" name="lastNm" placeholder="Last Name">

    <label for="inputUserNm" class="sr-only">User Name</label>
    <input id="inputUserNm" class="form-control" type="text" name="userNm" placeholder="User Name">

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control"  name="emailID" placeholder="Email address" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control"  name="pass" placeholder="Password" required>

    <label for="inputRePassword" class="sr-only">Re-enter Password</label>
    <input type="password" id="inputRePassword" class="form-control" name="rePass" placeholder=" Re-enter Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup-submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
<?php
require 'footer.php';
?>
