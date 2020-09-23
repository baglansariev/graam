@extends('layouts.default')

@section('content')

    <div class="wrapper d-flex justify-content-center" style="overflow-y: scroll">
        <div class="main-block d-flex flex-column">
            <div class="progress-block text-center">
                <span>0</span> %
            </div>
        </div>
        <div class="choice-block">
            <div class="choice-content d-flex justify-content-center align-items-center flex-column">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-center mb-5">Список компаний</h3>
                            <div class="company-list" style="width: 80%; font-size: 18px !important;">
                                <div class="thead d-flex pb-3">
                                    <div class="c-number" style="font-weight: bold;">№</div>
                                    <div class="c-name pl-5" style="font-weight: bold;">Наименование</div>
                                </div>
                                <div class="tbody">
                                    @foreach($reg_links as $reg_link)
                                        <div class="c-row d-flex mb-3 pb-3" style="border-bottom: 1px solid #ebebeb;">
                                            <div class="c-number" style="font-weight: lighter;">{{ $loop->iteration }}</div>
                                            <div class="c-name pl-5" style="font-weight: lighter;">
                                                <a href="{{ url('/reg-links/make?company_name=' . $reg_link) }}" target="_blank">{{ $reg_link }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
