@extends('layout.app')
@section('content')
<style>
    body {
    font-family: 'Poppins', sans-serif;
  }
  
  .pl-150 {
    padding-left: 150px;
  }
  
  .copyright {
    padding: 70px 0 0 0;
  }
  
  .copyright p {
    text-align: center;
    font-weight: 400;
    color: #6F6A86;
  }
  
  .header-third {
    font-size: 22px;
    color: #211B3D;
    font-weight: 600;
  }
  
  .subheader {
    font-size: 16px;
    font-weight: 400;
    color: #5B5575;
  }
  
  .login-user .right {
    width: 50%;
    float: left;
    padding: 120px;
  }
  
  .login-user .right .people {
    margin-top: 100px;
    height: 170px;
  }
  
  .login-user .right .logo {
    height: 42px;
    margin-bottom: 100px;
  }
  
  .login-user .right .btn-border {
    border: 1px solid #E7E5F4;
    border-radius: 50px;
    padding: 12px 80px 12px 80px;
  }
  
  .login-user .right .btn-google-login {
    margin-top: 40px;
  }
  
  .login-user .right .btn-google-login .icon {
    margin-right: 8px;
  }
  
  .login-user .left {
    background-color: #4D1CAB;
    width: 50%;
    min-height: 900px;
    text-align: center;
    float: left;
  }
  
  .login-user .left img {
    margin-top: 200px;
    height: 540px;
  }
  
  .testimonials {
    background: #F7F7FB;
    margin-top: 370px;
    padding: 70px 0 70px 0;
  }
  
  .testimonials .item-review {
    border-radius: 13px;
    background: #fff;
    padding: 20px;
  }
  
  .testimonials .item-review .message, .testimonials .item-review .user .info .role {
    font-size: 16px;
    font-weight: 400;
    color: #5B5575;
    line-height: 30px;
    min-height: 90px;
    margin-top: 30px;
  }
  
  .testimonials .item-review .user {
    margin-top: 30px;
  }
  
  .testimonials .item-review .user .photo {
    width: 56px;
    height: 56px;
    float: left;
    margin-right: 16px;
  }
  
  .testimonials .item-review .user .info {
    padding-top: 5px;
  }
  
  .testimonials .item-review .user .info .name {
    color: #211B3D;
    font-weight: 500;
    font-size: 18px;
    margin-bottom: 0;
  }
  
  .testimonials .item-review .user .info .role {
    min-height: 0;
    margin-top: 0;
    margin-bottom: 0;
  }
  
  .pricing {
    margin-top: 100px;
    background: #4D1DAB;
    padding-top: 70px;
    max-height: 620px;
  }
  
  .pricing .copywriting {
    margin-top: 80px;
  }
  
  .pricing .support {
    font-size: 16px;
    font-weight: 400;
    color: #CBB0FF;
    line-height: 30px;
    margin-top: 30px;
  }
  
  .pricing .table-pricing {
    background: #fff;
    border-radius: 40px;
    padding: 30px;
    border: 1px solid #EAE8F5;
  }
  
  .pricing .table-pricing .price {
    font-size: 42px;
    font-weight: 600;
    color: #211B3D;
    margin-bottom: 20px;
  }
  
  .pricing .table-pricing .item-benefit-pricing img {
    float: left;
    margin-right: 8px;
    margin-top: 2px;
  }
  
  .pricing .table-pricing .item-benefit-pricing p {
    font-size: 16px;
    font-weight: 500;
    color: #211B3D;
  }
  
  .pricing .table-pricing .item-benefit-pricing .divider {
    height: 1px;
    width: 100%;
    background: #E7E5F4;
  }
  
  .pricing .paket-gila {
    min-height: 697px;
  }
  
  .pricing .paket-biasa {
    min-height: 453px;
  }
  
  .clear {
    clear: both;
  }
  
  .steps .item-step .cover {
    height: 497px;
  }
  
  .steps .item-step .copywriting {
    padding-top: 100px;
  }
  
  .steps .item-step .support {
    font-size: 16px;
    font-weight: 400;
    color: #5B5575;
    line-height: 30px;
    margin-top: 30px;
  }
  
  .btn-master, .btn-thirdty, .btn-primary, .btn-secondary {
    padding: 11px 36px 11px 36px;
    border-radius: 100px;
    border: 0;
    font-weight: 500;
  }
  
  .btn-thirdty {
    background: #31B380;
    color: #fff;
  }
  
  .btn-primary {
    background: #7839F3;
    color: #fff;
  }
  
  .btn-primary:hover {
    background: #31B380;
  }
  
  .story {
    font-weight: 600;
    font-size: 16px;
    color: #31B380;
  }
  
  .primary-header {
    font-weight: 600;
    font-size: 30px;
    color: #211B3D;
  }
  
  .benefits {
    margin-bottom: 100px;
  }
  
  .benefits .item-benefit .icon {
    width: 56px;
    height: 56px;
    margin-bottom: 20px;
  }
  
  .benefits .item-benefit .title {
    font-size: 20px;
    color: #211B3D;
    font-weight: 500;
  }
  
  .benefits .item-benefit .support {
    font-size: 16px;
    font-weight: 400;
    color: #5B5575;
    line-height: 30px;
  }
  
  .pb-70 {
    padding-bottom: 70px;
  }
  
  .header-wrap .primary-header {
    margin-top: 8px;
  }
  
  .header-wrap .story {
    margin-bottom: 0;
  }
  
  .text-purple {
    color: #7839F3;
  }
  
  .text-white {
    color: #fff !important;
  }
  
  .btn-secondary {
    background: #F5EFFF;
    color: #7839F3;
  }
  
  .banner {
    padding: 80px 0 80px 0;
  }
  
  .banner .copywriting {
    padding-top: 80px;
  }
  
  .banner .header {
    margin: 20px 0 20px 0;
    font-size: 42px;
    color: #211B3D;
    font-weight: 600;
  }
  
  .banner .support {
    font-size: 16px;
    font-weight: 400;
    color: #5B5575;
    line-height: 30px;
  }
  
  .banner .cta {
    margin-top: 30px;
  }
  
  .banner .brands {
    margin-top: 60px;
  }
  
  .banner .brands img {
    height: 30px;
  }
  
  .basic-form input {
    border: 1px solid #E7E5F4;
    border-radius: 50px;
    padding: 12px 20px 12px 20px;
  }
  
  .checkout {
    padding-top: 80px;
    padding-bottom: 80px;
  }
  
  .checkout .item-bootcamp .cover {
    height: 255px;
    margin-bottom: 30px;
  }
  
  .checkout .item-bootcamp .package {
    font-size: 22px;
    color: #31B380;
    font-weight: 600;
  }
  
  .checkout .item-bootcamp .description {
    font-size: 16px;
    color: #211B3D;
    font-weight: 400;
    line-height: 30px;
  }
  
  .navbar {
    box-shadow: 1px 8px 61px 0px rgba(22, 28, 51, 0.08);
    -webkit-box-shadow: 1px 8px 61px 0px rgba(22, 28, 51, 0.08);
    -moz-box-shadow: 1px 8px 61px 0px rgba(22, 28, 51, 0.08);
    padding: 24px 0 24px 0;
  }
  
  .navbar .user-logged a {
    color: #211B3D;
    text-decoration: none;
  }
  
  .navbar .user-logged .user-photo {
    width: 56px;
    height: 56px;
    margin-left: 10px;
  }
  
  .navbar .navbar-nav .nav-link {
    color: #211B3D;
    font-weight: 400;
    padding-left: 30px;
  }
  
  .navbar .navbar-nav .active {
    color: #7839F3 !important;
    font-weight: 500;
  }
  
  .navbar .navbar-brand img {
    height: 42px;
  }
  /*# sourceMappingURL=main.css.map */
</style>
    <section class="steps">
        <div class="container">
            <div class="row item-step pb-70">
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{ asset('img/step1.png') }}" class="cover" alt="">
                </div>
                <div class="col-lg-6 col-12 text-left copywriting">
                    <p class="story">
                        BETTER CAREER
                    </p>
                    <h2 class="primary-header">
                        Prepare The Journey
                    </h2>
                    <p class="support">
                        Learn from anyone around the <br> world and get a new skills
                    </p>
                    <p class="mt-5">
                        <a href="#" class="btn btn-master btn-secondary me-3">
                            Learn More
                        </a>
                    </p>
                </div>
            </div>
            <div class="row item-step pb-70">
                <div class="col-lg-6 col-12 text-left copywriting pl-150">
                    <p class="story">
                        STUDY HARDER
                    </p>
                    <h2 class="primary-header">
                        Finish The Project
                    </h2>
                    <p class="support">
                        Each of you will be joining the private group and also <br> working together with team members on
                        project
                    </p>
                    <p class="mt-5">
                        <a href="#" class="btn btn-master btn-secondary me-3">
                            View Demo
                        </a>
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{ asset('img/step2.png') }}" class="cover" alt="">
                </div>

            </div>

        </div>
    </section>
@endsection
