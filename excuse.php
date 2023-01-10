<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excuse Notes Generator</title>
</head>
<body>
    <main>

        <section>
            <h1>Excuse Notes Generator</h1>
            <p> Please fill-in the form below.</p>
            <form method="get" action="./excuse.php">
                <label for="name">Your child's name:</label>
                <input type="text" name="name" id="name" required>
    
                <fieldset>
                    <legend>Your child's gender</legend>
    
                    <label for="f">F</label>
                    <input type="radio" name="gender" id="f" value="F" required>
    
                    <label for="m">M</label>
                    <input type="radio" name="gender" id="m" value="M">
                </fieldset>
    
                <label for="teacher">The teacher's name:</label>
                <input type="text" name="teacher" id="teacher" required>
    
                <fieldset>
                    <legend>Reason for the absence</legend>
    
                    <label for="illness">Illnes</label>
                    <input type="radio" name="absence" id="illness" value="illness" required>
    
                    <label for="death">Death of a pet (or a family member)</label>
                    <input type="radio" name="absence" id="death" value="death">
    
                    <label for="extra">Significant extra-curricular activity</label>
                    <input type="radio" name="absence" id="extra" value="extra">
    
                    <label for="other">Any other excuse of your choice</label>
                    <input type="radio" name="absence" id="other" value="other">
                </fieldset>
    
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>
    </main>
</body>
</html>