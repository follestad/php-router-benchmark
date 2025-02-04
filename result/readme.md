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
| 1    | FastRouter | 10.2  | 100%   | 1.2 MB         | 100%     |
| 2    | AnotherRouter | 12.5 | 122% | 1.4 MB         | 116%     |

- **Time (%)** compares execution time to the fastest router.  
- **Memory (%)** compares peak memory usage.  

## Why This Matters

Efficient routing is essential for high-performance web applications. By running standardized tests across different 
routers and using the median execution time, this benchmark provides a clear and objective comparison of their efficiency.

## Understanding Router Implementations

If you're curious about how different routers are implemented, check out the **`src/Routers`** directory. Some routers 
require minimal setup, while others need more extensive configuration. For example, Rammewerk Router has a compact 
and simple setup, whereas frameworks like Symfony and Laravel involve more steps. Some routers, like Bramus, 
required extra adjustments to fit the benchmark structure since there wasn’t a straightforward way to retrieve 
validated results. Exploring these implementations can give you insight into the trade-offs between simplicity and 
flexibility in different routing solutions.

## Contributing & Disclaimer

Want to contribute? Feel free to **fork the repository, add new router packages, or improve existing implementations** 
by submitting a pull request! 

You can find each package’s implementation under the **`src/Routers`** directory. Keep in 
mind that the test setups are based on official documentation and guides, but they may not always represent the 
**absolute best or most optimized configuration** for every router. Some routers required small adjustments to fit the 
test structure, but these should have minimal impact on performance. 

Additionally, some routers offer **caching or compilation features** to improve speed, but these haven't been tested 
yet—hopefully, a future test will cover this!
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


## Benchmark Results



### 1. Router Initialization Performance Test 

This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **PHRoute** | 0.06 | 100% | 0.347 | 100% |
| 2 | **AltoRouter** | 0.075 | 125% | 0.346 | 100% |
| 3 | **Bramus** | 0.081 | 135% | 0.347 | 100% |
| 4 | **Rammewerk Router** | 0.102 | 170% | 0.347 | 100% |
| 5 | **FastRoute** | 0.159 | 265% | 0.347 | 100% |
| 6 | **Symfony Router** | 0.255 | 425% | 0.347 | 100% |
| 7 | **Nette** | 4.186 | 6977% | 0.357 | 103% |
| 8 | **Klein** | 5.488 | 9147% | 0.356 | 103% |
| 9 | **Laravel** | 7.135 | 11892% | 3.579 | 1032% |


### 2. Router Initialization and Route Registration Performance Test 

This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.118 | 100% | 0.41 | 100% |
| 2 | **Bramus** | 0.287 | 243% | 0.424 | 104% |
| 3 | **FastRoute** | 0.915 | 775% | 0.408 | 100% |
| 4 | **PHRoute** | 1.094 | 927% | 0.439 | 107% |
| 5 | **Symfony Router** | 1.262 | 1069% | 0.463 | 113% |
| 6 | **Rammewerk Router** | 1.483 | 1257% | 0.453 | 111% |
| 7 | **Klein** | 1.749 | 1482% | 0.44 | 108% |
| 8 | **Nette** | 2.19 | 1856% | 0.477 | 117% |
| 9 | **Laravel** | 4.054 | 3436% | 3.252 | 794% |


### 3. Router Dispatch Performance Test (Static Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches routes**. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. After registration, **the same predefined route is dispatched** 
for all routers to ensure consistent results. The benchmark reflects the time taken for the **entire process**, from initialization to dispatch.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **AltoRouter** | 0.011 | 100% | 0.472 | 100% |
| 2 | **Bramus** | 0.024 | 218% | 0.497 | 105% |
| 3 | **FastRoute** | 0.048 | 436% | 0.466 | 99% |
| 4 | **PHRoute** | 0.064 | 582% | 0.527 | 112% |
| 5 | **Rammewerk Router** | 0.069 | 627% | 0.549 | 116% |
| 6 | **Symfony Router** | 0.085 | 773% | 0.535 | 113% |
| 7 | **Nette** | 0.127 | 1155% | 0.599 | 127% |
| 8 | **Klein** | 0.159 | 1445% | 0.513 | 108% |
| 9 | **Laravel** | 0.334 | 3036% | 0.591 | 125% |


### 4. Router Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Rammewerk Router** | 0.074 | 100% | 0.422 | 100% |
| 2 | **Bramus** | 0.273 | 369% | 0.425 | 101% |
| 3 | **Symfony Router** | 0.311 | 420% | 0.467 | 111% |
| 4 | **FastRoute** | 0.386 | 522% | 0.436 | 103% |
| 5 | **PHRoute** | 0.579 | 782% | 0.453 | 107% |
| 6 | **AltoRouter** | 0.739 | 999% | 0.374 | 89% |
| 7 | **Nette** | 0.798 | 1078% | 0.485 | 115% |
| 8 | **Klein** | 1.775 | 2399% | 0.443 | 105% |
| 9 | **Laravel** | 2.72 | 3676% | 0.535 | 127% |


### 5. Router Repeated Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**100 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Rammewerk Router** | 8.512 | 100% | 0.528 | 100% |
| 2 | **Symfony Router** | 48.324 | 568% | 0.65 | 123% |
| 3 | **Bramus** | 90.251 | 1060% | 0.503 | 95% |
| 4 | **FastRoute** | 123.013 | 1445% | 0.53 | 100% |
| 5 | **PHRoute** | 172.215 | 2023% | 0.562 | 106% |
| 6 | **Nette** | 229.907 | 2701% | 0.667 | 126% |
| 7 | **AltoRouter** | 411.181 | 4831% | 0.403 | 76% |
| 8 | **Laravel** | 426.683 | 5013% | 0.781 | 148% |
| 9 | **Klein** | 3438.53 | 40396% | 4.285 | 812% |


### 6. Router High-Load Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**500 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Rammewerk Router** | 44.689 | 100% | 0.545 | 100% |
| 2 | **Symfony Router** | 308.183 | 690% | 0.654 | 120% |
| 3 | **Bramus** | 461.403 | 1032% | 0.505 | 93% |
| 4 | **FastRoute** | 726.323 | 1625% | 0.533 | 98% |
| 5 | **PHRoute** | 947.305 | 2120% | 0.562 | 103% |
| 6 | **Nette** | 1406.294 | 3147% | 0.669 | 123% |
| 7 | **Laravel** | 2183.449 | 4886% | 0.786 | 144% |
| 8 | **AltoRouter** | 2300.966 | 5149% | 0.404 | 74% |
| 9 | **Klein** | N/A | N/A | N/A | N/A |


### 7. Router Large-Scale Route Handling Performance Test 

This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Rammewerk Router** | 2.766 | 100% | 3.082 | 100% |
| 2 | **Symfony Router** | 128.376 | 4641% | 4.772 | 155% |
| 3 | **Bramus** | 235.369 | 8509% | 2.644 | 86% |
| 4 | **FastRoute** | 325.569 | 11770% | 2.99 | 97% |
| 5 | **PHRoute** | 421.582 | 15242% | 3.373 | 109% |
| 6 | **Laravel** | 501.157 | 18118% | 6.48 | 210% |
| 7 | **Nette** | 629.804 | 22769% | 5.033 | 163% |
| 8 | **AltoRouter** | 1087.556 | 39319% | 1.177 | 38% |
| 9 | **Klein** | 1160.917 | 41971% | 2.791 | 91% |


### 8. Router Class-Based Dispatch Performance Test (Dynamic Routes) 

This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.

| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |
| --- | ------------- | ------ | ------- | ------ | ------ |
| 1 | **Rammewerk Router** | 26.637 | 100% | 0.895 | 100% |
| 2 | **Symfony Router** | 123.909 | 465% | 0.674 | 75% |
| 3 | **Bramus** | 212.971 | 800% | 0.438 | 49% |
| 4 | **FastRoute** | 286.859 | 1077% | 0.552 | 62% |
| 5 | **PHRoute** | 376.739 | 1414% | 0.583 | 65% |
| 6 | **Nette** | 563.288 | 2115% | 0.703 | 79% |
| 7 | **Laravel** | 818.964 | 3075% | 0.804 | 90% |
| 8 | **AltoRouter** | 905.984 | 3401% | 0.424 | 47% |
| 9 | **Klein** | N/A | N/A | N/A | N/A |
