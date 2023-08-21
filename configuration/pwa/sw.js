// Service Worker setup
self.addEventListener('install', event => {
	event.waitUntil(
		caches.open('sltaxcache').then(cache => {
			return cache.addAll([
				'../../',
				'../../homepage.php',
				'../../index.php',
				'../../login.php',
				'../../view-login.php'
				]);
		})
		);
});

// Request catch
self.addEventListener('fetch', event => {
	event.respondWith(
		caches.match(event.request).then(response => {
			return response || fetch(event.request);
		})
		);
});