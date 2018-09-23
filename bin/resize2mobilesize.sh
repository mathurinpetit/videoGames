#!/bin/bash

cd $1
mkdir mobile;
for path in *.mp4 ; do
  name=`echo $path `;
  ffmpeg -i $name -vf scale="300:-2" -vcodec libx264 -y -an "mobile/"$name
done
