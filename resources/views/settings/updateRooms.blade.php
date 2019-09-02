@extends('layouts.settings')
@section('updateContent')
    <h3>Rooms</h3>
    <table class="table table-hover table-borderless">
        <thead>
        <tr>
            <th scope="col">Room type</th>
            <th scope="col">Capacity</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
            <th scope="col">Editing</th>
            <th scope="col">Deleting</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr id="{{$room->room_id}}">
                <th class="rooms" scope="row">{{ $room->roomType->type}}</th>
                <td>{{ $room->roomType->persons }}</td>
                <td class="number">{{ $room->number }}</td>
                <td class="price">{{ $room->price }}</td>
                <td class="edit"><button class="btn btn-primary btn-block">Edit</button></td>
                <td class="delete"><button class="btn btn-danger btn-block">Delete</button></td>
            </tr>
        @endforeach
    </table>
    @if(count($dbRooms) > count($rooms))
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-example-modal-sm" aria-hidden="true" id="addRoom">Add room</button>
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 style="font-weight: bold">Add Room</h5>
                            <hr>
                            <form method="post" action="{{ route('hotel_room') }}">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="roomType">
                                        @foreach($dbRooms as $dbRoom)
                                            <option value="{{ $dbRoom->id }}">{{ $dbRoom->type }}</option>
                                        @endforeach
                                    </select>
                                    <small class="small">Room must be unique.</small>
                                </div>
                                <div class="form-group">
                                    <label for="addNumber" class="col-form-label">Number</label>
                                    <input class="form-control" name="addNumber" id="addNumber">
                                </div>
                                <div class="form-group">
                                    <label for="addPrice" class="col-form-label">Price</label>
                                    <input class="form-control" name="addPrice" id="addPrice">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
           $('.edit').click(function () {
               let btn = $(this).find('.btn').get(0);
               let parent = $(this).parent();
               if(btn.innerHTML==='Save') {
                   let number = parent.find('.number').get(0).innerHTML;
                   let price = parent.find('.price').get(0).innerHTML;
                   let _token = "{{ csrf_token() }}";
                   let data = {
                       _token: _token,
                       number: number,
                       price: price
                   };
                   $.ajax({
                       url: "{{ route('hotel_room') }}",
                       method: "PUT",
                       data: data,
                       success: function (result, status) {
                           if (status === "success" && result === 'modified') {
                               parent.find('.number').removeAttr('contentEditable').removeClass('bg-white text-primary');
                               parent.find('.price').removeAttr('contentEditable').removeClass('bg-white text-primary');
                               btn.innerHTML = 'Edit';
                           }
                       }
                   });
               }
               else {
                   parent.find('.number').attr('contentEditable','true').addClass('bg-white text-primary');
                   parent.find('.price').attr('contentEditable','true').addClass('bg-white text-primary');
                   btn.innerHTML = 'Save';
               }
           });

            $('.delete').click(function () {
                let parent = $(this).parent();
                if(confirm('Are you sure you want to delete selected element?')){
                    let data = {
                        _token: "{{ csrf_token() }}",
                        room_id: parent.attr('id')
                    };
                    $.ajax({
                        url: "{{ route('hotel_room') }}",
                        method: "DELETE",
                        data: data,
                        success: function (result, status) {
                            if (status === "success" && result === 'deleted') {
                                parent.remove();
                                if(!($('#addRoom').length)){
                                    let addRoom =
                                        '<div class="row">' +
                                    '        <div class="col-12">' +
                                    '            <button class="btn btn-success btn-block" id="addRoom">Add room</button>' +
                                    '        </div>' +
                                    '    </div>';
                                    $(".table").after(addRoom);
                                }
                            }
                        }
                    });
                }
            });

        });
    </script>
@stop
