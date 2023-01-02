@include('admin/include/header')

<div class="page">
    <div class="page-main">

        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Help Center</h4>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form data-toggle="validator" method="post" action="{{ route('admin.help-update',[$faq_categorie[0]->id]) }}">
                    @csrf
                 <div class="card">
               <div class="card-body">
                           <div class="row">
                                <div class="col-sm-6 col-md-6">
                                     <div class="form-group">
                                        <label class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" data-error="Please enter name"  value="{{$faq_categorie[0]->name}}" name="name" required>
                                        <div class="help-block with-errors error "></div><br>
                                    </div>
                                    
                                </div>
                                
                            </div>

                            
                        </div>
                     
                <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
            </div>
            </div>
        </div>


        @include('admin/include/footer')
    </div>
</div>
</div>

</body>
