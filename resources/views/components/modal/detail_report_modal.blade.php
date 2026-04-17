<div class="modal fade" id="detailReportView" tabindex="-1" arialabelledby="approvalReviewLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Detail Report</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    
                                </button>
                            </div>

                            <div class="modal-body">
                                @if($selectedTicket)
                                    <div class="mb-3">
                                        <h6><strong>No Ticket </strong></h6>
                                        <input type="text" readonly class="form-control" value="{{ $selectedTicket->no_ticket }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6><strong>User Email </strong></h6>
                                        <input type="text" readonly class="form-control" value="{{ $selectedTicket->user->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6><strong>Kategori </strong></h6>
                                        <input type="text" readonly class="form-control" value="{{ $selectedTicket->category->kategori }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6><strong>Sub Kategori </strong></h6>
                                        <input type="text" readonly class="form-control" value="{{ $selectedTicket->sub_kategori }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6><strong>Gambar </strong></h6>
                                        <img src="{{ asset('storage/' . $selectedTicket->pictures) }}" class="img-fluid rounded">
                                    </div>
                                    <div class="mb-3">
                                        <h6><strong>Keterangan </strong></h6>
                                        <textarea readonly class="form-control">{{ $selectedTicket->keterangan }}</textarea>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <span class="spinner-border spinner-border-sm"></span> Loading...
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
</div>