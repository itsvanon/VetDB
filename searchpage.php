<?php
include("config.php");
session_start();
$error = "Patient not found";
if(isset($_POST['searchip']))
{
    $pid = $_POST['searchip'];
    $_SESSION['searchip'] = $pid;
    $query = "select pname, oname, ophno, oemail from patient where pid=$pid";
    $results = mysqli_query($db,$query);
    while($row = mysqli_fetch_array($results))
    {
        $pname = $row['pname'];
        $oname = $row['oname'];
        $ophno = $row['ophno'];
        $oemail = $row['oemail'];
    }
}
else 
{
    echo $error;
}
?>
<html>
    <head>
        <title>
        </title>
        <link rel="stylesheet" type="text/css" href="searchpage.css">
    </head>
    <body bgcolor="#4db8ff">
    <div class="container">
	<table>
		<thead>
			<tr>
				<th>Patient Name</th>
				<th>Owner Name</th>
				<th>Phone Number</th>
				<th>Email ID</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a class="userlnk" href="patientinfo.php"><?php echo $pname ?></a></td>
				<td><a class="userlnk" href="patientinfo.php"><?php echo $oname ?></a></td>
				<td><a class="userlnk" href="patientinfo.php"><?php echo $ophno ?></a></td>
				<td><a class="userlnk" href="patientinfo.php"><?php echo $oemail ?></a></td>
			</tr>
		</tbody>
    </table>
    </div>
    <a class="link" href="search.php">Search another patient<?php unset($_SESSION['searchip'])?></a>
    </body>
</html>

