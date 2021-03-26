const CACHE_STATIC_NAME = 'static-v0';
const CACHE_DYNAMIC_NAME = 'dynamic-v0';

self.addEventListener('install', function(event) {
	//console.log('[Service Worker] Installing Service Worker ...', event);
	event.waitUntil(
	  caches.open(CACHE_STATIC_NAME)
		.then(function(cache) {
			//console.log('[Service Worker] Precaching App Shell');
			cache.addAll([
				'/',
				'/index.php',
				'/wp-content/themes/forge/offline.html',
				'/wp-content/themes/forge/library/js/scripts.min.js',
				'/wp-content/themes/forge/library/css/style.css',
				'/wp-content/themes/forge/library/images/pghforgerugby.png'
			]);
		})
	)
});

self.addEventListener('activate', function(event) {
	//console.log('[Service Worker] Activating Service Worker ....', event);
	event.waitUntil(
		caches.keys()
			.then(function(keyList) {
				return Promise.all(keyList.map(function(key) {
					if (key !== CACHE_STATIC_NAME && key !== CACHE_DYNAMIC_NAME) {
						//console.log('[Service Worker] Removing old cache:', key);
						return caches.delete(key);
					}
				}));
			})
	);
	return self.clients.claim();
});

self.addEventListener('fetch', function(event) {

    //This service worker won't touch the admin area and preview pages
	if (event.request.url.match(/wp-admin/) || event.request.url.match(/preview=true/)) {
		return;
	}

	//This service worker won't touch non-get requests
	if (event.request.method != 'GET') {
		return;
	}

	/* Disabled for now
	event.respondWith(
		caches.match(event.request)
			.then(function(response) {
				if (response) {
					return response;
				} else {
					return fetch(event.request)
						.then(function(res) {
							return caches.open(CACHE_DYNAMIC_NAME)
								.then(function(cache) {
									cache.put(event.request.url, res.clone())
									return res;
								})
						})
						.catch(function(err) {
							return caches.open(CACHE_STATIC_NAME)
								.then(function(cache) {
								    if (event.request.headers.get('accept').includes('text/html')) {
									    return cache.match('/wp-content/themes/forge/offline.html')
								    }
								})
						});
				}
			})
	);*/
});

// On Notification Click
self.addEventListener('notificationclick', function(event){
	var notification = event.notification;
	var action = event.action;

	console.log(notification);

	if(action === 'confirm') {
		console.log('Confirm was chosen')
		notification.close();
	} else {
		console.log(action);
		notification.close();
	}
});

// On Notification Close
// self.addEventListener('notificationclose', function(event){
// 	console.log('Notification was closed', event)
// });

self.addEventListener('push', function(event) {
	console.log('Push Notification Received', event);

	var data = {title: 'New!', content: "Something new this way comes!"};

	if (event.data) {
		data = JSON.parse(event.data.text());
	}

	var options = {
		body: data.content,
		icon: '/wp-content/themes/forge/src/library/images/app-icon-96x96.png',
		badge: '/wp-content/themes/forge/src/library/images/forge-icon-96x96.png',
	}

	event.waitUntil(
		self.registration.showNotification(data.title, options)
	);
});