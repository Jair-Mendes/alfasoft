## License
Contact Management - Web application
Made with [Laravel framework](https://laravel.com/docs)

Developed a CRUD Laravel web application to manage contacts

## After cloning the repository, follow these steps below:

1 - Install modules :
<pre>composer install</pre>

2 - Copy file <b>".env.example"</b> and rename copied file to <b>".env"</b> or run following command :
<pre>cp .env.example .env</pre>

3 - Generate Application Key : 
<pre>php artisan key:generate</pre>

4 - Configure Database in file created <b>.env</b> :
<pre>
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
</pre>

5 - Running Migrations:
<pre>php artisan migrate</pre>

6 - Start a development server at http://localhost:8000 : 
<pre>php artisan serve</pre>
