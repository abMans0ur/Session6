<?php include './conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include './header.php';  ?>
    <div class="container">

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>DESC</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectCourses = mysqli_query($conn, "SELECT * FROM `courses`");
                foreach ($selectCourses as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row['id'];   ?>
                    </td>
                    <td>
                        <?php echo $row['name'];   ?>
                    </td>
                    <td>
                        <?php echo $row['description'];   ?>
                    </td>
                    <td>
                        <?php $selectCoursesImages = mysqli_query($conn,"SELECT * FROM `courses_images` WHERE `course_id`=$row[id]"); 
                        foreach( $selectCoursesImages as $rowImage ):
                        ?>
                        <img src="<?php  echo$rowImage['image'] ?>" alt="">
                        <?php endforeach ;?>
                    </td>
                    <td><a href="">Delete</a></td>
                </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
        <?php include './footer.php';  ?>
    </div>
</body>

</html>