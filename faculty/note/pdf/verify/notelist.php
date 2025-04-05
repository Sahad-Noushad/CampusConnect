<?php
    session_start();
    include_once "../../../../connect.php";
    $dep=$_SESSION['dep'];
    $indexdir="../../../../study/notes/tmppublic";
    $sql="SELECT * FROM tmppnote WHERE ncourse='$dep'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $dir=$indexdir.'/'.$row['nyear'].'/'.$row['ncourse'].'/'.$row['nsem'].'/'.$row['nsub'].'/'.$row['nmod'];
        $row1=$row['nyear'].'/'.$row['ncourse'].'/'.$row['nsem'].'/'.$row['nsub'].'/'.$row['nmod'];
        echo "
        <tr style=\"color:white;\">
            <td>".$row['nyear']."</td>
            <td>".$row['ncourse']."</td>
            <td>".$row['nsem']."</td>
            <td>".$row['nsub']."</td>
            <td>".$row['nmod']."</td>
            <td><a href=\"".$dir."/".$row['name']."\" style=\"text-decoration:none;color:white;\">".$row['name']."</a></td>
            <td><i data-value=\"".$dir."/".$row['name']."\" onclick=\"verify(this.dataset.value,'del','".$row1."/".$row['name']."','".$row['Sino']."')\" class=\"fa fa-trash\"  style=\"color:red;cursor:pointer;\"></i></td>
            <td><i data-value=\"".$dir."/".$row['name']."\" onclick=\"verify(this.dataset.value,'verify','".$row1."/".$row['name']."','".$row['Sino']."')\" class=\"fa fa-check\"  style=\"color:green;cursor:pointer;\"></i></td>
        </tr>
        ";
    }

    
    
?>