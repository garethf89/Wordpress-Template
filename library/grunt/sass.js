module.exports = {
    dist: {
	    options: {
		    compass:true
	    },
        files: [
            {
                expand: true,
                cwd: "<%= paths.src.scss %>",
                src: "style.scss",
                dest: "<%= paths.dest.css %>",
                ext: ".css"
                }
            ]
    },
    /* foundation: {
	    options: {
		    compass:true
	    },
        files: [
            {
                expand: true,
                cwd: "<%= paths.src.scss %>",
                src: "*.scss",
                dest: "<%= paths.dest.css %>",
                ext: ".css"
                }
            ]
    }, */
    admin: {
	    options: {
		    compass:true
	    },
        files: [
            {
                expand: true,
                cwd: "<%= paths.src.scss %>",
                src: "login.scss",
                dest: "<%= paths.dest.css %>",
                ext: ".css"
                }
            ]
    }
};