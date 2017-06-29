#!/usr/bin/env bash

export DEVELOPMENT_HOST=li223-172.members.linode.com
export PLUGIN_DIRECTORY=/usr/local/cpanel/base/frontend/paper_lantern/synaq_cpanel_hello
export PLUGIN_ARCHIVE=synaq_cpanel_hello.tar.gz

echo Building backend code PHAR distribution
scripts/docker/run-phar-build.sh || exit 1

echo Creating plugin archive
tar -zcvf dist/${PLUGIN_ARCHIVE} boilerplate/*

echo Creating plugin directory on development host ${DEVELOPMENT_HOST}
ssh root@${DEVELOPMENT_HOST} mkdir -p ${PLUGIN_DIRECTORY}

echo Copying distribution and interface files to development host
scp dist/* root@${DEVELOPMENT_HOST}:${PLUGIN_DIRECTORY}/
scp frontend/* root@${DEVELOPMENT_HOST}:${PLUGIN_DIRECTORY}/

echo Installing Plugin
ssh root@${DEVELOPMENT_HOST} /usr/local/cpanel/scripts/install_plugin ${PLUGIN_DIRECTORY}/${PLUGIN_ARCHIVE}

echo Done