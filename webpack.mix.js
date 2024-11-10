const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/profileOnglet.js', 'public/js');
mix.js('resources/js/validationLogin.js', 'public/js');
mix.js('resources/js/resendEmail.js', 'public/js');
mix.js('resources/js/validationTestPersonality.js', 'public/js');
mix.js('resources/js/Notifications.js', 'public/js');
mix.postCss('resources/css/app.css', 'public/css', []);
mix.postCss('resources/css/login.css', 'public/css', []);
mix.postCss('resources/css/meetupForm.css', 'public/css', []);
mix.postCss('resources/css/meetup.css', 'public/css', []);
mix.postCss('resources/css/event.css', 'public/css', []);
mix.postCss('resources/css/search.css', 'public/css', []);
mix.postCss('resources/css/profile.css', 'public/css', []);
mix.postCss('resources/css/interets.css', 'public/css', []);
mix.postCss('resources/css/cards.css', 'public/css', []);
mix.postCss('resources/css/personality.css', 'public/css', []);
mix.postCss('resources/css/overlay-modal.css', 'public/css', []);
mix.postCss('resources/css/home.css', 'public/css', []);
mix.postCss('resources/css/notifications.css', 'public/css', []);
mix.postCss('resources/css/feed.css', 'public/css', []);
mix.sass('resources/scss/loading.scss', 'public/css', []);

// For development
mix.browserSync('127.0.0.1:8000');