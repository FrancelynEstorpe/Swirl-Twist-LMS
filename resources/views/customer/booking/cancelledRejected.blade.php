@extends('layouts.nav')
@section('content')
<style>
    :root { --primary-color:#065f46; --secondary-color:#059669; }
    .transactions-container{padding:1.5rem 0}
    .page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem}
    .page-title{font-weight:700;color:#0f172a;position:relative;display:inline-block;font-size:1.75rem;margin:0;animation:slideInLeft .8s ease}
    .page-title::after{content:'';position:absolute;bottom:-8px;left:0;width:90px;height:4px;background:linear-gradient(90deg,var(--primary-color),var(--secondary-color));border-radius:2px;animation:slideInLeft 1s ease .25s backwards}
    .table-card{background:#fff;border-radius:20px;border:1px solid #e2f3ee;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.05);transition:all .3s ease;animation:fadeInUp .7s ease .15s backwards}
    .table-card:hover{box-shadow:0 10px 24px rgba(6,95,70,.18)}
    .table-card .card-header{background:linear-gradient(135deg,var(--primary-color),var(--secondary-color));color:#fff;border:none;padding:1.25rem 1.5rem;font-weight:600;position:relative;overflow:hidden}
    .table-card .card-header::before{content:'';position:absolute;inset:0;left:-120%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.35),transparent);animation:shimmer 3s infinite}
    .table-card .card-header i{margin-right:.5rem}
    .table-card .card-body{padding:1.5rem}
    #datatablesSimple{border-collapse:separate;border-spacing:0;width:100%}
    #datatablesSimple thead tr{background:#ecfdf5}
    #datatablesSimple thead th{color:#064e3b;font-weight:700;font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;padding:1rem;border-bottom:2px solid #a7f3d0;position:relative;transition:all .25s ease}
    #datatablesSimple thead th::before{content:'';position:absolute;bottom:0;left:0;width:0;height:2px;background:#047857;transition:width .25s ease}
    #datatablesSimple thead th:hover{color:#047857;transform:translateY(-2px)}
    #datatablesSimple thead th:hover::before{width:100%}
    #datatablesSimple tbody tr{border-bottom:1px solid #e2f3ee;opacity:0;animation:fadeIn .45s ease forwards;transition:background .25s ease, transform .2s ease, box-shadow .2s ease}
    #datatablesSimple tbody tr:hover{background:linear-gradient(90deg,#ecfdf5 0%,#d1fae5 100%);transform:scale(1.002);box-shadow:0 2px 8px rgba(4,120,87,.12)}
    #datatablesSimple tbody td{padding:1rem;color:#334155;vertical-align:middle}
    #datatablesSimple tbody tr:nth-child(1){animation-delay:.35s}#datatablesSimple tbody tr:nth-child(2){animation-delay:.4s}#datatablesSimple tbody tr:nth-child(3){animation-delay:.45s}#datatablesSimple tbody tr:nth-child(4){animation-delay:.5s}#datatablesSimple tbody tr:nth-child(5){animation-delay:.55s}
    @keyframes shimmer{0%{transform:translateX(0)}100%{transform:translateX(120%)}}
    @keyframes fadeIn{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
    @keyframes slideInLeft{from{opacity:0;transform:translateX(-28px)}to{opacity:1;transform:translateX(0)}}
    @keyframes fadeInUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
</style>

<div class="container transactions-container">
    <div class="page-header">
        <h1 class="page-title">Rejected or Cancelled Bookings</h1>
    </div>
    <div class="card table-card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List of Rejected/Cancelled Bookings
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_refnbr }}</td>
                        <td>{{ $booking->service->service_name }}</td>
                        <td>{{ $booking->service->price }}</td>
                        <td>{{ $booking->booking_date->format('Y-m-d h:i A') }}</td>
                        <td>{{ $booking->booking_schedule->format('Y-m-d h:i A') }}</td>
                        <td>{{ $booking->transaction_status }}</td>
                        <td>{{ $booking->staff ? $booking->staff->name : 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
