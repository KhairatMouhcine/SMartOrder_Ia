<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARORDERAI</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="../assets/img/logo-ct.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .closeSignin { display: none; }
.openSignin { display: block; }
</style>
</head>
<body>
    <div class="container">
       <header>
    <div class="head-left">
        <img src="images/logo.png" alt="logo">
        <h1>SMARTORDERAI</h1>
    </div>

    <ul>
        <li><a href="#home-section">Home</a></li>
        <li><a href="#Service-section">Services</a></li>
        <li><a href="#pricing-section">Pricing</a></li>
    </ul>
    
    <div class="head-right">
        @auth
            <a href="#botChosis">ChatBot</a>
            <div class="button-box">
                <a href="/logout"><button>Logout</button></a>
            </div>
        @else
            <a href="#" id="RegisternButton">NEW ACCOUNT</a>
            <div class="button-box">
                <button id="signinButton">SIGN IN</button>
            </div>
        @endauth
    </div>

    <div class="menu-icon">
        <i class='bx bx-menu'></i>
    </div>
</header>

<div class="sidebar">
    <div class="close-icon">
        <i class='bx bx-x'></i>
    </div>

    <ul>
        <li><a href="#home-section">Home</a></li>
        <li><a href="#Service-section">Services</a></li>
        <li><a href="#pricing-section">Pricing</a></li>
    </ul>

    <div class="social-sidebar">
        <a href="#"><i class='bx bxl-discord-alt'></i></a>
        <a href="#"><i class='bx bxl-youtube'></i></a>
        <a href="#"><i class='bx bxl-github'></i></a>
        <a href="#"><i class='bx bxl-linkedin-square'></i></a>
    </div>

    @auth
    <div class="button-box">
        <a href="#botChosis" id="btn-chatbot"><button>ChatBot</button></a>
    </div>
    <div class="button-box">
        <a href="/logout" id="btn-logout"><button>Logout</button></a>
    </div>
@else
    <div class="button-box">
        <a href="#" id="btn-open-register"><button>New Account</button></a>
    </div>
    <div class="button-box">
        <button id="btn-open-signin">Sign In</button>
    </div>
@endauth
</div>



        <section class="hero" id="home-section">
            <img class="hero-blur-image" src="images/hero blur img.png" alt="">
            <img class="hero-icons-image parallax" data-speed="4" src="images/hero icons img.png" alt="">
            <img class="hero-rings-image" src="images/hero rings icon.png" alt="">

            <h1>Revolutionize Restaurant Reservations with SMARORDERAI</h1>
            <h3>Let your customers easily book tables and order meals through smart, AI-powered conversations. SMARORDERAI enhances your restaurant's service experience in real time.</h3>
            <button>Get Started</button>
            <div class="hero-image-box">
                <div class="robot-box">
                    <div class="robot-header"></div>
                    <img src="images/robot1.png" alt="ribot-img">
                </div>

                <div class="element1">
                    <img src="images/element1.png" alt="le1-img">
                </div>

                <div class="element2">
                    <img src="images/element2.png" alt="le2-img">
                </div>
            </div>

            <h4>Helping restaurants deliver smarter customer service with SMARORDERAI</h4>
            
            <div class="companies-list">
                <div class="company">
                    <img src="images/company1.png" alt="company1">
                    <p>Memric</p>
                </div>

                <div class="company">
                    <img src="images/company2.png" alt="company1">
                    <p>Ipsum</p>
                </div>

                <div class="company">
                    <img src="images/company3.png" alt="company1">
                    <p>SMARORDERAI</p>
                </div>

                <div class="company">
                    <img src="images/company4.png" alt="company1">
                    <p>Quanex</p>
                </div>

                <div class="company">
                    <img src="images/company5.png" alt="company1">
                    <p>Synthet</p>
                </div>
            </div>
        </section>
        
<form role="form" method="POST" action="/session" id="signinPage" class="signin-page-box closeSignin">
    <div class="signin-page">
        @csrf
        <h1>Sign In</h1>
        <input type="text" name="email" id="email" placeholder="Email">
        @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password" placeholder="Password">
        @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
        <button type="submit">Sign in</button>
        <a href="#" id="RegisternButtonAlt">New Account</a>
        <div id="closeIcon"><i class='bx bx-x'></i></div>
    </div>
</form>

<!-- Register Form -->
<form role="form" method="POST" action="/register" id="RegisterPage" class="signin-page-box closeSignin">
    <div class="signin-page">
        @csrf
        <h1>Register</h1>

        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        @error('name')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Password">
        @error('password')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror

        <!-- ✅ Case à cocher Terms -->

        <button type="submit">Register</button>

        <a href="#" id="signinButtonAlt">Sign in</a>
        <div id="closeIconR"><i class='bx bx-x'></i></div>
    </div>
</form>



        <section class="features-section" id="Service-section">
            <h1>Book & Order Smarter with SMARORDERAI</h1>
        
            <div class="features-gradient"></div>
        
            <div class="features-card-box">
        
                <div class="features-card autoDisplay">
                    <h2>Smart Table Booking</h2>
                    <p>Let your customers reserve tables with ease through a conversational interface that understands their preferences.</p>
                    <div class="explore-more">
                        <img src="images/feature1.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
                <div class="features-card autoDisplay">
                    <h2>Seamless Order Placement</h2>
                    <p class="py-5">Enable users to place food or product orders instantly via chat, with AI handling the flow naturally and efficiently.</p>
                    <div class="explore-more">
                        <img src="images/feature2.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
                <div class="features-card autoDisplay">
                    <h2>Multi-Device Access</h2>
                    <p class="py-5">Whether on mobile, tablet, or desktop, customers can interact with the chatbot anytime, anywhere.</p>
                    <div class="explore-more">
                        <img src="images/feature3.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
                <div class="features-card autoDisplay">
                    <h2>Real-Time Confirmation</h2>
                    <p class="py-5">Reservations and orders are processed instantly, with confirmations delivered directly within the conversation.</p>
                    <div class="explore-more">
                        <img src="images/feature4.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
                <div class="features-card autoDisplay">
                    <h2>Personalized Suggestions</h2>
                    <p class="py-5">Based on past interactions, SMARORDERAI recommends meals or reservation times tailored to user habits.</p>
                    <div class="explore-more">
                        <img src="images/feature5.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
                <div class="features-card autoDisplay">
                    <h2>24/7 Availability</h2>
                    <p class="py-5">No need to wait for staff — the chatbot is always ready to assist, ensuring continuous service and satisfaction.</p>
                    <div class="explore-more">
                        <img src="images/feature6.png" alt="">
                        <a href="#">Explore More <i class='bx bx-link-external'></i></a>
                    </div>
                    <img class="features-back-img" src="images/features back img.png" alt="">
                </div>
        
            </div>
        </section>
        


        <section class="chatApp-section">
            <div class="left-container">
                <h1 class="fadeInLeft">AI Chatbot for Smarter Restaurant Service</h1>
                <p class="fadeInLeft"><img src="images/Check circle.png" alt=""> Easy Integration with Your Website</p>
        
                <h2 class="fadeInLeft">From reservations to meal orders, SMARORDERAI automates it all with speed and precision.</h2>
                
                <p class="fadeInLeft"><img src="images/Check circle.png" alt=""> Automated Table Booking</p>
                <p class="fadeInLeft"><img src="images/Check circle.png" alt=""> Secure Order Processing</p>
        
                <div class="button-box fadeInLeft">
                    <button id="signinButton">TRY IT NOW</button>
                </div>
            </div>
        
            <div class="right-container">
                <h2 class="fadeInRight">Give your customers a seamless way to reserve, order, and interact with your restaurant — 24/7.</h2>
                <img class="fadeInRight" src="images/tools group.png" alt="">
            </div>
        </section>
        

        <section class="generative-section">
            <h1>AI-Powered Chatbot Made for Restaurants</h1>
            <p>SMARORDERAI unlocks the full potential of conversational AI to simplify reservations and ordering</p>
        
            <div class="grid-box">
        
                <div class="grid-card grid1 autoBlur">
                    <img src="images/service-1.png" alt="" class="grid1-robot-img">
                    <div class="info">
                        <h2>Smart Reservation System</h2>
                        <h4>Let customers reserve tables effortlessly through natural chat conversations</h4>
                        <p><img src="images/Check circle.png" alt=""> Real-Time Table Availability</p>
                        <p><img src="images/Check circle.png" alt=""> Instant Booking Confirmation</p>
                        <p><img src="images/Check circle.png" alt=""> Multi-Restaurant Support</p>
                    </div>
                </div>
        
                <div class="grid-card grid2 autoBlur">
                    <img src="images/service-2.png" alt="">
                    <div><h2>Order with SMARORDERAI</h2></div>
        
                    <h1>Product & Meal Ordering</h1>
                    <p>Let users browse menus, add items to cart, and place orders directly through the chatbot interface.</p>
                </div>
        
                <div class="grid-card grid3 autoBlur">
                    <div class="info">
                        <h2>Personalized User Experience</h2>
                        <h4>Leverage customer data to offer tailored recommendations and remember preferences</h4>
        
                        <div class="info-icons">
                            <div class="icon"><i class='bx bx-user'></i></div>
                            <div class="icon"><i class='bx bx-heart'></i></div>
                            <div class="icon"><i class='bx bx-history'></i></div>
                            <div class="icon"><i class='bx bx-comment'></i></div>
                            <div class="icon"><i class='bx bx-shield'></i></div>
                        </div>
                    </div>
        
                    <img src="images/service-3.png" alt="">
                </div>
        
                <div class="grid-card grid4 autoBlur">
                    <img src="images/service-4.png" alt="" class="grid4-robot-img">
                    <div class="info">
                        <h2>Seamless Backend Integration</h2>
                        <h4>SMARORDERAI connects directly to your Laravel backend and MySQL database</h4>
                        <p><img src="images/Check circle.png" alt=""> Easy API Integration</p>
                        <p><img src="images/Check circle.png" alt=""> Order & Reservation Logging</p>
                        <p><img src="images/Check circle.png" alt=""> Scalable & Secure Architecture</p>
                    </div>
                </div>
        
            </div>
        </section>
        

        <section class="pricing-section" id="pricing-section">
            <div class="pricing-img-box">
                <img class="parallax" data-speed="4" src="images/pricing-parallax.png" alt="">
                <img src="images/magical-glob.png" alt="">
            </div>
        
            <h1 class="title">Simple Pricing for Smarter Restaurant Automation</h1>
        
            <div class="pricing-container" id="botChosis">
                <div class="price-box">
                    <h1>Starter</h1>
                    <h2>Basic AI chatbot with table booking</h2>
                    <h3>$0</h3>
                    <button><a href="/chatScrach" class="h5" style="text-decoration: none">GET STARTED</a></button>

                    
        
                    <p><img src="images/Check circle.png" alt=""> Table reservation via chatbot</p>
                    <p><img src="images/Check circle.png" alt=""> Basic order handling</p>
                    <p><img src="images/Check circle.png" alt=""> Integration with Laravel backend</p>
                </div>
        
                <div class="price-box">
                    <h1>Professional</h1>
                    <h2>Advanced features with analytics & product ordering</h2>
                    <h3>$9.99</h3>
                    <button><a href="/chatollama" style="text-decoration: none" class="h5">GET STARTED</a></button>
                    
        
                    <p><img src="images/Check circle.png" alt=""> Real-time product order flow</p>
                    <p><img src="images/Check circle.png" alt=""> Reservation + command logging in MySQL</p>
                    <p><img src="images/Check circle.png" alt=""> Performance dashboard & feedback tracking</p>
                </div>
        
                <div class="price-box">
                    <h1>Enterprise</h1>
                    <h2>Custom chatbot with full control & priority support</h2>
                    <h3>$99.99</h3>
                    <button class="h5 "  >GET STARTED</button>
        
                    <p><img src="images/Check circle.png" alt=""> Dedicated instance with your branding</p>
                    <p><img src="images/Check circle.png" alt=""> Priority technical support & SLAs</p>
                    <p><img src="images/Check circle.png" alt=""> Integration with CRM / POS systems</p>
                </div>
        
            </div>
        
            <a href="#">SEE THE FULL DETAILS</a>
        </section>
        

        <seccction class="roadmap-section">
            <h1>What We're Working On</h1>
            <div class="roadmap-cards-box">

                <div class="roadmap-card autoBlur">
                    <img src="images/roadmap-1.png" alt="">
                    <h2>Voice Ordering</h2>
                    <p>Enable users to place orders using voice commands for a faster and hands-free dining experience.</p>
                </div>

                <div class="roadmap-card autoBlur">
                    <img src="images/roadmap-2.png" alt="">
                    <h2>Multi-Restaurant Support</h2>
                    <p>Allow the chatbot to serve multiple restaurants with individual menus, schedules, and branding.</p>
                </div>

                <div class="roadmap-card autoBlur">
                    <img src="images/roadmap-3.png" alt="">
                    <h2>Customer Feedback Insights</h2>
                    <p>Collect and analyze user feedback automatically to improve service and customer satisfaction.</p>
                </div>

                <div class="roadmap-card autoBlur">
                    <img src="images/roadmap-4.png" alt="">
                    <h2>Loyalty & Rewards Integration</h2>
                    <p>Integrate with loyalty systems to reward repeat customers and increase engagement.</p>
                </div>

            </div>

            <div class="button-box">
                <button>SMARORDERAI</button>
            </div>

            <div class="roadmap-gradient"></div>
        </seccction>

        <footer>
            <h1>©️2025, Made with ❤️ by the SMARORDERAI Team</h1>
        
            <p>Your AI partner for smart restaurant reservations and orders.</p>
        
            <div class="box-icons">
                <a href="https://discord.com/invite/your-invite" target="_blank"><i class='bx bxl-discord-alt'></i></a>
                <a href="https://youtube.com/yourchannel" target="_blank"><i class='bx bxl-youtube'></i></a>
                <a href="https://github.com/your-repo" target="_blank"><i class='bx bxl-github'></i></a>
                <a href="https://linkedin.com/company/yourcompany" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
            </div>
        </footer>
        

    </div>
    
<script src="/js/apps.js"></script>

@if(isset($emailNotVerified) && $emailNotVerified)
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: "error",
        title: "Verification Required",
        text: "You must verify your email address to access the chat.",
        footer: '<a href="{{ route("email.verification.resend") }}" style="color: #3085d6;">Resend verification link</a>'
    });
</script>
@endif

@if(session('email_verified'))
<script>
    Swal.fire({
        icon: "success",
        title: "Email Verified ✅",
        text: "Your email address has been successfully verified. Welcome!"
    });
</script>
@endif

@if(session('email_already_verified'))
<script>
    Swal.fire({
        icon: "info",
        title: "Already Verified",
        text: "Your email address has already been verified."
    });
</script>
@endif

@if(session('verification_resent'))
<script>
    Swal.fire({
        icon: "success",
        title: "Link Sent 📩",
        text: "A new verification link has been sent to your email address."
    });
</script>
@endif

@if(session('email_already_verified'))
<script>
    Swal.fire({
        icon: "info",
        title: "Already Verified",
        text: "Your email is already verified."
    });
</script>
@endif

</body>
</html>
