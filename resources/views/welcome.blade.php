<x-home-master>
    @section('title','ShortUrlFree')
    @section('content')
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h1>Short url</h1>
                            </div>
                            
                            <div class="card-body">
                                <form method="POST" action="{{ route('shorten') }}">
                                    @csrf
                                    <div class="col-mb-2">
                                        <div class="input-group">
                                            <input name="origin_url" type="text" class="form-control"
                                                placeholder="Enter Url to Short"
                                                aria-label="Recipient's username with two button addons">
                                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                                            <button class="btn btn-outline-danger" type="reset">Clear</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="my-3 p-3 bg-white rounded box-shadow" style="">
                                    @foreach ($shortLink as $item)                                       
                                    <div class="media text-muted pt-3" style="">                                        
                                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100"
                                                style="">
                                                <strong class="text-gray-dark" style="">OriginalUrl</strong>
                                                <a href="{{$item->original_url}}" target="_blank">GO</a>
                                            </div>
                                            <span class="d-block"><a href="{{$item->original_url}}">{{$item->original_url}}</a></span>
                                        </div>
                                    </div>                                  
                                    <div class="media text-muted pt-3" style="">                                        
                                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100"
                                                style="">
                                                <strong class="text-gray-dark" style="">ShortUrl</strong>
                                                <a href="{{route ('redirect',$item->short_code)}}" target="_blank">GO</a>
                                            </div>
                                            <span class="d-block"><a href="{{route ('redirect',$item->short_code)}}">{{route ('redirect',$item->short_code)}}</a></span>
                                        </div>
                                    </div>                                  
                                    <div class="media text-muted pt-3" style="">                                        
                                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100"
                                                style="">
                                                <strong class="text-gray-dark" style="">CustomUrl</strong>
                                                <a href="{{route ('redirect',$item->custom_code)}}" target="_blank">GO</a>
                                                
                                            </div>
                                            <span class="d-block"><a href="{{route ('redirect',$item->custom_code)}}">{{route ('redirect',$item->custom_code)}}</a></span>
                                            
                                        </div>
                                    </div> 
                                    @break
                                    @endforeach                                 
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'เกิดข้อผิดพลาด! โปรดกรุณาป้อนในรูปแบบของ URl',
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'WoW',
                    text: 'คุณได้ทำการ ShortUrl สำเร็จ',
                });
            </script>
        @endif
    @endsection
</x-home-master>
