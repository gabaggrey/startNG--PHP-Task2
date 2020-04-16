<?php
include_once("lib/header.php");


?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Login Page</h3>
</header>

<main>
    <p>We offer the best education for today's kids</p>

    <p><?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
            session_destroy();
        }
        ?>
    </p>

    <form action="processLogin.php" method="POST">
        <p><?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            } ?>
        </p>

        <p>
            <label for="email">Email: </label><br>
            <input <?php
                    if (isset($_SESSION['email'])) {
                        echo "value=" . $_SESSION['email'];
                    }
                    ?> type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password">
        </p>

        <button type="submit">Login</button>

    </form>
</main>

</body>

</html>