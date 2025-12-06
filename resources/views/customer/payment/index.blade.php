@extends('layouts.nav')
@section('content')
<style>
    :root {
        --primary-color: #6366f1;
        --secondary-color: #8b5cf6;
    }

    .transactions-container {
        padding: 1.5rem 0;
    }

    /* Header Section */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .page-title {
        font-weight: 700;
        color: #0f172a;
        position: relative;
        display: inline-block;
        font-size: 1.75rem;
        margin: 0;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .table-card:hover {
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.1);
    }

    .table-card .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .table-card .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        animation: shimmer 3s infinite;
    }

    .table-card .card-header i {
        margin-right: 0.5rem;
    }

    .table-card .card-body {
        padding: 1.5rem;
    }

    /* Table Styling */
    #datatablesSimple {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    #datatablesSimple thead tr {
        background: #f8fafc;
    }

    #datatablesSimple thead th {
        color: #475569;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1rem;
        border-bottom: 2px solid #e2e8f0;
        transition: all 0.3s ease;
        position: relative;
    }

    #datatablesSimple thead th::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    #datatablesSimple thead th:hover {
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    #datatablesSimple thead th:hover::before {
        width: 100%;
    }

    #datatablesSimple tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f5f9;
        opacity: 0;
        animation: fadeIn 0.5s ease forwards;
    }

    #datatablesSimple tbody tr:hover {
        background: linear-gradient(90deg, #faf5ff 0%, #f5f3ff 100%);
        transform: scale(1.002);
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.1);
    }

    #datatablesSimple tbody td {
        padding: 1rem;
        color: #334155;
        vertical-align: middle;
        transition: all 0.2s ease;
    }

    #datatablesSimple tbody tr:hover td {
        color: #0f172a;
    }

    /* Status Badge Styling */
    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: capitalize;
        transition: all 0.3s ease;
    }

    .status-completed {
        background: #10b981;
        color: white;
    }

    .status-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.8;
            transform: scale(1.05);
        }
    }

    .page-title {
        animation: slideInLeft 0.8s ease;
    }

    .page-title::after {
        animation: slideInLeft 1s ease 0.3s backwards;
    }

    .table-card {
        animation: fadeInUp 0.8s ease 0.2s backwards;
    }

    #datatablesSimple tbody tr:nth-child(1) { animation-delay: 0.4s; }
    #datatablesSimple tbody tr:nth-child(2) { animation-delay: 0.45s; }
    #datatablesSimple tbody tr:nth-child(3) { animation-delay: 0.5s; }
    #datatablesSimple tbody tr:nth-child(4) { animation-delay: 0.55s; }
    #datatablesSimple tbody tr:nth-child(5) { animation-delay: 0.6s; }
    #datatablesSimple tbody tr:nth-child(6) { animation-delay: 0.65s; }
    #datatablesSimple tbody tr:nth-child(7) { animation-delay: 0.7s; }
    #datatablesSimple tbody tr:nth-child(8) { animation-delay: 0.75s; }
    #datatablesSimple tbody tr:nth-child(9) { animation-delay: 0.8s; }
    #datatablesSimple tbody tr:nth-child(10) { animation-delay: 0.85s; }
    #datatablesSimple tbody tr:nth-child(11) { animation-delay: 0.9s; }
    #datatablesSimple tbody tr:nth-child(12) { animation-delay: 0.95s; }
    #datatablesSimple tbody tr:nth-child(13) { animation-delay: 1s; }
    #datatablesSimple tbody tr:nth-child(14) { animation-delay: 1.05s; }
    #datatablesSimple tbody tr:nth-child(15) { animation-delay: 1.1s; }
</style>

<div class="container transactions-container">
    <div class="page-header">
        <h1 class="page-title">Completed Transactions</h1>
    </div>

    <div class="card table-card mb-4">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List of Completed Transactions
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Staff Assigned</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>
                        <th>Date of Billing</th>
                        <th>Date Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Staff Assigned</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>                   
                        <th>Date of Billing</th>
                        <th>Date Paid</th>     
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->billing->booking->booking_refnbr }}</td>
                        <td>{{ $payment->billing->booking->service->service_name }}</td>
                        <td>{{ $payment->billing->booking->service->price }}</td>
                        <td>{{ $payment->billing->booking->staff->name}}</td>
                        <td>{{ $payment->billing->booking->booking_date->format('Y-m-d h:i A')  }}</td>
                        <td>{{ $payment->billing->booking->booking_schedule ->format('Y-m-d h:i A') }}</td>
                        <td>{{ $payment->billing->billing_datetime->format('Y-m-d h:i A') }}</td>
                        <td>{{ $payment->payment_date->format('Y-m-d h:i A')  }}</td>
                        <td><span class="status-badge status-completed">{{ $payment->billing->booking->transaction_status }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection