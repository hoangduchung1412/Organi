<?php 
	return [
		[
			'label' => 'Dashboard',
			'route' => 'admin.dashboard',
			'icon' => 'fa-home'
		],
		[
			'label' => 'Category Manager',
			'route' => 'category.index',
			'icon' => 'fa-list',
			'items' => [
				[
					'label' => 'All Category',
					'route' => 'category.index',
				],
				[
					'label' => 'Add Category',
					'route' => 'category.create',
				]
			]
		],
		[
			'label' => 'Product Manager',
			'route' => 'product.index',
			'icon' => 'fa-tachometer-alt',
			'items' => [
				[
					'label' => 'All Product',
					'route' => 'product.index',
				],
				[
					'label' => 'Add Product',
					'route' => 'product.create',
				]
			]
		],
		[
			'label' => 'Banner Manager',
			'route' => 'banner.index',
			'icon' => 'fa-solid fa-sliders',
			'items' => [
				[
					'label' => 'All banner',
					'route' => 'banner.index',
				],
				[
					'label' => 'Add Banner',
					'route' => 'banner.create',
				]
			]
		],
		[
			'label' => 'File Manager',
			'route' => 'admin.file',
			'icon' => 'fa-image',
		],
		[
			'label' => 'Account Manager',
			'route' => 'account.index',
			'icon' => 'fa-user',
			'items' => [
				[
					'label' => 'All Account',
					'route' => 'account.index',
				],
			]
		],
		[
			'label' => 'Blog Manager',
			'route' => 'blog.index',
			'icon' => 'fa-newspaper',
			'items' => [
				[
					'label' => 'All Blog',
					'route' => 'blog.index',
				],
				[
					'label' => 'Add Blog',
					'route' => 'blog.create',
				]
			]
		],
		[
			'label' => 'Order Manager',
			'route' => 'order.index',
			'icon' => 'fa-solid fa-cart-shopping',
			'items' => [
				[
					'label' => 'All Order',
					'route' => 'order.index',
				],
				[
					'label' => 'Statistic',
					'route' => 'order.index',
				]
			]
		]	
	]
 ?>