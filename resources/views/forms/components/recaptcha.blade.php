<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field">
    <div x-data="{ 
        recaptchaLoaded: false,
        getStatePath() {
            return $el.closest('[wire\:id]') ? $data.get($el.closest('[wire\:id]').getAttribute('wire:id')) : null;
        },
        setCaptchaToken(token) {
            // Find the parent Livewire component and set the value
            const livewireEl = this.$el.closest('[wire\\:id]');
            if (livewireEl) {
                const component = Livewire.find(livewireEl.getAttribute('wire:id'));
                if (component) {
                    component.set('{{ $getStatePath() }}', token);
                }
            }
        }
    }" wire:ignore>
        <script src="https://www.google.com/recaptcha/api.js" async defer nonce="{{ Vite::cspNonce() }}"></script>

        <script nonce="{{ Vite::cspNonce() }}">
            window.recaptchaOnLoadCallback = function() {
                window.recaptchaReady = true;
                // Trigger reCAPTCHA on page load for invisible reCAPTCHA
                if (typeof grecaptcha !== 'undefined') {
                    grecaptcha.ready(function() {
                        window.recaptchaReady = true;
                    });
                }
            };

            window.recaptchaCallback = function(token) {
                // Use the Alpine.js component to set the value
                const livewireEl = document.querySelector('[wire\:id]');
                if (livewireEl) {
                    const component = Livewire.find(livewireEl.getAttribute('wire:id'));
                    if (component) {
                        component.set('{{ $getStatePath() }}', token);
                    }
                }
            };

            // Reload reCAPTCHA when needed
            window.reloadRecaptcha = function() {
                if (typeof grecaptcha !== 'undefined') {
                    return grecaptcha.execute();
                }
                return null;
            };
        </script>

        <div class="g-recaptcha"
            data-sitekey="{{ config('services.recaptcha.site_key') }}"
            data-callback="recaptchaCallback"
            data-size="normal">
        </div>
    </div>
</x-dynamic-component>