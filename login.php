<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
        }

        .heading {
            text-align: center;
            font-size: 3rem;
            color: #fff;
            background: #4caf50;
            padding: 2rem;
            margin-bottom: 2rem;
            border-bottom-left-radius: 2rem;
            border-bottom-right-radius: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .heading span {
            color: #ffd700;
        }

        .login {
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 4rem 2rem;
            margin-top: 70px; /* Offset for navbar height */
        }

        .form-container {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .form-container label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-container .box {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-container .box:focus {
            border-color: #4caf50;
        }

        input[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            font-size: 1.2rem;
            color: #fff;
            background: #4caf50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #43a047;
        }

        .alert_warning {
            background-color: rgba(255, 0, 0, 0.1);
            color: #d32f2f;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .form-footer a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .heading {
                font-size: 2.5rem;
                padding: 1.5rem;
            }

            .form-container {
                padding: 1.5rem 2rem;
            }

            input[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header class="heading">
        <span>Login</span> Page
    </header>

    <section class="login" id="login">
        <div class="form-container">
            <?php
            require_once "header.php";
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p class='alert_warning'>All fields must be filled out!</p>";
                    } elseif($_GET["error"] == "invalidemail"){
                        echo "<p class='alert_warning'>Invalid email or password!</p>";
                    }
                }
            ?>

            <form action="includes/login.inc.php" method="post">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="box" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="box" placeholder="Enter your password" required>

                <input type="submit" value="Login" name="submit">
            </form>

            <div class="form-footer">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </section>
</body>
</html>
