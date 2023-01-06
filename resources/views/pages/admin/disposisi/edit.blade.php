@extends('layouts.admin')

@section('title')
    Ubah Surat Disposisi
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Ubah Surat Disposisi
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Surat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('disposisi.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Ubah Disposisi <span style="color: green;"> * Harus diisi</span></div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="letter_id" class="col-sm-3 col-form-label">No. Surat</label>
                                    <div class="col-sm-9">
                                        <select name="letter_id" class="form-control" required>
                                            @foreach ($letters as $letter)
                                                <option value="{{ $letter->id }}" {{ $item->letter_id == $letter->id ? 'selected' : '' }}>
                                                    {{ $letter->letter_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('letter_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="lampiran" class="col-sm-3 col-form-label">lampiran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('lampiran') is-invalid @enderror" value="{{ $item->lampiran }}"
                                            name="lampiran" placeholder="Lampiran.." required>
                                    </div>
                                    @error('lampiran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9 row" style="float: right;">

                                        <div class="col-sm-4">
                                            <input type="checkbox" value="Asli" name="status[]" {{ in_array('Asli', $status) ? 'checked' : '' }}> Asli
                                            <br>
                                            <input type="checkbox" value="Tembusan" name="status[]" {{ in_array('Tembusan', $status) ? 'checked' : '' }}>
                                            Tembusan <br>
                                        </div>
                                    </div>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="sifat" class="col-sm-3 col-form-label">Sifat</label>
                                    <div class="col-sm-9 row" style="float: right;">
                                        <div class="col-sm-4">
                                            <input type="checkbox" value="Sangat Segera/kilat" name="sifat[]"
                                                {{ in_array('Sangat Segera/kilat', $sifat) ? 'checked' : '' }}> Sangat Segera/kilat <br>
                                            <input type="checkbox" value="Segera" name="sifat[]" {{ in_array('Segera', $sifat) ? 'checked' : '' }}>
                                            Segera <br>
                                            <input type="checkbox" value="Biasa" name="sifat[]" {{ in_array('Biasa', $sifat) ? 'checked' : '' }}> Biasa
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="checkbox" value="Sangat Rahasia" name="sifat[]"
                                                {{ in_array('Sangat Rahasia', $sifat) ? 'checked' : '' }}> Sangat Rahasia <br>
                                            <input type="checkbox" value="Rahasia" name="sifat[]" {{ in_array('Rahasia', $sifat) ? 'checked' : '' }}>
                                            Rahasia
                                        </div>
                                    </div>
                                    @error('sifat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="petunjuk" class="col-sm-3 col-form-label">Petunjuk</label>
                                    <div class="col-sm-9 row" style="float: right;">
                                        <div class="col-sm-4">
                                            <input type="checkbox" value="Setuju" name="petunjuk[]" {{ in_array('Setuju', $petunjuk) ? 'checked' : '' }}>
                                            Setuju <br>
                                            <input type="checkbox" value="Tolak" name="petunjuk[]" {{ in_array('Tolak', $petunjuk) ? 'checked' : '' }}>
                                            Tolak <br>
                                            <input type="checkbox" value="Teliti & Pendapat" name="petunjuk[]"
                                                {{ in_array('Teliti & Pendapat', $petunjuk) ? 'checked' : '' }}> Teliti & Pendapat <br>
                                            <input type="checkbox" value="Untuk Diketahui" name="petunjuk[]"
                                                {{ in_array('Untuk Diketahui', $petunjuk) ? 'checked' : '' }}> Untuk Diketahui <br>
                                            <input type="checkbox" value="Selesaikan" name="petunjuk[]"
                                                {{ in_array('Selesaikan', $petunjuk) ? 'checked' : '' }}> Selesaikan <br>
                                            <input type="checkbox" value="Sesuai Catatan" name="petunjuk[]"
                                                {{ in_array('Sesuai Catatan', $petunjuk) ? 'checked' : '' }}> Sesuai Catatan <br>
                                            <input type="checkbox" value="Untuk Perhatian" name="petunjuk[]"
                                                {{ in_array('Untuk Perhatian', $petunjuk) ? 'checked' : '' }}> Untuk Perhatian <br>
                                            <input type="checkbox" value="Edarkan" name="petunjuk[]"
                                                {{ in_array('Edarkan', $petunjuk) ? 'checked' : '' }}> Edarkan <br>
                                            <input type="checkbox" value="-" name="petunjuk[]" {{ in_array('-', $petunjuk) ? 'checked' : '' }}> -
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="checkbox" value="Jawab" name="petunjuk[]"
                                                {{ in_array('Jawab', $petunjuk) ? 'checked' : '' }}> Jawab <br>
                                            <input type="checkbox" value="Perbaiki" name="petunjuk[]"
                                                {{ in_array('Perbaiki', $petunjuk) ? 'checked' : '' }}> Perbaiki <br>
                                            <input type="checkbox" value="Bicarakan Dengan saya" name="petunjuk[]"
                                                {{ in_array('Bicarakan Dengan saya', $petunjuk) ? 'checked' : '' }}> Bicarakan Dengan saya <br>
                                            <input type="checkbox" value="Bicarakan Bersama" name="petunjuk[]"
                                                {{ in_array('Bicarakan Bersama', $petunjuk) ? 'checked' : '' }}> Bicarakan Bersama <br>
                                            <input type="checkbox" value="Ingatkan" name="petunjuk[]"
                                                {{ in_array('Ingatkan', $petunjuk) ? 'checked' : '' }}> Ingatkan <br>
                                            <input type="checkbox" value="Simpan" name="petunjuk[]"
                                                {{ in_array('Simpan', $petunjuk) ? 'checked' : '' }}> Simpan <br>
                                            <input type="checkbox" value="Disiapkan" name="petunjuk[]"
                                                {{ in_array('Disiapkan', $petunjuk) ? 'checked' : '' }}> Disiapkan <br>
                                            <input type="checkbox" value="Harap dihadiri/diwakili" name="petunjuk[]"
                                                {{ in_array('Harap dihadiri/diwakili', $petunjuk) ? 'checked' : '' }}> Harap dihadiri/diwakili <br>
                                        </div>
                                    </div>
                                    @error('petunjuk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="catatan_rektors" class="col-sm-3 col-form-label">Catatan Rektor</label>
                                    <div class="col-sm-9">
                                        <textarea id="catatan_rektors" class="form-control @error('catatan_rektor') is-invalid @enderror" name="catatan_rektor"
                                            placeholder="Catatan Rektor.." required>{{ old('catatan_rektor', $item->catatan_rektor) }}</textarea>
                                    </div>
                                    @error('catatan_rektor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Disposisi Lanjutan <span style="color: green;"> * Harus diisi</span></div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="tgl_selesai" class="col-sm-3 col-form-label">Tanggal Penyelesaian</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror"
                                            value="{{ $item->tgl_selesai }}" name="tgl_selesai" required>
                                    </div>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('kepada') is-invalid @enderror" value="{{ $item->kepada }}"
                                            name="kepada" placeholder="Kepada..." required>
                                    </div>
                                    @error('kepada')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="petunjuks" class="col-sm-3 col-form-label">Petunjuk</label>
                                    <div class="col-sm-9">
                                        <textarea id="petunjuks" class="form-control @error('petunjuk_kpd_1') is-invalid @enderror" name="petunjuk_kpd_1"
                                            placeholder="Petunjuk Untuk Penerima Disposisi.." required>{{ old('petunjuk_kpd_1', $item->petunjuk_kpd_1) }}</textarea>
                                    </div>
                                    @error('petunjuk_kpd_1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgl_selesai_2" class="col-sm-3 col-form-label">Tanggal Penyelesaian</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_selesai_2') is-invalid @enderror"
                                            value="{{ $item->tgl_selesai_2 }}" name="tgl_selesai_2" required>
                                    </div>
                                    @error('tgl_selesai_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="penerima_2" class="col-sm-3 col-form-label">Penerima</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('penerima_2') is-invalid @enderror"
                                            value="{{ $item->penerima_2 }}" name="penerima_2" placeholder="Penerima 2..." required>
                                    </div>
                                    @error('penerima_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Pengajuan Kembali Disposisi <span style="color: green;"> * Harus diisi</span></div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="tgl_aju_kembali" class="col-sm-3 col-form-label">Tanggal Di Ajukan Kembali</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_aju_kembali') is-invalid @enderror"
                                            value="{{ $item->tgl_aju_kembali }}" name="tgl_aju_kembali" required>
                                    </div>
                                    @error('tgl_aju_kembali')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="penerima_disposisi_2" class="col-sm-3 col-form-label">Penerima Disposisi</label>
                                    <div class="col-sm-9 row" style="float: right;">
                                        <div class="col-sm-12">
                                            <input type="checkbox" value="Sekretaris" name="penerima_disposisi_2[]"
                                                {{ in_array('Sekretaris', $penerima_disposisi_2) ? 'checked' : '' }}> Sekretaris <br>
                                            <input type="checkbox" value="Kabid Anggaran" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Anggaran', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Anggaran <br>
                                            <input type="checkbox" value="Kabid Pendataan Penetapan Dan Pelayanan" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Pendataan Penetapan Dan Pelayanan', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Pendataan
                                            Penetapan Dan Pelayanan <br>
                                            <input type="checkbox" value="Kabid Penagihan Dan Keberatan" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Penagihan Dan Keberatan', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Penagihan Dan
                                            Keberatan <br>
                                            <input type="checkbox" value="Kabid Perbendaharaan" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Perbendaharaan', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Perbendaharaan <br>
                                            <input type="checkbox" value="Kabid Pengelolaan Aset" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Pengelolaan Aset', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Pengelolaan Aset <br>
                                            <input class="mb-4" type="checkbox" value="Kabid Akuntansi" name="penerima_disposisi_2[]"
                                                {{ in_array('Kabid Akuntansi', $penerima_disposisi_2) ? 'checked' : '' }}> Kabid Akuntansi <br>
                                            <input type="checkbox" value="Semua Kasubag" name="penerima_disposisi_2[]"
                                                {{ in_array('Semua Kasubag', $penerima_disposisi_2) ? 'checked' : '' }}> Semua Kasubag <br>
                                            <input type="checkbox" value="Kasubag Bina Program" name="penerima_disposisi_2[]"
                                                {{ in_array('Kasubag Bina Program', $penerima_disposisi_2) ? 'checked' : '' }}> Kasubag Bina Program <br>
                                            <input type="checkbox" value="Kasubag Umum Dan Kepegawaian" name="penerima_disposisi_2[]"
                                                {{ in_array('Kasubag Umum Dan Kepegawaian', $penerima_disposisi_2) ? 'checked' : '' }}> Kasubag Umum Dan Kepegawaian
                                            <br>
                                            <input type="checkbox" value="Kasubag Keuangan" name="penerima_disposisi_2[]"
                                                {{ in_array('Kasubag Keuangan', $penerima_disposisi_2) ? 'checked' : '' }}> Kasubag Keuangan <br>
                                            <input type="checkbox" value="-" name="penerima_disposisi_2[]" {{ in_array('-', $penerima_disposisi_2) ? 'checked' : '' }}>
                                            -
                                        </div>
                                    </div>
                                    @error('penerima_disposisi_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="kepada_2" class="col-sm-3 col-form-label">Kepada</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('kepada_2') is-invalid @enderror"
                                            value="{{ $item->kepada_2 }}" name="kepada_2" placeholder="Kepada 2.." required>
                                    </div>
                                    @error('kepada_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="petunjukss" class="col-sm-3 col-form-label">Petunjuk</label>
                                    <div class="col-sm-9">
                                        <textarea id="petunjukss" class="form-control @error('petunjuk_kpd_2') is-invalid @enderror" name="petunjuk_kpd_2"
                                            placeholder="Petunjuk Untuk Penerima Disposisi.." required>{{ old('petunjuk_kpd_2', $item->petunjuk_kpd_2) }}</textarea>
                                    </div>
                                    @error('petunjuk_kpd_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgl_selesai_3" class="col-sm-3 col-form-label">Tanggal Penyelesaian</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_selesai_3') is-invalid @enderror"
                                            value="{{ $item->tgl_selesai_3 }}" name="tgl_selesai_3" required>
                                    </div>
                                    @error('tgl_selesai_3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="penerima_3" class="col-sm-3 col-form-label">Penerima</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('penerima_3') is-invalid @enderror"
                                            value="{{ $item->penerima_3 }}" name="penerima_3" placeholder="Penerima 3..." required>
                                    </div>
                                    @error('penerima_3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".selectx").select2({
            theme: "bootstrap-5"
        });
    </script>
@endpush
