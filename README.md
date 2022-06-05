# Laravel Inertia Blog :monocle_face:
I wanted to create a simple showcase project using Laravel and Inertia.js so here we are. This project is a simple blog page, **but** it is not just a junior **CRUD** blog project. I have tried to apply advanced ways of coding and design paterns :nerd_face:
## List of used technologies
- Laravel 9
- Inertia.js
- Tailwind CSS
- Multiple drivers for fetching data - **Eloquent** and **Elastic Search**
- Laravel Scout
- [Explorer](https://github.com/Jeroen-G/Explorer) driver for Laravel scout 
## Local Deployment
```
npm install
npm run dev
composer install
fill in .env based on env.example
php artisan migrate --seed
link via valet, apache, nginx, laravel sail or similar
```
## Elastic Search Repository
The most important part of this showcae project is the usage of repository patern when fetching blog posts data. Here you can either use Eloquent ORM by default or set ```POST_REPOSITORY_DRIVER``` to ```elastic``` instead of default value ```database``` and enjoy the data coming from your elastic search local installation.
### Important notes towards Elastic Search
- you need to have local elastic search instalation running on port 9200
- afterwards can run php artisan scout:index posts_index and php artisan elastic:update
- from now one when searching posts for specific category or by title items will be fetched from elastic. Magic happens in ```SearchedPostController.php```
