#!/bin/bash

# Stream archive recorder
# Requires streamripper to be installed

# Directory to store the recorded audio files
RECORDING_DIR="/var/www/html/streams"

if (( $# < 2 )); then
  echo "Syntax: record [URL file] [stream name] [time in minutes]"
  exit 1
fi

# Fetch URL
PARAM_URL="`cat ./urls/$1.txt`"
PARAM_FILE="-a $RECORDING_DIR/$2-`date +%m-%d_%H-%M`.mp3 -A"
if (( $3 > 0 )); then
  PARAM_TIME="-l $(( $3 * 60 ))"
else
  PARAM_TIME=""
fi
COMMAND="streamripper $PARAM_URL --quiet $PARAM_FILE $PARAM_TIME"

$COMMAND

