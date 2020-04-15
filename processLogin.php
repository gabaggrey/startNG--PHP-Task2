<?php
        session_start();
        $errorCount = 0;

        //verifying the data, validation

        $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
        $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

        $_SESSION['email'] = $email;

        //error message for login info
        if ($errorCount > 0) {
            $session_error = "You have " . $errorCount . " error";
            if ($errorCount > 1) 
            {
                $session_error .= "s";
            }
            $session_error .= " in your submission";

            $_SESSION["error"] = $session_error;
            header("Location: login.php");
        } 
        //checking super user login details
        else if ($email == "admin@corona.edu" && $password == "123456") {
            header("Location: superuser.php");
        } 
        //verifying the login details and the info in the database
        else {
            $allUsers = scandir("db/users/");
            $countAllUsers = count($allUsers);

            for ($i = 0; $i < $countAllUsers; $i++) {
                $currentUser = $allUsers[$i];

                if ($currentUser == $email . ".json") {
                    //check password
                    $userString = file_get_contents("db/users/" . $email . ".json");
                    $userObject = json_decode($userString);
                    $passwordFromDb = $userObject->password;

                    //checking the login password against the password in the database
                    $passwordFromUser = password_verify($password, $passwordFromDb);

                    if ($passwordFromUser) {
                        
                        //get login time and date and put in the database
                        date_default_timezone_set("Africa/Lagos");
                        $userLoginTime = date("h:i:sa");
                        $userLoginDate = date("Y-m-d");

                        $allUsersLogins = scandir("db/logins/");
                        $countAllUsersLogins = count($allUsersLogins);

                        $newLoginId = $countAllUsersLogins++;
                        $newLoginId--;

                        $userLoginObject =
                            [
                                "id" => $newLoginId,
                                "email" => $email,
                                "userLoginDate" => $userLoginDate,
                                "userLoginTime" => $userLoginTime
                            ];

                        file_put_contents("db/logins/" . $email . ".json", json_encode($userLoginObject));

                        $_SESSION['loggedIn'] = $userObject->id;
                        $_SESSION['email'] = $userObject->email;
                        $_SESSION['fullname'] = $userObject->fullName;
                        $_SESSION['designation'] = $userObject->designation;
                        $_SESSION['reg_time'] = $userObject->reg_time;

                        //saving the login time and date in session

                        $_SESSION['userLoginDate'] = $userLoginDate; //userLoginObject->userLoginDate;
                        $_SESSION['userLoginTime'] = $userLoginTime; //$userLoginObject->userLoginTime;

                        if ($userObject->designation == "Management" || $userObject->designation == "Teaching staff") {
                            header("Location: mgtDashboard.php");
                            // echo $userObject->designation;
                        } elseif ($userObject->designation == "Auxilliary staff") {
                            header("Location: generalDashboard.php");
                            // echo $userObject->designation;
                        } else {
                            header("Location: generalDashboard.php");
                            // echo "I am student";
                            
                        }
                        die();
                    }
                }
            }

            $_SESSION["error"] = "Invalid Email or Password";
            header("Location: login.php");
            die();
        }
?>