@include('admin/include/header')

<div class="page">
    <div class="page-main">

        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Post</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12  col-md-12">

                <form data-toggle="validator" method="post" action="{{ route('admin.post-store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title font-weight-bold">New Post:</div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Title" data-error="Please enter Title" value="{{old('title')}}" name="title" required>
                                        <div class="help-block with-errors error "></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Youtube URL<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="https://www.Youtube.com/"  data-error="Please enter Youtube URL"  value="{{old('youtube_url')}}" name="youtube_url" required>
                                        <span class="text-danger">  @error('youtube_url'){{$message}}@enderror</span>
                                        <div class="help-block with-errors error "></div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea rows="15" class="form-control"  placeholder="Description" data-error="Please enter Description" name="description" required>{{old('description')}}</textarea>
                                        <div class="help-block with-errors error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @include('admin/include/footer')
    </div>
</div>
</div>

</body>
