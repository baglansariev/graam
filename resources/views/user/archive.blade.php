@extends('layouts.personal')
@section('content')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />--}}
    <script type="text/javascript" src="../js/datepicker-custom.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                autoApply: true,
                "locale": {
                    "format": "DD.MM.YYYY",
                    "separator": " по ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "с",
                    "toLabel": "по",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Su",
                        "Mo",
                        "Tu",
                        "We",
                        "Th",
                        "Fr",
                        "Sa"
                    ],
                    "monthNames": [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 1
                },
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>

<h2 class="orders-heading">Все сделки с <input class="datepick" type="text" name="daterange" value="{{ date('d.m.Y') }} по {{ date('d.m.Y') }}" /></h2>
        <table class="table orders-table">
            <thead>
            <tr>
                <th class="first-col" scope="col">Номер</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Металл, проба</th>
                <th scope="col">Вес, г</th>
                <th scope="col">Через</th>
                <th scope="col">Сумма, ₽</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="first-col" scope="row">1234</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td>У менеджера</td>
            </tr>
            <tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>109 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr><tr>
                <td class="first-col" scope="row">1233</td>
                <td>22.06.2020</td>
                <td>золото 585</td>
                <td>50</td>
                <td><img src="/images/pictogram.png" alt=""> ПЮДМ</td>
                <td>10 000</td>
                <td><a href="/">Добавить документы</a></td>
            </tr>


            </tbody>
        </table>

@endsection
