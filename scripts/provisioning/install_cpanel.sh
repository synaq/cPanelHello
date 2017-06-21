#!/bin/bash
yum -y update
yum -y install wget

wget -O /usr/local/src/latest.sh http://httpupdate.cpanel.net/latest
chmod +x /usr/local/src/latest.sh
/usr/local/src/latest.sh --target /usr/local/src/cpanel/ --noexec
sed -i 's/check_hostname();/# check_hostname();/g' /usr/local/src/cpanel/install
cd /usr/local/src/cpanel/ && ./bootstrap --force
