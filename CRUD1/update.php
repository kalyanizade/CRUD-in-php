<!doctype html>


<?php 
include 'db.php';

$id= (int)$_GET['id'];

$sql ="select * from task_udemy where id='$id'";

$rows = $db->query($sql);

$row =$rows->fetch_assoc();
// var_dump($row);

if(isset($_POST['send'])){

    $task = htmlspecialchars($_POST['task']);

    $sql ="update task_udemy set name='$task' where id ='$id' ";

    $db->query($sql);

    header('location: index.php');

}



?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Home page</title>

</head>

<body>

    <div class="container">

        <div class="row" style="margin-top: 50px;">

            <center>
                <h1> Update list </h1>
            </center>
            <!-- <button type="button" class="btn btn-success">Add task </button> -->

            <div class="col-md-10 col-md-offset-2">
                <table class="table">
                    <!-- <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Update task
                    </button> -->
                    <!-- <button type="button" class="btn btn-light md right">Print </button> -->
                    <hr>
                    <br>

                    <!------------------------------ Modal start --------------------------------->


                    <form method="post">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" required name="task" value="<?php echo $row['name'];?>"
                                class="form-control">
                        </div>
                        <br>
                        <input type="submit" name="send" value="Update Task" class="btn btn-success">&nbsp;
                        <a href="index.php" class="btn btn-warning"> Back</a>

                    </form>


                </table>


            </div>

        </div>

    </div>




</body>


</html>