<link rel="stylesheet" href="{{asset('css/login.css')}}">
<H1><a href="/">Home</a></H1>
<h1>LOGIN PAGE</h1>
<form action="login" method="post" >
    @csrf 
    <label for="email">EMAIL</label>
    <input type="email" name="email" placeholder="ENTER YOUR EMAIL" required>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <label for="Password">Password</label>
    <input type="password" name="password" PLACEHOLDER="ENTER YOUR PASSWORD" required>
    @error('password')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <button>login</button>
    <a href="register">don't know account </a>
    <a href="forgot-password">forget password</a>
</form>