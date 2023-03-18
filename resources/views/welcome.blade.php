<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</head>

<body style="background-color: #1976D2">
    <!-- START: HEADER -->
    <section class="header-workly relative">
        <style scoped>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

            body {
                font-family: 'Poppins', sans-serif;
            }

            :root {
                --white-1: #ffffff;
                --white-2: #eeeeee;
                --white-3: #ecf1f4;
                --black: #000000;
                --dark: #0A0F16;
                --subtleGreen: #90BCB7;
                --darkGreen: #082D28;
                --darkTosca: #569B9B;
                --tosca-1: #00FFD1;
                --tosca-2: #27D7D7;
                --tosca-3: #3FE8FF;
                --deepTosca-1: #016A6A;
                --deepTosca-2: #02A6A6;
                --grey-1: #888888;
                --grey-2: #666666;
            }

            section.header-workly {
                background: radial-gradient(100% 100% at 0% 0%, #BBDEFB 0%, #03A9F4 59.9%, #2196F3 89.53%, #1976D2 100%);
            }

            .text-40 {
                font-size: 40px;
            }

            .text-28 {
                font-size: 28px;
            }

            .text-24 {
                font-size: 24px;
            }

            .text-20 {
                font-size: 20px;
            }

            .text-white-1 {
                color: var(--white-1);
            }

            .text-white-2 {
                color: var(--white-2);
            }

            .text-darkGreen {
                color: var(--darkGreen);
            }

            .text-subtleGreen {
                color: var(--subtleGreen);
            }

            .bg-white-2 {
                background-color: var(--white-2);
            }

            @media(min-width: 768px) {
                .leading-px85 {
                    line-height: 85px;
                }
            }

            .leading-px40 {
                line-height: 40px;
            }

            .leading-px36 {
                line-height: 36px;
            }

            .z-min100 {
                z-index: -100;
            }

            .z-min10 {
                z-index: -10;
            }

            .max-w-screen {
                max-width: 1440px;
            }

            .max-w-px400 {
                max-width: 400px;
            }

            .w-px580 {
                width: 580px;
            }

            .h-780 {
                height: 780px;
            }
        </style>

        <header class="pt-7 lg:pb-28">
            <nav class="relative z-10 px-4 mx-auto max-w-screen-2xl lg:px-24">
                <div class="flex flex-col items-stretch lg:flex-row lg:items-center">
                    <div class="flex items-center justify-between">
                        <!-- LOGO -->
                        <div>
                            <img src="{{ asset('img/logo.png') }}" alt="logo guestbook" class="w-72" />
                        </div> <!-- RESPONSIVE NAVBAR BUTTON TOGGLER -->
                    </div>
                </div>
            </nav>
            <!--
            START: HERO BACKGROUND -->
            <div class="mx-auto hero-bg max-w-screen-2xl">
                {{-- <div class="flex justify-end invisible md:visible"> --}}
                <div class="hidden justify-end lg:flex">
                    <img src="{{ asset('img/profile.jpeg') }}" alt="background"
                        class="absolute top-0 z-0 right-0 object-cover h-full" />
                </div>
            </div>

            <!-- END: HERO BACKGROUND -->
            <div class="relative z-10 px-4 mx-auto mt-8 hero md:mt-32 max-w-screen-2xl lg:px-24">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-12">
                    <div class="md:col-span-11 lg:col-span-7">
                        <div
                            class="text-4xl font-medium leading-normal hero-title text-gray-800 md:text-5xl leading-px85">
                            Selamat Datang di
                        </div>
                        <div
                            class="text-4xl font-semibold leading-normal hero-title text-gray-800 md:text-5xl leading-px85">
                            SMK BHAKTI PRAJA MARGASARI
                        </div>
                        <div
                            class="mt-8 text-xl font-normal leading-8 hero-description text-gray-700 lg:leading-9 md:text-2xl">
                            Jl. Lugu Margasari Keb. Tegal
                        </div>

                        <div class="mt-24 mb-16">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="px-10 py-4 text-2xl font-semibold rounded-lg bg-white-2 text-darkGreen">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="bg-white hover:bg-gray-300 text-blue-500 font-bold py-4 px-10 rounded-lg">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="bg-white hover:bg-gray-300 text-blue-500 font-bold py-4 px-10 ml-4 rounded-lg">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full px-4 mb-32">
                                <div class="relative mt-10 bg-white max-w-min px-4 py-4 rounded-lg">
                                    <div class="mx-auto">{!! DNS2D::getBarcodeHTML(route('create'), 'QRCODE') !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $(".mobile-menu-button").each(function(_, navToggler) {
                    var target = $(navToggler).data("target");
                    $(navToggler).on("click", function() {
                        $(target).animate({
                            height: "toggle",
                        })
                    })
                })
            })
        </script>
    </section>
    <!-- END: HEADER -->
</body>

</html>
