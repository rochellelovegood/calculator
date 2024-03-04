
<?php
include('db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>History</title>
</head>
<body>
<div class="container mt-5 mx-auto p-4 border rounded">


<div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>User Name</th><th>Expressions</th><th>Result</th><th>Date/ Time</th>
                    </tr></thead>
                    <tbody>
                        <?php
                         $result1=mysqli_query($conn,"
                         SELECT u.username as username, c.expression as expression, c.result as result, c.created_at as date_time
                         FROM users u
                         JOIN calculations c ON u.id = c.user_id
                         ") or die("Query error: " . mysqli_error($conn));
                         while($row=mysqli_fetch_array($result1)){
                                        $username=$row['username'];
                                        $expression=$row['expression'];
                                        $result=$row['result'];
                                        $date=$row['date_time'];
                                        echo"
                                        <tr>
                                   <td>$username</td>
                                   <td>$expression</td>
                                   <td>$result</td>
                                   <td>$date</td>
                                        </tr>
                                        ";
                         }
                        
                            mysqli_close($conn);
                        ?>
                    </tbody>
                    </table>
                </div>
   <a href="index.php" class="btn btn-primary mb-1">Go Back</a><br>

</div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>