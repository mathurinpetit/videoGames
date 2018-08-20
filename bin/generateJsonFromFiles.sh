#!/bin/bash
echo " \"dictionnaire\" : ["
ls -l $1 | sed -r 's|(.+)([0-9]{2}:[0-9]{2})(.+)|\3|' | sed -r 's|\ (.+)\.mp4|{"word" : "\1" , "id" : "\1"},|'
echo "],"
echo "\"scenario\": ["
ls -l $1 | sed -r 's|(.+)([0-9]{2}:[0-9]{2})(.+)|\3|' | sed -r 's|\ (.+)\.mp4|{ "id" : "\1"},|'
echo "]"
