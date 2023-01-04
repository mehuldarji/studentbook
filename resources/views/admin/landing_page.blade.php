
@include('admin/include/header')

<div class="page">
    <div class="page-main">

        <!--<div class="app-sidebar__overlay" data-toggle="sidebar"></div>-->
        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Landing Page</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form data-toggle="validator" method="POST" class="card" action="{{ route('admin.update-page') }}" enctype="multipart/form-data" >
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                @foreach($websitetables as $websitetable)
                                <label class="form-label">Logo</label>
                                <img src="{{ asset('/assets_admin/upload/')}}/{{$websitetable->logo }}" alt="Brand Logo"  height="190" style="border:solid 1px #F0F2F7;">
                                <input type="text"  name="id" value="{{$websitetable->id}}" hidden />
                               
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <label class="form-label">Logo Update</label>
                                <input type="file" class="dropify" name="logo" data-height="180" />
                            </div>
                           
                            <div class="col-lg-6 col-sm-4">
                                <label class="form-label">Landing Image</label>
                                <img src="{{ asset('/assets_admin/upload/')}}/{{$websitetable->landing_image }}" alt="Landing Image" height="190"style="border:solid 1px #F0F2F7;" > 
                            </div>
                            

                            <div class="col-lg-2 col-sm-4">
                                <label class="form-label">upload Landing Image</label>
                                <input type="file" class="dropify" name="landing_image" data-height="180" />
                            </div>

                           

                            <div class="col-lg-6 col-sm-4">
                                <br><label class="form-label">About</label>
                                <textarea type="text" class="form-control" style="height: 200px" name="about" >{{$websitetable->about}}</textarea>
                            </div>

                            <div class="col-lg-6 col-sm-4">
                                <br><label class="form-label">About Description</label>
                                <textarea type="text" class="form-control" style="height: 200px" name="about_description" >{{$websitetable->about_description}}</textarea>
                            </div>
                            
<!--                            <div class="col-lg-7 col-sm-4 form-group">
                                <br><label class="form-label">About</label>
                                <textarea type="text" class="form-control" data-error="Please enter About" style="height: 200px" name="about" required></textarea>
                                <div class="help-block with-errors error"></div>
                            </div>

                            <div class="col-lg-5 col-sm-4 form-group">
                                <br><label class="form-label">About Description</label>
                                <textarea type="text" class="form-control" style="height: 200px" data-error="Please enter About Description" name="about_description" required ></textarea>
                                <div class="help-block with-errors error"></div>
                            </div>-->

                            
                        </div><br><p>
                            <label class="form-label">Footer Text</label>
                            <input class="form-control" type="text" name="footer_text" value="{{$websitetable->footer_text}}" placeholder="Footer Text" required>
                            @endforeach
                        <div class="float-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>

            </div>
            </form>
        </div>
        @include('admin/include/footer')

    </div>

</div>
</div>
</div>




</body>