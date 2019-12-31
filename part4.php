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
        <form action="display_controller.php" method="POST">
            <fieldset>
                <legend> Enter Details </legend>
                    <label id ="fnamelabel" for="fname"> First Name: </label>
                    <input type="text" name="fname"  /> <br/> <br/>
                    <label id ="lnamelabel" for="lname"> Last  Name: </label>
                    <input type="text" name="lname"  /> <br/> <br/>
                    <input id="button" type="submit" name="submit" />
            </fieldset> 
        </form>
        </div>
    </body>
</html>