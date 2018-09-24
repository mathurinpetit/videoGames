#!/bin/bash

cd $1
mkdir mobile;
for path in *.mp4 ; do
  name=`echo $path `;
  ffmpeg -i $name -vf scale="300:-2" -c:v libx264 -preset veryslow -profile:v main -crf 18 -c:a copy "mobile/"$name
done
