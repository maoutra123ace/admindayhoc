<?php
    if(isset($_GET["id"]))
    {
        if($_GET["id"]=="tk"){
            include("thongke.php");
        }
        if($_GET["id"]=="qlhs"){
            if(isset($_GET["add"])){
                include("addhs.php");
            }else if(isset($_GET["edit"])){
                include("ediths.php");
            }
            else{
            include("qlhs.php");
            }
        }
        if($_GET["id"]=="qlgv"){
            if(isset($_GET["add"])){
                include("addgv.php");
            }else if(isset($_GET["edit"])){
                include("editgv.php");
            }
            else{
            include("qlgv.php");
            }
        }
        if($_GET["id"]=="qllop"){
            if(isset($_GET["add"])){
                include("addlop.php");
            }else if(isset($_GET["edit"])){
                include("editlop.php");
            }
            else{
                include("qllop.php");
            }
        }
        if($_GET["id"]=="qlcm"){
            if(isset($_GET["add"])){
                include("addcm.php");
            }else if(isset($_GET["edit"])){
                include("editcm.php");
            }
            else{
                include("qlcm.php");
            }
        }
        if($_GET["id"]=="qldk"){
            if(isset($_GET["add"])){
                include("adddk.php");
            }else if(isset($_GET["edit"])){
                include("editdk.php");
            }
            else{
            include("qldk.php");
            }
        }
        if($_GET["id"]=="qlhd"){
            if(isset($_GET["add"])){
                include("addhd.php");
            }else if(isset($_GET["edit"])){
                include("edithd.php");
            }
            else{
                include("qlhd.php");
            }
        }
            
    }
    else{
        include("thongke.php");
    }
?>