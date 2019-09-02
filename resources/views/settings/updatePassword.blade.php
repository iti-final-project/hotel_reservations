@extends('layouts.settings')
@section('updateContent')
    <h3>Change Password</h3>
    <form method="put" action="{{ route('passwordChange') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="oldPassword">Old Password</label>
            <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Enter old password" required>
        </div>

        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Enter new password" required>
        </div>

        <div class="form-group">
            <label for="newPassword-confirm">Confirm new password</label>
            <input type="password" class="form-control" name="newPassword-confirm" id="newPassword-confirm" placeholder="Confirm new password" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop
