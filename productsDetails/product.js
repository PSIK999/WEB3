var ProductImg = document.getElementById("ProductImg");
var SmallImg = document.getElementsByClassName("small-img");

SmallImg[0].onmouseover = function () {
  ProductImg.src = SmallImg[0].src;
};
SmallImg[1].onmouseover = function () {
  ProductImg.src = SmallImg[1].src;
};
SmallImg[2].onmouseover = function () {
  ProductImg.src = SmallImg[2].src;
};
SmallImg[3].onmouseover = function () {
  ProductImg.src = SmallImg[3].src;
};
