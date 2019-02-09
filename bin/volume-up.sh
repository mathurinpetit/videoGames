#!/bin/bash

for path in *.mp4 ; do
  ffmpeg -i "$path" -vcodec copy -af "volume=10dB" "_bis_$path" ;
  mv "_bis_$path" "$path";
done
