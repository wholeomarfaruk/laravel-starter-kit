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
        .mySwiper {
            position: relative;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }

        .thumbSwiper {
            position: absolute !important;
            bottom: 50px;
            right: 10px;
            width: 50%;
        }

        .thumbSwiper .swiper-slide {
            overflow: hidden;
            border-radius: 20px;
            opacity: 0.5;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .thumbSwiper .swiper-slide.swiper-slide-active {
            opacity: 1;
        }

        .hero-sec .overlay {
            position: absolute;
            bottom: 50%;
            left: 60px;
            color: white;
            z-index: 2;
            /* background: rgba(0, 0, 0, 0.1); */
            padding: 30px 300px 50px 50px;
            border-radius: 20px;
            text-align: left;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            backdrop-filter: blur(3px);
        }

        .hero-sec .overlay h2 {
            font-size: 48px;
            margin: 0 0 10px;
        }

        .hero-sec .overlay p {
            font-size: 18px;
        }

        /* Smooth scaling */
        .swiper-slide {
            transition: transform 1s ease, opacity 1s ease;
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap");
    </style>
</head>

<body>
    <!-- heading  start ======================================= -->
    <header class="main-header">
        <div class="wrapper">
            <div class="header-area">
                <div class="logo" style="width: 50px;">
                    <img src="{{ asset('assets/logo/sud-logo.png') }}" alt="Logo" class="w-100">
                </div>
                <nav class="navbar">
                    <ul>
                        <li> <a href="#">Home</a></li>
                        <li> <a href="#">About</a></li>
                        <li> <a href="#">Blog</a></li>
                        <li> <a href="#">Contact</a></li>
                        <li> <a href="#" class="btn-d1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M11.983 1.907a.75.75 0 0 0-1.292-.657l-8.5 9.5A.75.75 0 0 0 2.75 12h6.572l-1.305 6.093a.75.75 0 0 0 1.292.657l8.5-9.5A.75.75 0 0 0 17.25 8h-6.572l1.305-6.093Z" />
                                </svg>
                                Login</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu">
                    <button class="hamburger">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

    </header>
    <!-- heading  END ==========================================-->
    <main class="main-content">
        <section class="hero-sec">

        <!-- Swiper -->
        <div class="swiper mySwiper h-[85vh]">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('assets/demo/1.webp') }}" alt="">
                    <div class="overlay">
                        <h2>Slide One</h2>
                        <p>Bottom zoom effect</p>
                    </div>
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/2.webp') }}" alt="">
                    <div class="overlay">
                        <h2>Slide One</h2>
                        <p>Bottom zoom effect</p>
                    </div>
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/3.jpg') }}" alt="">
                    <div class="overlay">
                        <h2>Slide One</h2>
                        <p>Bottom zoom effect</p>
                    </div>
                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/4.jpg') }}" alt="">
                    <div class="overlay">
                        <h2>Slide One</h2>
                        <p>Bottom zoom effect</p>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>

        <!-- Thumbnail Slider -->
        <div class="swiper thumbSwiper mt-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('assets/demo/1.webp') }}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/2.webp') }}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/3.jpg') }}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('assets/demo/4.jpg') }}" alt=""></div>
            </div>
        </div>
        <!-- Swiper JS -->
        </section>
        <section class="wrapper py-20!">
            <div class="py-3 w-full lg:w-[50%] mx-auto">
                <h2 class="text-center font-bold text-xl primary-color">WE MAKE THE ORDINARY...EXTRAORDINARY !</h2>
                <p class="text-center text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum
                    harum at laboriosam porro iure nam ab eaque nihil facere assumenda!</p>
            </div>
            <div class="grid grid-cols-4 gap-5">
                <div class="relative">
                    <img class="h-full object-cover" src="{{ asset('assets/demo/buildings/1.jpg') }}" alt="">
                    <div
                        class="flex flex-col justify-end-safe overlay absolute top-0 left-0 right-0 bottom-0 w-full h-full hover:bg-black/20 transition-all duration-300">
                        <div class="bg-gradient-to-b from-transparent to-black/70 p-2">
                            <h2 class="font-bold text-xl text-white">Jolshiri</h2>
                            <p class="text-gray-200">Bashundhara Riverview</p>
                        </div>

                    </div>
                </div>
                <div class="relative">
                    <img class="h-full object-cover" src="{{ asset('assets/demo/buildings/2.jpg') }}" alt="">
                     <div
                        class="flex flex-col justify-end-safe overlay absolute top-0 left-0 right-0 bottom-0 w-full h-full hover:bg-black/20 transition-all duration-300">
                        <div class="bg-gradient-to-b from-transparent to-black/70 p-2">
                            <h2 class="font-bold text-xl text-white">Apon Shopno</h2>
                            <p class="text-gray-200">Bashundhara Riverview</p>
                        </div>

                    </div>
                </div>
                <div class="relative">
                    <img class="h-full object-cover" src="{{ asset('assets/demo/buildings/3.jpg') }}" alt="">
                     <div
                        class="flex flex-col justify-end-safe overlay absolute top-0 left-0 right-0 bottom-0 w-full h-full hover:bg-black/20 transition-all duration-300">
                        <div class="bg-gradient-to-b from-transparent to-black/70 p-2">
                            <h2 class="font-bold text-xl text-white">Sky View Complex</h2>
                            <p class="text-gray-200">Bashundhara Riverview</p>
                        </div>

                    </div>
                </div>
                <div class="relative">
                    <img class="h-full object-cover" src="{{ asset('assets/demo/buildings/4.jpg') }}" alt="">
                     <div
                        class="flex flex-col justify-end-safe overlay absolute top-0 left-0 right-0 bottom-0 w-full h-full hover:bg-black/20 transition-all duration-300">
                        <div class="bg-gradient-to-b from-transparent to-black/70 p-2">
                            <h2 class="font-bold text-xl text-white">Apon Shopno</h2>
                            <p class="text-gray-200">Bashundhara Riverview</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="main-footer"></footer>

    {{ $slot }}
    @livewireScripts
    @vite(['resources/js/app.js'])
    <!-- Initialize Swiper -->
    <script>
        addEventListener("DOMContentLoaded", () => {


            console.log(typeof Swiper);
            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");

            const thumbSwiper = new Swiper(".thumbSwiper", {
                spaceBetween: 10,
                slidesPerView: 2.5,
                watchSlidesProgress: true,

            });
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                centeredSlides: true,
                effect: "creative",
                creativeEffect: {
                    prev: {
                        translate: [0, 0, -400],
                        scale: 1,
                    },
                    next: {
                        translate: [0, "100%", 0],
                        scale: 0.5,
                    },
                },
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
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        console.log(s, time, progress);
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                },
                thumbs: {
                    swiper: thumbSwiper,
                },
            });
        })
    </script>


    @stack('scripts')
</body>

</html>
