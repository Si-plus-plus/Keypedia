<div class="row border my-2">
    <div class="col-3">
        <img src="{{ Storage::url($item->keyboard->image) }}" style="height:150px; width:150px; object-fit:cover">
    </div>
    <div class="col-9 pt-3">
      <div class="row">
          <h5 class="font-weight-bold">{{ $item->keyboard->name }}</h5>
      </div>
      <div class="row">
          <h6>Rp{{ number_format($item->keyboard->price) }}</h6>
      </div>
      <div class="row">
          @if ($item->keyboard->trashed())
              <div class="text-secondary">
                  This item is unavailable
              </div>
              <form method="post" action="{{ route('transaction.update') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="item_id" value="{{ $item->id }}">
                  <input type="hidden" name="keyboard_id" value="{{ $item->keyboard_id }}">
                  <input class="ml-3" type="hidden" id="qty" name="qty" value="0">
                  <input type="submit" class="btn-sm btn btn-outline-danger ml-3" value="Delete from cart"></input>
              </form>
          @else
              <form method="post" action="{{ route('transaction.update') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="item_id" value="{{ $item->id }}">
                  <input type="hidden" name="keyboard_id" value="{{ $item->keyboard_id }}">
                  <div class="form-group">
                      <div class="row">
                          <label class="ml-3" for="qty">Quantity</label>
                          <input class="ml-3" type="number" id="qty" min="0" name="qty" value="{{ $item->qty }}">
                          <input type="submit" class="btn-sm btn btn-outline-primary ml-3" value="Update">
                          </input>
                      </div>
                  </div>
              </form>
          @endif
        </div>
    </div>
</div>
