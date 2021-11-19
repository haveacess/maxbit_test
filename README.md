# maxbit_test
Test task for maxibt solution company. Task: create CRUD and print nested set on page
\
More description look here: [Google Docs Technical Specification](https://docs.google.com/document/d/1DuXfKp4Mq9M6hg316AhqBanzMiI96cL3TRcGE4H4Bno/edit)

## Follow instruction bellow for local deployment:
0. Clone this repo
1. Then install dependencies by command: `composer install`
2. Create `.env` (based on `example.env`) and fill all values
3. Init migration and seed data by command: `migrate:fresh --seed`
4. Almost done! Run project locally. Use command: `php artisan serve`

## What i need to do for check completed work
API Documentation for postman located here: https://www.getpostman.com/collections/89d49615c209b3c25434
\
\
*Base url for api: http://127.0.0.1:8000/api/
\
*Products page: http://127.0.0.1:8000/products

Step 1. Execution some requests for working with base operations (create/update/etc..)
\
Step 2. You also can visit **product page** and look completed nested set (based on database data)
