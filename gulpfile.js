var gulp = require('gulp');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
// config
var templateDir = './app/templates';
var bundleDir = './www/build';

gulp.task('js', function(){
    return gulp.src([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/magic-popup/dist/jquery.magnific-popup.js', // light box
            templateDir+'/**/*.js'
        ])
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest(bundleDir+'/js/'))
});

gulp.task('css', function() {
    return gulp.src([
            './bower_components/bootstrap/dist/css/bootstrap.css',
            './bower_components/bootstrap/dist/css/bootstrap-theme.css',
            './bower_components/magic-popup/dist/magnific-popup.css',
            templateDir+'/**/*.less'
        ])
        .pipe(concat('bundle.css'))
        .pipe(less())
        .on('error', restoreWatch)
        .pipe(gulp.dest(bundleDir+'/css/'));
});

gulp.task('copy', function(){
    gulp.src([
        './bower_components/bootstrap/dist/fonts/*.*'
    ]).pipe(gulp.dest(bundleDir+'/fonts'));
    gulp.src([
        templateDir+'/**/*.jpg',
        templateDir+'/**/*.png',
        templateDir+'/**/*.gif',
        templateDir+'/**/*.gif',
        templateDir+'/**/*.eot',
        templateDir+'/**/*.svg',
        templateDir+'/**/*.ttf',
        templateDir+'/**/*.woff',
        templateDir+'/**/*.woff2'
    ]).pipe(gulp.dest(bundleDir+'/css'));
});

function restoreWatch(error){
    console.log(error.toString());
    this.emit('end');
}

gulp.task('default', function(){
    gulp.watch(templateDir+'/**/*.*', ['copy', 'css', 'js'])
        .on('error', restoreWatch);
})

gulp.task('prod', function(){
    gulp.start('css', 'js', 'copy');
    gulp.src(bundleDir+'/css/bundle.css')
        .pipe(concat('bundle.min.css'))
        .pipe(cssmin())
        .on('error', restoreWatch)
        .pipe(gulp.dest(bundleDir+'/css/'));
    gulp.src(bundleDir+'/js/bundle.js')
        .pipe(concat('bundle.min.js'))
        .pipe(uglify())
        .on('error', restoreWatch)
        .pipe(gulp.dest(bundleDir+'/js/'));
})

gulp.task('run', function(){
    gulp.start('css', 'js', 'copy');
})