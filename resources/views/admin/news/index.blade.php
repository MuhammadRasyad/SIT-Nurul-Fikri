@extends('admin.layouts')

@section('content')
<div class="container">
    <div id="loading" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:1051;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden"></span>
    </div>
</div>

    <h1>Manage News</h1>

    <!-- Search and Filter Form -->
    <form id="filterForm" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="unit" class="form-control">
                    <option value="">Select Unit</option>
                    <option value="TK" {{ request('unit') == 'TK' ? 'selected' : '' }}>TK</option>
                    <option value="SD" {{ request('unit') == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ request('unit') == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="Utama" {{ request('unit') == 'Utama' ? 'selected' : '' }}>Utama</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    <option value="program" {{ request('category') == 'program' ? 'selected' : '' }}>Program</option>
                    <option value="extracurricular" {{ request('category') == 'extracurricular' ? 'selected' : '' }}>Extracurricular</option>
                    <option value="activity" {{ request('category') == 'activity' ? 'selected' : '' }}>Activity</option>
                    <option value="achievement" {{ request('category') == 'achievement' ? 'selected' : '' }}>Achievement</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </form>

    <!-- Button to trigger modal for adding news -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createNewsModal">Add News</button>

    <!-- News Table -->
    @if($news->isEmpty())
        <div class="alert alert-warning mt-3">No News Available.</div>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Trending</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td><img src="{{ asset('storage/' . $item->image) }}" width="100" alt="News Image"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->trending ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#editNewsModal{{ $item->id }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('news.delete-news', $item->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit News -->
                <div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('news.update', $item->id) }}" method="POST" enctype="multipart/form-data" id="edit-form-{{ $item->id }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" class="form-control" required>{{ $item->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image (Optional)</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <select name="unit" class="form-control" required>
                                            <option value="TK" {{ $item->unit == 'TK' ? 'selected' : '' }}>TK</option>
                                            <option value="SD" {{ $item->unit == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP" {{ $item->unit == 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="Utama" {{ $item->unit == 'Utama' ? 'selected' : '' }}>Utama</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="program" {{ $item->category == 'program' ? 'selected' : '' }}>Program</option>
                                            <option value="extracurricular" {{ $item->category == 'extracurricular' ? 'selected' : '' }}>Extracurricular</option>
                                            <option value="activity" {{ $item->category == 'activity' ? 'selected' : '' }}>Activity</option>
                                            <option value="achievement" {{ $item->category == 'achievement' ? 'selected' : '' }}>Achievement</option>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="trending" {{ $item->trending ? 'checked' : '' }}>
                                        <label class="form-check-label">Trending</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Modal for Add News -->
    <div class="modal fade" id="createNewsModal" tabindex="-1" role="dialog" aria-labelledby="createNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" id="create-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createNewsModalLabel">Add News</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image-upload">
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <select name="unit" class="form-control" required>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="Utama">Utama</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control" required>
                                <option value="program">Program</option>
                                <option value="extracurricular">Extracurricular</option>
                                <option value="activity">Activity</option>
                                <option value="achievement">Achievement</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="trending">
                            <label class="form-check-label">Trending</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', function () {
        document.getElementById('loading').style.display = 'block';
    });
});

    // For SweetAlert notification on success
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}'
        });
    @endif

   document.querySelector('#create-form').addEventListener('submit', function (event) {
    const form = this;
    event.preventDefault();

    let formData = new FormData(form);
    fetch(form.action, {
        method: 'POST',
        body: formData
    }).then(response => response.json()).then(data => {
        Swal.fire({
            icon: 'success',
            title: 'News Added!',
            text: 'Your news has been successfully added.'
        }).then(() => {
            location.reload(); // Refresh the page after success
        });
        form.reset(); // Reset form fields after submission
    }).catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        });
    });
});


    document.querySelectorAll('form[id^="edit-form"]').forEach(form => {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data => {
            Swal.fire({
                icon: 'success',
                title: 'Changes Saved!',
                text: 'Your changes have been successfully saved.'
            }).then(() => {
                location.reload(); // Refresh the page after success
            });
        }).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        });
    });
});


  // SweetAlert untuk konfirmasi hapus
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('.delete-form'); // Temukan form terkait tombol
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data berita akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Kirim form jika pengguna mengonfirmasi
            }
        });
    });
});
</script>

@endsection
