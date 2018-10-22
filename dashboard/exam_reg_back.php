<?php
include('server.php');

$roll_no =$_POST['roll_no'];
$year =$_POST['year'];
$semester =$_POST['semester'];
$exam_year =$_POST['exam_year'];
$msg ='';

$regularity =$_POST['regularity'];

$student_search = "SELECT * FROM students WHERE roll_no='$roll_no'";
$student_exist = mysqli_query($db, $student_search);

if (mysqli_num_rows($student_exist) > 0) {

    if ($regularity =='regular') {

        $error = '';

        $courses= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");

        while($select_course = mysqli_fetch_array($courses)){ 

            $course_table = 'course_'.$select_course['course_id']; 

            $roll_search = "SELECT * FROM $course_table WHERE roll_no='$roll_no'";
            $roll_exist = mysqli_query($db, $roll_search);

            if (mysqli_num_rows($roll_exist) > 0) {

                $error = '1';
                break;

            }else{
                $error = 'ok';
            }
        }

        if ($error == 'ok') {

            $insert_r = "INSERT INTO exam_registration (roll_no ,year, semester,exam_year,regularity) VALUES ('$roll_no', '$year', '$semester', '$exam_year', 'regular')";

            if ($db->query($insert_r) === TRUE) {

                $add_to_course= mysqli_query($db, "SELECT * FROM courses WHERE year='$year' AND semester='$semester'");
                while($add_std = mysqli_fetch_array($add_to_course)){ 

                    $table_name = 'course_'.$add_std['course_id']; 

                    $insert = "INSERT INTO $table_name (roll_no ,regularity, appearance, limitation,exam_year) VALUES ('$roll_no', 'regular', '1', '0', '$exam_year')";

                    if ($db->query($insert) === TRUE) {

                        $msg = 'Registered..';

                    } else {

                        $msg = "Ragistration Failed." . $db->error;

                    }
                }

            } else {

                $msg = "Ragistration Failed." . $db->error;

            }

            
            


        }else {
            $msg = "Ragistration Failed.";
        }

        echo $msg;
        

    }else if ($regularity =='improve'){

        $course_id =$_POST['course_id'];
        $course_table ='course_'.$course_id;

        $roll_search = "SELECT * FROM $course_table WHERE roll_no='$roll_no'";
        $roll_exist = mysqli_query($db, $roll_search);

        if (mysqli_num_rows($roll_exist) == 0) {

            echo $roll_no.' Did not registered as Regular Examineer..';

        }else if (mysqli_num_rows($roll_exist) > 0) {

            $for_appearance = mysqli_query($db, "SELECT * FROM $course_table WHERE roll_no='$roll_no'");
            $appearance_comp  = mysqli_fetch_array($for_appearance);
            $appearance = $appearance_comp['appearance'];
            $limitation  = $appearance_comp['limitation'];

            $old_number = $appearance_comp['section_a_marks'] + $appearance_comp['section_b_marks'];

            $rec = mysqli_query($db, "SELECT * FROM courses WHERE course_id = '$course_id'");
            $record = mysqli_fetch_array($rec);
            $max_total_marks = $record['marks'];

            $improve_max_mark = (60 * $max_total_marks) / 100;
            $improve_min_mark = (40 * $max_total_marks) / 100;

            if ($limitation == 0 && $appearance == 1) {
                
                if ($old_number < $improve_min_mark) {
                    $appearance = $appearance + 1;
                    $limitation = '0';


                    $insert_r = "INSERT INTO $exam_registration (roll_no ,year, semester,exam_year,regularity) VALUES ('$roll_no', '$year', '$semester', '$exam_year', 'improve')";

                    if ($db->query($insert_r) === TRUE) {

                        $insert = "UPDATE $course_table SET regularity='improve' , appearance = '$appearance' , limitation = '$limitation', exam_year = '$exam_year' WHERE roll_no='$roll_no'";

                        if ($db->query($insert) === TRUE) {

                            echo 'Registered..';

                        } else {

                            echo "Ragistration Failed." . $db->error;

                        }

                    } else {

                        echo "Ragistration Failed." . $db->error;

                    }

                    

                }else if ($old_number < $improve_max_mark && $old_number > $improve_min_mark) {
                    $appearance = $appearance + 1;
                    $limitation = 1;


                    $insert_r = "INSERT INTO $exam_registration (roll_no ,year, semester,exam_year,regularity) VALUES ('$roll_no', '$year', '$semester', '$exam_year', 'improve')";

                    if ($db->query($insert_r) === TRUE) {

                        $insert = "UPDATE $course_table SET regularity='improve' , appearance = '$appearance' , limitation = '$limitation' , exam_year = '$exam_year' WHERE roll_no='$roll_no'";

                        if ($db->query($insert) === TRUE) {

                            echo 'Registered..';

                        } else {

                            echo "Ragistration Failed." . $db->error;

                        }

                    } else {

                        echo "Ragistration Failed." . $db->error;

                    }


                    


                }else{
                    echo "Ragistration Failed." . $db->error;
                }



            }else if ($limitation == 0 && $appearance == 2 && $old_number < $improve_min_mark) {

                $appearance = $appearance + 1;
                $limitation = '1';


                 $insert_r = "INSERT INTO $exam_registration (roll_no ,year, semester,exam_year,regularity) VALUES ('$roll_no', '$year', '$semester', '$exam_year', 'improve')";

                    if ($db->query($insert_r) === TRUE) {

                       $insert = "UPDATE $course_table SET regularity='improve' , appearance = '$appearance' , limitation = '$limitation' , exam_year = '$exam_year' WHERE roll_no='$roll_no'";

                        if ($db->query($insert) === TRUE) {

                            echo 'Registered..';

                        } else {

                            echo "Ragistration Failed." . $db->error;

                        }

                    } else {

                        echo "Ragistration Failed." . $db->error;

                    }


                

            }else if ($limitation == 1){

                echo "$roll_no is not permitted to register..";

            }

        }


    }




}else {
    echo 'Roll No Not Exist...';
}



?>

