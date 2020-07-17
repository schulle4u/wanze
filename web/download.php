<?php
// Stream Download script
// A part of the outside microphones project
// Copyright (C) 2020 by Steffen Schultz, https://github.com/schulle4u

// Configuration
// The root URL for your stream rips, leave default for current directory
$mediaBase = "/";

// a comma separated list of stream names, leave blank to get an input box instead
$streamList = "";

// Date and time format  to prefill the values
$dateFormat = date("m-d");
$timeFormat = date("H")."-00";
?>
<html>
<head>
<title>Stream Download</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="_blank">
<?php
if (empty($streamList)) {
    echo "Stream: <input name=\"stream\" type=\"text\"><br />";
} else {
    echo "Stream: ";
    echo "<select name=\"stream\">";
    $streams = array_map("trim", explode(",", $streamList));
    foreach ($streams as $stream) {
        echo "<option value =\"".$stream."\">".ucfirst($stream)."</option>";
    }
    echo "</select><br />";
}
?>
Date: <input name="date" type="text" value="<?php echo $dateFormat; ?>"><br />
Time: <input name="time" type="text" value="<?php echo $timeFormat; ?>"><br />
<input name="download" type="submit" value="Download">
<?php
if(isset($_POST['download'])) {
    $stream = $_POST['stream'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    if($stream !='' && $date != '' && $time != '') {
        header("Location:{$mediaBase}{$stream}-{$date}_{$time}.mp3");
    } else {
        echo "Please fill all fields!";
    }
}
?>
</form>
</body>
</html>