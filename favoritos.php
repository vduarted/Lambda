<!DOCTYPE html>
<html>

<head>
    <title>Página Modelo</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!--  Meu CSS  -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- Menu -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>
    <!-- Barra de pesquisa -->
    <div class="container barraPesquisa">
        <div class="row">
            <div id="custom-search-input">
                <div class="input-group col-md-10 col-md-offset-1">
                    <input type="text" class="  search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
<button class="btn btn-danger" type="button">
<span class=" glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!--  Galeria de filmes  -->
    <ul class="grid cs-style-4">
        <li>
            <figure>
                <div><img src="img/5.png" alt="img05"></div>
                <figcaption>
                    <h3>Safari</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1116775-Safari">Take a look</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/6.png" alt="img06"></div>
                <figcaption>
                    <h3>Game Center</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1118904-Game-Center">Take a look</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/2.png" alt="img02"></div>
                <figcaption>
                    <h3>Music</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1115960-Music">Take a look</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/4.png" alt="img04"></div>
                <figcaption>
                    <h3>Settings</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1116685-Settings">Take a look</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/1.png" alt="img01"></div>
                <figcaption>
                    <h3>Camera</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1115632-Camera">Take a look</a>
                </figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <div><img src="img/3.png" alt="img03"></div>
                <figcaption>
                    <h3>Phone</h3>
                    <span>Jacob Cummings</span>
                    <a href="http://dribbble.com/shots/1117308-Phone">Take a look</a>
                </figcaption>
            </figure>
        </li>
    </ul>
    <!--  Rodapé  -->
    <footer>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12">
                <div class="container-fluid">
                    <div class="col-lg-3">
                        <div class="cuadro_intro_hover " style="background-color:#cccccc;">
                            <p style="text-align:center; margin-top:20px;">
                                <img src="http://placehold.it/500x330" class="img-responsive" alt="">
                            </p>
                            <div class="caption">
                                <div class="blur"></div>
                                <div class="caption-text">
                                    <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">THIS IS H3</h3>
                                    <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                                    <a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="cuadro_intro_hover " style="background-color:#cccccc;">
                            <p style="text-align:center; margin-top:20px;">
                                <img src="http://placehold.it/500x330" class="img-responsive" alt="">
                            </p>
                            <div class="caption">
                                <div class="blur"></div>
                                <div class="caption-text">
                                    <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">THIS IS H3</h3>
                                    <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
                                    <a class=" btn btn-default" href="#"><span class="glyphicon glyphicon-plus"> INFO</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3>Categories:</h3>
                        <ul>
                            <li><a href=""><i class="fa fa-file"></i> News</a></li>
                            <li><a href=""><i class="fa fa-android"></i> Android</a></li>
                            <li><a href=""><i class="fa fa-code"></i> C#</a></li>
                            <li><a href=""><i class="fa fa-code"></i> Java</a></li>
                            <li><a href=""><i class="fa fa-book"></i> Books</a></li>
                            <li><a href=""><i class="fa fa-globe"></i> Web</a></li>
                            <li><a href=""><i class="fa fa-windows"></i> Windows</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3>Contact:</h3>
                        <p>Have a question or feedback? Contact me!</p>
                        <p><a href="" title="Contact me!"><i class="fa fa-envelope"></i> Contact</a></p>
                        <h3>Follow:</h3>
                        <a href="" id="gh" target="_blank" title="Twitter"><span class="fa-stack fa-lg">
                            <i class="fa fa-square-o fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x"></i>
                            </span>
                            Twitter</a>
                        <a href="" target="_blank" title="GitHub"><span class="fa-stack fa-lg">
                            <i class="fa fa-square-o fa-stack-2x"></i>
                            <i class="fa fa-github fa-stack-1x"></i>
                            </span>
                            GitHub</a>
                    </div>
                    <br/>
                    <div id="fb-root"></div>
                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));

                    </script>
                    <div class="fb-like" data-href="" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="">Tweet</a>
                    <script>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0],
                                p = /^http:/.test(d.location) ? 'http' : 'https';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + '://platform.twitter.com/widgets.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'twitter-wjs');

                    </script>
                    <div class="g-plusone" data-annotation="inline" data-width="300" data-href=""></div>
                    <!-- Helyezd el ezt a címkét az utolsó +1 gomb címke mögé. -->
                    <script type="text/javascript">
                        (function() {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();

                    </script>
                    <br/>
                    <hr>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <p>Copyright © Your Website | <a href="">Privacy Policy</a> | <a href="">Terms of Use</a></p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Jquery Js 2.24 -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Js -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Modernizr -->
    <script src="js/modernizr.custom.js"></script>
    <!-- Js personalizado -->
    <script src="js/script.js"></script>
</body>

</html>
