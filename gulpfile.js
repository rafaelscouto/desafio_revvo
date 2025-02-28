const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

const paths = {
    scss: './src/assets/scss/*.scss',
    css: './src/assets/css/'
};

function compileSass() {
    return gulp.src(paths.scss)
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(gulp.dest(paths.css));
}

function watchFiles() {
    gulp.watch(paths.scss, compileSass);
}

gulp.task('start', gulp.series(compileSass, watchFiles));

