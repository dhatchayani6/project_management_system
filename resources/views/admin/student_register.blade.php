<!DOCTYPE html>
<html lang="en">

<head>
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <section class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap p-4 p-md-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="w-100">
                            <h3 class="mb-4">Register</h3>
                        </div>
                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}" class="signup-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="regno">Registration Number</label>
                                    <input id="regno" type="text" class="form-control" name="regno" value="{{ old('regno') }}" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="title">Project Title</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="description">Project Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="mentor_name">Mentor Name</label>
                                    <input id="mentor_name" type="text" class="form-control" name="mentor_name" value="{{ old('mentor_name') }}" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="mentor_number">Mentor Number</label>
                                    <input id="mentor_number" type="text" class="form-control" name="mentor_number" value="{{ old('mentor_number') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="student_mobile">Student Mobile Number</label>
                                    <input id="student_mobile" type="text" class="form-control" name="student_mobile" value="{{ old('student_mobile') }}" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="batch_year">Batch/Year</label>
                                    <input id="batch_year" type="text" class="form-control" name="batch_year" value="{{ old('batch_year') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                            </div>
                        </form>
                        <!-- Switch between login and register -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
