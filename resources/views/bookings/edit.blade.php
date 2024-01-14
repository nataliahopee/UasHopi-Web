@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Booking</div>
                    <div class="card-body">
                        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mt-3">
                                <label for="nama_peminjam" class="col-md-4 col-form-label text-right">Nama Peminjam</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="nama_peminjam" name="nama_peminjam" aria-label="nama_peminjam" required>
                                            <option value="">Choose</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('nama_peminjam'))
                                            <span class="text-danger">{{ $errors->first('nama_peminjam') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="ruangan_dipinjam" class="col-md-4 col-form-label text-right">Ruangan</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="ruangan_dipinjam" name="ruangan_dipinjam" aria-label="ruangan_dipinjam" required>
                                        <option value="">Choose</option>
                                        @foreach($ruangans as $ruangan)
                                            <option value="{{ $ruangan->id }}" {{ ($ruangan->id == $booking->ruangan_dipinjam) ? 'selected' : '' }}>{{ $ruangan->nama_ruangan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ruangan_dipinjam'))
                                        <span class="text-danger">{{ $errors->first('ruangan_dipinjam') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="tanggal_peminjaman" class="col-md-4 col-form-label text-right">Tanggal Awal Pinjam</label>
                                <div class="col-md-6">
                                    <input type="date" id="tanggal_peminjaman" class="form-control" name="tanggal_peminjaman" required value="{{ $booking->tanggal_peminjaman }}">
                                    @if ($errors->has('tanggal_peminjaman'))
                                        <span class="text-danger">{{ $errors->first('tanggal_peminjaman') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="akhir_peminjaman" class="col-md-4 col-form-label text-right">Tanggal Akhir Pinjam</label>
                                <div class="col-md-6">
                                    <input type="date" id="akhir_peminjaman" class="form-control" name="akhir_peminjaman" required value="{{ $booking->akhir_peminjaman }}">
                                    @if ($errors->has('akhir_peminjaman'))
                                        <span class="text-danger">{{ $errors->first('akhir_peminjaman') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
