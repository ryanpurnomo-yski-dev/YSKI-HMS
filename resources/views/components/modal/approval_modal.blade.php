<div class="modal fade" id="approvalReview" tabindex="-1" arialabelledby="approvalReviewLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Review Approval</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                                </button>
                            </div>

                            <div class="modal-body">
                                @if($selectedTicket)
                                    <div class="mb-3">
                                        <strong>Status: </strong>
                                        <select>
                                            <option value="{{ $selectedTicket->status }}">{{ $selectedTicket->status }}</option>
                                            @foreach($allStatuses as $status)
                                                @if($status !== $selectedTicket->status)
                                                    <option value="{{ $status }}">{{ $status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        <strong>Action: </strong> 
                                        <select>
                                            <option value="$selectedTicket->action">{{ $selectedTicket->action }}</option>
                                            @foreach($allActions as $action)
                                                @if($action !== $selectedTicket->action)
                                                    <option>{{ $selectedTicket->action }}</option>
                                                @endif
                                            @endforeach
                                        </select>   
                                    </div>
                                @else
                                    <div class="text-center">
                                        <span class="spinner-border spinner-border-sm"></span> Loading...
                                    </div>
                                @endif

                                <h5>Apakah Anda Yakin Ingin Menyetujui ini</h5>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success" wire:click="approveTicket">Ya, Setujui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>