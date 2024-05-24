<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    @include('admin.css')
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


                    <!-- Developer Data Card -->
                    <div class="card">
                        <div class="card-header">
                            <div id="alert-container"></div>
                            <h4 class="card-title">Developers</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addDeveloperModal">
                                Add Developer
                            </button>

                            <div class="card-body">
                                <table class="table table-bordere table-striped">
                                    <thead>
                                        <th>BIOID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>DESIGNATION</th>
                                        <th>MOBILE</th>
                                        <th>ACTION</th>
                                    </thead>
                                    <tbody>
                                        

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                    <!-- Add developer -->
                    <div class="modal fade" id="addDeveloperModal" tabindex="-1" role="dialog"
                        aria-labelledby="addDeveloperModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addDeveloperModalLabel">Add Developer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul id="alert-container_err"></ul>
                                    <form method="POST" action="/add_developer" id="developerForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bioId">Bio ID</label>
                                            <input type="text" class="bioid form-control" id="bioId"
                                                placeholder="Enter Bio ID">
                                        </div>
                                        <div class="form-group">
                                            <label for="developerName">Name</label>
                                            <input type="text" class="name form-control" id="developerName"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="developerEmail">Email address</label>
                                            <input type="email" class="email form-control" id="developerEmail"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="developerDesignation">Designation</label>
                                            <input type="text" class="designation form-control"
                                                id="developerDesignation" placeholder="Enter designation">
                                        </div>
                                        <div class="form-group">
                                            <label for="developerMobile">Mobile Number</label>
                                            <input type="tel" class="mobile form-control" id="developerMobile"
                                                placeholder="Enter mobile number">
                                        </div>
                                        <!-- Here is the list to display saved developers -->
                                        <ul id="savedeveloper_list"></ul>
                                        <!-- Alert container -->

                                        <button type="submit" class="btn btn-primary add_developer">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of add developer -->
                </div>
            </div>

            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script>
        $(document).ready(function () {

            //fetch developers
            fetchdeveloper();

function fetchdeveloper(){
    $.ajax({
        type: "GET",
        url: "/fetch-developer",
        dataType: "json",
        success: function (response) {
            // Clear the tbody before appending new data
            $('tbody').html("");

            // Loop through each developer and append to tbody
            $.each(response.developer, function (key, item) {
                $('tbody').append(
                    `<tr>
                        <td>${item.bioid}</td>
                        <td>${item.name}</td>
                        <td>${item.email}</td>
                        <td>${item.designation}</td>
                        <td>${item.mobile}</td>
                        <td>
                            <button type="button" value="${item.id}" class="edit_developer btn btn-primary btn-sm" data-id="${item.id}">EDIT</button>
                        </td>
                        <td>
                            <button type="button" value="${item.id}" class="delete_developer btn btn-danger btn-sm" data-id="${item.id}">DELETE</button>
                        </td>
                    </tr>`
                );
            });
        }
    });
}



            // Ajax for add developer
            $(document).on('click', '.add_developer', function (e) {
                e.preventDefault();
                var data = {
                    'bioid': $('.bioid').val(),
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'designation': $('.designation').val(),
                    'mobile': $('.mobile').val(),
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/add_developer",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        $('#alert-container').html(""); // Clear previous alerts
                        if (response.status === 400) {
                            // Display validation errors
                            $('#alert-container_err').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_values) {
                                $('#alert-container_err').append('<li>' + err_values + '</li>');
                            });
                        } else {
                            // Display success message
                            $('#alert-container').removeClass('alert-danger').addClass('alert alert-success');
                            $('#alert-container').text(response.message);

                            // Hide the modal
                            $('#addDeveloperModal').modal('hide');

                            // Clear the form fields
                            $('#developerForm')[0].reset();

                            // Optionally, add the new developer to the list
                            $('#savedeveloper_list').append('<li>' + response.data.name + ' - ' + response.data.email + '</li>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            // end of ajx for add developer
        });
    </script>


    <!-- End custom js for this page -->
</body>

</html>