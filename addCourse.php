<?php include './conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
    /* body {
        min-height: 100vh;
    } */
    </style>
</head>

<body>
    <?php include './header.php'; ?>
    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="courseName" id="" placeholder="please enter course name">
            <textarea name="description" id="" placeholder="please enter course description" cols="40"
                rows="10"></textarea>
            <input type="file" accept="image/*" name="myFiles[]" id="" multiple>
            <button type="submit" name="addBtn">Add Course</button>
        </form>
        <?php include './footer.php'; ?>
    </div>

</body>

</html>
<?php
if (isset($_POST['addBtn'])) {
    $name = $_POST['courseName'];
    if (empty($name)) {
        array_push($error, "Name is Needed");
    }
    $desc = $_POST['description'];
    if (empty($desc)) {
        array_push($error, "Description is Needed");
    }
    $insertCourse = mysqli_query($conn, "INSERT INTO`courses`(`name`,`description`)VALUES('$name','$desc')");
    $selectCourse = mysqli_fetch_assoc(mysqli_query($conn,"SELECT LAST_INSERT_ID() AS id"));
    $courseId=$selectCourse['id'];
    $targetDir = "uploads/courses/";
    foreach($_FILES['myFiles']['name'] as $key=>$value){
        $fileName = $_FILES['myFiles']['name'][$key];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileName = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDir . basename($fileName);
        if (move_uploaded_file($_FILES['myFiles']['tmp_name'][$key], $targetFile)) {
            $insertImages = "INSERT INTO `courses_images`(`course_id`,`image`)VALUES($courseId,'$targetFile')";
            if(mysqli_query($conn, $insertImages)){
                header("location:index.php");
            }
        }
        
    }
}