<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @if(app()->isLocale('ar'))
        <style>
            * {
                direction: rtl;
                --tw-space-x-reverse: 1 !important;
            }

            body {
                font-family: 'Amiri', serif;
            }
        </style>
    @endif
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="antialiased">
    <div>

        @include('navigation')

        <div class="relative z-10 bg-white overflow-hidden">
            <div class="container flex flex-col px-6 py-10 mx-auto space-y-6 md:h-128 md:py-16 md:flex-row md:items-center md:space-x-6">
                <div class="w-full md:w-1/2">
                    <div class="max-w-lg">
                        <h1 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-white md:text-4xl">Find your premium new glasses exported from US</h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">We work with the best remunated glasses dealers in US to find your new glasses.</p>
                        <div class="grid gap-6 mt-8 sm:grid-cols-2">
                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>Premium selection</span>
                            </div>

                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>Insurance</span>
                            </div>

                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>All legal documents</span>
                            </div>

                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>From US glasses dealers</span>
                            </div>

                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>Payment Security</span>
                            </div>

                            <div class="flex items-center space-x-6 text-gray-800 dark:text-gray-200">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>

                                <span>Fast shipping (+ Express)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center w-full h-96 md:w-1/2">
                    <img class="object-cover w-full h-full max-w-2xl rounded-md" src="https://images.unsplash.com/photo-1555181126-cf46a03827c0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="glasses photo">
                </div>
            </div>
            <div class="relative flex flex-wrap items-center justify-center">
                <div class="z-30">
                    <div class="sm:text-center bg-white rounded-lg bg-opacity-75 my-20 mx-auto max-w-xl px-4 sm:px-6 lg:px-8 sm:py-6 lg:py-8 ">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">{{ __('360 Feedback') }}</span>
                            <span class="block text-indigo-600 xl:inline">{{ __("online assessement") }}</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            {{ __("Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.") }}
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex justify-center">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    {{ __("Get started") }}
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:mx-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                    {{ __("Live demo") }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="z-20 inset-0 bg-indigo-600 bg-opacity-25"></div>
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:absolute lg:inset-0 lg:z-10 lg:w-full lg:h-full" src="/images/main/charles-deluvio-Lks7vei-eAg-unsplash.jpg" alt="">
            </div>
        </div>

        <main>

            <section class="py-24 bg-gray-200">
                <div class="flex flex-wrap max-w-7xl mx-auto">
                    <div class="w-full md:w-1/2 bg-gray-50 rounded-lg">
                        <h3 class="py-8 px-6 text-gray-900 text-3xl font-semibold tracking-wide">
                            {{ __("Lorem ipsum dolor sit.") }}
                        </h3>

                        <p class="py-8 px-6 leading-6 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0" style="line-height: 1.8;">
                            {{ __("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eligendi eos eveniet impedit incidunt minus placeat repudiandae vel, voluptatibus. Accusantium cum deleniti eaque et ex hic iste.") }}
                        </p>

                    </div>
                    <div class="py-12 px-10 w-full md:w-1/2">
                        <img src="/images/main/undraw_accept_tasks_po1c.svg" alt="">
                    </div>
                </div>

            </section>

            <section class="py-24 bg-gray-100">
                <div class="flex flex-wrap max-w-7xl mx-auto">
                    <div class="py-12 px-10 w-full md:w-1/2">
                        <img src="/images/main/undraw_anonymous_feedback_y3co.svg" alt="">
                    </div>
                    <div class="w-full md:w-1/2 bg-gray-200 rounded-lg">
                        <h3 class="py-8 px-6 text-gray-900 text-3xl font-semibold tracking-wide">
                            {{ __("Lorem ipsum dolor sit.") }}
                        </h3>

                        <p class="py-8 px-6 leading-6 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0" style="line-height: 1.8;">
                            {{ __("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eligendi eos eveniet impedit incidunt minus placeat repudiandae vel, voluptatibus. Accusantium cum deleniti eaque et ex hic iste.") }}
                        </p>

                    </div>

                </div>

            </section>

            <section class="py-24 bg-gray-200">
                <div class="flex flex-wrap max-w-7xl mx-auto">
                    <div class="w-full md:w-1/2 bg-gray-50 rounded-lg">
                        <h3 class="py-8 px-6 text-gray-900 text-3xl font-semibold tracking-wide">
                            {{ __("Lorem ipsum dolor sit.") }}
                        </h3>

                        <p class="py-8 px-6 leading-6 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0" style="line-height: 1.8;">
                            {{ __("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eligendi eos eveniet impedit incidunt minus placeat repudiandae vel, voluptatibus. Accusantium cum deleniti eaque et ex hic iste.") }}
                        </p>

                    </div>
                    <div class="py-12 px-10 w-full md:w-1/2">
                        <img src="/images/main/undraw_Posts_re_ormv.svg" alt="">
                    </div>
                </div>

            </section>

        </main>

        <footer class="max-w-6xl mx-auto bg-white dark:bg-gray-800">
            <div class="container px-6 py-4 mx-auto">
                <div class="lg:flex">
                    <div class="w-full -mx-6 lg:w-2/5">
                        <div class="px-6">
                            <div>
                                <a href="#" class="text-xl font-bold text-gray-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Brand</a>
                            </div>

                            <p class="max-w-md mt-2 text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, nisi! Id.</p>

                            <div class="flex mt-4 -mx-2">
                                <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Linkden">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"/>
                                    </svg>
                                </a>

                                <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Facebook">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"/>
                                    </svg>
                                </a>

                                <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Twitter">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 lg:mt-0 lg:flex-1">
                        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4">
                            <div>
                                <h3 class="text-gray-700 uppercase dark:text-white">About</h3>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Company</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">community</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Careers</a>
                            </div>

                            <div>
                                <h3 class="text-gray-700 uppercase dark:text-white">Blog</h3>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Tec</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Music</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Videos</a>
                            </div>

                            <div>
                                <h3 class="text-gray-700 uppercase dark:text-white">Products</h3>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Mega cloud</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Aperion UI</a>
                                <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">Meraki UI</a>
                            </div>

                            <div>
                                <h3 class="text-gray-700 uppercase dark:text-white">Contact</h3>
                                <span class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">+1 526 654 8965</span>
                                <span class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:underline">example@email.com</span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-6 bg-gray-300 border-none dark:bg-gray-700">

                <div>
                    <p class="text-center text-gray-800 dark:text-white">© Brand 2020 - All rights reserved</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
