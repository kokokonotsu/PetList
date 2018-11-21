<html>
<head>
    <title>Remove Project Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Delete Project Form</h1>";
?>
<?php
    if(isset($_GET['projectname'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
            die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db("ethan_RYO"))
            die("Unable to select database: " . mysql_error());
        $project_name = $_GET['projectname'];
        
        $query = "DELETE FROM GAME_PROJECT WHERE ProjectName = $project_name";

        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        
            mysql_close($db_server);
    }
?>

<form action="deleteproject.php">
    <p><input type="text" name="projectname"></p>
    <p><input type="submit" value="Remove Project From Database"></p>
</form>
<p><a href="gameprojectlist.php">List Current Owners</a></p>
<p><a href="deleteproject.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>