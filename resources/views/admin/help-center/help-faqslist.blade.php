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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Category Name</div>
                        <div class="card-options">
                            <a class="btn btn-primary" href="{{ route('admin.help-faqs-add',[$id]) }}">Add Question</a>
                        </div>
                    </div>
                      <div class="card-body">
                        <div class="table-responsive">
                                {{$dataTable->table(['class' =>'table table-bordered text-wrap '])}}
                                {{ $dataTable->scripts() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('admin/include/footer')
    </div>
</div>
</div>

</body>
