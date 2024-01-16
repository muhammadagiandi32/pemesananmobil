## Run

-   update / install composer

    ```sh
    composer update
    ```

    install npm

    ```sh
    npm install && npm run dev
    ```

-   buat file .env dengan cara copy file .env.example

-   buat secret key laravel dengan menjalankan
    ```sh
    php artisan key:generate
    ```
-   buat tabel dan seeder dengan menjalankan

    ```sh
    php artisan migrate:fresh --seed
    ```

-   menjalankan program
    ```sh
    php artisan serve
    ```
