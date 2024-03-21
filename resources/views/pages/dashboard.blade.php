@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
            <div class="col-lg-9 col-md-12 col-12 col-sm-12">
            </div>
            <div class="col-lg-3 col-md-12 col-12 col-sm-12">
               <select class="form-control">
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
               </select>
            </div>
            </div><br>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-user"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Target</h4>
                                            </div>
                                            <div class="card-body">
                                                100.000.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-danger">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Realisasi</h4>
                                            </div>
                                            <div class="card-body">
                                                80.000.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-warning">
                                            <i class="far fa-file"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Gap</h4>
                                            </div>
                                            <div class="card-body">
                                                20.000.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-circle"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Achiev</h4>
                                            </div>
                                            <div class="card-body">
                                                80 %
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                   <div class="card">
                    <table class="table table-sm">
                        <thead class="bg-info" style="color: white">
                          <tr>
                            <th></th>
                            <th scope="col" colspan="4" style="text-align: center">2024</th>
                            <th></th>
                          </tr>
                          <tr>
                            <th scope="col">LM</th>
                            <th scope="col">Targ (Kwh)</th>
                            <th scope="col">Real (kwh)</th>
                            <th scope="col">GAP</th>
                            <th scope="col">Achiev (%)</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Banten Utara</td>
                            <td>40300</td>
                            <td>162760</td>
                            <td>122.460</td>
                            <td>403.87</td>
                            <td style="background-color: green; color: white;">win</td>
                          </tr>
                          <tr>
                            <td>Banten Selatan</td>
                            <td>52390</td>
                            <td>4550</td>
                            <td>- 47.840</td>
                            <td>8.68</td>
                            <td style="background-color: red; color: white">Lose</td>
                          </tr>
                          <tr>
                            <td>Cikokol</td>
                            <td>36270</td>
                            <td>27170</td>
                            <td>- 9.100</td>
                            <td>74.91</td>
                            <td style="background-color: red; color: white">Lose</td>
                          </tr>
                          <tr>
                            <td>Serpong</td>
                            <td>44330</td>
                            <td>41340</td>
                            <td>- 2.990</td>
                            <td>93.26</td>
                            <td style="background-color: red; color: white">Lose</td>
                          </tr>
                          <tr>
                            <td>Cikupa</td>
                            <td>32240</td>
                            <td>32240</td>
                            <td>-</td>
                            <td>100.00</td>
                            <td style="background-color: green; color: white;">win</td>
                          </tr>
                          <tr>
                            <td>Teluk Naga</td>
                            <td>28210</td>
                            <td>19760</td>
                            <td>- 8.450</td>
                            <td>70.05</td>
                            <td style="background-color: red; color: white">Lose</td>
                          </tr>
                        </tbody>
                      </table>
                   </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div id="grafikPantau"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="section-header">
                            <h5>Filter Data</h5>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <label>Bulan</label>
                                </div>
                                <div class="col-6">
                                    <form action="{{ url('filter') }}" method="POST">
                                        @csrf
                                        <select class="form-control">
                                            <option value="-">Pilih Bulan</option>
                                            <option value="januari">Januari</option>
                                            <option value="februari">Februari</option>
                                            <option value="maret">Maret</option>
                                            <option value="april">April</option>
                                            <option value="mei">Mei</option>
                                            <option value="juni">Juni</option>
                                            <option value="juli">Juli</option>
                                            <option value="agustus">Agustus</option>
                                            <option value="september">September</option>
                                            <option value="oktober">Oktober</option>
                                            <option value="november">November</option>
                                            <option value="desember">Desember</option>
                                        </select>

                                </div>
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Filter" name="filter">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <script>
        Highcharts.chart('grafikPantau', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pantuan',
                align: 'left'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                crosshair: true,
                accessibility: {
                    description: 'Month'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'value'
                }
            },
            tooltip: {
                valueSuffix: ' (1000 MT)'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Target',
                    data: [406292, 260000, 107000, 68300, 27500, 14500]
                },
                {
                    name: 'Realisasi',
                    data: [51086, 136000, 5500, 141000, 107180, 77000]
                }
            ]
        });

    </script>
@endpush
