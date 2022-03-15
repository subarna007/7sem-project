<?php
if(isset($_GET["other"])){
    if($_GET["other"]==0) {
        include_once "../classes/index.php";        
    }
    else{
        include_once "../classes/index.php";       
    }
    $conn=new DBConnect();
    $result=$conn->generic_func("Update bookings set seen=1");
    $r=0;
    if($result==1){
        $r=1;
    }
    echo $r;
}
?>