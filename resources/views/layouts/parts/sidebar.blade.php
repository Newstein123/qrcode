
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
      QR Code Scan Testing 
    </a>
    <a href="{{ route('productList') }}" class="list-group-item list-group-item-action
    {{ url()->current() == url('/product') ? 'active' : '' }}
    "> Products Gallery </a>
    <a href="{{ route('productIndex') }}" class="list-group-item list-group-item-action
    {{ url()->current() == url('/admin/product') ? 'active' : '' }}
    "> Admin Products Gallery  </a>
    <a href="{{ route('productCreate') }}" class="list-group-item list-group-item-action
    {{ url()->current() == url('/admin/product/create') ? 'active' : '' }}
    "> Create Product </a>
    <a href="{{ route('qrCreate') }}" class="list-group-item list-group-item-action 
    {{url()->current() == url('/qr/create') ? 'active' : '' }}
    "
    > Create QR </a> 
</div>