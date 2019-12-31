<!--
    Pranav Bhandari
    Rhea Pottathuparambil
-->
 
<html>
    <body>
        <div align="center">
        <?php 
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "doctoral";
            //create connection
            $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
            //check connection
            if(!$conn) {
                die("Connection Failed!");
            }
            else {
                $studentid = isset($_POST['sid']) ? $_POST['sid'] : '';
                $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
                $lname = isset($_POST['lname']) ? $_POST['lname'] : '';

                $query1 =   "DELETE FROM SELFSUPPORT
                            WHERE StudentId = '$studentid' " ;
                
                $query2 =   "DELETE FROM PHDSTUDENT
                            WHERE FName = '$fname' AND LName = '$lname' AND StudentId = '$studentid' " ;
                
                if($conn->query($query1)) {
                    if($conn->query($query2))
                    echo "Record Deleted successfully.";
                }
                else {
                    echo "Error:" . $del . " " . $conn->error;
                }
            }
            $conn = null;
        ?>
        </div>
    </body>
</html>