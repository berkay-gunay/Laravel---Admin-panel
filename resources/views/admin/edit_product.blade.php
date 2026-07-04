@extends('admin.main')
@section('content')

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Ürün Düzenle</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.urun.listesi') }}">Ürün Listesi</a></li>
                            <li class="breadcrumb-item active">Düzenle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">

                    <div class="col-md-12">

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

                        <div class="card card-warning card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title">Ürün Bilgilerini Güncelle</div>
                            </div>

                            <form action="{{ route('admin.urun.guncelle', $urun->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="urun_adi" class="form-label">Ürün Adı <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="urun_adi" name="urun_adi"
                                                value="{{ old('urun_adi', $urun->urun_adi) }}" required />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="marka" class="form-label">Marka <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="marka" name="marka"
                                                value="{{ old('marka', $urun->marka) }}" required />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="fiyati" class="form-label">Fiyatı (TL) <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control" id="fiyati"
                                                name="fiyati" value="{{ old('fiyati', $urun->fiyati) }}" required />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="urun_grubu" class="form-label">Ürün Grubu <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="urun_grubu" name="urun_grubu" required>
                                                <option value="">Seçiniz...</option>
                                                <option value="Güneş Gözlüğü"
                                                    {{ old('urun_grubu', $urun->urun_grubu) == 'Güneş Gözlüğü' ? 'selected' : '' }}>
                                                    Güneş Gözlüğü</option>
                                                <option value="Optik Gözlük"
                                                    {{ old('urun_grubu', $urun->urun_grubu) == 'Optik Gözlük' ? 'selected' : '' }}>
                                                    Optik Gözlük</option>
                                                <option value="Lens"
                                                    {{ old('urun_grubu', $urun->urun_grubu) == 'Lens' ? 'selected' : '' }}>
                                                    Lens</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="cinsiyet" class="form-label">Cinsiyet</label>
                                            <select class="form-select" id="cinsiyet" name="cinsiyet">
                                                <option value="">Unisex</option>
                                                <option value="Kadın"
                                                    {{ old('cinsiyet', $urun->cinsiyet) == 'Kadın' ? 'selected' : '' }}>
                                                    Kadın</option>
                                                <option value="Erkek"
                                                    {{ old('cinsiyet', $urun->cinsiyet) == 'Erkek' ? 'selected' : '' }}>
                                                    Erkek</option>
                                                <option value="Çocuk"
                                                    {{ old('cinsiyet', $urun->cinsiyet) == 'Çocuk' ? 'selected' : '' }}>
                                                    Çocuk</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="cerceve_rengi" class="form-label">Çerçeve Rengi</label>
                                            <input type="text" class="form-control" id="cerceve_rengi"
                                                name="cerceve_rengi"
                                                value="{{ old('cerceve_rengi', $urun->cerceve_rengi) }}" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="cam_rengi" class="form-label">Cam Rengi</label>
                                            <input type="text" class="form-control" id="cam_rengi" name="cam_rengi"
                                                value="{{ old('cam_rengi', $urun->cam_rengi) }}" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="cerceve_sekli" class="form-label">Çerçeve Şekli</label>
                                            <input type="text" class="form-control" id="cerceve_sekli"
                                                name="cerceve_sekli"
                                                value="{{ old('cerceve_sekli', $urun->cerceve_sekli) }}" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="ekartman" class="form-label">Ekartman</label>
                                            <input type="text" class="form-control" id="ekartman" name="ekartman"
                                                value="{{ old('ekartman', $urun->ekartman) }}" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="sap_uzunlugu" class="form-label">Sap Uzunluğu</label>
                                            <input type="text" class="form-control" id="sap_uzunlugu"
                                                name="sap_uzunlugu"
                                                value="{{ old('sap_uzunlugu', $urun->sap_uzunlugu) }}" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="kopru_uzunlugu" class="form-label">Köprü Uzunluğu</label>
                                            <input type="text" class="form-control" id="kopru_uzunlugu"
                                                name="kopru_uzunlugu"
                                                value="{{ old('kopru_uzunlugu', $urun->kopru_uzunlugu) }}" />
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="urun_aciklamasi" class="form-label">Ürün Açıklaması</label>
                                            <textarea class="form-control" id="urun_aciklamasi" name="urun_aciklamasi" rows="3">{{ old('urun_aciklamasi', $urun->urun_aciklamasi) }}</textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-check mt-4">
                                                <input type="checkbox" class="form-check-input" id="degrade"
                                                    name="degrade" value="1"
                                                    {{ old('degrade', $urun->degrade) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="degrade">Camlarda Degrade (Renk
                                                    Geçişi) Var</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="urun_gorseli">Ürün Görseli</label>
                                            @if ($urun->urun_gorseli)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/urunler/' . $urun->urun_gorseli) }}"
                                                        alt="Mevcut Görsel" class="img-thumbnail"
                                                        style="max-height: 80px;">
                                                    <small class="text-muted d-block mt-1">Mevcut görsel. Değiştirmek
                                                        istemiyorsanız boş bırakın.</small>
                                                </div>
                                            @endif
                                            <input type="file" class="form-control" id="urun_gorseli"
                                                name="urun_gorseli" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.urun.listesi') }}" class="btn btn-secondary me-2">İptal</a>
                                    <button type="submit" class="btn btn-warning text-dark"><i
                                            class="bi bi-save me-2"></i>Değişiklikleri Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
