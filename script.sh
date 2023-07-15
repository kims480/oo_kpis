#!/bin/sh
'/opt/alt/php80/usr/bin/php' artisan schedule:run > /dev/null 2>&1
