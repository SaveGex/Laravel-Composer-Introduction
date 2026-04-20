<div 
    id="flash-message"
    @class([
        'alert shadow-lg position-fixed m-3 z-3',
        "alert-{$type}" => true,
        'alert-dismissible fade show' => $dismissible,
    ]) 
    style="
        min-width: 320px; 
        max-width: 90%; 
        top: 20px; 
        right: 20px;
        transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
    " 
    role="alert"
>
    <div class="d-flex align-items-center">
        @if($type === 'success')
            <i class="bi bi-check-circle-fill me-3 fs-4"></i>
        @else
            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
        @endif
        
        <div class="pe-4">
            <label class="fw-bold">{{ $message }}</label>
            {{ $slot }}
        </div>
    </div>

    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>

<style>
    @media (max-width: 576px) {
        #flash-message {
            right: 5% !important;
            left: 5% !important;
            margin: 0 auto !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alertEl = document.getElementById('flash-message');
        const timeout = {{ $timeout }};
        
        if (alertEl && timeout > 0) {
            setTimeout(() => {
                alertEl.style.opacity = '0';
                alertEl.style.transform = 'translateY(-20px)';
                
                setTimeout(() => {
                    // Використовуємо нативний метод Bootstrap для закриття
                    const bsAlert = bootstrap.Alert.getOrCreateInstance(alertEl);
                    bsAlert.close();
                }, 500);
            }, timeout);
        }
    });
</script>