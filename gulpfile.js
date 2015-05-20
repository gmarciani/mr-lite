// Plugins

var gulp        = require('gulp');
var watch       = require('gulp-watch');
var concat      = require('gulp-concat');
var rename      = require('gulp-rename');
var del         = require('del');
var sass        = require('gulp-sass');
var coffee      = require('gulp-coffee');
var uglify      = require('gulp-uglify');
var minifyCss   = require('gulp-minify-css');
var imageResize = require('gulp-image-resize')
var iconfont    = require('gulp-iconfont');
var jshint      = require('gulp-jshint');
var compass     = require('gulp-compass');
var gutil       = require('gulp-util');
var tap         = require('gulp-tap');
var ignore      = require('gulp-ignore');
var plumber     = require('gulp-plumber');
var filter      = require('gulp-filter');
var header      = require('gulp-header');
var batch       = require('gulp-batch');

var paths = {
  base: '.',

  assets: {
    base        : 'assets',
    every       : 'assets/**/*',
    stylesBase  : 'assets/styles',
    scriptsBase : 'assets/scripts',
    imagesBase  : 'assets/images',
    stylesAll   : 'assets/styles/**/*.scss',
    stylesMain  : 'assets/styles/app.scss',
    scriptsAll  : 'assets/scripts/**/*.js',
    imagesAll   : 'assets/images/**/*.{svg,png,jpg}',
    logo        : 'assets/images/logo.png',
    favicon     : 'assets/images/favicon.png',
    screenshot  : 'assets/images/screenshot.png'
  },

  dist: {
    base        : 'dist',
    every       : 'dist/**/*',
    stylesBase  : 'dist/styles',
    scriptsBase : 'dist/scripts',
    imagesBase  : 'dist/images',
    stylesAll   : 'dist/styles/**/*.css',
    scriptsAll  : 'dist/scripts/**/*.js',
    imagesAll   : 'dist/images/**/*.{png, jpg, ico}',
    logo        : 'dist/images/logo*.png',
    screenshot  : './screenshot.png'
  },

  html: {
    base: '.',
    every: './**/*.{html,php}'
  }
}

// Tasks

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('all', function() {
  gulp.start('styles');
  gulp.start('scripts');
  gulp.start('logo');
  gulp.start('screenshot');
});

gulp.task('clean', function() {
  del([paths.dist.every, paths.dist.screenshot], function (err, deletedFiles) {
    deletedFiles.forEach(function(deletedFile) {
      gutil.log(gutil.colors.cyan('clean'), ':',
      gutil.colors.green('delete'), ':',
      gutil.colors.yellow(deletedFile));
    });
  });
});

gulp.task('watch', function() {
  watch([paths.assets.stylesAll,paths.dist.stylesAll], batch(function() {
    gulp.start('styles');
  }));

  watch([paths.assets.scriptsAll,paths.dist.scriptsAll], batch(function() {
    gulp.start('scripts');
  }));

  watch([paths.assets.logo, paths.dist.logo], batch(function() {
    gulp.start('logo');
  }));

  watch(paths.assets.screenshot, batch(function() {
    gulp.start('screenshot');
  }));
});

gulp.task('styles', function() {
  gulp.src(paths.assets.stylesMain)
    .pipe(plumber())
    .pipe(compass({
      config_file: './config.rb',
      sass: paths.assets.stylesBase,
      css: paths.dist.stylesBase
      }))
    .pipe(tap(function(file, t) {
      gutil.log(gutil.colors.cyan('styles'), ':',
      gutil.colors.blue('compile'), ':',
      gutil.colors.yellow(file.path));
    }))
    .pipe(gulp.dest(paths.dist.stylesBase));
});

gulp.task('scripts', function() {
  gulp.src(paths.assets.scriptsAll)
  .pipe(plumber())
  .pipe(concat('app.js'))
  .pipe(tap(function(file, t) {
    gutil.log(gutil.colors.cyan('scripts'), ':',
    gutil.colors.blue('compile'), ':',
    gutil.colors.yellow(file.path));
  }))
  .pipe(gulp.dest(paths.dist.scriptsBase));
});

gulp.task('logo', function() {
  var logo = {
    name: 'logo', width: 1000, height: 1000
  };

  var favicons = [
    {name: 'logo-favicon-48', width: 48, height: 48},
    {name: 'logo-favicon-32', width: 32, height: 32},
    {name: 'logo-favicon-16', width: 16, height: 16}
  ];

  var medias = [
    {name: 'apple-touch-icon-ipad-retina', width: 144, height: 144},
    {name: 'apple-touch-icon-iphone-retina', width: 114, height: 114},
    {name: 'apple-touch-icon-ipad', width: 72, height: 72},
    {name: 'apple-touch-icon-iphone', width: 57, height: 57},
    {name: 'apple-touch-startup-image-ipad-landscape', width: 748, height: 748},
    {name: 'apple-touch-startup-image-ipad-portrait', width: 768, height: 768},
    {name: 'apple-touch-startup-image-iphone', width: 320, height: 320},
    {name: 'microsoft-tile-image', width: 144, height: 144},
    {name: 'android-icon-192', width: 192, height: 192},
    {name: 'android-icon-144', width: 144, height: 144},
    {name: 'android-icon-96', width: 96, height: 96},
    {name: 'android-icon-72', width: 72, height: 72},
    {name: 'android-icon-48', width: 48, height: 48},
    {name: 'android-icon-36', width: 36, height: 36}
  ];

  gulp.src(paths.assets.logo)
  .pipe(plumber())
  .pipe(rename(function(path) {
    path.basename = logo.name
  }))
  .pipe(gulp.dest(paths.dist.imagesBase))
  .pipe(tap(function(file, t) {
    gutil.log(gutil.colors.cyan('logo-brand'), ':',
    gutil.colors.blue('create'), ':',
    gutil.colors.yellow(file.path));
  }));

  favicons.forEach(function(favicon) {
    gulp.src(paths.assets.favicon)
    .pipe(plumber())
    .pipe(imageResize({
      width: favicon.width,
      height: favicon.height,
      crop: false,
      upscale: false
    }))
    .pipe(rename(function(path) {
      path.basename = favicon.name
    }))
    .pipe(gulp.dest(paths.dist.imagesBase))
    .pipe(tap(function(file, t) {
      gutil.log(gutil.colors.cyan('logo-favicon'), ':',
      gutil.colors.blue('create'), ':',
      gutil.colors.yellow(file.path));
    }));
  });

  medias.forEach(function(media) {
    gulp.src(paths.assets.favicon)
    .pipe(plumber())
    .pipe(imageResize({
      width: media.width,
      height: media.height,
      crop: false,
      upscale: false
    }))
    .pipe(rename(function(path) {
      path.basename = 'logo-icon-' + media.name
    }))
    .pipe(gulp.dest(paths.dist.imagesBase))
    .pipe(tap(function(file, t) {
      gutil.log(gutil.colors.cyan('logo-media'), ':',
      gutil.colors.blue('create'), ':',
      gutil.colors.yellow(file.path));
    }));
  });
});

gulp.task('screenshot', function() {
  var screenshot = {
    name: 'screenshot',
    width: 1000,
    height: 1000
  }

  gulp.src(paths.assets.screenshot)
  .pipe(plumber())
  .pipe(imageResize({
    width: screenshot.width,
    height: screenshot.height,
    crop: false,
    upscale: false
  }))
  .pipe(rename(function(path) {
    path.basename = screenshot.name
  }))
  .pipe(gulp.dest(paths.base))
  .pipe(tap(function(file, t) {
    gutil.log(gutil.colors.cyan('screenshot'), ':',
    gutil.colors.blue('create'), ':',
    gutil.colors.yellow(file.path));
  }));
});
