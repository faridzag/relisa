<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="{{ asset('assets/images/logo-relisa.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="font-light antialiased">
        <header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
            <div id="header-left" class="flex items-center">
                <div class="text-gray-800 font-semibold">
                    <span class="text-blue-500 text-xl">RELISA</span>
                </div>
            </div>
            <div id="header-right" class="flex items-center md:space-x-6">
                <div class="flex space-x-5">
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500"
                        href="http://127.0.0.1:8000/user/login">
                        Login
                    </a>
                    <a class="flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-500"
                        href="http://127.0.0.1:8000/user/register">
                        Daftar
                    </a>
                </div>
            </div>
        </header>


        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Selamat datang di <span class="text-blue-500">RELISA</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">Relawan Lingkungan Sosial atau RELISA adalah forum untuk pemuda-pemuda peduli sesama dengan mengikuti kegiatan relawan</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="http://127.0.0.1:8000/user/register">Ayo daftar</a>
        </div>

        <main class="container mx-auto px-5 flex flex-grow">
            <div class="mb-10">
                <div class="mb-16">
                    <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold"></h2>
                    <div class="w-full">
                        <div class="grid grid-cols-3 gap-10 w-full">
                            <div class="md:col-span-1 col-span-3">
                                    <div>
                                        <img class="w-full rounded-xl"
                                            src="{{ asset('assets/images/volunteer1.png') }}">
                                    </div>
                                <div class="mt-3">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-blue-400
                                            text-white
                                            rounded-xl px-3 py-1 text-sm mr-3">
                                            Mengajar
                                        </span>
                                        <p class="text-gray-500 text-sm">2023-09-04</p>
                                    </div>
                                    <a class="text-xl font-bold text-gray-900">Ikut membagikan ilmu ke anak-anak panti asuhan
                                    </a>
                                </div>
                            </div>
                            <div class="md:col-span-1 col-span-3">
                                    <div>
                                        <img class="w-full rounded-xl"
                                            src="{{ asset('assets/images/donasi.jpg') }}">
                                    </div>
                                <div class="mt-3">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-red-600
                                            text-white
                                            rounded-xl px-3 py-1 text-sm mr-3">
                                            Relawan
                                        </span>
                                        <p class="text-gray-500 text-sm">2023-09-05</p>
                                    </div>
                                    <a class="text-xl font-bold text-gray-900">Pengumpulan dana untuk saudara kita yang terkena musibah</a>
                                </div>
                            </div>
                            <div class="md:col-span-1 col-span-3">
                                    <div>
                                        <img class="w-full rounded-xl"
                                            src="{{ asset('assets/images/community.jpg') }}">
                                    </div>
                                <div class="mt-3">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-blue-400
                                            text-white
                                            rounded-xl px-3 py-1 text-sm mr-3">
                                            Bersih-bersih</span>
                                        <p class="text-gray-500 text-sm">2023-09-04</p>
                                    </div>
                                    <a class="text-xl font-bold text-gray-900">Membersihkan pantai kita yang tercemar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="md:flex md:justify-center md:items-center py-4">
                <a href="http://127.0.0.1:8000">
                    <img src="{{ asset('assets/images/logo-relisa.png') }}" class="h-8 me-3" alt="Relisa Logo" />
                </a>
                <span class="text-gray-500 hover:text-blue-500">&copy;Relisa | Relawan Lingkungan Sosial 2023</span>
        </footer>
    </body>
</html>
