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

		concat: {
			dist: {
				src: ['assets/js/src/sripts.js'],
				dest: 'assets/js/scripts.min.js'
			}
		},

		uglify: {
			min: {
				files: {
					'assets/js/scripts.min.js': ['assets/js/src/scripts.js']
				}
			}
		},

		sass: {
			dist: {
				files: [{
					expand: true,
					cwd: 'styles',
					src: ['assets/scss/*.scss'],
					dest: 'assets/css/',
					ext: '.css'
				  }]
			}
		  },

		watch: {
			scripts: {
				files: ['assets/js/src/*.js'],
				tasks: ['assets/jshint', 'concat', 'uglify']
			},
			styles: {
				files: ['assets/sass/*.scss'],
				tasks: ['sass'],
				options: {
					livereload: true
				},
			},
		},

	});

	// Load tasks
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Default task(s).
	grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'sass', 'watch']);

};