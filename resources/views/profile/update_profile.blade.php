@include('include.header')

<div class="py-4">
    <div class="container">
        <div class="row">

            <aside class="col-md-4">
                <div class="mb-3  rounded bg-white profile-box text-center w-10">
                    <div class="p-4 d-flex align-items-center">

                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $user->photo }}" style="width: 135px; height: 135px;" id="img_prv" class="img-fluid rounded-circle" alt="Responsive image">
                        <div class="p-4">
                            <label data-toggle="tooltip" data-placement="top" data-original-title="Upload New Picture" class="btn btn-info m-0" for="fileAttachmentBtn">
                                <i class="feather-image"></i>
                                <input id="fileAttachmentBtn" name="photo" type="file" class="d-none">
                            </label>
                            <!-- <button data-toggle="tooltip" data-placement="top" data-original-title="Delete" type="submit" class="btn btn-danger"><i class="feather-trash-2"></i></button> -->
                        </div>
                    </div>
                </div>
                <div class=" rounded bg-white mb-3">

                    <div class="box-body">
                        <div class="p-3 border-bottom">
                            <div class="form-group mb-4">
                                <label class="mb-1">ABOUT</label>
                                <div class="position-relative">
                                    <textarea class="form-control" rows="4" required name="text" placeholder="Enter Bio" id="about" name="about">{{ $user->about }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="overflow-hidden text-center p-3">
                            <a class="font-weight-bold btn btn-light rounded p-3 d-block save_bio"> SAVE </a>
                        </div>
                    </div>
                </div>
                <div class=" rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Social profiles</h6>
                        <p class="mb-0 mt-0 small">Add elsewhere links to your profile.
                        </p>
                    </div>
                    <div class="box-body">
                        <div class="p-3 border-bottom">
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-instagram position-absolute text-warning"></i>
                                <input placeholder="Add Instagram link" type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ $user->instagram_link }}">
                            </div>
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-facebook position-absolute text-primary"></i>
                                <input placeholder="Add Facebook link" type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ $user->facebook_link }}">
                            </div>
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-twitter position-absolute text-info"></i>
                                <input placeholder="Add Twitter link" type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ $user->twitter_link }}">
                            </div>
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-youtube position-absolute text-danger"></i>
                                <input placeholder="Add Youtube link" type="url" class="form-control" id="youtube_link" name="youtube_link" value="{{ $user->youtube_link }}">
                            </div>

                        </div>
                        <div class="overflow-hidden text-center p-3">
                            <a class="font-weight-bold btn btn-light rounded p-3 d-block save_social" href="#"> Update Social Profiles </a>
                        </div>
                    </div>
                </div>

                <div class=" rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Change Password</h6>

                    </div>
                    <div class="box-body">
                        <div class="p-3 border-bottom">
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-lock position-absolute"></i>
                                <input placeholder="Enter your old password" type="password" class="form-control" id="old_password" name="old_password" value="">
                            </div>
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-lock position-absolute"></i>
                                <input placeholder="Enter your new password" type="password" class="form-control" id="new_password" name="new_password" value="">
                            </div>
                            <div class="position-relative icon-form-control mb-2">
                                <i class="feather-lock position-absolute"></i>
                                <input placeholder="Enter your confirm password" type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
                            </div>


                        </div>
                        <div class="overflow-hidden text-center p-3">
                            <a class="font-weight-bold btn btn-light rounded p-3 d-block change_password" href="#">Update Password </a>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-md-8">
                <div class=" rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Edit Basic Info</h6>
                        <p class="mb-0 mt-0 small">Lorem ipsum dolor sit amet, consecteturs.
                        </p>
                    </div>
                    <div class="box-body p-3">
                        <form class="js-validate" novalidate="novalidate">
                            <div class="row">

                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label id="nameLabel" class="form-label">
                                            Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter your name" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                            <small class="form-text text-muted">Displayed on your public profile, notifications and other places.</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label id="emailLabel" class="form-label">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" readonly name="email" value="{{ $user->email }}" placeholder="Enter your email address" aria-label="Enter your email address" required="" aria-describedby="emailLabel" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <label class="form-label">
                                Birth date
                                <span class="text-danger">*</span>
                            </label>
                            <div class="row">

                                <div class="col-md-6 mb-3 mb-sm-6">
                                    <div class="js-form-message">
                                        <div class="form-group">
                                            <select class="form-control custom-select" id="b_month" name="b_month" required="" data-msg="Please select month." data-error-class="u-has-error" data-success-class="u-has-success">
                                                <option value="">Select month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>

                                            <script>
                                                $('#b_month').val('{{ $user->b_month }}');
                                            </script>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4 col-md-2 mb-3 mb-sm-6">
                                    <div class="js-form-message">
                                        <div class="form-group">
                                            <select class="form-control custom-select" id="b_date" name="b_date" required="" data-msg="Please select date." data-error-class="u-has-error" data-success-class="u-has-success">
                                                <option value="">Select date</option>
                                                <?php for ($i = 1; $i <= 31; $i++) {
                                                ?>
                                                    <option value="{{$i}}" @if($user->b_date == $i) selected @endif>{{$i}}</option>
                                                <?php
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4 col-md-2 mb-3 mb-sm-6">
                                    <div class="js-form-message">
                                        <div class="form-group">
                                            <select class="form-control custom-select" id="b_year" name="b_year" required="" data-msg="Please select year." data-error-class="u-has-error" data-success-class="u-has-success">
                                                <option value="">Select year</option>
                                                <?php for ($i = 1990; $i <= date('Y'); $i++) {
                                                ?>
                                                    <option value="{{$i}}" @if($user->b_year == $i) selected @endif>{{$i}}</option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4 col-md-2 mb-2">
                                    <div class="js-form-message">
                                        <div class="form-group">
                                            <select class="form-control custom-select" id="gender" name="gender" required="" data-msg="Please select your gender." data-error-class="u-has-error" data-success-class="u-has-success">
                                                <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
                                                <option value="Other" @if($user->gender == 'Other') selected @endif>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label id="organizationLabel" class="form-label">
                                            Headline
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="headline" name="headline" value="{{ $user->headline }}" placeholder="Enter your organization name" aria-label="Enter your organization name" required="" aria-describedby="organizationLabel" data-msg="Please enter your organization name" data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label id="locationLabel" class="form-label">
                                            Location
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="location" name="location" value="{{ $user->location }}" placeholder="Enter your location" aria-label="Enter your location" required="" aria-describedby="locationLabel" data-msg="Please enter your location." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label id="phoneNumberLabel" class="form-label">
                                            Phone number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <input class="form-control" id="phone" type="tel" name="phone" value="{{ $user->phone }}" placeholder="Enter your phone number" aria-label="Enter your phone number" required="" aria-describedby="phoneNumberLabel" data-msg="Please enter a valid phone number" data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6 mb-2">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Preferred language
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="form-group">
                                            <select class="custom-select" required id="language" name="language">
                                                <option value="">Select language</option>
                                                <option value="English" @if($user->language == 'English') selected @endif>English</option>
                                                <option value="Français" @if($user->language == 'Français') selected @endif>Français</option>
                                                <option value="Deutsch" @if($user->language == 'Deutsch') selected @endif>Deutsch</option>
                                                <option value="Português" @if($user->language == 'Português') selected @endif>Português</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </form>


                    </div>
                </div>

                <div class=" rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Education
                        </h6>
                        <p class="mb-0 mt-0 small">Tell about your education.
                        </p>
                    </div>
                    <div class="education-section">


                        @if(COUNT($user_education) > 0)
                        <?php $i = 0; ?>
                        @foreach($user_education as $row)
                        <div class="box-body px-3 pt-3 pb-0 education">
                            <a  href="#" data-toggle="tooltip" data-placement="top" data-original-title="Delete this education" class="ediucation-delete"><i class="feather-trash  text-danger"></i></a>
                            <div class="row clearfix">
                                <div class="col-sm-6 mb-4">
                                    <label id="FROM" class="form-label">FROM</label>

                                    <div class="input-group">
                                        <input type="month" class="form-control from" name="from[]" placeholder="From" value="{{ $row->from }}">
                                    </div>

                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="TO" class="form-label">TO</label>

                                    <div class="input-group">
                                        <input type="month" class="form-control to" name="to[]" value="{{ $row->to }}" placeholder="TO" aria-label="TO" aria-describedby="TO">
                                    </div>

                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6 mb-4">
                                    <label id="companyLabel" class="form-label">Institute</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control institute" value="{{ $row->institute }}" name="institute[]" placeholder="Enter your Institute" aria-label="Enter your company title" aria-describedby="companyLabel">
                                    </div>

                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="positionLabel" class="form-label">Position</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control position" value="{{ $row->position }}" name="position[]" placeholder="Enter your position" aria-label="Enter your position" aria-describedby="positionLabel">
                                    </div>

                                </div>
                            </div>
                            <hr />
                        </div>
                                                <?php $i++; ?>
                        @endforeach
                        @else
                        <div class="box-body px-3 pt-3 pb-0 education" id="car0">
                            <a style="display: none;" href="#" data-toggle="tooltip" data-placement="top" data-original-title="Delete this education" class="ediucation-delete"><i class="feather-trash  text-danger"></i></a>

                            <div class="row clearfix">
                                <div class="col-sm-6 mb-4">
                                    <label id="FROM" class="form-label">FROM</label>

                                    <div class="input-group">
                                        <input type="month" class="form-control from" name="from[]" placeholder="From">
                                    </div>

                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="TO" class="form-label">TO</label>

                                    <div class="input-group">
                                        <input type="month" class="form-control to" name="to[]" placeholder="TO" aria-label="TO" aria-describedby="TO">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <label id="companyLabel" class="form-label">Institute</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control institute" name="institute[]" placeholder="Enter your Institute" aria-label="Enter your company title" aria-describedby="companyLabel">
                                    </div>

                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label id="positionLabel" class="form-label">Position</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control position" name="position[]" placeholder="Enter your position" aria-label="Enter your position" aria-describedby="positionLabel">
                                    </div>

                                </div>
                            </div>
                            <hr />
                        </div>
                        @endif

                    </div>

                    <div class="col-lg-12 mb-4">
                        <a class="d-inline-block u-text-muted clone_education mb-4" href="#">
                            <span class="mr-1">+</span>
                            Add new education
                        </a>
                    </div>
                </div>

                <div class="mb-3 text-right">
                    <a class="font-weight-bold btn btn-link rounded p-3" href="{{ route('profile.index',Crypt::encryptString(auth()->user()->id)) }}"> &nbsp;&nbsp;&nbsp;&nbsp; Cancel &nbsp;&nbsp;&nbsp;&nbsp; </a>
                    <a class="font-weight-bold btn btn-primary rounded save_info" href="#"> &nbsp;&nbsp;&nbsp;&nbsp; Save Changes &nbsp;&nbsp;&nbsp;&nbsp; </a>
                </div>
            </main>
        </div>
    </div>
</div>
@include('profile.javascript')
@include('include.footer')