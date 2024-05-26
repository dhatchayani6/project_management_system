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
                    <div class="card-body">
                        <div id="alert-container"></div>
                        <h4 class="card-title">Students</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Mentor Name</th>
                                        <th>Mentor Number</th>
                                        <th>Student Mobile</th>
                                        <th>Batch/Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="student-table-body">
                                    <!-- Student records will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function () {
            // Fetch student data from the backend
            fetchStudents();
            function fetchStudents() {
                $.ajax({
                    type: "GET",
                    url: "/student/fetch-students", // Replace with your student side API endpoint
                    dataType: "json",
                    success: function (response) {
                        // Clear the tbody before appending new data
                        $('#student-table-body').html("");

                        // Loop through each student and append to tbody
                        $.each(response.students, function (key, student) {
                            $('#student-table-body').append(
                                `<tr>
                                    <td>${student.regno}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.password}</td>
                                    <td>${student.project_title}</td>
                                    <td>${student.project_description}</td>
                                    <td>${student.mentor_name}</td>
                                    <td>${student.mentor_number}</td>
                                    <td>${student.student_mobile}</td>
                                    <td>${student.batch_year}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm edit-student" data-id="${student.id}">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm delete-student" data-id="${student.id}">Delete</button>
                                    </td>
                                </tr>`
                            );
                        });
                    }
                });
            }

            // Call the fetchStudents function when the document is ready
        });
    </script>

</body>

</html>
