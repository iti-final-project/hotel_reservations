@extends('layouts.settings')
@section('updateContent')
    <h3>Images</h3>
    @if(session()->has('added'))
        <div class="row">
            @if(session('added'))
                <div class="col-10 border-success" style="border:1px dashed; background: lightgreen;">
                    <p style="color: darkgreen">
                        Image added successfully.
                    </p>
                </div>
            @else
                <div class="col-10 border-danger" style="border:1px dashed; background: lightcoral;">
                    <p style="color: darkred">
                        Something went wrong, we couldn't add your image.
                    </p>
                </div>
            @endif
        </div>
    @endisset
    <table class="table table-hover table-borderless">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Type</th>
            <th scope="col">Editing</th>
            <th scope="col">Deleting</th>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr id="{{$image->id}}">
                <td><img src="{{ Storage::url($image->link) }}" alt="Couldn't load image." style="width: 100px;height: 80px;"></td>
                <td class="imageDescription">{{ $image->desc}}</td>
                <td class="imageType">{{ $image->type }}</td>
                <td class="edit"><button class="btn btn-primary btn-block">Edit</button></td>
                <td class="delete"><button class="btn btn-danger btn-block">Delete</button></td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-example-modal-sm" aria-hidden="true" id="addRoom">Add Image</button>
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 style="font-weight: bold">Add Image</h5>
                            <hr>
                            <form method="post" action="{{ route('hotel_image') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="uploadedImage" id="uploadedImage" aria-describedby="uploadedImage">
                                        <label class="custom-file-label" for="uploadedImage">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="addType" id="addType">
                                        <option value="" selected>Image type</option>
                                        <option value="main">Main</option>
                                        <option value="extra">Extra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addDescription">Image description</label>
                                    <input type="text" class="form-control" name="addDescription" id="addDescription">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script id="selectImageType" type="text/html">
        <select class="custom-select imageType">
            <option value="" selected>Image type</option>'
            <option value="main">Main</option>'
            <option value="extra">Extra</option>'
        </select>
    </script>

    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()

            $('.edit').click(function () {
                let btn = $(this).find('.btn').get(0);
                let parent = $(this).parent();
                if (btn.innerHTML === 'Save') {
                    let type = parent.find('.imageType').children('option:selected').val();
                    let desc = parent.find('.imageDescription').get(0).innerHTML;
                    let _token = "{{ csrf_token() }}";
                    let data = {
                        _token: _token,
                        imageID: parent.attr('id'),
                        modifyType: type,
                        modifyDescription: desc
                    };
                    $.ajax({
                        url: "{{ route('hotel_image') }}",
                        method: "PUT",
                        data: data,
                        success: function (result, status) {
                            if (status === "success" && result === 'modified') {
                                parent.find('.imageType').removeAttr('contentEditable').removeClass('bg-white text-primary').get(0).innerHTML=type;
                                parent.find('.imageDescription').removeAttr('contentEditable').removeClass('bg-white text-primary');
                                btn.innerHTML = 'Edit';
                            }
                        }
                    });
                } else {
                    parent.find('.imageType').attr('contentEditable', 'true').addClass('bg-white text-primary').get(0).innerHTML= $('#selectImageType').get(0).innerHTML;
                    parent.find('.imageDescription').attr('contentEditable', 'true').addClass('bg-white text-primary');
                    btn.innerHTML = 'Save';
                }
            });


            $('.delete').click(function () {
                let parent = $(this).parent();
                if (confirm('Are you sure you want to delete selected image?')) {
                    let data = {
                        _token: "{{ csrf_token() }}",
                        imageID: parent.attr('id')
                    };
                    $.ajax({
                        url: "{{ route('hotel_image') }}",
                        method: "DELETE",
                        data: data,
                        success: function (result, status) {
                            if (status === "success" && result === 'deleted') {
                                parent.remove();
                            }
                        }
                    });
                }
            });

        });
    </script>
@stop
