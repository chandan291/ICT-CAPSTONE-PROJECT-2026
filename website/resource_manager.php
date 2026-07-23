<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "dbconn.php";


// Get all resources

$sql = 'SELECT * FROM "resource" ORDER BY name';

$stmt = $pdo->prepare($sql);

$stmt->execute();

$resources = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Resource Management</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>




<?php include "navbar.php"; ?>


<main>

<section class="users">


<!-- Search Bar -->

<input 
    type="text" 
    id="resourceSearch" 
    placeholder="Search resources..."
    class="search-bar"
>


<br><br>


<table id="resourceTable">


<tr>
    <th>Resource Name</th>
    <th>Actions</th>
</tr>


<?php foreach ($resources as $resource): ?>


<tr>


<td>
    <?= htmlspecialchars($resource['name']); ?>
</td>


<td>


<a href="<?= htmlspecialchars($resource['storage_path']); ?>" target="_blank">
    View
</a>


|


<a href="edit_resource.php?id=<?= $resource['id']; ?>">
    Edit
</a>


|


<a 
href="delete_resource.php?id=<?= $resource['id']; ?>"
onclick="return confirm('Are you sure you want to delete this resource?');">

Delete

</a>


</td>


</tr>


<?php endforeach; ?>


</table>


</section>

</main>



<script>

const searchBar = document.getElementById("resourceSearch");

searchBar.addEventListener("keyup", function(){

    let filter = searchBar.value.toLowerCase();

    let rows = document.querySelectorAll("#resourceTable tr");


    rows.forEach((row, index) => {

        // Ignore table header
        if(index === 0) return;


        let name = row.cells[0].textContent.toLowerCase();


        if(name.includes(filter)){
            row.style.display = "";
        }
        else {
            row.style.display = "none";
        }

    });

});


</script>


</body>

</html>