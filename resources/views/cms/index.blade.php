@include('landing.header')
<style>
    button {
        font-size: 16px !important;
        color: #0172BD !important;
        font-weight: bold !important;
    }

    .bg-primary {
        background-color: #0172bcdb !important;
    }
    .border-top{
        font-size: 14px;
    letter-spacing: 1px;
    text-align: justify;
    }
    div{
        font-size: 15px;
    }
    div,
    p,
    h3{
        font-family: "Poppins", Arial, Helvetica, sans-serif !important;
    }
</style>
<div class="py-5 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                <h1 class="text-white font-weight-light"><span style="text-transform: capitalize;" class="font-weight-bold">{{ $recode->page_name }}</span> </h1>
                
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="bg-white p-5 shadow-sm box border rounded" style="white-space: pre-line; text-align: justify;">
                {!! $recode->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('landing.footer')