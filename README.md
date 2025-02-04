# PHP Router Benchmarks

[![Software License][ico-license]](LICENSE)
[![Gitter][ico-gitter]][link-gitter]

## Table of Contents

* [Introduction](#introduction)
* [Results](#results)
* [Install](#install)
* [Usage](#usage)
* [Contributing](#contributing)
* [Support](#support)
* [Credits](#credits)
* [License](#license)

## Introduction

... add a good introduction here

## Results

The benchmark results can be found in the result folder as readme.md files.

## Install

You can simply download or clone this repository.
* Requires Docker and Docker Compose to run

## Usage

### Usage with Docker

As a prerequisite, [Docker Compose](https://www.docker.com/products/docker-compose) and at least Docker
17.06 CE has to be installed on your machine in order to use this benchmark method.

```bash
sh benchmark.sh run
```

to execute the measurements.

The output will be generated in the "result" directory.

### Usage from the browser

You can even run tests manually from your browser. When the benchmark's Docker containers are running, just visit
`http://localhost`. For further information, refer to the URL in question, it provides you with detailed instructions.

## Support

Please see [SUPPORT](SUPPORT.md) for details.

## Credits

Huge tanks to [Máté Kocsis][link-author] for inspiration for this project and with a lot of code.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-gitter]: https://img.shields.io/packagist/dt/rammewerk/router


