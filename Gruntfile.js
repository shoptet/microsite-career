module.exports = function(grunt) {

    require("load-grunt-tasks")(grunt);

    var pkg = grunt.file.readJSON('package.json');

    grunt.initConfig({
        sass: {
            production: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'dist/css/main.css': '_scss/main.scss'
                }
            }
        },
        watch: {
            css: {
                files: [
                    '_scss/*.scss',
                    '_scss/modules/*.scss',
                    '../assets/shoptet.scss',
                    '../assets/shoptet/*.scss'
                ],
                tasks: ['sass:production']
            },
            js: {
                files: [
                    '_js/*.js',
                    '../assets/shoptet/js/*.js'
                ],
                tasks: ['uglify:production']
            }
        },
        uglify: {
            production: {
                options: {
                    mangle: false,
                    compress: true
                },
                files: {
                    'dist/js/build.js': pkg.jsFiles
                }
            }
        },
        copy: {
            production: {
                files: {
                    'dist/css/splide.min.css': 'node_modules/@splidejs/splide/dist/css/splide.min.css'
                }
            }
        }
    });

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['uglify-js', 'compile-css', 'copy-css']);
    grunt.registerTask('uglify-js', ['uglify:production']);
    grunt.registerTask('compile-css', ['sass:production']);
    grunt.registerTask('copy-css', ['copy:production']);

};
