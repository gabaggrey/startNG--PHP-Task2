<?php

include_once("lib/header.php");
?>
<header>
    <h1>Corona International Schools</h1>
    <h3>Add new user</h3>
</header>

<main>

    <p><?php
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
            session_destroy();
        }

        ?></p>

    <form action="processSuperAddUser.php" method="POST">

        <p>
            <label for="fullName">Full Name: </label><br>
            <input <?php
                    if (isset($_SESSION['fullName'])) {
                        echo "value=" . $_SESSION['fullName'];
                    }
                    ?> type="text" name="fullName" id="fullName">
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

        <p>
            <label for="gender">Gender: </label><br>
            <select name="gender" id="gender">
                <?php
                if (isset($_SESSION['gender'])) {
                    echo "value=" . $_SESSION['gender'];
                }
                ?>
                <option value="">Choose your gender</option>
                <option <?php
                        if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                            echo "selected";
                        }
                        ?>>Female</option>
                <option <?php
                        if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                            echo "selected";
                        }
                        ?>>Male</option>
            </select>
        </p>

        <p>
            <label for="designation">Designation: </label><br>
            <select name="designation" id="designation">
                <?php
                if (isset($_SESSION['designation'])) {
                    echo "value=" . $_SESSION['designation'];
                }
                ?>
                <option value="">Choose your status</option>
                <option <?php
                        if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Management') {
                            echo "selected";
                        }
                        ?>>Management</option>
                <option <?php
                        if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Teaching staff') {
                            echo "selected";
                        }
                        ?>>Teaching staff</option>
                <option <?php
                        if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Auxilliary staff') {
                            echo "selected";
                        }
                        ?>>Auxilliary staff</option>
                <option <?php
                        if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Student') {
                            echo "selected";
                        }
                        ?>>Student</option>
            </select>
        </p>

        <p>
            <button type="submit">Add User</button>
        </p>

    </form>
</main>

</body>

</html>