document.addEventListener("DOMContentLoaded", () => {
	const ariaTabId = 'aria-new-tab';
	const label = document.getElementById(ariaTabId);

	if (!label) {
		const ariaNewTab = document.createElement('span');
		ariaNewTab.className = 'is-sr-only';
		ariaNewTab.textContent = 'Opens in a new tab';
		ariaNewTab.id = ariaTabId;
		document.body.appendChild(ariaNewTab);
	}

	document.querySelectorAll('a[target="_blank"]').forEach((x) => {
		const ariaDescribedBy = x.getAttribute('aria-describedby');
		const ariaLabel = x.getAttribute('aria-label');

		// Skip if the label already mentions "opens in a new tab" to avoid redundancy
		if (ariaLabel && ariaLabel.toLowerCase().includes('opens in a new tab')) {
			return;
		}

		if (!ariaDescribedBy) {
			// If it's empty or null, just set it
			x.setAttribute('aria-describedby', ariaTabId);
		} else {
			// Split into an array to handle multiple IDs
			const ids = ariaDescribedBy.split(/\s+/);

			// Append only if the ID isn't already present
			if (!ids.includes(ariaTabId)) {
				ids.push(ariaTabId);
				x.setAttribute('aria-describedby', ids.join(' '));
			}
		}
	});
});