@extends('layouts.admin')

@section('title', 'Belum Terverifikasi')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #0c8a63; text-decoration: none; font-weight: 600;">&larr; Kembali ke Dashboard</a>
    </div>

    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 1.5rem; font-weight: 700; margin: 0;">Jamaah Belum Terverifikasi</h1>
        <p style="color: #7d8d83; margin: 4px 0 0;">{{ $belumVerifikasi }} jamaah menunggu verifikasi</p>
    </div>

    <div class="data-card">
        <form method="GET" action="{{ route('admin.belum.verifikasi') }}" class="d-flex gap-2 mb-3" style="max-width: 400px;">
            <input type="text" name="q" class="form-control" placeholder="Cari nama atau email..." value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-sm-green"><i class="fas fa-search"></i></button>
            @if($search)<a href="{{ route('admin.belum.verifikasi') }}" class="btn btn-outline-secondary">Reset</a>@endif
        </form>

        <div class="row g-3">
            @forelse($jamaah as $item)
                @php $paket = $item->pendaftarans->last()?->paketUmrah; @endphp
                <div class="col-md-6 col-lg-4">
                    <div style="background: #fff; border: 1px solid #e8eee9; border-radius: 14px; padding: 16px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: linear-gradient(135deg, #0c8a63, #087554); color: #fff; display: grid; place-items: center; font-weight: 700;">{{ $item->inisial }}</div>
                            <div style="flex: 1;">
                                <strong style="display: block;">{{ $item->nama }}</strong>
                                <small style="color: #9ca9a2;">{{ $item->email }}</small>
                            </div>
                            <span class="badge-soft-yellow">PENDING</span>
                        </div>
                        <div style="font-size: 0.85rem; color: #7d8d83; margin-bottom: 12px;">
                            @if($paket)
                                <div><i class="fas fa-box text-success"></i> {{ $paket->nama }} - Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                            @else
                                <div class="text-muted"><i class="fas fa-info-circle"></i> Belum memilih paket</div>
                            @endif
                            <div><i class="fas fa-phone text-success"></i> {{ $item->telepon ?? '-' }}</div>
                        </div>
                        <form action="{{ route('admin.jamaah.verify', $item->id) }}" method="POST" style="display: flex; gap: 8px;">
                            @csrf
                            <input type="hidden" name="status_verifikasi" value="terverifikasi">
                            <button type="submit" class="btn btn-sm-green flex-fill"><i class="fas fa-check"></i> Verifikasi</button>
                        </form>
                        <a href="{{ route('admin.jamaah.detail', $item->id) }}" class="btn btn-outline-secondary btn-sm w-100 mt-2"><i class="fas fa-eye"></i> Lihat Detail</a>
                    </div>
                </div>
            @empty
                <div class="col-12" style="text-align: center; padding: 60px; color: #7d8d83;">
                    <i class="fas fa-check-circle" style="font-size: 2.5rem; color: #0c8a63; opacity: 0.6; margin-bottom: 12px;"></i>
                    <p>Tidak ada jamaah yang menunggu verifikasi.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $jamaah->links() }}
        </div>
    </div>
@endsection
