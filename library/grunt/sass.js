module.exports = {
    dist: {
        files: [
            {
                expand: true,
                cwd: "sass/folder",
                src: ["**/*.sass"],
                dest: "<%= paths.dest.css %>",
                ext: ".css"
                }
            ]
    }
};