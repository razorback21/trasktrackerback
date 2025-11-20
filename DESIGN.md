# Part 3 — System Design

1. How would you scale this app for 100k+ users?
   I can scale this app to 100k+ users by optimizing both the frontend and backend code and services.

### For frontend (React and javascript)

1. I will minify JavaScript files to reduce the file size.

2. Implement multi‑layer caching using Redis, local storage, or IndexedDB to avoid hitting the database on every request.

3. Use server‑side pagination to handle large datasets efficiently.

4. Apply dynamic imports to load code on demand and improve performance.

5. Use debouncing for input events when needed to reduce unnecessary calls.
   Reduce re‑rendering by using useRef instead of useState for storing transient values (ex. form inputs).

6. Apply useCallback and useMemo to optimize component rendering and prevent unnecessary recalculations.

### Back‑end (PHP, Laravel and Servers)

1. I will host the app on AWS (i'ts releiable) with two Ec2 application servers behind a load balancer for high availability.

2. Use Amazon RDS with a master and slave setup: route all read requests to the slave database, while the master handles write, update, delete, read operations. Incase slave is down, master database can also handle read operation.

3. Add a caching layer (Redis) to reduce database load and improve response times.

4. Implement rate limiting in (WAF) to protect the app from abuse and excessive requests.

5. Optimize queries in Laravel, for example by eager loading relationships to avoid N+1 issues and
   use Laravel middleware for rate limiting at the application level.

6. If I were to update this app in the future maybe adding feature like notifications, uploading of images and processing it. I will leverage Laravel builtin queued jobs feature to process task on the background.

7. I will make sure to move all data processing logic to the database, not on the application level. I have fixed a lot of these issues with legacy applications and it really affects the performance big time. I notice some developers just use PHP arrays to structure large datasets.

8. I will leverage Laravel Octane for faster application boot time and use connection pooling for faster database request times.

#### 2. How would you implement background jobs (e.g., reminders)?

Laravel has a built‑in queueing feature. All we need to do is run php `artisan make:job MyJob`, and this will create a queueable class that implements ShouldQueue and uses the Queueable trait. We can then place our logic inside this job, and somewhere in our code we dispatch it to the queue worker for background processing. Laravel also provides helper classes that use Queueable, such as notifications, which can likewise be processed asynchronously in the background.

#### 3. How would you optimize database queries and caching?

There are several effective ways to optimize database queries. I can create indexes on frequently used columns to speed up searches. When selecting fields, I avoid using \* since it fetches all columns, instead, I specify only the fields I need. Applying LIMIT also improves performance by reducing the amount of data returned. For data that doesn’t require real‑time updates, I use materialized views and query directly from it and When I worked with Eloquent, I always make sure to eager load relationships to prevent N+1 query issues.

For cache optimization, it’s important to choose the right storage engine. I recommend Redis because it’s fast, reliable, and well‑suited for handling large amounts of cached data. Setting proper expiration times and invalidating cache intelligently also help maintain performance and consistency.
