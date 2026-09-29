@extends('layouts.app')

@section('title', 'Batch Tanam')

@section('content')

<h1>Batch Tanam</h1>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
    <br>
@endif

<a href="{{ route('batch-tanam.create') }}">
    + Tambah Batch Tanam
</a>

<br><br>

<table border="1" cellpadding="10" width="100%">

    <thead>
        <tr>
            <th>No</th>
            <th>Kode Batch</th>
            <th>Sayur</th>
            <th>Varietas</th>
            <th>Tanggal Semai</th>
            <th>Tanggal Tanam</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($batchTanams as $batch)

            <tr>

                <td>
                    {{ $batchTanams->firstItem() + $loop->index }}
                </td>

                <td>
                    {{ $batch->kode_batch }}
                </td>

                <td>
                    {{ $batch->varietas->sayur->nama_sayur ?? '-' }}
                </td>

                <td>
                    {{ $batch->varietas->nama_varietas ?? '-' }}
                </td>

                <td>
                    {{ $batch->tanggal_semai ?? '-' }}
                </td>

                <td>
                    {{ $batch->tanggal_tanam }}
                </td>

                <td>
                    {{ $batch->jumlah_tanam }}
                </td>

                <td>
                    {{ ucfirst($batch->status_tanaman) }}
                </td>

                <td>

                    <a href="{{ route('batch-tanam.edit', $batch) }}">
                        Edit
                    </a>

                    <form
                        action="{{ route('batch-tanam.destroy', $batch) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus batch ini?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="9" align="center">
                    Belum ada data batch tanam.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<br>

{{ $batchTanams->links() }}

@endsection
