<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('db.php'); 

// Initialize the result variable
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve expression from the form
    $expression = $_POST['expression'];

    // Evaluate the expression to get the result
    $result = eval("return $expression;");
    
    $user_id = $_SESSION['id']; 
    $created_at = date('Y-m-d H:i:s'); 
    $query = "INSERT INTO calculations (user_id, expression, result, created_at) VALUES ('$user_id', '$expression', '$result', '$created_at')";
    
    if (mysqli_query($conn, $query)) {
        
    } else {
        
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Calculate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5  p-4 border rounded mb-3">
    <form class="mx-auto p-3" action="" method="post">
    <input type="text" id="expression" name="expression" class="form-control mb-3" readonly>
    <input type="text" id="result" name="result" class="form-control mb-3" value="<?php echo $result; ?>" readonly>
    <br>
        <button class="btn btn-primary m-1 p-4  " type="button" onclick="addToExpression('1')">1</button>
        <button class="btn btn-primary m-1 p-4 " type="button" onclick="addToExpression('2')">2</button>
        <button class="btn btn-primary m-1 p-4 " type="button" onclick="addToExpression('3')">3</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('+')">+</button>
        <br>
        <button class="btn btn-primary m-1 p-4 " type="button" onclick="addToExpression('4')">4</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('5')">5</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('6')">6</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('-')">-</button>
        <br>
        <button class="btn btn-primary m-1 p-4 " type="button" onclick="addToExpression('7')">7</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('8')">8</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('9')">9</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('/')">/</button>
        <br>
        <button class="btn btn-primary m-1 p-4 " type="button" onclick="addToExpression('0')">0</button>
        <button class="btn btn-primary m-1 p-4" type="button" onclick="addToExpression('*')">*</button>
        <button class="btn btn-success m-1 p-4" id="cal" type="submit">=</button>
        <button class="btn btn-danger m-1 p-4" type="button" onclick="clearExpression()">Del</button>
        <br>
    </form>
</div>
<script>
    function addToExpression(value) {
        document.getElementById('expression').value += value;
    }

    function clearExpression() {
        document.getElementById('expression').value = '';
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
