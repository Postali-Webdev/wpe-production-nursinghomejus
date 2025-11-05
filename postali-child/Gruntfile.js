module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		jshint: {
			options: {
				force: true
			},
			all: ['assets/js/src/*.js']
		},
		
		// Add new js files from the /assets/js/src/ directory to be compiled as well as what they should be output as
		uglify: {
			min: {
				files: {
					'assets/js/scripts.min.js': ['assets/js/src/scripts.js'],
					'assets/js/slick-custom.min.js': ['assets/js/src/slick-custom.js'],
					'assets/js/home.min.js': ['assets/js/src/home.js'],
					'assets/js/smooth-scroll-custom.min.js': ['assets/js/src/smooth-scroll-custom.js'],
                    'assets/js/fitvids.min.js': ['assets/js/src/jquery.fitvids.js']
				}
			}
		},

		sass: {
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none'
				  },
				  files: { // Dictionary of files // 'destination': 'source'
					'assets/css/styles.css': 'assets/sass/styles.scss',      
					'assets/css/slick.css': 'assets/sass/slick.scss'
				  }
			}
		},

		// This can be run as a watch task which looks for changes to files and compiles in real time
		watch: {
			css: {
				files: ['assets/sass/*.scss'],
				tasks: ['sass'],
			},
			scripts: {
				files: ['assets/js/src/*.js'],
				tasks: ['jshint', 'concat', 'uglify']
			},
		},

	});

	// Load tasks
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task(s).
	grunt.registerTask('default', ['jshint', 'uglify', 'sass']);

};