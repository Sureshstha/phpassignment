<!doctype html>
<html>
<head>
    <title>Assignment 2</title>
</head>
<body>
<form action="submit.php" method="post" enctype="multipart/form-data">
    First Name:   <input type="text" name="first_name"><br><br>
    last Name: <input type="text" name="last_name"><br><br>
   <textarea name="message" rows="10" cols="50"></textarea><br><br>
    <input type="file" name="file" id="file">
    <input type="checkbox" name="hobbies[]" value="Reading">Reading
    <input type="checkbox" name="hobbies[]" value="Painting">Painting
    <input type="checkbox" name="hobbies[]" value="Biking">Biking
    <input type="checkbox" name="hobbies[]" value="Fishing">Fishing
    <input type="checkbox" name="hobbies[]" value="Volleyball">Volleyball
    <input type="checkbox" name="hobbies[]" value="Writing and Blogging">Writing and Blogging
    <input type="submit"  name="submit" value="Submit">
</form>
</body>
</html>