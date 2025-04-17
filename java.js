// Sticky Header saat Scroll
const header = document.querySelector("header");

if (header) {
    window.addEventListener("scroll", function () {
        header.classList.toggle("sticky", window.scrollY > 0);
    });
}

// Toggle Menu
let menu = document.querySelector("#menu-icon");
let navmenu = document.querySelector(".navmenu");

if (menu && navmenu) {
    menu.addEventListener("click", () => {
        menu.classList.toggle("bx-x");
        navmenu.classList.toggle("open");
    });
}

// Hover Effect untuk Heart Icon
document.querySelectorAll(".heart-icon i").forEach(icon => {
    icon.addEventListener("mouseenter", () => {
        icon.classList.replace("fa-regular", "fa-solid"); 
    });
    icon.addEventListener("mouseleave", () => {
        icon.classList.replace("fa-solid", "fa-regular");
    });
});

// tetap stay di favorite
// document.querySelectorAll('.heart-icon').forEach(item => {
//     item.addEventListener('click', (event) => {
//         event.stopPropagation(); // Mencegah event bubbling
//         window.location.href = 'favorite.html'; // Arahkan ke halaman favorit
//     });
// });

     // biar icon  heart terhubung ke halaman favorite
    document.addEventListener("DOMContentLoaded", function () {
        const heartIcons = document.querySelectorAll(".heart-icon");

        // Ambil data favorit dari localStorage
        let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

    heartIcons.forEach(icon => {
        const productCard = icon.closest(".row");
        const productName = productCard.querySelector(".price h4").textContent;

        // Cek apakah produk ada di dalam daftar favorit
        const isFavorite = favorites.some(item => item.name === productName);
        if (isFavorite) {
            icon.querySelector("i").classList.add("active"); // Tambahkan kelas active
        }

        icon.addEventListener("click", function () {
            const productPrice = productCard.querySelector(".price p").textContent;
            const productImage = productCard.querySelector("img").src;
            const productStatus = productCard.querySelector(".product-text h5").textContent;

            const exists = favorites.some(item => item.name === productName);

            if (!exists) {
                favorites.push({
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    status: productStatus
                });

                localStorage.setItem("favorites", JSON.stringify(favorites));
                icon.querySelector("i").classList.add("active"); // Tambahkan kelas active
                alert("Produk ditambahkan ke favorit!");
            } else {
                alert("Produk sudah ada di favorit!");
            }
        });
    });
});

// buat nambahin ke cart
    document.addEventListener("DOMContentLoaded", function () {
    let products = JSON.parse(localStorage.getItem("products")) || [];
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];

    // Event listener untuk tombol Add to Cart
    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            let productId = this.getAttribute("data-id"); // Ambil ID dari tombol
            let selectedProduct = products.find(p => p.id == productId);

            if (selectedProduct) {
                let cartIndex = cartItems.findIndex(item => item.id == productId);

                if (cartIndex !== -1) {
                    // Jika produk sudah ada di cart, tambah quantity
                    cartItems[cartIndex].quantity += 1;
                } else {
                    // Jika produk belum ada di cart, tambahkan dengan ID yang benar
                    let newProduct = {
                        id: selectedProduct.id,  // ✅ Pastikan ID ikut tersimpan
                        name: selectedProduct.name,
                        price: selectedProduct.price,
                        image: selectedProduct.image,
                        quantity: 1
                    };

                    cartItems.push(newProduct);
                }

                // Simpan perubahan ke localStorage
                localStorage.setItem("cart", JSON.stringify(cartItems));
                alert("Produk berhasil ditambahkan ke keranjang!");
                console.log("Cart setelah update:", cartItems); // Debugging
            } else {
                console.log("Produk tidak ditemukan di katalog.");
            }
        });
    });

    // Event listener untuk icon cart (navigasi ke cart.html)
    document.querySelectorAll(".cart-icon").forEach(icon => {
        icon.addEventListener("click", function () {
            window.location.href = "cart.html";
        });
    });
});

