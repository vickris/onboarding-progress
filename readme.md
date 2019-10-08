## Installation instructions
1. Clone the repo via this url `git@github.com:vickris/onboarding-progress.git`
2. Create a `.env` file by running the following command `cp .env.example .env`
3. Install various packages and dependencies: `composer install`
4. Update your `.env` with your database and the database login credentials then run migrations:
    ```bash
    php artisan migrate
    ```
5. Generate an encryption key for the app: `php artisan key:generate`.
6. Install node modules: `npm install && npm run dev`
7. Serve the application:
    - Those on homestead `php artisan serve`
    - Those on valet `onboarding-progress.<valet-domain>`


## Example Screenshot
![Example Screenshot](https://imgur.com/nyA5Xk3.png)
