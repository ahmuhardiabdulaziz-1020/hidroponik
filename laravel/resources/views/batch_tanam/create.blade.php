@extends('layouts.app')

@section('title', 'Tambah Batch Tanam')

@section('content')

<h1>Tambah Batch Tanam</h1>

@if($errors->any())

    <div>
        <strong>Data belum dapat disimpan:</strong>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <br>

@endif


<form
    action="{{ route('batch-tanam.store') }}"
    method="POST"
>

    @csrf


    <div>
        <label>Kode Batch</label>

        <br>

        <input
            type="text"
            name="kode_batch"
            value="{{ old('kode_batch') }}"
            required
        >
    </div>


    <br>


    <div>
        <label>Varietas</label>

        <br>

        <select name="id_varietas" required>

            <option value="">
                -- Pilih Varietas --
            </option>

            @foreach($varietas as $item)

                <option
                    value="{{ $item->id_varietas }}"
                    {{ old('id_varietas') == $item->id_varietas ? 'selected' : '' }}
                >
                    {{ $item->sayur->nama_sayur ?? '-' }}
                    -
                    {{ $item->nama_varietas }}
                </option>

            @endforeach

        </select>
    </div>


    <br>


    <div>
        <label>Tanggal Semai</label>

        <br>

        <input
            type="date"
            name="tanggal_semai"
            value="{{ old('tanggal_semai') }}"
        >
    </div>


    <br>


    <div>
        <label>Tanggal Tanam</label>

        <br>

        <input
            type="date"
            name="tanggal_tanam"
            value="{{ old('tanggal_tanam') }}"
            required
        >
    </div>


    <br>


    <div>
        <label>Jumlah Tanam</label>

        <br>

        <input
            type="number"
            name="jumlah_tanam"
            value="{{ old('jumlah_tanam') }}"
            min="1"
            required
        >
    </div>


    <br>


    <div>
        <label>Status</label>

        <br>

        <select name="status" required>

            <option value="">
                -- Pilih Status --
            </option>

            <option
                value="direncanakan"
                {{ old('status') == 'direncanakan' ? 'selected' : '' }}
            >
                Direncanakan
            </option>

            <option
                value="berjalan"
                {{ old('status') == 'berjalan' ? 'selected' : '' }}
            >
                Berjalan
            </option>

            <option
                value="selesai"
                {{ old('status') == 'selesai' ? 'selected' : '' }}
            >
                Selesai
            </option>

            <option
                value="gagal"
                {{ old('status') == 'gagal' ? 'selected' : '' }}
            >
                Gagal
            </option>

        </select>
    </div>


    <br>


    <div>
        <label>Keterangan</label>

        <br>

        <textarea
            name="keterangan"
            rows="4"
        >{{ old('keterangan') }}</textarea>
    </div>


    <br>


    <button type="submit">
        Simpan
    </button>

    <a href="{{ route('batch-tanam.index') }}">
        Kembali
    </a>

</form>

@endsection
