#!/bin/bash

DIR=$(pwd)
if [ ! -d $DIR/web/vendor ]
then
    docker run -i --rm -v "$DIR/web:/app" jengweb/composer:7.1 install
else
    docker run -i --rm -v "$DIR/web:/app" jengweb/composer:7.1 update
fi
