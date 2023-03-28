const dropzone 		 = document.querySelector(".dropzone");
const dragText 		 = dropzone.querySelector(".dropzone-text");
const dropzoneButton = dropzone.querySelector(".needsclick");
const dropzoneInput	 = dropzone.querySelector("input");
let file;

dropzoneButton.onclick = ()=>{
	dropzoneInput.click();
}

dropzoneInput.addEventListener("change", function(){
	file = this.files[0];
	dropzone.classList.add("active");
	saveFile();
});

//If user Drag File Over dropzone
dropzone.addEventListener("dragover", (event)=>{
	event.preventDefault();
	dropzone.classList.add("active");
	dragText.textContent = "Release to Upload File";
});

//If user leave dragged File from dropzone
dropzone.addEventListener("dragleave", ()=>{
	dropzone.classList.remove("active");
	dragText.textContent = "Drag & Drop to Upload File";
});

//If user drop File on dropzone
dropzone.addEventListener("drop", (event)=>{
	event.preventDefault();
	file = event.dataTransfer.files[0];
	saveFile();
});