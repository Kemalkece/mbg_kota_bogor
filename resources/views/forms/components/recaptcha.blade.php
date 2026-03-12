<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field">
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }" wire:ignore>
        <script src="https://www.google.com/recaptcha/api.js" async defer nonce="{{ Vite::cspNonce() }}"></script>

        <script nonce="{{ Vite::cspNonce() }}">
            window.recaptchaCallback = function(token) {
                @this.set('{{ $getStatePath() }}', token);
            };
        </script>

        <div class="g-recaptcha"
            data-sitekey="{{ config('services.recaptcha.site_key') }}"
            data-callback="recaptchaCallback">
        </div>
    </div>
</x-dynamic-component>