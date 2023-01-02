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
                
                <form data-toggle="validator" method="post" action="{{ route('admin.post-update',[$posts[0]->id]) }}">
                    @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Post Update:</div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$posts[0]->title}}" placeholder="Title" data-error="Please enter Title" name="title" required>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Youtube URL</label>
                                    <input type="text" class="form-control"  value="{{$posts[0]->youtube_link}}" placeholder="https://www.Youtube.com/" data-error="Please enter Youtube URL"  name="youtube_url" required>
                                    <div class="help-block with-errors error"></div>
                                    <span class="text-danger">  @error('youtube_url'){{$message}}@enderror</span>
                                </div>
                            </div>


                        </div>
                        
                        
                        <div class="row">
                                    <div class="col-md-12">
                                            <div class="card">
                                                    <div class="card-header">
                                                            <div class="card-title">Description</div>
                                                    </div>
                                                    <div class="card-body">
                                                            <textarea class="content richText-initial" name="description"  description>{{$posts[0]->desc}}</textarea>
                                                    </div>
                                            </div>
                                    </div>
                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Updated</button>
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
