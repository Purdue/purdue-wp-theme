/* eslint-disable no-undef */
document.addEventListener('DOMContentLoaded', () => {
	const ytl_list = document.querySelectorAll('lite-youtube');
	const players = [];
	if (ytl_list && ytl_list.length > 0) {
		const tag = document.createElement('script');
		tag.src = 'https://www.youtube.com/iframe_api';
		const firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		ytl_list.forEach((youtube) => {
			youtube.parentNode.classList.add('youtube-lite-contain');
			const videoId = youtube.getAttribute('videoid');
			console.log(videoId)
			let playBtnEl = youtube.querySelector('.lty-playbtn');
			// A label for the button takes priority over a [playlabel] attribute on the custom-element
			const playLabel =
				(playBtnEl && playBtnEl.textContent.trim()) || youtube.getAttribute('playlabel') || 'Play';

			if (!youtube.style.backgroundImage) {
				const posterUrl = `https://i.ytimg.com/vi/${videoId}/maxresdefault.jpg`;
				youtube.style.backgroundImage = `url("${posterUrl}")`;
			}

			// Set up play button, and its visually hidden label
			if (!playBtnEl) {
				playBtnEl = document.createElement('button');
				playBtnEl.type = 'button';
				playBtnEl.classList.add('lty-playbtn');
				youtube.append(playBtnEl);
			}
			if (!playBtnEl.textContent) {
				const playBtnLabelEl = document.createElement('span');
				playBtnLabelEl.className = 'lyt-visually-hidden';
				playBtnLabelEl.textContent = playLabel;
				playBtnEl.append(playBtnLabelEl);
			}
			const iframe = youtube.querySelector('.iframe-element');
			if (!iframe) {
				const params = new URLSearchParams(youtube.getAttribute('params') || []);
				params.append('autoplay', '1');
				params.append('enablejsapi', '1');
				const host = window.location.protocol + '//' + window.location.host;
				params.append('origin', host);
				const iframeEl = document.createElement('div');
				iframeEl.id = videoId;
				iframeEl.dataset.title = playLabel;
				// AFAIK, the encoding here isn't necessary for XSS, but we'll do it only because this is a URL
				// https://stackoverflow.com/q/64959723/89484
				iframeEl.dataset.src = `https://www.youtube.com/embed/${encodeURIComponent(
					videoId
				)}?${params.toString()}`;
				iframeEl.classList.add('iframe-element', 'screen-reader-text');
				youtube.append(iframeEl);
			}
			const checkYT = setInterval(() => {
				if (YT && YT.loaded) {
					const player = new YT.Player(videoId, {
						height: '390',
						width: '640',
						videoId: videoId,
						playerVars: {
							html5: 1,
						},
						events: {
							onReady: function () {
								youtube.addEventListener('click', (event) => {
									event.preventDefault();
									youtube.classList.add('lyt-activated');
									youtube.querySelector('.iframe-element').classList.remove('screen-reader-text');
									player.playVideo();
									players.forEach((pl) => {
										if (pl.id !== videoId) {
											if (
												typeof pl.player.getPlayerState === 'function' &&
												pl.player.getPlayerState() === 1
											) {
												pl.player.pauseVideo();
											}
										}
									});
								});
							},
							onStateChange: function (event) {
								if (event.target.getPlayerState() === 1) {
									players.forEach((pl) => {
										if (pl.id !== videoId) {
											if (
												typeof pl.player.getPlayerState === 'function' &&
												pl.player.getPlayerState() === 1
											) {
												pl.player.pauseVideo();
											}
										}
									});
								}
							},
						},
					});
					players.push({
						id: videoId,
						player: player,
					});
					clearInterval(checkYT);
				}
			}, 1000);
			checkYT;
		});
	}
});
