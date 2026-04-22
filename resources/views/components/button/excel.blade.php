<form method="POST" action="{{ route('items.transactions.export.excel') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-success">
        Excel
    </button>
</form>
