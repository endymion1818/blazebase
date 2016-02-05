module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
  sass: {
    dist: {
      options: {
        style: 'compressed',
      },
      files: {
        'assets/css/styles.css': 'assets/src/sass/theme.scss'
      }
    }
  },
  postcss: {
    options: {
        map: true,
        processors: [
            require('autoprefixer-core')({
                browsers: ['last 2 versions']
            })
        ]
    },
    dist: {
        src: 'assets/css/*.css'
    }
  },
  cssmin: {
   target: {
    files: {
      'assets/css/styles.min.css': ['assets/css/styles.css']
      }
    }
  },
  concat: {
    js: {
      files: {
        'assets/js/project-headerscripts.js': ['assets/src/js/header/.js'],
        'assets/js/project-footerscripts.js': ['assets/src/js/footer/*.js'],
      },
    },
  },
  uglify: {
    my_target: {
      files: {
        'assets/js/project-headerscripts.min.js': ['assets/js/project-headerscripts.js'],
        'assets/js/project-footerscripts.min.js': ['assets/js/project-footerscripts.js']
      }
    }
  },
  jshint: {
    beforeconcat: ['assets/src/js/*.js'],
  },
  imagemin: {
    dynamic: {
      files: [{
        expand: true,
        cwd: 'assets/src/img/', 
        src: ['**/*.{png,jpg,gif,svg}'], 
        dest: 'assets/img/'
      }]
    }
  }
});

  // Load the plugin that provides the tasks.
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  // grunt.loadNpmTasks('grunt-contrib-imagemin');
  
  // Default task(s).
  grunt.registerTask('default', [
    'sass',
    'postcss',
    'cssmin',
    'uglify',
    'concat',
    'jshint'
    // 'imagemin'
    ]);

};
