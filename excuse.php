<?php
    $excuses = Array(
        "illness" => "My -son/daughter-, will not be attending class today due health reasons. Our family doctor recommended that -name- took a day off.",
        "death" => "Recently, we lost Felix, -name-'s cousin. The funeral is planned for tommorrow, for this reason our -son/daughter-, wont be attending school tommorrow.",
        "extra" => "Tommorrow is the championship game of -name-'s football team. our -son/daugther- trained very hard for this event, therefore -name- wont be able to attend school tommorrow.",
        "transportation" => "Due to some issues with the rail way, -name- will not be able to attend class.",
    );


    // Form processing
    $excuse =  NULL;
    $greeting = Null;
    $closing_msg = NULL;
    if (isset($_GET["name"]) and isset($_GET["teacher"]) and isset($_GET["gender"]) and isset($_GET["absence"])){
        $child = $_GET["name"];
        $gender = ($_GET["gender"] == "F" ? "daughter" : "son");
        
        $excuse = $excuses[$_GET["absence"]];
        $excuse = str_replace("-name-", $child, $excuse);
        $excuse = str_replace("-son/daughter-", $gender, $excuse);
        
        $greeting = "Dear, $_GET[teacher]";
        $closing_msg = "Best regards, $child's parents";
    }
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
    
                    <label for="other">Public transportation</label>
                    <input type="radio" name="absence" id="other" value="transportation">
                </fieldset>
    
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>
        <?php 
            if ($excuse) {
                echo "
                        <div>
                            <p> $greeting </p>
                            <p> $excuse </p>
                            <p> $closing_msg </p>
                        </div>
                     ";
            }
        
        ?>
    </main>
</body>
</html>