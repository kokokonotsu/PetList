<html>
<head>
    <title>Update Project Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    echo "<h1>Update Project Information Form</h1>";
?>
<?php
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
    if(!mysql_select_db('ethan_RYO'))
        die('Unable to select database: ' . mysql_error());
    $query = "SELECT * FROM GAME_PROJECT";

    $result = mysql_query($query);
    if(!result)
        die("Unable to execute query: " . mysql_error());
    
    echo "<table border=\"1\">";
    echo "<tr><th>ProjectName</th><th>DeveloperName</th><th>StartDate</th><th>EndDate</th></tr>\n";

    $rows = mysql_num_rows($result);
    for($r = 0; $r < $rows; $r++){
        echo "<tr>";
        for($c = 0; $c < 4; $c++){
            echo "<td>" . mysql_result($result, $r, $c) . "</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
?>
<?php
if (isset($_GET['projectname']))
{
    //Connect to Server
    $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    if(!mysql_select_db('ethan_RYO'))
        die("Unable to select database: " . mysql_error());

    $project_name = $_GET['projectname'];
    $new_project_name = $_GET['newprojectname'];
    $new_developer_name = $_GET['newdevelopername'];
    $new_start_date = $_GET['newstartdate'];
    $new_end_date = $_GET['newenddate'];

    //Build SQL Query
    //Update Fields entered on the Form
    //Include commas to separate the fields
    //Initialize Query Counter
    $count = 0;
    $query = "UPDATE GAME_PROJECT SET ";
    if ($new_project_name != "") {
        $query .= "ProjectName='$new_project_name'";
        $count++;
    }
    if ($new_developer_name != "") {
        if($count > 0) $query .= ", ";
        $query .= "DeveloperName='$new_developer_name'";
        $count++;
    }
    if ($new_start_date != "") {
        if ($count > 0) $query .= ", ";
        $query .= "StartDate='$new_start_date';";
        $count++;
    }
    if ($new_end_date != "") {
        if($count > 0) $query .= ", ";
        $query .= "EndDate='$new_end_date'";
    }
    $query .= " WHERE ProjectName= '$project_name'";
    echo "<p>Debug SQL Query:  " . $query . "</p>";

    //Execute Query
    $result = mysql_query($query);
    if(!$result)
        die("Unable to execute query " . mysql_error());
    //Close DB Server
    mysql_close($db_server);
}
?>
<form action="updateproject.php" method="get">
    <p>Enter Project Name to Select Project:</p>
    <p><input type="text" name="projectname"></p>
    <p>New Project Name: <input type="text" name="newprojectname"></p>
    <p>New Developer Name: <input type="text" name="newdevelopername"></p>
    <p>New Project Start Date (YYYY-MM-DD): <input type="text" name="newstartdate"></p>
    <p>New Project End Date (YYYY-MM-DD): <input type="text" name="newenddate"></p>
    <p><input type="submit" value="Update Project Information"></p>
</form>

<p><a href="gameprojectlist.php">List Current Projects</a></p>
<p><a href="updateproject.php">Refresh Table on Current Page</a></p>
<p><a href="../index.html">Back to Home</a></p>
</main>
</body>
</html>
