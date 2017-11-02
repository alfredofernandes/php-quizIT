<?php 
    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];
    
    if (isset($userId)) { 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" >Hello, <?php echo $username; ?>!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?link=UserHome">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?link=UserProfile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?link=UserResults">Test Results</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?link=Logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<?php } ?>