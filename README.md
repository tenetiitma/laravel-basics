## Prerequisites
- Composer version ^2.*
- Laravel: https://laravel.com/docs/10.x/deployment#server-requirements
- Node:  ^17.*
## Initial setup
- `git clone`
- `composer install`
- `npm install`
- `cp .env.example .env`
- Adjust `.env` DB_ variables
- `php artisan migrate`

## DB connection

### Local database connection (WSL)
- make sure that the SQL server is running `sudo service mysql status`
- if the SQL service is not running `sudo service mysql start`


## 1. App setup, database migrations and basic artisan commands

### Create Models, Controllers & Migrations based on `books.sql` schema using artisan command: 

> `php artisan make:model {replace with model name} -mcr`

For the pivot table book_authors only migration file is required.

This can be done by using artisan command:

> `php artisan make:migration {replace with table name}`

### Add table columns to migration files based on the `books.sql` table structures.

Find suitable type for each column by reading the [Creating columns](https://laravel.com/docs/10.x/migrations#creating-columns) documentation.

Once all the columns have been defined, we can move forward and populate the database by using artisan command:

> `php artisan migrate`

This will populate the database based on the migration schema.
However this command does not remove any existing tables.

To drop all tables before migrating:

> `php artisan migrate:fresh`

### Fill the tables by importing `books.sql` in your database managment tool.


### Refrences:
- [Creating columns](https://laravel.com/docs/10.x/migrations#creating-columns)
- [Generating migrations](https://laravel.com/docs/10.x/migrations#generating-migrations)
- [Generating model classes](https://laravel.com/docs/10.x/eloquent#generating-model-classes)

## 2. Model relationships
### Based on the database structure create model relationships.

Create model relationships for the followng scenarios:
- [x] As a user i want to see books with authors.
- [x] As a user i want to see authors books.
- [x] As a user i want to see client orders.
- [x] As a user i want to see book orders.
- [x] As a user i want to see what book was orderd.
- [x] As a user i want to see the client who made the order.

Extra:
- [x] As a user i want to see clients books.

### To test if the relationships work we can use Artisan console (REPL) or create a test route to visualize the results in the browser enviroment.

Use the following command to initiate the console:
> `php artisan tinker`

To create our testing route we need to first add it to `web.php`

```php
Route::get('/test', function(){
    // some expamles

    // return Author::first()->books;
    // return Author::with('books')->first();

    // dd()
});
```



### Refrences
- [Eloquent: Relationships](https://laravel.com/docs/10.x/eloquent-relationships)
- [dd()](https://laravel.com/docs/10.x/helpers#method-dd)

## 3. Resource controllers & routes

**??** If your code repo is not up to date, pull the latest changes from the main branch.

### Context
- _As an **authenticated** user i want to see a list of books, authors, clients and orders on the admin panel._

    - _The lists should include relavant data for the given resource & edit, delete buttons._
    - _The lists should be paginated and only show 20 records per page._

- _As an **authenticated** user i should see navigation buttons for authors, books, clients and orders and by clicking on the button i should be navigated to the respective resources index view._

### Use the authors page as an example and create similar pages for Books, Clients and Orders.

1. **Create index views for:**
    - [x] Authors
    - [ ] Books
    - [ ] Clients
    - [ ] Orders

2. **Render the views using the correct controller@method.**

3. **Add navigation links for all the resources.**

## Refrences
- [Actions Handled By Resource Controller](https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controller)
- [Creating & Rendering Views](https://laravel.com/docs/10.x/views#creating-and-rendering-views)
- [Named Routes](https://laravel.com/docs/10.x/routing#named-routes)
- [Paginating Eloquent Results](https://laravel.com/docs/10.x/pagination#paginating-eloquent-results)
- [Blade Templates](https://laravel.com/docs/10.x/blade#main-content)





