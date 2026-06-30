@extends('admin.main')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Ürün Listesi</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ürün Listesi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Hata kontrolü -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i> Lütfen
                                    Hataları Düzeltin:</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Kayıtlı Tüm Gözlük ve Lensler</h3>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px;" class="text-center">ID</th>
                                                <th>Ürün Adı</th>
                                                <th>Marka</th>
                                                <th>Fiyatı</th>
                                                <th>Ürün Grubu</th>
                                                <th style="width: 150px;" class="text-center">İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($urunler as $urun)
                                                <tr>
                                                    <td class="text-center">{{ $urun->id }}</td>
                                                    <td>{{ $urun->urun_adi }}</td>
                                                    <td>{{ $urun->marka }}</td>
                                                    <td>{{ number_format($urun->fiyati, 2, ',', '.') }} ₺</td>
                                                    <td>
                                                        <span class="badge bg-secondary">{{ $urun->urun_grubu }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-sm btn-primary" title="Düzenle">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <form action="{{ route('admin.urun.sil', $urun->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Sil"
                                                                onclick="return confirm('Bu ürünü silmek istediğinize emin misiniz?');">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4 text-muted">
                                                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                                        Henüz veritabanına ürün eklenmemiş.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <span class="float-end">Toplam: {{ $urunler->count() }} Ürün</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
