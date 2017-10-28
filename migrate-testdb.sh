#!/bin/bash

docker-compose exec web1-phpfpm php artisan migrate:refresh --database=mysqltest