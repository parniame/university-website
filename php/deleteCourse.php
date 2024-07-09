<!DOCTYPE html>
<html lang="fa" dir="rtl">

    <head>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title>Document</title>
    </head>

    <body>
        <?php 
        
        session_start();
        require_once("connect.php");
        $coursesID   = $_REQUEST["ID"];
        $userName  = $_SESSION["user_name"];
        
        $length = count($coursesID );
        for($i=0;$i<$length;$i++)
        {   
            
            $ID = $coursesID [$i];
            
            
            $sql = "DELETE FROM selectedcourse WHERE ID = $ID";
            if ($conn->query($sql) === TRUE) 
                { ?>
                    <script>alert("New record inserted successfully.\n");</script>
                    <?php
                    $url = "http://localhost:80/university-website/php/selectdCousePage.php";
                    header("Location:$url");
                } 
            else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }       
        }
        mysqli_close($conn);

        ?>

   
    </body>
   
</html>