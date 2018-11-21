<html>
<head>
    <title>Insert Owner Form</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    if(isset($_GET['ownerid'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db('ethan_VET'))
        die("Unable to select database: " . mysql_error());

        $owner_id = $_GET['ownerid'];
        $owner_first_name = $_GET['ownerfirstname'];
        $owner_last_name = $_GET['ownerlastname'];
        $owner_phone = $_GET['ownerphone'];
        $owner_email = $_GET['owneremail'];
        //Build Query
        $query = "INSERT INTO PET_OWNER(OwnerID, OwnerLastName, OwnerFirstName, OwnerPhone, OwnerEmail)
        VALUES('$owner_id', '$owner_last_name', '$owner_first_name', '$owner_phone', '$owner_email')";
        //Execute Query
        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        //Close Database Server
        mysql_close($db_server);
    }
?>
<form action="insertowner.php" method="get">
    <p>Owner ID: <input type="text" name="ownerid"></p>
    <p>Owner First Name: <input type="text" name="ownerfirstname"></p>
    <p>Owner Last Name: <input type="text" name="ownerlastname"></p>
    <p>Owner Phone: <input type="text" name="ownerphone"></p>
    <p>Owner Email: <input type="text" name="owneremail"></p>
    <p><input type="submit" value="Insert Owner"></p>
</form>
<a href="petowner.php"><p>Current Owner List</p></a>
<a href="insertowner.php"><p>Insert Owner (Blank Form)</p></a>
</main>
</body>
</html>