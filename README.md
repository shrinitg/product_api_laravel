API: Application Programming Interface <br>
In this project, a grocery store APIs are created for admin and user separately. In Laravel the routes of API are stored in routes/api.php file. <br>
All the APIs are tested successfully. <br>
For the documentation of API, Swagger UI is used whose logic is written in Controllers/swaggerController.php <br>

Swagger Documentation is used for API documentation, link: http://localhost:8000/api/docs/

product_api_laravel is a workspace for grocery store APIs in which we have 2 separate collections for admin and user. <br>

To test the APIs, please follow the below steps ( these 4 steps are common for both Admin and User collection) : <br>

1. Pull the laravel application from github link => https://github.com/shrinitg/product_api_laravel <br>

2. Open command terminal and open directory where you pulled the above application. <br>

3. Run following commands in order: <br>
    A. php artisan make:database product_api_laravel <br>
    B. php artisan migrate <br>
    C. php artisan serve <br>

4. Now, you are all set to test the APIs! <br>

Now, Let's understand the Admin requests: <br>

1. getDataPur[GET] => the end-point is used to fetch all the purchased item details along with user name and contact. <br>

2. create[POST] => the end point to create new item in the db, in form-data send['title', 'description', 'category', 'price'] <br>

3. update/{id}[POST] => the end-point to update the item details in form-data send['title', 'description', 'category', 'price'] <br>

4. getPriceHistory/{year}[GET] => this end-point is used to get price change history for particular year {year} <br>

5. getDataUnp[GET] => end-point to fetch the unsold products. <br>


Now, Let's understand the User requests: <br>

1. purchase[POST] => the end-point is used user to purchase the product, in form-data send ['product_id', 'user_name', 'user_contact']. <br>

2. getDataUnp[GET] => the end point to fetch the unsold products for the users <br>