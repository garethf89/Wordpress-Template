module.exports = {
    options: {
        mangle: false
    },
    js: {
        files: {
            '<%= paths.dest.js %>/build/production.min.js' : [
                        '<%= paths.src.js %>/build/production.js'
                    ]
        }
    }
};