@include('landing.header')
<style>
    button {
        font-size: 15px !important;
        color: #fff !important;
        font-weight: bold !important;
        background-color: #2586c5c9 !important;
    }

    .bg-primary {
        background-color: #0172bcdb !important;
    }

    .border-top {
        font-size: 14px;
        letter-spacing: 1px;
        text-align: justify;
    }

    .card-btn-arrow {
        display: inline-block;
        color: #fff;
    }
</style>
<div class="bg-primary pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center mx-auto my-4">

                <div class="mb-4">
                    <h1 class="display-4 text-white mb-0">How can we <span class="font-weight-bold">help?</span></h1>
                </div>

                <form class="input-group input-group-lg input-group-borderless mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-0" id="askQuestions">
                            <span class="feather-search"></span>
                        </span>
                    </div>
                    <input id="SerachQuestion" type="search" class="form-control border-0 shadow-none" placeholder="Search any question here.." aria-label="Ask a question" aria-describedby="askQuestions">
                </form>




            </div>
        </div>
    </div>
</div>
<div class="py-4">
    <div class="container mx-auto col-md-8">

        <div class="row">

            <div class="col-md-12">
                <?php $it = 0; ?>
                @if(COUNT($faqsArray) > 0)
                @foreach($faqsArray as $row)
                <div id="<?= $row['category_name'] ?>" style="    margin-bottom: 20px;">

                    <div class="mb-3 mt-0">
                        <h4 class="font-weight-semi-bold"><?= $row['category_name'] ?></h4>
                    </div>

                    @if(COUNT($row['faq']) > 0)
                    <?php $i = 0; ?>
                    @foreach($row['faq'] as $rows)
                    <div id="<?= $row['category_name'] ?>Accordion" class="faq">

                        <div class="box shadow-sm border rounded bg-white mb-2">
                            <div id="<?= $row['category_name'] ?>Heading<?= $it . $i ?>">
                                <h5 class="mb-0">
                                    <button class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed" data-toggle="collapse" data-target="#<?= $row['category_name'] ?>Collapse<?= $it . $i ?>" aria-expanded="false" aria-controls="<?= $row['category_name'] ?>Collapse<?= $it . $i ?>">
                                        <?= $rows->question ?>
                                        <span class="card-btn-arrow">
                                            <span class="feather-chevron-down"></span>
                                        </span>
                                    </button>
                                </h5>
                            </div>
                            <div id="<?= $row['category_name'] ?>Collapse<?= $it . $i ?>" class="collapse" aria-labelledby="<?= $row['category_name'] ?>Heading<?= $it . $i ?>" data-parent="#<?= $row['category_name'] ?>Accordion" style="">
                                <div class="card-body border-top p-3 text-muted">
                                    <?= $rows->answer ?>
                                </div>
                            </div>
                        </div>



                    </div>
                    <?php $i++; ?>
                    @endforeach
                    @endif
                </div>
                <?php $it++; ?>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@include('landing.footer')

<script>
    $("#SerachQuestion").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $(".faq").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>