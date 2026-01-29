import './bootstrap';

// Live Support Widget
(function() {
    'use strict';

    const WIDGET_KEY = 'liveSupportWidgetState';

    function initLiveSupportWidget() {
        const widget = document.getElementById('live-support-widget');
        if (!widget) return;

        const toggleBtn = document.getElementById('live-support-toggle-btn');
        const chatWindow = document.getElementById('live-support-window');
        const header = document.getElementById('live-support-header');
        const closeBtn = document.getElementById('live-support-close-btn');
        const iframe = document.getElementById('live-support-iframe');
        const avatarUrl = widget.dataset.avatarUrl;

        if (!toggleBtn || !chatWindow || !closeBtn || !iframe) return;

        // Open directly as 16:9 modal (no docked/portrait mode).
        const MODAL_BODY_WIDTH = 960;
        const VIEWPORT_MARGIN = 24;

        function getHeaderHeight() {
            return header?.offsetHeight || 56;
        }

        function calcSize(desiredBodyWidth, ratioWidth, ratioHeight) {
            const headerHeight = getHeaderHeight();
            const maxBodyWidth = Math.max(240, window.innerWidth - VIEWPORT_MARGIN * 2);
            const maxBodyHeight = Math.max(240, window.innerHeight - VIEWPORT_MARGIN * 2 - headerHeight);

            let bodyWidth = Math.min(desiredBodyWidth, maxBodyWidth);
            let bodyHeight = Math.round(bodyWidth * (ratioHeight / ratioWidth));

            if (bodyHeight > maxBodyHeight) {
                bodyHeight = maxBodyHeight;
                bodyWidth = Math.round(bodyHeight * (ratioWidth / ratioHeight));
            }

            return {
                bodyWidth,
                bodyHeight,
                totalHeight: bodyHeight + headerHeight,
            };
        }

        function applyModalStyles() {
            const size = calcSize(MODAL_BODY_WIDTH, 16, 9);

            chatWindow.style.width = `${size.bodyWidth}px`;
            chatWindow.style.height = `${size.totalHeight}px`;
            chatWindow.style.position = 'fixed';
            chatWindow.style.top = '50%';
            chatWindow.style.left = '50%';
            chatWindow.style.right = 'auto';
            chatWindow.style.bottom = 'auto';
            chatWindow.style.transform = 'translate(-50%, -50%)';

            // Add backdrop (no blur to avoid affecting iframe)
            let backdrop = document.getElementById('live-support-backdrop');
            if (!backdrop) {
                backdrop = document.createElement('div');
                backdrop.id = 'live-support-backdrop';
                backdrop.className = 'fixed inset-0 z-[99] bg-black/50 transition-opacity duration-300';
                backdrop.addEventListener('click', closeWidget);
                document.body.insertBefore(backdrop, widget);
            }
        }

        function openWidget() {
            chatWindow.classList.remove('hidden');
            chatWindow.classList.add('flex');
            chatWindow.dataset.state = 'open';

            // Load iframe only when opening to save resources
            if (avatarUrl && iframe.getAttribute('src') !== avatarUrl) {
                iframe.setAttribute('src', avatarUrl);
            }

            applyModalStyles();

            sessionStorage.setItem(WIDGET_KEY, 'open');
        }

        function closeWidget() {
            chatWindow.classList.add('hidden');
            chatWindow.classList.remove('flex');
            chatWindow.dataset.state = 'closed';

            // Remove backdrop
            const backdrop = document.getElementById('live-support-backdrop');
            if (backdrop) backdrop.remove();

            sessionStorage.setItem(WIDGET_KEY, 'closed');
        }

        function toggleWidget() {
            if (chatWindow.dataset.state === 'open') {
                closeWidget();
            } else {
                openWidget();
            }
        }

        // Event listeners
        toggleBtn.addEventListener('click', toggleWidget);
        closeBtn.addEventListener('click', closeWidget);

        // Lesson CTA buttons
        document.querySelectorAll('[data-live-support-open]').forEach((btn) => {
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                openWidget();
            });
        });

        // Keep modal responsive on resize
        window.addEventListener('resize', () => {
            if (chatWindow.dataset.state === 'open') {
                applyModalStyles();
            }
        });

        // Restore state on page load
        const savedState = sessionStorage.getItem(WIDGET_KEY);
        if (savedState === 'open') {
            openWidget();
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLiveSupportWidget);
    } else {
        initLiveSupportWidget();
    }
})();
