8b9## About Shortly

Shortly is a web application to create and serve shortened URLs.  By uploading a CSV with URLs to be shortened, shortly will convert those links from:

```
https://www.mysite.com/path/path2
```

To...

```
http://localhost:8000/s/Eds0yek90T
```


## Installation
```
git clone git@github.com:michaelpicco/shortly-sail.git shortly-sail
cd shortly-sail
composer install
npm install && npm build dev
php artisan key:generate
```

To start the application server
```
./vendor/bin/sail up
```

App should launch on localhost, possilby on port 80.  Should see a message similiar to:
```
Server running on [http://0.0.0.0.:80]
```

Then you need to put your database credentials in the .env file, which is currently using MySQL, and run the migrations.

```
./vendor/bin/sail migrate
```

There's a small seeder for the URLs table, which you can run using, but you can just start uploading a CSV:
```
./vendor/bin/sail artisan db:seed --class-ShortUrlsSeeder
```

To manage the MySQL server you need to shell into the container.

## Usage

Shortly is fairly simple to use.  Following the links and the menu, you can do the following:

 - Upload a CSV file containing URLs to be shortened
 - View a list of all the shortened URLs in the system
 - View details of a sepcific URL by following the clickable links
 - View log/analytic information for the entire system, which can be drilled down to specific URLs as well


## API

There are 2 endpoionts setup to retrieve URL information.  

The first is for a list of the URLs:
```
Ex. http://localhost:8000/api/urls
```
Or get a specific URL record by the short hash ID
```
Ex. http://localhost:8000/api/urls/{shorturl}
```

The second is for the log/analytics:

For a list of log entries:
```
Ex. http://localhost:8000/api/analytics
```
Or get a specific log record by the ID
```
Ex. http://localhost:8000/api/analytics/{log_id}
```


## Thank You

Thank you for the consideration.  I didn't want to be too simplistic, but also didn't want to get overly complicated or over-engineer things and while there's definitely a lot more that can be done and added, hopefully this works well to cover the basics.  

Please let me know if there's anything else I can provide!

Thanks,
-Michael


