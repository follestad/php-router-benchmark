#!/usr/bin/env bash
set -e

PROJECT_ROOT=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

if [[ "$1" == "composer" ]]; then

    # Make sure a composer subcommand is provided
    if [[ -z "$2" ]]; then
        echo 'Please provide a composer subcommand (e.g., "require") as the second argument'
        exit 1
    fi

    # Run the composer command with additional arguments
    shift # Remove the "composer" argument
    docker run --rm --interactive --tty \
        --volume $PROJECT_ROOT:/code \
        --user $(id -u):$(id -g) \
        composer "$@" --prefer-dist --no-interaction --working-dir=/code --ignore-platform-reqs

    docker run --rm --interactive --tty \
              --volume $PROJECT_ROOT:/code \
              --user $(id -u):$(id -g) \
              composer dump-autoload --classmap-authoritative --no-interaction --working-dir=/code


elif [[ "$1" == "run" ]]; then

      # Install composer dependencies
      docker run --rm --interactive --tty \
          --volume $PROJECT_ROOT:/code \
          --user $(id -u):$(id -g) \
          composer install --prefer-dist --no-interaction --working-dir=/code --ignore-platform-reqs

      # Dump autoloader
      docker run --rm --interactive --tty \
          --volume $PROJECT_ROOT:/code \
          --user $(id -u):$(id -g) \
          composer dump-autoload --classmap-authoritative --no-interaction --working-dir=/code

      # Run the benchmark
      docker compose up --build -d

      docker compose run --rm benchmark-cli php core/benchmark.php

else

    echo 'Available options: "composer"'
    exit 1

fi
