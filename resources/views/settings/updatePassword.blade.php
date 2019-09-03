@extends('layouts.settings')
@section('updateContent')
    <h3>Change Password</h3>
    <form method="post" action="{{ route('passwordChange') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <div class="form-group">
            <label for="oldPassword">Old Password</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Enter old password" required>
        </div>

        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control popover-dismiss" name="newPassword" id="newPassword" placeholder="Enter new password"
                   data-placement="bottom" data-toggle="popover" data-trigger="focus" title="Password" oncopy="return false" oncut="return false" onpaste="return false" required>
            <div id="popover-content-password" style="display: none">
                <ul>
                    <li>Must be at least 8 characters.</li>
                    <li>Must have at least a number and uppercase letter and a symbol.</li>
                </ul>
            </div>
        </div>


        <div class="form-group">
            <label for="newPassword-confirm">Confirm new password</label>
            <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword-confirm" placeholder="Confirm new password" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $(function () {
                $('[data-toggle="popover"]').popover()
            });

            $('#newPassword').popover({
                trigger: 'focus',
                html: true,
                content: function() {
                    return $('#popover-content-password').html();
                }
            });
        });
    </script>
@stop
