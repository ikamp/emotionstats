var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')();

gulp.task('css', function () {
    return gulp.src(['public/assets/css/style.css'])
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.cssmin())
        .pipe(plugins.autoprefixer())
        .pipe(plugins.sourcemaps.write())
        .pipe(gulp.dest('public/assets/dist/css'))
});

gulp.task('js', function () {
    return gulp.src([
        'public/controllers/graphController.js',
        'public/controllers/homeController.js',
        'public/dashboard/dashboardController.js',
        'public/employee/employeeController.js',
        'public/employee/departmentController.js',
        'public/mood-add/mood-add.controller.js',
        'public/mymood/mymoodController.js',
        'public/mymood/mymoodController.js',
        'public/services/authentication.js',
        'public/services/dataService.js',
        'public/services/interceptor.js',
        'public/signin/signinController.js',
        'public/signup/signupController.js'
    ])
        .pipe(plugins.concat('all.js'))
        .pipe(plugins.uglify())
        .pipe(gulp.dest('public/jsdist'));

});