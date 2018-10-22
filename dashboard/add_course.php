<?php

    //connect to database
    include('server.php'); 


    $course_id = "";
    
    //if save btn is clicked

        $course_code =$_POST['course_code'];
        $course_title =$_POST['course_title'];
        $marks =$_POST['marks'];
        $credits =$_POST['credits'];
        $contact_hour_week =$_POST['contact_hour_week'];
        $contact_periods_week =$_POST['contact_periods_week'];
        $year =$_POST['year'];
        $semester =$_POST['semester'];


        $course_search = "SELECT * FROM courses WHERE course_code='$course_code'";
        $course_exist = mysqli_query($db, $course_search);

        if (mysqli_num_rows($course_exist) > 0) {

            echo "Course Already Exist.";

        }else{

            $course_id = preg_replace('/\s+/', '', $course_code);
            $course_id = strtolower($course_id);

            $query = "INSERT INTO courses (course_id ,course_code, course_title, marks, credits, contact_hour_week, contact_periods_week, year, semester) VALUES ('$course_id','$course_code', '$course_title', '$marks', '$credits', '$contact_hour_week', '$contact_periods_week', '$year', '$semester')";

             if ($db->query($query) === TRUE) {

                $table_name = 'course_'.$course_id;


                $course_table = "CREATE TABLE $table_name (
                    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    roll_no VARCHAR(12),
                    section_a_marks VARCHAR(10),
                    section_b_marks VARCHAR(10),
                    section_a_classtest VARCHAR(50),
                    section_b_classtest VARCHAR(50),
                    section_a_attendance  VARCHAR(20),
                    section_b_attendance  VARCHAR(20),
                    section_a_examiner VARCHAR(50),
                    section_b_examiner VARCHAR(50),
                    exam_year VARCHAR(10),
                    regularity  VARCHAR(20),
                    appearance VARCHAR(10),
                    limitation VARCHAR(5)
                )";
                if ($db->query($course_table) === TRUE) {
                    echo "Added..";
                } else {

                    mysqli_query($db, "DELETE FROM courses WHERE course_code=$course_code");
                    echo " Something wrong.. Please try again" . $db->error;

                }


            } else {
                echo "Error Adding Course.. Try Again.." . $db->error;
            }

        }

    
   
?>