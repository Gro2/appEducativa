const { get } = require("lodash")

let addButton = document.getElementById("add")
let addImageButton = document.getElementById("add-image")
let cancelButton = document.getElementById("cancel")
let pictures = document.getElementById("pictures")
let viewImages = document.getElementById("view-images")
let imageForm = document.getElementById("add-image")

function show(elem) {
  if (elem.className.indexOf("w3-show") == -1) {
      elem.className += " w3-show"
  } else {
      elem.className = elem.className.replace(" w3-show", "")
  }
}



function opencloseAddForm(){
 // viewImages.hidden=true
  show(viewImages)
  show(imageForm)
 // imageForm.hidden=false

}

function openPictures(){
 // viewImages.hidden=false
 // imageForm.hidden=true
  show(viewImages)
  show(imageForm)
}

// addButton.addEventListener('click', opencloseAddForm)
// cancelButton.addEventListener('click', opencloseAddForm)//Pictures)

function syncData() {
  fetch('http://localhost:3031/api/images', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      id: new Date().toISOString(),
      title: title.value,
      location: text.value,
      imageurl: 'https://firebasestorage.googleapis.com/v0/b/testvacj.appspot.com/o/black-hole.png?alt=media&token=2f546b28-67db-4482-9f11-e5838b0692fc'
    })
  })
    .then(function(res) {
      console.log('Sent data', res)
      updateUI()
    })
}


get.addEventListener('submit', function(event) {
  let title = document.getElementById('title')
  let text = document.getElementById('text')
  event.preventDefault();

  if (title.value.trim() === '' || text.value.trim() === '') {
    alert('The data is not valid!')
    return
  }

  openPictures()

  if ('serviceWorker' in navigator && 'SyncManager' in window) {
   navigator.serviceWorker.ready
      .then(function(sw) {
        let image = {
          id: new Date().toISOString(),
          title: title.value,
          text: text.value
        };
        writeData('sync-images', image)
          .then(function() {
            return sw.sync.register('sync-images')
          })
          .then(function() {
            let msg = document.getElementById('msg-text')
            msg.innerHTML = 'Image saved for syncing!'
            setTimeout(function(){ msg.innerHTML = "" }, 5000)
          })
          .catch(function(err) {
            console.log(err);
          });
      });
  } else {
    syncData();
  }
});







function updateUI(data) {
  clearPictures();
  for (let i = 0; i < data.length; i++) {
    createImage(data[i])
  }
}

function clearPictures() {
  while(pictures.hasChildNodes()) {
    pictures.removeChild(pictures.lastChild)
  }
}

function createImage(data){
  let imageBlock = document.createElement('div')
  imageBlock.className = 'w3-row w3-margin w3-mobile'
  let imageItem = document.createElement('div')
  imageItem.className = 'w3-third'
  let img = document.createElement('img')
  img.src = data.imageurl

  let textItem = document.createElement('div')
  textItem.className = 'w3-twothird w3-container w3-mobile'
  let title = document.createElement('h2')
  title.textContent = data.title
  let text = document.createElement('p')
  text.innerHTML = 'source: ' + data.text

  imageBlock.appendChild(imageItem)
  imageBlock.appendChild(textItem)
  imageItem.appendChild(img)
  textItem.appendChild(title)
  textItem.appendChild(text)

  pictures.appendChild(imageBlock)
}


//let url = 'https://testvacj.firebaseio.com/images.json'
let url = 'http://localhost:3031/api/images'
let networkDataReceived = false

fetch(url)
  .then(function(res) {
    return res.json()
  })
  .then(function(data) {
    networkDataReceived = true
    console.log('From web', data.data)
    let datacpy = data.data
    let dataArray = [];
    for (let key in datacpy) {
      dataArray.push(datacpy[key])
    }
    updateUI(dataArray);
  })
  .catch(function (err) {
    console.log("can not fecth")
  })


if ('indexedDB' in window) {
    readAllData('items')
    .then(function(data) {
      if (!networkDataReceived) {
        console.log('From idb', data)
        updateUI(data)
      }
    });
}
