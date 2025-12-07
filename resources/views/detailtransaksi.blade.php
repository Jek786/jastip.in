{{-- 5026231010 - Daniel Setiawan Yulius Putra --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-custom-orange { background-color: #FFA500; }
        .text-custom-orange { color: #FFA500; }
        
        /* Hide arrows in number input */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center">

    <main class="w-full max-w-md bg-gray-100 min-h-screen relative shadow-lg flex flex-col">
        
        <header class="bg-white px-5 pt-6 pb-4 flex items-center shadow-sm sticky top-0 z-10">
            <button onclick="history.back()" class="text-gray-900 hover:text-gray-700">
                <i class="ph ph-arrow-left text-2xl"></i>
            </button>
            <h1 class="text-xl font-bold text-gray-900 ml-4">Detail Transaksi</h1>
        </header>

        <div class="p-5 flex-1">
            
            <div class="bg-white rounded-full p-1.5 flex mb-6 shadow-sm">
                <button id="tab-pendapatan" onclick="switchTab('pendapatan')" 
                        class="flex-1 font-semibold rounded-full py-2 text-sm transition shadow-sm bg-custom-orange text-white">
                    Pendapatan
                </button>
                <button id="tab-pencairan" onclick="switchTab('pencairan')" 
                        class="flex-1 font-medium rounded-full py-2 text-sm transition text-gray-400 hover:bg-gray-50">
                    Pencairan
                </button>
            </div>

            <div id="view-pendapatan">
                <div class="mb-2">
                    <h2 class="text-lg font-bold text-gray-900">Ringkasan</h2>
                    <div class="flex justify-between items-center mt-1 text-sm text-gray-500">
                        <span>Terakhir diperbarui</span>
                        <span>15:36</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-5 mb-5 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Pendapatan kotor</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">QRIS</span>
                            <span class="text-gray-500">Rp35.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Transfer</span>
                            <span class="text-gray-500">lorem ipsum</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Potongan Admin</span>
                            <span class="text-gray-500">Rp5.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Pendapatan</span>
                            <span class="text-gray-500">Rp30.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-5 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Aktivitas Terakhir</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Uang Masuk (19/8/24)</span>
                            <span class="text-gray-500">Rp15.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Uang Masuk (18/8/24)</span>
                            <span class="text-gray-500">Rp20.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">Uang Masuk (17/8/24)</span>
                            <span class="text-gray-500">Rp10.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="view-pencairan" class="hidden">
                <div class="mb-3 flex justify-between items-end">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Informasi Pencairan</h2>
                        <p class="text-sm text-gray-500 mt-1">Terakhir diperbarui</p>
                    </div>
                    <span class="text-sm text-gray-500 mb-0.5">14 Jan</span>
                </div>

                <div class="bg-white rounded-[2rem] p-6 shadow-sm mb-8">
                    <div class="space-y-5">
                        
                        <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                            <span class="text-gray-900 font-medium">Saldo Tersedia</span>
                            <span class="text-gray-900 font-bold" id="display-saldo">Rp75.000</span>
                        </div>

                        <div class="flex flex-col">
                            <div class="flex justify-between items-start mb-1">
                                <div class="flex flex-col">
                                    <span class="text-gray-900 font-medium">Nominal Pencairan</span>
                                    <span class="text-xs text-gray-400 mt-0.5">Min: Rp10.000</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    <div class="flex items-center space-x-2">
                                        <button onclick="setMaxAmount()" class="text-xs font-bold text-custom-orange bg-orange-100 px-2 py-1 rounded hover:bg-orange-200 transition">
                                            MAX
                                        </button>
                                        <div class="relative w-32 border-b-2 border-gray-200 focus-within:border-orange-500 transition-colors">
                                            <span class="absolute left-0 bottom-1 text-gray-500">Rp</span>
                                            <input type="number" id="input-nominal" placeholder="0" 
                                                class="w-full text-right pb-1 pl-6 outline-none bg-transparent font-medium text-gray-900 placeholder-gray-300"
                                                oninput="validateAmount()">
                                        </div>
                                    </div>
                                    <span id="error-message" class="text-xs text-red-500 mt-1 hidden">Melebihi Saldo!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="h-6"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Rekening Pencairan</h3>
                    
                    <div class="flex items-center mb-5">
                        <div class="w-10 h-10 rounded-full overflow-hidden mr-3 border border-gray-100 flex items-center justify-center p-1">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="w-full h-full object-contain">
                        </div>
                        <span class="text-gray-900 font-medium">Bank BCA</span>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">No. Rekening</span>
                            <span class="text-gray-400">xxxxxxxx12</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-medium">atas nama</span>
                            <span class="text-gray-400">John Doe</span>
                        </div>
                    </div>
                </div>

                <button id="btn-cairkan" disabled
                    class="w-full bg-gray-300 text-white font-bold py-3.5 rounded-full shadow-none transition transform text-lg cursor-not-allowed">
                    Cairkan
                </button>
            </div>

        </div>
    </main>

    <script>
        // --- Configuration ---
        const MAX_SALDO = 75000;
        const MIN_PENCAIRAN = 10000;

        // --- Tab Switching Logic ---
        function switchTab(tabName) {
            const pendapatanView = document.getElementById('view-pendapatan');
            const pencairanView = document.getElementById('view-pencairan');
            const btnPendapatan = document.getElementById('tab-pendapatan');
            const btnPencairan = document.getElementById('tab-pencairan');

            const activeClasses = ['bg-custom-orange', 'text-white', 'shadow-sm', 'font-semibold'];
            const inactiveClasses = ['text-gray-400', 'font-medium', 'hover:bg-gray-50'];

            if (tabName === 'pendapatan') {
                pendapatanView.classList.remove('hidden');
                pencairanView.classList.add('hidden');
                btnPendapatan.classList.add(...activeClasses);
                btnPendapatan.classList.remove(...inactiveClasses);
                btnPencairan.classList.remove(...activeClasses);
                btnPencairan.classList.add(...inactiveClasses);
            } else {
                pencairanView.classList.remove('hidden');
                pendapatanView.classList.add('hidden');
                btnPencairan.classList.add(...activeClasses);
                btnPencairan.classList.remove(...inactiveClasses);
                btnPendapatan.classList.remove(...activeClasses);
                btnPendapatan.classList.add(...inactiveClasses);
            }
        }

        // --- Validation Logic ---
        function validateAmount() {
            const inputField = document.getElementById('input-nominal');
            const errorMsg = document.getElementById('error-message');
            const btn = document.getElementById('btn-cairkan');
            const wrapper = inputField.parentElement; // The div with the border

            // Get value as number
            const value = parseFloat(inputField.value) || 0;

            let isValid = true;

            // Reset Styles
            errorMsg.classList.add('hidden');
            wrapper.classList.remove('border-red-500');
            wrapper.classList.add('border-gray-200', 'focus-within:border-orange-500');

            // 1. Check if exceeds saldo
            if (value > MAX_SALDO) {
                isValid = false;
                errorMsg.textContent = "Melebihi saldo!";
                errorMsg.classList.remove('hidden');
                wrapper.classList.remove('border-gray-200', 'focus-within:border-orange-500');
                wrapper.classList.add('border-red-500');
            }
            // 2. Check Min Amount
            else if (value > 0 && value < MIN_PENCAIRAN) {
                isValid = false;
                // Optional: Show min error if needed, or just keep button disabled
                // errorMsg.textContent = "Min Rp10.000";
                // errorMsg.classList.remove('hidden');
            }
            // 3. Check if empty
            else if (value <= 0) {
                isValid = false;
            }

            // Toggle Button State
            if (isValid) {
                btn.removeAttribute('disabled');
                btn.classList.remove('bg-gray-300', 'shadow-none', 'cursor-not-allowed');
                btn.classList.add('bg-custom-orange', 'hover:bg-orange-500', 'shadow-lg', 'active:scale-95');
            } else {
                btn.setAttribute('disabled', 'true');
                btn.classList.add('bg-gray-300', 'shadow-none', 'cursor-not-allowed');
                btn.classList.remove('bg-custom-orange', 'hover:bg-orange-500', 'shadow-lg', 'active:scale-95');
            }
        }

        // --- Helper: Set Max Amount ---
        function setMaxAmount() {
            const inputField = document.getElementById('input-nominal');
            inputField.value = MAX_SALDO;
            validateAmount(); // Trigger validation manually
        }
    </script>
</body>
</html>