<form onsubmit="return confirm('Do you want to delete {{ $comic->title }}?')" class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" class="btn btn-danger" title="dete">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>