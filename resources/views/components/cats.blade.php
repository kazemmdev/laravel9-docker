<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
       /*  echo(json_encode($cats)); */
    @endphp
   <img src="{{$cats['url']}}" height="300"/>
   <p>Cat ID: {{ $cats['id'] }}</p>
   <p>Cat URL: {{ $cats['url'] }}</p>
   <form method="POST" action="{{ route('catvote') }}">
   @csrf
    <input type="hidden" name="image_id" value="{{ $cats['id']}}"/>
   <button type="submit" name="vote" value="1">Upvote</button>
    <button type="submit" name="vote" value="-1">Downvote</button>
   </form>
   <a href="{{ route('cats.index') }}" class="btn btn-primary">new Cat</a>
   <div>
    <h1> recent votes </h1>
    <table class="table border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image ID</th>
            <th>Created At</th>
            <th>Value</th>
            <th>Country Code</th>
            <th>Image</th>
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
       /*  echo(json_encode($votes)); */
    @endphp
</div>
</div>