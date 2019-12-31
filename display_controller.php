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
                $fname = isset($_POST['fname']) ? $_POST['fname'] : 'NOT SET';
                $lname = isset($_POST['lname']) ? $_POST['lname'] : 'NOT SET';
                $query1 =  "SELECT * FROM PHDSTUDENT
                            WHERE FName = :fname AND LName = :lname";
                $query2 =  "SELECT MId, PassDate FROM PHDSTUDENT AS P, MILESTONESPASSED AS MP
                            WHERE P.FName = :fname AND P.LName = :lname AND P.StudentId = MP.StudentId";
                
                //query 1
                $stmt = $conn->prepare($query1);
                $stmt->bindParam(':fname',$fname,PDO::PARAM_STR);
                $stmt->bindParam(':lname',$lname,PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $total = $stmt->rowCount();
                if($total == 0) {
                    echo "No records with provided Details";
                    die();
                }
                foreach($rows as $row) {
                    echo "StudentID: ". "\t" . $row['StudentId']; echo '</br>';
                    echo "First Name:". "\t" . $row['FName']; echo '</br>';
                    echo "Last Name: ". "\t" . $row['LName']; echo '</br>';
                    echo "Start Sem: ". "\t" . $row['StSem']; echo '</br>';
                    echo "Start Year:". "\t" . $row['StYear']; echo '</br>';
                    echo "Supervisor:". "\t" . $row['Supervisor']; echo '</br> </br>';
                }
                
                echo '</br> </br>';
                echo '<table>';
                //query 2
                $stmt2 = $conn->prepare($query2);
                $stmt2->bindParam(':fname',$fname,PDO::PARAM_STR);
                $stmt2->bindParam(':lname',$lname,PDO::PARAM_STR);
                $stmt2->execute();
                $milestones = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $total = $stmt2->rowCount();
                if($total == 0) {
                    echo "No Milestones passed" . '</br>';
                    die();
                }
                echo '<tr> <td> MId </td> <td> PassDate </td> </tr>' ;
                foreach($milestones as $m) {
                    echo '<tr> <td>', $m['MId'] , '</td> <td>', $m['PassDate'] , '</td></tr>';
                }
                echo '</table>';
            }
            $conn = null;
        ?>
        </div>
    </body>
</html>