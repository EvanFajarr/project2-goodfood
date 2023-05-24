<title>Login</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-5 border-info">
        <h2 class="text-center mb-4 text-info">Login</h2>
        @include('pesan.pesan')
        <form action="/login/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ Session::get('email') }}"  class="form-control bg-info bg-opacity-10 border border-info">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label ">Password</label>
                <input type="password" name="password" class="form-control bg-info bg-opacity-10 border border-info">
            </div>
            <p class="text-muted">belum punya akun? <a href="/login/register">register</a></p>
            <div class="d-grid">
                <button class="btn btn-outline-info" type="submit">Login</button>
            </div>
        </form>
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </div>
</div>