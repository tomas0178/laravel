const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
  ])
  .postCss('resources/css/pc.css', 'public/css')
  .postCss('resources/css/globals.css', 'public/css')
  .postCss('resources/css/menu.css', 'public/css')
  .postCss('resources/css/phone.css', 'public/css')
  .postCss('resources/css/styleguide.css', 'public/css')


  .sass('resources/sass/app.scss', 'public/css')
  ;

if (mix.inProduction()) {
  mix
    .version();
}
