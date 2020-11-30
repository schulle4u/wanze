<?php
// Stream Download script
// A part of the outside microphones project
// Copyright (C) 2020 by Steffen Schultz, https://github.com/schulle4u

// Configuration
// The root URL for your stream rips, leave default for current directory
$mediaBase = "/";

// An array of stream names and URLs, leave blank to get an input box instead
$streamList = [
    //"example" => "http://example.com:8000/stream.mp3",
];

// Date and time format  to prefill the values
$dateFormat = date("m-d");
$timeFormat = date("H")."-00";
?>