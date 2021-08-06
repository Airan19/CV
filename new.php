<?php
// set the connection variables
$insert = false;
if (isset($_POST['name'])){
 $insert = true;
 $server = 'localhost';
 $username = 'root';
 $password = "";

//  create a database connection
 $con = mysqli_connect($server,$username,$password);

//  check for connection success
 if (!$con){
     die("connectoin to this database failed due to". mysqli_connect_error());
 }
//  echo "Success connecting to the db."

//  collect post variables


if (!empty($_POST['name'] && $_POST['comment'] ))   {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO `site`.`comment` ( `name`, `comment`, `dt`)
    VALUES ( '$name','$comment', current_timestamp());";
    
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        // flag for successful insertion
        // $insert = true;
    }
    else{
        echo "<h1>Error: $sql <br> $con->error</h1>";
    }
}
else{
    echo "Please fill both the fields.";
}
    



// echo $sql;

// execute the query
// close the database connection
$con->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>P-Stuff</title>
   <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="s.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@700&family=Chakra+Petch:
wght@500&family=Fredericka+the+Great&family=Give+You+Glory&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet"></head>

<body>
    <?php
    echo '
    
<div class="hide"></div>
<div class="log" >
<a class="footer-link" href="index.html"><img class="logo" src="https://airan19.github.io/arkcode/Logo_Transparent.png" alt="logo"></a>
</div>
<div id="bar" style="left: auto;"></div>
<div class="photo">
    <h2>Happy Birthday! 🎈 </h2>
    <div id="img"></div>
    <img class="img" style="left:5rem;"src="https://media.tenor.com/images/66881d83d109456dbdcd2271b7206d05/tenor.gif">
    <p id = "b" style="display:inline-block;"><img class="photos" src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80"><strong> Bhavana Gupta<br> Student</strong></p>
    <p id="a" style="display:inline-block;"><img class="photos" src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80"><strong> Bhumika Gupta<br> Student</strong></p>
    <img class="img" style="transform: scaleX(-1);right:5rem;" src="https://media.tenor.com/images/66881d83d109456dbdcd2271b7206d05/tenor.gif">

<div class="loader"></div>
<div class="load" style="top:44%;left:42%; width:5px;"></div>
<div class="main">
  <h2> Spread the Wishes </h2>
  <form action="new.php"  method="post">
  <div class="name">
    <input type="text"  name="name" placeholder="Name"/><br><br>
    <hr>
    <br>
    <label for="comment">Comment</label><br><br>
    <!-- <input type="text" name="comment"/><br><br> -->
    <textarea name="comment" rows="5" cols="30"  placeholder="Spread the Love!"></textarea>
    <br><br>
  <button>Submit</button>
  </div>
  </form>
  </div>';


  if (!empty($_POST['name'])){
    $username = "root"; 
    $password = ""; 
    $database = "site"; 
    $mysqli = new mysqli("localhost", $username, $password, $database); 
    $query = "SELECT * FROM comment";


    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $comment = $row['comment'];
        $dt = $row['dt'];
            echo '<div class="panel">
                    <p class="ppanel">'.$name.'<br><span>'.$dt.'</span> <br><br>
                    <b>"'.$comment.'"</b></p> 
                </div>';
        }
        $result->free();
    }
    '</div>';
}
?>

</body>
</html>
