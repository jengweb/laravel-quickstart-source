#!/bin/bash

DIR=$(pwd)
if [ ! -d $DIR/web/vendor ]
then
    docker run -i --rm -v "$DIR/web:/app" 3dsinteractive/composer:7.1 install
else
    docker run -i --rm -v "$DIR/web:/app" 3dsinteractive/composer:7.1 update
fi
