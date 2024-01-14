@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Table Bookings') }}</div>

                <div class="card-body">
                    <a href="{{ route('bookings.create') }}" class="btn btn-sm btn-secondary">
                        Booking
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Tanggal Awal Peminjaman</th>
                                <th scope="col">Tanggal Akhir Peminjaman</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($ruangans as $row)
                                <?php $no++ ?>
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $row->user ? $row->user->name : 'User Not Found' }}</td>
                                    <td>{{$row->ruangan->nama_ruangan}}</td>
                                    <td>{{$row->start_book}}</td>
                                    <td>{{$row->end_book}}</td>
                                    <td>
                                        <a href="{{ route('bookings.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('bookings.destroy',$row->id) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('Yakin mau menghapus data {{ $row->nama_peminjam }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                                Delete
                                            </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
