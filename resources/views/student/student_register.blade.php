<!DOCTYPE html>
<html lang="en">
<head>
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include('home.header')
    @include('home.css')
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
                        
                        <form id="studentForm" method="POST" action="{{ route('add_student') }}" class="signup-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="regno">Registration Number</label>
                                    <input id="regno" type="text" class="form-control" name="regno" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="title">Project Title</label>
                                    <input id="title" type="text" class="form-control" name="title" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="description">Project Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="mentor_name">Mentor Name</label>
                                    <input id="mentor_name" type="text" class="form-control" name="mentor_name" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="mentor_number">Mentor Number</label>
                                    <input id="mentor_number" type="text" class="form-control" name="mentor_number" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="student_mobile">Student Mobile Number</label>
                                    <input id="student_mobile" type="text" class="form-control" name="student_mobile" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="label" for="batch_year">Batch/Year</label>
                                    <input id="batch_year" type="text" class="form-control" name="batch_year" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentForm').on('submit', function(e) {
                e.preventDefault();

                var data = {
                    '_token': '{{ csrf_token() }}',
                    'regno': $('#regno').val(),
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'project_title': $('#title').val(),
                    'project_description': $('#description').val(),
                    'mentor_name': $('#mentor_name').val(),
                    'mentor_number': $('#mentor_number').val(),
                    'student_mobile': $('#student_mobile').val(),
                    'batch_year': $('#batch_year').val()
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('add_student') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 200) {
                            alert(response.message);
                            $('#studentForm')[0].reset();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred. Please try again.');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
