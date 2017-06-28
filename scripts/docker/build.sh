#!/bin/bash
pushd dockerContext
cp ../composer.json ./
cp ../composer.lock ./
docker build . -t synaq/cpanel-php:latest
rm -f ./composer.*
popd
