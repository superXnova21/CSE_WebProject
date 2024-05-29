<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f5f5f5;
            color: #333;
        }
        .side-panel {
            width: 250px;
            background: #34495e;
            color: #ecf0f1;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            transition: width 0.3s;
        }
        .side-panel.collapsed {
            width: 60px;
        }
        .side-panel h2 {
            font-size: 1.8em;
            margin: 0;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
            color: #fff;
        }
        .side-panel ul {
            list-style: none;
            padding: 0;
        }
        .side-panel ul li {
            margin: 20px 0;
        }
        .side-panel ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            text-align: center;
            font-size: 1.2em;
            font-weight: 500;
            transition: color 0.3s;
        }
        .side-panel ul li a:hover {
            color: #fff;
        }
        .main-content {
            flex: 1;
            padding: 40px;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .profile-details h2, .settings-details h2 {
            font-size: 2.5em;
            color: #34495e;
            margin-bottom: 30px;
        }
        .profile-details p {
            font-size: 1.4em;
            margin: 15px 0;
            color: #555;
        }
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #34495e;
            color: #ecf0f1;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 1.2em;
            transition: left 0.3s;
        }
        .side-panel.collapsed + .toggle-btn {
            left: 80px;
        }
        .settings-details form label {
            margin-bottom: 10px;
            color: #34495e;
            font-size: 1.4em;
            font-weight: 500;
            color: #333;
        }
        .settings-details form input {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1.2em;
        }
        .settings-details form button {
            padding: 15px 40px;
            background: #34495e;
            color: #ecf0f1;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.4em;
            font-weight: 500;
            transition: background 0.3s;
        }
        .settings-details form button:hover {
            background: #2c3e50;
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
