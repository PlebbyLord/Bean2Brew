@extends('layouts.layout')
@section('content')

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header text-center" style="font-size: 30px;">Verification Request</div>
        <div class="card-body">
            <form action="{{ route('send.verification.request') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="mb-3">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image1">Certificate of Registration (jpg, jpeg, png only)</label>
                    <input type="file" name="image1" class="form-control" accept=".jpg, .jpeg, .png" required>
                    <small id="fileHelp1" class="form-text text-muted">Accepted formats: .jpg, .jpeg, .png</small>
                    <div id="fileError1" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="image2">Business Permit (jpg, jpeg, png only)</label>
                    <input type="file" name="image2" class="form-control" accept=".jpg, .jpeg, .png" required>
                    <small id="fileHelp2" class="form-text text-muted">Accepted formats: .jpg, .jpeg, .png</small>
                    <div id="fileError2" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="image3">Proof of Address (jpg, jpeg, png only)</label>
                    <input type="file" name="image3" class="form-control" accept=".jpg, .jpeg, .png" required>
                    <small id="fileHelp3" class="form-text text-muted">Accepted formats: .jpg, .jpeg, .png</small>
                    <div id="fileError3" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="image4">Valid ID (jpg, jpeg, png only)</label>
                    <input type="file" name="image4" class="form-control" accept=".jpg, .jpeg, .png" required>
                    <small id="fileHelp4" class="form-text text-muted">Accepted formats: .jpg, .jpeg, .png</small>
                    <div id="fileError4" class="text-danger"></div>
                </div>
                <button type="submit" class="btn btn-primary">Send Verification Request</button>
            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var fileInputs = document.querySelectorAll('input[type="file"]');
        var isValid = true;

        fileInputs.forEach(function (input) {
            var fileId = input.name.charAt(input.name.length - 1); // Extract the number from the input name
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (!allowedExtensions.exec(input.value)) {
                document.getElementById('fileError' + fileId).innerHTML = 'Format not valid. Please choose .jpg, .jpeg, or .png files.';
                isValid = false;
            } else {
                document.getElementById('fileError' + fileId).innerHTML = '';
            }
        });

        return isValid;
    }
</script>
@endsection
