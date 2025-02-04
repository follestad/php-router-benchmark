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


## Benchmark Results

These tests was run **2025-02-04 15:59:47** on PHP version: **8.4.3**



### Router Initialization Performance Test 

This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.

`Test Suite #1:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.026 | 100% | 0.347 | 100% |
| 2 | **PHRoute** | 0.066 | 254% | 0.347 | 100% |
| 3 | **AltoRouter** | 0.084 | 323% | 0.346 | 100% |
| 4 | **Bramus** | 0.088 | 338% | 0.347 | 100% |
| 5 | **Rammewerk Router** | 0.11 | 423% | 0.347 | 100% |
| 6 | **FastRoute** | 0.163 | 627% | 0.347 | 100% |
| 7 | **Symfony Router** | 0.283 | 1088% | 0.347 | 100% |
| 8 | **Nette** | 4.207 | 16181% | 0.357 | 103% |
| 9 | **Klein** | 5.853 | 22512% | 0.356 | 103% |
| 10 | **Laravel** | 7.433 | 28588% | 3.579 | 1032% |


### Router Initialization and Route Registration Performance Test 

This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.

`Test Suite #2:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.118 | 100% | 0.41 | 100% |
| 2 | **Bramus** | 0.309 | 262% | 0.424 | 104% |
| 3 | **FastRoute** | 0.889 | 753% | 0.403 | 98% |
| 4 | **Sharkk** | 0.931 | 789% | 0.445 | 109% |
| 5 | **PHRoute** | 1.112 | 942% | 0.432 | 106% |
| 6 | **Symfony Router** | 1.281 | 1086% | 0.463 | 113% |
| 7 | **Rammewerk Router** | 1.509 | 1279% | 0.446 | 109% |
| 8 | **Klein** | 1.739 | 1474% | 0.441 | 108% |
| 9 | **Nette** | 2.102 | 1781% | 0.477 | 117% |
| 10 | **Laravel** | 4.1 | 3475% | 3.251 | 794% |


### Router Dispatch Performance Test (Static Routes) 

This test measures how efficiently the router initializes, registers, and dispatches routes. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. However, **only a single predefined route is 
dispatched**, and this same route is used for all routers to ensure consistent results. The benchmark reflects the time 
taken for the **entire process**, including initializing the router, registering all routes, and dispatching 
**one specific route**.

`Test Suite #3:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.014 | 100% | 0.472 | 100% |
| 2 | **Bramus** | 0.028 | 200% | 0.497 | 105% |
| 3 | **FastRoute** | 0.053 | 379% | 0.461 | 97% |
| 4 | **PHRoute** | 0.06 | 429% | 0.52 | 110% |
| 5 | **Sharkk** | 0.063 | 450% | 0.553 | 117% |
| 6 | **Rammewerk Router** | 0.073 | 521% | 0.542 | 115% |
| 7 | **Symfony Router** | 0.085 | 607% | 0.53 | 112% |
| 8 | **Nette** | 0.15 | 1071% | 0.599 | 127% |
| 9 | **Klein** | 0.174 | 1243% | 0.513 | 108% |
| 10 | **Laravel** | 0.367 | 2621% | 0.591 | 125% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test is similar to **test suite 3**, but it features a path with **one dynamic segments**. The test registers multiple routes, 
but only dispatches **a single dynamic route** across all routers to ensure consistency. This setup helps gauge how well 
routers handle dynamic parameters during dispatch.

`Test Suite #9:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Bramus** | 0.05 | 100% | 0.499 | 100% |
| 2 | **AltoRouter** | 0.061 | 122% | 0.4 | 80% |
| 3 | **Sharkk** | 0.07 | 140% | 0.51 | 102% |
| 4 | **Rammewerk Router** | 0.095 | 190% | 0.49 | 98% |
| 5 | **FastRoute** | 0.138 | 276% | 0.482 | 97% |
| 6 | **Klein** | 0.165 | 330% | 0.478 | 96% |
| 7 | **Symfony Router** | 0.17 | 340% | 0.52 | 104% |
| 8 | **PHRoute** | 0.248 | 496% | 0.547 | 110% |
| 9 | **Nette** | 0.271 | 542% | 0.615 | 123% |
| 10 | **Laravel** | 0.586 | 1172% | 0.577 | 116% |


### Router Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.

`Test Suite #4:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.063 | 100% | 0.419 | 100% |
| 2 | **Rammewerk Router** | 0.092 | 146% | 0.414 | 99% |
| 3 | **Bramus** | 0.279 | 443% | 0.425 | 101% |
| 4 | **Symfony Router** | 0.337 | 535% | 0.466 | 111% |
| 5 | **FastRoute** | 0.513 | 814% | 0.43 | 103% |
| 6 | **PHRoute** | 0.581 | 922% | 0.448 | 107% |
| 7 | **AltoRouter** | 0.732 | 1162% | 0.374 | 89% |
| 8 | **Nette** | 0.872 | 1384% | 0.485 | 116% |
| 9 | **Klein** | 1.757 | 2789% | 0.443 | 105% |
| 10 | **Laravel** | 2.734 | 4340% | 0.529 | 126% |


### Router Repeated Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**100 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.

`Test Suite #5:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 4.142 | 100% | 0.56 | 100% |
| 2 | **Rammewerk Router** | 8.908 | 215% | 0.521 | 93% |
| 3 | **Symfony Router** | 50.284 | 1214% | 0.645 | 115% |
| 4 | **Bramus** | 93.824 | 2265% | 0.503 | 90% |
| 5 | **FastRoute** | 127.579 | 3080% | 0.525 | 94% |
| 6 | **PHRoute** | 173.148 | 4180% | 0.556 | 99% |
| 7 | **Nette** | 232.455 | 5612% | 0.667 | 119% |
| 8 | **AltoRouter** | 426.661 | 10301% | 0.403 | 72% |
| 9 | **Laravel** | 453.531 | 10950% | 0.781 | 139% |
| 10 | **Klein** | 3628.51 | 87603% | 4.285 | 765% |


### Router High-Load Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**500 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.

`Test Suite #6:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 23.159 | 100% | 0.572 | 100% |
| 2 | **Rammewerk Router** | 46.334 | 200% | 0.538 | 94% |
| 3 | **Symfony Router** | 311.458 | 1345% | 0.649 | 114% |
| 4 | **Bramus** | 525.578 | 2269% | 0.505 | 88% |
| 5 | **FastRoute** | 838.056 | 3619% | 0.528 | 92% |
| 6 | **PHRoute** | 1043.864 | 4507% | 0.557 | 97% |
| 7 | **Nette** | 1426.598 | 6160% | 0.669 | 117% |
| 8 | **Laravel** | 2232.898 | 9642% | 0.786 | 138% |
| 9 | **AltoRouter** | 2365.778 | 10215% | 0.404 | 71% |
| 10 | **Klein** | N/A | N/A | N/A | N/A |


### Router Large-Scale Route Handling Performance Test 

This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.

`Test Suite #7:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 1.983 | 100% | 3.675 | 100% |
| 2 | **Rammewerk Router** | 2.903 | 146% | 3.075 | 84% |
| 3 | **Symfony Router** | 128.511 | 6481% | 4.766 | 130% |
| 4 | **Bramus** | 240.78 | 12142% | 2.644 | 72% |
| 5 | **FastRoute** | 370.877 | 18703% | 2.985 | 81% |
| 6 | **PHRoute** | 460.015 | 23198% | 3.367 | 92% |
| 7 | **Laravel** | 517.564 | 26100% | 6.48 | 176% |
| 8 | **Nette** | 629.145 | 31727% | 5.033 | 137% |
| 9 | **AltoRouter** | 1101.226 | 55533% | 1.177 | 32% |
| 10 | **Klein** | 1162.658 | 58631% | 2.791 | 76% |


### Router Class-Based Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.

`Test Suite #8:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 9.955 | 100% | 0.586 | 100% |
| 2 | **Rammewerk Router** | 25.841 | 260% | 0.89 | 152% |
| 3 | **Symfony Router** | 124.37 | 1249% | 0.669 | 114% |
| 4 | **Bramus** | 211.676 | 2126% | 0.438 | 75% |
| 5 | **FastRoute** | 331.901 | 3334% | 0.546 | 93% |
| 6 | **PHRoute** | 415.835 | 4177% | 0.577 | 99% |
| 7 | **Nette** | 573.718 | 5763% | 0.703 | 120% |
| 8 | **Laravel** | 809.49 | 8131% | 0.8 | 137% |
| 9 | **AltoRouter** | 946.804 | 9511% | 0.424 | 72% |
| 10 | **Klein** | N/A | N/A | N/A | N/A |
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
