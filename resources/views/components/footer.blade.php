@php
    $fecha = \Carbon\Carbon::now()->translatedFormat('Y');
@endphp

<footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content p-4">
    <aside>
        <p>Copyright © {{ $fecha }} - All rights reserved by </p>
    </aside>
</footer>