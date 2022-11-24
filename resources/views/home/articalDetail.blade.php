@include('include.header')
<style>
.articleDetail img{
    width: 100% !important;
    object-fit: cover;
}
.bg-primary {
    background-color: #0172BD !important;
}
.fa-arrow-left{
    animation: tilt-shaking 0.25s linear infinite;
}
@keyframes tilt-shaking {
  0% { transform: rotate(0deg); }
  25% { transform: rotate(5deg); }
  50% { transform: rotate(0eg); }
  75% { transform: rotate(-5deg); }
  100% { transform: rotate(0deg); }
}
    </style>
<div class="py-5 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2 class="text-white font-weight-light">{!! $article->title !!}</h2>
                <p class="mb-2 text-white-50">Last modified: {{date('F, D Y', strtotime($article->created_at))}}
                </p>
                <a href="/home" style="color:#fff;font-weight:bold"><i class="fa fa-arrow-left"></i> &nbsp; &nbsp;Back to home </a>
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="blog-card padding-card box shadow-sm rounded bg-white mb-3 border-0">

                    <div class="card-body articleDetail" >
                        {!! $article->desc !!}
                    </div>

                </div>
                <div class="padding-card reviews-card box shadow-sm rounded bg-white mb-3 border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">3 Reviews</h5>
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded" src="{{ asset('img/user/1.jpg')}}" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Stave Martin <small>Feb 12, 2020</small>
                                    
                                </h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="padding-card box shadow-sm rounded bg-white mb-3 border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Leave a Comment</h5>
                        <form name="sentMessage">
                            
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Review <span class="text-danger">*</span></label>
                                    <textarea rows="10" cols="100" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@include('include.footer')