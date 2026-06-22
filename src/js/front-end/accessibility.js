//Add aria-describedby to all links that open in a new tab.
document.addEventListener("DOMContentLoaded", () => {
	const ariaTabId = 'aria-new-tab';
	const label = document.getElementById(ariaTabId);
	if(!label) {
		const ariaNewTab = document.createElement('span');
		ariaNewTab.className = 'is-sr-only';
		ariaNewTab.textContent = 'Opens in a new tab'
		ariaNewTab.id = ariaTabId;
		const body = document.querySelector('body')
		body.appendChild(ariaNewTab);
	}

	document.querySelectorAll('a[target="_blank"]').forEach((x) => {
		const ariaDescribedBy = x.getAttribute('aria-describedby');
		const ariaLabel = x.getAttribute('aria-label');

		if(ariaDescribedBy === null) {
			if (!ariaLabel || !ariaLabel?.toLowerCase().includes('opens in a new tab')) {
				x.setAttribute('aria-describedby', ariaTabId)
			}else{

			}
		}
	});
});