<html>
<head>
    <title>Add New Project</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Add New Project Form</h1>"
?>
<?php
    if(isset($_GET['projectname'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db('ethan_RYO'))
        die("Unable to select database: " . mysql_error());

        $project_name = $_GET['projectname'];
        $developer_name = $_GET['developername'];
        $start_date = $_GET['startdate'];
        $end_date = $_GET['enddate'];
        //Build Query
        $query = "INSERT INTO GAME_PROJECT(ProjectName, DeveloperName, StartDate, EndDate)
        VALUES('$project_name', '$developer_name', '$start_date', '$end_date')";
        //Execute Query
        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        //Close Database Server
        mysql_close($db_server);
    }
?>
<form action="insertproject.php" method="get">
    <p>Project Name: <input type="text" name="projectname"></p>
    <p>Project Developer Name: <input type="text" name="developername"></p>
    <p>Project Start Date: <input type="text" name="startdate"></p>
    <p>Project End Date: <input type="text" name="enddate"></p>
    <p><input type="submit" value="Add New Project"></p>
</form>
<p><a href="gameprojectlist.php">Current Project List</a></p>
<p><a href="insertowner.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>