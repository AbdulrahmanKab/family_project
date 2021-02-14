<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/theme/images/favicon.png">
    <title>موقع العائلة</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap" rel="stylesheet">
    <!-- end font -->
    <link rel="stylesheet" href="{{asset('asset/css/sweetalert.css')}}">
    <link rel="stylesheet" href="/theme/css/bootstrap.css">
    <link rel="stylesheet" href="/theme/css/font-awesome.css">
    <link rel="stylesheet" href="/theme/css/fakeLoader.css">
    <link rel="stylesheet" href="/theme/css/owl.carousel.css">
    <link rel="stylesheet" href="/theme/css/owl.theme.default.css">
    <link rel="stylesheet" href="/theme/css/magnific-popup.css">
    <link rel="stylesheet" href="/theme/css/style.css">
    <link rel="stylesheet" href="{{asset('styleFont.css')}}">
</head>

<body>

<!-- loader -->
<div class="fakeLoader"></div>
<!-- loader -->

<!-- header -->
<header id="home" class="mb-5">

    <!-- navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <!-- navbar brand or logo -->
            <a href="#" class="navbar-brand">
                <h2>العائلة</h2>
            </a>
            <!-- end navbar brand or logo -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarTogglerDemo" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="/" class="nav-link">الصفحة الرئيسية</a>
                    </li>

                    <li class="nav-item">
                        <a href="/tree" class="nav-link">شجرة العائلة</a>
                    </li>

                    <li class="nav-item">
                        <a href="/#contact" class="nav-link">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end navbar -->

    <!-- home intro -->
    <div class="home-intro segments">
        <div class="container">
            <div class="intro-content box-content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="intro-caption text-center">

                            <h2>صور العائلة</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="intro-image">
                            <img src="/theme/images/intro-image.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home intro -->

</header>
<!-- end header -->

<!-- about -->
<div id="about" class="about segments mt-5 pt-5">
    <div class="container">
        <div class="box-content">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content-left">
                        <div class="section-title section-title-left text-right">

                        </div>
                        <div class="content pt-5">
                            <h2 class="text-right">عن العائلة</h2>
                            <p>أبجد هوز حطي كلمن سعفص قرشت ثخذ ضظغ أبجد هوز حطي كلمن سعفص قرشت ثخذ ضظغ أبجد هوز حطي كلمن سعفص قرشت ثخذ ضظغ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content-right"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end about -->


<!-- contact -->
<div id="contact" class="contact segments">
    <div class="container">
        <div class="box-content">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content-left">
                        <div class="section-title section-title-left text-right">
                            <h3>تواصل معنا</h3>
                        </div>
                        <h2 class="text-right">الرجاء تعبئة كافة الحقول </h2>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content-right">
                        <form action="contact-form.php" class="contact-form" id="contact_us" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div id="first-name-field">
                                        <input type="text" placeholder="الاسم الأول" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="last-name-field">
                                        <input type="text" placeholder="الاسم الاخير" class="form-control" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="email-field">
                                        <input type="email" placeholder="الايميل" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="subject-field">
                                        <input type="text" placeholder="الموضوع" class="form-control"name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="message-field">
                                        <textarea cols="30" rows="5" class="form-control" id="form-message" name="message" placeholder="الرسالة"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="button submit" type="submit" id="submit" name="submit">ارسال الرسالة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact -->

<!-- footer -->
<div class="footer segments">
    <div class="container">
        <div class="box-content">
            <p>Copyright © جميع الحقوق محفوظة</p>
        </div>
    </div>
</div>
<!-- end footer -->

<script src="/theme/js/jquery.min.js"></script>
<script src="/theme/js/bootstrap.min.js"></script>
<script src="/theme/js/fakeLoader.min.js"></script>
<script src="/theme/js/owl.carousel.min.js"></script>
<script src="/theme/js/jquery.filterizr.min.js"></script>
<script src="/theme/js/imagesloaded.pkgd.min.js"></script>
<script src="/theme/js/jquery.magnific-popup.min.js"></script>
<script src="/theme/js/contact-form.js"></script>
<script src="/theme/js/main.js"></script>
<script src="{{asset('asset/js/sweetalert.js')}}"></script>
<script>

</script>
<script>
    $(document).on('click','.submit',function (event){
        event.preventDefault()
        let form = document.getElementById("contact_us")
        let formData =  new FormData(form);
        // console.log(formData);
        $.ajax({
            url:"/send/contactmessage",
            method:'post',
            data: formData,
            dataType:'json',
            success:function (){
                Swal.fire({
                    icon: 'success',
                    title: 'شكرا لك على وقتك',
                })

                $(".reset").val('')

            },
            contentType: false,
            cache: false,
            processData: false,

        })
    })
</script>
</body>

</html>
