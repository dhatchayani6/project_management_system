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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                    <div class="container mt-5">
                        <h1>Student List</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Project Title</th>
                                        <th>Project Description</th>
                                        <th>Mentor Name</th>
                                        <th>Mentor Number</th>
                                        <th>Student Mobile</th>
                                        <th>Batch/Year</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="student-list">
                                    <!-- Data will be inserted here -->
                                </tbody>
                            </table>
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
    <!-- plugins:js -->
    @include('admin.script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Set CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/get_students",
                dataType: "json",
                success: function (response) {
                    var studentList = $('#student-list');
                    studentList.html('');
                    $.each(response, function (key, student) {
                        var row = '<tr>' +
                            '<td>' + student.regno + '</td>' +
                            '<td>' + student.name + '</td>' +
                            '<td>' + student.email + '</td>' +
                            '<td>' + student.project_title + '</td>' +
                            '<td>' + student.project_description + '</td>' +
                            '<td>' + student.mentor_name + '</td>' +
                            '<td>' + student.mentor_number + '</td>' +
                            '<td>' + student.student_mobile + '</td>' +
                            '<td>' + student.batch_year + '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-primary btn-sm mr-1 accept-btn" data-email="' + student.email + '">Accept</button>' +
                            '<button type="button" class="btn btn-danger btn-sm reject-btn" data-email="' + student.email + '">Reject</button>' +
                            '</td>' +
                            '</tr>';
                        studentList.append(row);
                    });

                    // Add event listener to accept button
                    $('.accept-btn').click(function () {
                        var email = $(this).data('email');

                        // Send data to server
                        $.ajax({
                            type: "POST",
                            url: "/accept_student",
                            data: { email: email },
                            success: function (response) {
                                // Handle success response
                                console.log("Student accepted and user stored successfully");
                                console.log("Generated Password:", response.password);
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    });

                    // Add event listener to reject button
                    $('.reject-btn').click(function () {
                        var email = $(this).data('email');

                        // Send data to server
                        $.ajax({
                            type: "POST",
                            url: "/reject_student",
                            data: { email: email },
                            success: function (response) {
                                // Handle success response
                                console.log("Student rejected successfully");
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>


    <!-- End custom js for this page -->
</body>

</html>