'use strict';
module.exports = function (grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // Define watch tasks
        watch: {
            options: {
                livereload: true
            },
            sass: {
                files: ['build/sass/**/*.scss', '!build/sass/admin/**/*.scss'],
                tasks: ['sass:front', 'autoprefixer:front', 'notify:sass']
            },
            sass_admin: {
                files: ['build/sass/admin/**/*.scss'],
                tasks: ['sass:admin', 'autoprefixer:admin', 'notify:sass_admin']
            },
            js: {
                files: ['build/js/**/*.js', '!build/js/admin/**/*.js'],
                tasks: ['uglify:front', 'notify:js']
            },
            js_admin: {
                files: ['build/js/admin/**/*.js'],
                tasks: ['uglify:admin', 'notify:js_admin']
            },
            livereload: {
                files: ['**/*.html', '**/*.php', 'build/images/**/*.{png,jpg,jpeg,gif,webp,svg}', '!**/*ajax*.php']
            }
        },

        // SASS
        sass: {
            options: {
                sourceMap: true
            },
            front: {
                files: {
                    'style.css': 'build/sass/main.scss'
                }
            },
            admin: {
                files: {
                    'admin.css': 'build/sass/admin/admin.scss'
                }
            }
        },

        // Auto prefix our CSS with vendor prefixes
        autoprefixer: {
            options: {
                map: true
            },
            front: {
                src: 'style.css'
            },
            admin: {
                src: 'admin.css'
            }
        },

        // Uglify and concatenate
        uglify: {
            options: {
                sourceMap: true
            },
            front: {
                files: {
                    'script.js': [
                        // Vendor files
                        'build/vendor/js/modernizr.js',
                        'build/vendor/js/fastclick.js',
                        'build/vendor/js/placeholder.js',
                        'build/vendor/js/jquery.cookie.js',
                        'build/vendor/js/foundation/foundation.core.js',
                        'build/vendor/js/foundation/foundation.util.mediaQuery.js',
                        'build/vendor/js/foundation/foundation.reveal.js',
                        // Included dynamically in header.php
                        '!build/vendor/js/html5.js',

                        // Theme scripts
                        'build/js/*.js'
                    ]
                }
            },
            admin: {
                files: {
                    'admin.js': [
                        'build/js/admin/**/*.js',
                        '!build/js/admin/customizer.js'
                    ],
                    'customizer.js': [
                        'build/js/admin/customizer.js'
                    ]
                }
            }
        },

        notify: {
            js: {
                options: {
                    title: '<%= pkg.name %>',
                    message: 'JS Complete'
                }
            },
            js_admin: {
                options: {
                    title: '<%= pkg.name %>',
                    message: 'JS Admin Complete'
                }
            },
            sass: {
                options: {
                    title: '<%= pkg.name %>',
                    message: 'SASS Complete'
                }
            },
            sass_admin: {
                options: {
                    title: '<%= pkg.name %>',
                    message: 'SASS Admin Complete'
                }
            }
        }

    });

    // Register our main task
    grunt.registerTask('default', ['watch']);
};