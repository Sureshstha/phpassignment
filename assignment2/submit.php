<html>
<head>
    <title>Document</title>
</head>
<body>
<?php
$hobbies = "";
$F_NAME = $_POST["first_name"];
$L_NAME = $_POST["last_name"];
$Message =$_POST["message"];
$output ="";
if(isset($_POST["submit"]))
{
    $file =$_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt =strtolower(end($fileExt));

    $allowed = array('json');
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'test_project'. $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "You have an error uploading a file";
        }
    }else{
        echo "You cannot upload file of this type";
    }
}
$data =file_get_contents($fileDestination);
$posts =json_decode($data, true);
$arr = (array)$posts;
$new = array_filter($arr, function ($var) {
    return ($var['Genre'] == 'Fantasy Fiction');
});





echo "<h2>User Information:</h2>";
echo "<strong>Name:</strong>" . $L_NAME[0] .".". $F_NAME;
echo "<br><br>";
echo "<strong>Message:</strong> "."<br>" . nl2br($Message);
echo "<br><br>";
echo "<strong>Hobbies:</strong> ";
if(isset($_POST["submit"])){
    if(isset($_POST["hobbies"])){
        $hobbies = implode(", ", $_POST["hobbies"]);
        echo $hobbies;
        }

}
echo "<br><br>";
echo "<strong><h4>Movie List With Genre Fantasy Friciton</h4> </strong>";
foreach ($new as $val){
    $output.="<strong>Title :</strong> ". $val['Title']."<br>";
    $output.="<strong>Author :</strong> ". $val['Author']."<br>";
    $output.="<strong>Genre :</strong> ". $val['Genre']."<br>";
    $output.="<strong>Published Year :</strong> " . $val['Published Year']."<br>";
    $output.="<br>";
}
echo $output;
echo "<br>";
?>
</body>
</html>