<div
    x-data
    x-init="
        // locate the textarea by looking at the previous field-wrapper sibling
        const wrapper = $el.closest('[data-field-wrapper]');
        const prevWrapper = wrapper ? wrapper.previousElementSibling : null;
        const textarea = prevWrapper ? prevWrapper.querySelector('textarea') : null;
        if (textarea) {
            const check = () => {
                const lines = textarea.value.split(/\r?\n/).filter(l => l.trim().length > 0).length;
                $el.classList.toggle('hidden', lines <= 5);
            };
            textarea.addEventListener('input', check);

            // prevent typing additional line breaks once limit reached
            textarea.addEventListener('keydown', e => {
                if (e.key === 'Enter') {
                    const lines = textarea.value.split(/\r?\n/).filter(l => l.trim().length > 0).length;
                    if (lines >= 5) {
                        e.preventDefault();
                        alert('Tidak bisa lebih dari 5 poin.');
                    }
                }
            });

            // intercept pasting more than allowed
            textarea.addEventListener('paste', e => {
                const pasted = (e.clipboardData || window.clipboardData).getData('text');
                const current = textarea.value.split(/\r?\n/).filter(l => l.trim().length > 0).length;
                const pasteCount = pasted.split(/\r?\n/).filter(l => l.trim().length > 0).length;
                if (current + pasteCount > 5) {
                    e.preventDefault();
                    alert('Tidak bisa lebih dari 5 poin.');
                    const allowed = 5 - current;
                    const pieces = pasted.split(/\r?\n/).filter(l => l.trim().length > 0).slice(0, allowed);
                    const insert = pieces.join('\n');
                    document.execCommand('insertText', false, insert);
                }
            });

            check();
        }
    "
    class="text-red-600 text-sm hidden">
    Maksimal 5 poin.
</div>