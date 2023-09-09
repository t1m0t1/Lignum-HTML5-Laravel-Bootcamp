<div>

    <div class="modal" id="ModalDelete-{{ $movie->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @if (session()->has('closeModal'))
                    <script>
                        $(document).ready(function() {
                            $('#ModalDelete-{{$movie->id}}').modal('hide');
                        })
                    </script>
                @endif
                <form wire:submit.prevent="delete">

                    <div class="modal-body">
                        <p>Are you sure you want to delete the movie {{ $movie->title }} ?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>
