#!/bin/bash

for path in *.mp4 ; do
  name=`echo $path | cut -d'.' -f1`;
  ffmpeg -i $name".mp4" -c:v libvpx -crf 10 -b:v 1M -c:a libvorbis $name".webm"
done
