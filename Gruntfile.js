module.exports = function (grunt) {

  const postcssFiles = [];
  const browserifyFiles = {};
  const sassFiles = {
    'web/assets/css/dist/global.css': 'web/assets/sass/global.scss'
  };

  const appJS = [
    {name: 'global.app.js', bundle: 'globalBundle'}
  ]

  for (let js of appJS) {
    browserifyFiles[js.name] = {
      files: [{
        expand: true,
        src: [js.name],
        cwd: 'web/assets/es6/',
        ext: '.min.js',
        extDot: 'first',
        dest: 'web/assets/js/dist'
      }],
      options: {
        transform: [['babelify', {presets: ['es2015']}]],
        browserifyOptions: {
          standalone: js.bundle
        },
      }
    }
  }

  grunt.initConfig({

    copy: {
      css: {
        src: [
          'node_modules/bootstrap/dist/css/bootstrap.min.css',
        ],
        expand: true,
        flatten: true,
        cwd: '',
        dest: 'web/assets/css/dist',
      },
      js: {
        src: [
          'node_modules/axios/dist/axios.min.js',
          'node_modules/bootstrap/dist/js/bootstrap.min.js',
          'node_modules/jquery/dist/jquery.min.js',
          'node_modules/lodash/lodash.min.js',
          'node_modules/popper.js/dist/popper.min.js',
        ],
        expand: true,
        flatten: true,
        cwd: '',
        dest: 'web/assets/js/dist',
      },
      mdi: {
        src: ['**'],
        expand: true,
        cwd: 'node_modules/mdi/fonts',
        dest: 'web/assets/fonts/dist/mdi',
      }
    },

    // SASS Compile css
    sass: {
      main: {
        options: {
          outputStyle: 'expanded',
          sourcemap: false,
        },
        files: sassFiles
      },
      min: {
        options: {
          outputStyle: 'compressed',
          sourcemap: false
        },
        files: sassFiles
      },
    },

    // PostCss Autoprefixer
    postcss: {
      options: {
        processors: [
          require('autoprefixer')({
            browsers: [
              'last 2 versions',
              'Chrome >= 30',
              'Firefox >= 30',
              'ie >= 10',
              'Safari >= 8']
          })
        ]
      },
      main: {
        src: postcssFiles
      },
    },

    browserify: browserifyFiles,

    // Clean
    clean: {
      js: {
        src: 'web/assets/js/dist'
      },
      css: {
        src: 'web/assets/css/dist'
      },
      fonts: {
        src: 'web/assets/fonts/dist'
      }
    },

    //Watch for any files changes
    watch: {
      sass: {
        files: ['web/assets/sass/**/*'],
        tasks: ['sass:main'],
        options: {
          interrupt: false,
          spawn: false,
        },
      },
      es6: {
        files: ['web/assets/es6/**/*'],
        tasks: ['browserify'],
        options: {
          interrupt: false,
          spawn: false,
        },
      }
    },

    //Concurrent
    concurrent: {
      options: {
        logConcurrentOutput: true,
        limit: 10,
      },
      monitor: {
        tasks: ['watch:sass', 'watch:es6']
      },
    },
  })

  // load the tasks
  grunt.loadNpmTasks('grunt-contrib-watch')
  grunt.loadNpmTasks('grunt-contrib-copy')
  grunt.loadNpmTasks('grunt-sass')
  grunt.loadNpmTasks('grunt-contrib-concat')
  grunt.loadNpmTasks('grunt-contrib-uglify')
  grunt.loadNpmTasks('grunt-contrib-clean')
  grunt.loadNpmTasks('grunt-concurrent')
  grunt.loadNpmTasks('grunt-notify')
  grunt.loadNpmTasks('grunt-text-replace')
  grunt.loadNpmTasks('grunt-browser-sync')
  grunt.loadNpmTasks('grunt-postcss')
  grunt.loadNpmTasks('grunt-babel')
  grunt.loadNpmTasks('grunt-browserify')

  // define the tasks
  grunt.registerTask('build', ['clean', 'copy', 'sass:main', 'browserify'])
  grunt.registerTask('min', ['clean', 'copy', 'sass:min', 'browserify'])
  grunt.registerTask('monitor', ['concurrent:monitor'])
}