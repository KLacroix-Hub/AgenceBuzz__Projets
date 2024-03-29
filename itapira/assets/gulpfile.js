const gulp = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const del = require('del')
const plumber = require('gulp-plumber')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const babel = require('gulp-babel')

const options = {
  string: 'env',
  default: {
    env: process.env.NODE_ENV || 'production',
  },
}
const paths = {
  styles: {
    src: './sass/main.scss',
    dest: './css',
  },
  scripts: {
    src: ['./js/scripts/*.js'],
    dest: './js',
  },
  lib: {
    src: ['./js/libs/*.js'],
    dest: './js',
  },
}

gulp.task('styles', () => {
  return gulp
    .src('sass/main.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css/'))
})

gulp.task('clean', () => {
  return del(['css/main.css'])
})

gulp.task('js-lib', () => {
  return (
    gulp
      .src(paths.lib.src)
      .pipe(
        babel({
          presets: ['@babel/preset-env'],
        }),
      )
      .pipe(!options.production ? plumber() : gutil.noop())
      // Compile le js dans un seule fichier
      .pipe(concat('lib.min.js'))
      // Pour minifier le JS
      .pipe(uglify())
      // Crée le fichier de sourcemap dans le même dossier que le js
      .pipe(sourcemaps.write())
      .pipe(gulp.dest(paths.scripts.dest))
  )
})

gulp.task('js-default', () => {
  return (
    gulp
      .src(paths.scripts.src)
      .pipe(!options.production ? plumber() : gutil.noop())
      // Compile le js dans un seule fichier
      .pipe(concat('main.js'))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest(paths.scripts.dest))
  )
})

gulp.task('js-min', () => {
  return (
    gulp
      .src(paths.scripts.src)
      .pipe(!options.production ? plumber() : gutil.noop())
      // Compile le js dans un seule fichier
      .pipe(concat('main.min.js'))
      // Pour minifier le JS
      .pipe(uglify())
      .pipe(gulp.dest(paths.scripts.dest))
  )
})

gulp.task('js', (done) => {
  return gulp.series(['js-default', 'js-min'])(done)
})

gulp.task('watch', () => {
  gulp.watch('sass/**/*.scss', { interval: 1000, usePolling: true }, (done) => {
    gulp.series(['clean', 'styles'])(done)
  })
  gulp.watch(
    'js/scripts/*.js',
    { interval: 1000, usePolling: true },
    (done) => {
      gulp.series(['js'])(done)
    },
  )
  gulp.watch('js/lib/*.js', { interval: 1000, usePolling: true }, (done) => {
    gulp.series(['js-lib'])(done)
  })
})

gulp.task('default', gulp.series(['clean', 'styles', 'js', 'watch']))
