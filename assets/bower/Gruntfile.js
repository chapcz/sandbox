module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt, {pattern: ['grunt-*']});

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

		src: 'assets-src',
        www: '..',
        bower: 'bower_components',
        js: '<%= src %>/js',
        jsDist: '<%= www %>/js',
        css: '<%= src %>/css',
        cssDist: '<%= www %>/css',
        images: '<%= src %>/images',
        imagesDist: '<%= www %>/images',
        fonts: '<%= cssDist %>/fonts',
        rootCopy: '../../www',

        less: {
            options: {
                paths: [
                    '<%= css %>',
                    '<%= bower %>'
                ],
                relativeUrls: true
            },
            admin: {
                options: {
                    compress: true
                },
                files: {
                    '<%= cssDist %>/admin.min.css': [
                        '<%= bower %>/ublaboo-datagrid/assets/dist/datagrid.min.css',
                        '<%= bower %>/ublaboo-datagrid/assets/dist/datagrid-spinners.min.css',
                        '<%= bower %>/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
                        '<%= bower %>/happy/dist/happy.min.css',
                        '<%= bower %>/typeahead.js-bootstrap3.less/typeahead.css',
                        '<%= bower %>/fullcalendar/dist/fullcalendar.min.css',

                    ]
                }
            },
            front: {
                options: {
                    compress: true
                },
                files: {
                    '<%= cssDist %>/front.min.css': [
                        '<%= bower %>/font-awesome/less/font-awesome.less',
                        '<%= bower %>/bootstrap/less/bootstrap.less',
                    ]
                }
            }
        },		  

		
        copy: {
            dev: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= bower %>/bootstrap/fonts/',
                        src: ['**'],
                        dest: '<%= rootCopy %>/fonts'
                    },
                    {
                        expand: true,
                        cwd: '<%= bower %>/font-awesome/fonts/',
                        src: ['**'],
                        dest: '<%= rootCopy %>/fonts'
                    },
                    {
                        expand: true,
                        cwd: '<%= bower %>/tinymce/skins/',
                        src: ['**'],
                        dest: '<%= rootCopy %>/webtemp/skins'
                    },

			]
            }
        },
        concat: {
            front: {
                files: {
                    '<%= jsDist %>/front.min.js': [
                        '<%= bower %>/jquery/dist/jquery.min.js',
                        '<%= bower %>/nette-forms/src/assets/netteForms.js',
                        '<%= bower %>/bootstrap/dist/js/bootstrap.min.js',
                        '<%= bower %>/bootbox/bootbox.js',
                        '<%= bower %>/nette.ajax.js/nette.ajax.js',
                        '<%= bower %>/nette.ajax.js/extensions/spinner.js',
                        '<%= bower %>/nette.ajax.js/extensions/spinner.ajax.js',
                        '<%= bower %>/nette.ajax.js/extensions/scrollTo.ajax.js',
                        '<%= bower %>/typeahead.js/dist/typeahead.jquery.min.js',

                    ]
                }
            },
            admin: {
                files: {
                    '<%= jsDist %>/admin.min.js': [
                        '<%= bower %>/bootbox/bootbox.js',
                        '<%= bower %>/nette.ajax.js/nette.ajax.js',
                        '<%= bower %>/nette.ajax.js/extensions/spinner.js',
                        '<%= bower %>/nette.ajax.js/extensions/spinner.ajax.js',
                        '<%= bower %>/nette.ajax.js/extensions/scrollTo.ajax.js',
                        '<%= bower %>/typeahead.js/dist/typeahead.jquery.min.js',
                        '<%= bower %>/ublaboo-datagrid/assets/dist/datagrid.min.js',
                        '<%= bower %>/ublaboo-datagrid/assets/dist/datagrid-spinners.min.js',
                        '<%= bower %>/nette-live-form-validation/live-form-validation.js',
                        '<%= bower %>/bootstrap-maxlength/src/bootstrap-maxlength.js',
                        '<%= bower %>/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                        '<%= bower %>/bootstrap-datepicker/dist/locales/bootstrap-datepicker.cs.min.js',
                        '<%= bower %>/bootstrap-datepicker/dist/locales/bootstrap-datepicker.en.min.js',
                        '<%= bower %>/bootstrap-datepicker/dist/locales/bootstrap-datepicker.de.min.js',
                        '<%= bower %>/happy/dist/happy.min.js',
                        '<%= bower %>/jquery-ui-sortable/jquery-ui-sortable.min.js',
                        '<%= bower %>/typeahead.js/dist/typeahead.bundle.min.js',
                        '<%= bower %>/moment/min/moment.min.js',
                        '<%= bower %>/fullcalendar/dist/fullcalendar.min.js',
                        '<%= bower %>/fullcalendar/dist/lang/cs.js',
                        '<%= bower %>/fullcalendar/dist/lang/de.js',
                        '<%= bower %>/fullcalendar/dist/lang/en.js',
                        '<%= bower %>/tinymce/tinymce.min.js',
                        '<%= bower %>/tinymce/jquery.tinymce.min.js',
                        '<%= bower %>/tinymce/themes/modern/theme.min.js',


                    ]
                }
            }

        },
        uglify: {
            options: {
                banner: '/*! Auto minified file <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            front: {
                files: {
                    '<%= jsDist %>/front.min.js': ['<%= jsDist %>/front.min.js']
                }
            },
            admin: {
                files: {
                    '<%= jsDist %>/admin.min.js': ['<%= jsDist %>/admin.min.js']
                }
            },
        }

    });



};
