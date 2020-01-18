<?php
include("config.php");
$error = "Patient not found";
if(isset($_POST['searchip']))
{
$pid = $_POST['searchip'];
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
    $ph = $row['height'];
    $pw = $row['weight'];
    $pdob = $row['dob'];
    $pupapt = $row['upapt'];
}
while($row = mysqli_fetch_array($r3))
{
    $illness = $row['illness'];
    $doa = $row['doa'];
    $treatment = $row['treatment'];
}
}
?>
<html>
    <head>
        <title>Patient Information</title>
        <link rel="stylesheet" type="text/css" href="patientinfo.css">
        <link rel="stylesheet" type="text/css" href="animate.min.css">
    </head>
    <body bgcolor="#4db8ff">
        <div class="data animated fadeInDown">
        
        <div class="pname">
            <h1><?php echo $pname?></h1>
        </div>
        <div class="oname">
        <h5>Owner Name: <?php echo $oname?></h5>
        </div>
        <div class="ophno">
        <h5>Phone No: <?php echo $ophno?></h5>
        </div>
        <div class="oemail">
        <h5>Email: <?php echo $oemail?></h5>
        </div>
        <div class="ph">
        <h5>Height: <?php echo $ph?></h5>
        </div>
        <div class="pw">
        <h5>Weight: <?php echo $pw?></h5>
        </div>
        <div class="pdob">
        <h5>DOB: <?php echo $pdob?></h5>
        </div>
        <div class="pupapt">
        <h5>Upcoming Appointments: <?php echo $pupapt?></h5>
        </div>
        <div class="species">
        <h5>Species: <?php echo $species?></h5>
        </div>
        <div class="breed">
        <h5>Breed: <?php echo $breed?></h5>
        </div>
        <table align="center">
            <thead>
                <tr>
                    <th>Illness</th>
                    <th>Date of Admn.</th>
                    <th>Treatment</th>
                    <th>Doctor Incharge</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $illness?></td>
                    <td><?php echo $doa?></td>
                    <td><?php echo $treatment?></td>
                    <td><?php echo $dname?></td>
                </tr>
            </tbody>
        </table>
</div>
    </body>
</html>