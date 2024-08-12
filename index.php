<?php
include "./conn.php";
if (isset($_SESSION['name'])) {
    if (isset($_GET['studentId'])) {
        $id = $_GET['studentId'];
        $deleteSql = "DELETE FROM`students`WHERE `id`=$id";
        $runSql = mysqli_query($conn, $deleteSql);
        if ($runSql) {
            $_SESSION['msg'] = "Student Deleted Successfully";
            header("location:index.php");
        } else {
            echo "ERROR!!!!" . mysqli_error($conn);
        }
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:register.php');
    }


    // $sql="
    // CREATE TABLE students(
    // id integer AUTO_INCREMENT PRIMARY KEY,
    // name VARCHAR(255),
    // email VARCHAR(255) UNIQUE
    // )";
    // $runSql=mysqli_query($conn,$sql);
    // if($runSql){
    //     echo"Table created";
    // }else{
    //     echo "ERROR!!!!".mysqli_error($conn);
    // }
    // $insertSql = "INSERT INTO `students`(`name`,`email`)VALUES('Ahmed','ahmed2@ahmed.com'),('Mohamed','Mohamed@mohamed.com'),('ali','ali@ali.com')";
    // $runSql = mysqli_query($conn, $insertSql);
    // if ($runSql) {
    //     echo "Data Inserted";
    // } else {
    //     echo "ERROR!!!!" . mysqli_error($conn);
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
        include './header.php';
        if (isset($_SESSION['msg'])) {
            echo "<h1>" . $_SESSION['msg'] . "</h1>";
        }
        ?>
    <a href="./addStudent.php">ADD STUDENT</a>
    <a href="./index.php">Show All Students</a>
    <a href="./courses.php">Show All Courses</a>
    <?php
        if (isset($_POST["search"])) {
            $studentName = $_POST['studentName'];
            $selectSql = "SELECT * ,`students`.`name` AS `studentName`,
            `courses`.`name` AS `courseName`,`students`.`id` AS `studentId`
            FROM `students`
            JOIN `courses`ON`students`.`course_id`=`courses`.`id`
            WHERE `students`.`name` LIKE '%$studentName%'  
            ORDER BY `studentId` DESC
            ";
        } else {
            $selectSql = "SELECT *,`students`.`name` AS `studentName`,
            `courses`.`name` AS `courseName`,`students`.`id` AS `studentId`
            FROM `students`
            JOIN `courses`ON`students`.`course_id`=`courses`.`id`
            ORDER BY `studentId` DESC";
        }
        $runSql = mysqli_query($conn, $selectSql);
        foreach ($runSql as $data) {
        ?>
    <ul>
        <li>Id:<?php echo $data['studentId'] ?></li>
        <li>Image: <img src="<?php echo $data['image'] ?>" alt="" width="100" height="100"> </li>
        <li>Student Name:<?php echo $data['studentName'] ?></li>
        <li>Email:<?php echo $data['email'] ?></li>
        <li>Course Name:<?php echo $data['courseName'] ?></li>
        <li><a href="./addStudent.php?studentId=<?php echo $data['studentId']  ?>">Update</a></li>
        <li><a href="./index.php?studentId=<?php echo $data['studentId']  ?>">Delete</a></li>
    </ul>
    <?php
        }
        ?>
    <?php include './footer.php';  ?>
</body>

</html>
<?php
} else {
    header('location:register.php');
}