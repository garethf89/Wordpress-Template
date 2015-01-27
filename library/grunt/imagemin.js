module.exports = {
    images: {
        files: [{
            expand: true,
            cwd: '<%= paths.src.img %>/originals',
            src: ['**/*.{png,jpg}'],
            dest: '<%= paths.dest.img %>/'
                }]
    }
};