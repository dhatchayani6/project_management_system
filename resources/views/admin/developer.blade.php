<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    @include('admin.css')

    <!-- Custom CSS -->
    <style>
        .btn-add-developer {
            background-color: transparent !important;
            border: none !important;
            color: inherit;
            padding: 0;
        }

        .table {
            background-color: transparent !important;
        }

        .table th,
        .table td {
            border-color: #dee2e6 !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Developer</h5>
                            <button type="button" class="btn btn-add-developer btn-primary" data-toggle="modal"
                                data-target="#developerModal">
                                <i class="mdi mdi-plus-circle-outline"></i> Add Developer
                            </button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>BioID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Designation</th>
                                            <th>Mobile Number</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($developers as $developer)
                                            <tr>
                                                <td>{{ $developer->bioid }}</td>
                                                <td>{{ $developer->name }}</td>
                                                <td>{{ $developer->email }}</td>
                                                <td>{{ $developer->designation }}</td>
                                                <td>{{ $developer->mobile_number }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
    </div>
    <!-- container-scroller -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->

    <!-- Add Developer Modal -->
    <div class="modal fade" id="developerModal" tabindex="-1" aria-labelledby="developerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="developerModalLabel">Add Developer</h5>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addDeveloperForm" action="{{url('/add_developer')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bioid">BioID:</label>
                            <input type="text" class="form-control" id="bioid" name="bioid" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" class="form-control" id="designation" name="designation" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number:</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}"
                                required>
                            <small class="form-text text-muted">Format: 10 digits</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Developer Modal -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            fetchDevelopers();

            function fetchDevelopers() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-developers",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.developers, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>' + item.bioid + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.designation + '</td>\
                            <td>' + item.mobile_number + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary edit-developer btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                        });
                    }
                });
            }
        });



        
        $(document).ready(function () {
            $('#addDeveloperForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function (response) {
                        $('#developerModal').modal('hide');
                        location.reload();
                        alert('Developer added successfully.');
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.responseText || 'Error adding developer. Please try again.';
                        alert(errorMessage);
                    }
                });
            });

            


        });
    </script>
</body>

</html>