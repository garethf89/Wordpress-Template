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
        tasks: ['sass:dist', 'sass:admin', 'autoprefixer', 'cssmin'],
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