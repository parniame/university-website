
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
        try 
            {   $conn->query($sql);
                
                $message = "درس "."'$course'". "با موفقیت وارد شد \n" ;
                echo $message;
            } 
        catch(Throwable $e)
            {   
               
                if (mysqli_errno($conn) == 1062) {
                    $message =   "نام درس و استاد تکراری است!";
                }
                else{
                    $message =   "درس "."'$course'"."در ورود به مشکل خورد \n";
                    
                }
                echo $message;

            }       
    }
    

    mysqli_close($conn);

    

?>

