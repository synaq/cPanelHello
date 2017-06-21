#!/bin/bash
pushd dockerContext
docker build . -t synaq/cpanel-php:latest
popd
