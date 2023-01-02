@include('landing.header')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
    })
</script>
<div class="profile-cover text-center" data-aos="zoom-in">
    <img class="img-fluid" src="{{ asset('img/company-profile.jpg')}}" alt="">
</div>
<section class="section">
    <div class="feat bg-gray pt-5 pb-5">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="section-head col-sm-12" style="margin-bottom: 0;">
                    <h4><span>About Us</span> Student Book</h4>
                    <p>AI Student Book (AISC) is a collaborative initiative by the Central Board of Secondary Education (CBSE), the apex body under the Central Government’s Ministry of Education and Intel India.</p>
                </div>
                <div class="col-lg-12 text-center about-Home">

                    <div class="row mtb-30">
                        <div class="col-lg-6" data-aos="fade-right">
                            <img src="{{ asset('img/about-us.png')}}" alt="img" style="width: 300px;">
                        </div>
                        <div class="col-lg-6" data-aos="fade-left">
                            <p class="mb-2 text-left lead aboutDesc">
                                Student Book (AISC) has been envisaged to help build a digital-first mindset and support an AI-Ready generation. It has been designed as a youth-driven Book of practice enabling collaborative learning, sharing, and creating real-life social impact AI solutions.
                                <br> An online Book for students from all across the country, providing a platform for learning, sharing experiences and leveraging their knowledge to create AI-enabled social impact solutions along with spreading AI awareness in an inclusive way.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section" style="background: #edf2f669;">
    <div class="feat bg-gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="section-head col-sm-12">
                    <h4><span>Why Choose</span> Us?</h4>
                    <p>When you choose us, you'll feel the benefit of 10 years' experience of Web Development. Because we know the digital world and we know that how to handle it. With working knowledge of online, SEO and social media.</p>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="item"> <span class="icon feature_box_col_one"><i class="fa fa-globe"></i></span>
                        <h6>Connect and Collaborate</h6>
                        <p>We use latest technology for the latest world because we know the demand of peoples.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="item"> <span class="icon feature_box_col_two"><i class="fa fa-anchor"></i></span>
                        <h6>Learn SB</h6>
                        <p>We are always creative and and always lisen our costomers and we mix these two things and make beast design.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-right">
                    <div class="item"> <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
                        <h6>Get Access to the right resources</h6>
                        <p>If our customer has any problem and any query we are always happy to help then.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-left">
                    <div class="item"> <span class="icon feature_box_col_four"><i class="fa fa-database"></i></span>
                        <h6>Participate in Online challenges</h6>
                        <p>Everyone wants to live on top of the mountain, but all the happiness and growth occurs while you're climbing it</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-left">
                    <div class="item"> <span class="icon feature_box_col_five"><i class="fa fa-upload"></i></span>
                        <h6>Discuss, Deliberate & Share</h6>
                        <p>Holding back technology to preserve broken business models is like allowing blacksmiths to veto the internal.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-left">
                    <div class="item"> <span class="icon feature_box_col_six"><i class="fa fa-camera"></i></span>
                        <h6>Build social impact solutions</h6>
                        <p>Love is a special word, and I use it only when I mean it. You say the word too much and it becomes cheap.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@include('landing.footer')