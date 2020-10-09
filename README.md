## About Note

A simpte note app built with Laravel, Jetstream and Inertia.

## Installation
```bash
git clone git@github.com:horaceho/note.git note

cd note
cp .env.example .env
# create database and setup .env
# DB_DATABASE=note
# DB_USERNAME=
# DB_PASSWORD=

composer install
npm install && npm run dev

php artisan key:generate
php artisan migrate
php artisan serve
```
## Notes
```bash
open http://127.0.0.1:8000/notes
```
## License

Under the [MIT license](https://opensource.org/licenses/MIT).
