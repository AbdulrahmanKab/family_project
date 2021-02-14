<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/theme/images/favicon.png">
    <title>Family website</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap" rel="stylesheet">
    <!-- end font -->

    <link rel="stylesheet" href="/theme/css/bootstrap.css">
    <link rel="stylesheet" href="/theme/css/font-awesome.css">
    <link rel="stylesheet" href="/theme/css/fakeLoader.css">
    <link rel="stylesheet" href="/theme/css/owl.carousel.css">
    <link rel="stylesheet" href="/theme/css/owl.theme.default.css">
    <link rel="stylesheet" href="/theme/css/magnific-popup.css">
    <link rel="stylesheet" href="/theme/css/style.css">
    <link rel="stylesheet" href="{{asset('asset/admin/css/jHTree.css')}}" >
    <link rel="stylesheet" href="{{asset('styleFont.css')}}">
    <style>
        #tree{
            width:100%!important;
        }
        .tree ul {
            text-align:center;
            width:100%
        }
        #zmrval,.zmrcntr{
            display:none;
        }
        img{
            width:70px!important;
            height: 60px!important;
        }
        .ui-droppable:hover >  img{
           width:100px!important;
           height:100px!important;
            transition:0.3s;

       }
        .ui-droppable:hover > .ui-widget-content{
           font-size:2em!important;
            transition:0.3s;
       }
        .ui-corner-br{
            margin-top: 0.5em;
        }
        .tree li {
            float: left;
            /* display: inline-block; */
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 23px 30px 0 30px
        }
    </style>
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
            <a href="/" class="navbar-brand">
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
                        <a href="/" class="nav-link">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</header>
<!-- end header -->

<!-- about -->
<div class="container-fluid">
    <div class="row">
        <div id="tree"></div>
    </div>
</div>
<!-- end contact -->

<!-- footer -->
<div class="footer segments">
    <div class="container">
        <div class="box-content">
            <p>Copyright © All Right Reserved</p>
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
<script src="{{asset("asset/admin/js/jquery-ui-1.10.4.custom.min.js")}}"></script>
<script src="{{asset("asset/admin/js/jQuery.jHTree.js")}}"></script>
<script>
    $(document).on('click','.show-tree',function (){
        $("#tree_modal").modal("show")
        let id = $(this).attr('data-route')

    })
    $.ajax({
        url:"/show/tree",
        success:function(data)
        {
            var jsonStructureObject = [data['data']];
            $("#tree").html("")
            $("#tree").jHTree({
                callType: 'obj',
                structureObj: jsonStructureObject
            });
        }
    });
</script>
</body>

</html>
