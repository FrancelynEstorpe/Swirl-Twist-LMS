@extends('layouts.nav')
@section('content')
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --accent-color: #ec4899;
        }

        /* Modern Card Design */
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
            border-color: var(--primary-color);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .stat-card:hover::before {
            transform: scaleX(1);
        }
        
        /* Icon Container */
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            transition: all 0.4s ease;
            position: relative;
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .stat-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 16px;
            background: inherit;
            opacity: 0.2;
            transform: scale(1.4);
            transition: all 0.4s ease;
        }
        
        .stat-card:hover .stat-icon::after {
            transform: scale(1.8);
            opacity: 0;
        }
        
        .icon-pending {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        }
        
        .icon-process {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        }
        
        .icon-completed {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        }
        
        .icon-rejected {
            background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover .stat-number {
            transform: scale(1.05);
        }
        
        .stat-label {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        /* Chart Cards */
        .chart-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .chart-card:hover {
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.12);
            transform: translateY(-4px);
        }
        
        .chart-card .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: #1e293b;
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .chart-card .card-header i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
        
        /* Table Card */
        .table-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .table-card .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
        }
        
        /* Table Styling */
        #datatablesSimple {
            border-collapse: separate;
            border-spacing: 0;
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
        }
        
        #datatablesSimple tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f1f5f9;
        }
        
        #datatablesSimple tbody tr:hover {
            background: linear-gradient(90deg, #faf5ff 0%, #f5f3ff 100%);
            transform: scale(1.005);
        }
        
        #datatablesSimple tbody td {
            padding: 1rem;
            color: #334155;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background: transparent;
            border-radius: 12px;
            padding: 0.75rem 0;
        }
        
        .breadcrumb-item.active {
            color: #64748b;
        }
        
        /* Page Title */
        h1 {
            font-weight: 700;
            color: #0f172a;
            position: relative;
            display: inline-block;
            font-size: 2rem;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        /* Fade In Animation */
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
        
        .animate-card {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }
        
        .animate-card:nth-child(1) { animation-delay: 0.1s; }
        .animate-card:nth-child(2) { animation-delay: 0.2s; }
        .animate-card:nth-child(3) { animation-delay: 0.3s; }
        .animate-card:nth-child(4) { animation-delay: 0.4s; }
        
        /* Floating Animation for Icons */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .stat-card:hover .stat-icon svg,
        .stat-card:hover .stat-icon i {
            animation: float 2s ease-in-out infinite;
        }
        
        /* SVG Icons */
        .stat-icon svg {
            width: 32px;
            height: 32px;
        }
        
        .card-body {
            padding: 1.5rem;
        }
    </style>

    <h1 class="mt-4 mb-2">Dashboard</h1>
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6 animate-card">
            <div class="stat-card">
                <div class="stat-icon icon-pending">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <div class="stat-number">{{$pendingBookings}}</div>
                <div class="stat-label">Pending/Assigned Bookings</div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 animate-card">
            <div class="stat-card">
                <div class="stat-icon icon-process">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </div>
                <div class="stat-number">{{$inProcessBookings}}</div>
                <div class="stat-label">On Process Bookings</div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 animate-card">
            <div class="stat-card">
                <div class="stat-icon icon-completed">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <path d="M22 4L12 14.01l-3-3"/>
                    </svg>
                </div>
                <div class="stat-number">{{$completedBookings}}</div>
                <div class="stat-label">Completed Transactions</div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 animate-card">
            <div class="stat-card">
                <div class="stat-icon icon-rejected">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="15" y1="9" x2="9" y2="15"/>
                        <line x1="9" y1="9" x2="15" y2="15"/>
                    </svg>
                </div>
                <div class="stat-number">{{$unsuccessfulBookings}}</div>
                <div class="stat-label">Rejected/Cancelled Bookings</div>
            </div>
        </div>
    </div>
    

    
    <div class="card table-card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-2"></i>
            All Bookings
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Amount</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>
                        <th>Staff Assigned</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Amount</th>
                        <th>Booking Created Date</th>
                        <th>Scheduled Date</th>
                        <th>Staff Assigned</th>
                        <th>Status</th>
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
                        <td>{{ $booking->staff ? $booking->staff->name : 'N/A' }}</td>
                        <td>{{ $booking->transaction_status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var dailyLabels = @json($dailyLabels);
        var dailyRevenues = @json($dailyRevenues);
        var monthlyLabels = @json($monthlyLabels);
        var monthlyRevenues = @json($monthlyRevenues);
    </script>
    
@endsection