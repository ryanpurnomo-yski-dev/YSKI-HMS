<div class="modal fade" id="approvalReview" tabindex="-1" arialabelledby="approvalReviewLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Review Approval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                    </button>
            </div>

            <div class="modal-body">
                <form>
                    @if($selectedTicket)
                        <div class="mb-3">
                            <h6><strong>Status </strong></h6>
                            @php
                                $statusIndex = array_search($selectedTicket->status, $allStatuses);
                            @endphp
                                <select class="form-select" name="status" wire:model="selectedStatus">
                                    <option value="{{ $selectedTicket->status }}">{{ $selectedTicket->status }}</option>
                                        @foreach($allStatuses as $status)
                                            @php $idx = array_search($status, $allStatuses); @endphp
                                            <!-- if($status !== $selectedTicket->status) -->
                                            @if($idx > $statusIndex)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            <strong>Action </strong> 
                            @php
                                $actionIndex = array_search($selectedTicket->action, $allActions);
                            @endphp
                                <select class="form-select" name="action" wire:model="selectedAction">
                                    <option value="{{ $selectedTicket->action }}">{{ $selectedTicket->action }}</option>
                                        @foreach($allActions as $action)
                                        @php $idxA = array_search($action, $allActions); @endphp
                                            <!-- if($action !== $selectedTicket->action) -->
                                            @if($idxA > $actionIndex)
                                                <option value="{{ $action }}">{{ $action }}</option>
                                            @endif
                                        @endforeach
                                </select>  
                                <strong>Keterangan </strong>
                                    <textarea class="form-control" name="note" wire:model="selectedNote"></textarea> 
                        </div>
                    @else
                        <div class="text-center">
                            <span class="spinner-border spinner-border-sm"></span> Loading...
                        </div>
                    @endif

                    <h5 class="text-center">Apakah Anda Yakin Ingin Menyetujui ini</h5>
                        <div class="d-flex gap-3 justify-content-center align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success" wire:click="approveTicket">Ya, Setujui</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>