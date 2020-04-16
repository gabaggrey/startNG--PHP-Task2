<?php

include_once("lib/header.php");
?>
<header>
    <h1>Corona International Schools</h1>

</header>

<main>
    <p><?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
            session_destroy();
        }
        ?>
    </p>
    <p>
        <a href="superAddUser.php">Add User</a>
    </p>
</main>

</body>

</html>