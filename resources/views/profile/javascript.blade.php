<script>
    $(document).on('click', '.save_bio', function() {
        var about = $('#about').val();
        if (about == '') {
            showError('Your about is requierd!');
            return false;
        }

        var url = '{{ route("profile.save") }}';
        var peram = {
            about: about,
            type: 'about'
        };
        getDataByAjax(url, peram, 'POST', 'Save Successfully.');


    });
    $(document).on('click', '.save_social', function() {
        var youtube_link = $('#youtube_link').val();
        var twitter_link = $('#twitter_link').val();
        var facebook_link = $('#facebook_link').val();
        var instagram_link = $('#instagram_link').val();
        if (youtube_link == '' && twitter_link == '' && facebook_link == '' && instagram_link == '') {
            showError('Please enter any one url before save!');
            return false;
        }

        var url = '{{ route("profile.save") }}';
        var peram = {
            youtube_link: youtube_link,
            twitter_link: twitter_link,
            facebook_link: facebook_link,
            instagram_link: instagram_link,
            type: 'social'
        };
        getDataByAjax(url, peram, 'POST', 'Save Successfully.');


    });
    $(document).on('click', '.change_password', function() {
        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        if (old_password == '' && new_password == '' && confirm_password == '') {
            showError('Please enter all password field before save!');
            return false;
        }

        if (new_password != confirm_password) {
            showError('Password and confirm password does not match, please enter same password!');
            return false;
        }

        var url = '{{ route("profile.save") }}';
        var peram = {
            old_password: old_password,
            new_password: new_password,
            type: 'password'
        };
        getDataByAjax(url, peram, 'POST', 'Password change Successfully.');
        $('#old_password').val('');
        $('#new_password').val('');
        $('#confirm_password').val('');


    });

    $(document).on('click', '.save_info', function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var b_month = $('#b_month').val();
        var b_date = $('#b_date').val();
        var b_year = $('#b_year').val();
        var gender = $('#gender').val();
        var headline = $('#headline').val();
        var location = $('#location').val();
        var phone = $('#phone').val();
        var language = $('#language').val();
        var from = $("input[name='from[]']").map(function() {
            return $(this).val();
        }).get();
        var to = $("input[name='to[]']").map(function() {
            return $(this).val();
        }).get();
        var institute = $("input[name='institute[]']").map(function() {
            return $(this).val();
        }).get();
        var position = $("input[name='position[]']").map(function() {
            return $(this).val();
        }).get();
        if (name == '' && email == '' && headline == '' && location == '' && phone == '' && language == '' && b_month == '' && b_date == '' && b_year == '' && gender == '') {
            showError('Please enter any one field value before save!');
            return false;
        }



        checkValidation('name');
        checkValidation('email');
        checkValidation('b_month');
        checkValidation('b_date');
        checkValidation('b_year');
        checkValidation('gender');
        checkValidation('headline');
        checkValidation('location');
        checkValidation('phone');
        checkValidation('language');


        var url = '{{ route("profile.save") }}';
        var peram = {
            name: name,
            email: email,
            b_month: b_month,
            b_date: b_date,
            b_year: b_year,
            gender: gender,
            headline: headline,
            location: location,
            phone: phone,
            language: language,
            to: to,
            from: from,
            institute: institute,
            position: position,
            type: 'info'
        };
        if (name != '' && email != '' && headline != '' && location != '' && phone != '' && language != '' && b_month != '' && b_date != '' && b_year != '' && gender != '') {
            getDataByAjax(url, peram, 'POST', 'Save Successfully.');

        }
        window.location.reload();


    });


    $('#fileAttachmentBtn').on('change', function(ev) {
        console.log("here inside");

        var filedata = this.files[0];
        var imgtype = filedata.type;

        console.log(filedata);
        var match = ['image/jpeg', 'image/jpg', 'image/png'];

        if ((imgtype != match[0]) && (imgtype != match[1]) && (imgtype != match[2])) {
            showError('Please select a valid type image..only jpg jpeg allowed!');

        } else {




            //---image preview

            var reader = new FileReader();

            reader.onload = function(ev) {
                $('#img_prv').attr('src', ev.target.result);
            }
            reader.readAsDataURL(this.files[0]);

            /// preview end

            //upload

            var postData = new FormData();
            postData.append('photo', this.files[0]);
            postData.append('type', 'img');

            var url = '{{ route("profile.save") }}';

            getDataByAjaxImage(url, postData, 'POST', 'Save Successfully.');


        }

    });


    // $(document).on('click', '.clone_education', function() {
    //     var educationUI = $('.education:first').clone();
    //     var clone = educationUI.clone();
    //     $('.education-section').append(clone);
    //     $("html, body").animate({
    //         scrollTop: $(document).height()
    //     }, 1000);
    //     $('.education:last input').val('');
    // });
    $(document).on('click', '.clone_education', function() {
        var $div = $('div[id^="car"]:last');
        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
        var $klon = $div.clone().prop('id', 'car' + num);
        $klon.insertAfter($div);
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
        $('#car'+num+' a').show();
        $('#car'+num+' input').val('');



    });


    $(document).on('click', '.ediucation-delete', function() {
        $(this).parents('.education').remove();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });
</script>