<h1>WELCOME MR. <?php echo $_SESSION['name'] ?></h1>
<form action="index.php" method="post">
    <input type="text" name="studentName">
    <button type="submit" name="search">Search</button>
</form>
<a href="./index.php">HOME</a>