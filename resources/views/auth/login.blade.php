<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 28px;
        }

        label {
            display: block;
            text-align: left;
            color: #555;
            font-weight: 500;
            margin-top: 15px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 8px;
            font-size: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.4);
            outline: none;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.03);
        }

        p {
            margin-top: 18px;
            color: #555;
        }

        a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #d9534f;
            margin-top: 10px;
            font-size: 14px;
            background: #fdecea;
            padding: 8px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>

        @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif
    </div>
</body>
</html>
