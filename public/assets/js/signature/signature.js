const canvas = document.querySelector("canvas");
const signaturePad = new SignaturePad(canvas);

const data = signaturePad.toData();
signaturePad.fromData(data);
signaturePad.fromData(data, { clear: false });
signaturePad.clear();
signaturePad.isEmpty();
signaturePad.off();
signaturePad.on();

let signatureB64 = null;


const savePNGButton = document.querySelector("[data-action=save-png]");
const clearButton = document.querySelector("[data-action=clear]");

const modalSignature = new bootstrap.Modal(document.getElementById('modalSignature'));

const clearSignature = document.getElementById('clearSignature');

document.querySelector('#modalSignature-btn').addEventListener('click', (e) => {
  modalSignature.show();
})

clearButton.addEventListener('click', (e) => {
  signaturePad.clear();
  document.querySelector('[id-output="output"]').style.backgroundImage = null;

  signatureB64 = null;
})

savePNGButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
      alert("Please provide a signature first.");
    } else {
      var dataURL = signaturePad.toDataURL();
      document.querySelector('[id-output="output"]').style.backgroundImage = `url(${dataURL})`;
      signatureB64 = dataURL.split(',')[1];
      modalSignature.hide();
    }
  });

  clearSignature.addEventListener('click', (e) => {
    document.querySelector('[id-output="output"]').style.backgroundImage = `url(https://via.placeholder.com/500x300)`;
    signaturePad.clear();
  })


// function download(dataURL, filename) {
//     var blob = dataURLToBlob(dataURL);
//     var url = window.URL.createObjectURL(blob);
  
//     var a = document.createElement("a");
//     a.style = "display: none";
//     a.href = url;
//     a.download = filename;
  
//     document.body.appendChild(a);
//     a.click();
  
//     window.URL.revokeObjectURL(url);
//   }

//   function dataURLToBlob(dataURL) {
//     // Code taken from https://github.com/ebidel/filer.js
//     var parts = dataURL.split(';base64,');
//     var contentType = parts[0].split(":")[1];
//     var raw = window.atob(parts[1]);
//     var rawLength = raw.length;
//     var uInt8Array = new Uint8Array(rawLength);
  
//     for (var i = 0; i < rawLength; ++i) {
//       uInt8Array[i] = raw.charCodeAt(i);
//     }
  
//     return new Blob([uInt8Array], { type: contentType });
//   }