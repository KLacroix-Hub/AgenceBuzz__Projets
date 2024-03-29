const gulp = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const CombineMQ = require('postcss-combine-media-query')
const autoprefixer = require('autoprefixer')
const CSSnano = require('cssnano')
const rename = require('gulp-rename')
const concat = require('gulp-concat')
const sourcemaps = require('gulp-sourcemaps')
const uglify = require('gulp-uglify');
//const watch = require('gulp-watch')

const { watch } = require('gulp')

gulp.task('css:full', () => {
  return gulp
    .src('sass/main.scss')
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: 'expanded',
      }),
    )
    .pipe(
      postcss([
        autoprefixer, // ajoute les préfixes vendeurs
      ]),
    )
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('css'))
})

gulp.task('css:mini', () => {
  return gulp
    .src('sass/main.scss')
    .pipe(
      sass({
        outputStyle: 'compressed',
      }),
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(
      postcss([
        CombineMQ, // rassemble les Media Queries (parfait pour les classes utilitaires)
        autoprefixer, // ajoute les préfixes vendeurs
        CSSnano, // minification
      ]),
    )
    .pipe(gulp.dest('css'))
})

gulp.task('js:full', function () {
  return (
    gulp
      .src('./js/scripts/*.js')
      .pipe(sourcemaps.init())
      .pipe(concat('main.js'))
      .pipe(gulp.dest('./js/'))
      .pipe(sourcemaps.write('./'))
  )
})

gulp.task('js:mini', function () {
  return (
    gulp
      .src(['js/scripts/**/*.js'])
      .pipe(sourcemaps.init())
      .pipe(concat('main.js'))
      .pipe(uglify())
			.pipe(rename({ suffix: '.min' }))
      .pipe(gulp.dest('./js/'))
      .pipe(sourcemaps.write('./'))
  )
})

// Tâche BUILD : tapez "gulp" ou "gulp build"
gulp.task('build', gulp.series('css:full', 'css:mini', 'js:mini', 'js:full'))

// Tâche par défaut
gulp.task('default', gulp.series('build'))

gulp.task('watch', () => {
  watch(['./sass/**/*.scss'], gulp.series('css:full', 'css:mini'))
  watch(['js/scripts/**/*.js'], gulp.series( 'js:mini', 'js:full'))
})

