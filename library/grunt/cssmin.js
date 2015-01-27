module.exports = {

    //MINIFY
    my_target: {
        files: [{
            expand: true,
            cwd: '<%= paths.src.css %>/',
            src: ['style.css'],
            dest: '<%= paths.dest.css %>/build',
            ext: '.min.css'
            }]
    }


};