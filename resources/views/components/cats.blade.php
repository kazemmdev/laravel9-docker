<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
        echo(json_encode($cats));
    @endphp
    <form method="POST" action="{{ route('token-create') }}">
        <input type="hidden">
        <button type="submit">Generate Token</button>
    </form>
</div>