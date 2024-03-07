@php
    $analytic_id = config('app.analytic_id');
@endphp
@if($analytic_id)
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $analytic_id }}"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ $analytic_id }}');
    </script>
@endif