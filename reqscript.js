const uploadForm = document.getElementById("uploadform");
const file = document.getElementById("file");
const progressbf = document.querySelector("#progressBar > .progress-bar-fill");
const progressbartext = progressbf.querySelector(" .Progress-bar-text");

uploadForm.addEventListener("submit", uploadfile);

function uploadfile (e) {
    console.log(e);
    e.preventDefault();

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "vid_upload.php");
    xhr.upload.addEventListener("progress", e => {
        const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
        progressbf.style.width= percent.toFixed(2) + "%";
        progressbartext.textContent = percent.toFixed(2) + "%";
    });

    xhr.setRequestHeader("content-type", "multipart/form-data");
    xhr.send(new FormData(uploadForm));
    
}