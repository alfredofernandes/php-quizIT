<?php 
    // require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/Administrator/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?link=AdminUserList">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
</nav>
<?php require_once('Application/Core/Message/DisplayError.php'); ?>
<?php
    //execute the command
    $sSQL = "SELECT * FROM Users";
    $resultset = mysqli_query($conn, $sSQL);

    if(!$resultset)
    {
        echo'Could not run query: ' . mysql_error();
        exit;
    }
?>

<p class="text-right"><a class="btn btn-primary" href="?link=AdminUserAdd" role="button">Add User</a></p>

<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Username</th>
        <th>Password</th>
        <th>Admin</th>
        <th> </th>
        <th> </th>
    </tr>
</thead>
<tbody>
    <?php
        while($row = mysqli_fetch_assoc($resultset))
        {
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
            $username = $row['username'];
            $password = $row['password'];
            $admin = $row['admin'];
    ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $first_name; ?></td>
            <td><?php echo $last_name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $phone; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $username; ?></td>
            <td>*****</td>
            <td>
                <?php if($admin == 1) { ?>
                    <span class="badge badge-dark">Admin</span>
                <?php } else { ?>
                    <span class="badge badge-primary">User</span>
                <?php } ?>
            </td>
            <td><a class="btn btn-primary" href="?link=AdminUserEdit&id=<?php echo $id; ?>" role="button"><i class="material-icons">mode_edit</i></a></td>
            <td><a class="btn btn-danger" href="?link=AdminUserDelete&id=<?php echo $id; ?>" role="button"><i class="material-icons">delete_forever</i></a></td>
        </tr>
    <?php } ?>
</tbody>
</table>
