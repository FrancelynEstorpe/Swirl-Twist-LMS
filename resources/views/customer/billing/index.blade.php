@extends('layouts.nav')
@section('content')
<style>
    :root { --primary-color:#1e40af; --secondary-color:#3b82f6; }

    .transactions-container{ padding:1.5rem 0; }

    .page-header{ display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem; }
    .page-title{ font-weight:700; color:#0f172a; position:relative; display:inline-block; font-size:1.75rem; margin:0; animation:slideInLeft .8s ease; }
    .page-title::after{ content:''; position:absolute; bottom:-8px; left:0; width:90px; height:4px; background:linear-gradient(90deg,var(--primary-color),var(--secondary-color)); border-radius:2px; animation:slideInLeft 1s ease .25s backwards; }

    .table-card{ background:#fff; border-radius:20px; border:1px solid #f1f5f9; overflow:hidden; box-shadow:0 1px 3px rgba(0, 0, 0, 0.05); transition:all .3s ease; animation:fadeInUp .7s ease .15s backwards; }
    .table-card:hover{ box-shadow:0 10px 24px rgba(30, 64, 175, 0.15); }
    .table-card .card-header{ background:linear-gradient(135deg,var(--primary-color),var(--secondary-color)); color:#fff; border:none; padding:1.25rem 1.5rem; font-weight:600; position:relative; overflow:hidden; }
    .table-card .card-header::before{ content:''; position:absolute; inset:0; left:-120%; background:linear-gradient(90deg,transparent,rgba(255,255,255,.35),transparent); animation:shimmer 3s infinite; }
    .table-card .card-header i{ margin-right:.5rem; }
    .table-card .card-body{ padding:1.5rem; }

    #datatablesSimple{ border-collapse:separate; border-spacing:0; width:100%; }
    #datatablesSimple thead tr{ background:#eef2ff; }
    #datatablesSimple thead th{ color:#1e293b; font-weight:700; font-size:.85rem; text-transform:uppercase; letter-spacing:.5px; padding:1rem; border-bottom:2px solid #dbeafe; position:relative; transition:all .25s ease; }
    #datatablesSimple thead th::before{ content:''; position:absolute; bottom:0; left:0; width:0; height:2px; background:var(--primary-color); transition:width .25s ease; }
    #datatablesSimple thead th:hover{ color:var(--primary-color); transform:translateY(-2px); }
    #datatablesSimple thead th:hover::before{ width:100%; }

    #datatablesSimple tbody tr{ border-bottom:1px solid #f1f5f9; opacity:0; animation:fadeIn .45s ease forwards; transition:background .25s ease, transform .2s ease, box-shadow .2s ease; }
    #datatablesSimple tbody tr:hover{ background:linear-gradient(90deg,#eff6ff 0%,#dbeafe 100%); transform:scale(1.002); box-shadow:0 2px 8px rgba(30, 64, 175, 0.12); }
    #datatablesSimple tbody td{ padding:1rem; color:#334155; vertical-align:middle; }
    #datatablesSimple tbody tr:nth-child(1){animation-delay:.35s} #datatablesSimple tbody tr:nth-child(2){animation-delay:.4s} #datatablesSimple tbody tr:nth-child(3){animation-delay:.45s} #datatablesSimple tbody tr:nth-child(4){animation-delay:.5s} #datatablesSimple tbody tr:nth-child(5){animation-delay:.55s}

    .status-badge{ display:inline-block; padding:.4rem .75rem; border-radius:9999px; font-weight:600; font-size:.8rem; transition:all .25s ease; }
    .status-ready{ background:#dbeafe; color:#1e40af; }
    .status-approval{ background:#bfdbfe; color:#1e3a8a; }
    .status-badge:hover{ transform:translateY(-2px); box-shadow:0 6px 14px rgba(30, 64, 175, 0.25); }

    @keyframes shimmer{0%{transform:translateX(0)}100%{transform:translateX(120%)} }
    @keyframes fadeIn{ from{opacity:0; transform:translateY(18px)} to{opacity:1; transform:translateY(0)} }
    @keyframes slideInLeft{ from{opacity:0; transform:translateX(-28px)} to{opacity:1; transform:translateX(0)} }
    @keyframes fadeInUp{ from{opacity:0; transform:translateY(24px)} to{opacity:1; transform:translateY(0)} }
</style>

<div class="container transactions-container">
    <div class="page-header">
        <h1 class="page-title">Billings</h1>
    </div>
    <div class="card table-card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List of Billings
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Amount Payable</th>
                        <th>Billing Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking Ref #</th>
                        <th>Service Booked</th>
                        <th>Amount Payable</th>
                        <th>Billing Date</th>
                        <th>Status</th>
                        <th>Staff Assigned</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($billings as $billing)
                    <tr>
                        <td>{{ $billing->booking->booking_refnbr }}</td>
                        <td>{{ $billing->booking->service->service_name }}</td>
                        <td>{{ $billing->booking->service->price }}</td>
                        <td>{{ optional($billing->billing_datetime)->format('Y-m-d h:i A') }}</td>
                        <td>
                            @php $st = $billing->booking->transaction_status; @endphp
                            <span class="status-badge {{ $st === 'For Payment Approval' ? 'status-approval' : 'status-ready' }}">{{ $st }}</span>
                        </td>
                        <td>{{ $billing->booking->staff->name}}</td>                        
                        <td>
                            @if($billing->booking->transaction_status === "Ready For Pickup/Payment")
                            <a href="javascript:void(0)" class="btn btn-primary pay-billing" data-id="{{ $billing->id }}">Pickup/Pay</a>                            
                            @else
                            <button type="#" class="btn btn-secondary" disabled>Not Applicable</button>                            
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
                <h4 class="modal-title" id="productCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf                    
                    <input type="hidden" name="billing_id" id="billing_id">
                    <input type="hidden" name="_method" id="method" value="POST">

                    <div class="form-group">
                        <label for="payment_method" class="col-sm-4 control-label">Payment Method</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="payment_method" name="payment_method" required="">
                                <option value="">Select Payment Method</option>
                                <option value="Cash">Spot Cash</option>
                                <option value="GCash">Gcash Payment</option>
                            </select>
                        </div>
                    </div>                  
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Upload Receipt Image (Proof of Payment)</label>
                        <div class="col-sm-12">
                            <input id="image_url" type="file" name="image_url" accept="image/*" onchange="readURL(this);" >
                            <input type="hidden" name="hidden_image" id="hidden_image" >
                        </div>
                    </div>
                    <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100" style="margin-top: 10px;">                    
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" style="margin-top: 10px;"></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Show the modal for adding new reward
        // $('#create-new-booking').click(function() {
        //     $('#productForm').trigger("reset"); 
        //     $('#ajax-product-modal').modal('show'); 
        //     $('#productCrudModal').html("Add Booking");
        //     $('#btn-save').text('Submit Booking'); 
        //     $('#method').val('POST'); 
        //     $('#productForm').attr('action', "{{ route('booking.store') }}"); 
        // });

        $('body').on('click', '.pay-billing', function() {
            var billing_id = $(this).data('id');
            $.get("{{ route('billing.index') }}" + '/' + billing_id + '/edit', function(data) {
                $('#productCrudModal').html("Edit Billing");
                $('#method').val('PUT'); 
                $('#billing_id').val(data.id); 
                $('#payment_method').val(data.payment_method); 
                $('#image_url').val(data.image_url); 
                $('#productForm').attr('action', "{{ route('billing.update', '') }}/" + data.id); 
                $('#btn-save').text('Complete Payment'); 
                $('#ajax-product-modal').modal('show'); 
            });
        });

        // Handle form submission
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#modal-preview').attr('src', e.target.result).removeClass('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#image_url').change(function() {
            readURL(this); 
        });
    });
</script>

@endsection
