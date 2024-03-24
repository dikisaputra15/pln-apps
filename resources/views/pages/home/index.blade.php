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
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="section-header">
                            <h5>Filter Data</h5>
                        </div>
                    <form action="{{ url('filter') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control">
                                        <option>KPI</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control">
                                        <option>RKM</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control">
                                        <option>Unit</option>
                                    </select>
                                </div>
                            </div>
                        </div><br>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control">
                                        <option>Sort</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                        <input type="date" name="tgl1" class="form-control">
                                </div>
                                <div class="col-4">
                                        <input type="date" name="tgl2" class="form-control">
                                </div>
                            </div>
                        </div><br>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <input type="submit" class="btn btn-primary" value="Filter" name="filter">
                                </div>
                            </div>
                        </div><br>
                    </form>
                    </div>
                </div>
            </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                <div class="card">
                                    <table class="table table-sm">
                                        <thead class="bg-info" style="color: white">
                                          <tr>
                                            <th></th>
                                            <th scope="col" colspan="4" style="text-align: center">Bulan Januari</th>
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
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                               <div class="card">
                                <table class="table table-sm">
                                    <thead class="bg-info" style="color: white">
                                      <tr>
                                        <th></th>
                                        <th scope="col" colspan="4" style="text-align: center">Bulan Februari</th>
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
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                <div class="card">
                                    <table class="table table-sm">
                                        <thead class="bg-info" style="color: white">
                                          <tr>
                                            <th></th>
                                            <th scope="col" colspan="4" style="text-align: center">Bulan Maret</th>
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
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                               <div class="card">
                                <table class="table table-sm">
                                    <thead class="bg-info" style="color: white">
                                      <tr>
                                        <th></th>
                                        <th scope="col" colspan="4" style="text-align: center">Bulan April</th>
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
