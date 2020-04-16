<?php
include_once("lib/header.php");
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Good Bye</h3>
</header>

<main>
    <p>We offer the best education for today's kids</p>

    <?php
    session_unset();
    session_destroy();

    //header("Location: login.php");
    ?>
</main>

</body>

</html>