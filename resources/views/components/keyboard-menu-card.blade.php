<div class="col-4">
    <div class="border">
        <div class="card mb-0 border-0">
            <img src="{{ Storage::url($category->image) }}" style="height:200px; object-fit:cover">
            <div class="card-body">
                <div class="card-title font-weight-bold" style="font-size:14px">
                    <h5>{{ $category->name }}</h5>
                </div>
                <a href = "{{ route('category.show', ['category' => $category->id]) }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="mt-0 p-2">
            @can('manager', $category)
                <div class="row">
                    <div class="col-6">
                        <form method="post" action="{{ route('category.destroy', ['category' => $category->id]) }}">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                    <div class="col-6">
                        <a class="btn-sm btn-primary float-right text-decoration-none" href="{{ route('category.edit', ['category' => $category->id]) }}">
                            Update
                        </a>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>
