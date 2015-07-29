   module.exports =  {

       //COMBINE FILES
           js: {
               src: [
                    '<%= paths.src.js %>/scripts.js'
                ],
               dest: '<%= paths.dest.js %>/build/production.js',
           },
           libs: {
               src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/fastclick/lib/fastclick.js',
                    'bower_components/modernizr/modernizr.js',
                   'bower_components/Stickyfill/dist/stickyfill.min.js'
                ],
               dest: '<%= paths.dest.js %>/build/libs.js',
           }
   };