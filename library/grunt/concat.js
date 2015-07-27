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
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/fastclick/lib/fastclick.js',
                    'bower_components/modernizr/modernizr.js',
                    'bower_components/foundation/js/foundation/foundation.js',
                    'bower_components/foundation/js/foundation/foundation.topbar.js'
                ],
               dest: '<%= paths.dest.js %>/build/libs.js',
           }
   };