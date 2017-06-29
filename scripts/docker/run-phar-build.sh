#!/usr/bin/env bash

docker run --rm -it -v $PWD:/opt/project synaq/cpanel-php:latest composer build