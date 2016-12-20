#!/bin/bash

SYSTEM="$(uname)"
CURUSER="$(whoami)"
CURGROUP="$(id -g -n ${CURUSER})"


BASE="$(pwd)"

if [ ${SYSTEM} = 'Darwin' ]; then
        HTTPDOWNER="daemon"
        OWNER=${CURUSER}
        GROUPOWNER=${CURGROUP}
elif [ ${SYSTEM} = 'Linux' ]; then
        HTTPDOWNER="www-data"
        OWNER=${CURUSER}
        GROUPOWNER=${CURGROUP}
else
    echo "Unable to determine system type: $SYSTEM"
        exit -1
fi

echo "Owner: " ${OWNER}
echo "Group: " ${GROUPOWNER}
echo "httpd: " ${HTTPDOWNER}

sudo chown -R ${OWNER} ${BASE}
sudo chgrp -R ${GROUPOWNER} ${BASE}

sudo find ${BASE} -type d -exec chmod 2775 {} \;
sudo find ${BASE} -type f -exec chmod 0664 {} \;

sudo chown -R ${HTTPDOWNER} ${BASE}/cache

sudo chmod 777 ${BASE}/cache
sudo chmod 777 ${BASE}/logs

sudo chmod 775 ${BASE}/bin/*
sudo chmod 755 ${BASE}/composer.phar

