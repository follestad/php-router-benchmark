#!/bin/sh
set -e

cp /app/docker/cli/php.ini /usr/local/etc/php/conf.d/zz-custom-php.ini

#/code/bin/benchmark
#docker-compose run --rm cli php benchmark.php --suite=default --description='{"RouterA_cold": "Cold start for Router A", "RouterA_warm": "Warm start for Router A", "RouterA_hot": "Hot start for Router A", "RouterB_cold": "Cold start for Router B", "RouterB_warm": "Warm start for Router B", "RouterB_hot": "Hot start for Router B"}'