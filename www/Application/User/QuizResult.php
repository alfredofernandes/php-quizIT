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

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
?>

<main role="main" class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-sm text-center">
                <br>
                <br>
                <h1>SCORE <br> 80%<h1/>
            </div>
            <div class="col-sm text-center">
                <h1>RESULT<h1/>
            </div>
            <div class="col-sm text-center">
                <br>
                <br>
                <h1><span class="badge badge-success">Aproved</span><h1/>
                <h1><span class="badge badge-danger">Failed</span><h1/>
            </div>
        </div>
    </div>
</main>
