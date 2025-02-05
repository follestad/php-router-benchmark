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

These tests was run **2025-02-05 03:15:21** on PHP version: **8.4.3**



### Router Initialization Performance Test 

This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.

`Test Suite #1:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.023 | 100% | 0.347 | 100% |
| 2 | **Jaunt** | 0.034 | 148% | 0.347 | 100% |
| 3 | **PHRoute** | 0.059 | 257% | 0.347 | 100% |
| 4 | **AltoRouter** | 0.077 | 335% | 0.346 | 100% |
| 5 | **Bramus** | 0.083 | 361% | 0.347 | 100% |
| 6 | **Rammewerk Router** | 0.099 | 430% | 0.347 | 100% |
| 7 | **FastRoute** | 0.171 | 743% | 0.354 | 102% |
| 8 | **Symfony Router** | 0.262 | 1139% | 0.347 | 100% |
| 9 | **Nette** | 3.802 | 16530% | 0.357 | 103% |
| 10 | **Klein** | 5.236 | 22765% | 0.356 | 103% |
| 11 | **Laravel** | 6.514 | 28322% | 3.579 | 1032% |


### Router Initialization and Route Registration Performance Test 

This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.

`Test Suite #2:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.134 | 100% | 0.41 | 100% |
| 2 | **Bramus** | 0.299 | 223% | 0.424 | 104% |
| 3 | **FastRoute** | 0.817 | 610% | 0.409 | 100% |
| 4 | **Sharkk** | 0.912 | 681% | 0.445 | 109% |
| 5 | **PHRoute** | 1.034 | 772% | 0.439 | 107% |
| 6 | **Jaunt** | 1.058 | 790% | 0.467 | 114% |
| 7 | **Symfony Router** | 1.148 | 857% | 0.464 | 113% |
| 8 | **Rammewerk Router** | 1.353 | 1010% | 0.446 | 109% |
| 9 | **Klein** | 1.522 | 1136% | 0.44 | 108% |
| 10 | **Nette** | 1.941 | 1449% | 0.477 | 117% |
| 11 | **Laravel** | 3.702 | 2763% | 3.236 | 790% |


### Router Dispatch Performance Test (Static Routes) 

This test measures how efficiently the router initializes, registers, and dispatches routes. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. However, **only a single predefined route is 
dispatched**, and this same route is used for all routers to ensure consistent results. The benchmark reflects the time 
taken for the **entire process**, including initializing the router, registering all routes, and dispatching 
**one specific route**.

`Test Suite #3:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.01 | 100% | 0.472 | 100% |
| 2 | **Bramus** | 0.021 | 210% | 0.497 | 105% |
| 3 | **FastRoute** | 0.046 | 460% | 0.465 | 99% |
| 4 | **Sharkk** | 0.046 | 460% | 0.553 | 117% |
| 5 | **PHRoute** | 0.053 | 530% | 0.527 | 112% |
| 6 | **Jaunt** | 0.054 | 540% | 0.595 | 126% |
| 7 | **Rammewerk Router** | 0.061 | 610% | 0.542 | 115% |
| 8 | **Symfony Router** | 0.071 | 710% | 0.535 | 113% |
| 9 | **Nette** | 0.111 | 1110% | 0.599 | 127% |
| 10 | **Klein** | 0.148 | 1480% | 0.513 | 108% |
| 11 | **Laravel** | 0.287 | 2870% | 0.591 | 125% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test is similar to **test suite 3**, but it features a path with **one dynamic segments**. The test registers multiple routes, 
but only dispatches **a single dynamic route** across all routers to ensure consistency. This setup helps gauge how well 
routers handle dynamic parameters during dispatch.

`Test Suite #9:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Bramus** | 0.03 | 100% | 0.499 | 100% |
| 2 | **AltoRouter** | 0.046 | 153% | 0.4 | 80% |
| 3 | **Sharkk** | 0.056 | 187% | 0.51 | 102% |
| 4 | **Jaunt** | 0.079 | 263% | 0.554 | 111% |
| 5 | **Rammewerk Router** | 0.083 | 277% | 0.49 | 98% |
| 6 | **FastRoute** | 0.119 | 397% | 0.487 | 98% |
| 7 | **Klein** | 0.136 | 453% | 0.478 | 96% |
| 8 | **Symfony Router** | 0.158 | 527% | 0.525 | 105% |
| 9 | **Nette** | 0.181 | 603% | 0.615 | 123% |
| 10 | **PHRoute** | 0.218 | 727% | 0.547 | 110% |
| 11 | **Laravel** | 0.433 | 1443% | 0.577 | 116% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.

`Test Suite #4:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.043 | 100% | 0.419 | 100% |
| 2 | **Jaunt** | 0.062 | 144% | 0.442 | 105% |
| 3 | **Rammewerk Router** | 0.074 | 172% | 0.414 | 99% |
| 4 | **Bramus** | 0.251 | 584% | 0.425 | 101% |
| 5 | **Symfony Router** | 0.297 | 691% | 0.467 | 111% |
| 6 | **FastRoute** | 0.368 | 856% | 0.436 | 104% |
| 7 | **PHRoute** | 0.544 | 1265% | 0.448 | 107% |
| 8 | **AltoRouter** | 0.682 | 1586% | 0.374 | 89% |
| 9 | **Nette** | 0.729 | 1695% | 0.485 | 116% |
| 10 | **Klein** | 1.534 | 3567% | 0.443 | 105% |
| 11 | **Laravel** | 2.322 | 5400% | 0.529 | 126% |


### Router Repeated Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**100 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.

`Test Suite #5:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 3.85 | 100% | 0.56 | 100% |
| 2 | **Jaunt** | 7.972 | 207% | 0.608 | 108% |
| 3 | **Rammewerk Router** | 8.14 | 211% | 0.521 | 93% |
| 4 | **Symfony Router** | 47.428 | 1232% | 0.65 | 116% |
| 5 | **Bramus** | 89.208 | 2317% | 0.503 | 90% |
| 6 | **FastRoute** | 122.437 | 3180% | 0.53 | 95% |
| 7 | **PHRoute** | 170.327 | 4424% | 0.556 | 99% |
| 8 | **Nette** | 234.3 | 6086% | 0.667 | 119% |
| 9 | **AltoRouter** | 406.93 | 10570% | 0.403 | 72% |
| 10 | **Laravel** | 418.737 | 10876% | 0.781 | 139% |
| 11 | **Klein** | 3353.607 | 87107% | 4.285 | 765% |


### Router High-Load Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**500 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.

`Test Suite #6:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 20.622 | 100% | 0.572 | 100% |
| 2 | **Jaunt** | 42.243 | 205% | 0.619 | 108% |
| 3 | **Rammewerk Router** | 44.504 | 216% | 0.538 | 94% |
| 4 | **Symfony Router** | 240.213 | 1165% | 0.654 | 114% |
| 5 | **Bramus** | 464.393 | 2252% | 0.505 | 88% |
| 6 | **FastRoute** | 628.231 | 3046% | 0.533 | 93% |
| 7 | **PHRoute** | 871.643 | 4227% | 0.557 | 97% |
| 8 | **Nette** | 1181.6 | 5730% | 0.669 | 117% |
| 9 | **AltoRouter** | 2130.603 | 10332% | 0.404 | 71% |
| 10 | **Laravel** | 2204.276 | 10689% | 0.786 | 138% |
| 11 | **Klein** | N/A | N/A | N/A | N/A |


### Router Large-Scale Route Handling Performance Test 

This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.

`Test Suite #7:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 1.743 | 100% | 3.675 | 100% |
| 2 | **Jaunt** | 2.537 | 146% | 4.372 | 119% |
| 3 | **Rammewerk Router** | 2.582 | 148% | 3.075 | 84% |
| 4 | **Symfony Router** | 102.092 | 5857% | 4.772 | 130% |
| 5 | **Bramus** | 229.998 | 13196% | 2.644 | 72% |
| 6 | **FastRoute** | 311.684 | 17882% | 2.99 | 81% |
| 7 | **PHRoute** | 426.878 | 24491% | 3.367 | 92% |
| 8 | **Laravel** | 481.537 | 27627% | 6.48 | 176% |
| 9 | **Nette** | 548.559 | 31472% | 5.033 | 137% |
| 10 | **Klein** | 1014.474 | 58203% | 2.791 | 76% |
| 11 | **AltoRouter** | 1022.16 | 58644% | 1.177 | 32% |


### Router Class-Based Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.

`Test Suite #8:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 8.197 | 100% | 0.586 | 100% |
| 2 | **Rammewerk Router** | 23.731 | 290% | 0.89 | 152% |
| 3 | **Symfony Router** | 96.753 | 1180% | 0.674 | 115% |
| 4 | **Bramus** | 191.651 | 2338% | 0.438 | 75% |
| 5 | **FastRoute** | 247.371 | 3018% | 0.552 | 94% |
| 6 | **PHRoute** | 347.964 | 4245% | 0.577 | 99% |
| 7 | **Nette** | 467.694 | 5706% | 0.703 | 120% |
| 8 | **Laravel** | 776.422 | 9472% | 0.8 | 137% |
| 9 | **AltoRouter** | 837.626 | 10219% | 0.424 | 72% |
| 10 | **Klein** | N/A | N/A | N/A | N/A |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |
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
