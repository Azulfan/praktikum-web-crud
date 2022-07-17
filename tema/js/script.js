const aksi = document.querySelector(".coba"),
	hapusAksi = document.querySelector(".delete"),
	progress = document.querySelector(".progress");

setTimeout(() => {
	aksi.classList.remove("active");
	window.location.href = "http://www.zulfan.xyz/";
}, 5000);

hapusAksi.addEventListener("click", () => {
	aksi.classList.remove("active");

	setTimeout(() => {}, 300);
});
