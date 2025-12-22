{{-- 5026231010 Daniel Setiawan Yulius Putra --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Smooth transition for max-height animation */
        .accordion-content {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .accordion-content.open {
            max-height: 200px; /* Adjust based on content length */
            opacity: 1;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center">

    <main class="w-full max-w-md bg-gray-100 min-h-screen relative shadow-lg flex flex-col">
        
        <header class="bg-white px-5 pt-6 pb-4 flex items-center shadow-sm sticky top-0 z-10">
            <button onclick="history.back()" class="text-gray-900 hover:text-gray-700">
                <i class="ph ph-arrow-left text-2xl"></i>
            </button>
            <h1 class="text-xl font-bold text-gray-900 ml-4">FAQs</h1>
        </header>

        <div class="p-5 space-y-3">

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                    <span class="font-bold text-gray-900">Bagaimana cara untuk logout?</span>
                    <i class="ph ph-caret-down text-xl transition-transform duration-300"></i>
                </button>
                <div class="accordion-content px-5 pb-0">
                    <p class="text-gray-600 text-sm mb-5 leading-relaxed">
                        Navigasi ke menu Profile > disamping kanan dari sambutan user terdapat logo logout
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                    <span class="font-bold text-gray-900">Apa saja syarat menjadi seller?</span>
                    <i class="ph ph-caret-down text-xl transition-transform duration-300"></i>
                </button>
                <div class="accordion-content px-5 pb-0">
                    <p class="text-gray-600 text-sm mb-5 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Syarat utama adalah verifikasi KTP.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                    <span class="font-bold text-gray-900">Aplikasi apa ini?</span>
                    <i class="ph ph-caret-down text-xl transition-transform duration-300"></i>
                </button>
                <div class="accordion-content px-5 pb-0">
                    <p class="text-gray-600 text-sm mb-5 leading-relaxed">
                        Ini adalah aplikasi Jastip (Jasa Titip) terpercaya untuk menghubungkan pembeli dan traveler.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                    <span class="font-bold text-gray-900">Toko apa saja yang tersedia?</span>
                    <i class="ph ph-caret-down text-xl transition-transform duration-300"></i>
                </button>
                <div class="accordion-content px-5 pb-0">
                    <p class="text-gray-600 text-sm mb-5 leading-relaxed">
                        Kami mendukung berbagai toko populer seperti IKEA, Uniqlo, H&M, dan banyak lagi.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">
                <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                    <span class="font-bold text-gray-900">Berapa biaya jastip yang wajar?</span>
                    <i class="ph ph-caret-down text-xl transition-transform duration-300"></i>
                </button>
                <div class="accordion-content px-5 pb-0">
                    <p class="text-gray-600 text-sm mb-5 leading-relaxed">
                        Biaya jastip bervariasi tergantung ukuran barang dan jarak, biasanya mulai dari Rp10.000.
                    </p>
                </div>
            </div>

        </div>
    </main>

    <script>
        function toggleFaq(button) {
            // 1. Get the content div (next sibling)
            const content = button.nextElementSibling;
            
            // 2. Get the icon (inside the button)
            const icon = button.querySelector('i');

            // 3. Toggle Open Class
            if (content.classList.contains('open')) {
                // Close
                content.classList.remove('open');
                content.style.paddingBottom = '0px';
                icon.classList.remove('rotate-180');
            } else {

                document.querySelectorAll('.accordion-content').forEach(el => {
                    el.classList.remove('open');
                    el.style.paddingBottom = '0px';
                });
                document.querySelectorAll('.ph-caret-down').forEach(el => el.classList.remove('rotate-180'));

                content.classList.add('open');
                // We re-add padding bottom here via JS or use css (done in css)
                icon.classList.add('rotate-180');
            }
        }
    </script>
</body>
</html>