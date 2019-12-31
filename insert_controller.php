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
                $stsem = isset($_POST['stsem']) ? $_POST['stsem'] : '';
                $styear = isset($_POST['styear']) ? $_POST['styear'] : '';
                $supervisor = isset($_POST['supervisor']) ? $_POST['supervisor'] : '';

                $query =    "INSERT INTO PHDSTUDENT
                             VALUES ('$studentid','$fname','$lname','$stsem','$styear','$supervisor')";
                $query2 =   "INSERT INTO SELFSUPPORT
                             VALUES ('$studentid')";
                
                if($conn->query($query)) {
                    $conn->query($query2);
                    echo "New record inserted successfully.";
                }
                else {
                    echo "Error:" . $query . " " . $conn->error;
                }
            }
            $conn = null;
        ?>
        </div>
    </body>
</html>