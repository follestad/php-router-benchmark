# Router Benchmark Tests

This benchmark suite evaluates the performance of various PHP router packages by testing their initialization, route 
registration, and dispatching efficiency under different conditions. The tests simulate real-world scenarios, 
measuring execution time and memory consumption.

## How the Benchmark Works

1. **Test Execution**  
   - Each router is tested across multiple predefined scenarios.  
   - Tests include both static and dynamic routes, with and without wildcards.  

2. **Performance Measurement**  
   - Each test is executed **20 times per router** to ensure consistent results.  
   - The **median execution time** is used to reduce the impact of outliers.  
   - Peak memory usage is recorded during execution.  

3. **Results and Ranking**  
   - The fastest router is ranked **#1** based on median execution time.  
   - A percentage comparison shows how each router performs relative to the fastest one.  
   - Memory usage is also measured and ranked.

## Test Structure

Each test follows a structured process:

- **Router Initialization** – The router is initialized before each test.  
- **Route Registration** – A predefined set of routes is registered.  
- **Request Dispatching** – The router processes test requests and returns responses.  
- **Result Validation** – The response is compared to the expected output to ensure correctness.  

## Output Format

The benchmark results are presented in a table with the following columns:

| Rank | Router | Time (ms) | Time (%) | Peak Memory (MB) | Memory (%) |
|------|--------|----------|---------|-----------------|-----------|
| 1    | FastRouter | 10.2  | 100%   | 1.2         | 100%     |
| 2    | AnotherRouter | 12.5 | 122% | 1.4         | 116%     |

- **Time (%)** compares execution time to the fastest router.  
- **Memory (%)** compares peak memory usage.  

## Why This Matters

Efficient routing is essential for high-performance web applications. By running standardized tests across different 
routers and using the median execution time, this benchmark provides a clear and objective comparison of their efficiency.

## Ease of Use & Implementation  

While these benchmarks highlight the performance of each tested router, another crucial factor is **how easy they are 
to use in a project**. If you check the **`src/Routers`** directory, you’ll find the adapter files that show how each 
router is set up. The complexity of implementation varies significantly—some routers require minimal setup, while 
others need more configuration to get started. Additionally, some routers include extra features that are **not 
covered in this benchmark** but may be valuable depending on your needs. Be sure to explore these details when 
choosing a router!
## Packages

| Name | Package | Version |
|-----------|-------------|-----------|
| Laravel | [illuminate/routing](https://github.com/illuminate/routing) | v11.41.3 |
| Rammewerk | [rammewerk/router](https://github.com/rammewerk/router) | 0.9.82 |
| Bramus | [bramus/router](https://github.com/bramus/router) | 1.6.1 |
| AltoRouter | [altorouter/altorouter](https://github.com/dannyvankooten/AltoRouter) | 2.0.3 |
| Symfony | [symfony/routing](https://symfony.com/doc/current/routing.html) | v7.2.3 |
| Klein | [klein/klein](https://github.com/klein/klein) | v2.1.2 |
| FastRoute | [nikic/fast-route](https://github.com/nikic/FastRoute) | v1.3.0 |
| PHRoute | [phroute/phroute](https://github.com/mrjgreen/phroute) | v2.2.0 |
| Nette | [nette/routing](https://github.com/nette/routing) | v3.1.1 |
| Sharkk | [sharkk/router](https://git.sharkk.net/PHP/Router) | dev-master |
| Jaunt | [davenusbaum/jaunt](https://github.com/davenusbaum/jaunt) | v0.0.1 |


## Benchmark Results

These tests was run **2025-02-05 12:36:59** on PHP version: **8.4.3**



### Router Initialization Performance Test 

This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.

`Test Suite #1:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.026 | 100% | 0.347 | 100% |
| 2 | **Jaunt** | 0.039 | 150% | 0.347 | 100% |
| 3 | **PHRoute** | 0.07 | 269% | 0.347 | 100% |
| 4 | **Bramus** | 0.091 | 350% | 0.347 | 100% |
| 5 | **AltoRouter** | 0.096 | 369% | 0.346 | 100% |
| 6 | **Rammewerk Router** | 0.111 | 427% | 0.347 | 100% |
| 7 | **FastRoute** | 0.163 | 627% | 0.354 | 102% |
| 8 | **Symfony Router** | 0.298 | 1146% | 0.347 | 100% |
| 9 | **Nette** | 4.053 | 15588% | 0.357 | 103% |
| 10 | **Klein** | 5.422 | 20854% | 0.356 | 103% |
| 11 | **Laravel** | 7.016 | 26985% | 3.579 | 1032% |


### Router Initialization and Route Registration Performance Test 

This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.

`Test Suite #2:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.139 | 100% | 0.41 | 100% |
| 2 | **Bramus** | 0.329 | 237% | 0.424 | 104% |
| 3 | **FastRoute** | 0.913 | 657% | 0.409 | 100% |
| 4 | **Sharkk** | 1.05 | 755% | 0.445 | 109% |
| 5 | **PHRoute** | 1.149 | 827% | 0.439 | 107% |
| 6 | **Jaunt** | 1.216 | 875% | 0.467 | 114% |
| 7 | **Symfony Router** | 1.279 | 920% | 0.463 | 113% |
| 8 | **Rammewerk Router** | 1.437 | 1034% | 0.446 | 109% |
| 9 | **Klein** | 1.644 | 1183% | 0.44 | 108% |
| 10 | **Nette** | 2.12 | 1525% | 0.477 | 117% |
| 11 | **Laravel** | 3.928 | 2826% | 3.243 | 792% |


### Router Dispatch Performance Test (Static Routes) 

This test measures how efficiently the router initializes, registers, and dispatches routes. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. However, **only a single predefined route is 
dispatched**, and this same route is used for all routers to ensure consistent results. The benchmark reflects the time 
taken for the **entire process**, including initializing the router, registering all routes, and dispatching 
**one specific route**.

`Test Suite #3:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.016 | 100% | 0.472 | 100% |
| 2 | **Bramus** | 0.032 | 200% | 0.497 | 105% |
| 3 | **FastRoute** | 0.054 | 338% | 0.465 | 99% |
| 4 | **Sharkk** | 0.056 | 350% | 0.553 | 117% |
| 5 | **Jaunt** | 0.066 | 413% | 0.595 | 126% |
| 6 | **PHRoute** | 0.073 | 456% | 0.527 | 112% |
| 7 | **Symfony Router** | 0.091 | 569% | 0.535 | 113% |
| 8 | **Rammewerk Router** | 0.094 | 588% | 0.542 | 115% |
| 9 | **Nette** | 0.143 | 894% | 0.599 | 127% |
| 10 | **Klein** | 0.178 | 1113% | 0.513 | 108% |
| 11 | **Laravel** | 0.415 | 2594% | 0.591 | 125% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test is similar to **test suite 3**, but it features a path with **one dynamic segments**. The test registers multiple routes, 
but only dispatches **a single dynamic route** across all routers to ensure consistency. This setup helps gauge how well 
routers handle dynamic parameters during dispatch.

`Test Suite #9:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Bramus** | 0.044 | 100% | 0.499 | 100% |
| 2 | **AltoRouter** | 0.06 | 136% | 0.4 | 80% |
| 3 | **Sharkk** | 0.074 | 168% | 0.51 | 102% |
| 4 | **Jaunt** | 0.089 | 202% | 0.554 | 111% |
| 5 | **Rammewerk Router** | 0.095 | 216% | 0.49 | 98% |
| 6 | **FastRoute** | 0.138 | 314% | 0.487 | 98% |
| 7 | **Klein** | 0.182 | 414% | 0.478 | 96% |
| 8 | **Symfony Router** | 0.204 | 464% | 0.525 | 105% |
| 9 | **Nette** | 0.269 | 611% | 0.615 | 123% |
| 10 | **PHRoute** | 0.29 | 659% | 0.547 | 110% |
| 11 | **Laravel** | 0.607 | 1380% | 0.577 | 116% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.

`Test Suite #4:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.054 | 100% | 0.419 | 100% |
| 2 | **Jaunt** | 0.075 | 139% | 0.442 | 105% |
| 3 | **Rammewerk Router** | 0.083 | 154% | 0.414 | 99% |
| 4 | **Bramus** | 0.283 | 524% | 0.425 | 101% |
| 5 | **Symfony Router** | 0.373 | 691% | 0.468 | 111% |
| 6 | **FastRoute** | 0.433 | 802% | 0.436 | 104% |
| 7 | **PHRoute** | 0.629 | 1165% | 0.448 | 107% |
| 8 | **AltoRouter** | 0.796 | 1474% | 0.374 | 89% |
| 9 | **Nette** | 0.877 | 1624% | 0.485 | 116% |
| 10 | **Klein** | 1.785 | 3306% | 0.443 | 105% |
| 11 | **Laravel** | 2.607 | 4828% | 0.529 | 126% |


### Router Repeated Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**50 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.

`Test Suite #5:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 2.194 | 100% | 0.56 | 100% |
| 2 | **Jaunt** | 4.205 | 192% | 0.608 | 108% |
| 3 | **Rammewerk Router** | 4.359 | 199% | 0.521 | 93% |
| 4 | **Symfony Router** | 27.259 | 1242% | 0.65 | 116% |
| 5 | **Bramus** | 45.241 | 2062% | 0.503 | 90% |
| 6 | **FastRoute** | 61.55 | 2805% | 0.53 | 95% |
| 7 | **PHRoute** | 86.215 | 3930% | 0.556 | 99% |
| 8 | **Nette** | 115.708 | 5274% | 0.667 | 119% |
| 9 | **AltoRouter** | 207.779 | 9470% | 0.403 | 72% |
| 10 | **Laravel** | 217.4 | 9909% | 0.781 | 139% |
| 11 | **Klein** | 815.596 | 37174% | 2.384 | 425% |


### Router High-Load Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**200 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.

`Test Suite #6:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 9.153 | 100% | 0.572 | 100% |
| 2 | **Rammewerk Router** | 17.681 | 193% | 0.538 | 94% |
| 3 | **Jaunt** | 18.973 | 207% | 0.619 | 108% |
| 4 | **Symfony Router** | 96.964 | 1059% | 0.654 | 114% |
| 5 | **Bramus** | 184.247 | 2013% | 0.505 | 88% |
| 6 | **FastRoute** | 292.94 | 3200% | 0.533 | 93% |
| 7 | **PHRoute** | 376.227 | 4110% | 0.557 | 97% |
| 8 | **Nette** | 570.937 | 6238% | 0.669 | 117% |
| 9 | **AltoRouter** | 857.782 | 9372% | 0.404 | 71% |
| 10 | **Laravel** | 871.901 | 9526% | 0.786 | 138% |
| 11 | **Klein** | N/A | N/A | N/A | N/A |


### Router Large-Scale Route Handling Performance Test 

This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.

`Test Suite #7:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 1.977 | 100% | 3.675 | 100% |
| 2 | **Rammewerk Router** | 2.675 | 135% | 3.075 | 84% |
| 3 | **Jaunt** | 2.823 | 143% | 4.372 | 119% |
| 4 | **Symfony Router** | 131.148 | 6634% | 4.772 | 130% |
| 5 | **Bramus** | 234.448 | 11859% | 2.644 | 72% |
| 6 | **FastRoute** | 327.376 | 16559% | 2.99 | 81% |
| 7 | **PHRoute** | 422.9 | 21391% | 3.367 | 92% |
| 8 | **Laravel** | 501.73 | 25378% | 6.48 | 176% |
| 9 | **Nette** | 629.895 | 31861% | 5.033 | 137% |
| 10 | **AltoRouter** | 1081.887 | 54724% | 1.177 | 32% |
| 11 | **Klein** | 1156.678 | 58507% | 2.791 | 76% |


### Router Class-Based Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.

`Test Suite #8:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 9.105 | 100% | 0.586 | 100% |
| 2 | **Jaunt** | 20.471 | 225% | 0.63 | 107% |
| 3 | **Rammewerk Router** | 25.671 | 282% | 0.896 | 153% |
| 4 | **Symfony Router** | 123.89 | 1361% | 0.674 | 115% |
| 5 | **Bramus** | 209.907 | 2305% | 0.438 | 75% |
| 6 | **FastRoute** | 291.371 | 3200% | 0.552 | 94% |
| 7 | **PHRoute** | 378.437 | 4156% | 0.577 | 99% |
| 8 | **Nette** | 566.517 | 6222% | 0.703 | 120% |
| 9 | **Laravel** | 811.709 | 8915% | 0.8 | 137% |
| 10 | **AltoRouter** | 905.135 | 9941% | 0.424 | 72% |
| 11 | **Klein** | N/A | N/A | N/A | N/A |
## How to Run Benchmarks

### 1. Prerequisites
Make sure you have the following installed:
- **Docker**
- **Docker Compose**

### 2. Clone the Repository
Clone or download this repository to your local machine:
```bash
git clone https://github.com/follestad/php-router-benchmark.git
cd php-router-benchmark
```

### 3. Start the Benchmark Environment
Use **Docker Compose** to start the PHP-FPM container:
```bash
docker compose up -d
```
This will set up the environment needed for testing. You can check public/index.php for details on how the benchmark 
runs or visit http://localhost for additional instructions.

### 4. Install or Update Dependencies
Before running the benchmark, install or update dependencies:
```bash
sh benchmark.sh composer install  # For first-time setup
sh benchmark.sh composer update   # To update dependencies
sh benchmark.sh composer require .../...   # To add new packages
```
### 5. Run the Benchmark
Execute the following command to run the benchmark:
```bash
sh benchmark.sh run
```
### 6. Viewing Results
After running the benchmark, results will be **saved to /result/README.md**.
If the benchmark completes successfully, you can copy this file to replace the main README.
This will update the project documentation with the latest benchmark results.

## Understanding Router Implementations
If you’re curious about how different routers are implemented, check out the `src/Routers` directory.
Some routers require minimal setup, while others need more extensive configuration. For example:
- **Rammewerk** Router has a compact and simple setup.
- **Symfony and Laravel** require more extensive configuration.
- **Bramus** Router needed additional adjustments to properly validate results, see `src/TestCode/...` files for examples.

Exploring these implementations can give you insight into the trade-offs between simplicity and flexibility in different routing solutions

## Contributing & Disclaimer
Want to contribute? Feel free to fork the repository, add new router packages, or improve existing implementations 
by submitting a pull request!

You can find each package’s implementation under the `src/Routers` directory. Keep in mind that the test setups are
based on official documentation and guides, but they may not always represent the absolute best or most optimized 
configuration for every router. Some routers required small adjustments to fit the test structure, but these should 
have minimal impact on performance.

Additionally, some routers offer caching or compilation features to improve speed, but these haven’t been tested 
yet—hopefully, a future test will cover this!


## Credits
- [Kristoffer Follestad](https://github.com/follestad)
- [Máté Kocsis](https://github.com/kocsismate)

A huge thanks to [Máté Kocsis](https://github.com/kocsismate) for the inspiration behind this project. Many parts of 
the implementation are based on his excellent work in [php-di-container-benchmarks](https://github.com/kocsismate/php-di-container-benchmarks).
