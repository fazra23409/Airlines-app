<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Flight Ticket Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-plane"></i> SkyAdmin</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="/admin/flights"><i class="fas fa-plane-departure"></i> Flights</a></li>

            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Transaction Management</h1>
            <div class="user-info">
                <div class="user-avatar">AD</div>
                <span>{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #e3f2fd; color: var(--primary-color);">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $total }}</h3>
                    <p>Total Transactions</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #e8f5e9; color: var(--secondary-color);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $approved }}</h3>
                    <p>Approved</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #fff8e1; color: var(--warning-color);">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $pending }}</h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-list"></i> User Transactions</h3>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Nomor Penerbangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->user->name }}</td>
                                <td>{{ $t->flight->flight_number }}</td>
                                <td>
                                    <span class="status-badge {{ $t->status == 'pending' ? 'status-pending' : 'status-approved' }}">
                                        {{ ucfirst($t->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if ($t->status == 'pending')
                                    <form action="{{ route('admin.approve', $t->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-approve">Approve</button>
                                    </form>
                                    @else
                                    <span class="approved-text"><i class="fas fa-check"></i> Approved</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
