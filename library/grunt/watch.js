module.exports = {
    scripts: {
        files: ['js/**/*.js', 'js/**/*.json'],
        tasks: ['concat:js', 'concat:libs','uglify'],
        options: {
            spawn: false,
        },
    },
    css: {
        files: ['css/*.css', 'scss/*.scss', 'scss/*/*.scss','!scss/app.scss','!≈'],
        tasks: ['sass:dist', 'sass:admin', 'autoprefixer', 'cssmin:my_css'],
        options: {
            spawn: false,
            livereload: true
        },
    },
    cssFoundation: {
        files: ['scss/app.scss','scss/_settings.scss'],
        tasks: ['sass:foundation', 'autoprefixer', 'cssmin:foundation'],
        options: {
            spawn: false,
            livereload: true
        },
    },
    php: {
        files: ['*.php','../*.php'],
        options: {
            spawn: false,
            livereload: true
        }
    }
};