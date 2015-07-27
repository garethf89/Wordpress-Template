module.exports = {

    //MINIFY
    my_css: {
        files: [{
            expand: true,
            cwd: '<%= paths.src.css %>',
            src: 'style.css',
            dest: '<%= paths.dest.css %>/build',
            ext: '.min.css'
            }]
    }
};