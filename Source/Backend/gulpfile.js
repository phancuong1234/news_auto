var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    minifyCss = require('gulp-cssnano'),
    browserSync = require('browser-sync').create(),
    reload = browserSync.reload;
gulp.task('minify-admin-js', function () {
    return gulp.src('public/templates/admin/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/templates/admin/js'));
});
gulp.task('minify-user-js', function () {
    return gulp.src('public/templates/user/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/templates/user/js'));
});
gulp.task('minify-admin-css', function () {
    return gulp.src('public/templates/admin/css/*.css')
        .pipe(minifyCss())
        .pipe(gulp.dest('public/templates/admin/css'));
});
gulp.task('minify-user-css', function () {
    return gulp.src('public/templates/user/style/*.css')
        .pipe(minifyCss())
        .pipe(gulp.dest('public/templates/user/style'));
});
gulp.task('serve', function () {
    browserSync.init({
        proxy: 'http://localhost:8000'
    });
    gulp.watch('public/templates/admin/js/*.js', gulp.series('minify-admin-js', reload));
    gulp.watch('public/templates/user/js/*.js', gulp.series('minify-user-js', reload));
    gulp.watch('public/templates/admin/css/*.css', gulp.series('minify-admin-css', reload));
    gulp.watch('public/templates/user/style/*.css', gulp.series('minify-user-css', reload));
});
