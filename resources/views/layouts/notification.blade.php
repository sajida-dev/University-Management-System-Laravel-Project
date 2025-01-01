@if (session('status'))
    <script>
        $(document).ready(function() {
            let status = @json(session('status'));
            showNotification(status.type, status.content);
        });
    </script>
@endif
