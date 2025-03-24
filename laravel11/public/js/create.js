document.getElementById('gambar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const previewImage = document.getElementById('preview-image');
    
    // Memastikan file adalah gambar
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            console.log("File berhasil dibaca: ", e.target.result); // Verifikasi file
            previewImage.src = e.target.result; 
            previewImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewImage.src = '';
        previewImage.style.display = 'none';
        console.log("File bukan gambar");
    }
});
