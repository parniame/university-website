<!DOCTYPE html>
<html lang="fa" dir="rtl">

    <head>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title>Document</title>
    </head>

    <body>
        <?php 
        
        require_once("connect.php");
        $coursesName  = $_REQUEST["course-name"];
        $professorsName  = $_REQUEST["professor-name"];
        $days  = $_REQUEST["class-day"];
        $times  = $_REQUEST["class-time"];
        $length = count($coursesName);
        for($i=0;$i<$length;$i++)
        {
            $course = $coursesName[$i];
            $professor = $professorsName[$i];
            $day = $days[$i];
            $time = $times[$i];
            $sql = "INSERT INTO courses (courseName,professorName,classDay,classTime)
                    VALUES ('$course', '$professor','$day','$time')";
            if ($conn->query($sql) === TRUE) 
                { ?>
                    <script>alert("New record inserted successfully.\n");</script>
                    <?php
                    $url = "http://localhost:80/university-website/index.html";
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