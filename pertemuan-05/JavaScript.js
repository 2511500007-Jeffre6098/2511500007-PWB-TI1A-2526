let nama = prompt("Siapa nama kamu?");
alert("Halo, " + nama + "!");
function ubahTeks() {
    document.getElementById("pesan").innerText = "Teks berhasil diubah!";
}

function cekNama() {
    let nama = document.getElementById("nama").value;
    if (nama === "") {
        alert("Nama tidak boleh kosong!");
    } else {
        alert("Halo, " + nama + "!");
    }
}