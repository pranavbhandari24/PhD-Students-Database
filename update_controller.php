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
                $instructorid = isset($_POST['iid']) ? $_POST['iid'] : '';
                $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
                $lname = isset($_POST['lname']) ? $_POST['lname'] : '';

                $query =   "UPDATE instructor SET Type = 'NTT'
                            WHERE InstructorId = ':inst' AND FName = ':fname' AND LName = ':lname' AND InstructorID IN ( SELECT InstructorID
                                                                                                                                FROM instructor
                                                                                                                                WHERE Type = 'Adjunct')"; 
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':inst',$instructorid,PDO::PARAM_STR);
                $stmt->bindParam(':fname',$fname,PDO::PARAM_STR);
                $stmt->bindParam(':lname',$lname,PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0) {
                    echo "Updated Records successfully.";
                }
                else if($stmt->rowCount() == 0) {
                    echo "No such Records to update.";
                }
                else {
                    echo "Error:" . $query;
                }
            }
            $conn = null;
        ?>
        </div>
    </body>
</html>