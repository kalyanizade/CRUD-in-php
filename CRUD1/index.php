<!doctype html>


<?php 
include 'db.php';

$page = (isset($_GET['page']) ?(int) $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page']: 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage :0;

$sql = "SELECT * FROM task_udemy LIMIT " . $start . ", " . $perPage;

$total = $db->query("select * from task_udemy")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);

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
                <h1> Todo list </h1>
            </center>
            <!-- <button type="button" class="btn btn-success">Add task </button> -->

            <div class="col-md-10 col-md-offset-2">
                <table class="table table-hover">
                    <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add task
                    </button>&nbsp;
                    <button type="button" class="btn btn-light md right" onclick="print()">Print </button>
                    <hr>
                    <br>

                    <!------------------------------ Modal start --------------------------------->


                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Task</h4>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <!-- <h4 class="modal-title">Add Task</h4> -->
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="add.php">
                                        <div class="form-group">
                                            <label>Task Name</label>
                                            <input type="text" required name="task" class="form-control">
                                        </div>
                                        <br>
                                        <input type="submit" name="send" value="Add Task" class="btn btn-success">




                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>








                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Id</th>
                                <th scope="col">Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php while ($row = $rows->fetch_assoc()): ?>




                                <th scope="row"><?php echo $row['id']?></th>
                                <td class="col-md-10"><?php echo $row['name']?></td>
                                <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a>
                                </td>
                                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                                </td>


                            </tr>

                            <?php  endwhile; ?>


                            <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr> -->
                        </tbody>
                    </table>
                </table>

                <center>

                    <ul class="pagination">
                        <?php for($i =1; $i <=$pages; $i++): ?>
                        
                        <li><a href="?page=<?php echo $i ;?>&per-page=<?php echo $perPage;?>"> <?php echo $i;?> </a></li>

                        <?php  endfor;   ?>
                       
                    </ul>
                    
                </center>

            </div>
        </div>
    </div>
</body>


</html>