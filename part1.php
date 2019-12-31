<!--
    Pranav Bhandari
    Rhea Pottathuparambil
-->

<html>
    <head>
        <title> Display Details of a PhD Student</title>
    </head>
    <body>
        <div align="center">
        <form action="insert_controller.php" method="POST">
            <fieldset>
                <legend> Enter Details  to add a Self-Support Student</legend>
                    <label id ="studentidlabel" for="sid"> Student ID: </label>
                    <input type="text" name="sid"  /> <br/> <br/>

                    <label id ="fnamelabel" for="fname"> First Name: </label>
                    <input type="text" name="fname"  /> <br/> <br/>

                    <label id ="lnamelabel" for="lname"> Last  Name: </label>
                    <input type="text" name="lname"  /> <br/> <br/>

                    <label id ="stsemlabel" for="stsem"> Start Sem: </label>
                    <input type="text" name="stsem"  /> <br/> <br/>

                    <label id ="styearlabel" for="styear"> Start Year: </label>
                    <input type="text" name="styear"  /> <br/> <br/>

                    <label id ="supervisorlabel" for="supervisor"> Supervisor: </label>
                    <input type="text" name="supervisor"  /> <br/> <br/>

                    <input id="button" type="submit" name="submit" />
            </fieldset> 
        </form>
        </div>
    </body>
</html>