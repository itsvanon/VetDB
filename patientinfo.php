<?php
session_start();
include("config.php")
if(isset($_SESSION['searchip']))
{
$pid = $_SESSION['searchip'];
$q1 = "select * from patient where pid=$pid";
$q2 = "select * from info where pid=$pid";
$q3 = "select * from history where pid=$pid";
$breedquery = "select species, breed from br b, info i where i.bid = b.bid";
$doctorquery = "select dname from doctor d, history h where d.did = h.did";
$r1 = mysqli_query($db,$q1);
$r2 = mysqli_query($db,$q2);
$r3 = mysqli_query($db,$q3);
$rbreed = mysqli_query($db,$breedquery);
$rdoc = mysqli_query($db,$doctorquery);
while($row = mysqli_fetch_array($rdoc))
{
    $dname = $row['dname'];
}
while($row = mysqli_fetch_array($rbreed))
{
    $species = $row['species'];
    $breed = $row['breed'];
}
while($row = mysqli_fetch_array($r1))
{
    $pname = $row['pname'];
    $oname = $row['oname'];
    $ophno = $row['ophno'];
    $oemail = $row['oemail'];
}
while($row = mysqli_fetch_array($r2))
{
    $ph = $row['pname'];
    $pw = $row['oname'];
    $pdob = $row['ophno'];
    $pupapt = $row['oemail'];
}
while($row = mysqli_fetch_array($r3))
{
    $illnes = $row['illness'];
    $doa = $row['doa'];
    $treatment = $row['treatment'];
    $pupapt = $row['upapt'];
}
}
?>
<html>
    <head>
        <title>Patient Information</title>
    </head>
    <body>
        <h5><?php echo $pname?></h5>
        <h5><?php echo $oname?></h5>
        <h5><?php echo $ophno?></h5>
        <h5><?php echo $oemail?></h5>
        <h5><?php echo $ph?></h5>
        <h5><?php echo $pw?></h5>
        <h5><?php echo $pdob?></h5>
        <h5><?php echo $pupapt?></h5>
        <h5><?php echo $illness?></h5>
        <h5><?php echo $doa?></h5>
    </body>
</html>