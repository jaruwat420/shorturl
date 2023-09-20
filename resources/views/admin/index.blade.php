<x-admin-master>
    @section('title', 'Dashboard')
    @section('content')
        <div class="h3 mb-4 text-gray-800">
            <div class="contrainer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>OriginalUrl</th>
                                            <th>ShortCode</th>
                                            <th>CustomCode</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                
                                    <tbody>
                                        @foreach ($query as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->original_url}}</td>
                                            <td>{{$item->short_code}}</td>
                                            <td>{{$item->custom_code}}</td>                                            
                                            <td><a href="{{route('delete',$item->short_code)}}" class="btn btn-danger">Delete</a></td>                                            
                                        </tr>
                                        @endforeach                                                                                                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
            <script src="{{asset ('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset ('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset ('assets/js/demo/datatables-demo.js')}}"></script>
            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'WoW',
                    text: 'คุณได้ทำการลบสำเร็จ',
                });
            </script>
        @endif
        @stop

</x-admin-master>
