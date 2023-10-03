<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet"/>
</head>
<body>
    <div class="head">
        <div class="container"><h4>To-Do List Web App</h4></div>
        
    </div>
    <div class="container1">
     <div class="container">
     <?php
require("config.php");
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

  

    $insertquery = " insert into user(title, description) values('$title','$description')";

         $result = mysqli_query($con, $insertquery);
         if($result){
        ?>
        <script>
          alert("Form Submitted Sucessfully");
        </script>

        <?php
       }
       else{
        ?>
        <script>
          alert("sorry there was some problem ");
        </script>

        <?php
       }
       
    }

?>
            <form class="form" action="index.php" method="POST">
                <input class="title" type="text" name="title" placeholder="Title">
                <textarea class="description" name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
                <input class="btn" type="submit" name="submit">
            </form>
       
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require("config.php");

                    $selectquery = " select * from user ";

                    $query = mysqli_query($con, $selectquery);

                    $num = mysqli_num_rows($query);
                    while($res = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php echo $res['title'];    ?></td>
                        <td><?php echo $res['description'];    ?></td>
                        <td> <a href="delete.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="DELETE"> <i class="fa-sharp fa-solid fa-square-xmark" style="color: #da0b0b;"></i></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
</div>
        
    </div>

    </div>

    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>