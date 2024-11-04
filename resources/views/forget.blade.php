<link rel="stylesheet" href="{{ asset('css/forget.css') }}">
<h1>forget password</h1>
<form method="POST" action="forget">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Send Password Reset Link</button>
    <a href="login">back</a>
</form>