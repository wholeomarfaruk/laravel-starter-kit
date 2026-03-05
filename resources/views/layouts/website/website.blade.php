{{-- //livewire --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    @livewireStyles
    @stack('styles')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url("https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
    </style>
</head>

<body class="@yield('bodyClass')">
    <!-- heading  start ======================================= -->
    <header class="main-header overlay-header">
        <div class="wrapper">
            <div class="header-area">
                <div class="logo" style="width: 50px;">
                    <img src="assets/logo/sud-logo.png" alt="Logo">
                </div>
                <nav class="navbar">
                    <ul>
                        <li> <a href="/" class="active">Home</a></li>
                        <li> <a href="/projects.html" >Projects</a></li>
                        <li> <a href="/offers.html">Offers</a></li>

                                               <li> <a href="/blogs.html">Blog</a></li>

                        <li> <a href="/contact.html">Contact</a></li>
                        <li> <a href="#" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M11.983 1.907a.75.75 0 0 0-1.292-.657l-8.5 9.5A.75.75 0 0 0 2.75 12h6.572l-1.305 6.093a.75.75 0 0 0 1.292.657l8.5-9.5A.75.75 0 0 0 17.25 8h-6.572l1.305-6.093Z" />
                                </svg>
                                Login</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu">
                    <button id="menuToggle" class="hamburger">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="offcanvas-overlay" id="offcanvasOverlay"></div>

                <div class="offcanvas" id="offcanvasMenu">
                    <button class="offcanvas-close" id="menuClose">×</button>

                    <nav class="offcanvas-nav">
                        <a href="#">Home</a>
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Contact</a>
                    </nav>
                </div>

            </div>
        </div>

    </header>
    <!-- heading  END ==========================================-->
    <main class="main-content">
   {{ $slot }}
    </main>

      <footer class="footer-2 main-footer" >

        <div class="wrapper top-footer">
            <div class=" footer-card">
                <h3 class=" mb-3 footer-card-title">Star Unity <br> Development Ltd</h3>
                <p class=" mb-2 footer-card-text">

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus delectus soluta nobis, nam
                    cum iste obcaecati doloremque officiis debitis accusantium.
                </p>
                <div class="social">

                    <ul class="navbar-nav d-flex flex-row gap-2 justify-content-start align-items-center">

                        <li class="nav-item">
                            <a class="nav-link" style="" target="_blank" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22 22 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202z">
                                    </path>
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a target="_blank" class="nav-link " style="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20.947 8.305a6.5 6.5 0 0 0-.419-2.216 4.6 4.6 0 0 0-2.633-2.633 6.6 6.6 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.6 6.6 0 0 0-2.185.42 4.6 4.6 0 0 0-2.633 2.633 6.6 6.6 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.6 4.6 0 0 0 2.634 2.632 6.6 6.6 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.6 6.6 0 0 0 2.186-.419 4.62 4.62 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709m-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246m4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078">
                                    </path>
                                    <path d="M11.994 8.976a3.003 3.003 0 1 0 0 6.006 3.003 3.003 0 1 0 0-6.006"></path>
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a target="_blank" class="nav-link " style="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21.593 7.203a2.5 2.5 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.52 2.52 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831M9.996 15.005l.005-6 5.207 3.005z">
                                    </path>
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a target="_blank" class="nav-link " style="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M13.68 10.62 20.24 3h-1.55L13 9.62 8.45 3H3.19l6.88 10.01L3.19 21h1.55l6.01-6.99 4.8 6.99h5.24l-7.13-10.38Zm-2.13 2.47-.7-1-5.54-7.93H7.7l4.47 6.4.7 1 5.82 8.32H16.3z">
                                    </path>
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a target="_blank" class="nav-link " style="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M8.339 18.337H5.667v-8.59h2.672zM7.003 8.574a1.548 1.548 0 1 1 0-3.096 1.548 1.548 0 0 1 0 3.096m11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387 2.704 0 3.203 1.778 3.203 4.092v4.71z">
                                    </path>
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a target="_blank" class="nav-link " style="" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 3 3 0 0 1 .88.13V9.4a7 7 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a5 5 0 0 1-1-.1z">
                                    </path>
                                </svg>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class=" footer-card quick-link">
                <h3 class="mb-3 footer-card-title">Quick Links</h3>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            About Us</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link " href="/posts/recent"><i class="fa-solid fa-arrow-right-long"></i>
                           Contact Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Terms & Conditions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Land Owners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><i class="fa-solid fa-arrow-right-long"></i>
                            Clients</a>
                    </li>
                </ul>
            </div>
            <div class=" footer-card contact">
                <h3 class="text-white mb-3 footer-card-title">Contact Us</h3>
                <ul class=" ">

                    <li class="contact-item" href="#">
                        <span class="icon ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </span>
                        <div>
                            <h5 class="title">Contact</h5>
                            <p class="text">
                                01684285963
                            </p>
                        </div>

                    </li>

                    <li class="contact-item " href="#">
                        <span class="icon">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path
                                    d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                <path
                                    d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                            </svg>

                        </span>
                        <div>
                            <h5 class="title">Email Adress</h5>
                            <p class="text">
                                starunityd@gmail.com
                            </p>
                        </div>

                    </li>

                    <li class="contact-item">
                        <span class="icon">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path fill-rule="evenodd"
                                    d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </span>
                        <div style="flex-grow: auto;">
                            <h5 class="title">Corporate Office</h5>
                            <p class="text" style="color: rgb(212, 212, 212)">
                                Bashundhara Revierview, Hasnabad, Keraniganj
                            </p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <hr class="text-gray-50/50">
        <div class="wrapper py-3! bottom-footer">
            <h2 style="font-size: 14px;font-weight: 400;color:#ffffffab; text-align:left;">© 2026. All right
                Reserved Developed By <a href="#" style="font-weight: 400; color: #fff">Seldom tech
                </a></h2>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    @livewireScripts
    @vite(['resources/js/app.js'])

    <script>
        function videoGallery() {
            return {
                currentVideo: "{{ asset('assets/video/Ads - 002_2.mp4') }}",

                init() {
                    this.setVideo(this.currentVideo);
                },

                changeVideo(video) {
                    this.setVideo(video);
                },

                setVideo(video) {
                    this.currentVideo = video;

                    this.$nextTick(() => {
                        this.$refs.player.src = this.currentVideo;
                        this.$refs.player.load();
                        this.$refs.player.play();
                    });
                }
            }
        }
    </script>
    <!-- Initialize Swiper -->
    <script>
        addEventListener("DOMContentLoaded", () => {


            // console.log(typeof Swiper);
            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");

            const thumbSwiper = new Swiper(".thumbSwiper", {
                spaceBetween: 10,
                slidesPerView: 1.5,
                watchSlidesProgress: true,
                freeMode: true, // এটি যোগ করুন যাতে থাম্বস সহজে স্ক্রল করা যায়
                slideToClickedSlide: true, // 👈 এটা জরুরি
                loop: true, // 👈 Enable loop here
                // loopedSlides: 5, // 👈 Important: tells Swiper how many slides to duplicate

            });
            const heroSwiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                loop:true,
                centeredSlides: false, // 👈 এটা off করো
                effect: 'fade', // Smooth transitions

                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                thumbs: {
                    swiper: thumbSwiper
                },
                on: {
                    slideChange: function() {
                        console.log(this.realIndex); // 👈 এটা ব্যবহার করো
                        thumbSwiper.slideTo(this.realIndex);
                    }
                }
            });
            //client reviews swipper
            var swiper = new Swiper(".client_reviews_slider", {
                spaceBetween: 30,
                // loop: true,

                // autoplay: {
                //     delay: 2800,
                //     disableOnInteraction: false
                // },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        // console.log(s, time, progress);
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                }
            });

            //client reviews swipper
            var swiper = new Swiper(".land_owner_reviews_slider", {
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 2200,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        // console.log(s, time, progress);
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                }
            });

        })
    </script>


    @stack('scripts')
</body>

</html>
