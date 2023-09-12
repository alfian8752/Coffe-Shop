@extends('admin.main')

@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }




        /* style table produk */
        .produk-section img {
            width: 50px;
        }

        .produk-section table td {
            /* display: flex; */
            /* flex-direction: column;
              justify-content: center; */
            align-items: center;
        }

        .produk-section .action button a {
            color: white;
            text-decoration: none;
        }

        @media (min-width: 300px) {
            .produk-section .action button {
                padding: 5px;
                font-size: 12px;
            }
        }
    </style>
@endsection

<!-- Custom styles for this template -->
<link href="css/dashboard.css" rel="stylesheet">

@section('body')
    <!-- Main section  -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Produk</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0"> -->
            <!-- <div class="btn-group me-2">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div> -->
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                      <span data-feather="calendar"></span>
                      This week
                    </button> -->
            <!-- </div> -->
        </div>
        <a href="uploadProduk.php" class="btn btn-success">Tambah Produk</a>
        <div class="table-responsive produk-section">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $row)
                        <tr d-flex flex-column justify-content-center>
                            <td><?= $row['id'] ?></td>
                            <td><img src="/img/menu/<?= $row['gambar'] ?>"></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['harga'] ?></td>
                            <td class="action">
                                <a type="submit" class="btn btn-danger" href="/hapus-produk-{{ $row->id }}">Hapus</a>
                                <a type="submit" class="btn btn-warning" href="/edit-produk-{{ $row->id }}">edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @section('sript')
        @if ( session()->has('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
    @endsection
@endsection
