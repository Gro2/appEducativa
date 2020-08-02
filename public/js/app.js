

if (!window.Promise) {
  window.Promise = Promise
}

if ('serviceWorker' in navigator) {
  navigator.serviceWorker
    .register('../sw.js')
    .then(function (registration) {
      console.log('SW registered and scope: ', registration.scope);
    })
    .catch(function(err) {
      console.log(err)
    });

}
/*
// Install app
let installButton = document.getElementById('installButton');
let deferredPrompt;


function doInstall() {
    console.log('doInstall')
    installButton.style.display = 'none'
    deferredPrompt.prompt()
    deferredPrompt.userChoice.then(res => {
    /*  if (res.outcome === 'accepted') {
          console.log('doInstall: accepted');
      } else {
           console.log('doInstall: declined');
      }
   fg
      deferredPrompt = null
    })
}

installButton.onclick = doInstall;


window.addEventListener('beforeinstallprompt', event => {
    // console.log('Event: beforeinstallprompt')
    event.preventDefault();
    deferredPrompt = event;
    installButton.style.display = 'block';
});

window.addEventListener('appinstalled', event => {
    console.log('App Installed');
});

//---------- End Install app
*/