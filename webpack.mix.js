const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');
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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);


const moduleFolder = './Modules';

const dirs = p => fs.readdirSync(p).filter(f => fs.statSync(path.resolve(p,f)).isDirectory())

let modules = dirs(moduleFolder);

cssArray = [];
cssArray.push('public/css/app.css');

modules.forEach(function(m){
    let js = path.resolve(moduleFolder,m,'resources','js', 'app.js');
    if (fs.existsSync(js)) {
        mix.js(js,'public/js');
    }

    let scss = path.resolve(moduleFolder,m,'resources','sass', 'app.scss');
    if (fs.existsSync(scss)) {
        mix.sass(scss,'public/css/app.css');
    }

    let css = path.resolve(moduleFolder,m,'resources','css', 'app.css');
    if (fs.existsSync(css)) {
        mix.postCss(css,'public/css/app.css');
    }
    cssArray.push('public/css/app.css');

});
