<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Note</title>
</head>

<body>
    <!-- Header Start -->
    <nav class="navbar bg-primary">
        <div class="container-fluid d-flex justify-content-center">
            <p class="navbar-brand mb-0 h1 text-white">Daily Note</p>
        </div>
    </nav>
    <!-- Header End -->

    <!-- Add Data Start -->
    <div class="container d-flex justify-content-end">
        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
            Data</button>
    </div>
    <!-- Add Data End -->

    <!-- Add Data Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 ms-auto" id="staticBackdropLabel">Add Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('note.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Data Modal End -->

    <!-- On Going Content Start -->
    <div class="container">
        <p class="h2">On Going</p>
        <div class="row">
            @foreach($data_note as $data)
            @if($data->status == "on-going")
            <div class="col-md-3 mb-4 bg">
                <div class="bg-primary px-4 py-2 d-flex align-items-center">
                    <div class="w-100 my-1">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                            <p class="fw-bold text-white fs-5 mb-0">{{ $data->title }}</p>
                            <div class="d-flex">
                                <form action="{{ route('note.destroy', $data->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="h-100 btn"><img src="assets/trash.png"></button>
                                </form>
                                <button type="button" class="edit-button btn" data-bs-toggle="modal"
                                    data-bs-target="#editDataModal" data-id="{{ $data->id }}"
                                    data-title="{{ $data->title }}" data-date="{{ $data->date }}"
                                    data-description="{{ $data->description }}">
                                    <img src="assets/pencil.png">
                                </button>
                            </div>
                        </div>
                        <p class="text-white fs-6 mb-0">{{ $data->date }}</p>
                        <p class="text-white fs-4">{{ $data->description }}</p>
                    </div>
                </div>
                <form action="{{ route('note.finished', $data->id) }}" method="post">
                    @csrf
                    <button class="btn-outline-primary btn w-100" style="border-radius:0px">Finished</button>
                </form>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- On Going Content End -->

    <!-- Edit Data Modal Start -->
    <div class="modal fade" id="editDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 ms-auto" id="staticBackdropLabel">Edit Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editNoteForm" action="{{route('note.update', $data->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Data Modal End -->

    <!-- Finished Content Start -->
    <div class="container">
        <p class="h2">Finished</p>
        <div class="row">
            @foreach($data_note as $data)
            @if($data->status == "finished")
            <div class="col-md-3 mb-4 bg">
                <div class="bg-primary px-4 py-2 d-flex align-items-center">
                    <div class="w-100 my-1">
                        <div class="d-flex justify-content-between" style="margin-bottom: 0 !important;">
                            <p class="fw-bold text-white fs-5 mb-0">{{ $data->title }}</p>
                            <div class="d-flex">
                                <form action="{{ route('note.destroy', $data->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="h-100 btn"><img src="assets/trash.png"></button>
                                </form>
                            </div>
                        </div>
                        <p class="text-white fs-6 mb-0">{{ $data->date }}</p>
                        <p class="text-white fs-4">{{ $data->description }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- Finished Content End -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editDataModal = document.getElementById('editDataModal');
            const editNoteForm = document.getElementById('editNoteForm');
            const titleInput = editDataModal.querySelector('input[name="title"]');
            const dateInput = editDataModal.querySelector('input[name="date"]');
            const descriptionInput = editDataModal.querySelector('input[name="description"]');
            const editButtons = document.querySelectorAll('.edit-button');

            editDataModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const title = button.getAttribute('data-title');
                const date = button.getAttribute('data-date');
                const description = button.getAttribute('data-description');

                // Dynamically set the form action based on the note ID
                editNoteForm.action = `/note/update/${id}`;

                titleInput.value = title;
                dateInput.value = date;
                descriptionInput.value = description;
            });

            editNoteForm.addEventListener('submit', function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // You can perform any additional actions here before submitting the form

                // Submit the form programmatically
                editNoteForm.submit();
            });

            editDataModal.addEventListener('hide.bs.modal', function () {
                titleInput.value = '';
                dateInput.value = '';
                descriptionInput.value = '';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>