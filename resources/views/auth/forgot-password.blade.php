<link rel="stylesheet" href="{{asset('css/forget.css')}}">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send Password Reset Link</button>
        <a href="login">back</a>
    </form>
</body>
</html>
