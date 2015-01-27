   module.exports =  {

       //COMBINE FILES
           js: {
               src: [
                    '<%= paths.src.js %>/scripts.js',
                    '<%= paths.src.js %>/app.js'
                ],
               dest: '<%= paths.dest.js %>/build/production.js',
           },
           libs: {
               src: [
                    'bower_components/foundation/js/vendor/jquery.js',
                    'bower_components/foundation/js/vendor/mordernizr.js',
                    'bower_components/foundation/js/vendor/fastclick.js'
                ],
               dest: '<%= paths.dest.js %>/build/libs.js',
           }
   };