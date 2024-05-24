<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PROJECT MANAGEMENT SYSTEM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">
                        <i class="fas fa-plus"></i>Add Developer
                    </button>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>BIOID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>DESIGNATION</th>
                                <th>MOBILE NUMBER</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($developers as $developer)
                            <tr>
                                <td>{{$developer->bioid}}</td>
                                <td>{{$developer->name}}</td>
                                <td>{{$developer->email}}</td>
                                <td>{{$developer->designation}}</td>
                                <td>{{$developer->mobile_number}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editUserModal{{$developer->id}}">
                                        Edit
                                    </button>
                                    <form action="{{ route('developers.delete', $developer->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Developer Modal -->
                            <div class="modal fade" id="editUserModal{{$developer->id}}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{$developer->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel{{$developer->id}}">Edit Developer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('developers.edit', $developer->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="bioid">Bio ID</label>
                                                    <input type="text" class="form-control" id="bioid" name="bioid" value="{{$developer->bioid}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{$developer->name}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$developer->email}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" class="form-control" id="designation" name="designation" value="{{$developer->designation}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{$developer->mobile_number}}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Developer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>
