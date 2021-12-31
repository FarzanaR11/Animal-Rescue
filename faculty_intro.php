
<?php session_start(); ?>
<?php 
require_once "connect.php";
$id = $_SESSION["fac_id"];
$username = $_SESSION["fac_username"];
 ?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
   
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    
</head>
<body bgcolor="#def28d">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h3 class="pull-left">Student Details</h3>
                        <h3 class="pull-right text-muted">username:<span class="text-success"><?php echo $username; ?></span></h3>

                    </div>
                    <p>
                        
                    <?php
                    
                    require_once "connect.php";
                    
                    $sql = "SELECT * FROM students";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $i = 0;
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Course</th>";
                                        echo "<th>Project ID</th>";
                                        echo "<th>Project Link</th>";
                                        echo "<th>Marks</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $i++ . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['project_id'] . "</td>";
                                        echo "<td>" . $row['project_link'] . "</td>";
                                        if ($row['marks'] == '0') {
                                            echo "<td> pending </td>";
                                        }else{
                                            echo "<td>" . $row['marks'] . "</td>";
                                        }
                                        
                                        echo "<td>";
                                            echo "<a href='view.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            
                                               echo "<a href='faculty_edit.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            
                                            
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div> <center>
    
    <p><h2> <a href="faculty_logout.php" > I'm done! Sign out</a></h2>
    </p>
    </center>
</body>
</html>