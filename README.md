# simple SPA application
## setup
1- clone the repo into your machine
2- run `composer install`
3- run `npm install`

after finish, you can run:
- `php artisan serve`
- `npm run dev` && `npm run watch-poll`

Jobs and task scheduler:
- to run jobs and task scheduler locally:
  - `php artisan queue:work` for jobs
  - `php artisan schedule:work` for task schedule

finally, database
- add your database credentials and connection into `.env`
- run `php artisan migrate`
