{{-- <a href="{{ route('edu.front.subscribe.wepay',$subscribe) }}" --}}
{{-- class="btn btn-outline-info">微信付款</a> --}}
@mobile
<a href="{{ route('edu.front.subscribe.wepay',$subscribe) }}" class="btn btn-outline-info">
    微信付款
</a>
@endmobile

@desktop
<button type="button" class="btn btn-outline-info" data-toggle="modal"
        data-target="#exampleModal{{ $subscribe['id'] }}">
    微信付款
</button>
@enddesktop



<div class="modal fade" id="exampleModal{{ $subscribe['id'] }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <span class="d-block text-center h5 pt-3">
                    定单金额{{$subscribe['price']  }} 元
                </span>
                <img data-url="{{ route('edu.front.subscribe.wepay',$subscribe) }}">
            </div>
            <div class="d-block text-center pb-3">
                <span class="d-block">
                    请使用手机微信扫码支付
                </span>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success btn-sm"
                            onclick="reloadQr('exampleModal{{ $subscribe['id'] }}')">重新生成</button>
                    <a href="#" class="btn btn-outline-info btn-sm">完成支付</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#exampleModal{{ $subscribe['id'] }}').on('show.bs.modal', function (e) {
            const img = e.target.querySelector('img');
            img.src = img.dataset.url
        })

        function reloadQr(id){
            const modal = document.getElementById(id);
            const img = modal.querySelector('img');
            img.src = img.dataset.url+'?_'+Math.random()
        }
    </script>
@endpush
