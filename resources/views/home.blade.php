<x-home-master>
    @section('content')
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header text-center">
                                <h1>Short url</h1>
                            </div>
                            @if (session('success'))
                                <div>{{ session('success') }}</div>
                            @endif
                            <div class="card-body">
                                <form class="row g-3">
                                    @csrf
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" id="original_url" name="original_url" class="form-control"
                                                placeholder="Enter Url to Short"
                                                aria-label="Recipient's username with two button addons">
                                            <button class="btn btn-outline-primary" id="btn-success"
                                                type="submit">Submit</button>
                                            <button class="btn btn-outline-danger" type="reset">Clear</button>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </form>
                            <div id="success-message"></div>
                            <div id="success-shorturl"></div>
                            <div class="alert alert-danger" id="success-custom_code"></div>
                            <div class="alert alert-danger" id="success-original_url"></div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop

    @section('scripts')
        <script>
            $('#btn-success').click(function(e) {
                e.preventDefault();
                var original_url = $('#original_url').val();
                console.log(original_url);
                $.ajax({
                    dataType: "json",
                    type: "post",
                    url: "{{ route('shorten') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        original_url: original_url
                    },
                    success: function(response) {
                        if (response.message) {
                            $('#success-message').text(response.message);
                            $('#success-shorturl').text(response.short_code);
                            $('#success-custom_code').text(response.custom_code);
                            $('#success-original_url').text(response.original_url);
                        }
                    }
                });
            });
        </script>

    @endsection

</x-home-master>
