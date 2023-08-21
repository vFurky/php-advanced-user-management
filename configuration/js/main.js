// Feather Icons
feather.replace({ width: '14', height: '14' });

// PWA
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('./configuration/pwa/sw.js')
	.then(registration => {
		console.log('Service Worker registered:', registration);
	})
	.catch(error => {
		console.log('Service Worker registration failed:', error);
	});
};