<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/reset.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/grid.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   


    <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <![endif]-->
</head>
<body id="page1">
    <div class="extra">
        <!--==============================header=================================-->
        <header>
            <div class="row-top">
                <div class="main">
                    <div class="wrapper">
                        <h1><a href="index.html">Advertising Site</a></h1>
                        <form id="search-form" method="post" enctype="multipart/form-data">
                            
                        <fieldset>  
                            <div class="search-field">

                                <input name="search" type="text" value="Search..." onBlur="if(this.value=='') this.value='Search...'" onFocus="if(this.value =='Search...' ) this.value=''" />
                                
                                <a class="search-button" href="#" onClick="document.getElementById('search-form').submit()"></a>    
                            </div>  

                        </fieldset>
                        <button type="button" class="btn btn-primary" id = "btn-login">Login</button> 
                                <button type="button" class="btn btn-primary" id="btn-sign-up">Signup</button>

                    </form>
                    </div>
                </div>
            </div>
            <div class="menu-row">
                <div class="menu-bg">
                    <div class="main">
                        <nav class="indent-left">
                            <ul class="menu wrapper">
                                <li class="active"><a href="advertising.html">Advertising</a></li>
                                <li><a href="option.html">option</a></li>
                                <li><a href="Test3.html">Test3</a></li>
                                <!-- <li><a href="projects.html">our projects</a></li>
                                <li><a href="contact.blade.php">Contact Us</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </header>
        
        <!--==============================content================================-->
        <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com. December10, 2011!</div>
            <div class="content-bg">
                <div class="main">
                    <div class="container_12">
                        <div class="wrapper">
                            <article class="grid_12">
                                <h3>Our Latest Ads</h3>
                                <div class="wrapper p3">
                                    <article class="grid_4 alpha">
                                        <h4 class="p2">Advertisement 1</h4>

                                        <figure><a href="detail.html"><img class="img-border" src="https://blog.hubspot.com/hubfs/Online-Advertising.jpg" alt="" width="200px" height="150px" alt="Carrefour Print Ad -  Nine Inch Nails" title="Advertisement by Publicis, Belgium" / /></a></figure>
                                        <a href="">ABC</a><br>
                                        <a href="">CDE</a><br>
                                        <h6>Agency Network    Public</h6>
                                        <a href="detail.html">View Dtails</a>
                                        <p> <span class="glyphicon glyphicon-heart"></span>40</p>
                                         <div class="">
                                             <div id="fb-root"></div>
                                             <script>(function(d, s, id) {
                                                     var js, fjs = d.getElementsByTagName(s)[0];
                                                     if (d.getElementById(id)) return;
                                                     js = d.createElement(s); js.id = id;
                                                     js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                                     fjs.parentNode.insertBefore(js, fjs);
                                                 }(document, 'script', 'facebook-jssdk'));</script>
                                             <div class="fb-share-button" data-href="https://blog.hubspot.com/hubfs/Online-Advertising.jpg" data-width="200" data-type="button_count"></div>
                                        </div>
                                    </article>

                                </div>

                            </article>
                        </div>
                    </div>
                </div>
                <div class="block"></div>
            </div>
        </section>
    </div>
    
    <!--==============================footer=================================-->
    <footer>
        <div class="padding">
            <div class="main">
                <div class="container_12">
                    <div class="wrapper">
                        <article class="grid_8">
                            <h4>Contact Form:</h4>
                            <form id="contact-form" method="post">
                                <fieldset>
                                    <label><input name="email" value="Email" onBlur="if(this.value=='') this.value='Email'" onFocus="if(this.value =='Email' ) this.value=''" /></label>
                                    <label><input name="subject" value="Subject" onBlur="if(this.value=='') this.value='Subject'" onFocus="if(this.value =='Subject' ) this.value=''" /></label>
                                    <textarea onBlur="if(this.value=='') this.value='Message'" onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                                    <div class="buttons">
                                        <a href="#" onClick="document.getElementById('contact-form').reset()">Clear</a>
                                        <a href="#" onClick="document.getElementById('contact-form').submit()">Send</a>
                                    </div>                                          
                                </fieldset>           
                            </form>
                        </article>
                        <article class="grid_4">
                            <h4 class="indent-bot">Link to Us:</h4>
                            <ul class="list-services border-bot img-indent-bot">
                                <li><a href="#">Facebook</a></li>
                                <li><a class="item-1" href="#">Twitter</a></li>
                                <li><a class="item-2" href="#">Picassa</a></li>
                                <li><a class="item-3" href="#">You Tube</a></li>
                            </ul>
                            <p class="p1">Copyright &copy; 2011 </p>
                            <p class="p1"><a class="link" target="_blank" href="http://www.html5xcss3.com/" rel="nofollow">Free Html5 Templates</a> by TemplateMonster.com</p>
                            <!-- {%FOOTER_LINK} -->
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
