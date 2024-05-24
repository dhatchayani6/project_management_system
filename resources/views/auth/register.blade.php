<!DOCTYPE html>
<html lang="en">

<head>
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{ asset('images/loginimage.png') }}');"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="w-100">
                            <h3 class="mb-4">Register</h3>
                        </div>
                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}" class="signup-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" :value="old('name')"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="register-email">Email Address</label>
                                <input id="register-email" type="email" class="form-control" name="email"
                                    :value="old('email')" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="register-password">Password</label>
                                <input id="register-password" type="password" class="form-control" name="password"
                                    required autocomplete="new-password">
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Register</button>
                            </div>
                        </form>
                        <!-- Switch between login and register -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387"
        integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ=="
        data-cf-beacon='{"rayId":"8861eedae89f9be5","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
    <script>
        // JavaScript to toggle between login and register forms
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-form').forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelectorAll('form').forEach(function (form) {
                        form.classList.toggle('hidden');
                    });
                });
            });
        });
    </script>
</body>

</html>