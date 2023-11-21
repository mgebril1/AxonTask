<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Numbers</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
</head>
<body style="padding: 30px;">
    <!-- Your HTML content here -->

    <!-- Filter form -->
    <form action="{{ route('phone-numbers.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label  for="country" class="form-label">Country:</label>
                <select name="country" id="country" class="form-select">
                    <option value="">All</option>
                    <option value="237" @if(request('country') == '237') selected @endif>Cameroon</option>
                    <option value="251" @if(request('country') == '251') selected @endif>Ethiopia</option>
                    <option value="212" @if(request('country') == '212') selected @endif>Morocco</option>
                    <option value="258" @if(request('country') == '258') selected @endif>Mozambique</option>
                    <option value="256" @if(request('country') == '256') selected @endif>Uganda</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State:</label>
                <select name="state" id="state" class="form-select">
                    <option value="">All</option>
                    <option value="1" @if(request('state') == '1') selected @endif>Valid</option>
                    <option value="0" @if(request('state') == '0') selected @endif>Not Valid</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Filter</button>
            </div>
        </div>
    </form>

    <hr>

    <div class="table-responsive">
        <h3>Phone Numbers Filtered</h3>
        <table class="table table-striped">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th>State</th>
                    <th>Number</th>
                </tr>
            </thead>
            <!-- Table rows -->
            <tbody>
                @foreach($phoneNumbersFiltered as $phoneNumber)
                    <tr>
                        <td>{{ $phoneNumber->state }}</td>
                        <td>{{ $phoneNumber->number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $phoneNumbersFiltered->links() }}
    </div>
    <hr></br>
    <div class="table-responsive">
        <h3>All Phone Numbers</h3>
        <table class="table table-striped">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th>State</th>
                    <th>Number</th>
                </tr>
            </thead>
            <!-- Table rows -->
            <tbody>
                @foreach($allPhoneNumbers as $phoneNumber)
                    <tr>
                        <td>{{ $phoneNumber->state }}</td>
                        <td>{{ $phoneNumber->number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{ $allPhoneNumbers->links() }}
    </div>




    <!-- Bootstrap JS (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>