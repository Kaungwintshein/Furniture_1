const container_row = document.getElementById("row");
container_row.innerHTML = products
  .map(
    (item) =>
      `
  <div class="col-lg-4 col-md-6 mt-2 mb-2" >
    <div class='cart-image-container'>
        <img src= './images/product/${item.img}' class='img-fluid' alt="">
        <div class="cart-icon d-flex">
            <div class="m-auto d-flex justify-content-around">
                <span class='d-flex icon-img'>
                    <i class="fas fa-plus m-auto"></i>
                </span>
                <span class='d-flex icon-img view' id = ${item.id}>
                    <i class="far fa-eye  m-auto "></i>
                </span>
                <span class='d-flex icon-img'>
                    <i class="far fa-heart m-auto"></i>
                </span>
            </div>
        </div>
    </div>
    <div class='text-center p-2' id=${item.id}>
        <h2>${item.item_name}</h2>
        
        <h2 class='mt-2'>$ ${item.price}</h2>
    </div>
  </div>`
  )
  .join("");

//model

const modal = document.getElementById("modal");

const modalCard = (id) => {
  const modalData = products.find((item) => item.id.toString() === id);
  modal.innerHTML = `

  <div class="container">
    <div class="row">
      <div class="col-lg-6">
          <img src='./images/product/${modalData.img}' class='img-fluid' alt="">
      </div>
      <div class="col-lg-6 d-flex flex-column justify-content-center pb-2">
          <h3>${modalData.item_name}</h3>
          <input type="hidden" name='product_id' value="${modalData.id}" />
          
          <span class='mt-2 mb-2'>$ ${modalData.price}</span>
          <input type="hidden" name='price' value="${modalData.price}" />
          <p class='text-muted'>${modalData.detail}</p>
          <div class="d-flex form align-items-center mb-3">
              <input type="text" class="form" name='quantity' value="1">
              <button type='submit' class='button ml-3 text-uppercase' id='addCart'>add to cart</button>
          </div>
          <div class="d-flex"><span class='mr-3'>Category: </span><a href="#" class='text-dark'>${modalData.category_name}</a>
          </div>
          <div class="d-flex"><span class='mr-3'>Tags: </span><a href="#" class='text-dark'>furniture,
                  gallery,
                  m-home</a></div>
      </div>
      <div class='cross mt-4 d-flex justify-content-center align-items-center'>
          <span></span>
      </div>
    </div>
  </div>
`;
};

container_row.addEventListener("click", (e) => {
  if (e.target.classList.contains("view")) {
    modalCard(e.target.id);
    modal.classList.add("active");
  }
});

modal.addEventListener("click", (e) => {
  if (e.target.classList.contains("cross")) {
    modal.classList.remove(["active"]);
  }
  if (e.target !== e.currentTarget) return;
  modal.classList.remove(["active"]);
});

$("#addCart").on('click',function(){
  // var id = $(".view").val();
  // console.log(id);
  console.log("HELLO");
});
