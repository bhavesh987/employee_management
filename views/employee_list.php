<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style type="text/css">
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        a.button {
            padding: 5px;
            text-decoration: none;
            color: white;
            background: black;
        }
        .search{
            display: none;
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>

    <label for="searchInput">Search:</label>
    <input type="text" id="searchInput" oninput="searchRecords()" />

    <div id="searchResults">
        <!-- Search results will be displayed here -->

    </div>

    <table class="search" style="width:100%">
      <tr class = 'heading'>
        <!-- <th>Id</th> -->
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Edit</th>
        <th>Delete</th>        
      </tr> 
    </table>

    <table class='defaul' style="width:100%">
      <tr>
        <!-- <th>Id</th> -->
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Edit</th>
        <th>Delete</th>        
      </tr>

        <?php foreach ($employees as $employee) : ?>
        <tr>    
            <!-- <td><?php //echo $employee['id']; ?></td> -->
            <td><?php echo $employee['fname']; ?></td>
            <td><?php echo $employee['lname']; ?></td>
            <td><?php echo $employee['email']; ?></td>
            <td><?php echo $employee['gender']; ?></td>
            <td><a href="index.php?action=edit&id=<?php echo $employee['id']; ?>">Edit</a></td>
            <td><a href="index.php?action=delete&id=<?php echo $employee['id']; ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>    
    </table>
    <p><a class='button' href="index.php?action=add">Add Employee</a></p>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
