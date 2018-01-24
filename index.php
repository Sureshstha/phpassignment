<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<?php

// define variables and set to empty values
$nameErr = $quanErr = $priceErr = $dateErr = "";
$name = $quantity = $price = $date = $date_pic = $dateFormat = "";
$date1 = $date2 = $time = $date_time = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Product Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        $name = preg_replace("#[^a-zA-Z0-9_\s]#",'', $name);
    }

    if (empty($_POST["quantity"])) {
        $quanErr = "Quantity is required";
    } else {
        $quantity = test_input($_POST["quantity"]);
        $quantity = preg_replace("#[^.,0-9_]#",'',$quantity);
    }

    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        $price = test_input($_POST["price"]);
        $price = preg_replace("#[^.,0-9_]#",'',$price);
    }
    if (empty($_POST["pro_date"])) {
        $dateErr = "Production date is required";
    } else {
        $date = test_input($_POST["pro_date"]);
        $date_pic = DateTime::createFromFormat('Y-m-d', $date);
        $date1 = date_create($date);
        $date_pic = $date_pic->format('l jS \of F Y');
        $time = date_create();
       $date_time = date_diff($date1,$time);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Regression and Date and Time Assignment</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Product Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Quantity: <input type="text" name="quantity">
    <span class="error">* <?php echo $quanErr;?></span>
    <br><br>
    Price: <input type="text" name="price">
    <span class="error">*<?php echo $priceErr;?></span>
    <br><br>
    Production Date: <input type="text" id="date" name="pro_date">
    <span class="error">*<?php echo $dateErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Product Information:</h2>";
echo $name;
echo "<br>";
echo $quantity;
echo "<br>";
echo $price;
echo "<br>";
echo $date_pic;
echo "<br>";
echo $date_time->y."years,";
echo $date_time->m."months,";
echo $date_time->d."days,";

?>

<script type="text/javascript">
    $('#date').datepicker({
        dateFormat: "yy-mm-dd"
    })
</script>
</body>
</html>
