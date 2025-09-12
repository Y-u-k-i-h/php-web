<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>

    <body>
        <h1>Welcome to the Dashboard</h1>
        <p>This is a protected area. Only logged-in users can see this.</p>
        <p>All users in the database:</p>
        <?php
            require_once __DIR__ . "/../../autoloader.php";
            $db = new Database(DB_TYPE, DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
            $db->getUsers();
        ?>
    </body>
</html>