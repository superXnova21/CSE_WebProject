<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .side-panel {
            width: 250px;
            background: #34495e;
            color: #ecf0f1;
            padding: 15px;
            transition: width 0.3s;
        }
        .side-panel.collapsed {
            width: 60px;
        }
        .side-panel h2 {
            font-size: 1.2em;
            margin: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        .side-panel ul {
            list-style: none;
            padding: 0;
        }
        .side-panel ul li {
            margin: 15px 0;
        }
        .side-panel ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .main-content {
            flex: 1;
            padding: 15px;
        }
        .profile-details, .billing-details, .settings-details {
            margin-bottom: 20px;
        }
        .billing-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .billing-details th, .billing-details td {
            padding: 10px;
            border: 1px solid #bdc3c7;
            text-align: left;
        }
        .toggle-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #34495e;
            color: #ecf0f1;
            border: none;
            padding: 10px;
            cursor: pointer;
            transition: left 0.3s;
        }
        .side-panel.collapsed + .toggle-btn {
            left: 70px;
        }
        .settings-details form {
            display: flex;
            flex-direction: column;
        }
        .settings-details form label {
            margin-bottom: 5px;
            color: #34495e;
        }
        .settings-details form input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }
        .settings-details form button {
            padding: 10px;
            background: #34495e;
            color: #ecf0f1;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="side-panel" id="sidePanel">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="#" onclick="showSection('profile')">Profile</a></li>
            <li><a href="{{ route('home.user') }}">Billing</a></li>
            <li><a href="#" onclick="showSection('settings')">Settings</a></li>
            <li><a href="{{route('auth.logout-action')}}">Logout</a></li>
        </ul>
    </div>
    <button class="toggle-btn" id="toggleBtn">☰</button>
    <div class="main-content">
        <div id="profile" class="content-section">
            <div class="profile-details">
                <h2>User Profile</h2>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</p>
            </div>
        </div>
        <div id="settings" class="content-section" style="display:none;">
            <h2>Settings</h2>
            <div class="settings-details">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    <button type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleBtn').addEventListener('click', function() {
            var sidePanel = document.getElementById('sidePanel');
            sidePanel.classList.toggle('collapsed');
        });

        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>