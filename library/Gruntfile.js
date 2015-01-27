module.exports = function (grunt) {

	var data = {
		pkg: grunt.file.readJSON('package.json'),
		paths: {
			src:{
				root:"",
				css:"css",
				scss:"scss",
				js:"js",
				img:"images",
                php:"./"
			},
			dest:{
				root:"",
                scss:"scss",
				css:"css",
				js:"js",
				img:"images",
                php:"../"
			}
    }
	};
    
    // measures the time each task takes
    require('time-grunt')(grunt);
    
    require('load-grunt-config')(grunt,{data: data});
};