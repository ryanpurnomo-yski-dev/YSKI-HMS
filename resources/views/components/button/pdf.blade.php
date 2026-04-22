<form method="POST" action="{{ route('items.transactions.export.pdf') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">
        PDF
    </button>
</form>
