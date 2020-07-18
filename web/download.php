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
<!DOCTYPE html>
<html>
<head>
<title>Stream Download</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="content">
<h1>Stream Download</h1>
<p class="notes">Please select the desired file from the form below and press the download button.</p>
<div class="download">
<form name="download" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="_blank">
<?php
if (empty($streamList)) {
    echo "<p><label for=\"stream\">Stream:</label><br /><input id=\"stream\" name=\"stream\" type=\"text\" /></p>";
} else {
    echo "<p><label for=\"stream\">Stream:</label><br />";
    echo "<select id=\"stream\" name=\"stream\">";
    $streams = array_map("trim", explode(",", $streamList));
    foreach ($streams as $stream) {
        echo "<option value =\"".$stream."\">".ucfirst($stream)."</option>";
    }
    echo "</select></p>";
}
?>
<p><label for="date">Date:</label><br /><input id="date" name="date" type="text" value="<?php echo $dateFormat; ?>" /></p>
<p><label for="time">Time:</label><br /><input id="time" name="time" type="text" value="<?php echo $timeFormat; ?>" /></p>
<input name="download" type="submit" value="Download" />
<?php
if(isset($_POST['download'])) {
    $stream = $_POST['stream'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    if($stream !='' && $date != '' && $time != '') {
        header("Location:{$mediaBase}{$stream}-{$date}_{$time}.mp3");
        exit;
    } else {
        echo "<p class=\"error\">Please fill all fields!</p>";
    }
}
?>
</form>
</div>
<div class="footer">
<hr>
<p>Created by Steffen Schultz. <a href="https://github.com/schulle4u/wanze">View on GitHub</a>.</p>
</div>
</div>
</body>
</html>