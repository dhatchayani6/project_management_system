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
                                            <th>Action</th>
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
                                                <td>
        <button class="btn btn-info btn-sm edit-developer" data-id="{{ $developer->id }}" data-toggle="modal" data-target="#editDeveloperModal">Edit</button>
    </td>
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

    <!-- Modal -->
    <div class="modal fade" id="developerModal" tabindex="-1" aria-labelledby="developerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="developerModalLabel">Add Developer</h5>
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
<div class="modal fade" id="editDeveloperModal" tabindex="-1" aria-labelledby="editDeveloperModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeveloperModalLabel">Edit Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDeveloperForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editDeveloperId" name="developer_id">
                    <div class="form-group">
                        <label for="editBioid">BioID:</label>
                        <input type="text" class="form-control" id="editBioid" name="bioid" required>
                    </div>
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editDesignation">Designation:</label>
                        <input type="text" class="form-control" id="editDesignation" name="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="editMobile">Mobile Number:</label>
                        <input type="tel" class="form-control" id="editMobile" name="mobile" pattern="[0-9]{10}" required>
                        <small class="form-text text-muted">Format: 10 digits</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Developer Modal -->
<div class="modal fade" id="editDeveloperModal" tabindex="-1" aria-labelledby="editDeveloperModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeveloperModalLabel">Edit Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDeveloperForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editDeveloperId" name="developer_id">
                    <div class="form-group">
                        <label for="editBioid">BioID:</label>
                        <input type="text" class="form-control" id="editBioid" name="bioid" required>
                    </div>
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editDesignation">Designation:</label>
                        <input type="text" class="form-control" id="editDesignation" name="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="editMobile">Mobile Number:</label>
                        <input type="tel" class="form-control" id="editMobile" name="mobile" pattern="[0-9]{10}" required>
                        <small class="form-text text-muted">Format: 10 digits</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script>
    $(document).ready(function () {
        $('#addDeveloperForm').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Send an AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    // Handle the success response
                    $('#developerModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page to update the developer list
                    alert('Developer added successfully.'); // Show success message
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                    var errorMessage = xhr.responseText || 'Error adding developer. Please try again.';
                    alert(errorMessage);
                }
            });
        });
    });


    

</script>


</body>

</html>
