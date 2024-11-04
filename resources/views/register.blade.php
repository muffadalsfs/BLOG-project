<link rel="stylesheet" href="{{asset('css/register.css')}}">
<h1>    REGISTER PAGE</h1>
<div>
    <form action="register" method="post">
@csrf
   
    <label for="name">NAME</label>
    <input type="text" name="name" placeholder="ENTER YOUR NAME" required>
    <label for="EMAIL">EMAIL</label>
    <input type="email" name="email" placeholder="ENTER YOUR EMAIL" required>
    <Label>PASSWORD</Label>
    <input type="password" name="password" placeholder="ENTER YOUR PASSWORD" required>
    <Label>CONFIRM PASSWORD</Label>
    <input type="password" name="password" placeholder="ENTER YOUR CONFIRM PASSWORD" required >
    <button>register</button>
    <a href="login">back</a>
</form> 
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>
