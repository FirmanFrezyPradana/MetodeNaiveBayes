@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hasil Data Uji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hasil Data Uji</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- NOTIFIKASI -->
        @if (session('flash_training'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6>
                <i class="icon fas fa-check"></i>
                Data Berhasil
                <strong>
                    {{ session('flash_training') }}
                </strong>
            </h6>
        </div>
        @endif

        <!-- tambah data -->
        <!-- tambah data -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Perhitungan Naive Bayes</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Perhitungan Probabilitas</label>
                                            <ul>
                                                <li>
                                                    <h6>Keputusan Cuaca</h6>
                                                </li>
                                                <p>Total Semua data : {{$jumlahData}}</p>
                                                <p>P(Cuaca = Cerah) : {{$jumlahCerah}}/{{$jumlahData}} = {{$probabilitasCerah}}</p>
                                                <p>P(Cuaca = Hujan) :{{$jumlahHujan}}/{{$jumlahData}} = {{$probabilitasHujan}}</p>
                                                <p>P(Cuaca = Beraawan) :{{$jumlahBerawan}}/{{$jumlahData}} = {{$probabilitasBerawan}}</p>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <ul>
                                                <li>
                                                    <h6>Attribut Suhu : {{$probabilitasSuhu}}</h6>
                                                </li>
                                                <p>P({{$probabilitasSuhu}} = Cerah) : {{$jumlahSuhuCerah}}/{{$jumlahCerah}} = {{$probabilitasSuhuCerah}}</p>
                                                <p>P({{$probabilitasSuhu}} = Hujan) :{{$jumlahSuhuHujan}}/{{$jumlahHujan}} = {{$probabilitasSuhuHujan}}</p>
                                                <p>P({{$probabilitasSuhu}} = Barawan) :{{$jumlahSuhuBerawan}}/{{$jumlahBerawan}} = {{$probabilitasSuhuBerawan}}</p>
                                            </ul>

                                        </div>
                                        <div class="form-group">
                                            <ul>
                                                <li>
                                                    <h6>Attribut Kelembapan: {{$probabilitasKelembaban}}</h6>
                                                </li>
                                                <p>P({{$probabilitasKelembaban}} = Cerah) : {{$jumlahKelembabanCerah}}/{{$jumlahCerah}} = {{$probabilitasKelembabanCerah}}</p>
                                                <p>P({{$probabilitasKelembaban}} = Hujan) :{{$jumlahKelembabanHujan}}/{{$jumlahHujan}} = {{$probabilitasKelembabanHujan}}</p>
                                                <p>P({{$probabilitasKelembaban}} = Barawan) :{{$jumlahKelembabanBerawan}}/{{$jumlahBerawan}} = {{$probabilitasKelembabanBerawan}}</p>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <ul>
                                                <li>
                                                    <h6>Attribut Kecepatan Angin: {{$probabilitasKecepatan_angin}}</h6>
                                                </li>
                                                <p>P({{$probabilitasKecepatan_angin}} = Cerah) : {{$jumlahKecepatanAnginCerah}}/{{$jumlahCerah}} = {{$probabilitasKecepatanAnginCerah}}</p>
                                                <p>P({{$probabilitasKecepatan_angin}} = Hujan) :{{$jumlahKecepatanAnginHujan}}/{{$jumlahHujan}} = {{$probabilitasKecepatanAnginHujan}}</p>
                                                <p>P({{$probabilitasKecepatan_angin}} = Barawan) :{{$jumlahKecepatanAnginBerawan}}/{{$jumlahBerawan}} = {{$probabilitasKecepatanAnginBerawan}}</p>
                                            </ul>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Menghitung Probabilitas Posterior</label>
                                            <ul>
                                                <li>
                                                    <h6>Probabilitas Posterior Cerah : {{$probabilitasCerah}} * {{$probabilitasSuhuCerah }} * {{$probabilitasKelembabanCerah }} * {{ $probabilitasKecepatanAnginCerah }} = {{$probabilitasPosteriorCerah}} </h6>
                                                </li>
                                                <li>
                                                    <h6>Probabilitas Posterior Hujan : {{$probabilitasHujan}} * {{$probabilitasSuhuHujan }} * {{$probabilitasKelembabanHujan}} * {{$probabilitasKecepatanAnginHujan }} = {{$probabilitasPosteriorHujan}}</h6>
                                                </li>
                                                <li>
                                                    <h6>Probabilitas Posterior Berawan : {{$probabilitasBerawan}} * {{$probabilitasSuhuBerawan}} * {{$probabilitasKelembabanBerawan }} * {{$probabilitasKecepatanAnginBerawan}} = {{$probabilitasPosteriorBerawan}} </h6>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Menentukan Kelas</label>
                                            <ul>
                                                <h6>Kelas untuk Naive Bayes : {{$kelas}}</h6>
                                                <h6>Nilai Tertingggi : {{$nilaiTertinggi}}</h6>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kesimpulan</label>
                                            <ul>
                                                <div class="alert alert-success opacity-50 w-full" role="alert">
                                                    <h6>Jika Suhu = "{{$probabilitasSuhu }}" , Kelembaban = "{{$probabilitasKelembaban }}" , Kecepatan Angin = "{{$probabilitasKecepatan_angin}}"" maka cuaca = "{{$kelas}}"</h6>
                                                </div>

                                            </ul>
                                        </div>
                                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection