<html>
<head>
    <title>Pet Insert PHP</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<body>
<main class="main-container">
<?php
    if(isset($_GET['petname'])){
        $db_server = mysql_connect('localhost', 'ethan', 'kokoko345543!');
        if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());
        if(!mysql_select_db('ethan_VET'))
        die("Unable to select database: " . mysql_error());

        $pet_name = $_GET['petname'];
        $pet_type = $_GET['pettype'];
        $pet_breed = $_GET['petbreed'];
        $pet_dob = $_GET['petdob'];
        $owner_id = $_GET['ownerid'];
        //Build Query
        $query = "INSERT INTO PET(PetName, PetType, PetBreed, PetDOB, OwnerID)
        VALUES('$pet_name', '$pet_type', '$pet_breed', '$pet_dob', '$owner_id')";
        //Execute Query
        $result = mysql_query($query);
        if(!$result)
            die("Unable to execute query: " . mysql_error());
        //Close Database Server
        mysql_close($db_server);
    }
?>
<form action="insertpet.php" method="get">
    <p>Pet Name: <input type="text" name="petname"></p>
    <p>Pet Type: <input type="text" name="pettype"></p>
    <p>Pet Breed: <input type="text" name="petbreed"></p>
    <p>Pet DOB: <input type="text" name="petdob"></p>
    <p>Owner ID: <input type="text" name="ownerid"></p>
    <p><input type="submit" value="Insert Pet"></p>
</form>
<a href="petlist.php"><p>Current Pet List</p></a>
<a href="insertpet.php"><p>Insert Pet (Blank Form)</p></a>
</main>
</body>
</html>