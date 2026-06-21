@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div style="margin-bottom: 28px;">
        <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 4px;">Dashboard</h1>
        <p style="color: #7d8d83; font-size: 0.95rem;">Ringkasan data Smart Umrah</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 8px;">
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Total Jamaah</div>
                <div class="stat-value">{{ number_format($totalJamaah) }}</div>
                <div class="stat-sub">{{ $sudahVerifikasi }} terverifikasi</div>
            </div>
            <div class="stat-icon icon-green"><i class="fas fa-users"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Paket Aktif</div>
                <div class="stat-value">{{ $paketAktif }}</div>
                <div class="stat-sub">paket umrah tersedia</div>
            </div>
            <div class="stat-icon icon-blue"><i class="fas fa-box"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Belum Verifikasi</div>
                <div class="stat-value">{{ $belumVerifikasi }}</div>
                <div class="stat-sub">menunggu verifikasi</div>
            </div>
            <div class="stat-icon icon-yellow"><i class="fas fa-user-clock"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Pendaftaran Pending</div>
                <div class="stat-value">{{ $pendaftaranPending }}</div>
                <div class="stat-sub">perlu ditindaklanjuti</div>
            </div>
            <div class="stat-icon icon-red"><i class="fas fa-clipboard-list"></i></div>
        </div>
    </div>

    <div class="data-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 16px;">
            <div>
                <h2 style="font-size: 1.25rem; font-weight: 700; margin: 0;">Jamaah Terbaru</h2>
                <p style="color: #7d8d83; font-size: 0.9rem; margin: 4px 0 0;">Daftar jamaah yang baru terdaftar</p>
            </div>
            <form method="GET" action="{{ route('admin.dashboard.search') }}" class="d-flex gap-2" style="flex: 1; max-width: 360px;">
                <input type="text" name="q" class="form-control" placeholder="Cari nama atau email jamaah..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-sm-green"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @if(session('search') !== null && $recentJamaah->isEmpty())
            <div style="text-align: center; padding: 40px; color: #7d8d83;">
                <i class="fas fa-search" style="font-size: 2rem; opacity: 0.4; margin-bottom: 12px;"></i>
                <p>Tidak ada jamaah yang cocok dengan pencarian "{{ $search }}".</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background: #f7fff8;">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Paket</th>
                            <th>Status</th>
                            <th>Tgl Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentJamaah as $jamaah)
                            @php
                                $lastPendaftaran = $jamaah->pendaftarans->last();
                                $paketName = $lastPendaftaran->paketUmrah->nama ?? '-';
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 36px; height: 36px; border-radius: 10px; background: #dff7ec; color: #0c8a63; display: grid; place-items: center; font-weight: 700; font-size: 0.85rem;">{{ $jamaah->inisial }}</div>
                                        <strong>{{ $jamaah->nama }}</strong>
                                    </div>
                                </td>
                                <td style="color: #7d8d83;">{{ $jamaah->email }}</td>
                                <td>{{ $paketName }}</td>
                                <td>
                                    @if($jamaah->status_verifikasi === 'terverifikasi')
                                        <span class="badge-soft-green"><i class="fas fa-check"></i> Terverifikasi</span>
                                    @else
                                        <span class="badge-soft-yellow"><i class="fas fa-clock"></i> Belum</span>
                                    @endif
                                </td>
                                <td style="color: #7d8d83; font-size: 0.85rem;">{{ $jamaah->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.jamaah.detail', $jamaah->id) }}" class="btn-sm-green"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" style="text-align: center; padding: 40px; color: #7d8d83;">Belum ada jamaah terdaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $recentJamaah->links() }}
            </div>
        @endif
    </div>
@endsection
