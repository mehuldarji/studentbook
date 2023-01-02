@include('admin/include/header')

<div class="page">
    <div class="page-main">

        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Cms</h4>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12  col-md-12">

                <form data-toggle="validator" method="post" action="{{ route('admin.cms-update',[$cms[0]->id]) }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title font-weight-bold">New Cms:</div>
                            <div class="row">
                               
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <label class="form-label">Page Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Page Name" data-error="Please enter Page Name" value="{{$cms[0]->page_name}}" name="page_name" required>
                                        <div class="help-block with-errors error "></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="card">
                                                    <div class="card-header">
                                                            <div class="card-title">Content</div>
                                                    </div>
                                                    <div class="card-body">
                                                            <textarea class="content richText-initial" name="content" >{{$cms[0]->content}}</textarea>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
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
