<div class="admin-sidebar">
    <h3>Admin Panel</h3>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.tasks') }}"><i class="fas fa-tasks"></i> Manage Tasks</a></li>
        <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

    .admin-sidebar {
        width: 220px;
        float: left;
        background: #1f2937; 
        color: #f9fafb;
        height: 100vh;
        padding: 25px 20px;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
        position: fixed;
        top: 0;
        left: 0;
    }

    .admin-sidebar h3 {
        font-size: 20px;
        font-weight: 600;
        color: #fff;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 0.5px;
    }

    .admin-sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .admin-sidebar ul li {
        margin-bottom: 20px;
    }

    .admin-sidebar ul li a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #d1d5db;
        text-decoration: none;
        font-size: 15px;
        padding: 10px 12px;
        border-radius: 8px;
        transition: background 0.3s, color 0.3s;
    }

    .admin-sidebar ul li a:hover {
        background: #374151;
        color: #fff;
    }

    .admin-sidebar ul li a i {
        width: 18px;
        text-align: center;
    }

    .admin-sidebar ul li a.active {
        background: #007bff;
        color: #fff;
        font-weight: 600;
    }

    .content {
        margin-left: 240px;
        padding: 30px;
    }
</style>
