<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Keranjang</title>
    <style>
        body{ font-family: Arial, Helvetica, sans-serif; padding:20px; }
        .cart-item{ display:flex; gap:12px; align-items:center; padding:12px; border-bottom:1px solid #eee }
        .cart-item img{ width:60px; height:80px; object-fit:cover; border-radius:6px }
        .cart-meta{ flex:1 }
        .cart-price{ font-weight:700; color:#8b4513 }
        .actions{ margin-top:20px }
    </style>
</head>
<body>
    <h1>Keranjang Belanja</h1>
    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    @if(!empty($cart) && count($cart))
        @php $total = 0; @endphp
        @foreach($cart as $item)
            <div class="cart-item">
                @if(!empty($item['Cover']))
                    <img src="{{ asset('storage/' . $item['Cover']) }}" alt="{{ $item['Judul'] }}">
                @else
                    <div style="width:60px;height:80px;background:#eee;border-radius:6px"></div>
                @endif
                <div class="cart-meta">
                    <div>{{ $item['Judul'] }}</div>
                    <div>Qty: {{ $item['qty'] }}</div>
                </div>
                <div class="cart-price">Rp{{ number_format($item['Harga'] * $item['qty'],0,',','.') }}</div>
            </div>
            @php $total += $item['Harga'] * $item['qty']; @endphp
        @endforeach

        <h3>Total: Rp{{ number_format($total,0,',','.') }}</h3>
        <div class="actions">
            <a href="/" style="padding:10px 14px;border:1px solid #ccc;border-radius:6px;text-decoration:none;">Lanjutkan Belanja</a>
            <button style="padding:10px 14px;background:#8b4513;color:#fff;border:none;border-radius:6px;margin-left:8px;">Proses Checkout</button>
        </div>
    @else
        <p>Keranjang kosong.</p>
        <a href="/">Kembali ke beranda</a>
    @endif
</body>
</html>
