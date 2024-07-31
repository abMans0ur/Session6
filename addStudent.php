<?php
include './conn.php';
$update = false;
if (isset($_GET['studentId'])) {
    $id = $_GET['studentId'];
    $update = true;
    $selectData = "SELECT * FROM`students`WHERE `id`=$id";
    $studentData = mysqli_fetch_assoc(mysqli_query($conn, $selectData));
    // print_r($studentData);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" value="<?php if ($update) echo $studentData['name'] ?>" placeholder="UserName" required>
        <input type="email" name="email" placeholder="email" value="<?php if ($update) echo $studentData['email'] ?>" required>
        <select name="course" id="">
            <?php
            $selectCourses = "SELECT * FROM `courses`";
            $runCourses = mysqli_query($conn, $selectCourses);
            foreach ($runCourses as $data) :
            ?>
                <option value="<?php echo $data['id']  ?>" <?php if ($update) {
                                                                if ($data['id'] == $studentData['course_id']) {
                                                                    echo "SELECTED";
                                                                }
                                                            }  ?>><?php echo $data['name'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <?php
        if ($update) {
        ?>
            <button type="submit" name="updateBtn">Update</button>
        <?php
        } else {
        ?>
            <button type="submit" name="addBtn">Add</button>
        <?php } ?>
    </form>
</body>

</html>
<?php
if (isset($_POST['addBtn']) || isset($_POST['updateBtn'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $courseId = $_POST['course'];
    if ($update) {
        $sql = "UPDATE `students` SET `name`='$name' , `email`='$email' ,`course_id`=$courseId WHERE `id`=$id ";
    } else {
        $sql = "INSERT INTO `students`(`name`,`email`,`course_id`)VALUES('$name','$email',$courseId)";
    }
    $runSql = mysqli_query($conn, $sql);
    if ($runSql) {
        echo "Added";
        header('location:index.php');
    } else {
        echo "ERROR!!! " . mysqli_error($conn);
    }
}
