@include ('frontend.include.header')

    <h1 class="text-center py-5">Update Employee Info</h1>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <!-- START: FORM -->
                    <form action="{{route('employee.update', $edit_emp->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Full Name</label>
                            <input type="text" name="fname" class="form-control" required autocomplete="off" value="{{$edit_emp->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control" required autocomplete="off" value="{{$edit_emp->email}}">
                        </div>

                        <div class="mb-3">
                            <label for="">Phone No.</label>
                            <input type="tel" name="phone" class="form-control" required autocomplete="off" value="{{$edit_emp->phone}}">
                        </div>

                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" required autocomplete="off" value="{{$edit_emp->address}}">
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <input type="submit" name="add" class="btn btn-success" value="Update Emloyee Info">
                            </div>
                        </div>
                    </form>
                    <!-- END: FORM -->
                </div>
            </div>
        </div>
    </section>
    
@include ('frontend.include.footer')