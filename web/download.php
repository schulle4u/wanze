<!DOCTYPE html>
<html>
<head>
<title>Stream Download</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
<header>
<h1>Stream Download</h1>
<p>Please select the desired file from the form below and press the download button.</p>
</header>
<main>
<h2>Select archive file</h2>
<form name="download" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="_blank">
<?php
require("./config.php");
if (empty($streamList)) {
    echo "<p><label for=\"stream\">Stream:</label><br /><input id=\"stream\" name=\"stream\" type=\"text\" /></p>\n";
} else {
    echo "<p><label for=\"stream\">Stream:</label><br />\n";
    echo "<select id=\"stream\" name=\"stream\">\n";
    foreach ($streamList as $name => $url) {
        echo "<option value =\"".htmlspecialchars($name)."\">".ucfirst(htmlspecialchars($name))."</option>\n";
    }
    echo "</select></p>\n";
}
?>
<p><label for="date">Date:</label><br /><input id="date" name="date" type="text" value="<?php echo htmlspecialchars($dateFormat); ?>" /></p>
<p><label for="time">Time:</label><br /><input id="time" name="time" type="text" value="<?php echo htmlspecialchars($timeFormat); ?>" /></p>
<button name="download" type="submit" value="Download">Download</button>
<?php
if(isset($_POST['download'])) {
    $stream = $_POST['stream'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    if($stream !='' && $date != '' && $time != '') {
        header("Location:{$mediaBase}{$stream}-{$date}_{$time}.mp3");
        exit;
    } else {
        echo "<p><strong>Please fill all fields!</strong></p>\n";
    }
}
?>
</form>
<?php
if ($streamList) {
    echo "<h2>Stream Monitor</h2>\n";
    foreach ($streamList as $name => $url) {
        echo "<h3>".ucfirst(htmlspecialchars($name))."</h3>\n";
        echo "<audio src=\"".htmlspecialchars($url)."\" controls=\"controls\" preload=\"none\"></audio>\n";
    }
}
?>
</main>
<footer>
<p>Created by Steffen Schultz. <a href="https://github.com/schulle4u/wanze">View on GitHub</a>.</p>
</footer>
</body>
</html>