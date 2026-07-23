<?php

require "dbconn.php";


// Location enum values
$locations = [
    "north",
    "north-west",
    "south"
];


// Handle confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["confirm"])) {


        $name = $_POST["name"];
        $email = $_POST["email"];
        $location = $_POST["location"];
        $role = $_POST["role"];


        $sql = '
            INSERT INTO "User"
            (name, email, location, role)
            VALUES
            (:name, :email, :location, :role)
        ';


        $stmt = $conn->prepare($sql);


        $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":location" => $location,
            ":role" => $role
        ]);


        echo "<p>User added successfully</p>";

    }

    else {

        echo "<p>User creation cancelled</p>";

    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<title>Add User</title>

<link rel="stylesheet" href="style.css">

</head>


<body>


<header>

<h1>SES ROTG Web Portal</h1>
<h2>Add User</h2>

</header>


<?php include "navbar.php"; ?>
<main>


<form method="POST">


<label>Name:</label>

<input 
type="text" 
name="name" 
required>



<label>Email:</label>

<input 
type="email" 
name="email" 
required>



<label>Location:</label>

<select name="location" required>

<option value="">
Select Location
</option>


<?php foreach($locations as $location): ?>

<option value="<?= $location ?>">
    <?= $location ?>
</option>

<?php endforeach; ?>


</select>



<label>Role:</label>

<select name="role">

<option value="user">
User
</option>

<option value="admin">
Admin
</option>

</select>



<button 
type="submit"
name="confirm"
onclick="return confirm('Are you sure you want to add this user?');">

Add User

</button>



</form>


</main>


</body>

</html>