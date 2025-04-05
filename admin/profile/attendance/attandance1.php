<?php
    
    include_once "../../../connect.php";
    require_once 'D:/xampp/vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    

    if(isset($_POST['upload'])){
        if(isset($_FILES['excel']['name'])){
            $allowedext=array("xls", "xlsx", "csv");
            $ext=strtolower(pathinfo($_FILES['excel']['name'],PATHINFO_EXTENSION));
            if(in_array($ext,$allowedext)){
                $file="../../uploads/".$_FILES['excel']['name'];
                $isuploaded=copy($_FILES['excel']['tmp_name'],$file);
                if($isuploaded){
                    $mon=$_POST['month'];

                    $spreadsheet=$reader->load($file);
                    $sheet=$spreadsheet->getSheet(0);
                    $trows=$sheet->getHighestRow();
                    $tcol=$sheet->getHighestColumn();
                    $ticol= \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($tcol);
                    for($row=2;$row<=$trows;++$row){
                        for($col=1;$col<=$ticol;++$col){
                            $cell=$sheet->getCellByColumnAndRow($col,$row);
                            $val=$cell->getValue();
                            $rec[$row][$col]=$val;
                        }
                    }
                    switch($mon){
                        case 1:
                            jan($rec,$con);
                            break;
                        case 2:
                            feb($rec,$con);
                            break;
                        case 3:
                            mar($rec,$con);
                            break;
                        case 4:
                            apr($rec,$con);
                            break;
                        case 5:
                            may($rec,$con);
                            break;
                        case 6:
                            jun($rec,$con);
                            break;
                        case 7:
                            jul($rec,$con);
                            break;
                        case 8:
                            aug($rec,$con);
                            break;
                        case 9:
                            sep($rec,$con);
                            break;
                        case 10:
                            oct($rec,$con);
                            break;
                        case 11:
                            nov($rec,$con);
                            break;
                        case 12:
                            dece($rec,$con);
                            break;
                    }
                    unlink($file);
                }
                else{
                    echo "File not uploaded";
                }
            }
            else{
                echo "Please upload excel sheet";
            }
        }
        else{
            echo "Please upload excel file";
        }
    }
    function jan($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET jan='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function feb($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET feb='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function mar($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET mar='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function apr($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET apr='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function may($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET may='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function jun($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET jun='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function jul($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET jul='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function aug($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET aug='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function sep($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET sep='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function oct($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET oct='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function nov($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET nov='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
    function dece($rec,$con){
        foreach($rec as $vals){
            $rollno=isset($vals[1])?$vals[1]:'';
            $per=isset($vals[2])?$vals[2]:'';
            $sql="UPDATE attendance SET dece='$per' WHERE regno='$rollno'";
            if(mysqli_query($con,$sql)){
                header("Location:attandance.php");
            }
            else{
                echo "Error ".$sql.":-".mysqli_error($con);
            }
        }
    }
?>