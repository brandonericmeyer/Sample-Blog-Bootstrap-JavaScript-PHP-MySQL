<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['language']);
$con = mysqli_connect('localhost','root','root','preferences');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"preferences");
$sql="SELECT * FROM themes WHERE language = '".$q."'";
$result = mysqli_query($con,$sql);
echo "<table>
<tr>
<th>Language</th>
<th>Color</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['language'] . "</td>";
    echo "<td id='color'>" . $row['color'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
<script type="text/javascript" src="resources/js/main.js"></script>
</body>
</html>
