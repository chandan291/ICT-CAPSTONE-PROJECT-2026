<?php

require "dbconn.php";


// Get users from database
$sql = 'SELECT * FROM "User"';

$stmt = $pdo->prepare($sql);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Management</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<?php include "navbar.php"; ?>


<main>


<section class="users">


<a href="add_user.php">
    <button>Add User</button>
</a>



<table>


<thead>

<tr>

<th>Name</th>
<th>Email</th>
<th>Location</th>
<th>Role</th>
<th>Actions</th>

</tr>

</thead>



<tbody>


<?php foreach($users as $user): ?>


<tr>

<td>
    <?= htmlspecialchars($user['name']) ?>
</td>


<td>
    <?= htmlspecialchars($user['email']) ?>
</td>


<td>
    <?= htmlspecialchars($user['location']) ?>
</td>


<td>
    <?= htmlspecialchars($user['role']) ?>
</td>


<td>

<button>
Edit
</button>

<button>
Delete
</button>

</td>


</tr>


<?php endforeach; ?>


</tbody>


</table>


</section>


</main>


</body>

</html>