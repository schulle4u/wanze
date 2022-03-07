#!/usr/bin/liquidsoap

# Inspired by https://technic2radio.fr/tuto-raspberry-pi-liquidsoap-icecast/

# Logging
set("log.file",true) 
set("log.stdout",true)
set("log.level",2) # Increase for more exhaustive logging

# Input samplerate
set("frame.audio.samplerate",44100)

# We define our input, change to your desired sound device
stream = input.alsa(device="plughw:1,0")

# Amplify the input
# stream = amplify(2.0, stream)

# Sound processing, uncomment what you like
# stream = sky(stream)
# stream = compress(stream, attack = 5.0, gain = 8.0, knee = 10.0, ratio = 5.0, release = 100.0, threshold = -18.0, rms_window = 0.7)
# stream = normalize(stream, target = -1.0, threshold = -65.0)
# stream = limit(stream, threshold = -0.2, attack = 2.0, release = 25.0, rms_window = 0.02)

# The following might help to remove low-frequency noise from cheap devices
# stream = filter.iir.butterworth.high(stream, frequency = 40.0, order = 4)

# Define an Icecast-Output, insert your streaming details below
output.icecast(
    %mp3.cbr(bitrate=192, samplerate=44100, ),
    host="",
    port=8000,
    password="",
    mount="radio",
    url="https://www.example.com",
    name="Stream Name",
    genre="Various",
    description="Stream description",
    public=false,
    fallible=true,
stream)
