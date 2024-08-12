<?php
include './conn.php';
if (isset($_SESSION['name'])) {

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
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <?php include './header.php'; ?>
        <a href="./index.php">BACK to HOME</a>
        <div class="container">
            <?php
            if ($update) :
            ?>
                <img src="<?php echo $studentData['image'] ?>" alt="">
            <?php
            endif;
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="username" value="<?php if ($update) echo $studentData['name'] ?>"
                    placeholder="UserName" required>
                <input type="email" name="email" placeholder="email"
                    value="<?php if ($update) echo $studentData['email'] ?>" required>
                <input type="file" name="fileToUpload" accept="image/*">
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
            <?php include './footer.php';  ?>
        </div>

    </body>

    </html>
<?php
    if (isset($_POST['addBtn']) || isset($_POST['updateBtn'])) {
        $targetDir = "uploads/";
        $fileName = $_FILES['fileToUpload']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        // $fileName=rand(1000000,9999999).'.'.$fileExtension;
        $fileName = time() . '.' . $fileExtension;
        // $fileName=now().'.'.$fileExtension;
        $targetFile = $targetDir . basename($fileName);
        if ($update) {
            if (!empty($_FILES['fileToUpload']['name'])) {
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);
            } else {
                $targetFile = $studentData['image'];
            }
        } else {
            if (!empty($_FILES['fileToUpload']['name'])) {
                if (!move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
                    array_push($errors, 'ERROR IN UPLOAD!!!');
                }
            } else {
                $targetFile = 0;
            }
        }
        $name = $_POST['username'];
        if (empty($name)) {
            array_push($error, "Name is Needed");
        }
        $desc = $_POST['email'];
        if (empty($desc)) {
            array_push($error, "Email is Needed");
        }
        $courseId = $_POST['course'];
        $checkMail = "SELECT *FROM `students`WHERE `email`='$desc'";
        if ($update) {
            $checkMail .= " AND `id`!=$id";
        }
        $runCheck = mysqli_query($conn, $checkMail);
        $mailCounter = mysqli_num_rows($runCheck);
        if ($mailCounter > 0) {
            array_push($error, "THIS EMAIL ALREADY EXISTS!!!!");
        }
        if (empty($error)) {
            if ($update) {
                $sql = "UPDATE `students` SET `name`='$name' , `email`='$desc' ,`course_id`=$courseId , `image`='$targetFile' WHERE `id`=$id ";
                $_SESSION['msg'] = "Student Updated Successfully";
            } else {
                $sql = "INSERT INTO `students`(`name`,`email`,`image`,`course_id`)VALUES('$name','$desc',IF(" . "$targetFile!=0" . ",'$targetFile',image),$courseId)";
                $_SESSION['msg'] = "Student Added Successfully";
            }
            $runSql = mysqli_query($conn, $sql);
            if ($runSql) {
                header('location:index.php');
            } else {
                echo "ERROR!!! " . mysqli_error($conn);
            }
        } else {
            foreach ($error as $row) {
                echo "<h1>$row</h1><br>";
            }
        }
    }
} else {
    header('location:register.php');
}
