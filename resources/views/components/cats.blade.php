<div class="d-flex justify-content-evenly align-items-center flex-row p-5">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
    /* echo(json_encode($cats)); */
    @endphp
    <div>
    <h3>Cat Information</h3>
    <div class="card" style="width: 25rem;">
        <img src="{{$cats['url']}}" class="card-img-top" height="300" />
        <div class="card-body">
            <p class="card-text">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Cat ID:</strong> {{ $cats['id'] }}</li>
                <li class="list-group-item"><strong>Cat URL:</strong> {{ $cats['url'] }}</li>
                <li class="list-group-item" style="margin-left: auto; margin-right: auto;">
                    <form method="POST" action="{{ route('catvote') }}">
                        @csrf
                        <input type="hidden" name="image_id" value="{{ $cats['id']}}" />
                        <button type="submit" name="vote" value="1" class="button btn btn-success">Upvote 👍</button>
                        <button type="submit" name="vote" value="-1" class="button btn btn-danger">Downvote 👎</button>
                    </form>
                </li>
                <li class="list-group-item" style="margin-left: auto; margin-right: auto;"><a href="{{ route('cats.index') }}" class="btn btn-primary">New Cat 😼</a></li>
            </ul>

            </p>
        </div>
    </div>
    </div>


    <div class="mt-4">
        <h3>Recent Votes</h3>
        <table class="table table-light table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image ID</th>
                    <th>Created At</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($votes as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['image_id'] }}</td>
                    <td>{{ ($item['value'] == 1) ? 'Upvote' : 'Downvote'; }}</td>
                    <td>
                        <img src="{{ $item['image']['url'] }}" alt="Cat Image" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @php
        /* echo(json_encode($votes)); */
        @endphp
    </div>
</div>