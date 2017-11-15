@extends('layout.app')

@section('content')

<h1>Login</h1>
<hr>
<center>
    <form action="">
        <div class="form-group">
            <label for="username">Admin Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your nickname">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>

@endsection