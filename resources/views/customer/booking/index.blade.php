@extends('layouts.nav')
@section('content')
<style>
    :root {
        --primary-color: #181b9bff;
        --secondary-color: #8b5cf6;
        --accent-color: #ec4899;
    }

    .bookings-container {
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

    .btn-book-now {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-book-now::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-book-now:hover::before {
        left: 100%;
    }

    .btn-book-now:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
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
    }

    #datatablesSimple tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f1f5f9;
    }

    #datatablesSimple tbody tr:hover {
        background: linear-gradient(90deg, #faf5ff 0%, #f5f3ff 100%);
        transform: scale(1.002);
    }

    #datatablesSimple tbody td {
        padding: 1rem;
        color: #334155;
        vertical-align: middle;
    }

    /* Action Buttons */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(99, 102, 241, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(239, 68, 68, 0.3);
    }

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
    }

    .btn-secondary {
        background: #94a3b8;
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
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

    select.form-control {
        cursor: pointer;
    }

    /* Preview Image */
    #modal-preview {
        border-radius: 12px;
        border: 3px solid #e2e8f0;
        transition: all 0.3s ease;
        display: block;
        margin: 0 auto;
    }

    #modal-preview:not(.hidden) {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .hidden {
        display: none;
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

    /* Status Badge */
    #datatablesSimple tbody td:nth-child(5) {
        font-weight: 600;
        font-size: 0.875rem;
    }

    /* Animation */
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

    .table-card {
        animation: fadeIn 0.6s ease;
    }
</style>

<div class="container bookings-container">
    <div class="page-header">
        <h1 class="page-title">My Bookings</h1>
        <a href="{{ route('booking.create') }}" class="btn btn-book-now">
            <i class="fas fa-plus me-2"></i>Book Now!
        </a>
    </div>

    <div class="card table-card mb-4">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Listed Bookings
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Ref Nbr</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                        <th>Pickup Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Ref Nbr</th>
                        <th>Service Booked</th>
                        <th>Price</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                        <th>Pickup Schedule</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_refnbr }}</td>
                        <td>{{ $booking->service->service_name }}</td>
                        <td>{{ $booking->service->price }}</td>
                        <td>{{ $booking->booking_schedule->format('Y-m-d h:i A') }}</td>
                        <td>{{ $booking->transaction_status }}</td>
                        <td>{{ $booking->staff ? $booking->staff->name : 'N/A' }}</td>
                        <td>{{ $booking->pickup_schedule ? $booking->pickup_schedule->format('Y-m-d h:i A') : 'N/A' }}</td>
                        <td>
                            @if($booking->transaction_status === "Received/In Process")
                            <button type="#" class="btn btn-secondary" disabled>Not Applicable</button>
                            @else
                            <a href="javascript:void(0)" class="btn btn-primary edit-booking" data-id="{{ $booking->id }}">Edit</a>
                                @if ($booking->transaction_status === "Pending")
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @else
                                <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Cancel</button>
                                </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="productCrudModal">Edit Booking</h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="booking_id" id="booking_id">
                    <input type="hidden" name="_method" id="method" value="POST">
                    
                    <div class="form-group">
                        <label for="service_id" class="form-label">Service</label>
                        <select class="form-control" id="service_id" name="service_id" required="">
                            <option value="">Select a service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" data-img-url="{{ $service->img_url }}"
                                    data-description="{{ $service->description }}"
                                    data-price="{{ $service->price }}"
                                    >{{ $service->service_name }}</option>
                            @endforeach
                        </select>
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

                    <div class="form-group">
                        <label for="modal-preview" class="form-label">Service Preview</label>
                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="hidden" width="150" height="150">
                    </div>       
                                 
                    <button type="submit" class="btn" id="btn-save">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('body').on('click', '.edit-booking', function() {
            var booking_id = $(this).data('id');
            $.get("{{ route('booking.index') }}" + '/' + booking_id + '/edit', function(data) {
                $('#productCrudModal').html("Edit Booking");
                $('#method').val('PUT'); 
                $('#booking_id').val(data.id); 
                $('#service_id').val(data.service_id); 
                $('#description').val(data.service.description); 
                $('#price').val(data.service.price); 
                $('#booking_schedule').val(data.booking_schedule); 
                var img_url = data.service.img_url;
                console.log(img_url);
                if(img_url != null){
                $('#modal-preview').attr('src', '{{ Vite::asset('storage/app/public/') }}' + img_url).removeClass('hidden'); 
                }
                else{
                    $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
                }
                $('#productForm').attr('action', "{{ route('booking.update', '') }}/" + data.id); 
                $('#btn-save').text('Save Changes'); 
                $('#ajax-product-modal').modal('show'); 
            });
        });

        $('#productForm').on('submit', function(e) {
            e.preventDefault(); 
            let formData = new FormData(this); 

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: (data) => {
                    $('#ajax-product-modal').modal('hide');
                    location.reload(); 
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#service_id').on('change', function() {
            var img_url = $(this).find(':selected').data('img-url');
            var description = $(this).find(':selected').data('description');
            var price = $(this).find(':selected').data('price');
            $('#description').val(description); 
            $('#price').val(price); 

            if (img_url != null) {
                $('#modal-preview').attr('src', '{{ Vite::asset('storage/app/public/') }}' + img_url).removeClass('hidden');
            } else {
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            }
        });
    });
</script>

@endsection