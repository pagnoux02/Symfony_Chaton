//cible mon bouton
const addToCartButton = document.getElementById("cart-add-button");

//pour le mettre sous écoute du clic
//au clic, déclencher la requête ajax
addToCartButton.addEventListener("click", addToCart);

function addToCart(event) {
    let catId = event.currentTarget.dataset.catId;
    let url = event.currentTarget.dataset.ajaxUrl;
    axios.post(url, {
        id: catId
    })
        .then(function (response) {
            console.log(response);
        });
}

const input = document.getElementById('cat_get_name');


input.addEventListener('input', updateValue);

function updateValue(e) {
   // let catId = e.currentTarget.dataset.catId;
     let url = e.currentTarget.dataset.ajaxUrlName;

    axios.post(url, {
           name: e.target.value,
    })
        .then(function (response) {
            console.log(response.data);

        });
}

