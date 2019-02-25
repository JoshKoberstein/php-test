# PHP Test

## Setup

- Clone this repository
- Run `composer install`
- Configure .env file to use a fresh MySQL database
- Configure web server to serve application
- Run `php artisan migrate`
- Run `php artisan db:seed`
- The root endpoint of application should serve paginated list of records

## Sample Output

```json
{
   "data":[
      {
         "id":1,
         "transactor":"John Dillinger",
         "amount":"52.00",
         "transacted_at":"2019-02-25 18:54:42"
      },
      {
         "id":2,
         "transactor":"Al Capone",
         "amount":"19.00",
         "transacted_at":"2019-02-25 18:54:42"
      },
      {
         "id":3,
         "transactor":"Bugsy Siegel",
         "amount":"21.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":4,
         "transactor":"John Dillinger",
         "amount":"86.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":5,
         "transactor":"Al Capone",
         "amount":"42.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":6,
         "transactor":"Bugsy Siegel",
         "amount":"77.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":7,
         "transactor":"John Dillinger",
         "amount":"80.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":8,
         "transactor":"Bugsy Siegel",
         "amount":"70.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":9,
         "transactor":"Bugsy Siegel",
         "amount":"48.00",
         "transacted_at":"2019-02-25 18:54:43"
      },
      {
         "id":10,
         "transactor":"John Dillinger",
         "amount":"33.00",
         "transacted_at":"2019-02-25 18:54:43"
      }
   ],
   "total_records":100000,
   "current_page":1,
   "total_pages":10000,
   "peak_memory":54707664
}
```

## The Test

### Part 1

As you can see in the sample output, peak memory usage during the request lifecycle is unusually high (~54mb).  It is your task to determine the _root_ cause of the high memory usage.  Please write an explanation of why the peak memory usage is so high.

### Part 2

Imagine that the issue diagnosed in part 1 of the test is causing pages not to load in the production environment and a fix is needed immediately.  Also, imagine that the `TransactionController` class is automatically generated and cannot be edited.

Your task in part 2 of the test is to implement a quick-and-dirty fix in the `App\Http\Controllers\Controller` class for the issue and bring memory usage down to a reasonable level (~2mb).
