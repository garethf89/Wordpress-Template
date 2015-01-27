module.exports = {
    scripts: {
        files: ['js/**/*.js', 'js/**/*.json'],
        tasks: ['concat:js', 'concat:libs','uglify'],
        options: {
            spawn: false,
        },
    },
    css: {
        files: ['css/*.css', 'css/*.scss'],
        tasks: ['sass', 'concat:css', 'cssmin'],
        options: {
            spawn: false,
        },
    }
};