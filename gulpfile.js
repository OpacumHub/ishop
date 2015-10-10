var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCSS = require('gulp-minify-css'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    ext = require('gulp-ext-replace');

var bitrixTemplatePath = './local/templates/ishop';

var config = {
    jsPath: bitrixTemplatePath+'/resource/js',
    vendorPath: bitrixTemplatePath+'/resource/vendor',
    cssPath: bitrixTemplatePath+'/resource/css'
};


gulp.task('css', function() {
    return gulp.src([
        config.vendorPath+'/bootstrap/css/bootstrap.min.css',
        config.cssPath+'/animate.css',
        config.vendorPath+'/slick/slick-theme.css',
        config.vendorPath+'/slick/slick.css',
        config.vendorPath+'/rangeslider/css/ion.rangeSlider.css',
        config.vendorPath+'/rangeslider/css/ion.rangeSlider.skinHTML5.css',
        config.vendorPath+'/lightGallery/dist/css/lightgallery.min.css',
        config.cssPath+'/style.css'
    ])
        .pipe(concat('main.css'))
        .pipe(sourcemaps.init())
        .pipe(autoprefixer())
        .pipe(minifyCSS({compatibility: 'ie8'}))
        .pipe(ext('min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(bitrixTemplatePath+'/css'));
});

gulp.task('js', function() {
    gulp.src([
        config.vendorPath + '/jquery/jquery.min.js',
        config.vendorPath + '/slick/slick.min.js',
        config.vendorPath + '/bootstrap/js/bootstrap.min.js',
        config.vendorPath + '/smoothscroll.js',
        config.vendorPath + '/scrollReveal.min.js',
        config.vendorPath + '/rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js',
        config.vendorPath + '/lightGallery/dist/js/lightgallery.min.js',
        config.vendorPath + '/jquery.inputmask.js',
        config.jsPath + '/script.js'
    ])
        .pipe(concat('main.js'))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(ext('min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(bitrixTemplatePath+'/js'))
});




gulp.task('default', [ 'css', 'js']);