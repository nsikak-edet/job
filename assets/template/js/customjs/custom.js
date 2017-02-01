$(document).ready(function () {

    $('#loginForm').submit(function (e) {
        var formData = $('#loginForm').serialize();
        var formURL = $('#loginForm').attr('action');

        //clear errors
        $('.username_error').html('');
        $('.pass_error').html('');

        //ajax process of form login
        $.ajax({
            type: "POST",
            url: formURL,
            data: formData,
            beforeSend: function () {
                $('#login').html('processing...');
            },
            success: function (data) {
                if (data.status == 'FAIL') {
                    $('.username_error').html(data.username);
                    $('.pass_error').html(data.pass);

                } else if (data.status == 'SUCCESS') {
                    //redirect user on successful login
                    window.location = data.redirect_url;
                }
                $('#login').html('Login');
            },
            error: function (data) {
                $('.username_error').html('error occured!');
                $('#login').html('Login');
            }
        });

        e.preventDefault();
    });

    //activate summernote
    var summernote = $('.summernote').summernote({
        height: 150,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,
        toolbar: [
            ['edit', ['undo', 'redo']],
            ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript']],
            ['para', ['ul', 'ol']]
        ]
    });

    tinymce.init({
        selector: '.tinymcetext',
        toolbar: 'undo redo | bold italic | underline | bullist | subscript | superscript',
        plugins: 'lists advlist',
        height: 300,
        menubar: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    tinymce.init({
        selector: '.tinymcetext_small',
        toolbar: 'undo redo | bold italic | underline | bullist | subscript | superscript',
        plugins: 'lists advlist',
        height: 180,
        menubar: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    $('#newAdvertForm').submit(function (e) {
        var formData = $('#newAdvertForm').serialize();
        var formURL = $('#newAdvertForm').attr('action');

        //clear errors from view
        $('.error').html('');

        //ajax process of form login
        $.ajax({
            type: "POST",
            url: formURL,
            data: formData,
            beforeSend: function () {
//                    $('#login').html('processing...');
            },
            success: function (data) {
                if (data.status == 'FAIL') {
                    $.each(data.errors, function (key, value) {
                        $('.' + value.key + '_error').html(value.data);
                    });
                } else if (data.status == 'SUCCESS') {
                    //redirect user on successful login
                    window.location = data.redirect_url;
                }
            },
            error: function (data) {
            }
        });

        e.preventDefault();
    });

    //initialize date picker
    $('#expiration_date').datepicker({});

    /***
     * process resume details data
     */
    $('#resumeDetails').submit(function (e) {

        var formData = $('#resumeDetails').serialize();
        var formURL = $('#resumeDetails').attr('action');

        //clear errors from view
        $('.error').html('');

        //ajax process of form login
        $.ajax({
            type: "POST",
            url: formURL,
            data: formData,
            beforeSend: function () {
                $('.resumeDetails').block({
                    message: '<h5>Processing... Please wait...</h5>',
                    css: {border: '1px solid #a00'}
                });
            },
            success: function (data) {
                if (data.status == 'FAIL') {
                    $.each(data.errors, function (key, value) {
                        $('.' + value.key + '_error').html(value.data);
                    });
                } else if (data.status == 'SUCCESS') {
                    //redirect user on successful login
                    $("#resume_success_msg").css({display: "block"});
                }
                $('.resumeDetails').unblock();
            },
            error: function (data) {
                $('.resumeDetails').unblock();
            }
        });

        e.preventDefault();
    });


    /***
     * process resume education
     */
    $('#employeeEducation').submit(function (e) {

        var formData = $('#employeeEducation').serialize();
        var formURL = $('#employeeEducation').attr('action');

        //clear errors from view
        $('.error').html('');

        //ajax process of form login
        $.ajax({
            type: "POST",
            url: formURL,
            data: formData,
            beforeSend: function () {
                $('.employeeEducation').block({
                    message: '<h5>Processing... Please wait...</h5>',
                    css: {border: '1px solid #a00'}
                });
            },
            success: function (data) {
                if (data.status == 'FAIL') {
                    $.each(data.errors, function (key, value) {
                        $('.' + value.key + '_error').html(value.data);
                    });
                } else if (data.status == 'SUCCESS') {
                    //redirect user on successful login
                    $("#edu_success_msg").css({display: "block"});
                }
                $('.employeeEducation').unblock();
            },
            error: function (data) {
                $('.employeeEducation').unblock();
            }
        });

        e.preventDefault();
    });


    /***
     * process resume experience
     */
    $('#employeeExperience').submit(function (e) {

        var formData = $('#employeeExperience').serialize();
        var formURL = $('#employeeExperience').attr('action');

        //clear errors from view
        $('.error').html('');

        //ajax process of form login
        $.ajax({
            type: "POST",
            url: formURL,
            data: formData,
            beforeSend: function () {
                $('.employeeExperience').block({
                    message: '<h5>Processing... Please wait...</h5>',
                    css: {border: '1px solid #a00'}
                });
            },
            success: function (data) {
                if (data.status == 'FAIL') {
                    $.each(data.errors, function (key, value) {
                        $('.' + value.key + '_error').html(value.data);
                    });
                } else if (data.status == 'SUCCESS') {
                    //redirect user on successful login
                    $("#exp_success_msg").css({display: "block"});
                }
                $('.employeeExperience').unblock();
            },
            error: function (data) {
                $('.employeeExperience').unblock();
            }
        });

        e.preventDefault();
    });
});
