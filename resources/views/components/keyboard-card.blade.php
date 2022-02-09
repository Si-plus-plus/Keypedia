<div class="col-3">
    <div class="border mb-4">
        <div class="card mb-0 border-0">
            <img src="{{ Storage::url($keyboard->image) }}" style="height:200px; object-fit:cover">
            <div class="card-body">
                <div class="card-title font-weight-bold" style="font-size:14px">
                    <h5>{{ $keyboard->name }}</h5>
                </div>
                <div class="card-text">
                    Rp{{ number_format($keyboard->price) }}
                </div>
                <a href = "{{ route('keyboard.show', ['keyboard' => $keyboard->id]) }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="mt-0 p-2">
            @can('manager', $keyboard)
                <div class="row">
                    <div class="col-6">
                        <form method="post" action="{{ route('keyboard.destroy', ['keyboard' => $keyboard->id]) }}">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                    <div class="col-6">
                        <a class="btn-sm btn-primary float-right text-decoration-none" href="{{ route('keyboard.edit', ['keyboard' => $keyboard->id]) }}">
                            Update
                        </a>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>
