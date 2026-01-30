<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background: linear-gradient(180deg, #1a2744 0%, #0f1829 100%);">
    <div class="sb-sidenav-menu" style="overflow-y:auto; padding-bottom:110px;">
        <div class="nav">
            <!-- User Profile Section -->
            <div style="padding: 24px 16px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 8px;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 600;">
                        {{ strtoupper(substr(Auth::check() ? Auth::user()->name : 'U', 0, 1)) }}
                    </div>
                    <div style="flex: 1; overflow: hidden;">
                        <div style="color: #fff; font-weight: 600; font-size: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ Auth::check() ? Auth::user()->name : '' }}
                        </div>
                        <div style="color: #94a3b8; font-size: 16px;">
                            {{ Auth::check() ? Auth::user()->role : '' }}
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role == 'Admin')
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Summary</div>
                <a class="nav-link" href="{{url('admin/dashboard')}}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-tachometer-alt"></i></div>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" href="{{url('admin/staffRecords/index')}}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-users"></i></div>
                    <span>Staff Records</span>
                </a>
                
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Profiles</div>
                <a class="nav-link" href="{{ route('service.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-concierge-bell"></i></div>
                    <span>Services</span>
                </a>
                <a class="nav-link" href="{{ route('equipment.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-tools"></i></div>
                    <span>Equipments</span>
                </a>
                <a class="nav-link" href="{{ route('user.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-user"></i></div>
                    <span>Users</span>
                </a>
                
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Transactions</div>
                <a class="nav-link" href="{{route('confirmBooking.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check-circle"></i></div>
                    <span>Confirm Bookings</span>
                </a>
                <a class="nav-link" href="{{ url('admin/payment/completed') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check-double"></i></div>
                    <span>Completed Transactions</span>
                </a>
                <a class="nav-link" href="{{ url('admin/confirmBooking/cancelledRejected') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-times-circle"></i></div>
                    <span>Rejected/Cancelled</span>
                </a>
                <a class="nav-link" href="{{ url('admin/confirmBooking/trackBookings') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-map-marker-alt"></i></div>
                    <span>Track Bookings</span>
                </a>
                
                <div style="margin: 16px 12px 8px; display: none;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link" style="width: 100%; padding: 12px 20px; border-radius: 8px; transition: all 0.3s ease; color: #f87171; display: flex; align-items: center; text-decoration: none; background: transparent; border: 1px solid rgba(248, 113, 113, 0.3); cursor: pointer;">
                            <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-sign-out-alt"></i></div>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            @endif

            @if(Auth::user()->role == 'Staff')
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Summary</div>
                <a class="nav-link" href="{{url('staff/dashboard')}}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-tachometer-alt"></i></div>
                    <span>Dashboard</span>
                </a>
                
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Transactions</div>
                <a class="nav-link" href="{{ route('assignedBooking.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-calendar-check"></i></div>
                    <span>Assigned Bookings</span>
                </a>
                <a class="nav-link" href="{{ route('staffPaymentApproval.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-money-check-alt"></i></div>
                    <span>Payments Approval</span>
                </a>
                <a class="nav-link" href="{{ url('staff/payment/completed') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check-double"></i></div>
                    <span>Completed Transactions</span>
                </a>
                <a class="nav-link" href="{{ url('staff/assignedBooking/trackBookings') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-map-marker-alt"></i></div>
                    <span>Track Bookings</span>
                </a>
                
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Equipments</div>
                <a class="nav-link" href="{{ route('equipmentMonitoring.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-desktop"></i></div>
                    <span>Monitor Equipments</span>
                </a>
                
                <div style="margin: 16px 12px 8px; display: none;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link" style="width: 100%; padding: 12px 20px; border-radius: 8px; transition: all 0.3s ease; color: #f87171; display: flex; align-items: center; text-decoration: none; background: transparent; border: 1px solid rgba(248, 113, 113, 0.3); cursor: pointer;">
                            <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-sign-out-alt"></i></div>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            @endif

            @if(Auth::user()->role == 'Customer')
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Summary</div>
                <a class="nav-link" href="{{url('customer/dashboard')}}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-tachometer-alt"></i></div>
                    <span>Dashboard</span>
                </a>
                
                <div class="sb-sidenav-menu-heading" style="color: #94a3b8; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 16px 20px 8px; text-transform: uppercase;">Transactions</div>
                <a class="nav-link" href="{{ route('booking.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-calendar-plus"></i></div>
                    <span>Booking Page</span>
                </a>
                <a class="nav-link" href="{{ url('customer/booking/cancelledRejected') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-times-circle"></i></div>
                    <span>Rejected/Cancelled</span>
                </a>
                <a class="nav-link" href="{{ route('billing.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-file-invoice-dollar"></i></div>
                    <span>Billings/Payments</span>
                </a>
                <a class="nav-link" href="{{ route('payment.index') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check-double"></i></div>
                    <span>Completed Transactions</span>
                </a>
                <a class="nav-link" href="{{ url('customer/booking/trackBookings') }}" style="padding: 12px 20px; margin: 2px 12px; border-radius: 8px; transition: all 0.3s ease; color: #cbd5e1; display: flex; align-items: center; text-decoration: none;">
                    <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-map-marker-alt"></i></div>
                    <span>Track Bookings</span>
                </a>
                
                <div style="margin: 16px 12px 8px; display: none;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link" style="width: 100%; padding: 12px 20px; border-radius: 8px; transition: all 0.3s ease; color: #f87171; display: flex; align-items: center; text-decoration: none; background: transparent; border: 1px solid rgba(248, 113, 113, 0.3); cursor: pointer;">
                            <div class="sb-nav-link-icon" style="margin-right: 12px; width: 20px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-sign-out-alt"></i></div>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            @endif   
        </div>
    </div>
</nav>

<style>
/* Hover effects for navigation links */
.nav-link:hover {
    background: rgba(255, 255, 255, 0.08) !important;
    color: #fff !important;
    transform: translateX(4px);
}

/* Logout button hover effect */
button.nav-link:hover {
    background: rgba(248, 113, 113, 0.1) !important;
    border-color: rgba(248, 113, 113, 0.5) !important;
    transform: translateX(0) !important;
}

/* Active link styling */
.nav-link.active {
    background: linear-gradient(90deg, rgba(102, 126, 234, 0.3) 0%, rgba(118, 75, 162, 0.2) 100%) !important;
    color: #fff !important;
    border-left: 3px solid #667eea;
    margin-left: 12px;
}

/* Scrollbar styling */
.sb-sidenav-menu::-webkit-scrollbar {
    width: 6px;
}

.sb-sidenav-menu::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
}

.sb-sidenav-menu::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
}

.sb-sidenav-menu::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
}
</style>