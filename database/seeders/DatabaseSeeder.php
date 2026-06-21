<?php

namespace Database\Seeders;

use App\Models\Jamaah;
use App\Models\PaketUmrah;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== Admin account =====
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smartumrah.test',
            'password' => bcrypt('password'),
            'phone' => '081200000000',
            'role' => 'admin',
        ]);

        // ===== Packages with full data =====
        $paket1 = PaketUmrah::create([
            'nama' => 'Umrah Reguler',
            'tipe' => 'reguler',
            'deskripsi' => 'Paket umrah hemat dengan fasilitas lengkap untuk perjalanan ibadah yang nyaman.',
            'harga' => 25000000,
            'durasi' => 9,
            'hotel' => 'Bintang 2 & 3',
            'maskapai' => 'Garuda Indonesia',
            'tanggal_berangkat' => '15 Juni 2027',
            'lokasi_keberangkatan' => 'Jakarta',
            'fasilitas' => [
                'Visa Umrah',
                'Makan & Minum',
                'Transportasi',
                'Asuransi Perjalanan',
                'Mutawif & Muthif',
                'Panduan & Edukasi',
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, pemeriksaan dokumen dan boarding.'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel, istirahat.'],
                ['day' => 'Hari 4-6', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, dan aktivitas ibadah di Makkah.'],
                ['day' => 'Hari 7-8', 'title' => 'Perjalanan ke Madinah', 'desc' => 'Ke Madinah, mengunjungi masjid dan ziarah.'],
                ['day' => 'Hari 9', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik, tiba di Indonesia.'],
            ],
            'status' => 'aktif',
        ]);

        $paket2 = PaketUmrah::create([
            'nama' => 'Umrah Plus',
            'tipe' => 'plus',
            'deskripsi' => 'Paket umrah plus dengan hotel bintang 4 dan city tour eksklusif.',
            'harga' => 35000000,
            'durasi' => 12,
            'hotel' => 'Bintang 4',
            'maskapai' => 'Saudia Airlines',
            'tanggal_berangkat' => '20 Juli 2027',
            'lokasi_keberangkatan' => 'Jakarta',
            'fasilitas' => [
                'Visa Umrah',
                'Makan & Minum',
                'Hotel Bintang 4',
                'City Tour Makkah & Madinah',
                'Mutawif & Muthif',
                'Bus AC',
                'Asuransi Perjalanan',
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan dari Jakarta', 'desc' => 'Kumpul di bandara, boarding dengan Saudia Airlines.'],
                ['day' => 'Hari 2-3', 'title' => 'Tiba di Jeddah & Makkah', 'desc' => 'Perjalanan ke Makkah, check-in hotel bintang 4.'],
                ['day' => 'Hari 4-7', 'title' => 'Umrah di Makkah', 'desc' => 'Umrah, thawaf, sa\'i, city tour, dan aktivitas spiritual.'],
                ['day' => 'Hari 8-11', 'title' => 'Madinah & Wisata', 'desc' => 'Madinah, ziarah, city tour, dan liburan.'],
                ['day' => 'Hari 12', 'title' => 'Pulang ke Jakarta', 'desc' => 'Perjalanan balik dengan istirahat, tiba di Indonesia.'],
            ],
            'status' => 'aktif',
        ]);

        $paket3 = PaketUmrah::create([
            'nama' => 'Umrah VIP',
            'tipe' => 'vip',
            'deskripsi' => 'Paket umrah premium eksklusif dengan hotel bintang 5 dan layanan VIP.',
            'harga' => 50000000,
            'durasi' => 15,
            'hotel' => 'Bintang 5',
            'maskapai' => 'Qatar Airways',
            'tanggal_berangkat' => '20 Maret 2027',
            'lokasi_keberangkatan' => 'Jakarta',
            'fasilitas' => [
                'Visa Umrah',
                'Tiket Pesawat Business Class',
                'Hotel Bintang 5',
                'Makanan Buffet Internasional',
                'Transportasi VIP',
                'Tour Guide Pribadi',
                'City Tour Eksklusif',
            ],
            'itinerary' => [
                ['day' => 'Hari 1', 'title' => 'Keberangkatan Premium', 'desc' => 'Lounge khusus, business class boarding.'],
                ['day' => 'Hari 2-3', 'title' => 'Arrival di Luxury Hotel', 'desc' => 'Hotel 5 bintang mewah, welcome dinner.'],
                ['day' => 'Hari 4-8', 'title' => 'Umrah Lengkap', 'desc' => 'Umrah, aktivitas spiritual, luxury city tour.'],
                ['day' => 'Hari 9-12', 'title' => 'Madinah Eksklusif', 'desc' => 'Hotel bintang 5, tour pribadi, wellness.'],
                ['day' => 'Hari 13-15', 'title' => 'Relaksasi & Pulang', 'desc' => 'Spa, shopping, business class return.'],
            ],
            'status' => 'aktif',
        ]);

        // ===== Sample jamaah + registrations + payments =====
        $jamaahData = [
            ['Siti Aminah', 'siti.aminah@email.com', '08123456789', 'perempuan'],
            ['Ahmad Fauzi', 'ahmad.fauzi@email.com', '08234567890', 'laki-laki'],
            ['Fatimah Zahra', 'fatimah.zahra@email.com', '08345678901', 'perempuan'],
            ['Muhammad Riski', 'm.riski@email.com', '08456789012', 'laki-laki'],
            ['Khadijah Brini', 'khadijah.brini@email.com', '08567890123', 'perempuan'],
            ['Nurdin Saleh', 'nurdin.saleh@email.com', '08678901234', 'laki-laki'],
            ['Aisha Muhammad', 'aisha.m@email.com', '08789012345', 'perempuan'],
            ['Budi Santoso', 'budi.santoso@email.com', '08890123456', 'laki-laki'],
            ['Nuraeni Pratiwi', 'nuraeni.p@email.com', '08901234567', 'perempuan'],
            ['Hassan Ali', 'hassan.ali@email.com', '09012345678', 'laki-laki'],
        ];

        $pakets = [$paket1, $paket2, $paket3];

        foreach ($jamaahData as $index => $data) {
            [$nama, $email, $telepon, $jenisKelamin] = $data;
            $isVerified = $index < 7;

            $user = User::create([
                'name' => $nama,
                'email' => $email,
                'password' => bcrypt('password'),
                'phone' => $telepon,
                'role' => 'jamaah',
            ]);

            $jamaah = Jamaah::create([
                'user_id' => $user->id,
                'nama' => $nama,
                'email' => $email,
                'telepon' => $telepon,
                'nik' => '31750' . str_pad((string) ($index + 1), 11, '0', STR_PAD_LEFT),
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::now()->subYears(30 + $index),
                'jenis_kelamin' => $jenisKelamin,
                'pasport' => $isVerified ? 'A' . str_pad((string) ($index + 1), 7, '0', STR_PAD_LEFT) : null,
                'alamat' => 'Jl. Contoh No. ' . ($index + 1) . ', Jakarta',
                'status_verifikasi' => $isVerified ? 'terverifikasi' : 'belum',
            ]);

            $paket = $pakets[$index % 3];
            $tanggalPendaftaran = Carbon::now()->subDays($index * 5);

            $pendaftaran = Pendaftaran::create([
                'jamaah_id' => $jamaah->id,
                'paket_umrah_id' => $paket->id,
                'tanggal_pendaftaran' => $tanggalPendaftaran,
                'status' => $isVerified ? 'aktif' : 'pending',
            ]);

            // Buat pembayaran untuk jamaah yang sudah terverifikasi.
            if ($isVerified) {
                $biayaAdmin = 250000;
                Pembayaran::create([
                    'pendaftaran_id' => $pendaftaran->id,
                    'metode' => 'Transfer Bank BCA',
                    'jumlah' => $paket->harga,
                    'biaya_admin' => $biayaAdmin,
                    'total' => $paket->harga + $biayaAdmin,
                    'tanggal_bayar' => $tanggalPendaftaran->copy()->addDay(),
                    'status' => 'terverifikasi',
                ]);
            }
        }
    }
}
