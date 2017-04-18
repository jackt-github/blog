<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jack</title>
    <link rel="shortcut icon" href="/images/JA.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- stylesheet css -->
    {{--<link rel="stylesheet" href="css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo-blue.css">
</head>
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-wordpress">
        <span class="sk-inner-circle"></span>
    </div>
</div>

<!-- header section -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="images/tw.jpg" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
                <hr>
                <h1 class="tm-title bold shadow">Hi, I am Jack</h1>
                <h1 class="white bold shadow">PHP Learner</h1>
            </div>
        </div>
    </div>
</header>
<!-- about and skills section -->
<section class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="about">
                <h2><a href="{{ Route::currentRouteName() }}/blog" class="accent">博客</a></h2>
                <h2><a href="#contact" class="accent">联系我</a></h2>
                <h2><a href="#" class="accent">关于</a></h2>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="skills">
                <h2 class="white">技能</h2>
                <strong>PHP MySQL</strong>
                <span class="pull-right">60%</span>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar"
                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                </div>
                <strong>HTML / CSS / JAVASCRIPT</strong>
                <span class="pull-right">45%</span>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar"
                         aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
                <strong>Laravel</strong>
                <span class="pull-right">35%</span>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" role="progressbar"
                         aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
<!-- education and languages -->
<section class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="education">
                <h2 class="white">教育程度</h2>
                <div class="education-content">
                    <h4 class="education-title accent">杭州电子科技大学</h4>
                    <div class="education-school">
                        <h5>自动化专业</h5><span></span>
                        <h5>2014级本科在读</h5>
                    </div>
                    <p class="education-description">作为自动化专业学生，接触PHP开发后坚持学习，以成为PHP开发工程师为短期目标，这是我的个人网站，我将在这里记录我的学习与生活</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="languages">
                <h2>掌握语言</h2>
                <ul>
                    <li>中文</li>
                    <li>English</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- contact and experience -->
<section class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="contact" >
                <h2>联系我</h2>
                <p><span class="glyphicon glyphicon-map-marker"></span> 浙江杭州下沙杭州电子科技大学</p>
                <p><span class="glyphicon glyphicon-earphone"></span> 13750898075</p>
                <p><span class="glyphicon glyphicon-envelope"></span> tw.jackt@gmail.com</p>
                <p><span class="glyphicon glyphicon-home"></span> <a href="http://jackt.cn">jackt.cn</a></p>
                <p><span class="glyphicon glyphicon-globe"></span> <a href="https://github.com/jackt-github">https://github.com/jackt-github</a></p>
                <a name="contact"></a>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="experience">
                <h2 class="white">学习经历</h2>
                <div class="experience-content">
                    <h4 class="experience-title accent">网站开发</h4>
                    <p class="education-description">2016年8月接触网站开发至今，不间断地学习了html、css、javascript、jquery、php、mysql等。努力成为一名PHP软件工程师</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy jackt.cn</p>
            </div>
        </div>
    </div>
</footer>

<!-- javascript js -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>