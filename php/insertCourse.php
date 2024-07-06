<!DOCTYPE html>
<html lang="fa" dir="rtl">

    <head>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title>Document</title>
    </head>

    <body>
        <?php 
        
        $conn = mysqli_connect("localhost", "root", "", "University");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
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
                {
                    echo "New record inserted successfully.\n";
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