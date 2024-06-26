const mix = require('laravel-mix');

function findFiles(dir) {
  const fs = require('fs');
  return fs.readdirSync(dir).filter(file => {
    return fs.statSync(`${dir}/${file}`).isFile();
  });
}

function buildSass(dir, dest) {
  findFiles(dir).forEach(function (file) {
    if ( ! file.startsWith('_')) {
      mix.sass(dir + '/' + file, dest);
    }
  });
}

mix
  .setPublicPath('public/dist')

mix
  .js('resources/scripts/app.js', 'js')
  .autoload({ jquery: ['$', 'window.jQuery'] });

buildSass('resources/styles', 'css')

mix
  .sourceMaps()
  .version();
