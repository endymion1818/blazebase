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
        'assets/js/project-criticalscripts.js': ['assets/src/js/critical/*.js'],
        'assets/js/project-noncriticalscripts.js': ['assets/src/js/noncritical/*.js'],
      },
    },
  },
  uglify: {
    my_target: {
      files: {
        'assets/js/project-criticalscripts.min.js': ['assets/js/project-criticalscripts.js'],
        'assets/js/project-noncriticalscripts.min.js': ['assets/js/project-noncriticalscripts.js']
      }
    }
  },
  watch: {
  scripts: {
    files: ['assets/src/js/*.js', 'assets/src/sass/*.scss'],
    tasks: ['sass', 'postcss', 'cssmin', 'concat', 'uglify'],
    options: {
      spawn: false,
    },
  },
}
});

  // Load the plugin that provides the tasks.
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', [
    'sass',
    'postcss',
    'cssmin',
    'concat',
    'uglify',
    'watch'
    ]);

};
