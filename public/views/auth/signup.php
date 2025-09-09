<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
    </head>

    <body>
        <h1>Sign Up</h1>
        <form method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>

            <br>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>

            <br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <br>

            <button type="submit">Sign Up</button>
            <button type="button">Go to Login</button>
        </form>
    </body>

</html>


