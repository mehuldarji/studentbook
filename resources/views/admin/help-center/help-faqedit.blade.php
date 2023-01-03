@include('admin/include/header')

<div class="page">
    <div class="page-main">

        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Edit Question</h4>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form data-toggle="validator" method="post" action="{{ route('admin.help-faqs-update',[$faqs_data[0]->id]) }}">
                    @csrf
                 <div class="card">
               <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <div class="form-group">
                                        <label class="form-label">Question<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Question" data-error="Please enter Question" value="{{$faqs_data[0]->question}}" name="question" required>
                                        <div class="help-block with-errors error "></div><br>
                                    </div>
                                    
                                </div>
                                
<!--                                <div class="col-sm-6 col-md-6">
                                     <div class="form-group">
                                        <label class="form-label">Answer<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Answer" data-error="Please enter Answer" value="{{$faqs_data[0]->answer}}" name="answer" required>
                                        <div class="help-block with-errors error "></div><br>
                                    </div>
                                    
                                </div>-->
                                
                            </div>
                   
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="card">
                                                    <div class="card-header">
                                                            <div class="card-title">Answer</div>
                                                    </div>
                                                    <div class="card-body">
                                                            <textarea class="content richText-initial" data-error="Please enter Answer" name="answer" >{{$faqs_data[0]->answer}}</textarea>
                                                    </div>
                                            </div>
                                    </div>
                            </div>

                            
                        </div>
                     
                <div class="card-footer text-right">
                    <a href="{{ route('admin.help-faqs-cancle',[$faqs_data[0]->category_id]) }}" class="btn btn-danger">Cancle</a>
                            <button class="btn btn-primary">Save</button>
                        </div>
            </div>
            </div>
        </div>


        @include('admin/include/footer')
    </div>
</div>
</div>

</body>
