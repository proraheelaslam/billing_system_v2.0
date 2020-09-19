
    	<!--==============================header=================================-->
        <header>
        	<div class="row-top">
            	<div class="main">
                	<div class="wrapper">
                    	<h1><a href="index.html">Advertising Site</a></h1>
                        <form id="search-form" method="post" enctype="multipart/form-data">
                        	
                        <fieldset>	
                            <div class="search-field">

                                <input name="sfearch" type="text" value="Search..." onBlur="if(this.value=='') this.value='Search...'" onFocus="if(this.value =='Search...' ) this.value=''" />
                                
                                <a class="search-button" href="#" onClick="document.getElementById('search-form').submit()"></a>	
                            </div>	

                        </fieldset>
                        

                        @if (Auth::guest())
                        <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                        <a href="{{ url('/login') }}"> <button type="button" class="btn btn-primary" id = "btn-login">Login</button></a> 
                        <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary" id="btn-sign-up">Signup</button></a>
                    
                    @endif


                    </form>
                    </div>
                </div>
            </div>
            <div class="menu-row">
            	<div class="menu-bg">
                    <div class="main dropdown">
                        <nav class="indent-left">
                            <ul class="menu wrapper ">
                                <li class="active"><a href="{{url('/advertisement')}}">Advertising</a></li>
                                <li><a href="option.html">option</a></li>

                                @if (!Auth::guest())
                                    <li class="dropdown ">
                                        <a href="{{ url('/logout') }}" >
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Points: {{  Auth::user()->points }}</a></li>
                                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                                @endif


                            </ul>
                        </nav>


                    </div>
                    </div>
                </div>
            </div>
            <div class="row-bot">
            	<div class="center-shadow">
                	<div class="carousel-container">
                      <div id="carousel">
                        <div class="carousel-feature">
                          <a href="#"><img class="carousel-image" alt="" src="{{asset('frontend_assets/images/gallery-img1.png')}}"></a>
                        </div>
                        <div class="carousel-feature">
                          <a href="#"><img class="carousel-image" alt="" src="{{asset('frontend_assets/images/gallery-img3.png')}}"></a>
                        </div>
                        <div class="carousel-feature">
                          <a href="#"><img class="carousel-image" alt="" src="{{asset('frontend_assets/images/gallery-img2.png')}}"></a>
                        </div>
                      </div>
    				</div>
                </div>
            </div>
        </header>
