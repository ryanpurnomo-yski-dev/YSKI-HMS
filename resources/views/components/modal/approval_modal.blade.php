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
                                        <select class="form-select" name="status" wire:model="selectedStatus">
                                            <option value="{{ $selectedTicket->status }}">{{ $selectedTicket->status }}</option>
                                            @foreach($allStatuses as $status)
                                                @if($status !== $selectedTicket->status)
                                                    <option value="{{ $status }}">{{ $status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <strong>Action </strong> 
                                        <select class="form-select" name="action" wire:model="selectedAction">
                                            <option value="{{ $selectedTicket->action }}">{{ $selectedTicket->action }}</option>
                                            @foreach($allActions as $action)
                                                @if($action !== $selectedTicket->action)
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