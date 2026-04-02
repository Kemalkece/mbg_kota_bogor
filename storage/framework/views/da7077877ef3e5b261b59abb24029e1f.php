<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field]); ?>
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
                    component.set('<?php echo e($getStatePath()); ?>', token);
                }
            }
        }
    }" wire:ignore>
        <script src="https://www.google.com/recaptcha/api.js" async defer nonce="<?php echo e(Vite::cspNonce()); ?>"></script>

        <script nonce="<?php echo e(Vite::cspNonce()); ?>">
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
                        component.set('<?php echo e($getStatePath()); ?>', token);
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
            data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>"
            data-callback="recaptchaCallback"
            data-size="normal">
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views/forms/components/recaptcha.blade.php ENDPATH**/ ?>