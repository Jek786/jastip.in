{{-- Daniel Setiawan - 5026231010 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi Prototype</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom Font Override */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #333; /* Dark background to make phones pop */
            padding: 40px;
        }
        
        /* Mobile Frame Simulator */
        .mobile-frame {
            width: 100%;
            max-width: 375px;
            height: 812px;
            background-color: #F3F4F6; /* Light gray bg like design */
            border-radius: 40px;
            overflow: hidden;
            position: relative;
            border: 8px solid #1a1a1a;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
        }

        /* Custom Scrollbar hide */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Custom colors to match image */
        .text-primary-dark { color: #1F2937; }
        .text-secondary-gray { color: #9CA3AF; }
        .bg-accent-orange { background-color: #E8A346; }
        .text-accent-orange { color: #E8A346; }
        .bg-toggle-inactive { background-color: #FFFFFF; }
        
        /* Dynamic island placeholder */
        .dynamic-island {
            width: 120px;
            height: 35px;
            background-color: black;
            border-radius: 20px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row justify-content-center gy-5">
            
            <div class="col-md-4 d-flex justify-content-center">
                <div class="mobile-frame">
                    <div class="dynamic-island"></div>
                    <div class="d-flex justify-content-between px-4 pt-3 pb-2 text-sm font-bold text-gray-800">
                        <span>11:30</span>
                        <div class="d-flex gap-2">
                            <i class="bi bi-reception-4"></i>
                            <i class="bi bi-wifi"></i>
                            <i class="bi bi-battery-full"></i>
                        </div>
                    </div>

                    <div class="d-flex align-items-center px-4 py-3">
                        <i class="bi bi-arrow-left fs-4 cursor-pointer"></i>
                        <h5 class="mb-0 ms-3 font-bold text-lg">Detail Transaksi</h5>
                    </div>

                    <div class="flex-grow-1 overflow-auto no-scrollbar px-4 pb-4">
                        <div class="bg-white p-1 rounded-full d-flex mb-4 shadow-sm">
                            <button class="flex-1 bg-accent-orange text-white py-2 rounded-full text-sm font-semibold shadow-md">Pendapatan</button>
                            <button class="flex-1 text-gray-500 py-2 rounded-full text-sm font-semibold">Pencairan</button>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <h6 class="font-bold text-lg mb-0">Ringkasan</h6>
                                <span class="text-xs text-gray-400">Terakhir diperbarui 15:36</span>
                            </div>
                            
                            <div class="bg-white p-4 rounded-[24px] shadow-sm">
                                <h6 class="font-bold mb-3">Pendapatan kotor</h6>
                                <div class="d-flex justify-content-between mb-2 text-sm text-gray-600">
                                    <span>QRIS</span>
                                    <span>Rp35.000</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 text-sm text-gray-600">
                                    <span>Transfer</span>
                                    <span>lorem ipsum</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 text-sm text-gray-600">
                                    <span>Potongan Admin</span>
                                    <span>Rp5.000</span>
                                </div>
                                <div class="d-flex justify-content-between text-sm font-bold text-gray-800 mt-3 pt-2 border-t border-dashed">
                                    <span>Pendapatan</span>
                                    <span>Rp30.000</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h6 class="font-bold text-lg mb-3">Aktivitas Terakhir</h6>
                            <div class="bg-white p-4 rounded-[24px] shadow-sm d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between text-sm">
                                    <span class="text-gray-800">Uang Masuk (19/8/24)</span>
                                    <span class="text-gray-500">Rp15.000</span>
                                </div>
                                <div class="d-flex justify-content-between text-sm">
                                    <span class="text-gray-800">Uang Masuk (18/8/24)</span>
                                    <span class="text-gray-500">Rp20.000</span>
                                </div>
                                <div class="d-flex justify-content-between text-sm">
                                    <span class="text-gray-800">Uang Masuk (17/8/24)</span>
                                    <span class="text-gray-500">Rp10.000</span>
                                </div>
                                <div class="d-flex justify-content-between text-sm">
                                    <span class="text-gray-800">Uang Masuk (16/8/24)</span>
                                    <span class="text-gray-500">Rp5.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-black h-1 w-32 mx-auto mb-2 rounded-full opacity-80"></div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="mobile-frame">
                     <div class="dynamic-island"></div>
                     <div class="d-flex justify-content-between px-4 pt-3 pb-2 text-sm font-bold text-gray-800">
                         <span>11:30</span>
                         <div class="d-flex gap-2">
                             <i class="bi bi-reception-4"></i>
                             <i class="bi bi-wifi"></i>
                             <i class="bi bi-battery-full"></i>
                         </div>
                     </div>
 
                     <div class="d-flex align-items-center px-4 py-3">
                         <i class="bi bi-arrow-left fs-4 cursor-pointer"></i>
                         <h5 class="mb-0 ms-3 font-bold text-lg">Detail Transaksi</h5>
                     </div>
 
                     <div class="flex-grow-1 overflow-auto no-scrollbar px-4 pb-4">
                         <div class="bg-white p-1 rounded-full d-flex mb-4 shadow-sm">
                             <button class="flex-1 text-gray-500 py-2 rounded-full text-sm font-semibold">Pendapatan</button>
                             <button class="flex-1 bg-accent-orange text-white py-2 rounded-full text-sm font-semibold shadow-md">Pencairan</button>
                         </div>
 
                         <div class="mb-4">
                             <div class="d-flex justify-content-between align-items-start mb-2">
                                 <div>
                                     <h6 class="font-bold text-lg mb-0">Informasi Pencairan</h6>
                                     <span class="text-xs text-gray-400">Terakhir diperbarui</span>
                                 </div>
                                 <div class="text-end">
                                     <i class="bi bi-pencil-square text-gray-600"></i>
                                     <div class="text-xs text-gray-400 mt-1">14 Jan</div>
                                 </div>
                             </div>
                             
                             <div class="bg-white p-4 rounded-[24px] shadow-sm">
                                 <div class="d-flex justify-content-between mb-3 text-sm">
                                     <span class="font-medium">Saldo</span>
                                     <span class="text-gray-500">75.000</span>
                                 </div>
                                 <div class="d-flex justify-content-between mb-1 text-sm">
                                     <span class="font-medium">Nominal Pencairan</span>
                                     <span class="text-gray-500">50.000</span>
                                 </div>
                                 <div class="text-[10px] text-gray-400 mb-4">Minimal Pencairan: Rp10.000</div>

                                 <h6 class="font-bold text-sm mb-3">Rekening Pencairan</h6>
                                 
                                 <div class="d-flex align-items-center gap-2 mb-3">
                                     <div class="bg-blue-100 rounded-full p-1 w-8 h-8 flex items-center justify-center">
                                        <i class="bi bi-bank text-blue-700 text-xs"></i>
                                     </div>
                                     <span class="font-medium text-sm">Bank BCA</span>
                                 </div>

                                 <div class="d-flex justify-content-between mb-2 text-sm">
                                     <span class="text-gray-600">No. Rekening</span>
                                     <span class="text-gray-500">xxxxxxxx12</span>
                                 </div>
                                 <div class="d-flex justify-content-between mb-2 text-sm">
                                     <span class="text-gray-600">atas nama</span>
                                     <span class="text-gray-500">John Doe</span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="px-4 pb-4">
                        <button class="w-100 bg-accent-orange text-white font-bold py-3 rounded-full shadow-lg hover:opacity-90 transition">
                            Cairkan
                        </button>
                     </div>
                     
                     <div class="bg-black h-1 w-32 mx-auto mb-2 rounded-full opacity-80"></div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="mobile-frame position-relative">
                    <div class="opacity-40 pointer-events-none h-100 d-flex flex-column">
                        <div class="dynamic-island"></div>
                        <div class="d-flex justify-content-between px-4 pt-3 pb-2 text-sm font-bold text-gray-800">
                            <span>11:30</span>
                            <div class="d-flex gap-2">
                                <i class="bi bi-reception-4"></i>
                                <i class="bi bi-wifi"></i>
                                <i class="bi bi-battery-full"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center px-4 py-3">
                            <i class="bi bi-arrow-left fs-4"></i>
                            <h5 class="mb-0 ms-3 font-bold text-lg">Detail Transaksi</h5>
                        </div>
                        <div class="flex-grow-1 px-4">
                            <div class="bg-gray-200 p-1 rounded-full d-flex mb-4">
                                <button class="flex-1 py-2 text-sm text-gray-400">Pendapatan</button>
                                <button class="flex-1 bg-gray-400 text-white py-2 rounded-full text-sm">Pencairan</button>
                            </div>
                            <h6 class="font-bold text-lg mb-2">Informasi Pencairan</h6>
                            <div class="bg-gray-200 h-64 rounded-[24px]"></div>
                        </div>
                        <div class="px-4 pb-4">
                           <button class="w-100 bg-yellow-700 text-white font-bold py-3 rounded-full">Cairkan</button>
                        </div>
                        <div class="bg-black h-1 w-32 mx-auto mb-2 rounded-full opacity-80"></div>
                    </div>

                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black/40 d-flex align-items-center justify-content-center px-4 z-10">
                        <div class="bg-white w-100 p-5 rounded-[32px] shadow-2xl relative overflow-hidden text-center">
                            
                            <div class="absolute top-4 left-4 w-16 h-16 rounded-full bg-orange-100/50 -z-0"></div>
                            <div class="absolute bottom-10 right-4 w-20 h-20 rounded-full bg-orange-100/50 -z-0"></div>

                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="bi bi-check-lg text-green-600 fs-3"></i>
                                </div>
                                <h5 class="font-bold text-green-700 mb-2">Pencairan Diproses</h5>
                                <p class="text-gray-500 text-sm mb-0">Cek rekeningmu secara berkala ya!</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>