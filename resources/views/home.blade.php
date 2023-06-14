@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-4">
        <h2>Paket Internet</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Paket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Paket A</td>
                    <td>Rp100.000</td>
                    <td>Kecepatan 10 Mbps</td>
                </tr>
                <tr>
                    <td>Paket B</td>
                    <td>Rp200.000</td>
                    <td>Kecepatan 20 Mbps</td>
                </tr>
                <tr>
                    <td>Paket C</td>
                    <td>Rp300.000</td>
                    <td>Kecepatan 30 Mbps</td>
                </tr>
                <tr>
                    <td>Paket D</td>
                    <td>Rp400.000</td>
                    <td>Kecepatan 40 Mbps</td>
                </tr>
                <tr>
                    <td>Paket E</td>
                    <td>Rp500.000</td>
                    <td>Kecepatan 50 Mbps</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('invoice') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="invoice_date">Tanggal:</label>
                <input type="date" id="invoice_date" name="invoice_date" required>
            </div>
            <div class="form-group">
                <label for="package">Paket:</label>
                <select id="package" name="package" class="form-control">
                    <option value="A">Paket A</option>
                    <option value="B">Paket B</option>
                    <option value="C">Paket C</option>
                    <option value="D">Paket D</option>
                    <option value="E">Paket E</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
