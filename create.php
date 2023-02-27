<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$conn = mysqli_connect($servername, $username, $password , $database);

if(!$conn){
    die("sorry we fail to connect: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = $_POST['title'];
  $description = $_POST['description'];
 
$sql = "INSERT INTO `notes` ( `title`, `description`, ) VALUES ( '$title', '$description')";
$result = mysqli_query($conn, $sql);

if($result){
  echo "the record has been inserted successfully.<br>";

}
else{
  echo "not inserted due to this error --->". mysqli_error($conn);
} 

  
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iNotes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
      </ul>
      <form  class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<form >
 <div class = "container my-4" >
  <form action="/crud/create.php" method ="post">
  <H2>Add Your Notes Here</H2>   
  <div class="mb-3">
    <label for="title" class="form-label">Note title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name = "title">
    <div class="form-group">
    <label for="description">Notes Description</label>
    <textarea class="form-control" id="description" rows="3" name = "description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
</div>
<div class="container">
<?php

$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
  echo  $row['sno']." title ".$row['title']." desc is ".$row['description'] ;
  echo "<br>";
}

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
  echo"<tr>
  <th scope='row'>". $row['sno'] ." </th>
  <td>". $row['title'] ."</td>
  <td>". $row['description'] ."</td>
  <td>Actions</td>
</tr>";
  
  
}

?>
    
    
</tbody>
  
</table>

</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>