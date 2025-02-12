@extends('index')
@section('content')
    <style>
        .fc-toolbar-chunk .fc-monthSelect-button,
        .fc-toolbar-chunk .fc-yearSelect-button {
            background: none;
            border: none;
            padding: 0;
        }

        .fc-toolbar-chunk select {
            height: calc(2.25rem + 2px);
            padding: .375rem 1.75rem .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            margin: 0 5px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23333' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 8px 10px;
        }

        .fc-toolbar-chunk select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .fc-toolbar-chunk select:hover {
            cursor: pointer;
        }
    </style>
    <div class="content-wrapper" style="min-height: 1172.8px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Calendar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.calendar') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                initialView: 'dayGridMonth',
                locale: 'vi',
                headerToolbar: {
                    left: 'monthSelect yearSelect',
                    center: 'title',
                    right: 'prev,next'
                },
                customButtons: {
                    monthSelect: {
                        text: 'Tháng',
                        click: function() {
                            var currentDate = calendar.getDate();
                            var monthSelect = document.createElement('select');
                            var months = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5',
                                'Tháng 6',
                                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                            ];

                            months.forEach(function(month, index) {
                                var option = document.createElement('option');
                                option.value = index;
                                option.text = month;
                                option.selected = index === currentDate.getMonth();
                                monthSelect.appendChild(option);
                            });

                            monthSelect.onchange = function() {
                                var date = calendar.getDate();
                                date.setMonth(this.value);
                                calendar.gotoDate(date);
                            };

                            var button = document.querySelector('.fc-monthSelect-button');
                            button.innerHTML = '';
                            button.appendChild(monthSelect);
                        }
                    },
                    yearSelect: {
                        text: 'Năm',
                        click: function() {
                            var currentDate = calendar.getDate();
                            var yearSelect = document.createElement('select');
                            var currentYear = currentDate.getFullYear();

                            for (var i = currentYear - 5; i <= currentYear + 5; i++) {
                                var option = document.createElement('option');
                                option.value = i;
                                option.text = i;
                                option.selected = i === currentYear;
                                yearSelect.appendChild(option);
                            }

                            yearSelect.onchange = function() {
                                var date = calendar.getDate();
                                date.setFullYear(this.value);
                                calendar.gotoDate(date);
                            };

                            var button = document.querySelector('.fc-yearSelect-button');
                            button.innerHTML = '';
                            button.appendChild(yearSelect);
                        }
                    }
                },
                events: function(info, successCallback, failureCallback) {
                    $.ajax({
                        url: '{{ route('calendar.events') }}',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            const events = Array.isArray(response) ? response : [];
                            successCallback(events);
                        },
                        error: function(error) {
                            console.error('Error loading events:', error);
                            failureCallback(error);
                        }
                    });
                },
                eventClick: function(info) {
                    if (info.event.url) {
                        window.location.href = info.event.url;
                        info.jsEvent.preventDefault();
                    }
                },
                dayHeaderContent: function(arg) {
                    const days = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu',
                        'Thứ bảy'
                    ];
                    return days[arg.date.getDay()];
                }
            });

            calendar.render();
            setInterval(function() {
                calendar.refetchEvents();
            }, 30000);

            document.querySelector('.fc-monthSelect-button').click();
            document.querySelector('.fc-yearSelect-button').click();
        });
    </script>
@endsection
