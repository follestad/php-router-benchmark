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

These tests was run **2025-02-05 02:37:35** on PHP version: **8.4.3**



### Router Initialization Performance Test 

This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.

`Test Suite #1:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.042 | 100% | 0.347 | 100% |
| 2 | **PHRoute** | 0.085 | 202% | 0.347 | 100% |
| 3 | **AltoRouter** | 0.095 | 226% | 0.346 | 100% |
| 4 | **Bramus** | 0.145 | 345% | 0.347 | 100% |
| 5 | **Rammewerk Router** | 0.168 | 400% | 0.347 | 100% |
| 6 | **FastRoute** | 0.243 | 579% | 0.347 | 100% |
| 7 | **Symfony Router** | 0.375 | 893% | 0.347 | 100% |
| 8 | **Nette** | 4.177 | 9945% | 0.357 | 103% |
| 9 | **Klein** | 5.759 | 13712% | 0.356 | 103% |
| 10 | **Laravel** | 6.836 | 16276% | 5.859 | 1690% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Initialization and Route Registration Performance Test 

This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.

`Test Suite #2:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.2 | 100% | 0.41 | 100% |
| 2 | **Bramus** | 0.383 | 192% | 0.424 | 104% |
| 3 | **FastRoute** | 1.066 | 533% | 0.403 | 98% |
| 4 | **Sharkk** | 1.085 | 543% | 0.445 | 109% |
| 5 | **PHRoute** | 1.275 | 637% | 0.432 | 106% |
| 6 | **Symfony Router** | 1.363 | 682% | 0.463 | 113% |
| 7 | **Rammewerk Router** | 1.481 | 741% | 0.446 | 109% |
| 8 | **Klein** | 1.784 | 892% | 0.44 | 107% |
| 9 | **Nette** | 2.4 | 1200% | 0.477 | 117% |
| 10 | **Laravel** | 3.83 | 1915% | 3.24 | 791% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Dispatch Performance Test (Static Routes) 

This test measures how efficiently the router initializes, registers, and dispatches routes. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. However, **only a single predefined route is 
dispatched**, and this same route is used for all routers to ensure consistent results. The benchmark reflects the time 
taken for the **entire process**, including initializing the router, registering all routes, and dispatching 
**one specific route**.

`Test Suite #3:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.013 | 100% | 0.472 | 100% |
| 2 | **Bramus** | 0.025 | 192% | 0.497 | 105% |
| 3 | **Sharkk** | 0.05 | 385% | 0.553 | 117% |
| 4 | **FastRoute** | 0.052 | 400% | 0.461 | 97% |
| 5 | **PHRoute** | 0.061 | 469% | 0.52 | 110% |
| 6 | **Rammewerk Router** | 0.063 | 485% | 0.542 | 115% |
| 7 | **Symfony Router** | 0.085 | 654% | 0.53 | 112% |
| 8 | **Nette** | 0.131 | 1008% | 0.599 | 127% |
| 9 | **Klein** | 0.157 | 1208% | 0.513 | 108% |
| 10 | **Laravel** | 0.29 | 2231% | 0.591 | 125% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Dispatch Performance Test (Dynamic Routes) 

This test is similar to **test suite 3**, but it features a path with **one dynamic segments**. The test registers multiple routes, 
but only dispatches **a single dynamic route** across all routers to ensure consistency. This setup helps gauge how well 
routers handle dynamic parameters during dispatch.

`Test Suite #9:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Bramus** | 0.049 | 100% | 0.499 | 100% |
| 2 | **AltoRouter** | 0.052 | 106% | 0.4 | 80% |
| 3 | **Sharkk** | 0.063 | 129% | 0.51 | 102% |
| 4 | **Rammewerk Router** | 0.077 | 157% | 0.49 | 98% |
| 5 | **FastRoute** | 0.121 | 247% | 0.482 | 97% |
| 6 | **Symfony Router** | 0.153 | 312% | 0.52 | 104% |
| 7 | **Klein** | 0.155 | 316% | 0.478 | 96% |
| 8 | **PHRoute** | 0.221 | 451% | 0.547 | 110% |
| 9 | **Nette** | 0.232 | 473% | 0.615 | 123% |
| 10 | **Laravel** | 0.474 | 967% | 0.577 | 116% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.

`Test Suite #4:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 0.049 | 100% | 0.419 | 100% |
| 2 | **Rammewerk Router** | 0.075 | 153% | 0.414 | 99% |
| 3 | **Bramus** | 0.27 | 551% | 0.425 | 101% |
| 4 | **Symfony Router** | 0.319 | 651% | 0.466 | 111% |
| 5 | **FastRoute** | 0.438 | 894% | 0.43 | 103% |
| 6 | **PHRoute** | 0.577 | 1178% | 0.448 | 107% |
| 7 | **AltoRouter** | 0.714 | 1457% | 0.374 | 89% |
| 8 | **Nette** | 0.839 | 1712% | 0.485 | 116% |
| 9 | **Klein** | 1.713 | 3496% | 0.443 | 105% |
| 10 | **Laravel** | 2.309 | 4712% | 0.529 | 126% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Repeated Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**100 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.

`Test Suite #5:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 4.359 | 100% | 0.56 | 100% |
| 2 | **Rammewerk Router** | 8.4 | 193% | 0.521 | 93% |
| 3 | **Symfony Router** | 60.244 | 1382% | 0.645 | 115% |
| 4 | **Bramus** | 96.728 | 2219% | 0.503 | 90% |
| 5 | **FastRoute** | 143.927 | 3302% | 0.525 | 94% |
| 6 | **PHRoute** | 185.152 | 4248% | 0.556 | 99% |
| 7 | **Nette** | 281.77 | 6464% | 0.667 | 119% |
| 8 | **AltoRouter** | 433.962 | 9956% | 0.403 | 72% |
| 9 | **Klein** | 2905.113 | 66646% | 4.285 | 765% |
| 10 | **Laravel** | N/A | N/A | N/A | N/A |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router High-Load Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**500 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.

`Test Suite #6:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 22.589 | 100% | 0.572 | 100% |
| 2 | **Rammewerk Router** | 45.639 | 202% | 0.538 | 94% |
| 3 | **Symfony Router** | 308.584 | 1366% | 0.649 | 114% |
| 4 | **Bramus** | 506.767 | 2243% | 0.505 | 88% |
| 5 | **FastRoute** | 738.368 | 3269% | 0.528 | 92% |
| 6 | **PHRoute** | 946.225 | 4189% | 0.557 | 97% |
| 7 | **Nette** | 1438.782 | 6369% | 0.669 | 117% |
| 8 | **Laravel** | 2257.474 | 9994% | 0.786 | 138% |
| 9 | **AltoRouter** | 2295.983 | 10164% | 0.404 | 71% |
| 10 | **Klein** | N/A | N/A | N/A | N/A |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Large-Scale Route Handling Performance Test 

This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.

`Test Suite #7:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 1.934 | 100% | 3.675 | 100% |
| 2 | **Rammewerk Router** | 2.643 | 137% | 3.075 | 84% |
| 3 | **Symfony Router** | 128.779 | 6659% | 4.766 | 130% |
| 4 | **Bramus** | 234.22 | 12111% | 2.644 | 72% |
| 5 | **FastRoute** | 327.326 | 16925% | 2.985 | 81% |
| 6 | **PHRoute** | 421.474 | 21793% | 3.367 | 92% |
| 7 | **Laravel** | 504.354 | 26078% | 6.48 | 176% |
| 8 | **Nette** | 631.432 | 32649% | 5.033 | 137% |
| 9 | **AltoRouter** | 1076.837 | 55679% | 1.177 | 32% |
| 10 | **Klein** | 1144.919 | 59200% | 2.791 | 76% |
| 11 | **Jaunt** | N/A | N/A | N/A | N/A |


### Router Class-Based Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.

`Test Suite #8:`

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Sharkk** | 8.896 | 100% | 0.586 | 100% |
| 2 | **Rammewerk Router** | 25.808 | 290% | 0.89 | 152% |
| 3 | **Symfony Router** | 123.783 | 1391% | 0.669 | 114% |
| 4 | **Bramus** | 210.768 | 2369% | 0.438 | 75% |
| 5 | **FastRoute** | 294.43 | 3310% | 0.546 | 93% |
| 6 | **PHRoute** | 379.43 | 4265% | 0.577 | 99% |
| 7 | **Nette** | 574.518 | 6458% | 0.703 | 120% |
| 8 | **Laravel** | 810.22 | 9108% | 0.8 | 137% |
| 9 | **AltoRouter** | 903.634 | 10158% | 0.424 | 72% |
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
