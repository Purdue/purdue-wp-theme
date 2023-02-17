wp.domReady(() => {
    wp.blocks.registerBlockVariation('core/gallery', {
		name: 'square-image-gallery',
		title: wp.i18n.__('Square Image Gallery', 'purdue-wp-theme'),
		description: wp.i18n.__('An image gallery based on the Gallery block.', 'purdue-wp-theme'),
		icon: 'slides',
		attributes: {
			align: 'full',
			className: 'purdue-image-gallery',
			title: 'gallery',
		},
		scope: ['block', 'inserter', 'transform'],
	});
})





