# Stream download
A download page for audio stream archives.

This is a simple php script to quickly download a desired stream archive file. It has been created for a microphone input project where stream archives are created for every hour of the day. It of course can be customized for similar projects, e. g. radio show archives.  
For this script to work The audio files have to be web-accessible. You can place it into the same directory as the audio files and protect the location with a password. 

## How to configure

Open `download.php` and customize the following settings if needed. 

* `mediaBase` = the URL or location where your audio files are stored (default: `/` (current directory)).
* `streamList` = an array of stream names and URLs, useful to select predefined stream file prefixes from your archive and to enable stream monitoring. The stream name is the first part of the audio file name. Leave blank to display an input field instead.
* `dateFormat` and `timeFormat` = Represents the time-related parts of your archive file names. By default the fields are pre-filled with the current day and hour. 

## How to download an audio file

Just open `download.php` in your browser and select the desired stream, date and time. Hit the download button to get the file. Your browser probably will start to play the audio, so you might have to right-click the player controls and save the file from there. 
