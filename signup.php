
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        
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

        .signup {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem 2rem; /* Increase top padding to leave space for navbar */
    margin-top: 70px; /* Offset for the navbar height */
}

        form {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        form label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 0.5rem;
            display: block;
        }

        form .box {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        form .box:focus {
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
.signup .row {
    display: flex;
    justify-content: space-between; /* Ensures equal spacing between form and photo */
    align-items: center;
    flex-wrap: wrap; /* Ensures proper alignment on smaller screens */
     /* Adds space between the form and photo */
    width: 100%;
    margin-top: 1rem;
}

.form-container{
    display: flex;
    flex: 1; /* Equal space for both sections */
    max-width: 500px;
    gap: 2rem;
    justify-content: center;
}
.photo-container {
    flex: 1; /* Equal space for both sections */
    max-width: 500px;
}

.signup-photo {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    object-fit: cover;

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

            form {
                padding: 1.5rem 2rem;
            }

            input[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
<?php
            require_once "header.php";
               
            ?>

    <section class="signup" id="signup">
        <div class="row">
        <div class="form-container">
           
            <form action="functions.php" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="box" placeholder="Enter your name">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="box" placeholder="Enter your email" required>

                <label for="mobile">Mobile</label>
                <input type="tel" id="mobile" name="mobile" class="box" placeholder="Enter your mobile number" required>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="box" placeholder="Enter your address" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="box" placeholder="Enter your password" required>

                <label for="password_verify">Confirm Password</label>
                <input type="password" id="password_verify" name="password_verify" class="box" placeholder="Confirm your password" required>

                <input type="submit" value="Sign Up" name="submit_sign_up">
                <div class="form-footer">
                <p>Do you have an account? <a href="login.php">Sign in</a></p>
            </div>
            </form>
            

            <div class="photo-container">
            <img src="upload_img/Downpic.cc-2406174415.jpg" alt="Signup Photo" class="signup-photo">
        </div>
        </div>
       
        </div>
    </section>
</body>
</html>
