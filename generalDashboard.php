<?php
include_once("lib/header.php");
?>
<h2>General DashBoard </h2>
<h3>This Dashboard is meant for Management and Teaching staffs</h3>

</header>
<hr>

<main>
    <p>We offer the best education for today's kids</p>

    Logged User ID : <?php $_SESSION['loggedIn']; ?><br>
    Designation: <?php $_SESSION['designation']; ?><br>
    Department : <?php $_SESSION['department']; ?><br>
    Date of Registration : <?php $_SESSION['reg_time']; ?><br>
    Date of Last Login : <?php $_SESSION['userLoginDate']; ?><br>
</main>

</body>

</html>