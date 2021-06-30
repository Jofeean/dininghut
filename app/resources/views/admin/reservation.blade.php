@extends("layouts.master2")

@section("title")
    Reservations @isset($day) | <b>{{ $day }}</b> @endisset
@endsection

@section("css")
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet"
          href="{{ url("admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte//plugins/fullcalendar/main.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet"
          href="{{ url("admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="card card-primary">
                        <div class="card-body">
                            <table id="reservationList" class="table table-striped table-hover">
                                <thead>
                                <td>ID</td>
                                <td>Booker</td>
                                <td>Date & Time</td>
                                <td>Attendees</td>
                                <td>Status</td>
                                <td>Actions</td>
                                </thead>
                                @isset($day)
                                    <tfoot>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Slots: <span id="slots"></span></th>
                                    <td></td>
                                    <td></td>
                                    </tfoot>
                                @endisset
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("js")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url("admin-lte/plugins/moment/moment.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/fullcalendar/main.js") }}"></script>

    <script src="{{ url("admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/jszip/jszip.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/pdfmake/pdfmake.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/pdfmake/vfs_fonts.js") }}"></script>
    <script>
        slots = 0
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                events: [
                        @foreach($dates as $date)
                    {
                        title: 'Unconfirmed: {{ $date['nan'] }}',
                        start: new Date('{{ $date['date'] }}'),
                        backgroundColor: '#468bbf',
                        borderColor: 'rgba(245,105,84,0)',
                        url: '{{ url("admin/reservation/".$date['date']) }}',
                        allDay: true
                    },
                    {
                        title: 'Confirmed: {{ $date['confirmed'] }}',
                        start: new Date('{{ $date['date'] }}'),
                        backgroundColor: '#538448',
                        borderColor: 'rgba(245,105,84,0)',
                        url: '{{ url("admin/reservation/".$date['date']) }}',
                        allDay: true
                    },
                    {
                        title: 'Denied: {{ $date['denied'] }}',
                        start: new Date('{{ $date['date'] }}'),
                        backgroundColor: '#ff8476',
                        borderColor: 'rgba(245,105,84,0)',
                        url: '{{ url("admin/reservation/".$date['date']) }}',
                        allDay: true
                    },
                        @foreach($date["reservations"] as $reservation)
                    {
                        title: '{{ $reservation->users->name }}' +
                            '({{ $reservation->attendees }})',
                        start: new Date('{{ $reservation->date }} {{ $reservation->time }}'),
                        end: new Date('{{ $reservation->date }} {{ $reservation->time }}'),
                        url: '{{ url("admin/reservation/".$reservation->date) }}',

                        @if ($reservation->status == 0)
                        backgroundColor: '#468bbf',
                        @elseif ($reservation->status == 1)
                        backgroundColor: '#538448',
                        @else
                        backgroundColor: '#ff8476',
                        @endif

                        borderColor: 'rgba(245,105,84,0)',
                        allDay: false
                    },
                    @endforeach
                    @endforeach
                ]
            });
            calendar.render();
        });

        table1 = $("#reservationList").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url()->current() }}",
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'users.name'
                },
                {
                    data: 'date',
                    render: function (data, type, row, meta) {
                        return data + " <b>" + row["time"] + "</b>"
                    }
                },
                {
                    data: 'attendees',
                    render: function (data, type, row, meta) {
                        if (row["status"] == 1) {
                            slots += data
                        }
                        return data
                    }
                },
                {
                    data: 'status',
                    render: function (data, type, row, meta) {
                        string = ""
                        if (data == 0) {
                            string = "<h5><span class='badge  badge-lg badge-secondary'>Unconfirmed</span></h5"
                        } else if (data == 1) {
                            string = "<h5><span class='badge  badge-lg badge-success'>Confirmed</span></h5"
                        } else {
                            string = "<h5><span class='badge  badge-lg badge-danger'>Denied</span></h5"
                        }
                        return string
                    }
                },
                {
                    data: "id",
                    render: function (data, type, row, meta) {
                        return '<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">' +
                            '<i class="nav-icon fas fa-cog"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">' +
                            '    <a class="dropdown-item" href="#" onclick="conf(' + data + ', 1)">Confirm</a>' +
                            '    <a class="dropdown-item" href="#" onclick="conf(' + data + ', 2)">Deny</a>' +
                            '</div>'
                    }
                },
            ],

            "responsive": true, "lengthChange": false, "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "fnDrawCallback": function (oSettings) {
                if (slots < 200) {
                    $("#slots").html('<span class="badge badge-primary">' + slots + '/200</span>')
                }
                if (slots >= 200) {
                    $("#slots").html('<span class="badge badge-danger">' + slots + '/200</span>')
                }
            }
        })

        function conf(id, status) {
            Swal.fire({
                title: status == 1 ? "Confirm the reservation" : "Deny the reservation",
                html: 'Are you sure you want to' + (status == 1 ? ' confirm ' : ' deny ') + 'this reservation?',
                icon: 'question',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/reservation/status") }}/' + id + "/" + status;
                    window.location.href = url
                }
            })
        }

        @if(session('success') == "success")
        Swal.fire({
            title: "Yey! Successfully updated.",
            html: 'Reservation status updated.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
