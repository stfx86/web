<?php
$host = "localhost";
// $port = 3306;
$username = "stof";
$password = "bennasser";
$database = "buvette";

// Connect using separate port parameter
$bd = mysqli_connect($host, $username, $password, $database) or die("connection faild");

if (!$bd) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}


$res = mysqli_query($bd, "select  * from  buvette.users");
$row = mysqli_fetch_assoc($res);
extract($row);
echo $type;
while ($row = mysqli_fetch_assoc($res)) {
    // 
    echo "<tr>
            <td>" . $row["name"].     "<td>
            <td>" . $row["password"]. "</td>
            <td>" . $row["type"].     "<td>
                
        </tr>";
}



mysqli_close($bd);
