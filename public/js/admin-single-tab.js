(function () {
    // logout endpoint provided by Filament script data
    const LOGOUT_URL = window.filamentData?.logoutUrl || '/logout';

    // generate unique ID for this tab/session used only for broadcasting
    const channelName = 'filament-single-tab';
    let myId;
    try {
        myId = sessionStorage.getItem('filament-tab-id');
    } catch {
        myId = null;
    }

    const isDuplicate = Boolean(myId);
    myId = crypto.randomUUID();
    try {
        sessionStorage.setItem('filament-tab-id', myId);
    } catch {}

    // if this tab is a duplicate of an existing one, hit the server to
    // regenerate the session id before notifying others. no tab id needs to be sent.
    async function refreshSessionIfNeeded() {
        if (! isDuplicate) {
            return;
        }
        try {
            const tokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = tokenMeta ? tokenMeta.content : null;
            if (! csrfToken) {
                console.debug('No CSRF token available when refreshing session');
                return;
            }

            console.debug('Calling activate-tab endpoint before broadcast');
            const response = await fetch(`${LOGOUT_URL.replace(/\/logout$/, '')}/activate-tab`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({}),
            });

            console.debug('activate-tab response', response.status, response);
            if (!response.ok) {
                console.warn('activate-tab returned non-OK status', response.status);
            }
        } catch (err) {
            console.error('Error calling activate-tab', err);
        }
    }

    // later when announcing, call refreshSessionIfNeeded first

    // broadcast channel for modern browsers
    let channel;
    if ('BroadcastChannel' in window) {
        channel = new BroadcastChannel(channelName);
        channel.onmessage = (e) => {
            if (e.data?.type === 'new-tab' && e.data.id !== myId) {
                // another tab just took over; redirect this one to login page
                // (we don't destroy the server session so the other tab remains active)
                window.location.href = '/admin/login?switched=1&tabId=' + encodeURIComponent(myId);
            }
        };
    }

    window.addEventListener('storage', (e) => {
        if (e.key === channelName && e.newValue !== myId) {
            window.location.href = '/admin/login?switched=1&tabId=' + encodeURIComponent(myId);
        }
    });

    function announce() {
        if (channel) {
            channel.postMessage({ type: 'new-tab', id: myId });
        }
        try {
            localStorage.setItem(channelName, myId);
        } catch {
            // ignore (e.g. private mode)
        }
    }

    // once the session has been regenerated there is no need to attach any
    // tab identifiers to future requests; the server will reject stale
    // cookies automatically. therefore the navigation helpers are no longer
    // required and can be removed.
    function appendTabIdToLinksAndForms() {
        // intentionally empty
    }

    // announce immediately when the script loads. this causes any previously-open
    // tabs to initiate logout as soon as a new tab is opened. if we are a
    // cloned tab we first notify the server of our new identifier (so the
    // server will reject the old tab).
    (async () => {
        // if we're on the login page we don't want to activate or regenerate any
        // sessions (the user is not yet authenticated), and we should clear the
        // stored tab id so duplicate detection doesn't misfire later. we also
        // should *not* broadcast when merely viewing the login screen, because
        // that would kick other active tabs out while the user is simply trying
        // to sign in.
        if (window.location.pathname.endsWith('/login')) {
            try { sessionStorage.removeItem('filament-tab-id'); } catch {}
        } else {
            await refreshSessionIfNeeded();
            announce();
        }

        appendTabIdToLinksAndForms();
    })();
})();
