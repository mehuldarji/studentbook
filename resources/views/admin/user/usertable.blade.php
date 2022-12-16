@include('admin/include/header')

<div class="page">
    <div class="page-main">

        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">User List</h4>
                <!--<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
<!--                    <div class="card-header">
                        <div class="card-title">User List</div>
                        <div class="card-options">
                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                    </div>-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example-1" class="table table-striped table-bordered text-nowrap">
                                {{$dataTable->table()}}
                                {{ $dataTable->scripts() }}
                            </table>
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

