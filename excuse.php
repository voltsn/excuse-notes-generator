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
    <link rel="stylesheet" href="./public/css/main.css">
    <title>Excuse Notes Generator</title>
</head>
<body>
    <main>
        <header class="main-header">
            <p class="main-header__logo">Excuse Notes Generator</p>
        </header>
        <section class="container">
            <h1 class="main-heading"> Please fill-in the form below.</h1>

            <form class="excuse-form" method="get" action="./excuse.php">

                <label class="excuse-form__label" for="name">Your child's name:</label>
                <input type="text" class="excuse-form__text-input" name="name" id="name" required>
    
                <fieldset class="excuse-form__fieldset">
                    <legend>Your child's gender</legend>
    
                    <label class="excuse-form__label" for="f">F</label>
                    <input type="radio" name="gender" id="f" value="F" required>
    
                    <label class="form-label" for="m">M</label>
                    <input type="radio" name="gender" id="m" value="M">
                </fieldset>
    
                <label class="excuse-form__label" for="teacher">The teacher's name:</label>
                <input type="text" class="text-input" name="teacher" id="teacher" required>
    
                <fieldset class="excuse-form__fieldset">
                    <legend>Reason for the absence</legend>
    
                    <label class="excuse-form__label" for="illness">Illnes</label>
                    <input type="radio" name="absence" id="illness" value="illness" required>
    
                    <label class="excuse-form__label" for="death">Death of a pet (or a family member)</label>
                    <input type="radio" name="absence" id="death" value="death">
    
                    <label class="excuse-form__label" for="extra">Significant extra-curricular activity</label>
                    <input type="radio" name="absence" id="extra" value="extra">
    
                    <label class="excuse-form__label" for="other">Public transportation</label>
                    <input type="radio" name="absence" id="other" value="transportation">
                </fieldset>
    
                <input type="submit" class="excuse-form__submit-btn" name="submit" value="Submit">
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