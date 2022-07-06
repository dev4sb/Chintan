<html>
    <head></head>

    <body>
        <form method="post">
            <input type="checkbox" value="sports" name="hobbies[]" />sports
            <input type="checkbox" value="music" name="hobbies[]" />Music
            <input type="checkbox" value="movie" name="hobbies[]" />Movies
            <input type="checkbox" value="coding" name="hobbies[]" />Coding
            <input type="submit" value="add" />
        </form>
    </body>
</html>

<?php
    $array = $_POST["hobbies"];
    $hob = implode(",", $array);
    echo $hob;

?>