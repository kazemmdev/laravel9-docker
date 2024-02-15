<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <form method="POST" action="{{ route('token-create') }}">
        @csrf
        <input type="hidden" value="" name="token_name" id="token">
        <input type="text" name="name" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <script>
            let x = Math.random(60);
            document.getElementById('token').value = x
        </script>
        <button type="submit">Generate Token</button>
    </form>
</div>