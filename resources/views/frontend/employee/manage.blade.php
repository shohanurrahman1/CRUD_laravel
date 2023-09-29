@include ('frontend.include.header')

    <h1 class="text-center py-5">Manage All Employee</h1>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- START: TABLE -->
                    <table class="table table-striped table-hover table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">#Sl.</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Email Address</th>
                          <th scope="col">Phone No.</th>
                          <th scope="col">Present Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($read_emp->count()==0)
                            <div class="alert alert-danger text-center" role="alert">
                              Sorry! No data found in our System.
                            </div>

                        @else

                        @php $i=1; @endphp
                        @foreach ($read_emp as $emp)
                        <tr>
                          <th scope="row">{{ $i; }}</th>
                          <td>{{$emp->name}}</td>
                          <td>{{$emp->email}}</td>
                          <td>{{$emp->phone}}</td>
                          <td>{{$emp->address}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{route('employee.edit', $emp->id)}}" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del{{$emp->id}}">Delete</a>
                            </div>
                          </td>
                            <!-- Modal Start -->
                            <div class="modal fade" id="del{{$emp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure to Delete this Employee.</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body" style="margin: 0px auto;">
                                    <form action="{{route('employee.destroy', $emp->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal End -->
                        </tr>
                        @php $i++; @endphp
                        @endforeach

                        @endif
                      </tbody>
                    </table>
                    <!-- END: TABLE -->
                </div>
            </div>
        </div>
    </section>
    
@include ('frontend.include.footer')