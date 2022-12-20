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
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Post List</div>
                        <div class="card-options">
                            <a class="btn btn-primary" href="{{ route('admin.post-form')  }}">Add Post</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top">
                            <table class="table table-bordered  text-wrap">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Title</th>
                                        <th>Youtube Link</th>
                                        <th>Description</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($posts as $posts)

                                    <tr>

                                        <td>{{$posts->user_id}}</td>
                                        <td>{{$posts->title}}</td>
                                        <td>{{$posts->youtube_link}}</td>
                                        <td>{{$posts->desc}}</td>
                                        <td>
                                            <a href="{{ route('admin.post-edit',[$posts->id]) }}"><i class="fe fe-edit"></i></a>
                                            <a href="{{ route('admin.post-delete',[$posts->id]) }}" id="delete"><i class="fe fe-trash-2" style="color:red"></i></a>
                                        </td>

                                        @endforeach

                                    </tr>
                                </tbody>
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
