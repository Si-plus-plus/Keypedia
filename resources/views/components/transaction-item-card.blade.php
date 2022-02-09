<div class="row border mb-2">
    <div class="col-2">
        <img src="{{ Storage::url($item->keyboard->image) }}" style="height:150px; width:150px; object-fit:cover">
    </div>
    <div class="col-4 py-4">
        <h5 class="font-weight-bold">{{ $item->keyboard->name }}</h5>
    </div>
    <div class="col-2 py-4">
        Rp{{ number_format($item->keyboard->price) }}
    </div>
    <div class="col-2 py-4">
        {{ $item->qty }} item(s)
    </div>
    <div class="col-2 py-4 text-right">
        Subtotal {{ number_format($item->qty * $item->keyboard->price) }}
    </div>
</div>
