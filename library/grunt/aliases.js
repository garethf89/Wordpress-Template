module.exports = function (grunt) {

    grunt.registerTask('default', ['watch']);
    
    grunt.registerTask('build', ['sass','concat', 'uglify','cssmin','imagemin']);
    
};