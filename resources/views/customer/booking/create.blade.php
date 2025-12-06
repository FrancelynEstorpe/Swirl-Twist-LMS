@extends('layouts.nav')
@section('content')
<style>
    :root {
        --primary-color: #6366f1;
        --secondary-color: #8b5cf6;
        --accent-color: #ec4899;
    }

    .booking-container {
        padding: 1.5rem 0;
    }

    .page-title {
        font-weight: 700;
        color: #0f172a;
        position: relative;
        display: inline-block;
        font-size: 1.75rem;
        margin-bottom: 2rem;
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

    /* Service Card Styling */
    .service-item {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f1f5f9;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 1.25rem;
    }

    .service-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
        border-color: var(--primary-color);
    }

    .img-frame {
        width: 120px;
        height: 120px;
        margin: 0 auto 1rem;
        overflow: hidden;
        position: relative;
        border-radius: 50%;
        border: 3px solid #f1f5f9;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .service-item:hover .img-frame {
        border-color: var(--primary-color);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.2);
        transform: scale(1.15);
    }

    .img-frame::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, transparent 0%, rgba(99, 102, 241, 0.2) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 50%;
    }

    .service-item:hover .img-frame::after {
        opacity: 1;
    }

    .img-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .service-item:hover .img-frame img {
        transform: scale(1.2);
    }

    .service-content {
        padding: 0;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .service-item h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
        transition: color 0.3s ease;
        line-height: 1.3;
    }

    .service-item:hover h3 {
        color: var(--primary-color);
    }

    .service-item p {
        color: #64748b;
        font-size: 0.8rem;
        line-height: 1.4;
        margin-bottom: 0.75rem;
        flex-grow: 1;
        min-height: 50px;
    }

    .service-price {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.75rem;
        letter-spacing: -0.5px;
    }

    .btn-book {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .btn-book::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-book:hover::before {
        left: 100%;
    }

    .btn-book:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 20px 20px 0 0;
        border: none;
        padding: 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
    }

    .modal-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .form-control:disabled {
        background-color: #f8fafc;
        color: #64748b;
    }

    #btn-save {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    #btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
    }

    /* Pagination Styling */
    .pagination {
        margin-top: 2rem;
    }

    .pagination .page-link {
        border: 2px solid #e2e8f0;
        color: var(--primary-color);
        border-radius: 10px;
        margin: 0 0.25rem;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-color: transparent;
    }

    /* Animation */
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

    .service-item {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .col-lg-3:nth-child(1) .service-item { animation-delay: 0.1s; }
    .col-lg-3:nth-child(2) .service-item { animation-delay: 0.2s; }
    .col-lg-3:nth-child(3) .service-item { animation-delay: 0.3s; }
    .col-lg-3:nth-child(4) .service-item { animation-delay: 0.4s; }
    .col-lg-3:nth-child(5) .service-item { animation-delay: 0.5s; }
    .col-lg-3:nth-child(6) .service-item { animation-delay: 0.6s; }
    .col-lg-3:nth-child(7) .service-item { animation-delay: 0.7s; }
    .col-lg-3:nth-child(8) .service-item { animation-delay: 0.8s; }
</style>

<div class="container booking-container">
    <h1 class="page-title">Select a Service to Book</h1>
    <div class="row g-4">
        @foreach ($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <div class="img-frame">
                        <img src="{{ Vite::asset('storage/app/public/'. $service->img_url) }}" alt="{{ $service->service_name }}">
                    </div>
                    <div class="service-content">
                        <h3>{{ $service->service_name }}</h3>
                        <p>{{ $service->description }}</p>
                        <h5 class="service-price">{{ $service->price }}</h5>
                        <a class="btn btn-book book-now" 
                            data-service-id="{{ $service->id }}"
                            data-service-name="{{ $service->service_name }}" 
                            data-description="{{ $service->description }}" 
                            data-price="{{ $service->price }}">
                            Book this Service
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center my-4"> 
        {{ $services->links('pagination::bootstrap-5') }} 
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="productCrudModal">Book Your Service</h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" name="service_id" id="service_id">
                    
                    <div class="form-group">
                        <label for="service_name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="service_name" value="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="" disabled>
                    </div>                   

                    <div class="form-group">
                        <label for="booking_schedule" class="form-label">Book Schedule</label>
                        <input type="datetime-local" class="form-control" id="booking_schedule" name="booking_schedule" required min="{{ now()->subHours(7)->format('Y-m-d\TH:i') }}">
                    </div>

                    <button type="submit" class="btn" id="btn-save">Book Now!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to populate modal with selected service data -->
<script>
    $(document).ready(function() {
        $('.book-now').click(function() {
            var serviceId = $(this).data('service-id');
            var serviceName = $(this).data('service-name');
            var description = $(this).data('description');
            var price = $(this).data('price');

            // Set modal fields
            $('#service_id').val(serviceId);
            $('#service_name').val(serviceName);
            $('#description').val(description);
            $('#price').val(price);

            // Show the modal
            $('#ajax-product-modal').modal('show');
        });
    });
</script>
@endsection