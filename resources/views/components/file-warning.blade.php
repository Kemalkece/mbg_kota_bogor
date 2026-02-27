<div
    x-data="{ state: @entangle($getStatePath()) }"
    x-init="
        // if the field already has a value we hide the warning
        // the entangled state will update automatically when file is selected
    "
    x-show="!state || state.length === 0"
    class="text-red-600 text-sm">
    File PDF wajib diisi.
</div>