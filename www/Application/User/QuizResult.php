<?php 
    require_once('Application/Core/Login/LoginCheck.php'); 
    require_once('Application/User/Menu.php'); 
?>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Quiz Result</li>
    </ol>
</nav>
<?php 
    if (isset($_GET['id'])) 
    {
		$id = $_GET['id'];
    }

    var_dump($_POST);
