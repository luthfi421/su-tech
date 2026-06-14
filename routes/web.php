<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

use App\Http\Controllers\Auth\ForgotPasswordController;
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify.otp');

use App\Http\Controllers\Auth\OtpController;
Route::post('/verify-otp', [OtpController::class, 'verify']);

Route::get('/new-password', function () {
    if(!session('otp_verified')){
        return redirect('/forgot-password');
    }
    return view('auth.new-password');
});

use App\Http\Controllers\Auth\ResetPasswordController;
Route::post('/update-password', [ResetPasswordController::class, 'update']);

use App\Http\Controllers\Auth\RegisterController;
Route::get('/register', [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/paket/{id}', function ($id) {
    $packages = [
        1 => [
            'id' => 1,
            'name' => 'Paket Umrah Reguler',
            'price' => 25000000,
            'duration' => '9 hari / 8 Malam',
            'departure_date' => '15 Juni 2026',
            'hotel' => 'Bintang 2 & 3',
            'facilities' => [
                'Visa Umrah',
                'Makan & Minum',
                'Transportasi',
                'Asuransi',
                'Mutawif & Muthif',
                'Panduan & Edukasi'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, pemeriksaan dokumen dan boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel, istirahat'],
                ['day' => 'Hari 4-6', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, dan aktivitas di Makkah'],
                ['day' => 'Hari 7-8', 'title' => 'Perjalanan ke Madinah', 'desc' => 'Ke Madinah mengunjungi masjid dan ziarah'],
                ['day' => 'Hari 9', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik, tiba di Indonesia']
            ]
        ],
        2 => [
            'id' => 2,
            'name' => 'Paket Umrah Plus',
            'price' => 35000000,
            'duration' => '12 hari / 11 Malam',
            'departure_date' => '20 Juli 2026',
            'hotel' => 'Bintang 5',
            'additional_facilities' => [
                'City Tour Madinah',
                'City Tour Makkah',
                'Tour Tabalung (optional)'
            ],
            'main_facilities' => [
                'Visa Umrah',
                'Makan & Minum',
                'Liburan ke Madinah',
                'Mutawif & Muthif',
                'Ibadah Ina',
                'Bus AC',
                'Penerbangan'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, pemeriksaan dokumen dan boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel bintang 5'],
                ['day' => 'Hari 4-7', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, city tour, dan aktivitas spiritual'],
                ['day' => 'Hari 8-11', 'title' => 'Madinah & Wisata', 'desc' => 'Madinah, mengunjungi masjid, ziarah, city tour, dan liburan'],
                ['day' => 'Hari 12', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik dengan istirahat, tiba di Indonesia']
            ]
        ],
        3 => [
            'id' => 3,
            'name' => 'Paket Umrah VIP',
            'price' => 50000000,
            'duration' => '15 hari / 14 Malam',
            'departure_date' => '20 Maret 2027',
            'departure_airline' => 'Qatar Airways',
            'hotel' => 'Bintang 5',
            'additional_facilities' => [
                'Hotel Bintang 5 di Makkah',
                'Makanan buffet internasional',
                'Transportasi VIP',
                'Penerbangan-unduh Haines'
            ],
            'main_facilities' => [
                'Visa Umrah',
                'Tiket Pesawat',
                'Hotel Bintang',
                'Liburan ke Makkah',
                'Ibadah Ina',
                'Bus AC',
                'Penerbangan'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan Premium', 'desc' => 'Lounge khusus, business class boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Arrival di Luxury Hotel', 'desc' => 'Hotel 5 bintang mewah, welcome dinner'],
                ['day' => 'Hari 4-8', 'title' => 'Umrah Lengkap', 'desc' => 'Umrah, aktivitas spiritual, luxury city tour'],
                ['day' => 'Hari 9-12', 'title' => 'Madinah Eksklusif', 'desc' => 'Hotel bintang 5, tour pribadi, wellness'],
                ['day' => 'Hari 13-15', 'title' => 'Relaksasi & Pulang', 'desc' => 'Spa, shopping, business class return']
            ]
        ]
    ];
    
    $package = $packages[$id] ?? $packages[1];
    return view('paket-detail', ['package' => $package]);
});

Route::get('/pendaftaran/{id}', function ($id) {
    $packages = [
        1 => [
            'id' => 1,
            'name' => 'Paket Umrah Reguler',
            'price' => 25000000,
            'duration' => '9 hari / 8 Malam',
            'departure_date' => '15 Juni 2026',
            'hotel' => 'Bintang 2 & 3',
            'facilities' => [
                'Visa Umrah',
                'Makan & Minum',
                'Transportasi',
                'Asuransi',
                'Mutawif & Muthif',
                'Panduan & Edukasi'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, pemeriksaan dokumen dan boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel, istirahat'],
                ['day' => 'Hari 4-6', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, dan aktivitas di Makkah'],
                ['day' => 'Hari 7-8', 'title' => 'Perjalanan ke Madinah', 'desc' => 'Ke Madinah mengunjungi masjid dan ziarah'],
                ['day' => 'Hari 9', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik, tiba di Indonesia']
            ]
        ],
        2 => [
            'id' => 2,
            'name' => 'Paket Umrah Plus',
            'price' => 35000000,
            'duration' => '12 hari / 11 Malam',
            'departure_date' => '20 Juli 2026',
            'hotel' => 'Bintang 5',
            'additional_facilities' => [
                'City Tour Madinah',
                'City Tour Makkah',
                'Tour Tabalung (optional)'
            ],
            'main_facilities' => [
                'Visa Umrah',
                'Makan & Minum',
                'Liburan ke Madinah',
                'Mutawif & Muthif',
                'Ibadah Ina',
                'Bus AC',
                'Penerbangan'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, pemeriksaan dokumen dan boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel bintang 5'],
                ['day' => 'Hari 4-7', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, city tour, dan aktivitas spiritual'],
                ['day' => 'Hari 8-11', 'title' => 'Madinah & Wisata', 'desc' => 'Madinah, mengunjungi masjid, ziarah, city tour, dan liburan'],
                ['day' => 'Hari 12', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik dengan istirahat, tiba di Indonesia']
            ]
        ],
        3 => [
            'id' => 3,
            'name' => 'Paket Umrah VIP',
            'price' => 50000000,
            'duration' => '15 hari / 14 Malam',
            'departure_date' => '20 Maret 2027',
            'departure_airline' => 'Qatar Airways',
            'hotel' => 'Bintang 5',
            'additional_facilities' => [
                'Hotel Bintang 5 di Makkah',
                'Makanan buffet internasional',
                'Transportasi VIP',
                'Penerbangan-unduh Haines'
            ],
            'main_facilities' => [
                'Visa Umrah',
                'Tiket Pesawat',
                'Hotel Bintang',
                'Liburan ke Makkah',
                'Ibadah Ina',
                'Bus AC',
                'Penerbangan'
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan Premium', 'desc' => 'Lounge khusus, business class boarding'],
                ['day' => 'Hari 2-3', 'title' => 'Arrival di Luxury Hotel', 'desc' => 'Hotel 5 bintang mewah, welcome dinner'],
                ['day' => 'Hari 4-8', 'title' => 'Umrah Lengkap', 'desc' => 'Umrah, aktivitas spiritual, luxury city tour'],
                ['day' => 'Hari 9-12', 'title' => 'Madinah Eksklusif', 'desc' => 'Hotel bintang 5, tour pribadi, wellness'],
                ['day' => 'Hari 13-15', 'title' => 'Relaksasi & Pulang', 'desc' => 'Spa, shopping, business class return']
            ]
        ]
    ];
    
    $package = $packages[$id] ?? $packages[1];
    $draft = session('pendaftaran_draft.' . $id, []);
    return view('pendaftaran', ['package' => $package, 'draft' => $draft]);
})->name('pendaftaran.show');

Route::post('/pendaftaran/{id}/draft', function (Request $request, $id) {
    $draft = $request->only([
        'fullName',
        'nik',
        'birthPlace',
        'birthDate',
        'gender',
        'phone',
        'email',
        'passport',
        'address'
    ]);

    session(['pendaftaran_draft.' . $id => $draft]);

    return redirect('/pendaftaran/' . $id)->with('status', 'Draft pendaftaran berhasil disimpan. Anda dapat kembali melanjutkan kapan saja.');
});

Route::get('/pembayaran/{id}', function ($id) {
    $packages = [
        1 => [
            'id' => 1,
            'name' => 'Paket Umrah Reguler',
            'price' => 25000000,
            'duration' => '9 hari / 8 Malam',
            'departure_date' => '15 Juni 2026',
            'hotel' => 'Bintang 2 & 3',
        ],
        2 => [
            'id' => 2,
            'name' => 'Paket Umrah Plus',
            'price' => 35000000,
            'duration' => '12 hari / 11 Malam',
            'departure_date' => '20 Juli 2026',
            'hotel' => 'Bintang 5',
        ],
        3 => [
            'id' => 3,
            'name' => 'Paket Umrah VIP',
            'price' => 50000000,
            'duration' => '15 hari / 14 Malam',
            'departure_date' => '20 Maret 2027',
            'hotel' => 'Bintang 5',
        ]
    ];
    $package = $packages[$id] ?? $packages[1];
    return view('pembayaran', ['package' => $package]);
})->name('pembayaran.show');

Route::get('/pembayaran/{id}/confirm', function ($id) {
    return redirect('/pembayaran/' . $id);
});

Route::post('/pembayaran/{id}/confirm', function ($id) {
    $packages = [
        1 => [
            'id' => 1,
            'name' => 'Paket Umrah Reguler',
            'price' => 25000000,
            'duration' => '9 hari / 8 Malam',
            'departure_date' => '15 Juni 2026',
            'hotel' => 'Bintang 2 & 3',
        ],
        2 => [
            'id' => 2,
            'name' => 'Paket Umrah Plus',
            'price' => 35000000,
            'duration' => '12 hari / 11 Malam',
            'departure_date' => '20 Juli 2026',
            'hotel' => 'Bintang 5',
        ],
        3 => [
            'id' => 3,
            'name' => 'Paket Umrah VIP',
            'price' => 50000000,
            'duration' => '15 hari / 14 Malam',
            'departure_date' => '20 Maret 2027',
            'hotel' => 'Bintang 5',
        ]
    ];
    $package = $packages[$id] ?? $packages[1];
    return view('status-pembayaran', ['package' => $package]);
})->name('pembayaran.confirm');
